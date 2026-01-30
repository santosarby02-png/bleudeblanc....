<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "bleuConnection.php";

if (
    isset(
        $_POST['fname'],
        $_POST['lname'],
        $_POST['email'],
        $_POST['uname'],
        $_POST['pass'],
        $_POST['cpass']
    )
) {
    $fname    = trim($_POST['fname']);
    $lname    = trim($_POST['lname']);
    $email    = trim($_POST['email']);
    $username = trim($_POST['uname']);
    $pass     = trim($_POST['pass']);
    $cpass    = trim($_POST['cpass']);

    if ($pass !== $cpass) {
        header("Location: bleuRegister.php?message=Passwords do not match.");
        exit();
    }

    $role   = 'client';
    $status = 0; // pending approval

    // ⚠️ For production use password_hash()
    $password = $pass;

    $stmt = $bleuConn->prepare(
        "INSERT INTO users (username, password, role, fname, lname, email, status)
         VALUES (?, ?, ?, ?, ?, ?, ?)"
    );

    if (!$stmt) {
        header("Location: bleuRegister.php?message=Database error.");
        exit();
    }

    $stmt->bind_param(
        "ssssssi",
        $username,
        $password,
        $role,
        $fname,
        $lname,
        $email,
        $status
    );

    if ($stmt->execute()) {
        $_SESSION['bleures']   = 1;
        $_SESSION['bleufname'] = $fname;

        header("Location: bleuRegisteroutput.php");
        exit();
    } else {
        header("Location: bleuRegister.php?message=Username or email already exists.");
        exit();
    }
} else {
    header("Location: bleuRegister.php?message=Please fill in all fields.");
    exit();
}
?>
