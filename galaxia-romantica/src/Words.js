import * as THREE from 'three';
import { createSpriteTexture, pickWeighted, randomBetween } from './Utils.js';

const COMMON_WORDS = [
  'Te quiero',
  'Te quiero',
  'Te quiero',
  'Te quiero',
  'Te quiero',
  'Te quiero',
  'Te quiero',
  'Te extraño',
  'Te extraño',
  'Te extraño',
  'Te extraño',
  'Te extraño',
  'Te extraño',
  'Te extraño',
  'Te extraño',
  'Te necesito',
  'Dormilona',
  'Enojona',
  'Loca',
  'Marely',
  'Hermosa',
  'niña bonita',
  'Mi universo',
  'y si me gustas?',
  'Mi alguien favorito',
  'La más bonita',
  'Mi persona especial',
  'Mi alegría diaria',
  'Mi felicidad inesperada',
  'Mi pensamiento favorito',
  'Dulce niña',
  'Cosita linda',
  'Cosita preciosa',
  'Loquita',
  'Ojitos bonitos',
  'Ojitos bonitos',
  'Ojitos bonitos',
  'Ojitos bonitos',
  'Ojitos bonitos',
  'Corazón bonito',
  'Linda',
  'Contigo todo es mas bonito',
  'Quedate un ratito mas',
  'Quedate un ratito mas',
  'Quedate un ratito mas',
  'Quedate un ratito mas',
  'Quedate un ratito mas',
  'Quedate un ratito mas',
  'Siempre logras alegrarme',
  'No te duermas',
  'Siempre pienso en ti',
  'Siempre pienso en ti',
  'Siempre pienso en ti',
  'Siempre pienso en ti',
  'Siempre pienso en ti',
  'me haces feliz',
  'me haces feliz',
  'me haces feliz',
  'me haces feliz',
  'haces mis dias mejores',
  'Siempre tú',
  'Siempre tú',
  'Siempre tú',
  'Siempre tú',
];

const RARE_WORD = 'Me gustas Marely';

const WORD_POOL = [
  ...COMMON_WORDS.map((value) => ({ value, weight: 100 / COMMON_WORDS.length })),
];

export class Words {
  constructor(camera, count) {
    this.group = new THREE.Group();
    this.camera = camera;
    this.words = [];
    this.pull = 0;
    this.textureCache = new Map();
    this.createWords(count);
  }

  createWords(count) {
    for (let index = 0; index < count; index += 1) {
      const sprite = this.createWordSprite(index);
      this.words.push(sprite);
      this.group.add(sprite);
    }
  }

  createWordSprite(index) {
    const label = index === 0 ? RARE_WORD : pickWeighted(WORD_POOL);
    const rare = label === RARE_WORD;
    const cacheKey = `${label}:${rare}`;
    if (!this.textureCache.has(cacheKey)) {
      this.textureCache.set(cacheKey, createSpriteTexture(label, {
        rare,
        color: rare ? '#fff7fb' : '#fff8ff',
        glow: rare ? 'rgba(128, 224, 255, 0.95)' : 'rgba(255, 96, 205, 0.78)',
      }));
    }

    const material = new THREE.SpriteMaterial({
      map: this.textureCache.get(cacheKey),
      transparent: true,
      opacity: 0,
      depthWrite: false,
      blending: THREE.AdditiveBlending,
    });
    const sprite = new THREE.Sprite(material);
    sprite.userData = {
      label,
      rare,
      radius: randomBetween(15, rare ? 28 : 42),
      height: randomBetween(-9, 12),
      speed: randomBetween(0.1, 0.28) * (Math.random() > 0.5 ? 1 : -1),
      phase: randomBetween(0, Math.PI * 2),
      fadeOffset: index * 0.71,
      baseScale: rare ? randomBetween(7.5, 9.5) : randomBetween(4.8, 7.2),
    };
    return sprite;
  }

  pullToHeart() {
    this.pull = 1;
  }

  update(delta, time) {
    this.pull = Math.max(0, this.pull - delta * 0.55);
    this.words.forEach((sprite, index) => {
      const data = sprite.userData;
      const angle = data.phase + time * data.speed;
      const breathing = Math.sin(time * 0.42 + data.phase) * 1.8;
      const radius = THREE.MathUtils.lerp(data.radius + breathing, data.radius * 0.42, this.pull);
      sprite.position.set(
        Math.cos(angle) * radius,
        data.height + Math.sin(angle * 1.7 + time * 0.25) * 3,
        Math.sin(angle) * radius * 0.74,
      );
      const fade = 0.28 + Math.sin(time * 0.55 + data.fadeOffset) * 0.28;
      const visibleFade = THREE.MathUtils.smoothstep(fade, 0.05, 0.56);
      sprite.material.opacity = (data.rare ? 0.95 : 0.72) * visibleFade + this.pull * 0.24;
      const scale = data.baseScale * (data.rare ? 1.15 + Math.sin(time * 1.4) * 0.05 : 1);
      sprite.scale.set(scale * 2.9, scale, 1);
      sprite.lookAt(this.camera.position);

      if (index % 7 === 0 && sprite.position.length() < 11) {
        sprite.userData.radius = randomBetween(22, 44);
      }
    });
  }
}
