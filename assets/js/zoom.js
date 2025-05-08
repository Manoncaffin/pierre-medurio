document.addEventListener('DOMContentLoaded', function () {
    // Éléments du DOM
    const carouselSlides = document.querySelectorAll('.custom-carousel-slide img');
    const zoomOverlay = document.querySelector('.zoom-overlay');
    const zoomedImage = document.querySelector('.zoomed-image');
    const prevButton = document.querySelector('.zoom-prev');
    const nextButton = document.querySelector('.zoom-next');
    const counter = document.querySelector('.zoom-counter');
    const closeIcon = document.querySelector('.close-icon');


    // Variables
    let currentIndex = 0;
    const totalImages = carouselSlides.length;

    // Mettre à jour le compteur
    function updateCounter() {
        counter.textContent = `${currentIndex + 1} / ${totalImages}`;
    }

    // Ouvrir l'image en mode zoom
    function openZoom(index) {
        currentIndex = index;
        const imgSrc = carouselSlides[index].getAttribute('src');
        const imgAlt = carouselSlides[index].getAttribute('alt');

        zoomedImage.setAttribute('src', imgSrc);
        zoomedImage.setAttribute('alt', imgAlt);

        updateCounter();
        zoomOverlay.classList.add('active');

        // Empêcher le scroll de la page
        document.body.style.overflow = 'hidden';
        
    }

    // Fermer le zoom
    function closeZoom() {
        zoomOverlay.classList.remove('active');

        // Réactiver le scroll de la page
        document.body.style.overflow = '';

        // Petit délai avant de retirer la source pour éviter un effet de flash
        setTimeout(() => {
            zoomedImage.setAttribute('src', '');
        }, 300);
    }

    // Image précédente
    function prevImage() {
        currentIndex = (currentIndex - 1 + totalImages) % totalImages;
        const imgSrc = carouselSlides[currentIndex].getAttribute('src');
        const imgAlt = carouselSlides[currentIndex].getAttribute('alt');

        zoomedImage.setAttribute('src', imgSrc);
        zoomedImage.setAttribute('alt', imgAlt);
        updateCounter();
    }

    // Image suivante
    function nextImage() {
        currentIndex = (currentIndex + 1) % totalImages;
        const imgSrc = carouselSlides[currentIndex].getAttribute('src');
        const imgAlt = carouselSlides[currentIndex].getAttribute('alt');

        zoomedImage.setAttribute('src', imgSrc);
        zoomedImage.setAttribute('alt', imgAlt);
        updateCounter();
    }

    // Ajouter des écouteurs d'événements aux images du carousel
    carouselSlides.forEach((img, index) => {
        img.addEventListener('click', () => openZoom(index));
    });

    // Fermer le zoom en cliquant sur le bouton de fermeture
    closeIcon.addEventListener('click', closeZoom);

    // Fermer le zoom en cliquant sur l'overlay
    zoomOverlay.addEventListener('click', function (event) {
        if (event.target === zoomOverlay) {
            closeZoom();
        }
    });

    // Navigation avec les boutons
    prevButton.addEventListener('click', function (event) {
        event.stopPropagation();
        prevImage();
    });

    nextButton.addEventListener('click', function (event) {
        event.stopPropagation();
        nextImage();
    });

    // Navigation avec les touches du clavier
    document.addEventListener('keydown', function (event) {
        if (!zoomOverlay.classList.contains('active')) return;

        if (event.key === 'Escape') {
            closeZoom();
        } else if (event.key === 'ArrowLeft') {
            prevImage();
        } else if (event.key === 'ArrowRight') {
            nextImage();
        }
    });
});