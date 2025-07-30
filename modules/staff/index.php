<?php
include '../../includes/db_connect.php';
include '../../templates/header.php';
include '../../templates/sidebar.php';
?>

<div class="main">
  <h2>Staff Records</h2>

  <!-- Flash Messages -->
  <?php if (isset($_GET['success'])) echo "<p class='success'>✅ Staff added successfully!</p>"; ?>
  <?php if (isset($_GET['updated'])) echo "<p class='success'>✏️ Staff updated successfully!</p>"; ?>
  <?php if (isset($_GET['deleted'])) echo "<p class='success'>🗑️ Staff deleted successfully!</p>"; ?>

  <!-- Add New Staff Button -->
  <a href="add_staff.php" class="btn">➕ Add New Staff</a>

  <!-- Staff Table -->
  <table>
    <thead>
      <tr>
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
      $result = mysqli_query($conn, "SELECT * FROM staff");
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['department']}</td>
                <td>{$row['staff_id']}</td>
                <td>{$row['joining_date']}</td>
                <td>{$row['role_in_school']}</td>
                <td>
                  <a href='edit_staff.php?id={$row['id']}' class='btn-edit'>Edit</a>
                  <a href='delete_staff.php?id={$row['id']}' class='btn-delete' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
              </tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<?php include '../../templates/footer.php'; ?>
