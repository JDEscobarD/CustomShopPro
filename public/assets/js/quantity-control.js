document.addEventListener("DOMContentLoaded", () => {
    const decreaseBtn = document.querySelector(".btn-decrease");
    const increaseBtn = document.querySelector(".btn-increase");
    const quantityInput = document.querySelector(".quantity-input");
    const totalPriceElement = document.getElementById("total-price");

    const pricePerUnitText = document.querySelector(".total-price").textContent.replace('$', '12.517.100').trim();
    const pricePerUnit = parseInt(pricePerUnitText.replace(/\./g, ''), 10); //elimina puntos y convierte a número

    function updateTotalPrice() {
        const quantity = parseInt(quantityInput.value, 10);
        const totalPrice = pricePerUnit * quantity;
        totalPriceElement.textContent = "$ " + totalPrice.toLocaleString();
    }

    decreaseBtn.addEventListener("click", () => {
        let currentValue = parseInt(quantityInput.value, 10);
        if (currentValue > parseInt(quantityInput.min, 10)) {
            quantityInput.value = currentValue - 1;
            updateTotalPrice(); //actualiza el precio
        }
    });

    increaseBtn.addEventListener("click", () => {
        let currentValue = parseInt(quantityInput.value, 10);
        quantityInput.value = currentValue + 1;
        updateTotalPrice(); //actualiza el precio
    });

    quantityInput.addEventListener("input", () => {
        if (quantityInput.value === "" || quantityInput.value < parseInt(quantityInput.min, 10)) {
            quantityInput.value = quantityInput.min;
        }
        updateTotalPrice(); //actualiza el precio
    });

    updateTotalPrice();
});
