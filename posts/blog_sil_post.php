<?php
include('../database.php');

if (isset($_POST['team_member'])) {
    $teamMemberName = $_POST['team_member'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = mysqli_prepare($conn, "DELETE FROM blog_posts_combined WHERE title = ?");
    mysqli_stmt_bind_param($stmt, "s", $teamMemberName);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Üye başarıyla silindi.";
        header('Location: ../blog_sil.php');
    } else {
        echo "Üye silinemedi: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>