<?php
session_start();

    if ( isset($_SESSION["login"])) {
        header("Location: index.php");
        exit;
    }

    

    require'controller.php';

    if( isset($_POST["login"]) ){

        $username = $_POST["username"];
        $password = $_POST["password"];
        $_SESSION["username"] = $_POST["username"];

        $result = mysqli_query($conn, "SELECT * FROM users WHERE
            username = '$username'");

        //check username
        if( mysqli_num_rows($result) === 1 ){

            //check password 
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"]) ){

                $_SESSION["login"] = true;

                header("Location: index.php");
                exit;
            }
        }
    }else {
        $error = true;
    }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cherry+Bomb+One&display=swap');
    </style>
</head>
<body style="
    height: 100vh;
    background-color: #F4EEE0;
    background-image: url('img/g1.jpg');
    background-size: cover;
    background-position: center;
    ">


<div class="position-absolute top-50 start-50 translate-middle">
    <div class="card bg" style="width: 35rem;">
    <div class="card-body">
        
        <div style="font-family: 'Rubik', sans-serif; text-align: center;">
            <h5 class="card-title">Selamat Datang</h5>
            <h6 class="card-subtitle mb-2 text-muted">Harap Login Terlebih dahulu
               <br> maaf kurang maximal karena terburu buru 
            </h6>
        </div>

        <?php if( !isset($error) ) : ?>
            <div class="d-flex justify-content-center error">
                <p class="text-danger">Username/Password, yang anda masukan salah/belum terdaftar</p>
            </div>
        <?php endif; ?>

        <p class="card-text">
        <form action="" method="post">
            <div class="mb-3 bg">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="Username" class="form-control bg" id="exampleInputEmail1" 
                aria-describedby="emailHelp" name="username" placeholder="Ketik username" autocomplete="off">
            </div>
            <div class="mb-3 bg">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control bg" id="myInput"
                name="password" placeholder="Ketik password">
                <input type="checkbox" onclick="myFunction()">Show Password
                <script>
                    function myFunction() {
                        var x = document.getElementById("myInput");
                        if (x.type === "password") {
                            x.type = "text";
                        } else {
                            x.type = "password";
                        }
                    }
                </script>
                <p>Jika blm memiliki akun harap <a href="register.php" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Register</a> terlebih dahulu</p>
            </div>
            <button type="submit" class="btn btn-primary" name="login">login</button>
        </form>
        </p>

    </div>
    </div>
</div>
</body>

</html>