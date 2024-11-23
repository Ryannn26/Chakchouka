<?php
//session_start();
require('action/database.php');
if(isset($_POST['validate'])){
    if(!empty($_POST['answer'])){
        $user_answer=nl2br(htmlspecialchars($_POST['answer'])); //
        
        $insertAnswer=$bdd->prepare('INSERT INTO answers (id_auteur,pseudo_auteur,id_question,contenu) VALUES (?, ?, ?, ?)');
        $insertAnswer->execute(array($_SESSION['id'],$_SESSION['pseudo'],$idOfTheQuestion,$user_answer));
        // Redirection pour éviter la duplication des réponses après actualisation
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit; // Arrête le script après la redirection
    }else {
        $errorMsg = "Veuillez entrer une réponse.";
    }

}