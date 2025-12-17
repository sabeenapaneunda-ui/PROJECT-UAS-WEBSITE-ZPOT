<?php
session_start();
include 'koneksi.php';


if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location: index.php");
    exit();
}

if (isset($_GET['id'])) {

    $review_id = mysqli_real_escape_string($conn, $_GET['id']);
    $username  = $_SESSION['username'];
    $query_check = mysqli_query($conn, "SELECT * FROM reviews WHERE id = '$review_id' AND username = '$username'");
    $data_review = mysqli_fetch_assoc($query_check);

    if ($data_review) {

        $place_name_target = $data_review['place_name'];

        $user_query = mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'");
        $user_data  = mysqli_fetch_assoc($user_query);
        $user_id    = $user_data['id'];

        $delete_review = mysqli_query($conn, "DELETE FROM reviews WHERE id = '$review_id'");

        if ($delete_review) {

            $query_delete_activity = "DELETE FROM recent_activities 
                                      WHERE user_id = '$user_id' 
                                      AND activity_type = 'review' 
                                      AND target_name = '$place_name_target' 
                                      LIMIT 1";

            mysqli_query($conn, $query_delete_activity);

            $file_gambar = $data_review['image'];
            if (file_exists($file_gambar) && $file_gambar != "") {
                unlink($file_gambar);
            }

            echo "<script>
                    alert('Review dan Activity berhasil dihapus!');
                    window.location.href='profile-reviews.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menghapus review!');
                    window.location.href='profile-reviews.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Review tidak ditemukan atau Anda tidak berhak menghapusnya.');
                window.location.href='profile-reviews.php';
              </script>";
    }
} else {
    header("location: profile-reviews.php");
}
