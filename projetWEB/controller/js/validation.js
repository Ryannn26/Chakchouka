// Fonction pour valider le titre
function validateTitle() {
    const title = document.getElementById('title').value.trim();
    const titleError = document.getElementById('titleError');
    const titleSuccess = document.getElementById('titleSuccess');

    if (!/^[A-Z][^0-9]*$/.test(title)) {
        titleError.textContent = "Le titre doit commencer par une majuscule et ne pas contenir de chiffres.";
        titleSuccess.textContent = ""; // Efface le message de succès
        return false;
    } else {
        titleError.textContent = ""; // Efface le message d'erreur
        titleSuccess.textContent = "Titre valide !";
        return true;
    }
}

// Fonction pour valider la description
function validateDescription() {
    const description = document.getElementById('description').value.trim();
    const descriptionError = document.getElementById('descriptionError');
    const descriptionSuccess = document.getElementById('descriptionSuccess');

    if (!/^[A-Z]/.test(description)) {
        descriptionError.textContent = "La description doit commencer par une majuscule.";
        descriptionSuccess.textContent = ""; // Efface le message de succès
        return false;
    } else {
        descriptionError.textContent = ""; // Efface le message d'erreur
        descriptionSuccess.textContent = "Description valide !";
        return true;
    }
}

// Fonction pour valider le contenu
function validateContent() {
    const content = document.getElementById('content').value.trim();
    const contentError = document.getElementById('contentError');
    const contentSuccess = document.getElementById('contentSuccess');

    if (!/^[A-Z]/.test(content)) {
        contentError.textContent = "Le contenu doit commencer par une majuscule.";
        contentSuccess.textContent = ""; // Efface le message de succès
        return false;
    } else {
        contentError.textContent = ""; // Efface le message d'erreur
        contentSuccess.textContent = "Contenu valide !";
        return true;
    }
}

// Fonction globale pour valider tout le formulaire
function validateForm() {
    const isTitleValid = validateTitle();
    const isDescriptionValid = validateDescription();
    const isContentValid = validateContent();

    // Empêche la soumission si une validation échoue
    return isTitleValid && isDescriptionValid && isContentValid;
}
