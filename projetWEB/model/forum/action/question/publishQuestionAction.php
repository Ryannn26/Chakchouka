<?php
require('action/database.php');
//valiser le formulaire
if (isset($_POST['validate'])){
    //vérifier si tous les champs ont été remplis
    if(!empty($_POST['title'])&&!empty($_POST['description'])&&!empty($_POST['content'])){
        //les données de la question
        $question_title=htmlspecialchars($_POST['title']); //
        $question_description=nl2br(htmlspecialchars($_POST['description'])); //
        $question_content=nl2br(htmlspecialchars($_POST['content'])); //
        $question_date=date('d/m/Y');
        $question_id_author=$_SESSION['id'];
        $question_pseudo_author=$_SESSION['pseudo'];
        // Validate

        //insérer les informations de la question sur la base de données à l'aide d'une requête préparée et exécutée avec les données du formulaire
        $insertQuestionOnWebsite=$bdd->prepare('INSERT INTO questions(titre,description,contenu,id_auteur,pseudo_auteur,date_publication)VALUES(?,?,?,?,?,?)');
        $insertQuestionOnWebsite->execute(
            array(
                $question_title,
                $question_description, 
                $question_content, 
                $question_id_author, 
                $question_pseudo_author, 
                $question_date
                )
            );
            $successMsg="votre question a bien ete publier sur le site";

    }else{
        $errorMsg="Veuillez compléter tous les champs";
    }
}