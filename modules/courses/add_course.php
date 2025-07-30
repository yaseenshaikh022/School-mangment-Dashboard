<?php include '../../templates/header.php'; ?>
<?php include '../../templates/sidebar.php'; ?>

<link rel="stylesheet" href="../../assets/css/style.css">

<div class="main">
  <h2>Add New Course</h2>

  <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <p class="success">✅ Course added successfully!</p>
  <?php endif; ?>

  <form action="add_course_process.php" method="POST" class="form">
    <label>Course Name:</label>
    <input type="text" name="course_name" required>

    <label>Course Code:</label>
    <input type="text" name="course_code" required>

    <label>Description:</label>
    <textarea name="description" rows="4"></textarea>

    <button type="submit">Add Course</button>
    <a href="course_list.php" class="back-btn">⬅ Back to Course List</a>
  </form>
</div>

<?php include '../../templates/footer.php'; ?>
