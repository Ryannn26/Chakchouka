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
if (isset($_POST['update_answer'])) {
    $answer_id = intval($_POST['answer_id']);
    $new_answer = htmlspecialchars($_POST['new_answer']);

    if (!empty($new_answer)) {
        // Mettre à jour la réponse dans la base de données
        $query = $bdd->prepare('UPDATE answers SET contenu = ? WHERE id = ?');
        $result = $query->execute([$new_answer, $answer_id]);

        if ($result) {
            echo '<div class="alert alert-success">La réponse a été mise à jour avec succès.</div>';
        } else {
            echo '<div class="alert alert-danger">Erreur lors de la mise à jour de la réponse.</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Veuillez entrer un texte valide.</div>';
    }
}
