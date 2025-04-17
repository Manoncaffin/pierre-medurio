document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM loaded');

    const dropdown = document.querySelector('#dropdown');
    const selected = dropdown.querySelector('.selected-option');
    const optionsContainer = dropdown.querySelector('.select-options');
    const hiddenInput = dropdown.querySelector('input[type="hidden"]');
    const options = dropdown.querySelectorAll('.option');

    console.log('selected', selected);
    console.log('optionsContainer', optionsContainer);

    selected.addEventListener('click', function () {
        console.log('Clicked on selected-option');
        optionsContainer.classList.toggle('open');
        selected.classList.toggle('open'); // Ajoute ou retire la classe 'open' sur .selected-option
    });

    options.forEach(option => {
        option.addEventListener('click', function (event) {
            event.stopPropagation(); // Empêche la propagation de l'événement
            console.log('Option clicked:', this.textContent); // Vérifiez quel option est cliqué
            selected.textContent = this.textContent;
            hiddenInput.value = this.dataset.category;
            console.log('Hidden input value:', hiddenInput.value); // Vérifiez la valeur du champ caché
            optionsContainer.classList.remove('open');
            selected.classList.remove('open'); // Retire la classe 'open' sur .selected-option
            console.log('Options container closed'); // Vérifiez que la liste déroulante se ferme
        });
    });

    document.addEventListener('click', function (e) {
        if (!dropdown.contains(e.target)) {
            optionsContainer.classList.remove('open');
            selected.classList.remove('open'); // Retire la classe 'open' sur .selected-option
            console.log('Options container closed by outside click'); // Vérifiez que la liste déroulante se ferme
        }
    });
});
