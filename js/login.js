document.addEventListener("DOMContentLoaded", function() {
    const tabLinks = document.querySelectorAll(".tab-link");
    const tabContents = document.querySelectorAll(".tab-content");

    tabLinks.forEach(link => {
        link.addEventListener("click", () => {
            // Удалите класс 'active' у всех табов и секций
            tabLinks.forEach(tab => tab.classList.remove("active"));
            tabContents.forEach(content => content.classList.remove("active"));

            // Добавьте класс 'active' только к выбранному табу и соответствующей секции
            const target = link.getAttribute("data-tab");
            document.querySelector(`#${target}`).classList.add("active");
            link.classList.add("active");
        });
    });
});