document.addEventListener('DOMContentLoaded', function () {
    const dropdown = document.getElementById('dropdown');
    const selected = dropdown.querySelector('.selected-option');
    const selectedText = selected.querySelector('.selected-text'); // Référence au span existant
    const filterIcon = selected.querySelector('.filter-icon'); // Référence à l'icône
    const options = dropdown.querySelectorAll('.option');
    const hiddenInput = dropdown.querySelector('input[type="hidden"]');
    const optionsContainer = dropdown.querySelector('#projectTagsOptions');
    
    // Pas besoin de recréer des éléments car ils existent déjà dans le HTML
    
    selected.addEventListener('click', function () {
        optionsContainer.classList.toggle('open');
    });
    
    options.forEach(option => {
        option.addEventListener('click', function () {
            selectedText.textContent = this.textContent.trim(); // Mettre à jour le texte dans le span existant
            hiddenInput.value = this.dataset.category;
            optionsContainer.classList.remove('open');
            filterProjects(this.dataset.category);
        });
    });
    
    // Fermer si on clique à l'extérieur
    document.addEventListener('click', function (e) {
        if (!dropdown.contains(e.target)) {
            optionsContainer.classList.remove('open');
        }
    });
    
    function filterProjects(category) {
        const projects = document.querySelectorAll('.projects .project-item');
        projects.forEach(project => {
            if (category === 'all' || project.classList.contains(category)) {
                project.style.display = 'block';
            } else {
                project.style.display = 'none';
            }
        });
    }
    
    filterProjects('all');
});