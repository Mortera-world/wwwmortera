# Loteria Mexicana Online para MyAAC

Modulo multijugador preparado para MyAAC 0.8.14, PHP 8.2 y MySQL/MariaDB. Usa exclusivamente `accounts.coins_transferable` y la cuenta autenticada por MyAAC.

## Instalacion

1. Haz una copia de seguridad de la base de datos de TFS/MyAAC.
2. Para una instalacion nueva, importa `loteria-install.sql`. Si ya instalaste la primera version, importa solamente `loteria-upgrade-v2.sql`.
3. Confirma que existen los 54 JPG en `images/loteria/cards/`. Esta instalacion ya contiene los 54 y el catalogo usa sus nombres reales.
4. Coloca los MP3 opcionales en `sounds/loteria/`. Un audio ausente se ignora y no detiene la partida.
5. Limpia la cache de MyAAC desde el panel administrativo o espera a que se renueve. El SQL agrega el enlace **Loteria Mexicana** a los temas `tibiacom` y `kathrine`.
6. Abre `https://tu-dominio/?loteria` o `?subtopic=loteria` (o `/loteria` si usas URLs amigables) con una cuenta iniciada.

La base de datos local no estaba ejecutandose durante la entrega, por lo que el SQL no se importo automaticamente. La pagina mostrara un aviso de instalacion hasta que se importe.

## Archivos

- `system/pages/loteria.php`: pagina MyAAC y entrada de las llamadas AJAX.
- `system/loteria-api.php`: controlador JSON, metodos HTTP y proteccion CSRF.
- `system/loteria-service.php`: reglas, bloqueos, transacciones, sorteo y pagos.
- `system/loteria-config.php`: limites y reglas modificables.
- `system/loteria-catalog.php`: catalogo de las 54 barajas, imagen y audio.
- `tools/loteria.js`: interfaz, polling y reproduccion de audio.
- `tools/loteria.css`: interfaz responsive.
- `loteria-install.sql`: tablas, indices, restricciones y enlaces de menu.
- `loteria-upgrade-v2.sql`: migracion de la primera version sin perder salas ni movimientos existentes.
- `loteria-uninstall.sql`: desinstalacion destructiva opcional.

## Integracion con la cuenta MyAAC

MyAAC carga la pagina despues de ejecutar su manejador de sesion. El modulo comprueba `$logged` y obtiene el ID exclusivamente mediante:

```php
$accountId = (int) $account_logged->getId();
```

El navegador nunca envia un `account_id`. El backend lo toma de la sesion activa para cada operacion. El saldo se bloquea y modifica dentro de una transaccion:

```sql
SELECT coins_transferable FROM accounts WHERE id = ? FOR UPDATE;
UPDATE accounts
SET coins_transferable = coins_transferable - ?
WHERE id = ? AND coins_transferable >= ?;
```

Los premios se acreditan con `UPDATE accounts SET coins_transferable = coins_transferable + ?`. Cada compra y premio tambien queda en `loteria_coin_ledger`, cuyo `reference_key` unico impide procesar el mismo movimiento dos veces.

## Endpoints

Todos pasan por la pagina `loteria` y requieren sesion. Las acciones POST requieren el encabezado CSRF emitido por la pagina.

- `GET loteria_action=list`: lista de salas y saldo actual.
- `GET loteria_action=state&room_id=ID`: estado completo y avance programado del cantor.
- `POST loteria_action=create`: crear sala.
- `POST loteria_action=edit`: editar una sala en espera, solo el creador.
- `POST loteria_action=delete`: eliminar y reembolsar una sala, solo el creador.
- `POST loteria_action=leave`: cerrar la presencia del jugador en la sala.
- `POST loteria_action=buy`: comprar una o dos ofertas generadas por el servidor.
- `POST loteria_action=start`: iniciar, solo el creador.
- `POST loteria_action=mark`: marcar una casilla ya cantada y verificar ganador.

Con URLs no amigables, una llamada se ve como `?subtopic=loteria&loteria_action=state&room_id=1`. No hacen falta reglas adicionales de Nginx.

## Reglas y personalizacion

Edita `system/loteria-config.php` para cambiar:

- `price.min` y `price.max`;
- velocidades y presets;
- minimo y maximo de jugadores;
- `cards.per_player` (la interfaz y el backend admiten el valor configurado);
- porcentajes en `prizes` (deben ser tres y sumar 100);
- `one_prize_per_account`;
- modo inicial y nombres en `victory_modes`;
- tiempo de presencia y eliminacion de salas vacias;
- intervalo de polling;
- rutas base de imagenes y audios.

Cada sala guarda una copia de las reglas al crearse. Los cambios globales afectan salas nuevas; el creador puede editar una sala existente solamente antes de iniciarla.

Modos implementados y validados completamente en PHP:

- `traditional`: cualquiera de las 4 filas, 4 columnas, 2 diagonales o cualquiera de los 9 cuadros 2x2;
- `square`: cualquiera de los 9 bloques posibles de 2x2;
- `four_corners`: posiciones 1, 4, 13 y 16;
- `full_card`: las 16 posiciones.

## Imagenes y audios

El catalogo mapea cada ID a su archivo exacto. Los audios siguen el formato `ID-nombre-con-guiones.mp3`, por ejemplo:

- `1-el-gallo.mp3`
- `2-el-diablito.mp3`
- `27-el-corazon.mp3`

No se comprueba el archivo de audio en el backend: el navegador intenta reproducirlo y continua silenciosamente si recibe 404 o si el autoplay esta bloqueado. El boton **Sonido activo** permite al jugador habilitar o deshabilitar el cantor.

## Seguridad y concurrencia

- Ofertas de cartas persistidas con tokens aleatorios de 256 bits; el cliente no puede inventar una carta.
- Limite de cartas, capacidad, estado de sala, saldo, pertenencia y barajas cantadas validados nuevamente en PHP.
- Bloqueo `FOR UPDATE` de sala y cuenta durante compras/pagos.
- Indices unicos para orden del sorteo, baraja sorteada, lugar ganador, carta ganadora y movimientos de monedas.
- La tercera victoria paga los tres premios y finaliza la sala en la misma transaccion.
- El redondeo asigna el residuo al tercer lugar, por lo que siempre se reparte exactamente el pozo completo.
- Un doble clic reutiliza ofertas ya consumidas y se rechaza sin un segundo cobro.
- Una casilla se pinta inmediatamente en el navegador, pero PHP confirma que pertenece a la carta, que fue cantada y que no estaba marcada. Si falla, la interfaz la revierte.
- Las consultas AJAX liberan el bloqueo de sesion de MyAAC despues de autenticar y validar CSRF, evitando que el marcado espere detras del polling.

El cantor avanza al vencer `next_draw_at` durante el polling de cualquier jugador conectado. Como se bloquea la fila de la sala, veinte clientes consultando a la vez producen una sola baraja, nunca veinte.

## Operacion

Se requieren tres cuentas distintas con al menos una carta para iniciar porque existen tres premios y, por defecto, una cuenta solo puede ocupar un lugar. Si se agotan las 54 barajas, la sala permanece en juego para que los participantes terminen de marcar.

Al registrar al tercer ganador, la misma transaccion paga el pozo, copia partida/barajas/ganadores a `loteria_game_history` y `loteria_winner_history`, y elimina la sala junto con cartas, ofertas, presencia y sorteos temporales. El estado archivado sigue disponible en la URL original para mostrar los resultados.

Una eliminacion manual o por dos minutos de inactividad reembolsa `total_paid` a cada cuenta antes de borrar la sala. Los reembolsos se conservan en `loteria_coin_ledger`. La limpieza se ejecuta desde el lobby cada diez segundos y, como respaldo, desde las consultas de sala con limitacion de frecuencia.

Para eliminar completamente el modulo, respalda primero el historial y ejecuta `loteria-uninstall.sql`; despues elimina los archivos enumerados arriba.
