# Slot Machine (Tragamonedas) - Base PHP

Este repositorio ya incluye la página `system/pages/slot.php` y el endpoint `system/pages/spin.php`.
A continuación se deja un ejemplo de tablas/campos necesarios para usuarios y balance de coins transferibles.

## Ejemplo de tablas

> **Nota:** Adáptalas a tu estructura real. Los nombres y tipos deben coincidir con tu motor SQL.

```sql
CREATE TABLE accounts (
  id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  coins_transferable INT UNSIGNED NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE slot_spins (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  account_id INT UNSIGNED NOT NULL,
  bet INT UNSIGNED NOT NULL,
  win INT UNSIGNED NOT NULL,
  grid JSON NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_slot_spins_account FOREIGN KEY (account_id) REFERENCES accounts(id)
);
```

## Campos relevantes

- `accounts.coins_transferable`: saldo en Tibia Coins transferibles.
- `slot_spins`: auditoría opcional de cada giro (apuesta, premio y grilla resultante).
