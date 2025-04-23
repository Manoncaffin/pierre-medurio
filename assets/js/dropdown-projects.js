document.addEventListener('DOMContentLoaded', function () {
    const dropdown = document.getElementById('dropdown');
    const selected = dropdown.querySelector('.selected-option');
    const options = dropdown.querySelectorAll('.option');
    const hiddenInput = dropdown.querySelector('input[type="hidden"]');
    const optionsContainer = dropdown.querySelector('#projectTagsOptions');

    selected.addEventListener('click', function () {
        optionsContainer.classList.toggle('open');
    });

    options.forEach(option => {
        option.addEventListener('click', function () {
            selected.textContent = this.textContent;
            hiddenInput.value = this.dataset.category;
            optionsContainer.classList.remove('open');
            filterProjects(this.dataset.category);
        });
    });

    // Fermer si on clique à l’extérieur
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

    // Afficher tous les projets au chargement de la page
    filterProjects('all');
});
