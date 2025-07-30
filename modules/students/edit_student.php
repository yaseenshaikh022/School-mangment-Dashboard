<?php
include '../../includes/db_connect.php';


if (!isset($_GET['id'])) {
  echo "Student ID missing.";
  exit;
}

$id = $_GET['id'];

// Fetch student data
$result = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
$student = mysqli_fetch_assoc($result);

if (!$student) {
  echo "Student not found.";
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $department = $_POST['department'];
  $roll_number = $_POST['roll_number'];
  
  $query = "UPDATE students SET name='$name', department='$department', roll_number='$roll_number' WHERE id=$id";
  mysqli_query($conn, $query);
  header("Location: students_list.php?success=Student+updated+successfully");
  exit;
}
?>
<link rel="stylesheet" href="../../assets/css/style.css">
<h2>Edit Student</h2>
<form method="POST">
  <label>Name</label><br>
  <input type="text" name="name" value="<?= $student['name'] ?>" required><br><br>

  <label>Department</label><br>
  <input type="text" name="department" value="<?= $student['department'] ?>" required><br><br>

  <label>Roll Number</label><br>
  <input type="text" name="roll_number" value="<?= $student['roll_number'] ?>" required><br><br>

  <button type="submit">Update</button>
</form>
<br>
<a href="students_list.php">Back to list</a>
