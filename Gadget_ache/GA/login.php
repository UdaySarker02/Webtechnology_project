<?php
require 'head.php';
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $email = $_POST['email'];
   $password = $_POST['password'];

   $sql = "SELECT * FROM userdata WHERE email = '$email' AND password = '$password'";
   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['email'] = $row['email'];
      header("Location: view_products.php");
      exit();
   } else {
      $error = "Invalid email or password";
   }
}

mysqli_close($conn);
?>

<link rel="stylesheet" href="lstyle.css">

<div class="overlay">
   <!-- LOGIN FORM by Omar Dsoky -->
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <!-- con = Container for items in the form -->
      <div class="con">
         <!-- Start header Content -->
         <header class="head-form">
            <h2>Log In</h2>
            <!-- A welcome message or an explanation of the login form -->
            <p>login here using your email and password</p>
         </header>
         <!-- End header Content -->
         <br>
         <div class="field-set">
            <!-- email -->
            <span class="input-item">
               <i class="fa fa-envelope"></i>
            </span>
            <!-- email Input -->
            <input class="form-input" id="txt-input" type="email" placeholder="Email" name="email" required>
            <br>
            <!-- Password -->
            <span class="input-item">
               <i class="fa fa-key"></i>
            </span>
            <!-- Password Input -->
            <input class="form-input" type="password" placeholder="Password" name="password" required>
            <!-- Show/hide password -->
            <span>
               <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
            </span>
            <br>
            <!-- buttons -->
            <!-- button LogIn -->
            <button class="log-in" type="submit">Log In</button>
         </div>
         <!-- other buttons -->
         <div class="other">
            <!-- Forgot Password button -->
            <button class="btn submits frgt-pass">Forgot Password</button>
            <!-- Sign Up button -->
            <a href="registration.php" class="btn submits sign-up">Sign Up
               <!-- Sign Up font icon -->
               <i class="fa fa-user-plus" aria-hidden="true"></i>
            </a>
            <!-- End Other the Division -->
         </div>
         <!-- End Container -->
      </div>
   </form>
   <!-- End Form -->
</div>
