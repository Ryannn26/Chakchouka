
<?php
session_start();
require('action/question/showArticleContentAction.php');
require('action/question/postAnswerAction.php');
require('action/question/showAllAnswersAction.php');
require('action/question/deleteAnswersAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include ('includes/head.php');?>
<body>
    <?php include ('includes/navbarAdmin.php'); ?>
    <br><br>
    <div class="container">
        <?php
        if(isset($errorMsg)){
            echo $errorMsg ;
        }
        if(isset($question_date_publication)){
        ?>
        <section class="show-conent">
            <h3><?= $question_titre; ?></h3>
            <hr>
            <p><?=  $question_contenu; ?></p>
            <hr>
            <small><?= $question_pseudo_auteur .' '. $question_date_publication; ?></small>
        </section>
        <br>
        <section class="show-answers">
            <?php
                while($answer=$getAllAnswersOfTheQuestion->fetch()){
                    ?>
                        <div class="card">
                            <div class="cadr-header">
                                <h5><?= $answer['pseudo_auteur'];?></h5>
                                
                            </div>
                            <div class="card-body">
                                <?= $answer['contenu'];?>

                                
                            </div>
                            <form method="POST" >
                                <input type="hidden" name="id" value="<?= $answer['id']; ?>">
                                <button type="submit" name="supprimer" class="btn btn-danger">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                        <br>

                    <?php
                }
            ?>

        </section>
        <?php
        }   
    ?>
    </div>
</body>
</html>