<?php

require('action/database.php'); // Connexion à la base de données (corrigez le chemin si nécessaire)

// Lire les données JSON envoyées
$data = json_decode(file_get_contents('php://input'), true);

// Vérification des données et de la session utilisateur
if (isset($data['question_id'], $data['rating']) && isset($_SESSION['id'])) {
    $question_id = intval($data['question_id']);
    $rating = intval($data['rating']);
    $user_id = intval($_SESSION['id']); // ID de l'utilisateur connecté

    // Vérification de la validité de la note
    if ($rating >= 1 && $rating <= 5) {
        try {
            // Insertion ou mise à jour de la note
            $stmt = $bdd->prepare("
                INSERT INTO ratings (question_id, user_id, rating)
                VALUES (:question_id, :user_id, :rating)
                ON DUPLICATE KEY UPDATE rating = :rating
            ");
            $stmt->execute([
                ':question_id' => $question_id,
                ':user_id' => $user_id,
                ':rating' => $rating
            ]);

            echo json_encode(['success' => true, 'message' => 'Note enregistrée avec succès.']);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Erreur : ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'La note doit être entre 1 et 5.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Paramètres manquants ou utilisateur non connecté.']);
}
?>
