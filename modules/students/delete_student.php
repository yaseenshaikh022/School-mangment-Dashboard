<?php
include '../../includes/db_connect.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  mysqli_query($conn, "DELETE FROM students WHERE id = $id");
  header("Location: students_list.php?success=Student+deleted+successfully");
  exit;
} else {
  echo "ID missing.";
}
