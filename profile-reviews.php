<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location: index.php");
    exit();
}

$currentUser = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZPOT - Reviews</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
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
        <div class="profile-header-wrapper">
            <div class="profile-avatar-large"><img src="images/profile/profile.png" alt="Profile"></div>
            <div class="profile-info-text">
                <h1><?php echo $_SESSION['username']; ?></h1>
                <div class="handle">@<?php echo $_SESSION['username']; ?></div>
                <p class="bio">Following the yellow brick road of fashion—finding places, brands, and styles while choosing fabrics over spells, and turning them into softly-structured looks with a little glam charm.</p>
                <div class="bio-divider"></div>
                <div class="stats-row">
                    <div class="stat-item">
                        <div class="stat-num">562</div>
                        <div class="stat-label">Saved</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-num">1.5k</div>
                        <div class="stat-label">Followers</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-num">279</div>
                        <div class="stat-label">Following</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="profile-tabs">
            <a href="profile.php" class="tab-link">PROFILE</a>
            <a href="profile-activity.php" class="tab-link">ACTIVITY</a>
            <a href="profile-reviews.php" class="tab-link active">REVIEWS</a>
        </div>

        <div class="profile-section">
            <div class="profile-section-header">
                <h3>MY REVIEWS</h3>
            </div>

            <?php
            $query = mysqli_query($conn, "SELECT * FROM reviews WHERE username='$currentUser' ORDER BY id DESC");
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_array($query)) {
            ?>
                    <div class="review-long-card" style="position: relative;">

                        <div class="review-dots-btn" onclick="toggleReviewMenu(event, 'menu-<?php echo $row['id']; ?>')">
                            <i class="fas fa-ellipsis-v"></i>
                        </div>
                        <div id="menu-<?php echo $row['id']; ?>" class="review-options-menu">
                            <a href="edit_review.php?id=<?php echo $row['id']; ?>" class="review-opt-item">Edit Review</a>
                            <a href="delete_review.php?id=<?php echo $row['id']; ?>" class="review-opt-item delete" onclick="return confirm('Are you sure?');">Delete Review</a>
                        </div>

                        <div class="review-thumb-box">
                            <img src="<?php echo $row['image']; ?>" alt="Review Image" onerror="this.src='images/placeholder.jpg'">
                        </div>

                        <div class="review-content" style="flex: 1;">
                            <h4><?php echo $row['place_name']; ?></h4>
                            <div class="rating-row">
                                <div class="stars"><?php for ($i = 0; $i < $row['rating']; $i++) {
                                                        echo '<i class="fas fa-star"></i>';
                                                    } ?></div>
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
            }
            ?>

            <div class="review-long-card" style="position: relative;">
                <div class="review-dots-btn" onclick="toggleReviewMenu(event, 'menu-dummy-1')"><i class="fas fa-ellipsis-v"></i></div>
                <div id="menu-dummy-1" class="review-options-menu">
                    <a href="#" onclick="alert('Dummy tidak bisa diedit.');" class="review-opt-item">Edit Review</a>
                    <a href="#" onclick="alert('Dummy tidak bisa dihapus.');" class="review-opt-item delete">Delete Review</a>
                </div>

                <div class="review-thumb-box">
                    <img src="images/profile/nannys pavillon.webp" alt="Nannys" onerror="this.src='images/placeholder.jpg'">
                </div>
                <div class="review-content" style="flex: 1;">
                    <h4>Nanny’s Pavillon, Central Park</h4>
                    <div class="rating-row">
                        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></div>
                        <span class="date">Visited on October, 30 2025</span>
                    </div>
                    <div class="review-tag">WILL BE MY GO-TO-LIST!!</div>
                    <p class="review-desc">The food is goooooood!! i love the garlic cheese bread its so scrumptilicious! definitely would come back for that!</p>
                    <div class="review-actions"><span><i class="far fa-comment"></i> 2 Comments</span><span><i class="far fa-heart"></i> 3 Likes</span></div>
                </div>
            </div>

            <div class="review-long-card" style="position: relative;">
                <div class="review-dots-btn" onclick="toggleReviewMenu(event, 'menu-dummy-2')"><i class="fas fa-ellipsis-v"></i></div>
                <div id="menu-dummy-2" class="review-options-menu">
                    <a href="#" class="review-opt-item">Edit Review</a>
                    <a href="#" class="review-opt-item delete">Delete Review</a>
                </div>

                <div class="review-thumb-box">
                    <img src="images/profile/the acre.webp" alt="The Acre" onerror="this.src='images/placeholder.jpg'">
                </div>
                <div class="review-content" style="flex: 1;">
                    <h4>The Acre, Menteng</h4>
                    <div class="rating-row">
                        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <span class="date">Visited on September, 17 2025</span>
                    </div>
                    <div class="review-tag">GOOD CHOICE FOR BRUNCH!!</div>
                    <p class="review-desc">Nice place for dinner, love the ambience, they have a lot of menu, but what we order all are so delicious. Recommended this place so much! All are great!</p>
                    <div class="review-actions"><span><i class="far fa-comment"></i> 13 Comments</span><span><i class="far fa-heart"></i> 50 Likes</span></div>
                </div>
            </div>

            <div class="review-long-card" style="position: relative;">
                <div class="review-dots-btn" onclick="toggleReviewMenu(event, 'menu-dummy-3')"><i class="fas fa-ellipsis-v"></i></div>
                <div id="menu-dummy-3" class="review-options-menu">
                    <a href="#" class="review-opt-item">Edit Review</a>
                    <a href="#" class="review-opt-item delete">Delete Review</a>
                </div>

                <div class="review-thumb-box">
                    <img src="images/profile/hutankota.webp" alt="GBK" onerror="this.src='images/placeholder.jpg'">
                </div>
                <div class="review-content" style="flex: 1;">
                    <h4>Hutan Kota GBK</h4>
                    <div class="rating-row">
                        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                        <span class="date">Visited on September, 9 2025</span>
                    </div>
                    <div class="review-tag">PIKNIK SIAPA MAU PIKNIIIIIK</div>
                    <p class="review-desc">The place is good dan cocok buat sore ke malam karena adeeem!! cuma kalau siang panas karena pohonnya gak banyak T_______T</p>
                    <div class="review-actions"><span><i class="far fa-comment"></i> 1 Comments</span><span><i class="far fa-heart"></i> 8 Likes</span></div>
                </div>
            </div>

            <div class="review-long-card" style="position: relative;">
                <div class="review-dots-btn" onclick="toggleReviewMenu(event, 'menu-dummy-4')"><i class="fas fa-ellipsis-v"></i></div>
                <div id="menu-dummy-4" class="review-options-menu">
                    <a href="#" class="review-opt-item">Edit Review</a>
                    <a href="#" class="review-opt-item delete">Delete Review</a>
                </div>

                <div class="review-thumb-box">
                    <img src="images/profile/warkopolim.webp" alt="Warkopolim" onerror="this.src='images/placeholder.jpg'">
                </div>
                <div class="review-content" style="flex: 1;">
                    <h4>Warkopolim, Panglima Polim</h4>
                    <div class="rating-row">
                        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                        <span class="date">Visited on Agustus, 28 2025</span>
                    </div>
                    <div class="review-tag">WARKOP KALCER, BHAAAPPP</div>
                    <p class="review-desc">Great place to gather with friends, hampir selalu rame. Harga makan dan minum tergolong affordable buat daerah sini, kalau dari rasa ya oke aja.</p>
                    <div class="review-actions"><span><i class="far fa-comment"></i> 1 Comments</span><span><i class="far fa-heart"></i> 8 Likes</span></div>
                </div>
            </div>

            <div class="review-long-card" style="position: relative;">
                <div class="review-dots-btn" onclick="toggleReviewMenu(event, 'menu-dummy-5')"><i class="fas fa-ellipsis-v"></i></div>
                <div id="menu-dummy-5" class="review-options-menu">
                    <a href="#" class="review-opt-item">Edit Review</a>
                    <a href="#" class="review-opt-item delete">Delete Review</a>
                </div>

                <div class="review-thumb-box">
                    <img src="images/profile/yoyo.webp" alt="Taichan" onerror="this.src='images/placeholder.jpg'">
                </div>
                <div class="review-content" style="flex: 1;">
                    <h4>Sate Taichan Yoyo, Setiabudi</h4>
                    <div class="rating-row">
                        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <span class="date">Visited on August, 27 2025</span>
                    </div>
                    <div class="review-tag">TAICHAN CRISPY TERENAK SCRUMPTILICIOUS!!</div>
                    <p class="review-desc">The best sate taichan se jabodetabek!! konsep taichan krispi nya enak banget beda daripada yg lain.. daging nya juicy bangeeet, kulitnya pun enakk, sambelnya juara!!!</p>
                    <div class="review-actions"><span><i class="far fa-comment"></i> 12 Comments</span><span><i class="far fa-heart"></i> 31 Likes</span></div>
                </div>
            </div>

            <div class="review-long-card" style="position: relative;">
                <div class="review-dots-btn" onclick="toggleReviewMenu(event, 'menu-dummy-6')"><i class="fas fa-ellipsis-v"></i></div>
                <div id="menu-dummy-6" class="review-options-menu">
                    <a href="#" class="review-opt-item">Edit Review</a>
                    <a href="#" class="review-opt-item delete">Delete Review</a>
                </div>

                <div class="review-thumb-box">
                    <img src="images/index/Sentosa-Senayan.webp" alt="Sentosa" onerror="this.src='images/placeholder.jpg'">
                </div>
                <div class="review-content" style="flex: 1;">
                    <h4>Sentosa, Senayan</h4>
                    <div class="rating-row">
                        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <span class="date">Visited on August, 3 2025</span>
                    </div>
                    <div class="review-tag">BEST SEAFOOD IN TOWN!!</div>
                    <p class="review-desc">The food is delicious and well-prepared, with flavors that feel balanced and satisfying. The menu has a good variety of local and Asian-inspired dishes.</p>
                    <div class="review-actions"><span><i class="far fa-comment"></i> 2 Comments</span><span><i class="far fa-heart"></i> 10 Likes</span></div>
                </div>
            </div>

            <div class="review-long-card" style="position: relative;">
                <div class="review-dots-btn" onclick="toggleReviewMenu(event, 'menu-dummy-7')"><i class="fas fa-ellipsis-v"></i></div>
                <div id="menu-dummy-7" class="review-options-menu">
                    <a href="#" class="review-opt-item">Edit Review</a>
                    <a href="#" class="review-opt-item delete">Delete Review</a>
                </div>

                <div class="review-thumb-box">
                    <img src="images/index/DreamDates_Photo.png" alt="DreamDates" onerror="this.src='images/placeholder.jpg'">
                </div>
                <div class="review-content" style="flex: 1;">
                    <h4>Dream Dates, Senopati</h4>
                    <div class="rating-row">
                        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <span class="date">Visited on July, 27 2025</span>
                    </div>
                    <div class="review-tag">WORTH TO TRY!! LARI SEKARANG!!</div>
                    <p class="review-desc">All the meals were very delicious. Price-wise, it's also quite affordable. The place has a nice ambience, they also provide a spacious and clean musholla on the second floor.</p>
                    <div class="review-actions"><span><i class="far fa-comment"></i> 12 Comments</span><span><i class="far fa-heart"></i> 31 Likes</span></div>
                </div>
            </div>

            <div style="height: 100px;"></div>
        </div>
    </div>

    <div id="contactModal" class="auth-overlay" style="display: none;">
        <div class="auth-card contact-card-size">
            <div class="modal-close-btn" onclick="closeContactModal()" style="color: #5E2C0E; top: 20px; right: 20px;"><i class="fas fa-times"></i></div>
            <div class="auth-left contact-left-bg"><img src="images/index/LOGO ZPOT.png" alt="Zpot Art" class="auth-art-img"></div>
            <div class="auth-right contact-right-bg">
                <h1 style="font-size: 32px; margin-bottom: 10px;">Contact Us</h1>
                <p style="margin-bottom: 20px;">If you are interested or have any questions, send us a message.</p>
                <form action="contact_process.php" method="POST" class="auth-form-scroll contact-scroll">
                    <label>email or username</label><input type="text" name="email" class="auth-input contact-input" required>
                    <label>phone</label><input type="text" name="phone" class="auth-input contact-input" required>
                    <label>how can i help?</label><textarea name="message" class="auth-input contact-input" style="height: 100px; resize: none;" required></textarea>
                    <button type="submit" name="send_contact" class="auth-btn btn-dark" style="margin-top: 20px;">send message</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleReviewMenu(event, menuId) {
            event.stopPropagation();
            const menu = document.getElementById(menuId);
            const isVisible = (window.getComputedStyle(menu).display === 'block');
            document.querySelectorAll('.review-options-menu').forEach(m => m.style.display = 'none');
            if (!isVisible) menu.style.display = 'block';
        }

        window.addEventListener('click', function(e) {
            if (!e.target.closest('.review-dots-btn') && !e.target.closest('.review-options-menu')) {
                document.querySelectorAll('.review-options-menu').forEach(m => m.style.display = 'none');
            }
        });

        function toggleSettings(event) {
            event.stopPropagation();
            const s = document.getElementById('settingsDropdown');
            s.style.display = (s.style.display === 'block') ? 'none' : 'block';
        }

        function openAccountPopup(e) {
            e.preventDefault();
            document.getElementById('settingsDropdown').style.display = 'none';
            document.getElementById('accountPopup').style.display = 'block';
        }

        function closeAccountPopup() {
            document.getElementById('accountPopup').style.display = 'none';
            document.getElementById('settingsDropdown').style.display = 'block';
        }

        function openContactModal(e) {
            e.preventDefault();
            document.getElementById('contactModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeContactModal() {
            document.getElementById('contactModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    </script>
</body>

</html>