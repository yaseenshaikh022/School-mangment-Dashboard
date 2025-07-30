include '../../config/db_connect.php';
<link rel="stylesheet" href="../../assets/css/style.css">

<?php
$name = $_POST['exam_name'];
$date = $_POST['exam_date'];
$class = $_POST['class_name'];

$stmt = $conn->prepare("INSERT INTO exams (exam_name, exam_date, class_name) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $date, $class);
$stmt->execute();

header("Location: exam_list.php?success=1");
exit;
