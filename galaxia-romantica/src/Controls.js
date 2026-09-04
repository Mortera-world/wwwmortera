import { OrbitControls } from 'three/addons/controls/OrbitControls.js';

export function createControls(camera, domElement) {
  const controls = new OrbitControls(camera, domElement);
  controls.enableDamping = true;
  controls.dampingFactor = 0.045;
  controls.rotateSpeed = 0.48;
  controls.zoomSpeed = 0.72;
  controls.panSpeed = 0.34;
  controls.enablePan = false;
  controls.minDistance = 28;
  controls.maxDistance = 245;
  controls.autoRotate = false;
  controls.target.set(0, 0, 0);
  controls.enabled = false;
  return controls;
}
