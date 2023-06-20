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
      <h3 data-aos="fade-up">Saleh Sjarif Boestaman (Raden Saleh)</h3>
      <p data-aos="fade-up">Saleh Sjarif Boestaman atau dikenal sebagai Raden Saleh adalah seorang pelukis Hindia Belanda beretnis Arab-Jawa yang menjadi pionir seni modern Indonesia. Lukisannya merupakan perpaduan Romantisisme yang sedang populer di Eropa saat itu dengan elemen-elemen yang menunjukkan latar belakang Jawa si pelukis. Berikut Lukisannya</p>
      <a data-aos="fade-up" href="#portfolio" class="btn">Lets'go </a>
   </div>

</section>

<!-- home section ends -->

<!-- portfolio section starts  -->

<section class="portfolio" id="portfolio">

      <h1 class="heading" data-aos="fade-up"> <span>Painting</span> </h1>

      <div class="box-container">

         <div class="box" data-aos="zoom-in">
            <img src="images/R2.jpg" alt="">
            <h3>Posthumous Portrait of Herman Willem Daendels, Governor-General of the Dutch East Indies</h3>
            <a href="https://id.wikipedia.org/wiki/Berkas:Posthumous_Portrait_of_Herman_Willem_Daendels,_Governor-General_of_the_Dutch_East_Indies_-_Rd_Saleh.jpg">Read More</a>
         </div>

         <div class="box" data-aos="zoom-in">
            <img src="images/R1.jpg" alt="">
            <h3>Penangkapan Diponegoro</h3>
            <a href="https://www.kompas.tv/article/159296/mengenang-kisah-penangkapan-diponegoro-dalam-lukisan-raden-saleh-yang-masyhur">Read More</a>
         </div>

         <div class="box" data-aos="zoom-in">
            <img src="images/R3.jpg" alt="">
            <h3>Antara Hidup dan Mati (Between Life and Death), Raden Saleh (1870)</h3>
            <a href="https://setkab.go.id/mengenal-koleksi-benda-seni-kenegaraan-bag-2/">Read More</a>
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