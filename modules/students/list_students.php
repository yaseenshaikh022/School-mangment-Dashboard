<?php include '../../templates/header.php'; ?>
<div class="container">
    <link rel="stylesheet" href="../../assets/css/style.css">
  <h2>👨‍🎓 Student Records</h2>
  <a href="add_student.php" class="btn btn-primary">➕ Add Student</a>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Department</th>
      <th>Roll No</th>
      <th>Parent Name</th>
      <th>Actions</th>
    </tr>
    <?php
    include '../../includes/db_connect.php';
    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['department']}</td>
        <td>{$row['roll_number']}</td>
        <td>{$row['parent_name']}</td>
        <td>
          <a href='edit_student.php?id={$row['id']}'>✏️ Edit</a> |
          <a href='delete_student.php?id={$row['id']}' onclick=\"return confirm('Are you sure?')\">🗑️ Delete</a>
        </td>
      </tr>";
    }
    ?>
  </table>
</div>
<?php include '../../templates/footer.php'; ?>
