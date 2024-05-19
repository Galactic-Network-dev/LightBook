<?php
// Connect to the database
$dbHost = 'localhost';
$dbUsername = 'your_username';
$dbPassword = 'your_password';
$dbName = 'your_database_name';
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    // Handle file upload (save the photo to a directory on your server)
    $photoName = $_FILES['photo']['name'];
    $photoTmpName = $_FILES['photo']['tmp_name'];
    $photoPath = 'uploads/' . $photoName; // Adjust the path as needed
    move_uploaded_file($photoTmpName, $photoPath);
    
    // Insert post data into the database
    $sql = "INSERT INTO posts (name, description, photo) VALUES ('$name', '$description', '$photoPath')";
    if ($db->query($sql) === TRUE) {
        echo "New post created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}
?>
