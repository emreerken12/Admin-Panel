<?php
// Database connection
include('../database.php');
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $category = $conn->real_escape_string($_POST['category']);
    $image_src = "";
    $heading_meta="Blog";

    // Handle image upload
    if (isset($_FILES['image_src']) && $_FILES['image_src']['error'] === UPLOAD_ERR_OK) {
        $image_tmp_name = $_FILES['image_src']['tmp_name'];
        $image_name = basename($_FILES['image_src']['name']);
        $upload_dir = "./uploads/"; // Define your upload directory
        $image_path = $upload_dir . $image_name;

        if (move_uploaded_file($image_tmp_name, $image_path)) {
            $image_src = $conn->real_escape_string($image_path);
        } else {
            echo "Image upload failed!";
            exit;
        }
    }

    // Insert data into the database
    $sql = "INSERT INTO blog_posts_combined (heading_meta, title, description, category, image_src) 
            VALUES ('$heading_meta','$title', '$description', '$category', '$image_src')";

    if ($conn->query($sql) === TRUE) {
        echo "New blog post added successfully!";
        header('Location: ../blog_ekle.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
