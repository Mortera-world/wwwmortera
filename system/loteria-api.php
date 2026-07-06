<?php
/** Controlador JSON del modulo. */
defined('MYAAC') or die('Direct access not allowed!');

final class LoteriaApi
{
    public static function csrfToken(): string
    {
        if (!isset($_SESSION['loteria_csrf']) || !is_string($_SESSION['loteria_csrf'])) {
            $_SESSION['loteria_csrf'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['loteria_csrf'];
    }

    public static function dispatch(
        LoteriaService $service,
        bool $logged,
        int $accountId,
        string $displayName
    ): void {
        header('Content-Type: application/json; charset=utf-8');
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('X-Content-Type-Options: nosniff');

        try {
            if (!$logged || $accountId <= 0) {
                throw new LoteriaDomainException('Debes iniciar sesion para jugar.', 401);
            }

            $action = strtolower((string)($_GET['loteria_action'] ?? ''));
            $method = strtoupper((string)($_SERVER['REQUEST_METHOD'] ?? 'GET'));
            $input = self::readJsonBody();

            if ($method === 'POST') {
                self::verifyCsrf();
            }

            $shouldCleanup = false;
            if ($action === 'list') {
                $shouldCleanup = true;
                $_SESSION['loteria_cleanup_at'] = time();
            } elseif ($action === 'state' && (int)($_SESSION['loteria_cleanup_at'] ?? 0) < time() - 15) {
                $shouldCleanup = true;
                $_SESSION['loteria_cleanup_at'] = time();
            }
            // La identidad ya fue validada. Liberar la sesion evita que polling y clics
            // de la misma cuenta se bloqueen entre si; MySQL protege el estado del juego.
            if (session_status() === PHP_SESSION_ACTIVE) {
                session_write_close();
            }

            switch ($action) {
                case 'list':
                    self::requireMethod($method, 'GET');
                    if ($shouldCleanup) {
                        $service->cleanupInactiveRooms();
                    }
                    self::success([
                        'rooms' => $service->listRooms($accountId),
                        'balance' => $service->accountBalance($accountId),
                    ]);
                    return;

                case 'state':
                    self::requireMethod($method, 'GET');
                    if ($shouldCleanup) {
                        $service->cleanupInactiveRooms();
                    }
                    $roomId = self::positiveInt($_GET['room_id'] ?? 0, 'Sala invalida.');
                    self::success($service->roomState($roomId, $accountId));
                    return;

                case 'create':
                    self::requireMethod($method, 'POST');
                    $roomId = $service->createRoom($accountId, $displayName, $input);
                    self::success(['room_id' => $roomId], 201);
                    return;

                case 'edit':
                    self::requireMethod($method, 'POST');
                    $roomId = self::positiveInt($input['room_id'] ?? 0, 'Sala invalida.');
                    $service->editRoom($roomId, $accountId, $input);
                    self::success(['updated' => true]);
                    return;

                case 'delete':
                    self::requireMethod($method, 'POST');
                    $roomId = self::positiveInt($input['room_id'] ?? 0, 'Sala invalida.');
                    $service->deleteRoom($roomId, $accountId);
                    self::success(['deleted' => true]);
                    return;

                case 'leave':
                    self::requireMethod($method, 'POST');
                    $roomId = self::positiveInt($input['room_id'] ?? 0, 'Sala invalida.');
                    $service->leaveRoom($roomId, $accountId);
                    self::success(['left' => true]);
                    return;

                case 'buy':
                    self::requireMethod($method, 'POST');
                    $roomId = self::positiveInt($input['room_id'] ?? 0, 'Sala invalida.');
                    $tokens = is_array($input['tokens'] ?? null) ? $input['tokens'] : [];
                    self::success($service->buyCards($roomId, $accountId, $displayName, $tokens));
                    return;

                case 'start':
                    self::requireMethod($method, 'POST');
                    $roomId = self::positiveInt($input['room_id'] ?? 0, 'Sala invalida.');
                    $service->startRoom($roomId, $accountId);
                    self::success(['started' => true]);
                    return;

                case 'intro_finished':
                    self::requireMethod($method, 'POST');
                    $roomId = self::positiveInt($input['room_id'] ?? 0, 'Sala invalida.');
                    $service->finishIntroduction($roomId, $accountId);
                    self::success(['finished' => true]);
                    return;

                case 'mark':
                    self::requireMethod($method, 'POST');
                    $roomId = self::positiveInt($input['room_id'] ?? 0, 'Sala invalida.');
                    $cardId = self::positiveInt($input['player_card_id'] ?? 0, 'Carta invalida.');
                    $cellIndex = filter_var($input['cell_index'] ?? null, FILTER_VALIDATE_INT);
                    if ($cellIndex === false || $cellIndex < 0 || $cellIndex > 15) {
                        throw new LoteriaDomainException('Casilla invalida.');
                    }
                    self::success($service->markCell($roomId, $accountId, $cardId, $cellIndex));
                    return;

                default:
                    throw new LoteriaDomainException('Endpoint de loteria no encontrado.', 404);
            }
        } catch (LoteriaDomainException $exception) {
            self::failure($exception->getMessage(), $exception->getHttpStatus());
        } catch (Throwable $exception) {
            error_log('[loteria] ' . $exception->getMessage() . "\n" . $exception->getTraceAsString());
            self::failure('Ocurrio un error interno. Revisa el registro del servidor.', 500);
        }
    }

    private static function readJsonBody(): array
    {
        if (strtoupper((string)($_SERVER['REQUEST_METHOD'] ?? 'GET')) !== 'POST') {
            return [];
        }
        $raw = file_get_contents('php://input');
        if ($raw === false || trim($raw) === '') {
            return [];
        }
        try {
            $input = json_decode($raw, true, 32, JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            throw new LoteriaDomainException('El cuerpo JSON no es valido.');
        }
        if (!is_array($input)) {
            throw new LoteriaDomainException('El cuerpo de la solicitud debe ser un objeto JSON.');
        }
        return $input;
    }

    private static function verifyCsrf(): void
    {
        $received = (string)($_SERVER['HTTP_X_CSRF_TOKEN'] ?? '');
        $expected = self::csrfToken();
        if ($received === '' || !hash_equals($expected, $received)) {
            throw new LoteriaDomainException('La sesion de seguridad vencio. Recarga la pagina.', 419);
        }
    }

    private static function positiveInt($value, string $message): int
    {
        $number = filter_var($value, FILTER_VALIDATE_INT);
        if ($number === false || $number <= 0) {
            throw new LoteriaDomainException($message);
        }
        return $number;
    }

    private static function requireMethod(string $actual, string $expected): void
    {
        if ($actual !== $expected) {
            header('Allow: ' . $expected);
            throw new LoteriaDomainException('Metodo HTTP no permitido.', 405);
        }
    }

    private static function success(array $data, int $status = 200): void
    {
        http_response_code($status);
        echo json_encode(['ok' => true, 'data' => $data], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    private static function failure(string $message, int $status): void
    {
        http_response_code($status);
        echo json_encode(['ok' => false, 'error' => $message], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}
