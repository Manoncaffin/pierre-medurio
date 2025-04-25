document.addEventListener("DOMContentLoaded", function () {
    const burger = document.getElementById("burger-icon");
    const close = document.getElementById("close-icon");
    const navMenu = document.querySelector(".nav_other ul");
    const logoOther = document.querySelector(".logo_other");
    const header = document.querySelector(".header_other") || document.querySelector(".header_home");
    const overlay = document.createElement("div");
    overlay.classList.add("overlay");
    document.body.appendChild(overlay);

    // Lorsque le burger est cliqué, ouvrir le menu et afficher l'overlay
    burger.addEventListener("click", function () {
        navMenu.classList.add("open"); 
        burger.style.display = "none"; 
        close.style.display = "block"; 
        logoOther.classList.add("hidden-logo_other");
        header.classList.add("menu-open");
        overlay.style.display = "block"; 
    });
    

    // Lorsque le bouton de fermeture est cliqué, fermer le menu et masquer l'overlay
    close.addEventListener("click", function () {
        navMenu.classList.remove("open");
        burger.style.display = "block";
        close.style.display = "none";
        logoOther.classList.remove("hidden-logo_other");
        header.classList.remove("menu-open");
        overlay.style.display = "none";
    });

    // Ajouter un événement pour fermer le menu si on clique sur l'overlay
    overlay.addEventListener("click", function () {
        navMenu.classList.remove("open");
        close.style.display = "none";
        burger.style.display = "block";
        logoOther.classList.remove("hidden-logo_other");
        header.classList.remove("menu-open");
        overlay.style.display = "none"; 
    });
});
