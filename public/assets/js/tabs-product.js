document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll(".nav-link");
    const tabContents = document.querySelectorAll(".tabcontent");

    tabs.forEach(tab => {
        tab.addEventListener("click", function (event) {
            event.preventDefault();

            tabs.forEach(t => t.classList.remove("active"));
            tabContents.forEach(content => content.classList.add("d-none"));

            tab.classList.add("active");

            const tabId = tab.getAttribute("data-tab");
            const activeContent = document.getElementById(tabId);
            activeContent.classList.remove("d-none");
        });
    });

    document.querySelector(".nav-link.active").click();
});
