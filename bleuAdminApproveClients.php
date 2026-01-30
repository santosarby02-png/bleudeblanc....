<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "bleuConnection.php";

// Only allow admins
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: bleuLogin.php");
    exit;
}

// Approve client if ID is set
if (isset($_GET['bleuid'])) {
    $id = intval($_GET['bleuid']);
    $stmt = $bleuConn->prepare("UPDATE users SET status = 1 WHERE id = ? AND role = 'client'");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Redirect back to clients page
header("Location: bleuAdminViewClients.php");
exit;
?>
