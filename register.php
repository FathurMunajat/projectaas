<?php

    require 'controller.php';

    if ( isset($_POST['register']) ) {
        if ( register($_POST) > 0 ) {
            echo "
                <script>
                    alert('register berasil!');
                    document.location.href = 'login.php';
                </script>
            ";
        }else {
            echo mysqli_error($conn);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body style="
    height: 100vh;
    background-color: black;
    background-image: url('img/bg-sushi.jpg');
    background-size: cover;
    background-position: center;
    ">

    <div class="position-absolute top-50 start-50 translate-middle">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="card" style="width: 25rem;">
            <div class="card-body">
                <h5 class="card-title">Update data</h5>
                <p class="card-text">

                    <label for="user">Username</label>
                    <input class="form-control" type="text" placeholder="Masukan username" aria-label="default input example"
                        name="username" id="user" autocomplete="0"><br>

                    <label for="pass">Password</label>
                    <input class="form-control" type="password" placeholder="Masukan password" aria-label="default input example"
                        name="password" id="myInput">
                        <input type="checkbox" onclick="myFunction()">Show Password <br><br>
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
                    
                    <label for="comf_pas">Konfirmasi pass</label> 
                    <input class="form-control" type="password" placeholder="Konfirmasi password" aria-label="default input example"
                        name="conf_password" id="comf_pas"><br>
                    
                    <button class="btn btn-primary" type="submit" name="register">register</button>
                </p>
            </div>
            </div>
        </form>
    </div>
    
</body>
</html>