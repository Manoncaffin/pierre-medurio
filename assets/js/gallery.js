document.addEventListener('DOMContentLoaded', function() {
  const thumbnails = document.querySelectorAll('.thumbnail-item');
  const modal = document.getElementById('carousel-modal');
  const swiper = document.querySelector('.carousel-swiper');
       
  // Pour chaque miniature, ajouter un event listener
  thumbnails.forEach(thumb => {
    thumb.addEventListener('click', function() {
      const index = parseInt(this.getAttribute('data-index'));
             
      // Afficher la modale
      modal.style.display = 'flex';
      document.body.style.overflow = 'hidden'; // Empêcher le défilement de la page
             
      // Ajouter la classe 'active' pour afficher le compteur
      modal.classList.add('active');
             
      // Initialiser Swiper s'il ne l'est pas déjà et aller à la slide correspondante
      if (window.mySwiper) {
        window.mySwiper.slideTo(index);
        updateCounter(index + 1);
      }
    });
  });
       
  // Fermer la modale
  document.getElementById('modal-close').addEventListener('click', function(e) {
    e.preventDefault();
    modal.style.display = 'none';
    modal.classList.remove('active');
    document.body.style.overflow = 'auto'; // Réactiver le défilement
  });
       
  // Fonction pour mettre à jour le compteur
  function updateCounter(current) {
    const currentSlideElement = document.querySelector('.current-slide');
    if (currentSlideElement) {
      currentSlideElement.textContent = current;
    }
  }
});