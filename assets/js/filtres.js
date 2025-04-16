document.addEventListener("DOMContentLoaded", function () {
    const dropdownToggle = document.getElementById("dropdown-toggle");
    const dropdownMenu = document.querySelector(".dropdown-menu");
    const dropdownItems = document.querySelectorAll(".dropdown-item");
    const projects = document.querySelectorAll(".project-item");
    const allLabel = document.querySelector(".all");
    const tagsMobile = document.querySelector(".tags-mobile");

    // Toggle dropdown menu
    dropdownToggle.addEventListener("change", function () {
        if (this.checked) {
            dropdownMenu.style.display = "block";
            tagsMobile.style.borderRadius = "5px 5px 0 0";
            allLabel.style.borderBottom = "none";
        } else {
            dropdownMenu.style.display = "none";
            tagsMobile.style.borderRadius = "5px";
        }
    });

    // Filter projects based on selected category
    dropdownItems.forEach(function (item) {
        item.addEventListener("click", function () {
            const selectedCategory = this.getAttribute("data-category");
            filterProjects(selectedCategory);
            allLabel.textContent = this.textContent;
            dropdownToggle.checked = false;
            dropdownMenu.style.display = "none";
            tagsMobile.style.borderRadius = "5px";
        });
    });

    // Function to filter projects
    function filterProjects(category) {
        projects.forEach(function (project) {
            if (category === "all" || project.classList.contains(category)) {
                project.style.display = "block";
            } else {
                project.style.display = "none";
            }
        });
    }
});