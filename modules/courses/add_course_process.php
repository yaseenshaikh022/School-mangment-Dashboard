<?php
include '../../config/db_connect.php';

// Get data from form
$course_name = $_POST['course_name'];
$course_code = $_POST['course_code'];
$description = $_POST['description'];

// Insert into DB
$sql = "INSERT INTO courses (course_name, course_code, description) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $course_name, $course_code, $description);

if ($stmt->execute()) {
    header("Location: course_list.php?success=1");
    exit();
} else {
    echo "Error: " . $stmt->error;
}
?>
