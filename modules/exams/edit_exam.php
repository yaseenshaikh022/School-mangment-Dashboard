<?php include '../../templates/header.php'; ?>
<?php include '../../templates/sidebar.php'; ?>
<link rel="stylesheet" href="../../assets/css/style.css">

<div class="main">
  <h2>Edit Exam</h2>

  <form action="edit_exam_process.php" method="POST" class="form">
    <input type="hidden" name="id" value="<?= $exam['id'] ?>">

    <label>Exam Name:</label>
    <input type="text" name="exam_name" value="<?= htmlspecialchars($exam['exam_name']) ?>" required>

    <label>Exam Date:</label>
    <input type="date" name="exam_date" value="<?= $exam['exam_date'] ?>" required>

    <label>Class:</label>
    <input type="text" name="class" value="<?= htmlspecialchars($exam['class']) ?>" required>

    <button type="submit">Update Exam</button>
  </form>

  <a href="exam_list.php" class="back-link">← Back to Exam List</a>
</div>

<?php include '../../templates/footer.php'; ?>
