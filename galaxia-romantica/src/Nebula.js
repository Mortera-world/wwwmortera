import * as THREE from 'three';
import nebulaVertexShader from '../shaders/nebula.vert?raw';
import nebulaFragmentShader from '../shaders/nebula.frag?raw';

const NEBULA_LAYERS = [
  { colorA: '#ff4fbf', colorB: '#48d8ff', position: [-72, 18, -48], scale: [155, 82, 1], rotation: 0.2 },
  { colorA: '#8f5dff', colorB: '#ff77d1', position: [68, -12, -26], scale: [128, 74, 1], rotation: -0.7 },
  { colorA: '#34bfff', colorB: '#b735ff', position: [10, 34, -92], scale: [192, 104, 1], rotation: 1.2 },
];

export class Nebula {
  static async create(camera) {
    return new Nebula(camera, nebulaVertexShader, nebulaFragmentShader);
  }

  constructor(camera, vertexShader, fragmentShader) {
    this.group = new THREE.Group();
    this.camera = camera;
    this.vertexShader = vertexShader;
    this.fragmentShader = fragmentShader;
    this.layers = [];
    this.createLayers();
  }

  createLayers() {
    NEBULA_LAYERS.forEach((layer, index) => {
      const geometry = new THREE.PlaneGeometry(1, 1, 80, 80);
      const material = new THREE.ShaderMaterial({
        vertexShader: this.vertexShader,
        fragmentShader: this.fragmentShader,
        uniforms: {
          uTime: { value: 0 },
          uColorA: { value: new THREE.Color(layer.colorA) },
          uColorB: { value: new THREE.Color(layer.colorB) },
          uSeed: { value: index * 17.31 + 3.7 },
          uIntensity: { value: index === 2 ? 0.12 : 0.09 },
        },
        transparent: true,
        depthWrite: false,
        blending: THREE.AdditiveBlending,
        side: THREE.DoubleSide,
      });
      const mesh = new THREE.Mesh(geometry, material);
      mesh.position.set(...layer.position);
      mesh.scale.set(...layer.scale);
      mesh.rotation.z = layer.rotation;
      this.layers.push(mesh);
      this.group.add(mesh);
    });
  }

  update(delta, time, camera) {
    this.layers.forEach((layer, index) => {
      layer.material.uniforms.uTime.value = time;
      layer.rotation.z += delta * (0.012 + index * 0.004);
      layer.lookAt(camera.position);
      layer.rotateZ(time * 0.018 + index);
    });
  }
}
