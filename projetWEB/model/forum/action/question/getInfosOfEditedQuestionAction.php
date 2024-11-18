<?php
//session_start();
require('action/database.php');
if(isset($_GET['id'])&&!empty($_GET['id'])){
    //récupérer l'id de la question
    $idOfQuestion=$_GET['id'];
    //vérifier si la question existe (id est bien passer en parametre)
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id =?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

    if($checkIfQuestionExists->rowCount()>0){
        //récupérer les informations de la question
        $questionInfos=$checkIfQuestionExists->fetch();
        if($questionInfos['id_auteur'] == $_SESSION['id']){

            $question_title=$questionInfos['titre'];
            $question_description=$questionInfos['description'];
            $question_content=$questionInfos['contenu'];
            //$question_date=$questionInfos['date_publication'];
            $question_description=str_replace('<br />','',$question_description);
            $question_content=str_replace('<br />','',$question_content);
        }else{
            $errorMsg="Vous n'êtes pas l'auteur de cette question";
        }
    }else{
        $errorMsg="La question n'existe pas";
        
    }

}else{
    $errorMsg="Aucune question n'a été trouvée";
}