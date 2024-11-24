document.addEventListener("DOMContentLoaded", function () {
    // Title Validation
    const titleElement = document.getElementById("title");
    const titleErrorElement = document.getElementById("title_error");

    titleElement.addEventListener("keyup", function () {
        const titleValue = titleElement.value;

        if (titleValue.length < 3) {
            titleErrorElement.textContent = "Le titre doit contenir au moins 3 caractères";
            titleErrorElement.style.color = "red";
        } else {
            titleErrorElement.textContent = "Correct";
            titleErrorElement.style.color = "green";
        }
    });

    // Price Validation
    const priceElement = document.getElementById("price");
    const priceErrorElement = document.getElementById("price_error");
    priceElement.addEventListener("keyup", function () {
        const priceValue = priceElement.value;

        // Allow positive integers or floats (e.g., 10, 10.5, 0.99)
        if (!/^\d+(\.\d+)?$/.test(priceValue) || parseFloat(priceValue) <= 0) {
            priceErrorElement.textContent = "Le prix doit être un nombre positif (entier ou décimal)";
            priceErrorElement.style.color = "red";
        } else {
            priceErrorElement.textContent = "Correct";
            priceErrorElement.style.color = "green";
        }
    });

    // ID Validation
    const idElement = document.getElementById("id");
    const idErrorElement = document.getElementById("id_error");

    idElement.addEventListener("keyup", function () {
        const idValue = idElement.value;

        if (!/^\d+$/.test(idValue) || parseInt(idValue) <= 0) {
            idErrorElement.textContent = "L'identifiant doit être un entier positif";
            idErrorElement.style.color = "red";
        } else {
            idErrorElement.textContent = "Correct";
            idErrorElement.style.color = "green";
        }
    });

    // Image Validation
    const imageElement = document.getElementById("image");
    const imageErrorElement = document.getElementById("image_error");

    imageElement.addEventListener("keyup", function () {
        const imageValue = imageElement.value;

        if (!/\.(jpg|jpeg|png|gif)$/i.test(imageValue)) {
            imageErrorElement.textContent = "L'image doit être un fichier valide (jpg, jpeg, png, gif)";
            imageErrorElement.style.color = "red";
        } else {
            imageErrorElement.textContent = "Correct";
            imageErrorElement.style.color = "green";
        }
    });

    // Form Submission Validation
    document.querySelector("form").addEventListener("submit", function (e) {
        let valid = true;

        // Validate Title
        const titleValue = titleElement.value;
        if (titleValue.length < 3) {
            titleErrorElement.textContent = "Le titre doit contenir au moins 3 caractères";
            titleErrorElement.style.color = "red";
            valid = false;
        }

        // Validate Price
        const priceValue = priceElement.value;

        if (!/^\d+(\.\d+)?$/.test(priceValue) || parseFloat(priceValue) <= 0) {
            priceErrorElement.textContent = "Le prix doit être un nombre positif (entier ou décimal)";
            priceErrorElement.style.color = "red";
            e.preventDefault(); // Prevent form submission
        }

        // Validate ID
        const idValue = idElement.value;
        if (!/^\d+$/.test(idValue) || parseInt(idValue) <= 0) {
            idErrorElement.textContent = "L'identifiant doit être un entier positif";
            idErrorElement.style.color = "red";
            valid = false;
        }

        // Validate Image
        const imageValue = imageElement.value;
        if (!/\.(jpg|jpeg|png|gif)$/i.test(imageValue)) {
            imageErrorElement.textContent = "L'image doit être un fichier valide (jpg, jpeg, png, gif)";
            imageErrorElement.style.color = "red";
            valid = false;
        }

        if (!valid) {
            e.preventDefault(); // Stop form submission
            alert("Veuillez corriger les erreurs avant de soumettre le formulaire.");
        }
    });
});
