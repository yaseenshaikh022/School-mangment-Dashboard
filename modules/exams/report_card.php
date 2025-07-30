<?php include '../../templates/header.php'; ?>
<?php include '../../templates/sidebar.php'; ?>
<link rel="stylesheet" href="../../assets/css/style.css">
<a href="generate_report_card_pdf.php?student_id=123" class="btn">Export to PDF</a>


<div class="main">
  <h2>Generate Report Card</h2>

  <form method="GET" class="form">
    <label>Select Class:</label>
    <select name="class" required>
      <option value="">-- Select Class --</option>
      <?php
      include '../../config/db_connect.php';
      $classes = $conn->query("SELECT DISTINCT class FROM students");
      while ($row = $classes->fetch_assoc()) {
        $selected = ($_GET['class'] ?? '') === $row['class'] ? 'selected' : '';
        echo "<option value='{$row['class']}' $selected>{$row['class']}</option>";
      }
      ?>
    </select>

    <label>Select Exam:</label>
    <select name="exam_id" required>
      <option value="">-- Select Exam --</option>
      <?php
      $exams = $conn->query("SELECT * FROM exams");
      while ($row = $exams->fetch_assoc()) {
        $selected = ($_GET['exam_id'] ?? '') == $row['id'] ? 'selected' : '';
        echo "<option value='{$row['id']}' $selected>{$row['exam_name']}</option>";
      }
      ?>
    </select>

    <label>Select Student:</label>
    <select name="student_id" required>
      <option value="">-- Select Student --</option>
      <?php
      if (!empty($_GET['class'])) {
        $class = $_GET['class'];
        $students = $conn->query("SELECT id, name FROM students WHERE class = '$class'");
        while ($row = $students->fetch_assoc()) {
          $selected = ($_GET['student_id'] ?? '') == $row['id'] ? 'selected' : '';
          echo "<option value='{$row['id']}' $selected>{$row['name']} (ID: {$row['id']})</option>";
        }
      }
      ?>
    </select>

    <button type="submit">Generate Report</button>
  </form>

  <?php
  if (!empty($_GET['student_id']) && !empty($_GET['exam_id'])) {
    $student_id = $_GET['student_id'];
    $exam_id = $_GET['exam_id'];

    $marks = $conn->query("SELECT * FROM marks WHERE student_id = '$student_id' AND exam_id = '$exam_id'");

    if ($marks->num_rows > 0) {
      echo "<h3>Report Card - Student ID: $student_id</h3>";
      echo "<table class='styled-table'>
              <thead>
                <tr>
                  <th>Subject</th>
                  <th>Marks</th>
                </tr>
              </thead>
              <tbody>";
      $total = 0;
      $count = 0;
      while ($row = $marks->fetch_assoc()) {
        echo "<tr><td>{$row['subject']}</td><td>{$row['marks']}</td></tr>";
        $total += $row['marks'];
        $count++;
      }
      $percentage = $count ? round($total / $count, 2) : 0;
      echo "</tbody></table>";
      echo "<p><strong>Total Marks:</strong> $total</p>";
      echo "<p><strong>Percentage:</strong> $percentage%</p>";

      echo "<form method='POST' action='export_report.php'>
              <input type='hidden' name='student_id' value='$student_id'>
              <input type='hidden' name='exam_id' value='$exam_id'>
              <button type='submit' name='export' value='pdf'>Export as PDF</button>
              <button type='submit' name='export' value='excel'>Export as Excel</button>
            </form>";
    } else {
      echo "<p>No marks found for selected student and exam.</p>";
    }
  }
  ?>

  <a href="exam_list.php" class="back-link">← Back to Exam List</a>
</div>

<?php include '../../templates/footer.php'; ?>
