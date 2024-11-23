<?php


require('action/database.php');
if(isset($_POST['supprimer'])){
    if (!empty($_POST['id'])) {
        $answer_id = (int)$_POST['id'];

        $checkAnswer = $bdd->prepare('SELECT id_auteur FROM answers WHERE id = ?');
        $checkAnswer->execute(array($answer_id));
        $answerData = $checkAnswer->fetch();


        if ($answerData && ($answerData['id_auteur'] == $_SESSION['id'])) {
            // Suppression de la réponse
            $deleteAnswer = $bdd->prepare('DELETE FROM answers WHERE id = ?');
            $deleteAnswer->execute(array($answer_id));
            // Redirection après suppression pour éviter une resoumission
            header('Location: ../../article.php?id='.$answer_id);
        }else{
                echo "Vous n'êtes pas l'auteur de cette réponse.vous n'avez pas le droit de supprimer.";
                
        }
    
    }else{
        echo "Aucune question n'a été trouvée.";
        
    }

}
    