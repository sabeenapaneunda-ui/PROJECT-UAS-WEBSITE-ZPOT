<?php
session_start();
include 'koneksi.php';

date_default_timezone_set('Asia/Jakarta');

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location: index.php");
    exit();
}

$current_username = $_SESSION['username'];
$user_query = mysqli_query($conn, "SELECT id FROM users WHERE username = '$current_username'");
$user_data  = mysqli_fetch_assoc($user_query);
$my_user_id = $user_data['id'];

function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    $string = array(
        'y' => 'year',
        'm' => 'month',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );

    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZPOT - Activity</title>
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

    <div class="container mt-40">

        <div class="profile-header-wrapper">
            <div class="profile-avatar-large" style="overflow: hidden; padding: 0; border: none;">
                <img src="images/profile/profile.png" alt="Profile" style="width: 100%; height: 100%; object-fit: cover;">
            </div>

            <div class="profile-info-text">
                <h1><?php echo $_SESSION['username']; ?></h1>
                <div class="handle">@<?php echo $_SESSION['username']; ?></div>
                <p class="bio">
                    Following the yellow brick road of fashion—finding places, brands, and styles while choosing fabrics over spells, and turning them into softly-structured looks with a little glam charm.
                </p>
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
            <a href="profile-activity.php" class="tab-link active">ACTIVITY</a>
            <a href="profile-reviews.php" class="tab-link">REVIEWS</a>
        </div>

        <div class="profile-section">
            <div class="profile-section-header" style="border-bottom: none; margin-bottom: 10px;">
                <h3 style="color: #5E2C0E;">RECENT ACTIVITIES</h3>
            </div>

            <div class="activity-list">

                <?php
                $query_act = mysqli_query($conn, "SELECT * FROM recent_activities WHERE user_id = '$my_user_id' ORDER BY created_at DESC");

                if (mysqli_num_rows($query_act) > 0) {
                    while ($row = mysqli_fetch_array($query_act)) {
                        $type   = $row['activity_type'];
                        $target = $row['target_name'];
                        $image  = $row['target_image'];
                        $time   = time_elapsed_string($row['created_at']);
                        $iconClass = 'fas fa-dot-circle';
                        $text = "You did something at <strong>$target</strong>";

                        if ($type == 'review') {
                            $iconClass = 'far fa-edit';
                            $text = "You created review for <strong>$target</strong>";
                        } elseif ($type == 'like') {
                            $iconClass = 'fas fa-heart';
                            $text = "You liked review for <strong>$target</strong>";
                        } elseif ($type == 'comment') {
                            $iconClass = 'fas fa-comment';
                            $text = "You commented on review for <strong>$target</strong>";
                        } elseif ($type == 'follow') {
                            $iconClass = 'fas fa-user-plus';
                            $text = "You started following <strong>$target</strong>";
                        }
                ?>
                        <div class="activity-item">
                            <div class="act-icon"><i class="<?php echo $iconClass; ?>"></i></div>
                            <div class="act-info">
                                <div class="act-text"><?php echo $text; ?></div>
                                <div class="act-time"><?php echo $time; ?></div>
                            </div>
                            <?php if (!empty($image)) { ?>
                                <img src="<?php echo $image; ?>" class="act-thumb" alt="Thumb" onerror="this.src='images/placeholder.jpg'">
                            <?php } ?>
                        </div>
                <?php
                    }
                }
                ?>

                <div class="activity-item">
                    <div class="act-icon"><i class="far fa-edit"></i></div>
                    <div class="act-info">
                        <div class="act-text">You created review for <strong>Nanny’s Pavillon, Central Park</strong></div>
                        <div class="act-time">1 hour ago</div>
                    </div>
                    <img src="images/profile/nannys pavillon.webp" class="act-thumb" alt="Nanny's">
                </div>

                <div class="activity-item">
                    <div class="act-icon"><i class="far fa-edit"></i></div>
                    <div class="act-info">
                        <div class="act-text">You created review for <strong>The Acre, Menteng</strong></div>
                        <div class="act-time">15 hours ago</div>
                    </div>
                    <img src="images/profile/the acre.webp" class="act-thumb" alt="The Acre">
                </div>

                <div class="activity-item">
                    <div class="act-icon"><i class="far fa-edit"></i></div>
                    <div class="act-info">
                        <div class="act-text">You created review for <strong>Hutan Kota GBK</strong></div>
                        <div class="act-time">1 days ago</div>
                    </div>
                    <img src="images/profile/hutankota.webp" class="act-thumb" alt="Hutan Kota">
                </div>

                <div class="activity-item">
                    <div class="act-icon"><i class="fas fa-heart"></i></div>
                    <div class="act-info">
                        <div class="act-text">You liked Elphie’s review for <strong>Honest Spoon, Tebet</strong></div>
                        <div class="act-time">1 days ago</div>
                    </div>
                    <img src="images/profile/honest spoon tempat.jpg" class="act-thumb" alt="Honest Spoon">
                </div>

                <div class="activity-item">
                    <div class="act-icon"><i class="fas fa-comment"></i></div>
                    <div class="act-info">
                        <div class="act-text">You commented Nessa’s review for <strong>Roti Sordo, Tebet</strong></div>
                        <div class="act-time">2 days ago</div>
                    </div>
                    <img src="images/profile/nannys pavillon.webp" class="act-thumb" alt="Roti Sordo">
                </div>

                <div class="activity-item">
                    <div class="act-icon"><i class="fas fa-user-plus"></i></div>
                    <div class="act-info">
                        <div class="act-text">You started following <strong>Greta Tsahara</strong></div>
                        <div class="act-time">4 days ago</div>
                    </div>
                    <img src="images/profile/yeri.jpg" class="act-thumb" alt="Greta" onerror="this.src='images/default_user.jpg'">
                </div>

            </div>
        </div>

        <div style="height: 100px;"></div>
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