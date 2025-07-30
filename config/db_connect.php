<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_system"; // change to your actual DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
