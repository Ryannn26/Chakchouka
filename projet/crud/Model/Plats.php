<?php
class Plats {
    private $id_plats;
    private $nom_plats;
    private $description;
    private $image_url;
    private $id_pays;  // Added the id_pays to associate a plat with a country

    public function __construct($id_plats, $nom_plats, $description, $image_url, $id_pays) {
        $this->id_plats = $id_plats;
        $this->nom_plats = $nom_plats;
        $this->description = $description;
        $this->image_url = $image_url;
        $this->id_pays = $id_pays;
    }

    public function getIdPlats() {
        return $this->id_plats;
    }

    public function getNomPlats() {
        return $this->nom_plats;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImageUrl() {
        return $this->image_url;
    }

    public function getIdPays() {
        return $this->id_pays;
    }

    public function setIdPays($id_pays) {
        $this->id_pays = $id_pays;
    }
}
?>
