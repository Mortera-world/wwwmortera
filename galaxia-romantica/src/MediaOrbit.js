import * as THREE from 'three';
import { randomBetween } from './Utils.js';

const DEFAULT_CONFIG_URL = './assets/orbit-items.json';

export class MediaOrbit {
  constructor(camera) {
    this.group = new THREE.Group();
    this.camera = camera;
    this.items = [];
    this.textureLoader = new THREE.TextureLoader();
  }

  static async create(camera) {
    const orbit = new MediaOrbit(camera);
    await orbit.loadConfig();
    return orbit;
  }

  async loadConfig() {
    let config;
    try {
      const response = await fetch(DEFAULT_CONFIG_URL, { cache: 'no-store' });
      if (!response.ok) return;
      config = await response.json();
    } catch {
      return;
    }

    const entries = Array.isArray(config?.items) ? config.items : [];
    const enabledEntries = entries.filter((entry) => entry?.src && entry.enabled !== false);
    await Promise.all(enabledEntries.map((entry, index) => this.addItem(entry, index)));
  }

  async addItem(entry, index) {
    try {
      const texture = await this.textureLoader.loadAsync(entry.src);
      texture.colorSpace = THREE.SRGBColorSpace;
      texture.minFilter = THREE.LinearFilter;
      texture.magFilter = THREE.LinearFilter;

      const material = new THREE.SpriteMaterial({
        map: texture,
        transparent: true,
        opacity: 0,
        depthWrite: false,
      });
      const sprite = new THREE.Sprite(material);
      const aspect = Math.max(0.35, Math.min(2.4, texture.image.width / texture.image.height));
      const size = entry.size ?? (entry.type === 'icon' ? 3.2 : 5.8);

      sprite.scale.set(size * aspect, size, 1);
      sprite.userData = {
        radius: entry.radius ?? randomBetween(21, 50),
        height: entry.height ?? randomBetween(-10, 12),
        speed: entry.speed ?? randomBetween(0.08, 0.22),
        phase: entry.phase ?? index * 1.37 + randomBetween(0, Math.PI),
        opacity: entry.opacity ?? (entry.type === 'icon' ? 0.82 : 0.76),
        bob: randomBetween(1.4, 4.2),
      };

      this.items.push(sprite);
      this.group.add(sprite);
    } catch (error) {
      console.warn(`No se pudo cargar media orbital: ${entry.src}`, error);
    }
  }

  update(delta, time) {
    this.group.rotation.y += delta * 0.006;
    this.items.forEach((sprite) => {
      const data = sprite.userData;
      const angle = data.phase + time * data.speed;
      const pulse = Math.sin(time * 0.7 + data.phase) * 0.5 + 0.5;
      sprite.position.set(
        Math.cos(angle) * data.radius,
        data.height + Math.sin(time * 0.55 + data.phase) * data.bob,
        Math.sin(angle) * data.radius * 0.72,
      );
      sprite.material.opacity = data.opacity * (0.52 + pulse * 0.48);
      sprite.lookAt(this.camera.position);
    });
  }
}
