<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activer les erreurs PDO

    // Requête SQL corrigée
    $jointure = "
    SELECT 
        answers.contenu AS answer_content,
        answers.pseudo_auteur AS answer_author,
        questions.titre AS question_title,
        questions.contenu AS question_content,
        questions.pseudo_auteur AS question_author
    FROM answers
    INNER JOIN questions 
    ON answers.id_question = questions.id
    WHERE answers.pseudo_auteur = questions.pseudo_auteur
    ";

    // Préparation et exécution de la requête
    $requete = $bdd->prepare($jointure);
    $requete->execute();

    // Récupération des résultats
    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);

    // // Affichage des résultats
    // foreach ($resultats as $row) {
    //     echo '<h3>Question : ' . htmlspecialchars($row['question_title']) . '</h3>';
    //     echo '<p>Contenu : ' . htmlspecialchars($row['question_content']) . '</p>';
    //     echo '<p>Auteur : ' . htmlspecialchars($row['question_author']) . '</p>';
    //     echo '<hr>';
    //     echo '<p>Réponse : ' . htmlspecialchars($row['answer_content']) . '</p>';
    //     echo '<p>Auteur de la réponse : ' . htmlspecialchars($row['answer_author']) . '</p>';
    //     echo '<hr>';
    // }
} catch (Exception $e) {
    die('Une erreur a été trouvée : ' . $e->getMessage());
}
?>
