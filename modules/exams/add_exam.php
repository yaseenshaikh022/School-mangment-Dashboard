<?php include '../../templates/header.php'; ?>
<?php include '../../templates/sidebar.php'; ?>
<link rel="stylesheet" href="../../assets/css/style.css">

<div class="main">
  <h2>Add New Exam</h2>

  <form action="add_exam_process.php" method="POST" class="form">
    <label>Exam Name:</label>
    <input type="text" name="exam_name" required>

    <label>Exam Date:</label>
    <input type="date" name="exam_date" required>

    <label>Class:</label>
    <input type="text" name="class" required>

    <button type="submit">Add Exam</button>
  </form>

  <a href="exam_list.php" class="back-link">← Back to Exam List</a>
</div>

<?php include '../../templates/footer.php'; ?>
