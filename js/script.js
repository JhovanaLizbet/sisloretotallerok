// Función para abrir y cerrar el menú desplegable
function toggleDropdown() {
    var dropdown = document.getElementById("dropdown");
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
}

// Evento para abrir/cerrar el menú desplegable al hacer clic en la imagen de perfil
document.getElementById("profileBtn").addEventListener("click", toggleDropdown);

// Evento para cerrar sesión al hacer clic en "Cerrar Sesión"
document.getElementById("logout").addEventListener("click", function() {
    // Aquí puedes agregar la lógica para cerrar la sesión, como redireccionar al usuario o realizar una solicitud al servidor.
    alert("Cerrando sesión...");
    // Ejemplo de redirección:
    // window.location.href = "logout.php";
});
