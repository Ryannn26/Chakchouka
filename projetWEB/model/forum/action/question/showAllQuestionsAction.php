<?php
require('action/database.php');
//récupérer les questions par défaut sans recherche
$getAllQuestions = $bdd->query('SELECT id,id_auteur,titre,description,pseudo_auteur,date_publication FROM questions ORDER BY id DESC LIMIT 0,5');
//vérification si une recherche a été rentrée par utilisateur
if(isset($_GET['search']) && !empty($_GET['search'])){
    //la recherche 
    $userSearch=$_GET['search'];
    //requête pour la recherche avec wildcards
    $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%'.$userSearch.'%" ORDER BY id DESC');

}