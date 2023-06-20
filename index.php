<?php

$conn = mysqli_connect('localhost','root','','login_db') or die('connection failed');

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['bid']);
   $number = mysqli_real_escape_string($conn, $_POST['number']);
   $msg = mysqli_real_escape_string($conn, $_POST['img']);

   $select_message = mysqli_query($conn, "SELECT * FROM `contact_form` WHERE name = '$name' AND bid = '$bid' AND number = '$number' AND img = '$img'") or die('query failed');
   
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

   <div class="content">
      <h3 data-aos="fade-up">Art Of Musée</h3>
      <p data-aos="fade-up">so here I want to tell you about painters and their art</p>
      <a data-aos="fade-up" href="#services" class="btn">Lets'go </a>
   </div>

</section>

<!-- home section ends -->

<!-- services section starts  -->
<section class="services" id="services">

      <h1 class="heading" data-aos="fade-up"> <span>Page</span>

      <p data-aos="fade-up">if you want to see the history of painters and their paintings, please select below, thank you</p>

      </h1>
      <div class="box-container" >
      <div class="box" data-aos="zoom-in">
            <h3><a data-aos="fade-up" href="Salvador.php" class="btn">Salvador Damingo Felipe</a></h3>
         </div>

         <div class="box" data-aos="zoom-in">
            <h3><a data-aos="fade-up" href="vanGogh.php" class="btn">Vincent Willem van Gogh</a></h3>
         </div>

         <div class="box" data-aos="zoom-in">
            <h3><a data-aos="fade-up" href="RadenSaleh.php" class="btn">Saleh Sjarif Boestaman (Raden Saleh)</a></h3>
         </div>

         <div class="box" data-aos="zoom-in">
            <h3><a data-aos="fade-up" href="PabloP.php" class="btn">Pablo Picasso</a></h3>
         </div>

         <div class="box" data-aos="zoom-in">
            <h3><a data-aos="fade-up" href="Leo.php" class="btn">Leonardo da Vinci</a></h3>
         </div>

         <div class="box" data-aos="zoom-in">
            <h3><a data-aos="fade-up" href="MBA.php" class="btn">My Art</a></h3>
         </div>


      </div>

   </section>

<!-- services section ends -->

<!-- portfolio section starts  -->

<section class="portfolio" id="portfolio">

      <h1 class="heading" data-aos="fade-up"> <span>Most Popular Painting</span> </h1>

      <div class="box-container">

         <div class="box" data-aos="zoom-in">
            <img src="images/POM.jpg" alt="">
            <h3>Salvador dali</h3>
         </div>

         <div class="box" data-aos="zoom-in">
            <img src="images/STN.jpg" alt="">
            <h3>Vincent Van Gogh</h3>
         </div>

         <div class="box" data-aos="zoom-in">
            <img src="images/R1.jpg" alt="">
            <h3>Raden Saleh</h3>
         </div>
   </section>
   <div class="box" data-aos="zoom-in">
            <h3><a data-aos="fade-up" href="login.php" class="btn">login</a></h3>
         </div>
         <div class="box" data-aos="zoom-in">
            <h3><a data-aos="fade-up" href="logout.php" class="btn">Logout</a></h3>
         </div>
<!-- portfolio section ends -->
<div class="credit"> &copy; copyright @ <?php echo date('Y'); ?> by <span>Fathur</span> </div>
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