<?php
include '../includes/db_connect.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = 'admin'; // default, or get from a dropdown
$query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

if (mysqli_query($conn, $query)) {
  header("Location: login.php");
} else {
  echo "Error: " . mysqli_error($conn);
}
?>
