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
      <img src="images/vng.jpg" alt="">
   </div>

   <div class="content">
      <h3 data-aos="fade-up">Vincent van Gogh </h3>
      <p data-aos="fade-up"> adalah seorang pelukis pascaimpresionis Belanda yang menjadi salah satu tokoh paling terkenal dan berpengaruh dalam sejarah seni di Barat. Dalam waktu lebih dari satu dasawarsa, ia menciptakan kurang lebih 2.100 karya seni, termasuk sekitar 860 lukisan minyak yang kebanyakan dibuat selama dua tahun terakhir kehidupannya. Karya-karya tersebut meliputi lukisan bentang alam, alam benda, potret, dan potret diri, dan memiliki ciri khas berupa warna yang tebal dan dramatis serta goresan kuas yang impulsif dan ekspresif.</p>
      <a data-aos="fade-up" href="#portfolio" class="btn">Lets'go </a>
   </div>

</section>

<!-- home section ends -->

<!-- portfolio section starts  -->

<section class="portfolio" id="portfolio">

      <h1 class="heading" data-aos="fade-up"> <span>Painting</span> </h1>

      <div class="box-container">

         <div class="box" data-aos="zoom-in">
            <img src="images/v2.jpg" alt="">
            <h3>Peace</h3>
            <a href="https://www.pixelle.co/vincent-van-gogh/">Read More</a>
         </div>

         <div class="box" data-aos="zoom-in">
            <img src="images/v3.jpg" alt="">
            <h3>Café Terrace at Night</h3>
            <a href="https://en.wikipedia.org/wiki/Caf%C3%A9_Terrace_at_Night">Read More</a>
         </div>

         <div class="box" data-aos="zoom-in">
            <img src="images/STN.jpg" alt="">
            <h3>The Starry Night</h3>
            <a href="https://en.wikipedia.org/wiki/The_Starry_Night">Read More</a>
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