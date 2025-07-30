<?php
include '../../includes/db_connect.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM staff WHERE id=$id"));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $dept = $_POST['department'];
  $sid = $_POST['staff_id'];
  $join = $_POST['joining_date'];
  $role = $_POST['role_in_school'];

  mysqli_query($conn, "UPDATE staff SET 
      name='$name',
      department='$dept',
      staff_id='$sid',
      joining_date='$join',
      role_in_school='$role' 
      WHERE id=$id");
  header("Location: index.php?updated=1");
}
?>
<?php include '../../templates/header.php'; include '../../templates/sidebar.php'; ?>
<link rel="stylesheet" href="../../assets/css/style.css">
<div class="main">
  <h2>Edit Staff</h2>
  <form method="POST" class="form-box">
    <input name="name" value="<?= $data['name'] ?>" required>
    <input name="department" value="<?= $data['department'] ?>" required>
    <input name="staff_id" value="<?= $data['staff_id'] ?>" required>
    <input name="joining_date" type="date" value="<?= $data['joining_date'] ?>" required>
    <input name="role_in_school" value="<?= $data['role_in_school'] ?>" required>
    <button type="submit">Update</button>
  </form>
</div>
<?php include '../../templates/footer.php'; ?>
