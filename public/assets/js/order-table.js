const originalRows = Array.from(document.querySelector("#productTable tbody").querySelectorAll("tr"));

document.getElementById("applyFilter").addEventListener("click", function () {
    const filterValue = document.getElementById("orderFilter").value;
    const table = document.getElementById("productTable");
    const tbody = table.querySelector("tbody");
    const rows = Array.from(tbody.querySelectorAll("tr"));

    rows.sort((a, b) => {
        switch (filterValue) {
            case "2": //A-Z
                return a.querySelector(".name-item").textContent.localeCompare(b.querySelector(".name-item").textContent);
            case "3": //Z-A
                return b.querySelector(".name-item").textContent.localeCompare(a.querySelector(".name-item").textContent);
            case "4": //mayor precio a menor
                return parseFloat(b.querySelector(".price-item").textContent.replace(/[$,']/g, "")) -
                    parseFloat(a.querySelector(".price-item").textContent.replace(/[$,']/g, ""));
            case "5": //menor precio a mayor
                return parseFloat(a.querySelector(".price-item").textContent.replace(/[$,']/g, "")) -
                    parseFloat(b.querySelector(".price-item").textContent.replace(/[$,']/g, ""));
            default:
                return 0; //sin cambios
        }
    });

    tbody.innerHTML = "";
    rows.forEach(row => tbody.appendChild(row));
});

document.getElementById("resetFilter").addEventListener("click", function () {
    const table = document.getElementById("productTable");
    const tbody = table.querySelector("tbody");

    tbody.innerHTML = "";
    originalRows.forEach(row => tbody.appendChild(row));

    document.getElementById("orderFilter").value = "1";
});