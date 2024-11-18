<?php
// Include database configuration
include("../../apps/database/config.php");

// Initialize variables
$errors = [];
$id = "";
$name = "";
$description = "";

// Create a new topic
if (isset($_POST['add-topic'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Validate form input
    if (empty($name)) {
        array_push($errors, "Name is required");
    }
    if (empty($description)) {
        array_push($errors, "Description is required");
    }

    if (count($errors) === 0) {
        $stmt = $conn->prepare("INSERT INTO topics (name, description) VALUES (:name, :description)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->execute();

        header("Location: index.php");
        exit();
    }
}

// Edit a topic
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $stmt = $conn->prepare("SELECT * FROM topics WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $name = $result['name'];
    $description = $result['description'];
}

// Update a topic
if (isset($_POST['update-topic'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Validate form input
    if (empty($name)) {
        array_push($errors, "Name is required");
    }
    if (empty($description)) {
        array_push($errors, "Description is required");
    }

    if (count($errors) === 0) {
        $stmt = $conn->prepare("UPDATE topics SET name = :name, description = :description WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: index.php");
        exit();
    }
}

// Delete a topic
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $stmt = $conn->prepare("DELETE FROM topics WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: index.php");
    exit();
}

// Fetch all topics
$stmt = $conn->prepare("SELECT * FROM topics");
$stmt->execute();
$topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
