document.addEventListener("DOMContentLoaded", function () {
    const toggleMenuButton = document.querySelector(".toogle-menu");
    const contentMenu = document.querySelector(".content-menu");
    const menuBackdrop = document.querySelector(".menu-backdrop");
    const body = document.body;

    toggleMenuButton.addEventListener("click", function () {
        
        const isOpen = contentMenu.classList.toggle("open");
        menuBackdrop.classList.toggle("active", isOpen);
        body.classList.toggle("no-scroll", isOpen);

        
        toggleMenuButton.classList.toggle("close", isOpen);
    });

    menuBackdrop.addEventListener("click", function () {
        contentMenu.classList.remove("open");
        menuBackdrop.classList.remove("active");
        body.classList.remove("no-scroll");
        toggleMenuButton.classList.remove("close");
    });
});
