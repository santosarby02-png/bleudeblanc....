<?php
session_start();
include "bleuConnection.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: bleuLogin.php");
    exit;
}

if (isset($_GET['bleuid'])) {
    $id = intval($_GET['bleuid']);
    $sql = "DELETE FROM users WHERE id = $id AND role='client'";
    $bleuConn->query($sql);
}

header("Location: bleuAdminViewClients.php");
exit;
?>