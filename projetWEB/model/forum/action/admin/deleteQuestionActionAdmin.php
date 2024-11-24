<?php
session_start();

// Vérifiez si l'utilisateur est authentifié
if (!isset($_SESSION['auth'])) {
    header('Location: ../../loginAdmin.php');
    exit;
}

require('../database.php');

// Vérifiez si le formulaire a été soumis correctement
if (isset($_POST['delete']) && !empty($_POST['id'])) {
    $idOfTheQuestion = (int)$_POST['id']; // Assurez-vous que l'ID est un entier

    // Vérifiez si la question existe
    $checkIfQuestionExists = $bdd->prepare('SELECT id_auteur FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute([$idOfTheQuestion]);

    if ($checkIfQuestionExists->rowCount() > 0) {
        // Suppression de la question
        $deleteThisQuestion = $bdd->prepare('DELETE FROM questions WHERE id = ?');
        $deleteThisQuestion->execute([$idOfTheQuestion]);

        // Redirection avec message de succès
        header('Location: ../../indexAdmin.php?message=success');
        exit;
    } else {
        // Redirection avec message d'erreur
        header('Location: ../../indexAdmin.php?message=not_found');
        exit;
    }
} else {
    // Redirection si le formulaire est mal soumis
    header('Location: ../../indexAdmin.php?message=invalid_request');
    exit;
}
?>
