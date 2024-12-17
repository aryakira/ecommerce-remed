<?php
session_start();
include '../includes/db.php';  // Naik satu level untuk mencapai folder includes

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$query = "UPDATE orders SET status = 'completed' WHERE user_id = '$user_id' AND status = 'pending'";

if ($conn->query($query) === TRUE) {
    echo "Order completed successfully!";
    header("Location: profile.php");
} else {
    echo "Error: " . $conn->error;
}
?>
