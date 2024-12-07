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
                        <input type="search" name="search" class="form-control w-50 me-2" placeholder="Rechercher des questions sur des recettes ou des plats...">
                        <small id="contentError" class="text-danger"></small>
                        <small id="contentSuccess" class="text-success"></small>
                        <button class="btn btn-success">Rechercher</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <?php
        while ($question = $getAllQuestions->fetch()) {
        ?>
            <div class="card">
                <div class="card-header">
                    <a href="article.php?id=<?php echo $question['id']; ?>">
                        <?php echo htmlspecialchars($question['titre']); ?>
                    </a>
                </div>
                <div class="card-body">
                    <?php echo htmlspecialchars($question['description']); ?>
                </div>
                <div class="card-footer">
                   Publié par <?php echo htmlspecialchars($question['pseudo_auteur']); ?> le <?php echo htmlspecialchars($question['date_publication']); ?>
                </div>
                <div class="rating-section" data-question-id="<?php echo $question['id']; ?>">
                    <i class="star" data-value="1">&#9733;</i>
                    <i class="star" data-value="2">&#9733;</i>
                    <i class="star" data-value="3">&#9733;</i>
                    <i class="star" data-value="4">&#9733;</i>
                    <i class="star" data-value="5">&#9733;</i>
                    <p>Votre note : <span class="rating-display">0</span>/5</p>
                </div>
            </div>
            <br>
        <?php
        }
        ?>
    </div>

    <script>
        document.querySelectorAll('.rating-section').forEach(section => {
            const stars = section.querySelectorAll('.star');
            const ratingDisplay = section.querySelector('.rating-display');
            let isSelected = false;
            let rating = 0;

            stars.forEach((star, index) => {
                star.addEventListener('mouseover', () => selectStars(index, stars));
                star.addEventListener('mouseleave', () => unselectStars(stars));
                star.addEventListener('click', () => setRating(index + 1, stars, ratingDisplay));
            });

            function selectStars(index, stars) {
                if (!isSelected) {
                    for (let i = 0; i <= index; i++) {
                        stars[i].classList.add('hover');
                    }
                }
            }

            function unselectStars(stars) {
                if (!isSelected) {
                    stars.forEach(star => star.classList.remove('hover'));
                }
            }

            function setRating(value, stars, ratingDisplay) {
                isSelected = true;
                rating = value;
                ratingDisplay.textContent = rating;

                stars.forEach(star => {
                    star.classList.remove('hover', 'selected');
                });

                for (let i = 0; i < rating; i++) {
                    stars[i].classList.add('selected');
                }

                // Vous pouvez envoyer la note au serveur via une requête AJAX ici, si nécessaire.
            }
        });
    </script>

    <script src="../../controller/js/searchValidation.js"></script>
</body>
</html>
