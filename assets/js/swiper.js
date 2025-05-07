document.addEventListener('DOMContentLoaded', function() {
  const modal = document.getElementById('carousel-modal');
  const counter = document.querySelector('.swiper-counter');
  
  // Initialiser Swiper uniquement lorsque la modale est ouverte pour la première fois
  const initSwiper = function() {
    if (!window.mySwiper) {
      window.mySwiper = new Swiper('.carousel-swiper', {
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        on: {
          init: function() {
            // Mettre à jour le compteur à l'initialisation
            updateCounter(this.activeIndex + 1);
          },
          slideChange: function() {
            // Mettre à jour le compteur lorsqu'on change de slide
            updateCounter(this.activeIndex + 1);
          }
        }
      });
    }
  };
  
  // Fonction pour mettre à jour le compteur
  function updateCounter(current) {
    const currentSlideElement = document.querySelector('.current-slide');
    if (currentSlideElement) {
      currentSlideElement.textContent = current;
    }
  }
  
  // Initialiser Swiper et afficher le compteur lorsqu'on ouvre la modale
  document.querySelectorAll('.thumbnail-item').forEach(item => {
    item.addEventListener('click', function() {
      // Afficher la modale
      modal.style.display = 'flex';
      modal.classList.add('active');
      
      // Attendre que la modale soit visible avant d'initialiser Swiper
      setTimeout(function() {
        initSwiper();
        // Aller à la slide correspondante à la miniature cliquée
        const index = parseInt(item.getAttribute('data-index'));
        if (window.mySwiper) {
          window.mySwiper.slideTo(index);
          updateCounter(index + 1);
        }
      }, 100);
    });
  });

  // Fermer la modale
  document.getElementById('modal-close').addEventListener('click', function(e) {
    e.preventDefault();
    modal.style.display = 'none';
    modal.classList.remove('active');
  });

  // Gestion des zones de survol pour la navigation
  const leftZone = document.querySelector('.left-zone');
  const rightZone = document.querySelector('.right-zone');
  
  if (leftZone) {
    leftZone.addEventListener('click', function() {
      if (window.mySwiper) {
        window.mySwiper.slidePrev();
      }
    });
  }
  
  if (rightZone) {
    rightZone.addEventListener('click', function() {
      if (window.mySwiper) {
        window.mySwiper.slideNext();
      }
    });
  }
});