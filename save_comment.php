<?php
// Check if all required fields are set
if (isset($_POST['replyName']) && isset($_POST['reply'])) {
    // Process the comment data
    $replyName = $_POST['replyName'];
    $reply = $_POST['reply'];
    
    // Save the comment to a database or file
    // Replace this section with your database or file handling logic

    // For demonstration purposes, let's assume we're saving to a text file
    $commentData = "Name: $replyName\nReply: $reply\n\n";
    file_put_contents('comments.txt', $commentData, FILE_APPEND);

    // Respond with success message
    echo json_encode(array("success" => true, "message" => "Comment added successfully."));
} else {
    // Respond with error message if required fields are missing
    echo json_encode(array("success" => false, "message" => "Missing required fields."));
}
?>
