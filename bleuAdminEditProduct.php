<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="bleuStyle_1.css">
<title>Edit Product</title>
<style>
.bleucard img {
    display: block;
    margin: 0 auto 15px auto;
    border-radius: 7px;
}

.bleucard table tr:last-child td {
    text-align: center;
}

.bleucard button {
    margin: 0 7px;
}

.bleucon {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
    padding-bottom: 30px;
}

.bleucard {
    background: #fff;
    border: 2px solid #000;
    border-radius: 10px;
    width: 350px;
    padding: 20px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.bleucard:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.3);
}

h1 {
    text-align: center;
    color: #000;
    font-size: 2.5rem;
    margin-bottom: 20px;
}

.bleucard table {
    width: 100%;
    border-collapse: collapse;
}

.bleucard td {
    padding: 6px;
    vertical-align: middle;
}

.bleucard input[type="text"],
.bleucard input[type="number"] {
    width: 90%;
    padding: 5px;
    border: 1px solid #000;
    border-radius: 5px;
    background-color: #fff;
    font-family: "Georgia", serif;
}

.bleuviewbtn {
    padding: 8px 15px;
    border-radius: 6px;
    border: 2px solid #000;
    cursor: pointer;
    transition: 0.3s ease;
    font-family: "Georgia", serif;
    color: #000;
    background-color: #fff;
}

.bleuviewbtn:hover {
    background-color: #ccc;
    transform: translateY(-2px);
    box-shadow: 2px 2px 6px rgba(0,0,0,0.2);
}
</style>
</head>
<body class="products-page">
<h1>Edit Product</h1>
<div class="bleucon">
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "bleuConnection.php";

$bleuprodid = $_GET['bleuprodid'] ?? 0;

$sql = "SELECT * FROM bleuproducts WHERE bleuprodid = '$bleuprodid'";
$ressql = mysqli_query($bleuConn, $sql);

if(mysqli_num_rows($ressql) === 1){
    $bleuprod = mysqli_fetch_assoc($ressql);
    echo '
    <div class="bleucard">
        <img src="data:image/jpeg;base64,' . base64_encode($bleuprod['bleu_Image']) . '" width="200">
        <form action="bleuAdminUpdateProduct.php?bleuprodid='. $bleuprod['bleuprodid'] .'" method="post">
            <table>
                <tr>
                    <td>Product Name:</td>
                    <td><input type="text" name="bleuprodname" value="'. $bleuprod['bleu_ProductName'] .'"></td>
                </tr>
                <tr>
                    <td>Unit:</td>
                    <td><input type="text" name="bleuunit" value="'. $bleuprod['bleu_Unit'] .'"></td>
                </tr>
                <tr>
                    <td>Price per Unit:</td>
                    <td><input type="text" name="bleupriceunit" value="'. $bleuprod['bleu_PriceperUnit'] .'"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <button class="bleuviewbtn" name="bleuupdatebtn" type="submit">Update</button>
                        <button class="bleuviewbtn" onclick="window.location.href=\'bleuAdminProduct.php\'">Cancel</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>';
} else {
    echo '<p>Product not found.</p>';
}
?>
</div>
</body>
</html>
