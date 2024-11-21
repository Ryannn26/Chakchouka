<?php 
session_start();
require('action/question/showAllQuestionsAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>
<body>
    <?php include 'includes/navbar.php';?>
    <br></br>
    <div class="container">
        <form method="GET">
            <h2>Recherche</h2>
            <div class="form-group row">
                <div class="col-8">
                    <input type="search" name="search" class="form-contro">
                </div>
                <div class="col-4">
                    <button class="btn btn-success">Rechercher</button>
                </div>
            </div>
        
        </form>
        <br>
        <?php
        while($question=$getAllQuestions->fetch()){
            ?>
            <div class="card">
                <div class="card-header">
                    <?php echo $question['titre'];?>
                    
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


</body>
</html>