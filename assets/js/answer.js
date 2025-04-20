document.querySelectorAll('.qa .question_arrow').forEach(function(question) {
    question.addEventListener('click', function() {
        const parent = question.closest('.qa');
        parent.classList.toggle('active'); 
    });
});