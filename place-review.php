<?php
session_start();

// Cek apakah user sudah login?
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    // Kalau belum login, tendang balik ke halaman login
    header("location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZPOT - Reviews</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <div class="header-left">
            <div class="logo-wrapper">
                <a href="index.php"><img src="images/logo.png" alt="ZPOT" class="logo-img"></a>
            </div>
        </div>
        <nav>
            <a href="index.php">Home</a>
            <a href="search.php">Explore</a>
            <a href="notifications.php">Notifications</a>
            <a href="#"onclick="openContactModal(event)">Contact Us</a>
        </nav>
        <div class="header-right">
            <a href="profile.php" class="user-icon-link"><i class="fas fa-user-circle"></i></a>
            <div class="menu-btn" onclick="toggleSettings(event)"><i class="fas fa-bars"></i></div>
            
            <div id="settingsDropdown" class="settings-popup">
                <div class="settings-header">
                    <i class="fas fa-times-circle close-settings" onclick="toggleSettings(event)"></i>
                    <span>Settings & Supports</span>
                </div>
                <ul class="settings-list">
                    <li><a href="#" onclick="openAccountPopup(event)">Account</a></li>
                    <li><a href="#">Preferences</a></li>
                    <li><a href="notifications.php">Notifications</a></li>
                    <li><a href="#">Locations</a></li>
                    <li><a href="#">Security</a></li>
                    <li><a href="#">Support</a></li>
                </ul>
                <div class="logout-link"><a href="logout.php">Logout</a></div>
            </div>
            <div id="accountPopup" class="settings-popup" style="display: none;">
                <div class="settings-header account-header-style">
                    <i class="fas fa-times-circle close-settings" onclick="closeAccountPopup()"></i>
                    <span style="flex: 1; text-align: center;">Account</span>
                </div>
                <ul class="settings-list">
                    <li><a href="#">Your Saved Spot</a></li>
                    <li><a href="#">Your Reviews</a></li>
                    <li><a href="#">Private Account</a></li>
                    <li><a href="#">Interactions</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="container mt-40">

        <div class="profile-header-layout">
            <div class="profile-avatar">
                <img src="images/profile/avatar.jpg" class="ph-img" alt="Avatar">
            </div>

            <div class="profile-info">
                <h1><?php echo $_SESSION['username']; ?></h1>
                <div class="handle">@<?php echo $_SESSION['username']; ?></div>
                <p class="bio">Following the yellow brick road of fashion—finding places, brands, and styles while choosing fabrics over spells, and turning them into softly-structured looks with a little glam charm.</p>
                
                <div class="divider"></div>

                <div class="stats-row">
                    <div class="stat"><strong>562</strong> Saved</div>
                    <div class="stat"><strong>1.5k</strong> Followers</div>
                    <div class="stat"><strong>279</strong> Following</div>
                </div>
            </div>
        </div>

        <div class="profile-tabs-exact">
            <a href="profile.php">PROFILE</a>
            <a href="profile-activity.php">ACTIVITY</a>
            <a href="profile-reviews.php" class="active">REVIEWS</a>
            <a href="profile-favorites.php">FAVORITES</a>
            <a href="profile-boards.php">BOARDS</a>
        </div>

        <div class="section-wrapper">
            <div class="section-title-row">
                <h3>MY REVIEWS</h3>
            </div>
            
            <div class="review-exact-card">
                <img src="images/profile/nannys.jpg" class="rec-img" alt="Nanny's">
                <div class="rec-content">
                    <h4>Nanny’s Pavillon, Central Park</h4>
                    <div class="rec-meta">
                        <span class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></span>
                        <span class="date">Visited on October, 30 2025</span>
                    </div>
                    <div class="rec-tag">WILL BE MY GO-TO-LIST!!</div>
                    <p>The food is goooooood!! i love the garlic cheese bread its so scrumptilicious! definitely would come back for that!</p>
                    <div class="rec-actions">
                        <span><i class="far fa-comment"></i> 2 Comments</span>
                        <span><i class="far fa-heart"></i> 3 Likes</span>
                    </div>
                </div>
            </div>

            <div class="review-exact-card">
                <img src="images/profile/theacre.jpg" class="rec-img" alt="The Acre">
                <div class="rec-content">
                    <h4>The Acre, Menteng</h4>
                    <div class="rec-meta">
                        <span class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                        <span class="date">Visited on September, 17 2025</span>
                    </div>
                    <div class="rec-tag">GOOD CHOICE FOR BRUNCH!!</div>
                    <p>Nice place for dinner, love the ambience, they have a lot of menu, but what we order all are so delicious. Recommended this place so much! All are great!</p>
                    <div class="rec-actions">
                        <span><i class="far fa-comment"></i> 13 Comments</span>
                        <span><i class="far fa-heart"></i> 50 Likes</span>
                    </div>
                </div>
            </div>

            <div class="review-exact-card">
                <img src="images/profile/hutankota.jpg" class="rec-img" alt="Hutan Kota">
                <div class="rec-content">
                    <h4>Hutan Kota GBK</h4>
                    <div class="rec-meta">
                        <span class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></span>
                        <span class="date">Visited on September, 9 2025</span>
                    </div>
                    <div class="rec-tag">PIKNIK SIAPA MAU PIKNIIIIIK</div>
                    <p>The place is good dan cocok buat sore ke malam karena adeeem!! cuma kalau siang panas karena pohonnya gak banyak T_______T</p>
                    <div class="rec-actions">
                        <span><i class="far fa-comment"></i> 1 Comments</span>
                        <span><i class="far fa-heart"></i> 8 Likes</span>
                    </div>
                </div>
            </div>

            <div class="review-exact-card">
                <img src="images/profile/warkop.jpg" class="rec-img" alt="Warkopolim">
                <div class="rec-content">
                    <h4>Warkopolim, Panglima Polim</h4>
                    <div class="rec-meta">
                        <span class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></span>
                        <span class="date">Visited on Agustus, 28 2025</span>
                    </div>
                    <div class="rec-tag">WARKOP KALCER, BHAAAPPP</div>
                    <p>Great place to gather with friends, hampir selalu rame. Harga makan dan minum tergolong affordable buat daerah sini, kalau dari rasa ya oke aja.</p>
                    <div class="rec-actions">
                        <span><i class="far fa-comment"></i> 1 Comments</span>
                        <span><i class="far fa-heart"></i> 8 Likes</span>
                    </div>
                </div>
            </div>

            <div class="review-exact-card">
                <img src="images/profile/taichan.jpg" class="rec-img" alt="Sate Taichan">
                <div class="rec-content">
                    <h4>Sate Taichan Yoyo, Setiabudi</h4>
                    <div class="rec-meta">
                        <span class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                        <span class="date">Visited on August, 27 2025</span>
                    </div>
                    <div class="rec-tag">TAICHAN CRISPY TERENAK SCRUMPTILICIOUS!!</div>
                    <p>The best sate taichan se jabodetabek!! konsep taichan krispi nya enak banget beda daripada yg lain.. daging nya juicy bangeeet, kulitnya pun enakk, sambelnya juara!!!</p>
                    <div class="rec-actions">
                        <span><i class="far fa-comment"></i> 12 Comments</span>
                        <span><i class="far fa-heart"></i> 31 Likes</span>
                    </div>
                </div>
            </div>

            <div class="review-exact-card">
                <img src="images/profile/sentosa.jpg" class="rec-img" alt="Sentosa">
                <div class="rec-content">
                    <h4>Sentosa, Senayan</h4>
                    <div class="rec-meta">
                        <span class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                        <span class="date">Visited on August, 3 2025</span>
                    </div>
                    <div class="rec-tag">BEST SEAFOOD IN TOWN!!</div>
                    <p>The food is delicious and well-prepared, with flavors that feel balanced and satisfying. The menu has a good variety of local and Asian-inspired dishes.</p>
                    <div class="rec-actions">
                        <span><i class="far fa-comment"></i> 2 Comments</span>
                        <span><i class="far fa-heart"></i> 10 Likes</span>
                    </div>
                </div>
            </div>

            <div class="review-exact-card">
                <img src="images/profile/dreamdates.jpg" class="rec-img" alt="Dream Dates">
                <div class="rec-content">
                    <h4>Dream Dates, Senopati</h4>
                    <div class="rec-meta">
                        <span class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                        <span class="date">Visited on July, 27 2025</span>
                    </div>
                    <div class="rec-tag">WORTH TO TRY!! LARI SEKARANG!!</div>
                    <p>All the meals were very delicious. Price-wise, it's also quite affordable. The place has a nice ambience, they also provide a spacious and clean musholla on the second floor.</p>
                    <div class="rec-actions">
                        <span><i class="far fa-comment"></i> 12 Comments</span>
                        <span><i class="far fa-heart"></i> 31 Likes</span>
                    </div>
                </div>
            </div>

        </div>

        <div style="height: 100px;"></div>
    </div>

    <script>
        function toggleSettings(event){ event.stopPropagation(); const p=document.getElementById('settingsDropdown'); const a=document.getElementById('accountPopup'); if(a)a.style.display='none'; p.style.display=p.style.display==='block'?'none':'block'; }
        function openAccountPopup(event){ event.preventDefault(); document.getElementById('settingsDropdown').style.display='none'; document.getElementById('accountPopup').style.display='block'; }
        function closeAccountPopup(){ document.getElementById('accountPopup').style.display='none'; document.getElementById('settingsDropdown').style.display='block'; }
        window.addEventListener('click', function(e){ const s=document.getElementById('settingsDropdown'); const a=document.getElementById('accountPopup'); const b=document.querySelector('.menu-btn'); if(s&&a){ if(!s.contains(e.target)&&!a.contains(e.target)&&!b.contains(e.target)){ s.style.display='none'; a.style.display='none'; }}});
    </script>
</body>
</html>