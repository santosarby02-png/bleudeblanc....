<?php
    session_start();
    include "roblesConnection.php";

    if(isset($_POST['roblesbuybtn'])){
        $roblesusername = $_SESSION['roblesusername'];

        $roblesbuyername = $_POST['roblesbuyername'];
        $roblesquantity = $_POST['roblesquantity'];
        $roblesprodid = $_GET['id'];

        
        $sql = "SELECT * FROM roblesproducts WHERE roblesprodid ='$roblesprodid'";
        $roblesbuyq = mysqli_query($roblesConn,$sql);

       if(mysqli_num_rows($roblesbuyq)===1){
        $roblesprod = mysqli_fetch_assoc($roblesbuyq);

        $roblesproductname = $roblesprod['robles_ProductName'];
        $roblespriceperunit = $roblesprod['robles_PriceperUnit'];
        $roblescurrentunit = $roblesprod['robles_Unit'];

       
        if($roblescurrentunit >= $roblesquantity){

           
            $newUnit = $roblescurrentunit - $roblesquantity;
            $updateStockSql = "UPDATE roblesproducts SET robles_Unit = '$newUnit' WHERE roblesprodid='$roblesprodid'";
            mysqli_query($roblesConn, $updateStockSql);

           
            $roblestotalprice = $roblespriceperunit * $roblesquantity;

            
            $roblesinsertbuy = "INSERT INTO roblesorders 
                (robles_BuyerName, robles_ProductName, robles_ProductPrice, robles_Quantity, robles_TotalPrice, robles_Account) 
                VALUES ('$roblesbuyername','$roblesproductname','$roblespriceperunit','$roblesquantity','$roblestotalprice','$roblesusername')";

            mysqli_query($roblesConn,$roblesinsertbuy);

            header("location: roblesClientProduct.php");
            exit;
        }
        else{
            
            echo "<script>alert('Not enough stock!'); window.location.href='roblesClientBuyProduct.php?id=$roblesprodid';</script>";
            exit;
        }
    }

    }
?>