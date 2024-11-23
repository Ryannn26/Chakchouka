<?php
require('action/database.php');
//verifier si l'id de la question est rentrer dans l'URL
if(isset($_GET['id'])&& !empty($_GET['id'])){
    $idOfTheQuestion=$_GET['id'];
    //vérifier si la question existe (id est bien passer en parametre)
    $checkIfQuestion=$bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestion->execute(array($idOfTheQuestion));
    if($checkIfQuestion->rowCount()>0){
        //récupérer les informations de la question
        $questionInfo=$checkIfQuestion->fetch();
        //récupérer les informations de l'auteur de la question
        $question_titre=$questionInfo['titre'];
        $question_contenu=$questionInfo['contenu'];
        $question_id_auteur=$questionInfo['id_auteur'];
        $question_pseudo_auteur=$questionInfo['pseudo_auteur'];
        $question_date_publication=$questionInfo['date_publication'];

         
    }
    else{
        $errorMsg= "La question n'existe pas";
    }
}else{
    $errorMsg= "aucune question n'a été trouvée";
}