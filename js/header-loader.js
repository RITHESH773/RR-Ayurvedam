// js/header-loader.js
document.addEventListener("DOMContentLoaded", function () {
    fetch("/partials/header.html")
        .then(response => {
            if (!response.ok) {
                throw new Error("Header not found or incorrect path");
            }
            return response.text();
        })
        .then(data => {
            document.getElementById("header-container").innerHTML = data;

            // Now that the header is loaded, attach the mobile menu toggle logic
            const menuBtn = document.getElementById("menu-btn");
            const mobileMenu = document.getElementById("mobile-menu");

            if (menuBtn && mobileMenu) {
                menuBtn.addEventListener("click", function () {
                    mobileMenu.classList.toggle("hidden");
                });
            } else {
                console.error("Menu button or mobile menu not found after loading header.");
            }
        })
        .catch(error => console.error("Error loading header:", error));
});



fetch("/partials/footer.html")
        .then(response => {
            if (!response.ok) {
                throw new Error("Footer not found or incorrect path");
            }
            return response.text();
        })
        .then(data => {
            document.getElementById("footer-container").innerHTML = data;
        })
        .catch(error => console.error("Error loading footer:", error));
