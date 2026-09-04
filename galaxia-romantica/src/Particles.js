import * as THREE from 'three';
import { randomBetween } from './Utils.js';

export class Particles {
  constructor(quality) {
    this.group = new THREE.Group();
    this.quality = quality;
    this.burstPower = 0;
    this.createHeartParticles(quality.heartParticles);
    this.createDust(quality.dustParticles);
    this.createComets();
  }

  createHeartParticles(count) {
    this.heartCount = count;
    this.heartPositions = new Float32Array(count * 3);
    this.heartSeeds = new Float32Array(count * 4);
    const colors = new Float32Array(count * 3);
    const colorA = new THREE.Color('#ff5bc8');
    const colorB = new THREE.Color('#54d8ff');
    const colorC = new THREE.Color('#a35cff');

    for (let index = 0; index < count; index += 1) {
      const radius = randomBetween(8, 54);
      const angle = randomBetween(0, Math.PI * 2);
      const speed = randomBetween(0.16, 0.72) * (Math.random() > 0.5 ? 1 : -1);
      const mode = Math.random();
      this.heartSeeds.set([radius, angle, speed, mode], index * 4);
      this.heartPositions.set([Math.cos(angle) * radius, randomBetween(-14, 14), Math.sin(angle) * radius], index * 3);
      const color = colorA.clone().lerp(mode > 0.66 ? colorB : colorC, Math.random());
      colors.set([color.r, color.g, color.b], index * 3);
    }

    const geometry = new THREE.BufferGeometry();
    geometry.setAttribute('position', new THREE.BufferAttribute(this.heartPositions, 3));
    geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));
    const material = new THREE.PointsMaterial({
      size: this.quality.isMobile ? 0.105 : 0.085,
      vertexColors: true,
      transparent: true,
      opacity: 0.9,
      blending: THREE.AdditiveBlending,
      depthWrite: false,
    });
    this.heartParticles = new THREE.Points(geometry, material);
    this.group.add(this.heartParticles);
  }

  createDust(count) {
    const positions = new Float32Array(count * 3);
    const colors = new Float32Array(count * 3);
    const colorA = new THREE.Color('#ffffff');
    const colorB = new THREE.Color('#6ed8ff');

    for (let index = 0; index < count; index += 1) {
      positions[index * 3] = randomBetween(-210, 210);
      positions[index * 3 + 1] = randomBetween(-90, 90);
      positions[index * 3 + 2] = randomBetween(-210, 120);
      const color = colorA.clone().lerp(colorB, Math.random() * 0.55);
      colors.set([color.r, color.g, color.b], index * 3);
    }

    const geometry = new THREE.BufferGeometry();
    geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));
    const material = new THREE.PointsMaterial({
      size: 0.045,
      vertexColors: true,
      transparent: true,
      opacity: 0.42,
      blending: THREE.AdditiveBlending,
      depthWrite: false,
    });
    this.dust = new THREE.Points(geometry, material);
    this.group.add(this.dust);
  }

  createComets() {
    this.comets = [];
    for (let index = 0; index < 4; index += 1) {
      const geometry = new THREE.BufferGeometry();
      const positions = new Float32Array(18);
      geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
      const material = new THREE.LineBasicMaterial({
        color: index % 2 ? '#ff89d8' : '#88dcff',
        transparent: true,
        opacity: 0,
        blending: THREE.AdditiveBlending,
      });
      const comet = new THREE.Line(geometry, material);
      comet.userData = {
        next: randomBetween(2, 9) + index * 1.7,
        life: 0,
        duration: randomBetween(1.0, 1.8),
        start: new THREE.Vector3(),
        velocity: new THREE.Vector3(),
      };
      this.comets.push(comet);
      this.group.add(comet);
    }
  }

  burst() {
    this.burstPower = 1;
  }

  updateHeartParticles(delta, time) {
    this.burstPower = Math.max(0, this.burstPower - delta * 0.72);
    for (let index = 0; index < this.heartCount; index += 1) {
      const seedIndex = index * 4;
      const positionIndex = index * 3;
      const baseRadius = this.heartSeeds[seedIndex];
      const phase = this.heartSeeds[seedIndex + 1];
      const speed = this.heartSeeds[seedIndex + 2];
      const mode = this.heartSeeds[seedIndex + 3];
      const absorb = mode < 0.48 ? (Math.sin(time * 0.5 + phase) + 1) * 0.5 : 0;
      const escape = mode > 0.88 ? Math.sin(time * 0.35 + phase) * 7 : 0;
      const radius = baseRadius - absorb * 15 + escape + this.burstPower * 18;
      const angle = phase + time * speed;
      this.heartPositions[positionIndex] = Math.cos(angle) * radius;
      this.heartPositions[positionIndex + 1] = Math.sin(angle * 1.4 + phase) * (5 + baseRadius * 0.18);
      this.heartPositions[positionIndex + 2] = Math.sin(angle) * radius * 0.62;
    }
    this.heartParticles.geometry.attributes.position.needsUpdate = true;
  }

  updateComets(delta) {
    this.comets.forEach((comet) => {
      const data = comet.userData;
      data.next -= delta;
      if (data.next <= 0 && data.life <= 0) {
        data.life = data.duration;
        data.next = randomBetween(7, 16);
        data.start.set(randomBetween(-140, 120), randomBetween(34, 90), randomBetween(-110, -20));
        data.velocity.set(randomBetween(38, 70), randomBetween(-24, -52), randomBetween(-10, 18));
      }

      if (data.life > 0) {
        data.life -= delta;
        const age = 1 - data.life / data.duration;
        const headX = data.start.x + data.velocity.x * age;
        const headY = data.start.y + data.velocity.y * age;
        const headZ = data.start.z + data.velocity.z * age;
        const positions = comet.geometry.attributes.position.array;
        for (let segment = 0; segment < 6; segment += 1) {
          const trail = segment * 0.18;
          positions[segment * 3] = headX - data.velocity.x * trail;
          positions[segment * 3 + 1] = headY - data.velocity.y * trail;
          positions[segment * 3 + 2] = headZ - data.velocity.z * trail;
        }
        comet.geometry.attributes.position.needsUpdate = true;
        comet.material.opacity = Math.sin(Math.PI * age) * 0.84;
      } else {
        comet.material.opacity = 0;
      }
    });
  }

  update(delta, time) {
    this.group.rotation.y += delta * 0.01;
    this.dust.rotation.y -= delta * 0.006;
    this.dust.rotation.x += delta * 0.002;
    this.updateHeartParticles(delta, time);
    this.updateComets(delta);
  }
}
