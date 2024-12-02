<?php 
session_start();
require('action/question/showAllQuestionsAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style_formulaire_question.css">
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
<?php include 'includes/head.php';?>
<body>
    <?php include 'includes/navbar.php';?>
    
    <br></br>
    
    <div class="container">
            <div class="search-section">
            <div class="search-overlay">
                <div class="container text-center">
                <h2 class="text-white">Recherche</h2>
                <form method="GET" class="d-flex justify-content-center mt-3">
                    <input type="search" name="search" class="form-control w-50 me-2" placeholder="Rechercher des question sur des recettes ou des plats...">
                    <small id="contentError" class="text-danger"></small>
                    <small id="contentSuccess" class="text-success"></small>
                    <button class="btn btn-success">Rechercher</button>
                </form>
                </div>
            </div>
            </div>
        <br>
        <?php
        while($question=$getAllQuestions->fetch()){
            ?>
            <div class="card">
                <div class="card-header">
                    <a href="article.php?id=<?php echo $question['id'];?>">
                        <?php echo $question['titre'];?>
                    </a>
                    
                </div>
                <div class="card-body">
                    <?php echo $question['description'];?>
                </div>
                <div class="card-footer">
                   Publié par <?php echo  $question['pseudo_auteur'];?> le <?php echo $question['date_publication'];?>

                </div>
                <div>
                <i class="star">&#9733;</i>
                <i class="star">&#9733;</i>
                <i class="star">&#9733;</i>
                <i class="star">&#9733;</i>
                <i class="star">&#9733;</i>
                <p>Votre note : <span id="rating">0</span>/5</p>
                </div>
            </div>
            <br>
            <?php
        }
        
        ?>

    </div>
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

    <script src="../../controller/js/searchValidation.js"></script>
</body>
</html>