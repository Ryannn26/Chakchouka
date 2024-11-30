document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.querySelector('form'); // Le formulaire
    const searchInput = document.querySelector('input[name="search"]'); // L'input de recherche
    const contentError = document.getElementById('contentError'); // Élément pour message d'erreur
    const contentSuccess = document.getElementById('contentSuccess'); // Élément pour message de succès
    
    searchForm.addEventListener('submit', function(event) {
        if (searchInput.value.trim() === "") {
            event.preventDefault(); // Empêche l'envoi du formulaire
            contentError.textContent = "Veuillez entrer un terme de recherche."; // Affiche l'erreur
            contentSuccess.textContent = ""; // Efface le message de succès
            searchInput.focus(); // Met le focus sur le champ de recherche
        } else {
            contentError.textContent = ""; // Efface le message d'erreur
            contentSuccess.textContent = "Recherche valide !"; // Affiche le message de succès
        }
    });
});
