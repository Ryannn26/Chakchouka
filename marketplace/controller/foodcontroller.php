<?php
include(__DIR__ . '/../config.php');
include(__DIR__ . '/../model/food.php');

class foodcontroller
{
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

    function addfood($food)
    {   var_dump($food);
        $sql = "INSERT INTO food  
        VALUES (:id, :title,:description, :price, :image)";
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

    function updatefood($food, $id)
{
    try {
        var_dump($food);
        var_dump($id);

        // Get the database connection
        $db = config::getConnexion();

        // Prepare the SQL query with placeholders
        $query = $db->prepare(
            'UPDATE food SET 
                title = :title,
                description = :description,
                price = :price,
                image = :image
            WHERE id = :id'
        );
        echo "Executing query: " . $query->queryString . "<br>";
        echo "Parameters: <br>";
        var_dump([
            'title' => $food->getTitle(),
            'description' => $food->getDescription(),
            'price' => $food->getPrice(),
            'image' => $food->getImage(),
            'id' => $id
        ]);
        // Execute the query with parameter binding
        $query->execute([
            'title' => $food->getTitle(),
            'description' => $food->getDescription(),
            'price' => $food->getPrice(),
            'image' => $food->getImage(),
            'id' => $id
        ]);

        // Display how many records were updated
        echo $query->rowCount() . " records UPDATED successfully <br>";

    } catch (PDOException $e) {
        // Log the error message
        echo "Error: " . $e->getMessage();
    } catch (Exception $e) {
        // Log general exceptions
        echo "Error: " . $e->getMessage();
    }
}

    function showfood($id)
    {
        $sql = "SELECT * from food where id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $food = $query->fetch();
            return $food;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}