<?php include '../../templates/header.php'; ?>
<?php include '../../templates/sidebar.php'; ?>
<link rel="stylesheet" href="../../assets/css/style.css">

<div class="main">
  <h2>Enter Marks</h2>

  <form action="marks_entry_process.php" method="POST" class="form">
    <label>Student ID:</label>
    <input type="text" name="student_id" required>

    <label>Exam:</label>
    <select name="exam_id" required>
      <?php
      include '../../config/db_connect.php';
      $exams = $conn->query("SELECT * FROM exams");
      while ($exam = $exams->fetch_assoc()) {
        echo "<option value='{$exam['id']}'>{$exam['exam_name']}</option>";
      }
      ?>
    </select>

    <label>Subject:</label>
    <input type="text" name="subject" required>

    <label>Marks Obtained:</label>
    <input type="number" name="marks" min="0" required>

    <button type="submit">Save Marks</button>
  </form>

  <a href="exam_list.php" class="back-link">← Back to Exam List</a>
</div>

<?php include '../../templates/footer.php'; ?>
