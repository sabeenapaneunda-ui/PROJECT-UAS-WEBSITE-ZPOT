<?php
session_start();
include 'koneksi.php';

if (isset($_POST['update'])) {

    $id         = $_POST['id'];
    $place      = $_POST['place_name'];
    $rating     = $_POST['rating'];
    $review     = $_POST['review_text'];
    $gambar_db  = $_POST['gambar_lama'];

    if (isset($_POST['tag_text']) && is_array($_POST['tag_text'])) {
        $valid_tags = array_filter($_POST['tag_text']);
        $tag = implode(", ", $valid_tags);
    } else {
        $tag = "RECOMMENDED!";
    }

    $foto_nama = $_FILES['foto']['name'];
    $foto_tmp  = $_FILES['foto']['tmp_name'];

    if ($foto_nama != "") {
        $foto_baru = rand(1000, 9999) . "_" . $foto_nama;
        $tujuan    = "images/uploads/" . $foto_baru;

        if (move_uploaded_file($foto_tmp, $tujuan)) {
            $gambar_db = $tujuan;
        }
    }

    $query = "UPDATE reviews SET 
                place_name='$place', 
                rating='$rating', 
                tag_text='$tag', 
                review_text='$review', 
                image='$gambar_db' 
              WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Review Berhasil Diupdate!');
                window.location.href = 'profile-reviews.php'; 
              </script>";
    } else {
        echo "Gagal Update: " . mysqli_error($conn);
    }
} else {
    header("location: index.php");
}
