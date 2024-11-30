<?php 
session_start();
require('action/question/showAllQuestionsAction.php');
//require('action\admin\deleteQuestionActionAdmin.php');

?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style_formulaire_question.css">
<?php include 'includes/head.php';?>
<body>
    <?php include 'includes/navbarAdmin.php';?>
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
                    <a href="articleAdmin.php?id=<?php echo $question['id'];?>">
                        <?php echo $question['titre'];?>
                    </a>
                    
                </div>
                <div class="card-body">
                    <?php echo $question['description'];?>
                </div>
                <div class="card-footer">
                   Publié par <?php echo  $question['pseudo_auteur'];?> le <?php echo $question['date_publication'];?>

                </div>
                <hr>
                <!-- Formulaire de suppression -->
                <form class="container" method="POST" action="action/admin/deleteQuestionActionAdmin.php">
                    <input type="hidden" name="id" value="<?php echo $question['id']; ?>">
                    <!-- <input type="hidden" name="csrf_token" value="/</?php echo $_SESSION['csrf_token']; ?>"> -->
                    <button type="submit" name="delete" value="1" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
            <br>
            <?php
        }
        
        ?>

    </div>


</body>
</html>