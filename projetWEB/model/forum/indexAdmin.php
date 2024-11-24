<?php 
session_start();
require('action/question/showAllQuestionsAction.php');
//require('action\admin\deleteQuestionActionAdmin.php');

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>
<body>
    <?php include 'includes/navbarAdmin.php';?>
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