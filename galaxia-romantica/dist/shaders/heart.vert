uniform float uTime;
uniform float uPulse;

varying vec2 vUv;
varying vec3 vWorld;

void main() {
  vUv = uv;
  vec3 transformed = position;
  float breathing = sin(uTime * 2.1) * 0.035 + uPulse * 0.14;
  transformed.xy *= 1.0 + breathing;
  vWorld = (modelMatrix * vec4(transformed, 1.0)).xyz;
  gl_Position = projectionMatrix * modelViewMatrix * vec4(transformed, 1.0);
}
