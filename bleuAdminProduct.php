<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Products</title>
<style>
body.products-page {
    font-family: "Georgia", serif;
    background-color: #fff;
    color: #000;
    padding: 30px;
}

h1 {
    text-align: center;
    color: #000;
    font-size: 2.5rem;
    margin-bottom: 20px;
}

.bleucon {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.bleucard {
    background: #fff;
    border: 2px solid #000;
    border-radius: 10px;
    width: 220px;
    padding: 15px;
    text-align: center;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.bleucard:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
}

.bleucard img {
    border-radius: 5px;
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
}

.bleucard h5 p {
    font-weight: bold;
    color: #000;
    margin: 5px 0;
}

.bleuviewbtn {
    background: #fff;
    color: #000;
    border: 2px solid #000;
    padding: 8px 15px;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.3s ease;
}

.bleuviewbtn:hover {
    background: #000;
    color: #fff;
}
</style>
</head>
<body class="products-page">
<h1>Admin Products</h1>
<br><br>
<div class="bleucon">
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "bleuConnection.php";

$sql = "SELECT * FROM bleuproducts";
$ressql = mysqli_query($bleuConn, $sql);

if(mysqli_num_rows($ressql) > 0){
    while($bleuprod = mysqli_fetch_assoc($ressql)){
        echo '
        <div class="bleucard">
            <img src="data:image/jpeg;base64,' . base64_encode($bleuprod['bleu_Image']) . '" width="200">
            <h5><p>' . $bleuprod['bleu_ProductName'] . '</p></h5>
            <button class="bleuviewbtn" onclick="window.location.href=\'bleuAdminViewProduct.php?bleuprodid='. $bleuprod['bleuprodid'] .'\'">View</button>
        </div>
        ';
    }
} else {
    echo '<p>No products found.</p>';
}
?>
</div>
</body>
</html>
