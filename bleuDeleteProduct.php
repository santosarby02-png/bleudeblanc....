<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "bleuConnection.php";

// Make sure bleuprodid is provided
if (!isset($_GET['bleuprodid'])) {
    header("Location: bleuAdminProduct.php");
    exit();
}

$bleuprodid = $_GET['bleuprodid'];

// Use prepared statement for safety
$stmt = $bleuConn->prepare("DELETE FROM bleuProducts WHERE bleuprodid = ?");
if ($stmt) {
    $stmt->bind_param("i", $bleuprodid);
    $stmt->execute();
    $stmt->close();
}

// Redirect back to admin product page
header("Location: bleuAdminProduct.php");
exit();
?>
