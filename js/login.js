document.addEventListener("DOMContentLoaded", function() {
    const tabLinks = document.querySelectorAll(".tab-link");
    const tabContents = document.querySelectorAll(".tab-content");

    tabLinks.forEach(link => {
        link.addEventListener("click", () => {
            tabLinks.forEach(tab => tab.classList.remove("active"));
            tabContents.forEach(content => content.classList.remove("active"));

            const target = link.getAttribute("data-tab");
            document.querySelector(`#${target}`).classList.add("active");
            link.classList.add("active");
        });
    });
});

