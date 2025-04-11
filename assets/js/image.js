    // Fonction pour mettre à jour l'image toutes les heures
    function updateImage() {
        // Récupérer l'heure actuelle
        var currentHour = new Date().getHours(); // Obtenir l'heure actuelle (0-23)

        // Récupérer toutes les images
        var images = document.querySelectorAll('.home-image'); // Remplacez '.home-image' par la classe de l'image

        // Calculer l'index de l'image à afficher
        var imageIndex = currentHour % images.length;

        // Cacher toutes les images
        images.forEach(function(image) {
            image.style.display = 'none';
        });

        // Afficher l'image correspondante à l'heure
        images[imageIndex].style.display = 'block';
    }

    // Exécuter la fonction au chargement de la page
    window.onload = function() {
        updateImage();
        // Mettre à jour l'image chaque heure
        setInterval(updateImage, 3600000); // 3600000 ms = 1 heure
    };

