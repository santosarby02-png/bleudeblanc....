<?php
        if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

    include "roblesConnection.php";
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="roblesStyle_1.css">
    <title>Document</title>
      <style>
body.products-page {
    font-family: "Georgia", serif;
    background-color: #f7f2e8;
    padding: 30px;
}

h1{
    text-align:center;
    color: #4a3628;
    font-size: 2.5rem;
    margin-bottom: 20px;
    letter-spacing: 1px;
    text-shadow: 2px 2px 3px rgba(0,0,0,0.2);
}

.roblescon {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
}

.roblescard button {
    margin: 0 7px;
}

.roblescard {
    background: #fffaf2;
    border: 2px solid #b89f7a;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    padding: 20px;
    width: 400px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.roblescard:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.3);
}

.roblescard table {
    width: 100%;
    border-collapse: collapse;
}

.roblescard td {
    padding: 8px;
    vertical-align: middle;
}

.roblescard input[type="text"],
.roblescard input[type="file"] {
    width: 95%;
    padding: 6px;
    font-size: 0.95rem;
    border: 1px solid #b89f7a;
    border-radius: 5px;
    background-color: #fefcf5;
    font-family: "Georgia", serif;
}

.roblesviewbtn {
    padding: 8px 15px;
    font-size: 0.95rem;
    border-radius: 6px;
    border: 2px solid #8a6a48;
    cursor: pointer;
    transition: 0.3s ease;
    color: #3b2c20;
    background-color: #c7a57a;
}

.roblesviewbtn:hover {
    background-color: #b08c62;
    transform: translateY(-2px);
    box-shadow: 2px 2px 6px rgba(0,0,0,0.2);
}

.roblesviewbtn[style*="background-color: green"] {
    background-color: #6aa84f;
    color: white;
    border: 2px solid #4d7a34;
}

.roblesviewbtn[style*="background-color: green"]:hover {
    background-color: #558b3c;
}

.roblesviewbtn[style*="background-color: blue"] {
    background-color: #3b78e7;
    color: white;
    border: 2px solid #2a5db0;
}

.roblesviewbtn[style*="background-color: blue"]:hover {
    background-color: #2a5db0;
}
    </style>
</head>
<body>
    <h1>Add Product</h1>
    <br><br>
    <div class="roblescon">
        <div class="roblescard">
                <form action="" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td colspan='2'><input type="file" name="img" style="padding: 5px; font-size: 15px;"></td>
                        </tr>
                        <tr>
                            <td><p>Product Name: </p></td>
                            <td><input type="text" name="roblesprodname" required></td>
                        </tr>
                        <tr>
                            <td><p>Unit: </p></td>
                            <td><input type="text" name="roblesunit" required></td>
                        </tr>
                        <tr>
                            <td><p>Price per Unit: </p></td>
                            <td><input type="text" name="roblespriceunit" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center;">
                               <button class="roblesviewbtn" name="roblesaddbtn" type="submit">Add</button>
                                <button class="roblesviewbtn"
                                        type="button"
                                        style="background: #a0574c; color: white; border: 2px solid #7a3d33;"
                                        onclick="window.location.href='roblesAdminProduct.php'">
                                    Cancel
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>
        </div>
    </div>

<?php

if (isset($_POST['roblesaddbtn']) && isset($_FILES['img'])) {
    $roblesprodname = $_POST['roblesprodname'];
    $roblesunit = $_POST['roblesunit'];
    $roblespriceunit = $_POST['roblespriceunit']; 
    $roblesimage = file_get_contents($_FILES['img']['tmp_name']); 

  
    $stmt = $roblesConn->prepare("INSERT INTO roblesproducts (robles_ProductName, robles_Unit, robles_PriceperUnit, robles_Image) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $roblesConn->error);
    }

    
   $stmt->bind_param("ssds", $roblesprodname, $roblesunit, $roblespriceunit, $roblesimage);

    if ($stmt->execute()) {
        echo "<script>
                alert('Added successfully');
                setTimeout(() => { window.location.href = 'roblesAdminAddProduct.php'; }, 1000);
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

</body>
</html>