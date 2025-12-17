<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query_user = "INSERT INTO users (fullname, username, email, password) 
                   VALUES ('$fullname', '$username', '$email', '$hashed_password')";

    if (mysqli_query($conn, $query_user)) {

        $new_user_id = mysqli_insert_id($conn);
        $query_log = "INSERT INTO signup_log (user_id, email, password) 
                      VALUES ('$new_user_id', '$email', '$hashed_password')";

        mysqli_query($conn, $query_log);

        echo "<script>
                alert('Registrasi Berhasil! Silakan Login.');
                window.location.href = 'index.php'; 
              </script>";
    } else {
        echo "Gagal: " . mysqli_error($conn);
    }
}
