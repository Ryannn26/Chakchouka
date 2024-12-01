
<?php
session_start();
require('action/question/showArticleContentAction.php');
require('action/question/postAnswerAction.php');
require('action/question/showAllAnswersAction.php');
require('action/question/deleteAnswersAction.php');
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
                                        <input type="hidden" name="answer_id" value="<?= htmlspecialchars($answer['id']); ?>">
                                        <button type="submit" name="edit" class="btn btn-warning">Modifier</button>
                                    <?php } ?>
                                </form>
                                <?php
                                if (isset($_POST['edit'])) {
                                    $answer_id = intval($_POST['answer_id']); // Récupérer l'ID de la réponse à modifier

                                    // Récupérer la réponse depuis la base de données
                                    $query = $bdd->prepare('SELECT contenu FROM answers WHERE id = ?');
                                    $query->execute([$answer_id]);
                                    $answerData = $query->fetch();

                                    if ($answerData) { ?>
                                        <form method="POST">
                                            <input type="hidden" name="answer_id" value="<?= htmlspecialchars($answer_id); ?>">
                                            <div class="mb-3">
                                                <label for="editAnswer" class="form-label">Modifier votre réponse :</label>
                                                <textarea name="new_answer" class="form-control"><?= htmlspecialchars($answerData['contenu']); ?></textarea>
                                            </div>
                                            <button type="submit" name="update_answer" class="btn btn-success">Mettre à jour</button>
                                        </form>
                                    <?php }
                                }
                                ?>

                                
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