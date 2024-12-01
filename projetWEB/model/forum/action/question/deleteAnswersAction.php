<?php

require('action/database.php');
if (isset($_POST['supprimer'])) {
    if (!empty($_POST['id'])) {
        $answer_id = (int)$_POST['id'];

        // Vérifier si l'utilisateur est l'auteur de la réponse
        $checkAnswer = $bdd->prepare('SELECT id_auteur, id_question FROM answers WHERE id = ?');
        $checkAnswer->execute(array($answer_id));
        $answerData = $checkAnswer->fetch();

        if ($answerData && ($answerData['id_auteur'] == $_SESSION['id'])) {
            // Suppression de la réponse
            $deleteAnswer = $bdd->prepare('DELETE FROM answers WHERE id = ?');
            $deleteAnswer->execute(array($answer_id));

            // Redirection vers l'article (question) après suppression
            $question_id = $answerData['id_question']; // Récupérer l'ID de la question
            header('Location: http://localhost/Chakchouka/projetWEB/model/forum/article.php?id=' . $question_id);
            exit(); // Stopper l'exécution après redirection
        } else {
            echo "Vous n'êtes pas l'auteur de cette réponse. Vous n'avez pas le droit de la supprimer.";
        }
    } else {
        echo "Aucune réponse n'a été spécifiée.";
    }
}
