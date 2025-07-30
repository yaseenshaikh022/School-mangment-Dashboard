<!DOCTYPE html>
<html>
<head>
  <title>Add Student</title>
  <link rel="stylesheet" href="../../assets/css/style.css">
  <a href="../../index.php" class="back-btn">← Back to Dashboard</a>
</head>
<body>
  <h2>Add New Student</h2>
  <?php if (isset($_GET['success'])): ?>
  <div class="success-msg">Student added successfully!</div>
<?php endif; ?>
  <form method="POST" action="add_student_process.php">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="text" name="department" placeholder="Department" required>
    <input type="text" name="roll_number" placeholder="Roll Number" required>
    <input type="text" name="parent_name" placeholder="Parent Name" required>
    <input type="text" name="parent_contact" placeholder="Parent Contact" required>
    <input type="text" name="emergency_contact" placeholder="Emergency Contact" required>
    <input type="text" name="parent_adhar" placeholder="Parent Aadhaar" required>
    <button type="submit">Add Student</button>
  </form>
</body>
</html>
