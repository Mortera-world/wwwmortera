import * as THREE from 'three';
import { easeInOutCubic } from './Utils.js';

export function createCamera() {
  const camera = new THREE.PerspectiveCamera(58, window.innerWidth / window.innerHeight, 0.1, 2600);
  camera.position.set(0, 26, 210);
  camera.userData.baseTarget = new THREE.Vector3(0, 0, 0);
  return camera;
}

export class CameraRig {
  constructor(camera, controls) {
    this.camera = camera;
    this.controls = controls;
    this.elapsed = 0;
    this.introDuration = 11.5;
    this.pointer = new THREE.Vector2();
    this.activeIntro = true;
  }

  setPointer(x, y) {
    this.pointer.set((x / window.innerWidth) * 2 - 1, -(y / window.innerHeight) * 2 + 1);
  }

  center() {
    this.controls.target.set(0, 0, 0);
    this.camera.position.set(0, 12, 86);
    this.controls.update();
    this.activeIntro = false;
  }

  update(delta, time) {
    this.elapsed += delta;
    const driftX = Math.sin(time * 0.18) * 1.5 + this.pointer.x * 2.2;
    const driftY = Math.cos(time * 0.14) * 1.1 + this.pointer.y * 1.2;

    if (this.activeIntro) {
      const progress = Math.min(this.elapsed / this.introDuration, 1);
      const eased = easeInOutCubic(progress);
      this.camera.position.x = THREE.MathUtils.lerp(0, 0, eased) + driftX * 0.4;
      this.camera.position.y = THREE.MathUtils.lerp(30, 10, eased) + driftY * 0.45;
      this.camera.position.z = THREE.MathUtils.lerp(230, 74, eased);
      this.controls.target.set(0, THREE.MathUtils.lerp(8, 0, eased), 0);
      this.controls.enabled = progress > 0.62;
      if (progress >= 1) this.activeIntro = false;
    } else {
      this.camera.position.x += driftX * delta * 0.025;
      this.camera.position.y += driftY * delta * 0.02;
      this.controls.enabled = true;
    }

    this.controls.update();
  }
}
