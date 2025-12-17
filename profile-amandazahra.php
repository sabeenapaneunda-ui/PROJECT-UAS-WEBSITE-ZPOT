<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amanda Zahra (@amandazahra) - ZPOT</title>
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
            <a href="profile.php" class="user-icon-link">
                <i class="fas fa-user-circle"></i>
            </a>
            <div class="menu-btn" onclick="toggleSettings(event)">
                <i class="fas fa-bars"></i>
            </div>

            <div id="settingsDropdown" class="settings-popup">
                <div class="settings-header">
                    <i class="fas fa-times-circle close-settings" onclick="toggleSettings(event)"></i>
                    <span>Settings & Supports</span>
                </div>
                <ul class="settings-list">
                    <li><a href="profile.php">My Account</a></li>
                    <li><a href="notifications.php">Notifications</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="container mt-40">

        <div class="profile-header-wrapper">
            <div class="profile-avatar-large">
                <img src="images/notif/amandazahra.png" alt="Amanda Zahra" onerror="this.src='images/profile/default.png'">
            </div>

            <div class="profile-info-text">
                <h1>Amanda Zahra</h1>
                <div class="handle">@amandazahra</div>
                <p class="bio">
                    Coffee enthusiast, fashion lover, and occasional traveler. Sharing my favorite spots in Jakarta and beyond! ✨☕👗
                </p>

                <div class="bio-divider"></div>

                <div class="stats-row">
                    <div class="stat-item">
                        <div class="stat-num">175k</div>
                        <div class="stat-label">Followers</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-num">601</div>
                        <div class="stat-label">Following</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-num">89</div>
                        <div class="stat-label">Reviews</div>
                    </div>
                </div>

                <div style="margin-top: 15px;">
                    <button class="auth-btn btn-dark" style="padding: 8px 30px; font-size: 14px; width: auto;">Follow</button>
                    <button class="auth-btn" style="padding: 8px 15px; font-size: 14px; width: auto; background: #eee; color: #333; margin-left: 10px;">Message</button>
                </div>
            </div>
        </div>

        <div class="profile-tabs">
            <a href="#" class="tab-link active">PROFILE</a>
            <a href="#" class="tab-link">ACTIVITY</a>
            <a href="#" class="tab-link">REVIEWS</a>
        </div>

        <div class="profile-section">
            <div class="profile-section-header">
                <h3>RECENT REVIEWS</h3>
            </div>

            <div class="review-long-card">
                <div class="review-thumb-box">
                    <img src="images/profile/tuku.webp" alt="Tuku">
                </div>
                <div class="review-content">
                    <h4>Tuku Kopi, Cipete</h4>
                    <div class="rating-row">
                        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <span class="date">Visited on Dec 10, 2025</span>
                    </div>
                    <div class="review-tag">KOPI SUSU TETANGGA JUARA!</div>
                    <p class="review-desc">Gak pernah salah kalau mampir ke Tuku. Es Kopi Susu Tetangga selalu konsisten rasanya, creamy dan manisnya pas. Tempatnya kecil tapi cozy buat quick stop.</p>
                    <div class="review-actions">
                        <span><i class="far fa-comment"></i> 45 Comments</span>
                        <span><i class="far fa-heart"></i> 1.2k Likes</span>
                    </div>
                </div>
            </div>

            <div class="review-long-card">
                <div class="review-thumb-box">
                    <img src="images/profile/monsieur.webp" alt="Monsieur Spoon" onerror="this.src='images/placeholder.jpg'">
                </div>
                <div class="review-content">
                    <h4>Monsieur Spoon, PIK</h4>
                    <div class="rating-row">
                        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                        <span class="date">Visited on Nov 28, 2025</span>
                    </div>
                    <div class="review-tag">CROISSANT HEAVEN 🥐</div>
                    <p class="review-desc">The flaky texture of their croissant is unmatched! Tried the pistachio cromboloni too, it was a bit sweet for me but still good. Ambience is super aesthetic.</p>
                    <div class="review-actions">
                        <span><i class="far fa-comment"></i> 120 Comments</span>
                        <span><i class="far fa-heart"></i> 3.5k Likes</span>
                    </div>
                </div>
            </div>

        </div>

        <div style="height: 100px;"></div>
    </div>

    <div id="contactModal" class="auth-overlay" style="display: none;">
        <div class="auth-card contact-card-size">
            <div class="modal-close-btn" onclick="closeContactModal()"><i class="fas fa-times"></i></div>
            <h1>Contact Us</h1>
            <p>Dummy Contact Modal.</p>
        </div>
    </div>

    <script>
        function openContactModal(e) {
            e.preventDefault();
            document.getElementById('contactModal').style.display = 'flex';
        }

        function closeContactModal() {
            document.getElementById('contactModal').style.display = 'none';
        }

        function toggleSettings(e) {
            e.stopPropagation();
            const p = document.getElementById('settingsDropdown');
            p.style.display = p.style.display === 'block' ? 'none' : 'block';
        }
        window.addEventListener('click', function(e) {
            const s = document.getElementById('settingsDropdown');
            const b = document.querySelector('.menu-btn');
            if (s && !s.contains(e.target) && !b.contains(e.target)) {
                s.style.display = 'none';
            }
        });
    </script>
</body>

</html>