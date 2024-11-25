<?php
// Include database configuration
include("database/config.php");

// Initialize variables
$errors = [];
$id = "";
$title = "";
$body = "";
$image = "";
$topic_id = "";

$stmt = $conn->prepare("SELECT * FROM topics");
$stmt->execute();
$topics = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Create a new post
if (isset($_POST['add-post'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $image = $_POST['image'];
    $topic_id = $_POST['topic_id']; // Get topic_id from form input

    // Validate form input
    if (empty($title)) {
        array_push($errors, "Title is required");
    }
    if (empty($body)) {
        array_push($errors, "Body is required");
    }
    if (empty($image)) {
        array_push($errors, "Image is required");
    }
    if (empty($topic_id)) {
        array_push($errors, "Topic is required");
    }

    if (count($errors) === 0) {
        $stmt = $conn->prepare("INSERT INTO posts (title, body, image, topic_id) VALUES (:title, :body, :image, :topic_id)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':body', $body);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':topic_id', $topic_id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: ../../admin/posts/index.php");
        exit();
    }
}
// Edit a post
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $stmt = $conn->prepare("SELECT * FROM posts WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Populate the form with existing post data
        $title = $result['title'];
        $body = $result['body'];
        $image = $result['image'];
        $topic_id = $result['topic_id'];
    } else {
        // Handle case if post doesn't exist
        echo "Post not found!";
        exit;
    }
}
if (isset($_POST['edit-post'])) {
    $id = $_POST['id']; 
    $title = $_POST['title'];
    $body = $_POST['body'];
    $image = $_FILES['image']['name']; 
    $topic_id = $_POST['topic_id'];

    // Validate input
    if (empty($title)) {
        array_push($errors, "Title is required");
    }
    if (empty($body)) {
        array_push($errors, "Body is required");
    }
    if (empty($topic_id)) {
        array_push($errors, "Topic is required");
    }
    if (!empty($image)) {
        $targetDir = "../view/assets/imgs"; 
        $targetFile = $targetDir . basename($image);
        // Upload the image
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            // Successfully uploaded image
        } else {
            array_push($errors, "Failed to upload image");
        }
    } else {
        $image = $_POST['existing_image'];
    }
    if (count($errors) === 0) {
        $stmt = $conn->prepare("UPDATE posts SET title = :title, body = :body, image = :image, topic_id = :topic_id WHERE id = :id");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':body', $body);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':topic_id', $topic_id, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        header("Location: ../../admin/posts/index.php");
        exit();
    }
}

// Delete a post 
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $stmt = $conn->prepare("DELETE FROM posts WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: ../../admin/posts/index.php");
    exit();
}
// Fetch all posts with topics
$stmt = $conn->prepare("
    SELECT posts.*, topics.name AS topic_name 
    FROM posts 
    LEFT JOIN topics ON posts.topic_id = topics.id
");
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);