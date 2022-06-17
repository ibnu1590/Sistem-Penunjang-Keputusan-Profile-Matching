<?php

    //memulai session
    session_start();

    //jika ada session, maka akan diarahkan ke halaman dashboard admin
    if(isset($_SESSION['id'])){

        //mengarahkan ke halaman dashboard admin
        header("Location: ./index.php");
        die();
    }

    // //mengincludekan koneksi database
    // include "db/db_config.php";

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>SPK - Profile Matching</title>

    <!-- Bootstrap core JS -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/9f2ac9fd56.js"></script>
    <script src="js/bootstrap-password-toggler.js" type="text/javascript"></script>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
     
    </style> 
  </head>
  <body class="text-center">
    <form class="form-signin" method="post" action="proses_login.php" role="form">
    <?php
    if(isset($_SESSION['err'])){
      $err = $_SESSION['err'];
      echo '<div class="alert alert-warning alert-message">'.$err.'</div>';
            unset($_SESSION['err']);
            echo "jancok";
    }
    ?>
            <img class="mb-4" src="assets/images/AF-Logo-Sponsor.png" alt="" width="260" height="72">
            <h1 class="h4 mb-3 font-weight-normal" >SPK - Profile Matching</h1>
            <label for="inputEmail" class="sr-only">Username</label>
            <input type="input" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
            <span>&nbsp;</span>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" name="password" data-toggle="password" placeholder="Password" required>
            <span>&nbsp;</span>
            <div class="checkbox mb-3" style="display:none;">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
            <p class="mt-4 mb-3 text-muted">&copy; Abdurrahman Faris Nurul Falah</p> 
    </form>
  <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(".alert-message").alert().delay(3000).slideUp('slow');
  </script>
</body>
</html>
