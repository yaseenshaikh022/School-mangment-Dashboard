<?php include '../../templates/header.php'; ?>
<?php include '../../templates/sidebar.php'; ?>
<link rel="stylesheet" href="../../assets/css/style.css">

<div class="main">
  <h2>Exams</h2>

  <?php if (isset($_GET['success'])) echo "<p style='color: green;'>Action completed successfully!</p>"; ?>

  <a href="add_exam.php" class="btn">+ Add Exam</a>

  <table class="styled-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Exam Name</th>
        <th>Date</th>
        <th>Class</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include '../../config/db_connect.php';
      $result = $conn->query("SELECT * FROM exams");
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['exam_name']}</td>
                <td>{$row['exam_date']}</td>
                <td>{$row['class']}</td>
                <td>
                  <a href='edit_exam.php?id={$row['id']}'>Edit</a> |
                  <a href='delete_exam.php?id={$row['id']}' onclick=\"return confirm('Are you sure?')\">Delete</a>
                </td>
              </tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<?php include '../../templates/footer.php'; ?>
