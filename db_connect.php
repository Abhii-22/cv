<?php
$servername = "localhost:3307";
$username = "root"; // Default XAMPP username
$password = ""; // Default is empty for XAMPP
$database = "cv_builder"; // Ensure this is correct

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
