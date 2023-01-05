<?php

$conn = mysqli_connect('localhost', 'root', '', 'apoetek');

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // cek username sudah ada atau belum
    $result = mysqli_query(
        $conn,
        "SELECT * FROM user WHERE username='$username'"
    );
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username sudah ada')
        </script>";
        return false;
    }

    // cek komfirmasi password
    if ($password !== $password2) {
        echo " 
        <script>
    alert('konfirmasi password tidak sesuai');
        </script>
        ";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan ke database
    $query = "INSERT INTO user VALUES('','$username','$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>
