<?php
session_start();
require('action/database.php');
// validation de formulaire de la base de datos
if(isset($_POST['validate'])){
    //vérifier si tous les champs ont été remplis
    if(!empty($_POST['pseudo']) && !empty($_POST['password'])){
        //les données de l'user
        $user_pseudo =htmlspecialchars($_POST['pseudo']);
        $user_password=htmlspecialchars($_POST['password']);
        //vérifier si le pseudo existe et le mdp existe
        $checkIfUserExists=$bdd->prepare('SELECT * FROM users WHERE pseudo=?');
        $checkIfUserExists->execute(array($user_pseudo));
        //si le user existe déjà
        if($checkIfUserExists->rowCount()>0){

            //récupérer les données de l'utilisateur
           $userInfos=$checkIfUserExists->fetch();
           //vérifier le mdp ect correcte
            if(isset($userInfos['mdp']) && password_verify($user_password,$userInfos['mdp'])){
             //démarer une session et stocker les informations de l'utilisateur
            $_SESSION['auth']=true;
            $_SESSION['id'] = $userInfos['id'];
            $_SESSION['pseudo'] = $userInfos['pseudo'];
            $_SESSION['lastname'] = $userInfos['nom'];
            $_SESSION['firstname'] = $userInfos['prenom'];
            //redirige l'utilisateur vers la page d'acceuille
            header('Location: index.php');
                echo "connexion réusssie!";
            }else{
                $errorMsg="Ce mot de passe est incorrecte";
            }
        }else{
            $errorMsg="Ce pseudo est incorrecte";
        }
    }else{
        $errorMsg="veuillez compléter les champs!!!!";
    }
}