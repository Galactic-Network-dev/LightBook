<?php
// Start session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate user input (you may want to add more validation)
    if (empty($username) || empty($email) || empty($password)) {
        // Handle empty fields
        echo "Please fill in all fields.";
    } else {
        // Save user data to a database or file
        // Replace this section with your database or file handling logic

        // For demonstration purposes, let's just print the user data
        echo "User Registered Successfully!<br>";
        echo "Username: $username<br>";
        echo "Email: $email<br>";
        echo "Password: $password";
    }
}
?>
