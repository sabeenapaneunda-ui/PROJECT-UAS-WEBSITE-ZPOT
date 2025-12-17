<?php
session_start();
include 'koneksi.php';

// 1. Cek Login (User pengunjung harus login dulu)
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location: index.php");
    exit();
}

// 2. Tangkap Username dari URL (misal: user-profile.php?u=amandazahra)
if (isset($_GET['u'])) {
    $target_username = mysqli_real_escape_string($conn, $_GET['u']);
} else {
    // Kalau tidak ada parameter 'u', balik ke home atau error
    header("location: index.php");
    exit();
}

// 3. Ambil Data User Target dari Database
$query_user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$target_username'");
$user_data = mysqli_fetch_assoc($query_user);

// Kalau user tidak ditemukan
if (!$user_data) {
    echo "<h3>User not found!</h3>";
    exit();
}

// Simpan data target user ke variabel biar gampang dipanggil
$t_fullname = $user_data['username']; // Atau field 'fullname' jika ada
$t_username = $user_data['username'];
$t_bio      = isset($user_data['bio']) ? $user_data['bio'] : "No bio yet."; // Default bio
$t_photo    = isset($user_data['profile_pic']) ? $user_data['profile_pic'] : "images/profile/default.png"; // Default foto

// Data Stats Dummy (Nanti bisa diganti query COUNT)
$t_saved     = 120;
$t_followers = "8.9k";
$t_following = 150;

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $t_username; ?> - ZPOT Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <div class="header-left">
            <div class="logo-wrapper">
                <a href="index.php"><img src="images/index/LOGO ZPOT.png" alt="ZPOT Logo" class="logo-img"></a>
            </div>
        </div>
        <nav>
            <a href="index.php">Home</a>
            <a href="search.php">Explore</a>
            <a href="notifications.php">Notifications</a>
            <a href="#" onclick="openContactModal(event)">Contact Us</a>
        </nav>
        <div class="header-right">
            <a href="profile.php" class="user-icon-link"><i class="fas fa-user-circle"></i></a>
            <div class="menu-btn" onclick="toggleSettings(event)"><i class="fas fa-bars"></i></div>
        </div>
        </header>

    <div class="container mt-40">

        <div class="profile-header-wrapper">
            <div class="profile-avatar-large">
                <img src="<?php echo $t_photo; ?>" alt="<?php echo $t_username; ?>" onerror="this.src='images/profile/default.png'">
            </div>

            <div class="profile-info-text">
                <h1><?php echo $t_fullname; ?></h1>
                <div class="handle">@<?php echo $t_username; ?></div>
                <p class="bio"><?php echo $t_bio; ?></p>
                
                <div class="bio-divider"></div>

                <div class="stats-row">
                    <div class="stat-item"><div class="stat-num"><?php echo $t_saved; ?></div><div class="stat-label">Saved</div></div>
                    <div class="stat-item"><div class="stat-num"><?php echo $t_followers; ?></div><div class="stat-label">Followers</div></div>
                    <div class="stat-item"><div class="stat-num"><?php echo $t_following; ?></div><div class="stat-label">Following</div></div>
                </div>

                <div style="margin-top: 15px;">
                    <button class="auth-btn btn-dark" style="padding: 8px 25px; font-size: 14px;">Follow</button>
                </div>
            </div>
        </div>

        <div class="profile-tabs">
            <a href="#" class="tab-link active">PROFILE</a>
            <a href="#" class="tab-link">ACTIVITY</a>
            <a href="#" class="tab-link">REVIEWS</a>
            <a href="#" class="tab-link">FAVORITES</a>
        </div>

        <div class="profile-section">
            <div class="profile-section-header">
                <h3>RECENT REVIEWS</h3>
            </div>

            <?php
            // Query ambil review milik user target
            $query_rev = mysqli_query($conn, "SELECT * FROM reviews WHERE username='$target_username' ORDER BY id DESC");

            if(mysqli_num_rows($query_rev) > 0){
                while($row = mysqli_fetch_array($query_rev)){
            ?>
                <div class="review-long-card">
                    <div class="review-thumb-box">
                        <img src="<?php echo $row['image']; ?>" alt="Review Image" onerror="this.src='images/placeholder.jpg'" style="width:100%; height:100%; object-fit:cover;">
                    </div>
                    <div class="review-content">
                        <h4><?php echo $row['place_name']; ?></h4>
                        <div class="rating-row">
                            <div class="stars"><?php for($i=0; $i<$row['rating']; $i++) { echo '<i class="fas fa-star"></i>'; } ?></div>
                            <span class="date">Visited on <?php echo $row['visit_date']; ?></span>
                        </div>
                        <div class="review-tag"><?php echo $row['tag_text']; ?></div>
                        <p class="review-desc"><?php echo $row['review_text']; ?></p>
                        <div class="review-actions">
                            <span><i class="far fa-comment"></i> <?php echo $row['comments']; ?> Comments</span>
                            <span><i class="far fa-heart"></i> <?php echo $row['likes']; ?> Likes</span>
                        </div>
                    </div>
                </div>
            <?php
                }
            } else {
                echo "<p style='text-align:center; color:#888; padding:20px;'>User ini belum membuat review.</p>";
            }
            ?>
        </div>
        
        <div style="height: 100px;"></div>
    </div>
    
    </body>
</html>