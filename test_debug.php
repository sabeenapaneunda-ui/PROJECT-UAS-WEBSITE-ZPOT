<?php
// Nyalakan semua error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>🔍 DIAGNOSIS DATABASE ZPOT</h1>";

// 1. Cek Koneksi
if (!file_exists('koneksi.php')) {
    die("<h3 style='color:red'>❌ File koneksi.php TIDAK DITEMUKAN!</h3>");
}
include 'koneksi.php';

if (!$conn) {
    die("<h3 style='color:red'>❌ Koneksi Database GAGAL: " . mysqli_connect_error() . "</h3>");
}
echo "<h3 style='color:green'>✅ Koneksi Database BERHASIL</h3>";

// 2. Cek Struktur Tabel Reviews
echo "<hr><h3>Pengecekan Tabel 'reviews':</h3>";
$check_reviews = mysqli_query($conn, "SHOW COLUMNS FROM reviews");
if (!$check_reviews) {
    echo "<p style='color:red'>❌ Tabel 'reviews' TIDAK DITEMUKAN!</p>";
} else {
    $columns = [];
    while ($row = mysqli_fetch_assoc($check_reviews)) {
        $columns[] = $row['Field'];
    }
    
    // Cek kolom wajib
    $wajib = ['place_name', 'tag_text', 'rating', 'image'];
    foreach ($wajib as $col) {
        if (in_array($col, $columns)) {
            echo "<span style='color:green'>✔ Kolom '$col' - ADA</span><br>";
        } else {
            echo "<span style='color:red; font-weight:bold;'>❌ Kolom '$col' - TIDAK ADA (Harus Dibuat!)</span><br>";
        }
    }
}

// 3. Cek Struktur Tabel Recent Activities
echo "<hr><h3>Pengecekan Tabel 'recent_activities':</h3>";
$check_act = mysqli_query($conn, "SHOW COLUMNS FROM recent_activities");
if (!$check_act) {
    echo "<p style='color:red; font-weight:bold;'>❌ Tabel 'recent_activities' BELUM DIBUAT!</p>";
    echo "<p>Silakan jalankan SQL Create Table dulu.</p>";
} else {
    echo "<span style='color:green'>✔ Tabel 'recent_activities' SUDAH ADA</span>";
}

// 4. Test Insert Dummy (Tanpa Form)
echo "<hr><h3>Test Insert Data Dummy:</h3>";
$test_user = 'ghodell'; // Ganti dng username yg ada di database kamu jika beda
$user_check = mysqli_query($conn, "SELECT id FROM users WHERE username='$test_user'");
$u_data = mysqli_fetch_assoc($user_check);

if($u_data) {
    echo "User ID ditemukan: " . $u_data['id'] . "<br>";
    
    // Coba Insert Paksa
    $sql_test = "INSERT INTO reviews (username, place_name, category, rating, tag_text, review_text, image, visit_date, likes, comments) 
                 VALUES ('$test_user', 'TEST PLACE', 'Test Cat', 5, 'TEST TITLE', 'Ini tes debug', 'no-image.jpg', 'Jan 01 2025', 0, 0)";
    
    if (mysqli_query($conn, $sql_test)) {
        echo "<h3 style='color:green'>✅ INSERT SUKSES! (Masalah ada di form upload.php, bukan database)</h3>";
        // Hapus lagi data sampahnya
        mysqli_query($conn, "DELETE FROM reviews WHERE place_name='TEST PLACE'");
    } else {
        echo "<h3 style='color:red'>❌ INSERT GAGAL! Ini Errornya:</h3>";
        echo "<div style='background:#eee; padding:10px; border:1px solid red;'>" . mysqli_error($conn) . "</div>";
    }
} else {
    echo "<span style='color:red'>User '$test_user' tidak ada. Login dulu/Ganti nama user di script debug baris 53.</span>";
}
?>