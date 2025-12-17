<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location: index.php");
    exit();
}

$current_username = $_SESSION['username'];
$user_query = mysqli_query($conn, "SELECT id FROM users WHERE username = '$current_username'");
$user_data  = mysqli_fetch_assoc($user_query);
$my_user_id = $user_data['id'];

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZPOT - Notifications</title>
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

    <div class="main-container">

        <main class="left-panel">

            <div class="time-badge">New Updates</div>

            <?php
            $query_notif = mysqli_query($conn, "SELECT * FROM notification WHERE user_id = '$my_user_id' ORDER BY created_at DESC");

            if (mysqli_num_rows($query_notif) > 0) {
                while ($row = mysqli_fetch_array($query_notif)) {
                    $senderName   = $row['sender_name'];
                    $senderAvatar = $row['sender_avatar'];
                    $message      = $row['message'];
                    $postImage    = $row['post_image'];

                    if (empty($senderAvatar)) $senderAvatar = 'images/profile/profile.png';
            ?>
                    <div class="notif-item">
                        <div class="notif-left">
                            <img src="<?php echo $senderAvatar; ?>" class="notif-avatar-img" alt="User" onerror="this.src='images/profile/profile.png'">
                            <div class="notif-text">
                                <span class="username">@<?php echo $senderName; ?></span>
                                <?php echo $message; ?>
                                <div style="font-size: 10px; color: #888; margin-top: 3px;">
                                    <?php echo date('d M Y, H:i', strtotime($row['created_at'])); ?>
                                </div>
                            </div>
                        </div>
                        <?php if (!empty($postImage)) { ?>
                            <img src="<?php echo $postImage; ?>" class="notif-thumb-img" alt="Post" onerror="this.style.display='none'">
                        <?php } ?>
                    </div>
            <?php
                }
            } else {
            }
            ?>


            <div class="time-badge" style="margin-top: 30px;">Last 7 Days</div>

            <div class="notif-item">
                <div class="notif-left">
                    <img src="images/notif/amandazahra.png" class="notif-avatar-img" alt="User" onerror="this.src='images/profile/profile.png'">
                    <div class="notif-text">
                        <a href="profile-amandazahra.php" style="text-decoration: none; font-weight: bold; color: #5E2C0E;">
                            @amandazahra
                        </a>liked your review. Your take on this spot seems to resonate with others.
                    </div>
                </div>
                <img src="images/notif/tanatap.png" class="notif-thumb-img" alt="Post">
            </div>

            <div class="notif-item">
                <div class="notif-left">
                    <img src="images/notif/ganta.png" class="notif-avatar-img" alt="User" onerror="this.src='images/profile/profile.png'">
                    <div class="notif-text">
                        <span class="username">@ganta</span>liked your review. Your take on this spot seems to resonate with others.
                    </div>
                </div>
                <img src="images/notif/tanatap.png" class="notif-thumb-img" alt="Post">
            </div>

            <div class="notif-item">
                <div class="notif-left">
                    <img src="images/notif/blu_logo.png" class="notif-avatar-img" alt="User" onerror="this.src='images/profile/profile.png'">
                    <div class="notif-text">
                        <span class="username">@blu_coffee_eatery</span>There's a new update on a spot you're following.
                    </div>
                </div>
                <img src="images/notif/blu_photo.png" class="notif-thumb-img" alt="Post">
            </div>

            <div class="notif-item">
                <div class="notif-left">
                    <img src="images/notif/keluarga_artis.png" class="notif-avatar-img" alt="User" onerror="this.src='images/profile/profile.png'">
                    <div class="notif-text">
                        <span class="username">@keluarga_artis</span>liked your review.
                    </div>
                </div>
                <img src="images/notif/tanatap.png" class="notif-thumb-img" alt="Post">
            </div>

            <div class="time-badge" style="margin-top: 30px;">Last 14 Days</div>

            <div class="notif-item">
                <div class="notif-left">
                    <img src="images/notif/bulan.png" class="notif-avatar-img" alt="User" onerror="this.src='images/profile/profile.png'">
                    <div class="notif-text">
                        <span class="username">@bulancalista</span>liked your review.
                    </div>
                </div>
                <img src="images/notif/scarlettscafe.png" class="notif-thumb-img" alt="Post">
            </div>

            <div class="notif-item">
                <div class="notif-left">
                    <img src="images/notif/Dreamdates_logo.png" class="notif-avatar-img" alt="User" onerror="this.src='images/profile/profile.png'">
                    <div class="notif-text">
                        <span class="username">@dreamdates_id</span>There's a new update on a spot you're following.
                    </div>
                </div>
                <img src="images/notif/DreamDates_Photo.png" class="notif-thumb-img" alt="Post">
            </div>

            <div class="notif-item">
                <div class="notif-left">
                    <img src="images/notif/nadinamizah.png" class="notif-avatar-img" alt="User" onerror="this.src='images/profile/profile.png'">
                    <div class="notif-text">
                        <span class="username">@nadin_amizah</span>liked your review.
                    </div>
                </div>
                <img src="images/notif/scarlettscafe.png" class="notif-thumb-img" alt="Post">
            </div>

            <div class="time-badge" style="margin-top: 30px;">Last 30 Days</div>

            <div class="notif-item">
                <div class="notif-left">
                    <img src="images/notif/Periplus_Logo.png" class="notif-avatar-img" alt="User" onerror="this.src='images/profile/profile.png'">
                    <div class="notif-text">
                        <span class="username">@periplus_plaza_senayan</span>There's a new update.
                    </div>
                </div>
                <img src="images/notif/Periplius_photo.png" class="notif-thumb-img" alt="Post">
            </div>

            <div class="notif-item">
                <div class="notif-left">
                    <img src="images/notif/tommy.png" class="notif-avatar-img" alt="User" onerror="this.src='images/profile/profile.png'">
                    <div class="notif-text">
                        <span class="username">@tommy</span>liked your review.
                    </div>
                </div>
                <img src="images/notif/scarlettscafe.png" class="notif-thumb-img" alt="Post">
            </div>

            <div class="see-more-btn" style="margin-top: 30px; font-weight: bold; cursor: pointer;">
                See More <i class="fas fa-chevron-right"></i>
            </div>

        </main>

        <aside class="right-panel">
            <div class="suggested-header-pill">Suggested For You</div>

            <div class="sidebar-section">
                <h3>People You Might Know</h3>

                <div class="suggestion-item">
                    <div class="sugg-left">
                        <img src="images/notif/tasya_farasya.png" class="sidebar-avatar-img" alt="User" onerror="this.src='images/profile/profile.png'">
                        <div class="sugg-info">
                            <div class="sugg-username">@tasya_farasya</div>
                            <div class="sugg-subtext">Suggested For You</div>
                        </div>
                    </div>
                    <div class="add-btn"><i class="fas fa-plus-circle"></i></div>
                </div>

                <div class="suggestion-item">
                    <div class="sugg-left">
                        <img src="images/notif/windah.png" class="sidebar-avatar-img" alt="User" onerror="this.src='images/profile/profile.png'">
                        <div class="sugg-info">
                            <div class="sugg-username">@windah_basudara</div>
                            <div class="sugg-subtext">Suggested For You</div>
                        </div>
                    </div>
                    <div class="add-btn"><i class="fas fa-plus-circle"></i></div>
                </div>

                <div class="suggestion-item">
                    <div class="sugg-left">
                        <img src="images/notif/shadira.png" class="sidebar-avatar-img" alt="User" onerror="this.src='images/profile/profile.png'">
                        <div class="sugg-info">
                            <div class="sugg-username">@shadirafirdauzi</div>
                            <div class="sugg-subtext">Suggested For You</div>
                        </div>
                    </div>
                    <div class="add-btn"><i class="fas fa-plus-circle"></i></div>
                </div>

                <a class="sidebar-see-more">See More ></a>
                <div class="sidebar-divider"></div>
            </div>

            <div class="sidebar-section">
                <h3>Spots You Might Like</h3>

                <div class="suggestion-item">
                    <div class="sugg-left">
                        <img src="images/notif/scarlettscafe.png" class="sidebar-avatar-img" alt="User" onerror="this.src='images/profile/profile.png'">
                        <div class="sugg-info">
                            <div class="sugg-username">@scarletts_cafe</div>
                            <div class="sugg-subtext">Suggested For You</div>
                        </div>
                    </div>
                    <div class="add-btn"><i class="fas fa-plus-circle"></i></div>
                </div>

                <div class="suggestion-item">
                    <div class="sugg-left">
                        <img src="images/index/urban forest.jpeg" class="sidebar-avatar-img" alt="User" onerror="this.src='images/profile/profile.png'">
                        <div class="sugg-info">
                            <div class="sugg-username">@urban_forest_id</div>
                            <div class="sugg-subtext">Suggested For You</div>
                        </div>
                    </div>
                    <div class="add-btn"><i class="fas fa-plus-circle"></i></div>
                </div>

                <a class="sidebar-see-more">See More ></a>
                <div class="sidebar-divider"></div>
            </div>

            <div class="sidebar-section">
                <h3>Curated Brand For You</h3>

                <div class="suggestion-item">
                    <div class="sugg-left">
                        <img src="images/notif/nike.png" class="sidebar-avatar-img" alt="User" onerror="this.src='images/profile/profile.png'">
                        <div class="sugg-info">
                            <div class="sugg-username">@nike_id</div>
                            <div class="sugg-subtext">Suggested For You</div>
                        </div>
                    </div>
                    <div class="add-btn"><i class="fas fa-plus-circle"></i></div>
                </div>

                <div class="suggestion-item">
                    <div class="sugg-left">
                        <img src="images/notif/the_executive.png" class="sidebar-avatar-img" alt="User" onerror="this.src='images/profile/profile.png'">
                        <div class="sugg-info">
                            <div class="sugg-username">@the_executive</div>
                            <div class="sugg-subtext">Suggested For You</div>
                        </div>
                    </div>
                    <div class="add-btn"><i class="fas fa-plus-circle"></i></div>
                </div>

                <a class="sidebar-see-more">See More ></a>
            </div>

        </aside>

    </div>

    <div id="contactModal" class="auth-overlay" style="display: none;">
        <div class="auth-card contact-card-size">

            <div class="modal-close-btn" onclick="closeContactModal()" style="color: #5E2C0E; top: 20px; right: 20px;">
                <i class="fas fa-times"></i>
            </div>

            <div class="auth-left contact-left-bg">
                <img src="images/index/LOGO ZPOT.png" alt="Zpot Art" class="auth-art-img">
            </div>

            <div class="auth-right contact-right-bg">

                <h1 style="font-size: 32px; margin-bottom: 10px;">Contact Us</h1>
                <p style="margin-bottom: 20px; font-weight: 500;">
                    If you are interested or have any questions, send us a message.
                </p>

                <form action="contact_process.php" method="POST" class="auth-form-scroll contact-scroll">

                    <label>email or username</label>
                    <input type="text" name="email" class="auth-input contact-input" required>

                    <label>phone</label>
                    <input type="text" name="phone" class="auth-input contact-input" required>

                    <label>how can i help?</label>
                    <textarea name="message" class="auth-input contact-input" style="height: 100px; resize: none;" required></textarea>

                    <div class="checkbox-row">
                        <input type="checkbox" id="contact-check">
                        <label for="contact-check" style="margin:0; font-weight:normal;">i'm very interested</label>
                    </div>

                    <button type="submit" name="send_contact" class="auth-btn btn-dark" style="margin-top: 20px;">send message</button>

                    <div class="or-divider">
                        <span>or</span>
                    </div>

                    <div class="social-icons-row">
                        <i class="fab fa-twitter-square"></i>
                        <i class="fas fa-globe"></i> <i class="fab fa-telegram-plane"></i>
                        <i class="fab fa-linkedin"></i>
                        <i class="fab fa-whatsapp-square"></i>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleSettings(event) {
            event.stopPropagation();
            const popup = document.getElementById('settingsDropdown');
            const accountPopup = document.getElementById('accountPopup');
            if (accountPopup) accountPopup.style.display = 'none';
            popup.style.display = (popup.style.display === 'block') ? 'none' : 'block';
        }

        function openAccountPopup(event) {
            event.preventDefault();
            document.getElementById('settingsDropdown').style.display = 'none';
            document.getElementById('accountPopup').style.display = 'block';
        }

        function closeAccountPopup() {
            document.getElementById('accountPopup').style.display = 'none';
            document.getElementById('settingsDropdown').style.display = 'block';
        }

        function openContactModal(event) {
            event.preventDefault();
            document.getElementById('contactModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeContactModal() {
            document.getElementById('contactModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }
        window.addEventListener('click', function(e) {
            const settingsPopup = document.getElementById('settingsDropdown');
            const accountPopup = document.getElementById('accountPopup');
            const btn = document.querySelector('.menu-btn');
            if (settingsPopup && accountPopup) {
                if (!settingsPopup.contains(e.target) && !accountPopup.contains(e.target) && !btn.contains(e.target)) {
                    settingsPopup.style.display = 'none';
                    accountPopup.style.display = 'none';
                }
            }
            const contactModal = document.getElementById('contactModal');
            if (e.target === contactModal) closeContactModal();
        });
    </script>
</body>

</html>