document.addEventListener("DOMContentLoaded", function () {
    // Name Validation
    const nameElement = document.querySelector("input[name='customer_name']");
    const nameErrorElement = document.createElement("div");
    nameElement.insertAdjacentElement("afterend", nameErrorElement);

    nameElement.addEventListener("keyup", function () {
        const nameValue = nameElement.value;

        if (nameValue.length < 3) {
            nameErrorElement.textContent = "Le nom doit contenir au moins 3 caractères";
            nameErrorElement.style.color = "red";
        } else {
            nameErrorElement.textContent = "Correct";
            nameErrorElement.style.color = "green";
        }
    });

    // Contact Number Validation
    const contactElement = document.querySelector("input[name='customer_contact']");
    const contactErrorElement = document.createElement("div");
    contactElement.insertAdjacentElement("afterend", contactErrorElement);

    contactElement.addEventListener("keyup", function () {
        const contactValue = contactElement.value;

        if (!/^\d{8,15}$/.test(contactValue)) {
            contactErrorElement.textContent = "Le numéro de contact doit contenir entre 8 et 15 chiffres";
            contactErrorElement.style.color = "red";
        } else {
            contactErrorElement.textContent = "Correct";
            contactErrorElement.style.color = "green";
        }
    });

    // Email Validation
    const emailElement = document.querySelector("input[name='customer_email']");
    const emailErrorElement = document.createElement("div");
    emailElement.insertAdjacentElement("afterend", emailErrorElement);

    emailElement.addEventListener("keyup", function () {
        const emailValue = emailElement.value;

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailValue)) {
            emailErrorElement.textContent = "Veuillez saisir une adresse email valide";
            emailErrorElement.style.color = "red";
        } else {
            emailErrorElement.textContent = "Correct";
            emailErrorElement.style.color = "green";
        }
    });

    // Address Validation
    const addressElement = document.querySelector("textarea[name='customer_address']");
    const addressErrorElement = document.createElement("div");
    addressElement.insertAdjacentElement("afterend", addressErrorElement);

    addressElement.addEventListener("keyup", function () {
        const addressValue = addressElement.value;

        if (addressValue.length < 10) {
            addressErrorElement.textContent = "L'adresse doit contenir au moins 10 caractères";
            addressErrorElement.style.color = "red";
        } else {
            addressErrorElement.textContent = "Correct";
            addressErrorElement.style.color = "green";
        }
    });

    // Form Submission Validation
    document.querySelector("form").addEventListener("submit", function (e) {
        let valid = true;

        // Validate Name
        if (nameElement.value.length < 3) {
            nameErrorElement.textContent = "Le nom doit contenir au moins 3 caractères";
            nameErrorElement.style.color = "red";
            valid = false;
        }

        // Validate Contact
        if (!/^\d{8,12}$/.test(contactElement.value)) {
            contactErrorElement.textContent = "Le numéro de contact doit contenir entre 8 et 12 chiffres";
            contactErrorElement.style.color = "red";
            valid = false;
        }

        // Validate Email
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailElement.value)) {
            emailErrorElement.textContent = "Veuillez saisir une adresse email valide";
            emailErrorElement.style.color = "red";
            valid = false;
        }

        // Validate Address
        if (addressElement.value.length < 10) {
            addressErrorElement.textContent = "L'adresse doit contenir au moins 10 caractères";
            addressErrorElement.style.color = "red";
            valid = false;
        }

        if (!valid) {
            e.preventDefault(); // Prevent form submission
            alert("Veuillez corriger les erreurs avant de soumettre le formulaire.");
        }
    });
});
