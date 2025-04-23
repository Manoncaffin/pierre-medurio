document.querySelectorAll('.qa .question_arrow').forEach(function(question) {
    question.addEventListener('click', function() {
        const parent = question.closest('.qa');
        parent.classList.toggle('active');

        const arrow = question.querySelector('.arrow');

        if (parent.classList.contains('active')) {
            arrow.src = arrow.getAttribute('data-minus-src');
        } else {
            arrow.src = arrow.getAttribute('data-plus-src');
        }
    });
});
