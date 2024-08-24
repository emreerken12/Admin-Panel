<?php
include '../database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form input
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate input
    if (!empty($username) && !empty($password)) {
        // Prepare SQL statement using prepared statements
        $stmt = $conn->prepare("SELECT id, username, password FROM admin_login WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        // Check if the user exists
        if ($result && $result->num_rows > 0) {
            // Fetch the user record
            $user = $result->fetch_assoc();

            // Password is correct, create session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect to a protected page (e.g., dashboard.php)
             header('Location: dark/index.php');
        
            exit;
        } else {
            // Invalid username or password
            echo "Invalid username or password.";
            header('Location: login.php');
        }
    } else {
        // Missing username or password
        echo "Please enter both username and password.";
    }
}



?>