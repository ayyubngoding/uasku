<?php
session_start();
require 'functions.php';

if (isset($_SESSION['login'])) {
    header('Location:../home.php');
    exit();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query(
        $conn,
        "SELECT * FROM user WHERE username='$username'"
    );
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            header('Location:../home.php');
            exit();
        }
    }
    $error = true;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
   
</head>
<body style=" background-image: url(../image/bg1.svg);">
    
  <div  class="container">
      <form action="" method="post">
          <h2>Login</h2>
          <h3>Masukkan Username & Password</h3>
          <?php if (isset($error)): ?>
            <p class="eror">Username / Password Salah!</p>
            <?php endif; ?>

          
          

          <input type="text" name="username"  placeholder="Username">

          <input type="password" name="password"  placeholder="Password">

          <input class="remember" type="checkbox" id="remember" name="remember">
          <label for="remember">Remember Me</label>

          <button type="submit" name="login">LOGIN</button>
          <center><p>Belum punya akun?</p><a href="register.php">Register</a></center>
        </form>
    </div>

    
    <script src="script.js"></script>
  
</body>
</html>