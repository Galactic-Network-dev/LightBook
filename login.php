<?php
// Start session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate user input (you may want to add more validation)
    if (empty($username) || empty($password)) {
        // Handle empty fields
        echo "Please enter username and password.";
    } else {
        // Check if the username and password are correct
        // Replace this section with your database query
        $storedUsername = "your_username"; // Replace with actual stored username
        $storedPassword = "your_password"; // Replace with actual stored password

        // Check if username and password match
        if ($username == $storedUsername && $password == $storedPassword) {
            // Login successful, set session variables
            $_SESSION['username'] = $username;

            // Redirect to the dashboard or another page
            header("Location: dashboard.php");
            exit();
        } else {
            // Login failed, show error message
            echo "Invalid username or password.";
        }
    }
}
?>
