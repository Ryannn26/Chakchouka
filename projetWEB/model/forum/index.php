<?php 
session_start();
require('action/question/showAllQuestionsAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style_formulaire_question.css">
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
            </div>
            <br>
            <?php
        }
        
        ?>

    </div>

    <script src="../../controller/js/searchValidation.js"></script>
</body>
</html>