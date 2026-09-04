import * as THREE from 'three';
import heartVertexShader from '../shaders/heart.vert?raw';
import heartFragmentShader from '../shaders/heart.frag?raw';

export class BlackHole {
  static async create() {
    return new BlackHole(heartVertexShader, heartFragmentShader);
  }

  constructor(vertexShader, fragmentShader) {
    this.group = new THREE.Group();
    this.group.position.set(0, 0, 0);
    this.group.scale.setScalar(1.55);
    this.vertexShader = vertexShader;
    this.fragmentShader = fragmentShader;
    this.pulseBoost = 0;
    this.interactiveObjects = [];
    this.createHeartLayers();
    this.createAccretionRings();
    this.createSparks();
  }

  createHeartShape(scale = 1) {
    const shape = new THREE.Shape();
    const samples = 120;
    for (let index = 0; index <= samples; index += 1) {
      const t = (index / samples) * Math.PI * 2;
      const x = 16 * Math.pow(Math.sin(t), 3);
      const y = 13 * Math.cos(t) - 5 * Math.cos(2 * t) - 2 * Math.cos(3 * t) - Math.cos(4 * t);
      const pointX = x * 0.42 * scale;
      const pointY = (y - 2.5) * 0.42 * scale;
      if (index === 0) shape.moveTo(pointX, pointY);
      else shape.lineTo(pointX, pointY);
    }
    shape.closePath();
    return shape;
  }

  createHeartLayers() {
    const coreGeometry = new THREE.ShapeGeometry(this.createHeartShape(1));
    const glowGeometry = new THREE.ShapeGeometry(this.createHeartShape(1.18));
    const plasmaGeometry = new THREE.ShapeGeometry(this.createHeartShape(1.36));

    this.coreMaterial = new THREE.ShaderMaterial({
      vertexShader: this.vertexShader,
      fragmentShader: this.fragmentShader,
      uniforms: {
        uTime: { value: 0 },
        uLayer: { value: 0 },
        uPulse: { value: 0 },
      },
      transparent: true,
      depthWrite: false,
      depthTest: false,
    });
    this.glowMaterial = this.coreMaterial.clone();
    this.glowMaterial.uniforms = {
      uTime: { value: 0 },
      uLayer: { value: 1 },
      uPulse: { value: 0 },
    };
    this.plasmaMaterial = this.coreMaterial.clone();
    this.plasmaMaterial.uniforms = {
      uTime: { value: 0 },
      uLayer: { value: 2 },
      uPulse: { value: 0 },
    };
    this.glowMaterial.blending = THREE.AdditiveBlending;
    this.plasmaMaterial.blending = THREE.AdditiveBlending;

    this.core = new THREE.Mesh(coreGeometry, this.coreMaterial);
    this.glow = new THREE.Mesh(glowGeometry, this.glowMaterial);
    this.plasma = new THREE.Mesh(plasmaGeometry, this.plasmaMaterial);
    this.core.position.z = 0.04;
    this.glow.position.z = -0.02;
    this.plasma.position.z = -0.05;
    this.group.add(this.plasma, this.glow, this.core);
    this.plasma.renderOrder = 20;
    this.glow.renderOrder = 21;
    this.core.renderOrder = 22;
    this.interactiveObjects.push(this.core, this.glow, this.plasma);
  }

  createAccretionRings() {
    this.rings = [];
    const colors = ['#ff2fa8', '#7dd8ff', '#a65dff'];
    for (let index = 0; index < 3; index += 1) {
      const geometry = new THREE.TorusGeometry(8.8 + index * 1.5, 0.035 + index * 0.012, 12, 220);
      const material = new THREE.MeshBasicMaterial({
        color: colors[index],
        transparent: true,
        opacity: 0.55 - index * 0.08,
        blending: THREE.AdditiveBlending,
        depthWrite: false,
      });
      const ring = new THREE.Mesh(geometry, material);
      ring.rotation.x = Math.PI * 0.5 + index * 0.16;
      ring.rotation.y = index * 0.38;
      this.rings.push(ring);
      this.group.add(ring);
    }
  }

  createSparks() {
    const count = 720;
    const positions = new Float32Array(count * 3);
    const colors = new Float32Array(count * 3);
    const colorA = new THREE.Color('#ff4fbf');
    const colorB = new THREE.Color('#62dcff');

    for (let index = 0; index < count; index += 1) {
      const angle = Math.random() * Math.PI * 2;
      const radius = 8 + Math.random() * 13;
      positions[index * 3] = Math.cos(angle) * radius;
      positions[index * 3 + 1] = Math.sin(angle) * radius * 0.5;
      positions[index * 3 + 2] = (Math.random() - 0.5) * 9;
      const color = colorA.clone().lerp(colorB, Math.random());
      colors[index * 3] = color.r;
      colors[index * 3 + 1] = color.g;
      colors[index * 3 + 2] = color.b;
    }

    const geometry = new THREE.BufferGeometry();
    geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));
    const material = new THREE.PointsMaterial({
      size: 0.12,
      vertexColors: true,
      transparent: true,
      opacity: 0.9,
      blending: THREE.AdditiveBlending,
      depthWrite: false,
    });
    this.sparks = new THREE.Points(geometry, material);
    this.group.add(this.sparks);
  }

  pulse() {
    this.pulseBoost = 1;
  }

  update(delta, time, camera) {
    this.group.lookAt(camera.position);
    this.pulseBoost = Math.max(0, this.pulseBoost - delta * 0.85);
    const beat = 1 + Math.sin(time * 2.1) * 0.025 + this.pulseBoost * 0.17;
    this.core.scale.setScalar(beat);
    this.glow.scale.setScalar(1 + this.pulseBoost * 0.24);
    this.plasma.scale.setScalar(1 + Math.sin(time * 1.6) * 0.05 + this.pulseBoost * 0.34);

    [this.coreMaterial, this.glowMaterial, this.plasmaMaterial].forEach((material) => {
      material.uniforms.uTime.value = time;
      material.uniforms.uPulse.value = this.pulseBoost;
    });

    this.rings.forEach((ring, index) => {
      ring.rotation.z += delta * (0.35 + index * 0.12);
      ring.material.opacity = 0.36 + Math.sin(time * 1.4 + index) * 0.12 + this.pulseBoost * 0.22;
      ring.scale.setScalar(1 + this.pulseBoost * (0.06 + index * 0.03));
    });

    this.sparks.rotation.z -= delta * 0.12;
    this.sparks.rotation.y += delta * 0.08;
    this.sparks.material.opacity = 0.62 + this.pulseBoost * 0.32;
  }
}
