<?php
include '../../includes/db_connect.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM staff WHERE id=$id");
header("Location: index.php?deleted=1");
