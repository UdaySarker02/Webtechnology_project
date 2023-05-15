<?php require 'head.php'?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="bg.css">
    <link rel="stylesheet" href="addtocart.css">
    <script src="https://kit.fontawesome.com/92d70a2fd8.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header" id="header">
        <p class="logo">ONLINE SHOPPING</p>
        <div class="cart"><i class="fa-solid fa-cart-shopping"></i><p id="count">0</p></div>
    </div>
    <div class="container">
        <div id="root"></div>
        <div class="sidebar">
            <div class="head"><p>My Cart</p></div>
            <div id="cartItem" class="cart-item">Your cart is empty</div>
            <div class="foot">
                <h3>Total</h3>
                <h2 id="total">Taka 0.00</h2>
                <button onclick="checkout()">Checkout</button>
            </div>
        </div>
    </div>
    <script src="addtocart.js"></script>
    <script>
        function checkout() {
            // Perform the checkout process here
            alert("Checkout completed!");
        }
    </script>
    <a href="customer_dash.php">Go to Customer Dashboard</a>
</body>
</html>
