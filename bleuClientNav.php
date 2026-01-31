<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bleuStyle_1.css">
    <title>Document</title>

    <style>
body {
    margin: 0;
    padding: 20px;
    font-family: "Georgia", serif;
    background-color: #f7f2e8;

    display: flex;
    flex-direction: column;
    gap: 15px;
}

a {
    text-decoration: none;
}

/* Buttons */
.adminbtn,
.bleulogout {
    width: 90%;
    max-width: 250px;
    padding: 12px 20px;

    font-size: 1rem;
    letter-spacing: 1px;
    font-family: "Georgia", serif;

    border: none;
    border-radius: 8px;
    cursor: pointer;
    display: block;
    margin: 0 auto;
    transition: 0.3s ease;
}

/* Main buttons */
.adminbtn {
    background: #c7a57a;
    color: #3b2c20;
    border: 2px solid #8a6a48;
}

.adminbtn:hover {
    background: #b08c62;
    transform: translateX(5px);
    box-shadow: 2px 2px 5px rgba(0,0,0,0.25);
}

/* Logout button */
.bleulogout {
    background: #a0574c;
    color: #fff;
    border: 2px solid #7a3d33;
}

.bleulogout:hover {
    background: #8d4a40;
    transform: translateX(5px);
    box-shadow: 2px 2px 5px rgba(0,0,0,0.25);
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
document.getElementById("logoutLink").addEventListener("click", function (event) {
    if (!confirm("Are you sure you want to log out?")) {
        event.preventDefault();
    }
});
</script>

</body>
</html>
