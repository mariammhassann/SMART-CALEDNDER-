<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Calendok</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="home">

   <div class="content">
   <h3>Become the <span class="highlight">Master</span> of Your <span class="highlight">Calendar</span></h3>
   <p>Do you thrive on schedules and action plans? </p> <p> Use Calen-Dok and manage your time !</p>
   <a href="calender.php" class="white-btn">My Calender</a>
   </div>

</section>

<section class="products">

   <h1 class="title">Our exclusive planners</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">£<?php echo $fetch_products['price']; ?>/-</div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop.php" class="option-btn">load more</a>
   </div>

</section>


<section class="main-section">
        <div class="container">
            <!-- Left Content -->
            <div class="content">
                <h2>Meet the <span class="highlight">#1 Website</span> for <br> high-performance planning</h2>
                <p>With Calen-Dok, you finally get one single app to include BOTH your to-do list and the calendar. Calen-Dok intelligently and intuitively schedules your tasks based on your priorities and commitments.</p>
                <p>Gets you back on track when you are off schedule – just like a GPS for your work.</p>
                <a href="#" class="btn-primary">TRY IT FREE NOW ! </a>
            </div>

        
        </div>
    </section>














<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/about1.png" alt="">
      </div>

      <div class="content">
         <h3>About us</h3>
            <p> Calendok is a user-focused, web-based platform designed to streamline personal schedul
            ing and task management for individuals with busy, multifaceted schedules. It also provides a shop where you can buy your oun planner.</p>
         <a href="about.php" class="btn">read more</a>
      </div>

   </div>

</section>





<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <p> Calen-Dok team will be happy to help you ! </p>
      <a href="contact.php" class="white-btn">contact us now</a>
   </div>

</section>





<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>