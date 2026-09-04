# Galaxia Romántica Interactiva

Experiencia WebGL 3D con Three.js, shaders GLSL, partículas, bloom, cámara cinematográfica, palabras 3D y un agujero negro con forma de corazón.

## Abrir rápido

Sirve esta carpeta desde un servidor local y abre `index.html`. No uses `file://`, porque los shaders se cargan con `fetch`.

Con UniServer, entra a:

```text
http://localhost/galaxia-romantica/
```

## Desarrollo con Vite

```bash
pnpm install
pnpm run dev
```

El HTML incluye un import map a Three.js desde CDN para que la experiencia pueda ejecutarse sin empaquetar. El `package.json` mantiene Vite y Three.js declarados para desarrollo, build y futuras optimizaciones.

## Subir a hosting

Para producción sube el contenido de `dist/`, no la carpeta `src/`.

Si la URL será:

```text
https://tu-dominio.com/galaxia-romantica/
```

la carpeta del servidor debe quedar así:

```text
galaxia-romantica/
  index.html
  assets/
  shaders/
  .htaccess
```

No subas esos archivos a una base de datos. Deben ir en el administrador de archivos del hosting, FTP o carpeta pública del sitio.

## Imágenes, iconos y música

Coloca archivos públicos en:

```text
public/assets/imagenes/
public/assets/iconos/
public/assets/musica/
```

Después ejecuta `pnpm run build` y Vite los copiará a `dist/assets/`.

Ejemplo de ruta final:

```js
const texture = await new THREE.TextureLoader().loadAsync('./assets/imagenes/mi-imagen.webp');
```

## Imágenes e iconos orbitando

Para que una imagen o icono aparezca visualmente en el universo, colócalo en una carpeta pública:

```text
public/assets/imagenes/foto.webp
public/assets/iconos/corazon.png
```

Después agrégalo a:

```text
public/assets/orbit-items.json
```

Ejemplo:

```json
{
  "items": [
    {
      "enabled": true,
      "type": "image",
      "src": "./assets/imagenes/foto.webp",
      "size": 6,
      "radius": 34
    },
    {
      "enabled": true,
      "type": "icon",
      "src": "./assets/iconos/corazon.png",
      "size": 3.2,
      "radius": 24
    }
  ]
}
```

Luego ejecuta `build.bat` y sube de nuevo el contenido de `dist/`.

## Música

Los navegadores modernos no permiten reproducir música automáticamente al entrar. La música debe iniciar después de una acción del usuario, por eso está el botón `♪`.

Usa archivos `.mp3` si quieres agregar una canción real. Colócala en:

```text
public/assets/musica/cancion.mp3
```

Después edita:

```text
public/assets/audio-config.json
```

Ejemplo:

```json
{
  "enabled": true,
  "src": "./assets/musica/cancion.mp3",
  "volume": 0.72,
  "loop": true
}
```

La canción sonará cuando la persona toque el botón `♪`. No puede iniciar sola al abrir la página porque Chrome, Safari y Firefox bloquean autoplay con sonido.

## Log de visitas

La página llama a `visit-log.php` al cargar. En un servidor con PHP, cada visita se guarda en:

```text
logs/visits.log
```

Cada línea queda en JSON con fecha, hora, IP, user agent y referer. La hora usa zona `America/Guatemala`.

En la VPS, si no se crea el archivo, revisa permisos de escritura de:

```text
/public_html/galaxia-romantica/logs/
```

El archivo `public/logs/.htaccess` bloquea el acceso web directo al log en Apache.

## Estructura

```text
src/
  main.js
  Scene.js
  Camera.js
  Galaxy.js
  BlackHole.js
  Nebula.js
  Words.js
  Effects.js
  Controls.js
  Particles.js
  Utils.js
shaders/
  heart.vert
  heart.frag
  nebula.vert
  nebula.frag
  galaxy.vert
  galaxy.frag
assets/
  texturas/
  ruido/
  musica/
  iconos/
```
