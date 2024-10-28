<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/calendar.gif" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Calendok is a smart calendar
             designed to simplify your life by organizing your schedule in on
             e easy-to-use platform. Our mission is to provide a seamless way for users to manage events, set reminders, and keep track of important dates without hassle. With intuitive features and a user-friendly design, Calendok is tailored for busy individuals who want to stay on top of their personal and professional commitments. We’re committed to helping you maximize productivity and take control of your time effortlessly. Let Calendok be your reliable companion in staying organized every day</p>
         <p>In addition we provide very great hand planners that users who love handcopy planners can buy !</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">User's reviews</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/user2.jpg" alt="">
         <p>Calendok made my life so much easier! It keeps all my events organized in one place. Highly recommend!.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Mariam Ashraf</h3>
      </div>

      <div class="box">
         <img src="images/user3.jpg" alt="">
         <p>Love the sleek design and reminders! It’s perfect for staying on top of my busy schedule.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>

         </div>
         <h3>Ghadeer</h3>
      </div>

      <div class="box">
         <img src="images/user4.jpg" alt="">
         <p>Calendok is incredibly user-friendly. I’ve never been so organized with my appointments and deadlines!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Reham Adel</h3>
      </div>

      <div class="box">
         <img src="images/user5.jpg" alt="">
         <p>Amazing app for managing work and personal events seamlessly. It's a game changer for my daily routine!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Menna Mahmoud</h3>
      </div>

      <div class="box">
         <img src="images/user6.jpg" alt="">
         <p>This calendar keeps me on track like never before. A must-have tool for everyone with a busy lifestyle.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Marioma</h3>
      </div>

      <div class="box">
         <img src="images/user7.jpg" alt="">
         <p>Thanks to Calendok, I never miss important dates. Simple, effective, and easy to use.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>

         </div>
         <h3>Menna Waleed </h3>
      </div>

   </div>

</section>

<section class="authors">

   <h1 class="title">Our best sellers</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/planner1.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-instagram"></a>
         </div>
         <h3>Stitch Planner</h3>
      </div>

      <div class="box">
         <img src="images/planner2.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-instagram"></a>
         </div>
         <h3>Pink Planner</h3>
      </div>

      <div class="box">
         <img src="images/planner3.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-instagram"></a>
            
         </div>
         <h3>Orange Planner</h3>
      </div>

   </div>

</section>







<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>