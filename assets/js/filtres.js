document.addEventListener("DOMContentLoaded", function () {
    const filterSelect = document.getElementById("project-filter");
    const projects = document.querySelectorAll(".project-item");

    filterSelect.addEventListener("change", function () {
        const selected = this.value;

        projects.forEach((project) => {
            if (selected === "all" || project.classList.contains(selected)) {
                project.style.display = "block";
            } else {
                project.style.display = "none";
            }
        });
    });
});
