import './styles.css';
import { RomanticGalaxyScene } from './Scene.js';
import { createAudioEngine } from './Utils.js';

const canvas = document.querySelector('#galaxy-canvas');
const intro = document.querySelector('#intro');
const musicToggle = document.querySelector('#music-toggle');
const centerButton = document.querySelector('#center-view');
const audio = createAudioEngine();
const experience = new RomanticGalaxyScene(canvas);

function logVisit() {
  fetch('./visit-log.php', {
    method: 'POST',
    cache: 'no-store',
    keepalive: true,
  }).catch(() => {});
}

async function boot() {
  logVisit();
  await experience.init();
  experience.start();

  window.setTimeout(() => {
    intro.classList.add('is-hidden');
    window.setTimeout(() => intro.remove(), 2600);
  }, 2600);
}

musicToggle.addEventListener('click', async () => {
  const active = await audio.toggle();
  musicToggle.classList.toggle('is-active', active);
  musicToggle.setAttribute('aria-label', active ? 'Desactivar música' : 'Activar música');
});

centerButton.addEventListener('click', () => experience.center());

function updateAudio() {
  audio.update(performance.now() / 1000);
  requestAnimationFrame(updateAudio);
}

boot().catch((error) => {
  console.error(error);
  intro.querySelector('span').textContent = 'No se pudo abrir el universo';
});
updateAudio();
