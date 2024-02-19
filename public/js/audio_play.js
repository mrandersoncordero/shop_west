var miAudio = document.getElementById("miAudio");
var btnReproducir = document.getElementById("reproducirBtn");

// Esperar 30 segundos antes de reproducir la canción al cargar la página
window.addEventListener('load', function () {
    miAudio.volume = 0.2;
    setTimeout(function () {
        miAudio.play().catch(function (error) {
            // Manejar el error de reproducción automática
            console.error("Reproducción automática no permitida: ", error);
        });
    }, 30000); // 30000 milisegundos = 30 segundos
});

function togglePlayPause() {
    if (miAudio.paused) {
        miAudio.play();
        btnReproducir.innerHTML = "⏸";
    } else {
        miAudio.pause();
        btnReproducir.innerHTML = "▶️";
    }
}