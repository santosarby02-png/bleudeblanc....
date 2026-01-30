<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="roblesStyle_1.css">
    <title>Document</title>
    <style>
body {
    margin: 0;
    padding: 0;
    font-family: "Georgia", serif;
    background-color: #f7f2e8; 
    color: #3b2c20; 
}

.bookstore-header {
    background: linear-gradient(to bottom, #d9c6a3, #b89f7a); 
    padding: 20px 10px;
    text-align: center;
    border-bottom: 4px solid #8a6a48;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}

.bookstore-header h1 {
    font-size: 3rem;
    margin: 0;
    font-weight: 700;
    color: #4a3628;
    letter-spacing: 2px;
    text-shadow: 2px 2px 3px rgba(0,0,0,0.2);
}

.bookstore-header h2 {
    font-size: 1.3rem;
    margin-top: 8px;
    color: #6e533b;
    opacity: 0.9;
    font-weight: 400;
}

.bookstore-header h1,
.bookstore-header h2 {
    animation: fadeIn 1.2s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(8px); }
    to { opacity: 1; transform: translateY(0); }
}

    </style>
</head>
<body>
    <div class="bookstore-header">
    <h1>BOOK STORE</h1>
    <h2>Affordable books, timeless stories!</h2>
    </div>
</body>
</html>