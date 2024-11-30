<?php 
require ('action/user/securityAction.php');
require ('action/question/myQuestionsAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style_formulaire_question.css">
<?php include 'includes/head.php';?>

<body>
<?php include 'includes/navbar.php';?>
<br>
<div class="container">
<?php 
     while($question=$getAllMyQuestions->fetch()){
        ?>
        <div class="card">
            <h5 class="card-header">
                <a href="article.php?id=<?php echo $question['id'];?>">
                    <?php echo $question['titre'];?>
                </a>
                <!-- Bouton avec les trois points pour afficher le menu -->
                <div class="dropdown">
                    <!-- Utilisation de l'ID unique pour chaque question -->
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton<?php echo $question['id'];?>" data-bs-toggle="dropdown" aria-expanded="false">
                        &#8230; <!-- Trois points -->
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo $question['id'];?>">
                        <li><a class="dropdown-item" href="article.php?id=<?php echo $question['id'];?>">Accéder à la question</a></li>
                        <li><a class="dropdown-item" href="edit-question.php?id=<?=$question['id'];?>">Modifier la question</a></li>
                        <li><a class="dropdown-item" href="action/question/deleteQuestionAction.php?id=<?=$question['id'];?>">Supprimer la question</a></li>
                    </ul>
                </div>
            </h5>
            <div class="card-body">
                <p class="card-text">
                    <?=$question['description'];?>.
                </p>
            </div>
        </div><br>
        <?php
     }
?>
 </div>

 
</body>
</html>
