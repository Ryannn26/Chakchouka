<?php
class Recette {
    private $id_recette;
    private $titre;
    private $ingredients;
    private $video_url;
    private $id_plats;  // Foreign key linking to the plats table

    public function __construct($id_recette, $titre, $ingredients, $video_url, $id_plats) {
        $this->id_recette = $id_recette;
        $this->titre = $titre;
        $this->ingredients = $ingredients;
        $this->video_url = $video_url;
        $this->id_plats = $id_plats;
    }

    public function getIdRecette() {
        return $this->id_recette;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getIngredients() {
        return $this->ingredients;
    }

    public function getVideoUrl() {
        return $this->video_url;
    }

    public function getIdPlats() {
        return $this->id_plats;
    }
}

class RecetteController {
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=chakchouka1", "root", ""); // Adjust credentials as needed
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // Get recette by ID
    public function getRecetteById($id_recette) {
        $query = $this->db->prepare("SELECT * FROM recette WHERE id_recette = :id_recette");
        $query->execute(['id_recette' => $id_recette]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Get all recettes
    public function getAllRecettes() {
        $query = $this->db->query("SELECT * FROM recette");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add a new recette
    public function addRecette(Recette $recette) {
        // Insert the new recette into the database with the associated plat (id_plats)
        $query = $this->db->prepare("INSERT INTO recette (titre, ingredients, video_url, id_plats) 
                                     VALUES (:titre, :ingredients, :video_url, :id_plats)");
        return $query->execute([
            'titre' => $recette->getTitre(),
            'ingredients' => $recette->getIngredients(),
            'video_url' => $recette->getVideoUrl(),
            'id_plats' => $recette->getIdPlats()  // Including the plat ID when adding the recette
        ]);
    }

    // Update an existing recette
    public function updateRecette(Recette $recette) {
        $query = $this->db->prepare("UPDATE recette SET titre = :titre, ingredients = :ingredients, 
                                    video_url = :video_url, id_plats = :id_plats 
                                    WHERE id_recette = :id_recette");
        return $query->execute([
            'titre' => $recette->getTitre(),
            'ingredients' => $recette->getIngredients(),
            'video_url' => $recette->getVideoUrl(),
            'id_plats' => $recette->getIdPlats(),
            'id_recette' => $recette->getIdRecette()
        ]);
    }

    // Delete a recette
    public function deleteRecette($id_recette) {
        $query = $this->db->prepare("DELETE FROM recette WHERE id_recette = :id_recette");
        return $query->execute(['id_recette' => $id_recette]);
    }

    // Get recettes by associated plat (id_plats)
    public function getRecettesByPlat($id_plats) {
        $query = $this->db->prepare("SELECT * FROM recette WHERE id_plats = :id_plats");
        $query->execute(['id_plats' => $id_plats]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
