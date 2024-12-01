<?php

require('action/database.php');
if (isset($_POST['supprimer'])) {
    if (!empty($_POST['id'])) {
        $answer_id = (int)$_POST['id'];

        // Vérifier si l'utilisateur est l'auteur de la réponse
        $checkAnswer = $bdd->prepare('SELECT id_auteur, id_question FROM answers WHERE id = ?');
        $checkAnswer->execute(array($answer_id));
        $answerData = $checkAnswer->fetch();

       
            // Suppression de la réponse
            $deleteAnswer = $bdd->prepare('DELETE FROM answers WHERE id = ?');
            $deleteAnswer->execute(array($answer_id));

            // Redirection vers l'article (question) après suppression
            $question_id = $answerData['id_question']; // Récupérer l'ID de la question
            header('Location: http://localhost/Chakchouka/projetWEB/model/forum/articleAdmin.php?id=' . $question_id);
            exit(); // Stopper l'exécution après redirection
      
    } else {
        echo "Aucune réponse n'a été spécifiée.";
    }
}