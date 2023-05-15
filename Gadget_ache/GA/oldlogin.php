<?php require 'head.php'?>
<?php
require 'db.php';
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
  if(isset($_GET['email']) && isset($_GET['password'])){

    $email = $_GET['email'];
    $password = $_GET['password'];

    $sql = "SELECT * FROM userdata WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['lname'] = $row['lname'];
        $_SESSION['email'] = $email;
        header("Location: products.php");
        exit();
    } else {
        $error = "Invalid Email or Password";
    }
}
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="bg.css">
  <title>Gadgets Ache | Products</title>
  </head>
  <body>
    <header>

    
        <form action="reg.php" method="get">
          <label for="email"><b>E-Mail</b></label>
          <input type="text" placeholder="Enter Email" name="email" required><br>
          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required><br>
          <button type="submit">Login</button>
          <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label>
        </form>
  
    </header>
  </body>
</html>
