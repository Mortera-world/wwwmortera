precision highp float;

uniform float uTime;
uniform float uLayer;
uniform float uPulse;

varying vec2 vUv;
varying vec3 vWorld;

float hash(vec2 p) {
  return fract(sin(dot(p, vec2(41.0, 289.0))) * 45758.5453);
}

float noise(vec2 p) {
  vec2 i = floor(p);
  vec2 f = fract(p);
  vec2 u = f * f * (3.0 - 2.0 * f);
  return mix(
    mix(hash(i), hash(i + vec2(1.0, 0.0)), u.x),
    mix(hash(i + vec2(0.0, 1.0)), hash(i + vec2(1.0, 1.0)), u.x),
    u.y
  );
}

void main() {
  vec2 centered = vUv - 0.5;
  float radius = length(centered);
  float plasma = noise(centered * 13.0 + vec2(uTime * 0.35, -uTime * 0.22));
  float rim = smoothstep(0.48, 0.18, radius);
  float edge = smoothstep(0.17, 0.46, radius);
  vec3 colorA = vec3(1.0, 0.04, 0.38);
  vec3 colorB = vec3(0.18, 0.74, 1.0);
  vec3 colorC = vec3(0.72, 0.18, 1.0);
  vec3 plasmaColor = mix(mix(colorA, colorC, sin(uTime * 0.35) * 0.5 + 0.5), colorB, plasma);

  if (uLayer < 0.5) {
    gl_FragColor = vec4(vec3(0.0), 1.0);
    return;
  }

  if (uLayer < 1.5) {
    float glow = rim * edge;
    gl_FragColor = vec4(plasmaColor * (1.7 + uPulse), glow * (0.62 + uPulse * 0.22));
    return;
  }

  float turbulence = smoothstep(0.22, 0.95, plasma);
  float alpha = rim * edge * turbulence * (0.42 + uPulse * 0.38);
  gl_FragColor = vec4(plasmaColor * (2.0 + turbulence), alpha);
}
