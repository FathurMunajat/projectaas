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
      <img src="images/pp.jpg" alt="">
   </div>

   <div class="content">
      <h3 data-aos="fade-up">Pablo Ruiz Picasso</h3>
      <p data-aos="fade-up">adalah seorang seniman yang terkenal dalam aliran kubisme dan dikenal sebagai pelukis revolusioner pada abad ke-20. Dia merupakan jenius seni yang cakap membuat patung, grafis, keramik, kostum penari balet sampai tata panggung. Lahir di Malaga, Spanyol 25 Oktober 1881 dengan nama lengkap Pablo (atau El Pablito) Diego José Santiago Francisco de Paula Juan Nepomuceno Crispín Crispiniano de los Remedios Cipriano de la Santísima Trinidad Ruiz Blasco y Picasso López. Ayahnya bernama Josse Ruiz Blasco, seorang profesor seni dan ibunya bernama Maria Picasso Lopez.</p>
      <a data-aos="fade-up" href="#portfolio" class="btn">Lets'go </a>
   </div>

</section>

<!-- home section ends -->

<!-- portfolio section starts  -->

<section class="portfolio" id="portfolio">

      <h1 class="heading" data-aos="fade-up"> <span>Painting</span> </h1>

      <div class="box-container">

         <div class="box" data-aos="zoom-in">
            <img src="images/p1.jpg" alt="">
            <h3>The Old Guitarist</h3>
            <a href="https://en.wikipedia.org/wiki/The_Old_Guitarist">Read More</a>
         </div>

         <div class="box" data-aos="zoom-in">
            <img src="images/p2.jpg" alt="">
            <h3>Two Girls Reading</h3>
            <a href="https://en.wikipedia.org/wiki/Two_Girls_Reading">Read More</a>
         </div>

         <div class="box" data-aos="zoom-in">
            <img src="images/p3.jpg" alt="">
            <h3>The Tragedy</h3>
            <a href="https://www.nga.gov/features/slideshows/pablo-picasso-the-tragedy.html">Read More</a>
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