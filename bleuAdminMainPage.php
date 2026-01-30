<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ensure only admins can access
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: bleuLogIn.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin</title>
</head>
<frameset rows="20%,*,12%">
    <!-- Header -->
    <frameset cols="*">
        <frame noresize src="bleuHeader.php" scrolling="NO">
    </frameset>

    <!-- Main content -->
    <frameset cols="30%,*">
        <!-- Navigation -->
        <frame noresize src="bleuAdminNav.php" scrolling="NO" name="nav_column">
        <!-- Main page content -->
        <frame noresize src="bleuAdminProduct.php" name="mid_column">
    </frameset>

    <!-- Footer -->
    <frame noresize src="bleuFooter.php" scrolling="NO">
</frameset>
</html>
