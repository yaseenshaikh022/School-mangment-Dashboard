<?php
include '../../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $dept = $_POST['department'];
  $duration = $_POST['duration'];
  $roll = $_POST['roll_number'];
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $pname = $_POST['parent_name'];
  $pcontact = $_POST['parent_contact'];
  $emergency = $_POST['emergency_contact'];
  $adhar = $_POST['parent_adhar'];

  $sql = "INSERT INTO students (name, department, duration, roll_number, username, password, parent_name, parent_contact, emergency_contact, parent_adhar)
          VALUES ('$name', '$dept', '$duration', '$roll', '$username', '$password', '$pname', '$pcontact', '$emergency', '$adhar')";

  if (mysqli_query($conn, $sql)) {
    header("Location: list_students.php");
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>
