<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Note</title>
    <style>
      .star {
        font-size: 1.5rem;
        cursor: pointer;
        color: gray;
        transition: color 0.3s ease-in-out;
      }
      .hover {
        color: gold;
      }
      .selected {
        color: gold;
      }
    </style>
  </head>
  <body>
    <i class="star">&#9733;</i>
    <i class="star">&#9733;</i>
    <i class="star">&#9733;</i>
    <i class="star">&#9733;</i>
    <i class="star">&#9733;</i>
    <p>Votre note : <span id="rating">0</span>/5</p>

    <script>
      const stars = document.querySelectorAll('.star');
      let isSelected = false; // Variable pour vérifier si une note est déjà sélectionnée
      let rating = 0; // Stocker la note actuelle

      // Ajouter les événements sur chaque étoile
      stars.forEach((star, index) => {
        star.addEventListener('mouseover', () => selectStars(index));
        star.addEventListener('mouseleave', unselectStars);
        star.addEventListener('click', () => setRating(index + 1));
      });

      // Fonction pour colorer les étoiles jusqu'à celle survolée
      function selectStars(index) {
        if (!isSelected) {
          for (let i = 0; i <= index; i++) {
            stars[i].classList.add('hover');
          }
        }
      }

      // Fonction pour désactiver la coloration de toutes les étoiles
      function unselectStars() {
        if (!isSelected) {
          stars.forEach((star) => star.classList.remove('hover'));
        }
      }

      // Fonction pour fixer la note
      function setRating(value) {
        isSelected = true; // Marque que l'utilisateur a sélectionné une note
        rating = value; // Met à jour la note sélectionnée
        document.getElementById('rating').textContent = rating; // Affiche la note

        // Réinitialise toutes les étoiles
        stars.forEach((star) => {
          star.classList.remove('hover', 'selected');
        });

        // Colore les étoiles jusqu'à la sélection
        for (let i = 0; i < rating; i++) {
          stars[i].classList.add('selected');
        }
      }
    </script>
  </body>
</html>
