<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "bleuConnection.php";

if(isset($_POST['bleuupdatebtn'])) {
    $bleuprodid = $_GET['bleuprodid'];
    $bleuprodname = $_POST['bleuprodname'];
    $bleuunit = $_POST['bleuunit'];
    $bleupriceunit = $_POST['bleupriceunit'];

    // Use prepared statements for better security
    $query = "UPDATE bleuproducts 
              SET bleu_ProductName = ?, bleu_Unit = ?, bleu_PriceperUnit = ? 
              WHERE bleuprodid = ?";
    $stmt = mysqli_prepare($bleuConn, $query);
    mysqli_stmt_bind_param($stmt, "ssdi", $bleuprodname, $bleuunit, $bleupriceunit, $bleuprodid);

    if(mysqli_stmt_execute($stmt)) {
        header("Location: bleuAdminProduct.php?bleuprodid={$bleuprodid}");
        exit();
    } else {
        echo "Error updating product: " . mysqli_error($bleuConn);
    }
}
?>
