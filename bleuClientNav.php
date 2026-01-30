<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Client Dashboard</title>
<style>
body {
    margin: 0;
    padding: 20px;
    font-family: "Georgia", serif;
    background-color: #000;
    color: #fff;
    display: flex;
    flex-direction: column;
    gap: 15px;
    align-items: center;
}

a {
    text-decoration: none;
}

.adminbtn, 
.bleulogout {
    width: 90%;
    max-width: 250px;
    padding: 12px 20px;
    font-size: 1rem;
    letter-spacing: 1px;
    border: none;
    cursor: pointer;
    border-radius: 8px;
    font-family: "Georgia", serif;
    display: block;
    transition: 0.3s ease;
    text-align: center;
    margin: 0 auto;
}

/* Admin buttons */
.adminbtn {
    background: #000;
    color: #fff;
    border: 2px solid #fff;
}

.adminbtn:hover {
    background: #fff;
    color: #000;
    transform: translateX(5px);
    box-shadow: 2px 2px 5px rgba(255,255,255,0.25);
}

/* Logout button */
.bleulogout {
    background: #000;
    color: #fff;
    border: 2px solid #fff;
}

.bleulogout:hover {
    background: #fff;
    color: #000;
    transform: translateX(5px);
    box-shadow: 2px 2px 5px rgba(255,255,255,0.25);
}
</style>
</head>
<body>

<a href="bleuClientProduct.php" target="mid_column">
    <button class="adminbtn">Our Products</button>
</a>

<a href="bleuClientViewOrders.php" target="mid_column">
    <button class="adminbtn">View Orders</button>
</a>

<a href="bleuLogout.php" target="_parent" id="logoutLink">
    <button class="bleulogout">Logout</button>
</a>

<script>
document.getElementById("logoutLink").addEventListener("click", function(event) {
    var confirmLogout = confirm("Are you sure you want to log out?");
    if (!confirmLogout) {
        event.preventDefault();
    }
});
</script>

</body>
</html>
