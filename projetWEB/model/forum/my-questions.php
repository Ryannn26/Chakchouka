<?php 
require ('action/user/securityAction.php');
require ('action/question/myQuestionsAction.php');
?>
<!DOCTYPE html>
<html lang="en">
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

            </h5>
        <div class="card-body">
            <p class="card-text">
                 <?=$question['description'];?>.
            </p>
            <a href="article.php?id=<?php echo $question['id'];?>"class="btn btn-primary">Accéder à la question</a>
    <a href="edit-question.php?id=<?=$question['id'];?>" class="btn btn-warning">modifier la question</a>
    <a href="action/question/deleteQuestionAction.php?id=<?=$question['id'];?>" class="btn btn-danger">supprimer la question</a>
    <br>
  </div>
</div><br>
        <?php
     }
?>
 </div>
</body>
</html>