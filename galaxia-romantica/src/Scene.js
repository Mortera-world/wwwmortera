import * as THREE from 'three';
import { createCamera, CameraRig } from './Camera.js';
import { createRenderer, createComposer } from './Effects.js';
import { createControls } from './Controls.js';
import { Galaxy } from './Galaxy.js';
import { BlackHole } from './BlackHole.js';
import { Nebula } from './Nebula.js';
import { Words } from './Words.js';
import { Particles } from './Particles.js';
import { MediaOrbit } from './MediaOrbit.js';
import { QUALITY } from './Utils.js';

export class RomanticGalaxyScene {
  constructor(canvas) {
    this.canvas = canvas;
    this.scene = new THREE.Scene();
    this.scene.fog = new THREE.FogExp2(0x070011, 0.0027);
    this.camera = createCamera();
    this.renderer = createRenderer(canvas);
    this.controls = createControls(this.camera, this.renderer.domElement);
    this.composer = createComposer(this.renderer, this.scene, this.camera);
    this.clock = new THREE.Clock();
    this.raycaster = new THREE.Raycaster();
    this.pointer = new THREE.Vector2();
    this.systems = [];
    this.cameraRig = new CameraRig(this.camera, this.controls);
    this.active = true;

    this.scene.add(new THREE.AmbientLight(0x7c3cff, 0.2));
  }

  async init() {
    this.galaxy = await Galaxy.create(QUALITY.galaxyStars);
    this.nebula = await Nebula.create(this.camera);
    this.blackHole = await BlackHole.create();
    this.words = new Words(this.camera, QUALITY.wordCount);
    this.particles = new Particles(QUALITY);
    this.mediaOrbit = await MediaOrbit.create(this.camera);

    this.systems = [this.galaxy, this.nebula, this.blackHole, this.words, this.mediaOrbit, this.particles];
    this.systems.forEach((system) => this.scene.add(system.group));

    this.scene.add(this.createLensFlare());
    this.bindEvents();
    this.resize();
  }

  createLensFlare() {
    const canvas = document.createElement('canvas');
    canvas.width = 256;
    canvas.height = 256;
    const context = canvas.getContext('2d');
    const gradient = context.createRadialGradient(128, 128, 0, 128, 128, 128);
    gradient.addColorStop(0, 'rgba(255, 180, 238, 0.45)');
    gradient.addColorStop(0.18, 'rgba(120, 215, 255, 0.18)');
    gradient.addColorStop(1, 'rgba(0, 0, 0, 0)');
    context.fillStyle = gradient;
    context.fillRect(0, 0, 256, 256);

    const texture = new THREE.CanvasTexture(canvas);
    texture.colorSpace = THREE.SRGBColorSpace;
    const material = new THREE.SpriteMaterial({
      map: texture,
      blending: THREE.AdditiveBlending,
      transparent: true,
      opacity: 0.34,
      depthWrite: false,
    });
    const sprite = new THREE.Sprite(material);
    sprite.position.set(-26, 16, -14);
    sprite.scale.set(42, 42, 1);
    return sprite;
  }

  bindEvents() {
    window.addEventListener('resize', () => this.resize());
    window.addEventListener('pointermove', (event) => {
      this.pointer.set((event.clientX / window.innerWidth) * 2 - 1, -(event.clientY / window.innerHeight) * 2 + 1);
      this.cameraRig.setPointer(event.clientX, event.clientY);
    });
    window.addEventListener('dblclick', () => this.center());
    window.addEventListener('pointerdown', (event) => this.handlePointer(event));
  }

  center() {
    this.cameraRig.center();
  }

  handlePointer(event) {
    this.pointer.set((event.clientX / window.innerWidth) * 2 - 1, -(event.clientY / window.innerHeight) * 2 + 1);
    this.raycaster.setFromCamera(this.pointer, this.camera);
    const hits = this.raycaster.intersectObjects(this.blackHole.interactiveObjects, true);
    if (!hits.length) return;
    this.blackHole.pulse();
    this.words.pullToHeart();
    this.particles.burst();
  }

  resize() {
    const width = window.innerWidth;
    const height = window.innerHeight;
    this.camera.aspect = width / height;
    this.camera.updateProjectionMatrix();
    this.renderer.setPixelRatio(QUALITY.pixelRatio);
    this.renderer.setSize(width, height, false);
    this.composer.setPixelRatio(QUALITY.pixelRatio);
    this.composer.setSize(width, height);
  }

  start() {
    this.renderer.setAnimationLoop(() => this.render());
  }

  render() {
    if (!this.active) return;
    const delta = Math.min(this.clock.getDelta(), 0.033);
    const time = this.clock.elapsedTime;
    this.cameraRig.update(delta, time);
    this.systems.forEach((system) => system.update(delta, time, this.camera));
    this.composer.render();
  }
}
