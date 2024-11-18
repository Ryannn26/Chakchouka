<?php
session_start();
require('action/database.php');
// validation de formulaire de la base de datos
if(isset($_POST['validate'])){
    //vérifier si tous les champs ont été remplis
    if(!empty($_POST['pseudo']) && !empty($_POST['lastname']&&!empty($_POST['firstname'])&& !empty($_POST['password']))){
        //les données de l'user
        $user_pseudo =htmlspecialchars($_POST['pseudo']);
        $user_lastname=htmlspecialchars($_POST['lastname']);
        $user_firstname=htmlspecialchars($_POST['firstname']);
        $user_password=password_hash($_POST['password'], PASSWORD_DEFAULT);

        //vérifier si le pseudo est déjà utilisé par un autre utilisateur sur la base de données
        $checkIfUserAlredyExists= $bdd->prepare('SELECT pseudo FROM users WHERE pseudo =?');
        $checkIfUserAlredyExists->execute(array($user_pseudo));

        if($checkIfUserAlredyExists->rowCount()==0){
            //insérer les informations de l'utilisateur sur la base de données à l'aide d'une requête préparée et exécutée avec les données du formulaire
            $insertUserOnWebsite= $bdd->prepare('INSERT INTO users(pseudo, nom, prenom, mdp) VALUES(?,?,?,?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));
            //récupérer les informations de l'utilisateur qui vient de s'inscrire pour le renvoyer sur la page de connexion
            $getInfosOfThisUserReq=$bdd->prepare('SELECT id,pseudo,nom ,prenom FROM users WHERE nom=? AND prenom=? AND pseudo=? ');
            $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo));

            $userInfos= $getInfosOfThisUserReq->fetch();
            //démarer une session et stocker les informations de l'utilisateur
            $_SESSION['auth']=true;
            $_SESSION['id'] = $userInfos['id'];
            $_SESSION['pseudo'] = $userInfos['pseudo'];
            $_SESSION['lastname'] = $userInfos['nom'];
            $_SESSION['firstname'] = $userInfos['prenom'];
            //rederiger l'user vere la page d'acceille
            header('Location: index.php');
        }else{

            $errorMsg="Ce pseudo est déjà utilisé";
        }


    }else{
        $errorMsg="veuillez compléter les champs!!!!";
    }
}