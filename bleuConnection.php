<?php
$bleuConn = mysqli_connect("localhost", "root", "", "bluedeblanc");
if (!$bleuConn) {
    die("Database connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($bleuConn, "utf8");
?>
