import * as THREE from 'three';
import galaxyVertexShader from '../shaders/galaxy.vert?raw';
import galaxyFragmentShader from '../shaders/galaxy.frag?raw';
import { randomBetween } from './Utils.js';

const STAR_PALETTE = [
  new THREE.Color('#ffffff'),
  new THREE.Color('#99d8ff'),
  new THREE.Color('#ff91da'),
  new THREE.Color('#ad7bff'),
];

export class Galaxy {
  static async create(count) {
    return new Galaxy(count, galaxyVertexShader, galaxyFragmentShader);
  }

  constructor(count, vertexShader, fragmentShader) {
    this.group = new THREE.Group();
    this.group.rotation.x = -0.12;
    this.group.rotation.z = 0.22;
    this.material = null;
    this.createStars(count, vertexShader, fragmentShader);
  }

  createStars(count, vertexShader, fragmentShader) {
    const positions = new Float32Array(count * 3);
    const colors = new Float32Array(count * 3);
    const sizes = new Float32Array(count);
    const twinkles = new Float32Array(count);
    const phases = new Float32Array(count);
    const arms = 5;
    const radiusMax = 154;

    for (let index = 0; index < count; index += 1) {
      const radius = Math.pow(Math.random(), 1.7) * radiusMax + 3;
      const arm = index % arms;
      const spin = radius * 0.075;
      const spread = Math.pow(Math.random(), 2.2) * 14;
      const angle = (arm / arms) * Math.PI * 2 + spin + randomBetween(-spread, spread) * 0.04;
      const verticalSpread = 1.8 + radius * 0.035;
      const coreLift = Math.max(0, 1 - radius / 46) * randomBetween(-10, 10);

      positions[index * 3] = Math.cos(angle) * radius + randomBetween(-2.8, 2.8);
      positions[index * 3 + 1] = randomBetween(-verticalSpread, verticalSpread) + coreLift;
      positions[index * 3 + 2] = Math.sin(angle) * radius + randomBetween(-2.8, 2.8);

      const color = STAR_PALETTE[Math.floor(Math.random() * STAR_PALETTE.length)].clone();
      color.lerp(new THREE.Color('#ffffff'), Math.random() * 0.36);
      colors[index * 3] = color.r;
      colors[index * 3 + 1] = color.g;
      colors[index * 3 + 2] = color.b;

      sizes[index] = randomBetween(0.55, 2.45) * (radius < 28 ? 1.12 : 1);
      twinkles[index] = randomBetween(0.08, 1.0);
      phases[index] = randomBetween(0, Math.PI * 2);
    }

    const geometry = new THREE.BufferGeometry();
    geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));
    geometry.setAttribute('size', new THREE.BufferAttribute(sizes, 1));
    geometry.setAttribute('twinkle', new THREE.BufferAttribute(twinkles, 1));
    geometry.setAttribute('phase', new THREE.BufferAttribute(phases, 1));

    this.material = new THREE.ShaderMaterial({
      vertexShader,
      fragmentShader,
      uniforms: {
        uTime: { value: 0 },
        uPixelRatio: { value: Math.min(window.devicePixelRatio || 1, 2) },
      },
      transparent: true,
      depthWrite: false,
      blending: THREE.AdditiveBlending,
      vertexColors: true,
    });

    this.points = new THREE.Points(geometry, this.material);
    this.group.add(this.points);
  }

  update(delta, time) {
    this.group.rotation.y += delta * 0.018;
    this.material.uniforms.uTime.value = time;
  }
}
