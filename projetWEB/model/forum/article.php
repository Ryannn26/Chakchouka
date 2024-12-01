
<?php
session_start();
require('action/question/showArticleContentAction.php');
require('action/question/postAnswerAction.php');
require('action/question/showAllAnswersAction.php');
require('action/question/deleteAnswersAction.php');
//require('action/question/editAnswersAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style_formulaire_question.css">
<?php include ('includes/head.php');?>
<body>
    <?php include ('includes/navbar.php'); ?>
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
            <form class="form-group" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="from-label" >Réponse:</label>
                    <textarea name="answer" class="form-control"></textarea>
                    <small id="errorAnswer" class="text-danger" style="display: none;">Veuillez entrer une réponse.</small>
                    <br>
                    <button class="btn btn-primary" type="submit" name="validate">Répondre à la question</button>
                </div>
            </form>
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
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($answer['id']); ?>">
                                    <?php if ($_SESSION['id'] == $answer['id_auteur'] || $_SESSION['id'] == $question_id_auteur) { ?>
                                        <button type="submit" name="supprimer" class="btn btn-danger">Supprimer</button>
                                        <button type="submit" name="modifier" class="btn btn-warning">Modifier</button>
                                    <?php } ?>
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
    <script src="../../controller/js/validation.js"></script>
</body>
</html>