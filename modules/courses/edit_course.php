<?php
include '../../config/db_connect.php';

$id = $_GET['id'] ?? '';
if (!$id) {
    header("Location: course_list.php");
    exit;
}

$result = $conn->prepare("SELECT * FROM courses WHERE id = ?");
$result->bind_param("i", $id);
$result->execute();
$data = $result->get_result()->fetch_assoc();

if (!$data) {
    echo "Course not found!";
    exit;
}
?>

<?php include '../../templates/header.php'; ?>
<?php include '../../templates/sidebar.php'; ?>
<link rel="stylesheet" href="../../assets/css/style.css">

<div class="main">
  <h2>Edit Course/Subject</h2>

  <form action="edit_course_process.php" method="POST" class="form">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <label>Course Name:</label>
    <input type="text" name="course_name" required value="<?= htmlspecialchars($data['course_name']) ?>">

    <label>Course Code:</label>
    <input type="text" name="course_code" required value="<?= htmlspecialchars($data['course_code']) ?>">

    <label>Description:</label>
    <textarea name="description"><?= htmlspecialchars($data['description']) ?></textarea>

    <button type="submit">Update Course</button>
  </form>

  <br>
  <a href="course_list.php" class="btn">← Back to Course List</a>
</div>

<?php include '../../templates/footer.php'; ?>
