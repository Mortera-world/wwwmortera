<?php
defined('MYAAC') or die('Direct access not allowed!');

if (!$logged) {
    echo "Debes iniciar sesión para jugar.";
    return;
}
?>

<style>
    .slot-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
        font-family: Arial, sans-serif;
        margin-top: 30px;
    }

    .slot-grid {
        display: grid;
        grid-template-columns: repeat(5, 100px);
        grid-template-rows: repeat(3, 100px);
        gap: 8px;
        background: #111;
        padding: 15px;
        border: 3px solid gold;
        border-radius: 12px;
    }

    .slot-cell {
        width: 100px;
        height: 100px;
        background: #222;
        border: 2px solid #555;
        border-radius: 8px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .slot-cell img {
        width: 90%;
        height: 90%;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .slot-cell img.spin {
        animation: spin 0.4s ease;
    }

    @keyframes spin-reel {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .spin {
        animation: spin-reel 0.5s ease-in-out infinite;
    }

    .controls {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    #spinBtn {
        padding: 8px 20px;
        background: gold;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
    }

    #spinBtn:disabled {
        background: gray;
        cursor: not-allowed;
    }

    #result {
        margin-top: 10px;
        color: #eee;
    }

    #balance {
        font-weight: bold;
        color: #ff0000;
    }

    /* Efecto brillo dorado animado para celdas ganadoras */
     @keyframes glow {
       0%, 100% {
         box-shadow: 0 0 6px 2px gold, 0 0 12px 6px orange;
         border-color: gold;
       }
       50% {
         box-shadow: 0 0 14px 6px gold, 0 0 20px 10px orange;
         border-color: #ffcc00;
       }
     }
     
     .slot-cell.winning {
       animation: glow 1.5s ease-in-out infinite alternate;
       border-width: 3px !important;
     }

</style>

<div class="slot-container">
    <h1>🎰 slot machine</h1>
    <div>Tcs: <span id="balance"><?= (int) $account_logged->getCustomField('coins_transferable'); ?></span></div>

    <div class="controls">
        <label for="betAmount">Apuesta:</label>
        <input type="number" id="betAmount" min="1" value="10">
        <button id="spinBtn">Girar</button>
    </div>

    <div class="slot-grid">
        <?php for ($i = 0; $i < 15; $i++): ?>
            <div class="slot-cell" data-index="<?= $i ?>"><img src="/assets/images/slots/1.png" alt="icon"></div>
        <?php endfor; ?>
    </div>

    <div id="result"></div>
</div>

<script>
const spinBtn = document.getElementById("spinBtn");
const betInput = document.getElementById("betAmount");
const resultText = document.getElementById("result");
const balanceDisplay = document.getElementById("balance");
const cells = document.querySelectorAll(".slot-cell");

let winningLinesData = [];

spinBtn.addEventListener("click", async () => {
  const bet = parseInt(betInput.value);
  if (isNaN(bet) || bet < 1) {
    resultText.textContent = "Apuesta inválida.";
    return;
  }

  spinBtn.disabled = true;   // Bloquea el botón al empezar
  resultText.textContent = "Girando...";

  try {
    const response = await fetch("/?subtopic=spin", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ bet }),
    });

    const data = await response.json();

    if (!data.success) {
      resultText.textContent = data.message || "Error al girar.";
      spinBtn.disabled = false;
      return;
    }

    winningLinesData = data.winningLines || [];

    // Ejecutar animación de giro, y luego mostrar resultado y líneas ganadoras
    animateSpin(data.grid, () => {
      balanceDisplay.textContent = data.balance;
      resultText.textContent = data.message;
      markWinningLines(winningLinesData);
      spinBtn.disabled = false;  // Desbloquear cuando termine todo
    });

  } catch (err) {
    resultText.textContent = "Error en la conexión.";
    spinBtn.disabled = false;
  }
});

function animateSpin(grid, callback) {
  const flatGrid = grid.flat();
  const spinDuration = 3500; // ms total de animación
  const spinInterval = 100; // ms cambio rápido imágenes

  const intervalId = setInterval(() => {
    cells.forEach(cell => {
      const img = cell.querySelector("img");
      const randomSymbol = Math.floor(Math.random() * 10) + 1;
      img.src = `/assets/images/slots/${randomSymbol}.png`;
      img.classList.add("spin");
      clearHighlight(cell); // Quitar cualquier línea previa
    });
  }, spinInterval);

  setTimeout(() => {
    clearInterval(intervalId);
    cells.forEach((cell, i) => {
      const img = cell.querySelector("img");
      img.src = `/assets/images/slots/${flatGrid[i]}.png`;
      img.classList.remove("spin");
    });

    callback(); // Llamar después de terminar la animación
  }, spinDuration);
}

function clearHighlight(cell) {
  cell.style.boxShadow = "";
  cell.style.borderColor = "#555";
  cell.classList.remove("winning");  // quitar clase animada
}

function markWinningLines(winningLines) {
  // Limpiar todas las marcas
  cells.forEach(cell => clearHighlight(cell));

  winningLines.forEach(line => {
    line.positions.forEach(pos => {
      const [row, col] = pos;
      const index = row * 5 + col;
      const cell = cells[index];
      cell.classList.add("winning");  // agregar clase animada
    });
  });
}

</script>
