<?php
// Check if the file was uploaded without errors
if ($_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
    // Specify the directory where the uploaded file will be stored
    $uploadDir = "uploads/";

    // Create the directory if it doesn't exist
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Generate a unique filename for the uploaded file
    $uniqueFilename = uniqid() . "_" . basename($_FILES["photo"]["name"]);

    // Specify the path where the uploaded file will be moved to
    $uploadFilePath = $uploadDir . $uniqueFilename;

    // Move the uploaded file to the specified location
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadFilePath)) {
        // Respond with success message and the path to the uploaded file
        echo json_encode(array("success" => true, "message" => "File uploaded successfully.", "filePath" => $uploadFilePath));
    } else {
        // Respond with error message if file upload failed
        echo json_encode(array("success" => false, "message" => "Failed to upload file."));
    }
} else {
    // Respond with error message if there was an error during file upload
    echo json_encode(array("success" => false, "message" => "File upload error."));
}
?>
