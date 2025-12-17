<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {

    $username = $_POST['username_login'];
    $password = $_POST['password_login'];


    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $data_user = mysqli_fetch_assoc($query);

    if ($data_user) {
        if (password_verify($password, $data_user['password'])) {

            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login";
            $uid = $data_user['id'];
            $query_log = "INSERT INTO signin_log (user_id, password) VALUES ('$uid', '***TERSEMBUNYI***')";
            mysqli_query($conn, $query_log);

            echo "<script>
                    alert('Login Berhasil!');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            echo "<script>alert('Password Salah!'); window.location.href = 'index.php';</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.location.href = 'index.php';</script>";
    }
} else {
    header("location: index.php");
}
