<?php
include '../../templates/header.php';
include '../../templates/sidebar.php';
include '../../config/db_connect.php'; // Ensure DB is connected
?>

<link rel="stylesheet" href="../../assets/css/style.css">

<div class="main">
  <h2>Staff Records</h2>

  <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <p class="success">Staff added successfully!</p>
  <?php endif; ?>

  <a href="add_staff.php" class="button">+ Add Staff</a>

  <table class="styled-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Department</th>
        <th>Staff ID</th>
        <th>Joining Date</th>
        <th>Role</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $query = "SELECT * FROM staff";
        $result = $conn->query($query);

        if ($result->num_rows > 0):
          while ($row = $result->fetch_assoc()):
      ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['department'] ?></td>
          <td><?= $row['staff_id'] ?></td>
          <td><?= $row['joining_date'] ?></td>
          <td><?= $row['role'] ?></td>
          <td>
            <a href="edit_staff.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="delete_staff.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
          </td>
        </tr>
      <?php endwhile; else: ?>
        <tr><td colspan="7">No staff records found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php include '../../templates/footer.php'; ?>
