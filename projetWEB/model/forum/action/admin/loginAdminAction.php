<?php
session_start();
require('action/database.php');

// Vérification si le formulaire a été soumis
// Données administrateur
// $pseudo = 'admin';
// $plainPassword = 'admin';
// $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);
// $nom = 'admin';
// $prenom = 'admin';

// // Insertion dans la base de données
// $insertAdmin = $bdd->prepare('INSERT INTO admin (pseudo, mdp, nom, prenom) VALUES (?, ?, ?, ?)');
// $insertAdmin->execute([$pseudo, $hashedPassword, $nom, $prenom]);

// echo "Administrateur créé avec succès !";




// validation de formulaire de la base de datos

if(isset($_POST['validate'])){
    //vérifier si tous les champs ont été remplis
    if(!empty($_POST['pseudo']) && !empty($_POST['password'])){
        //les données de l'admin
        $Admin_pseudo=htmlspecialchars($_POST['pseudo']);
        $Admin_password=htmlspecialchars($_POST['password']);
        //vérifier si le pseudo existe et le mdp existe
        $checkIfAdminExists=$bdd->prepare('SELECT * FROM Admin WHERE pseudo=?');
        $checkIfAdminExists->execute(array($Admin_pseudo));
        //si le user existe déjà
        if($checkIfAdminExists->rowCount()>0){

            //récupérer les données de l'utilisateur
           $AdminInfos=$checkIfAdminExists->fetch();
           //vérifier le mdp ect correcte
            if(isset($AdminInfos['mdp']) && password_verify($Admin_password,$AdminInfos['mdp'])){
             //démarer une session et stocker les informations de l'utilisateur
            $_SESSION['auth']=true;
            $_SESSION['id'] = $AdminInfos['id'];
            $_SESSION['pseudo'] = $AdminInfos['pseudo'];
            $_SESSION['lastname'] = $AdminInfos['nom'];
            $_SESSION['firstname'] = $AdminInfos['prenom'];
            //redirige l'utilisateur vers la page d'acceuille
            header('Location: indexAdmin.php');
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