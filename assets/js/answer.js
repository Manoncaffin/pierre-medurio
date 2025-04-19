document.querySelectorAll('.qa h3').forEach(function(question) {
    question.addEventListener('click', function() {
        const parent = question.parentElement;
        parent.classList.toggle('active'); 
    });
});