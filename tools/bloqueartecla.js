document.addEventListener('keydown', function(e) {
    // Bloquear F12
    if (e.keyCode === 123) {
        e.preventDefault();
        return false;
    }

    // Bloquear Ctrl+U
    if (e.ctrlKey && e.keyCode === 85) {
        e.preventDefault();
        return false;
    }

    // Bloquear Ctrl+Shift+I (Inspeccionar elemento)
    if (e.ctrlKey && e.shiftKey && e.keyCode === 73) {
        e.preventDefault();
        return false;
    }
});

document.addEventListener('contextmenu', function(e) {
  e.preventDefault();
});
