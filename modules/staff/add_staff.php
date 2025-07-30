<?php include '../../templates/header.php'; ?>
<?php include '../../templates/sidebar.php'; ?>

<link rel="stylesheet" href="../../assets/css/style.css">

<div class="main">
  <h2>Add Staff Member</h2>

  <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <div class="success-message">✅ Staff member added successfully!</div>
  <?php endif; ?>

  <form method="POST" action="add_staff_process.php" class="styled-form">
    <label for="name">Full Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="department">Department:</label>
    <input type="text" name="department" id="department" required>

    <label for="staff_id">Staff ID:</label>
    <input type="text" name="staff_id" id="staff_id" required>

    <label for="joining_date">Joining Date:</label>
    <input type="date" name="joining_date" id="joining_date" required>

    <label for="role">Role in School:</label>
    <input type="text" name="role" id="role" required>

    <div class="form-buttons">
      <button type="submit" class="styled-button">Add Staff</button>
      <a href="staff_list.php" class="styled-button secondary">Back to Staff List</a>
    </div>
  </form>
</div>

<?php include '../../templates/footer.php'; ?>
