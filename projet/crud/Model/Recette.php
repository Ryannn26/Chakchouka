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

    public function setIdPlats($id_plats) {
        $this->id_plats = $id_plats;
    }
}
?>
