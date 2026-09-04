import * as THREE from 'three';

export const QUALITY = (() => {
  const isMobile = matchMedia('(pointer: coarse), (max-width: 820px)').matches;
  const pixelRatio = Math.min(window.devicePixelRatio || 1, isMobile ? 1.55 : 2);
  return {
    isMobile,
    pixelRatio,
    galaxyStars: isMobile ? 42000 : 72000,
    heartParticles: isMobile ? 2600 : 5600,
    dustParticles: isMobile ? 1800 : 4200,
    wordCount: isMobile ? 40 : 40,
  };
})();

export function clamp(value, min, max) {
  return Math.min(Math.max(value, min), max);
}

export function easeInOutCubic(value) {
  return value < 0.5 ? 4 * value * value * value : 1 - Math.pow(-2 * value + 2, 3) / 2;
}

export function randomBetween(min, max) {
  return min + Math.random() * (max - min);
}

export function pickWeighted(items) {
  const total = items.reduce((sum, item) => sum + item.weight, 0);
  let cursor = Math.random() * total;
  for (const item of items) {
    cursor -= item.weight;
    if (cursor <= 0) return item.value;
  }
  return items[items.length - 1].value;
}

export function createSpriteTexture(label, options = {}) {
  const {
    color = '#fff8ff',
    glow = 'rgba(255, 84, 204, 0.85)',
    rare = false,
  } = options;
  const canvas = document.createElement('canvas');
  const context = canvas.getContext('2d');
  const width = rare ? 768 : 512;
  const height = 192;
  canvas.width = width;
  canvas.height = height;

  context.clearRect(0, 0, width, height);
  context.textAlign = 'center';
  context.textBaseline = 'middle';
  context.font = `${rare ? 600 : 500} ${rare ? 58 : 48}px Inter, Segoe UI, sans-serif`;
  context.shadowColor = glow;
  context.shadowBlur = rare ? 34 : 24;
  context.fillStyle = color;
  context.fillText(label, width / 2, height / 2);

  const texture = new THREE.CanvasTexture(canvas);
  texture.colorSpace = THREE.SRGBColorSpace;
  texture.minFilter = THREE.LinearFilter;
  texture.magFilter = THREE.LinearFilter;
  texture.generateMipmaps = false;
  return texture;
}

export function createAudioEngine(configUrl = './assets/audio-config.json') {
  let context;
  let gain;
  let oscillators = [];
  let filter;
  let enabled = false;
  let htmlAudio;
  let configPromise;

  async function loadConfig() {
    if (!configPromise) {
      configPromise = fetch(configUrl, { cache: 'no-store' })
        .then((response) => (response.ok ? response.json() : null))
        .catch(() => null);
    }
    return configPromise;
  }

  async function ensureHtmlAudio() {
    const config = await loadConfig();
    if (!config?.src || config.enabled === false) return false;
    if (!htmlAudio) {
      htmlAudio = new Audio(config.src);
      htmlAudio.loop = config.loop !== false;
      htmlAudio.volume = config.volume ?? 0.72;
      htmlAudio.preload = 'auto';
    }
    return true;
  }

  function ensure() {
    if (context) return;
    context = new AudioContext();
    gain = context.createGain();
    filter = context.createBiquadFilter();
    filter.type = 'lowpass';
    filter.frequency.value = 820;
    filter.Q.value = 0.7;
    gain.gain.value = 0;
    filter.connect(gain);
    gain.connect(context.destination);

    const frequencies = [110, 164.81, 220, 329.63];
    oscillators = frequencies.map((frequency, index) => {
      const oscillator = context.createOscillator();
      const localGain = context.createGain();
      oscillator.type = index % 2 ? 'triangle' : 'sine';
      oscillator.frequency.value = frequency;
      localGain.gain.value = index === 0 ? 0.18 : 0.07;
      oscillator.connect(localGain);
      localGain.connect(filter);
      oscillator.start();
      return { oscillator, localGain };
    });
  }

  return {
    async toggle() {
      if (await ensureHtmlAudio()) {
        enabled = !enabled;
        if (enabled) await htmlAudio.play();
        else htmlAudio.pause();
        return enabled;
      }

      ensure();
      if (context.state === 'suspended') await context.resume();
      enabled = !enabled;
      const now = context.currentTime;
      gain.gain.cancelScheduledValues(now);
      gain.gain.linearRampToValueAtTime(enabled ? 0.18 : 0, now + 0.9);
      return enabled;
    },
    update(time) {
      if (!context || !enabled) return;
      filter.frequency.value = 700 + Math.sin(time * 0.18) * 180;
      oscillators.forEach(({ oscillator }, index) => {
        oscillator.detune.value = Math.sin(time * (0.11 + index * 0.04)) * (9 + index * 3);
      });
    },
  };
}
