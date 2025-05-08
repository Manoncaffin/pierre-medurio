document.addEventListener('DOMContentLoaded', function() {
  const modal = document.getElementById('carousel-modal');
  const carouselInner = document.querySelector('.custom-carousel-inner');
  const slides = document.querySelectorAll('.custom-carousel-slide');
  const prevButton = document.querySelector('.custom-carousel-button.custom-prev');
  const nextButton = document.querySelector('.custom-carousel-button.custom-next');
  const counter = document.querySelector('.custom-carousel-counter .current-slide');

  let currentIndex = 0;

  function updateCarousel() {
    carouselInner.style.transform = `translateX(-${currentIndex * 100}%)`;
    counter.textContent = currentIndex + 1;
  }

  prevButton.addEventListener('click', function() {
    currentIndex = (currentIndex > 0) ? currentIndex - 1 : slides.length - 1;
    updateCarousel();
  });

  nextButton.addEventListener('click', function() {
    currentIndex = (currentIndex < slides.length - 1) ? currentIndex + 1 : 0;
    updateCarousel();
  });

  // Initialiser le carousel
  updateCarousel();

  // Initialiser le carousel et afficher le compteur lorsqu'on ouvre la modale
  document.querySelectorAll('.thumbnail-item').forEach(item => {
    item.addEventListener('click', function() {
      // Afficher la modale
      modal.style.display = 'flex';
      modal.classList.add('active');

      // Aller à la slide correspondante à la miniature cliquée
      const index = parseInt(item.getAttribute('data-index'));
      currentIndex = index;
      updateCarousel();
    });
  });

  // Fermer la modale
  document.getElementById('modal-close').addEventListener('click', function(e) {
    e.preventDefault();
    modal.style.display = 'none';
    modal.classList.remove('active');
  });
});
