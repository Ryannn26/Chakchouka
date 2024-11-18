<?php
class Plats {
    private $id_plats;
    private $nom_plats;
    private $description;
    private $image_url;
    private $id_pays;  // New attribute for country

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
}

class PlatsController {
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=chakchouka1", "root", ""); // Adjust credentials as needed
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // Get plats by ID
    public function getPlatsById($id_plats) {
        $query = $this->db->prepare("SELECT * FROM plats WHERE id_plats = :id_plats");
        $query->execute(['id_plats' => $id_plats]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Get all plats
    public function getAllPlats() {
        $query = $this->db->query("SELECT * FROM plats");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add a new plat (dish)
    public function addPlats(Plats $plat) {
        // Insert the new plat into the database with the associated country (id_pays)
        $query = $this->db->prepare("INSERT INTO plats (nom_plats, description, image_url, id_pays) 
                                     VALUES (:nom_plats, :description, :image_url, :id_pays)");
        return $query->execute([
            'nom_plats' => $plat->getNomPlats(),
            'description' => $plat->getDescription(),
            'image_url' => $plat->getImageUrl(),
            'id_pays' => $plat->getIdPays()  // Including the country ID when adding the plat
        ]);
    }

    // Update an existing plat
    public function updatePlats(Plats $plat) {
        $query = $this->db->prepare("UPDATE plats SET nom_plats = :nom_plats, description = :description, 
                                    image_url = :image_url, id_pays = :id_pays 
                                    WHERE id_plats = :id_plats");
        return $query->execute([
            'nom_plats' => $plat->getNomPlats(),
            'description' => $plat->getDescription(),
            'image_url' => $plat->getImageUrl(),
            'id_pays' => $plat->getIdPays(),
            'id_plats' => $plat->getIdPlats()
        ]);
    }

    // Delete a plat
    public function deletePlats($id_plats) {
        $query = $this->db->prepare("DELETE FROM plats WHERE id_plats = :id_plats");
        return $query->execute(['id_plats' => $id_plats]);
    }

    // Get plats by associated country (id_pays)
    public function getPlatsByPays($id_pays) {
        $query = $this->db->prepare("SELECT * FROM plats WHERE id_pays = :id_pays");
        $query->execute(['id_pays' => $id_pays]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
