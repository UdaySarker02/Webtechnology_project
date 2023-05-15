<?php
@include 'config.php';

if (isset($_POST['add_product'])) {
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/' . $product_image;

   if (empty($product_name) || empty($product_price) || empty($product_image)) {
      $message[] = 'Please fill out all fields';
   } else {
      // Check if the product name already exists in the database
      $check_query = "SELECT id FROM products WHERE name = '$product_name'";
      $check_result = mysqli_query($conn, $check_query);
      if (mysqli_num_rows($check_result) > 0) {
         $message[] = 'A product with the same name already exists';
      } else {
         $insert = "INSERT INTO products(name, price, image) VALUES('$product_name', '$product_price', '$product_image')";
         $upload = mysqli_query($conn, $insert);
         if ($upload) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $message[] = 'New product added successfully';
         } else {
            $message[] = 'Could not add the product';
         }
      }
   }
}

if (isset($_GET['delete'])) {
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM products WHERE id = $id");
   header('location:add_product.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin page</title>
</head>

<body>
   <?php
   if (isset($message)) {
      foreach ($message as $msg) {
         echo '<span class="message">' . $msg . '</span>';
      }
   }
   ?>
   <div class="container">
      <div class="admin-product-form-container">
         <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <button onclick="location.href='admin.php'" type="button">Back</button><br>
            <h3>Add product</h3>
            <input type="text" placeholder="Enter product name" name="product_name" class="box">
            <input type="number" placeholder="Enter product price" name="product_price" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
            <input type="submit" class="btn" name="add_product" value="Add">
         </form>
      </div>
      <?php
      $select = mysqli_query($conn, "SELECT * FROM products");
      ?>
      <div class="product-display">
         <table class="product-display-table">
            <thead>
               <h3>Products list</h3>
               <tr>
                  <th>Product_name</th>
                  <th>Product_price</th>
                  <th>Product_image</th>
                  <th>Action</th>
               </tr>
            </thead>
            <?php while ($row = mysqli_fetch_assoc($select)) { ?>
               <tr>
                  <td><?php echo $row['name']; ?></td
                  <td> $<?php echo $row['price']; ?>/-</td>
                  <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                  <td>
                     <a href="update_product.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> Edit </a>
                     <a href="add_product.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> Delete </a>
                  </td>
               </tr>
            <?php } ?>
         </table>
      </div>
   </div>
</body>

</html>

