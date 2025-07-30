<?php
include '../includes/db_connect.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
  $user = mysqli_fetch_assoc($result);
  if (password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];
    header("Location: ../index.php");
  } else {
    echo "Invalid password.";
  }
} else {
  echo "User not found.";
}
?>
