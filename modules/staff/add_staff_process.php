<?php
include '../../config/db_connect.php'; // Adjust path if needed

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $department = $_POST['department'];
    $staff_id = $_POST['staff_id'];
    $joining_date = $_POST['joining_date'];
    $role = $_POST['role'];

    // Prepare & insert
    $stmt = $conn->prepare("INSERT INTO staff (name, department, staff_id, joining_date, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $department, $staff_id, $joining_date, $role);

    if ($stmt->execute()) {
        // Redirect back to the staff list page with success message
        header("Location: staff_list.php?success=1");
        exit();
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "❌ Invalid Request!";
}
?>
