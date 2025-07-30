$exam_id = $_POST['exam_id'];
foreach ($_POST['marks'] as $student_id => $mark) {
  $stmt = $conn->prepare("INSERT INTO marks (exam_id, student_id, marks) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE marks=?");
  $stmt->bind_param("iiii", $exam_id, $student_id, $mark, $mark);
  $stmt->execute();
}
header("Location: exam_list.php?success=1");
