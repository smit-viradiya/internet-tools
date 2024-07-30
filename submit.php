<?php
include 'db.php'; // Database connection file

if (isset($_POST['submit'])) {
    $message = $_POST['message'];

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO string_info (message) VALUES (?)");
    $stmt->bind_param("s", $message);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit();
}
?>
