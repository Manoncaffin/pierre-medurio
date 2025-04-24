document.addEventListener("DOMContentLoaded", function () {
    const burger = document.getElementById("burger-icon");
    const close = document.getElementById("close-icon");
    const navMenu = document.querySelector(".nav_other ul");
    const logo = document.querySelector(".logo");
    const header = document.querySelector(".header_other") || document.querySelector(".header_home");
    const overlay = document.createElement("div"); // Crée un élément pour l'overlay
    overlay.classList.add("overlay"); // Ajoute la classe overlay
    document.body.appendChild(overlay); // Ajoute l'overlay au body

    // Lorsque le burger est cliqué, ouvrir le menu et afficher l'overlay
    burger.addEventListener("click", function () {
        navMenu.classList.add("open");
        burger.style.display = "none";
        close.style.display = "block";
        logo.classList.add("hidden-logo");
        header.classList.add("menu-open");
        overlay.style.display = "block"; // Affiche l'overlay
    });

    // Lorsque le bouton de fermeture est cliqué, fermer le menu et masquer l'overlay
    close.addEventListener("click", function () {
        navMenu.classList.remove("open");
        close.style.display = "none";
        burger.style.display = "block";
        logo.classList.remove("hidden-logo");
        header.classList.remove("menu-open");
        overlay.style.display = "none"; // Masque l'overlay
    });

    // Ajouter un événement pour fermer le menu si on clique sur l'overlay
    overlay.addEventListener("click", function () {
        navMenu.classList.remove("open");
        close.style.display = "none";
        burger.style.display = "block";
        logo.classList.remove("hidden-logo");
        header.classList.remove("menu-open");
        overlay.style.display = "none"; // Masque l'overlay
    });
});
