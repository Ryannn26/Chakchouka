<?php
include(__DIR__ . '/../config.php');
include(__DIR__ . '/../model/food.php');

class foodcontroller
{
    // List all foods
    public function listFood()
    {
        $sql = "SELECT * FROM food";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    // Delete a food item
    function deletefood($id)
    {
        $sql = "DELETE FROM food WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    // Add a new food item
    function addfood($food)
    {
        $sql = "INSERT INTO food (id, title, description, price, image) 
                VALUES (:id, :title, :description, :price, :image)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $food->getId(),
                'title' => $food->getTitle(),
                'description' => $food->getDescription(),
                'price' => $food->getPrice(),
                'image' => $food->getImage()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    // Update a food item
    function updatefood($food, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE food SET 
                    title = :title,
                    description = :description,
                    price = :price,
                    image = :image
                WHERE id = :id'
            );
            $query->execute([
                'id' => $id,
                'title' => $food->getTitle(),
                'description' => $food->getDescription(),
                'price' => $food->getPrice(),
                'image' => $food->getImage()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Show a specific food item by ID
    function showfood($id)
    {
        $sql = "SELECT * FROM food WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $food = $query->fetch(PDO::FETCH_ASSOC);
            return $food;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
