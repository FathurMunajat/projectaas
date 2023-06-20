<?php

$conn = mysqli_connect('localhost','root','','Zold_db') or die('connection failed');

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = mysqli_real_escape_string($conn, $_POST['number']);
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `contact_form` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');
   
   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `contact_form`(name, email, number, message) VALUES('$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> musée Website </title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

   <!-- aos css link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message" data-aos="zoom-out">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>

<!-- home section starts  -->

<section class="home" id="home">

   <div class="image" data-aos="fade-right">
      <img src="images/R.jpg" alt="">
   </div>

   <div class="content">
      <h3 data-aos="fade-up">Fathur & Fadhil</h3>
      <p data-aos="fade-up">adalah seorang pelajar yang mempunyai kakak yang Hobi menggambar </p>
      <a data-aos="fade-up" href="#portfolio" class="btn">Lets'go </a>
   </div>

</section>

<!-- home section ends -->

<!-- portfolio section starts  -->

<section class="portfolio" id="portfolio">

      <h1 class="heading" data-aos="fade-up"> <span>Digital Painting </span> </h1>

      <div class="box-container">

         <div class="box" data-aos="zoom-in">
            <img src="images/ff1.jpg" alt="">
            <h3>The Blue </h3>
         </div>

         <div class="box" data-aos="zoom-in">
            <img src="images/ff2.jpg" alt="">
            <h3>Ghost</h3>
         </div>

         <div class="box" data-aos="zoom-in">
            <img src="images/ff3.jpg" alt="">
            <h3>House</h3>
         </div>

         <div class="box" data-aos="zoom-in">
            <img src="images/ff4.jpg" alt="">
            <h3>Creature</h3>
         </div>

         <div class="box" data-aos="zoom-in">
            <img src="images/ff5.jpg" alt="">
            <h3>Ocean in Desert</h3>
         </div>

         <div class="box" data-aos="zoom-in">
            <img src="images/ff6.jpg" alt="">
            <h3>inside the skull</h3>
         </div>

   </section>
<!-- portfolio section ends -->

<!-- services section starts  -->

         <div class="box" data-aos="zoom-in">
            <h3><a data-aos="fade-up" href="index.php" class="btn">Back to Home</a></h3>
            
         </div>

      </div>

   </section>



<div class="credit"> &copy; copyright @ <?php echo date('Y'); ?> by <span>ZOLD</span> </div>












<!-- custom js file link  -->
<script src="js/script.js"></script>

<!-- aos js link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>

   AOS.init({
      duration:800,
      delay:300
   });

</script>
   
</body>
</html>