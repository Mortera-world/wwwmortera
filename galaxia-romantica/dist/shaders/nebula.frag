precision highp float;

uniform float uTime;
uniform vec3 uColorA;
uniform vec3 uColorB;
uniform float uSeed;
uniform float uIntensity;

varying vec2 vUv;
varying float vDepth;

float hash(vec2 p) {
  return fract(sin(dot(p, vec2(127.1, 311.7))) * 43758.5453123);
}

float noise(vec2 p) {
  vec2 i = floor(p);
  vec2 f = fract(p);
  vec2 u = f * f * (3.0 - 2.0 * f);
  return mix(
    mix(hash(i + vec2(0.0, 0.0)), hash(i + vec2(1.0, 0.0)), u.x),
    mix(hash(i + vec2(0.0, 1.0)), hash(i + vec2(1.0, 1.0)), u.x),
    u.y
  );
}

float fbm(vec2 p) {
  float value = 0.0;
  float amplitude = 0.5;
  for (int i = 0; i < 5; i++) {
    value += amplitude * noise(p);
    p = p * 2.02 + vec2(11.7, 4.3);
    amplitude *= 0.52;
  }
  return value;
}

void main() {
  vec2 centered = vUv - 0.5;
  float radial = smoothstep(0.62, 0.05, length(centered));
  vec2 flow = centered * 3.6 + vec2(sin(uTime * 0.055 + uSeed), cos(uTime * 0.05 + uSeed));
  float cloud = fbm(flow + uSeed);
  float filament = fbm(flow * 2.8 - uTime * 0.035);
  float alpha = radial * smoothstep(0.18, 0.92, cloud) * (0.42 + filament * 0.72);
  vec3 color = mix(uColorA, uColorB, cloud + vDepth * 3.0);
  gl_FragColor = vec4(color * (0.46 + filament * 0.72), alpha * uIntensity);
}
