<?php include '../../templates/header.php'; ?>
<?php include '../../templates/sidebar.php'; ?>
<link rel="stylesheet" href="../../assets/css/style.css">

<div class="main">
  <h2>Course/Subject Records</h2>

  <?php if (isset($_GET['success'])): ?>
    <p style="color: green;">Action completed successfully!</p>
  <?php endif; ?>

  <a href="add_course.php" class="btn">+ Add Course</a>

  <table class="styled-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Course Name</th>
        <th>Code</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include '../../config/db_connect.php';

      $result = $conn->query("SELECT * FROM courses");

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $id = htmlspecialchars($row['id']);
          $name = htmlspecialchars($row['course_name'] ?? 'N/A');
          $code = htmlspecialchars($row['course_code'] ?? 'N/A');
          $desc = htmlspecialchars($row['description'] ?? 'N/A');

          echo "<tr>
                  <td>{$id}</td>
                  <td>{$name}</td>
                  <td>{$code}</td>
                  <td>{$desc}</td>
                  <td>
                    <a href='edit_course.php?id={$id}'>Edit</a> |
                    <a href='delete_course.php?id={$id}' onclick=\"return confirm('Are you sure you want to delete this course?')\">Delete</a>
                  </td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='5'>No courses found.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<?php include '../../templates/footer.php'; ?>
