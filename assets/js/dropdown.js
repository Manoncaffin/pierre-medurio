document.addEventListener('DOMContentLoaded', function () {
    const dropdown = document.getElementById('dropdown');
    const selected = dropdown.querySelector('.selected-option');
    const options = dropdown.querySelectorAll('.option');
    const hiddenInput = dropdown.querySelector('input[type="hidden"]');
    const optionsContainer = dropdown.querySelector('#selectOptions');

    selected.addEventListener('click', function () {
        optionsContainer.classList.toggle('open');
    });

    options.forEach(option => {
        option.addEventListener('click', function () {
            selected.textContent = this.textContent;
            hiddenInput.value = this.dataset.value;
            optionsContainer.classList.remove('open');
        });
    });

    // Fermer si on clique à l’extérieur
    document.addEventListener('click', function (e) {
        if (!dropdown.contains(e.target)) {
            optionsContainer.classList.remove('open');
        }
    });
});
