<?php
include '../../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $department = $_POST['department'];
  $roll = $_POST['roll_number'];
  $parent = $_POST['parent_name'];
  $p_contact = $_POST['parent_contact'];
  $em_contact = $_POST['emergency_contact'];
  $adhar = $_POST['parent_adhar'];

  $sql = "INSERT INTO students (name, department, roll_number, parent_name, parent_contact, emergency_contact, parent_adhar)
          VALUES ('$name', '$department', '$roll', '$parent', '$p_contact', '$em_contact', '$adhar')";

  if (mysqli_query($conn, $sql)) {
    header('Location: students_list.php?success=1');
    exit;
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
