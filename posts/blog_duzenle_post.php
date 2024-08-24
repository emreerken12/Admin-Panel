<?php
include('../database.php');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selected_title = $conn->real_escape_string($_POST['team_member']);
    $new_title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $category = $conn->real_escape_string($_POST['category']);
    $image_src = "";

    // Fetch the current image path before updating
    $sql = "SELECT image_src FROM blog_posts_combined WHERE title='$selected_title'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $old_image_path = $row['image_src'];

    // Handle image upload
    if (isset($_FILES['image_src']) && $_FILES['image_src']['error'] === UPLOAD_ERR_OK) {
        $image_tmp_name = $_FILES['image_src']['tmp_name'];
        $image_name = basename($_FILES['image_src']['name']);
        $upload_dir = "./uploads/"; // Define your upload directory
        $image_path = $upload_dir . $image_name;

        if (move_uploaded_file($image_tmp_name, $image_path)) {
            $image_src = $conn->real_escape_string($image_path);

            // Delete the old image if a new one was uploaded
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
        } else {
            echo "Image upload failed!";
            exit;
        }
    }

    // Update the record in the database
    $sql = "UPDATE blog_posts_combined SET 
            title='$new_title', 
            description='$description', 
            category='$category'";

    // Only update the image if a new one was uploaded
    if ($image_src !== "") {
        $sql .= ", image_src='$image_src'";
    }

    $sql .= " WHERE title='$selected_title'";

    if ($conn->query($sql) === TRUE) {
        echo "Blog post updated successfully!";
        header('Location: ../blog_duzenle.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
