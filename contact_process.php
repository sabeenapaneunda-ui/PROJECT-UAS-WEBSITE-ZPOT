<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    echo "<script>alert('Please login first!'); window.location.href='index.php';</script>";
    exit();
}

if (isset($_POST['send_contact'])) {

    $current_user = $_SESSION['username'];
    $user_query   = mysqli_query($conn, "SELECT id FROM users WHERE username = '$current_user'");
    $user_data    = mysqli_fetch_assoc($user_query);
    $user_id      = $user_data['id'];

    $email   = mysqli_real_escape_string($conn, $_POST['email']);
    $phone   = mysqli_real_escape_string($conn, $_POST['phone']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $query = "INSERT INTO contact_us (user_id, email, phone, message) 
              VALUES ('$user_id', '$email', '$phone', '$message')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Message Sent Successfully! We will contact you soon.');
                window.location.href = 'notifications.php'; 
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("location: index.php");
}
