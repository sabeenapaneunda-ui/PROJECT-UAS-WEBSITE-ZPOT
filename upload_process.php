<?php
session_start();
include 'koneksi.php';


date_default_timezone_set('Asia/Jakarta');


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location: index.php");
    exit();
}

if (isset($_POST['upload'])) {

    $username = $_SESSION['username'];


    $query_user = mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'");
    $user_data  = mysqli_fetch_assoc($query_user);
    if (!$user_data) die("Error Fatal: User tidak ditemukan.");
    $user_id = $user_data['id'];


    $place_name   = mysqli_real_escape_string($conn, $_POST['place_name']);
    $review_title = mysqli_real_escape_string($conn, $_POST['review_title']);
    $category     = isset($_POST['category']) ? mysqli_real_escape_string($conn, $_POST['category']) : 'General';
    $rating       = (int) $_POST['rating'];
    $review_text  = mysqli_real_escape_string($conn, $_POST['review_text']);


    $visit_date   = date("F, d Y");



    $waktu_sekarang = date('Y-m-d H:i:s');


    $image_path = "";
    if (isset($_FILES['foto']['name']) && $_FILES['foto']['name'] != "") {
        $target_dir = "images/uploads/";
        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);

        $file_name   = time() . "_" . uniqid() . "_" . basename($_FILES["foto"]["name"]);
        $target_file = $target_dir . $file_name;

        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            $image_path = $target_file;
        } else {
            die("Error: Gagal upload gambar.");
        }
    }

    try {


        $query_review = "INSERT INTO reviews 
        (username, place_name, category, rating, tag_text, review_text, image, visit_date, likes, comments, created_at) 
        VALUES 
        ('$username', '$place_name', '$category', '$rating', '$review_title', '$review_text', '$image_path', '$visit_date', 0, 0, '$waktu_sekarang')";

        if (mysqli_query($conn, $query_review)) {



            $query_activity = "INSERT INTO recent_activities 
            (user_id, activity_type, target_name, target_image, created_at) 
            VALUES 
            ('$user_id', 'review', '$place_name', '$image_path', '$waktu_sekarang')";

            mysqli_query($conn, $query_activity);

            echo "<script>
                    alert('Berhasil! Data tersimpan dengan waktu Jakarta.'); 
                    window.location.href='profile-activity.php';
                  </script>";
        }
    } catch (Exception $e) {
        echo "<h3>Gagal Menyimpan Data!</h3>";
        echo "Pesan Error: " . $e->getMessage();
    }
} else {
    header("location: upload.php");
}
