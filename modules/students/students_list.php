<?php
include '../../includes/db_connect.php';
include '../../templates/header.php';
include '../../templates/sidebar.php';

$result = mysqli_query($conn, "SELECT * FROM students");
?>

<div class="main">
  <h2>Student Records</h2>
  <a href="add_student.php" class="btn">+ Add Student</a>
  <link rel="stylesheet" href="../../assets/css/style.css">

  <table>
    <thead>
      <tr>
        <th>#</th><th>Name</th><th>Department</th><th>Roll No</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['department'] ?></td>
          <td><?= $row['roll_number'] ?></td>
          <td>
            <a href="edit_student.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="delete_student.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this student?')">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php include '../../templates/footer.php'; ?>
