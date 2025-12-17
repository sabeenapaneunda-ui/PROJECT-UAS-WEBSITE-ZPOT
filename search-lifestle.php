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
    <title>ZPOT - Lifestyle</title>
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
                    <li><a href="#" onclick="openAccountPopup(event)">Account</a></li>

                    <li><a href="#">Preferences</a></li>
                    <li><a href="notifications.php">Notifications</a></li>
                    <li><a href="#">Locations</a></li>
                    <li><a href="#">Security</a></li>
                    <li><a href="#">Support</a></li>
                </ul>

                <div class="logout-link">
                    <a href="logout.php">Logout</a>
                </div>
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

        </div>
    </header>

    <div class="container">

        <div class="search-page-wrapper" style="margin-top: 40px; margin-bottom: 20px;">
            <div class="big-search-bar">
                <a href="search.php" style="text-decoration: none; display: flex; align-items: center;">
                    <i class="fas fa-search search-icon-inside"></i>
                </a>

                <div class="search-tag-pill">
                    <i class="fas fa-map-marker-alt"></i> <span>Place</span>
                </div>

                <div style="flex: 1;"></div>
            </div>
        </div>

        <div class="center-title-section">
            <h1>Recommendations for You</h1>
            <p>Pick to match your vibe!</p>
        </div>

        <div class="horizontal-section">
            <div class="h-section-header">
                <h3>Slow living</h3>

            </div>
            <div class="scroll-container">
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="horizontal-section">
            <div class="h-section-header">
                <h3>Soft life</h3>

            </div>
            <div class="scroll-container">
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="horizontal-section">
            <div class="h-section-header">
                <h3>Night routine</h3>

            </div>
            <div class="scroll-container">
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="horizontal-section">
            <div class="h-section-header">
                <h3>Productive day</h3>

            </div>
            <div class="scroll-container">
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="horizontal-section">
            <div class="h-section-header">
                <h3>Cozy time</h3>

            </div>
            <div class="scroll-container">
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="horizontal-section">
            <div class="h-section-header">
                <h3>Playlist vibes</h3>

            </div>
            <div class="scroll-container">
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="horizontal-section">
            <div class="h-section-header">
                <h3>Me time</h3>

            </div>
            <div class="scroll-container">
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
                <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                    <div class="place-thumb"></div>
                    <div class="place-info">
                        <h4>Keterangan Nama</h4>
                        <div class="addr">alamat</div>
                        <div class="by">by : @username</div>
                    </div>
                </div>
            </div>
        </div>

        <div style="height: 50px;"></div>

    </div>

    <div id="placeDetailModal" class="modal-overlay" onclick="closeModal(event)">

        <div class="modal-content-large" onclick="event.stopPropagation()">

            <div class="modal-close-btn" onclick="closeModal(event)">
                <i class="fas fa-times"></i>
            </div>

            <h2 class="modal-page-title">Place Review Details</h2>

            <div class="review-details-grid">

                <div class="details-left-col">

                    <div class="rd-main-image-container">
                        <div class="rd-main-image"></div>

                        <div class="image-next-btn">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>

                    <div class="rd-box">
                        <h3>Place’s Name</h3>
                    </div>

                    <div class="rd-box medium-height">
                        <h3>Description Details</h3>
                    </div>

                    <div class="rd-box large-height">
                        <h3>Reviews & Comments</h3>
                    </div>
                </div>

                <div class="details-right-col">

                    <div class="rd-box extra-large-height">
                        <h3>Location</h3>
                    </div>

                    <div class="rd-box medium-height">
                        <h3>Related Reviews</h3>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="optionsMenu" class="options-menu">
        <div class="opt-item" onclick="triggerEditError()">Edit</div>
        <div class="opt-item">Download</div>
        <div class="opt-item">Save</div>
        <div class="opt-item">Share</div>
    </div>

    <div id="errorToast" class="toast-notification">
        Sorry, you don't have permission to do this.
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
        function openContactModal(event) {
            event.preventDefault();
            document.getElementById('contactModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeContactModal() {
            document.getElementById('contactModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        window.onclick = function(event) {
            const contactModal = document.getElementById('contactModal');
            if (event.target === contactModal) {
                closeContactModal();
            }
        }

        function openPlaceModal() {
            document.getElementById('placeDetailModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeModal(event) {
            document.getElementById('placeDetailModal').style.display = 'none';
            document.getElementById('optionsMenu').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function toggleOptionsMenu(event) {
            event.stopPropagation();
            const menu = document.getElementById('optionsMenu');
            menu.style.top = event.clientY + 10 + 'px';
            menu.style.left = event.clientX - 80 + 'px';

            if (menu.style.display === 'block') {
                menu.style.display = 'none';
            } else {
                menu.style.display = 'block';
            }
        }

        function triggerEditError() {
            document.getElementById('optionsMenu').style.display = 'none';
            const toast = document.getElementById('errorToast');
            toast.className = "toast-notification show";
            setTimeout(function() {
                toast.className = toast.className.replace("show", "");
            }, 3000);
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dots-btn-corner') && !event.target.matches('.fa-ellipsis-v')) {
                document.getElementById('optionsMenu').style.display = 'none';
            }
        }

        function scrollHorizontal(btn, direction) {

            const wrapper = btn.closest('.scroll-wrapper-relative');
            const container = wrapper.querySelector('.scroll-container');

            const scrollAmount = 300;

            if (direction === 'left') {
                container.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            } else {
                container.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }
        }

        function toggleSettings(event) {
            event.stopPropagation();
            const popup = document.getElementById('settingsDropdown');
            const accountPopup = document.getElementById('accountPopup');

            if (accountPopup) accountPopup.style.display = 'none';

            if (popup.style.display === 'block') {
                popup.style.display = 'none';
            } else {
                popup.style.display = 'block';
            }
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

        window.addEventListener('click', function(e) {
            const settingsPopup = document.getElementById('settingsDropdown');
            const accountPopup = document.getElementById('accountPopup');
            const btn = document.querySelector('.menu-btn');

            if (settingsPopup && accountPopup) {

                if (!settingsPopup.contains(e.target) &&
                    !accountPopup.contains(e.target) &&
                    (btn && !btn.contains(e.target))) {
                    settingsPopup.style.display = 'none';
                    accountPopup.style.display = 'none';
                }
            }
        });
    </script>

</body>

</html>