<?php
include '../../config/db_connect.php';

$id = $_POST['id'];
$course_name = $_POST['course_name'];
$course_code = $_POST['course_code'];
$description = $_POST['description'];

$stmt = $conn->prepare("UPDATE courses SET course_name = ?, course_code = ?, description = ? WHERE id = ?");
$stmt->bind_param("sssi", $course_name, $course_code, $description, $id);

if ($stmt->execute()) {
    header("Location: course_list.php?success=1");
    exit;
} else {
    echo "Failed to update course.";
}
