varying vec3 vColor;
varying float vAlpha;

void main() {
  vec2 uv = gl_PointCoord - 0.5;
  float dist = length(uv);
  float core = smoothstep(0.5, 0.0, dist);
  float halo = smoothstep(0.5, 0.12, dist) * 0.34;
  float alpha = (core + halo) * vAlpha;
  gl_FragColor = vec4(vColor * (0.78 + halo), alpha);
}
