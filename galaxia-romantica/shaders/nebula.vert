uniform float uTime;
varying vec2 vUv;
varying float vDepth;

void main() {
  vUv = uv;
  vec3 transformed = position;
  float ripple = sin((position.x + position.y) * 5.0 + uTime * 0.45) * 0.026;
  transformed.z += ripple;
  vDepth = ripple;
  gl_Position = projectionMatrix * modelViewMatrix * vec4(transformed, 1.0);
}
