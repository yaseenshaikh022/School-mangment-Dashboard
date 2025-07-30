<?php
include '../../config/db_connect.php';

$id = $_GET['id'] ?? '';
if ($id) {
    $stmt = $conn->prepare("DELETE FROM courses WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: course_list.php?success=1");
        exit;
    } else {
        echo "Failed to delete course.";
    }
} else {
    header("Location: course_list.php");
}
