<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<style>
    
    body{        
        padding-top: 60px;
        padding-bottom: 40px;
    }
    .fixed-header, .fixed-footer{
        width: 100%;
        position: fixed;        
        background: #333;
        padding: 10px 0;
        color: #fff;
    }
    .fixed-header{
        top: 0;
    }
    .fixed-footer{
        bottom: 0;
    }
    .container{
        width: 80%;
        margin: 0 auto; /* Center the DIV horizontally */
        text-align: center; /* Center the text */
    }
    nav a{
        color: #fff;
        text-decoration: none;
        padding: 7px 25px;
        display: inline-block;
    }
</style>
</head>
<body>
    <div class="fixed-header">
        <div class="container">
            <nav>
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <a href="view_products.php">Products</a>
                <a href="#">Services</a>
                <a href="#">Contact Us</a>
            </nav>
        </div>
    </div>
      
    <div class="fixed-footer">
        <div class="container">Copyright &copy; 2025 Gadgets Ache</div>        
    </div>
</body>
</html>
