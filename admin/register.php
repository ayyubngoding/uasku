<?php
require 'functions.php';
if (isset($_POST['register'])) {
    global $conn;
    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('data berhasil disimpan');
        </script>";
    } else {
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
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
   
</head>
<body style=" background-image: url(../image/bg1.svg);">
  <div class="container">
      <form action="" method="post">
          <h2>Registrasi</h2>
          <h3>Enter your Credentials</h3>

          <input type="text" name="username"  placeholder="Username">

          <input type="password" name="password"  placeholder="Password">

          <input type="password" name="password2"  placeholder="Ualngi Password">
          <button type="submit" name="register">Register</button>
          <center><p>Sudah Punya Akun?</p><a href="login.php">Login</a></center>
        </form>
    </div>
  
</body>
</html>