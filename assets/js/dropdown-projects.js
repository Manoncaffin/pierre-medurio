document.addEventListener('DOMContentLoaded', function () {
    // Sélection des éléments nécessaires
    const dropdown = document.getElementById('dropdown');
    if (!dropdown) return;
    
    const selected = dropdown.querySelector('.selected-option');
    const selectedText = selected.querySelector('.selected-text');
    const options = dropdown.querySelectorAll('.option');
    const hiddenInput = dropdown.querySelector('input[type="hidden"]');
    const optionsContainer = dropdown.querySelector('#projectTagsOptions');
    
    // Événement pour ouvrir/fermer le dropdown
    selected.addEventListener('click', function () {
        optionsContainer.classList.toggle('open');
    });
    
    // Événement pour sélectionner une option
    options.forEach(option => {
        option.addEventListener('click', function () {
            selectedText.textContent = this.textContent.trim();
            hiddenInput.value = this.dataset.category;
            optionsContainer.classList.remove('open');
            filterProjects(this.dataset.category);
        });
    });
    
    // Fermer le dropdown si on clique à l'extérieur
    document.addEventListener('click', function (e) {
        if (!dropdown.contains(e.target)) {
            optionsContainer.classList.remove('open');
        }
    });
    
    // Fonction de filtrage des projets
    function filterProjects(category) {
        const projects = document.querySelectorAll('.project-item');
        
        projects.forEach(project => {
            if (category === 'all' || project.classList.contains(category)) {
                project.style.display = 'block';
            } else {
                project.style.display = 'none';
            }
        });
    }
    
    // Filtrer tous les projets par défaut
    filterProjects('all');
});