import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// chuyển đổi tiền tệ
document.addEventListener("DOMContentLoaded", function () {
    // Function to format a number as currency
    function formatCurrency(element) {
        const value = parseFloat(element.textContent);
        if (!isNaN(value)) {
            // Format the number as currency vietnam
            const formattedValue = value.toLocaleString("vi-VN", {
                style: "currency",
                currency: "VND",
            });
            element.textContent = formattedValue;
        }
    }

    // Select all elements with class 'currency'
    const currencyElements = document.querySelectorAll(".currency");

    // Format each element's content as currency
    currencyElements.forEach(formatCurrency);
});
