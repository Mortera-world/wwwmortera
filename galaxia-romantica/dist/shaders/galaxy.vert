attribute float size;
attribute float twinkle;
attribute float phase;

uniform float uTime;
uniform float uPixelRatio;

varying vec3 vColor;
varying float vAlpha;

void main() {
  vColor = color;
  vec3 animated = position;
  float wave = sin(uTime * (0.7 + twinkle) + phase);
  animated.y += wave * twinkle * 0.45;

  vec4 mvPosition = modelViewMatrix * vec4(animated, 1.0);
  float depth = clamp(210.0 / -mvPosition.z, 0.35, 7.0);
  gl_PointSize = size * depth * uPixelRatio * (0.58 + wave * 0.16);
  vAlpha = 0.24 + twinkle * 0.34;
  gl_Position = projectionMatrix * mvPosition;
}
