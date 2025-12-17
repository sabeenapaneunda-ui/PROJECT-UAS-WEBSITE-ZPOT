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
    <title>ZPOT - Trending</title>
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

        <div class="trending-page-wrapper" style="margin-top: 40px; margin-bottom: 20px;">
            <div class="big-search-bar">
                <a href="search.php" style="text-decoration: none; display: flex; align-items: center;">
                    <i class="fas fa-search search-icon-inside"></i>
                </a>

                <div class="search-tag-pill">
                    <i class="fas fa-fire-alt"></i> <span>Trending</span>
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
                <h3>Beauty & Skincare (Fandom & Event Hype)</h3>

            </div>

            <div class="scroll-wrapper-relative">

                <button class="nav-arrow left-arrow" onclick="scrollHorizontal(this, 'left')">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <div class="scroll-container">

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-trending/jxb.jpeg" class="place-thumb-img" alt="JXB">
                        <div class="place-info">
                            <h4>Jakarta X Beauty (JXB)</h4>
                            <div class="addr">Jakarta Convention Center (JCC)</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-trending/ohbeauty.jpg" class="place-thumb-img" alt="OhBeautyFestival">
                        <div class="place-info">
                            <h4>OhBeautyFestival</h4>
                            <div class="addr">Jakarta Selatan Blok M</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-trending/tiktokbeuty fest.jpg" class="place-thumb-img" alt="TikTok Beauty Fest">
                        <div class="place-info">
                            <h4>TikTok Beauty Fest</h4>
                            <div class="addr">Pondok Indah Mall (PIM) 3, Jakarta</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-trending/kbeautyfest.png" class="place-thumb-img" alt="K-Beauty Fest">
                        <div class="place-info">
                            <h4>K-Beauty Fest</h4>
                            <div class="addr">Laguna Atrium, Central Park Mall Jakarta</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-trending/bxb.jpeg" class="place-thumb-img" alt="Bandung X Beauty">
                        <div class="place-info">
                            <h4>Bandung X Beauty</h4>
                            <div class="addr">Trans Grand Ballroom & Convention Centre, Bandung</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                </div>

                <button class="nav-arrow right-arrow" onclick="scrollHorizontal(this, 'right')">
                    <i class="fas fa-chevron-right"></i>
                </button>

            </div>
        </div>
        <div class="horizontal-section">
            <div class="h-section-header">
                <h3>WELLNESS & FIT</h3>

            </div>

            <div class="scroll-wrapper-relative">

                <button class="nav-arrow left-arrow" onclick="scrollHorizontal(this, 'left')">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <div class="scroll-container">

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-trending/pretty little.jpeg" class="place-thumb-img" alt="Pretty Little Padel">
                        <div class="place-info">
                            <h4>Pretty Little Padel</h4>
                            <div class="addr">Jakarta Convention Center (JCC)</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-trending/mrdiyrunning.webp" class="place-thumb-img" alt="MrDiy Running">
                        <div class="place-info">
                            <h4>MrDiy Running 2025</h4>
                            <div class="addr">Taman Mini Indonesia Indah</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-trending/sociollarunning.jpeg" class="place-thumb-img" alt="Sociolla Running">
                        <div class="place-info">
                            <h4>Sociolla Running 2025</h4>
                            <div class="addr">Pondok Indah Mall (PIM) 3, Jakarta</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-trending/padelwars.jpeg" class="place-thumb-img" alt="Padel Wars">
                        <div class="place-info">
                            <h4>Padel Wars 2025</h4>
                            <div class="addr">Mahaka Square, Kelapa Gading</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-trending/AMRun.jpeg" class="place-thumb-img" alt="AMR Run">
                        <div class="place-info">
                            <h4>AMR Run 2025</h4>
                            <div class="addr">Taman Mini Indonesia Indah (TMII), Jakarta</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                </div>

                <button class="nav-arrow right-arrow" onclick="scrollHorizontal(this, 'right')">
                    <i class="fas fa-chevron-right"></i>
                </button>

            </div>
        </div>

        <div class="horizontal-section">
            <div class="h-section-header">
                <h3>SOUNDSCAPE</h3>

            </div>

            <div class="scroll-wrapper-relative">

                <button class="nav-arrow left-arrow" onclick="scrollHorizontal(this, 'left')">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <div class="scroll-container">

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-trending/tsp.webp" class="place-thumb-img" alt="Sounds Project">
                        <div class="place-info">
                            <h4>Sounds Project 2025</h4>
                            <div class="addr">Ecovention & Ecopark Ancol, Jakarta</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-trending/sync.jpg" class="place-thumb-img" alt="Synchronize Fest">
                        <div class="place-info">
                            <h4>Synchronize Fest 2025</h4>
                            <div class="addr">Gambir Expo, Kemayoran, Jakarta</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-trending/mamamia.jpg" class="place-thumb-img" alt="Mamma Mia">
                        <div class="place-info">
                            <h4>Mamma Mia! The Musical</h4>
                            <div class="addr">Graha Bhakti Budaya, Taman Ismail Marzuki (TIM)</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-trending/blackpink.jpg" class="place-thumb-img" alt="BLACKPINK">
                        <div class="place-info">
                            <h4>BLACKPINK WORLD TOUR</h4>
                            <div class="addr">Stadion Utama Gelora Bung Karno (GBK), Jakarta Pusat</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-trending/seventeen.jpg" class="place-thumb-img" alt="SEVENTEEN">
                        <div class="place-info">
                            <h4>SEVENTEEN [RIGHT HERE]</h4>
                            <div class="addr">Jakarta International Stadium (JIS)</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                </div>

                <button class="nav-arrow right-arrow" onclick="scrollHorizontal(this, 'right')">
                    <i class="fas fa-chevron-right"></i>
                </button>

            </div>
        </div>


        <div style="height: 50px;"></div>

    </div>

    <div id="placeDetailModal" class="modal-overlay" onclick="closeModal(event)">
        <div class="modal-content-large" onclick="event.stopPropagation()">

            <div class="modal-close-btn" onclick="closeModal(event)">
                <i class="fas fa-times"></i>
            </div>

            <h2 class="modal-page-title">Event Review Details</h2>

            <div class="review-details-grid">

                <div class="details-left-col">

                    <div class="tanatap-photo-grid">
                        <div class="grid-item main-pic">
                            <img src="images/seventen/svtrh jakarta.jpg" alt="Seventeen Main">
                        </div>
                        <div class="grid-item top-right">
                            <img src="images/seventen/svtrh.jpg" alt="Crowd Red">
                        </div>
                        <div class="grid-item mid-right">
                            <img src="images/seventen/svt jis.jpg" alt="Stage Vertical">
                        </div>
                        <div class="grid-item bottom-left">
                            <img src="images/seventen/svtrh (1).jpg" alt="Stage Pink">
                        </div>
                        <div class="grid-item bottom-mid">
                            <img src="images/seventen/svt.jpg" alt="Members">
                        </div>
                    </div>

                    <div class="tanatap-info-box">
                        <div class="info-text-col" style="width: 100%;">
                            <h1 style="font-size: 20px; margin-bottom: 10px;">SEVENTEEN [RIGHT HERE] IN JAKARTA</h1>

                            <div class="info-row">
                                <i class="far fa-calendar-alt" style="color: #5E2C0E;"></i>
                                <span style="font-weight: 700;">Sunday 9 February 2025 - Monday 10 February 2025</span>
                            </div>

                            <div class="info-row">
                                <i class="fas fa-map-marker-alt" style="color: #5E2C0E;"></i>
                                <span>Jakarta International Stadium</span>
                            </div>
                        </div>
                    </div>

                    <div class="rd-box description-box">
                        <h3>Description Details</h3>
                        <p>An unforgettable night at Jakarta International Stadium where SEVENTEEN lit up the city with powerful performances, playful moments, and stunning visuals. From the opening stage to the very last goodbye, the whole stadium was filled with cheers, chants, and rose quartz serenity lightsticks waving in sync. Each member shared warm messages that made the night feel personal and close to the fans. A truly special "Right Here" moment in Jakarta that Carats will hold onto for a long time.</p>
                    </div>

                    <div class="rd-box reviews-box">
                        <h3>Reviews & Comments</h3>

                        <div class="best-comment" style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid rgba(0,0,0,0.1);">
                            <div class="comment-user">
                                <i class="fas fa-user-circle"></i>
                                <span>@gyuwkaku</span>
                            </div>
                            <div class="stars-mini" style="color:#FFC800; font-size:10px; margin:2px 0;">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p style="font-size:12px;">"WHAT AN INCREDIBLE NIGHT!! it feels like a dream come true T_____T genuinely happy and relievedddddd. my 2019 self wouldnt believe that my 2025 self have met them irl!! till our stars align again, SEVENTEEN!"</p>
                        </div>

                        <div class="best-comment" style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid rgba(0,0,0,0.1);">
                            <div class="comment-user">
                                <i class="fas fa-user-circle"></i>
                                <span>@kidvlts</span>
                            </div>
                            <div class="stars-mini" style="color:#FFC800; font-size:10px; margin:2px 0;">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p style="font-size:12px;">"I MET SEVENTEEEEEEEEEEN!! LIFE IS WORTH LIVING AGAAAAAAAAIN!!"</p>
                        </div>

                        <div class="best-comment" style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid rgba(0,0,0,0.1);">
                            <div class="comment-user">
                                <i class="fas fa-user-circle"></i>
                                <span>@dinoarsi</span>
                            </div>
                            <div class="stars-mini" style="color:#FFC800; font-size:10px; margin:2px 0;">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p style="font-size:12px;">"GAMAU PULANG MAUNYA DIGOYANG!! AJU NICE LAGI SAMPE SUBUH PLEASE"</p>
                        </div>

                        <div class="best-comment">
                            <div class="comment-user">
                                <i class="fas fa-user-circle"></i>
                                <span>@kwanmicano</span>
                            </div>
                            <div class="stars-mini" style="color:#FFC800; font-size:10px; margin:2px 0;">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p style="font-size:12px;">"halo.... boleh diulang gak ya konser nya... soalnya sepanjang konser nangis..."</p>
                        </div>

                    </div>

                </div>

                <div class="details-right-col">

                    <div class="rd-box location-box">
                        <h3>Location</h3>
                        <a href="https://share.google/CI1ucVQe7hGys9g2j" target="_blank" class="map-link-wrapper">
                            <img src="images/seventen/image 5.png" alt="Map Location" class="map-img">
                        </a>
                        <div class="map-address-text">
                            Papanggo, Tanjung Priok, North Jakarta<br>City, Jakarta
                        </div>
                    </div>

                    <div class="rd-box related-reviews-box" style="height: auto; min-height: 400px;">
                        <h3>Related Reviews</h3>

                        <div class="rel-review-item">
                            <div class="rel-head">@janerubyjane</div>
                            <div class="rel-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                            <div class="rel-sub" style="font-size:10px;">Also Reviewed : <b>BLACKPINK WORLD TOUR</b></div>
                            <p>"MEGAAAAAAAH!! seneng banget jennie mood nya bagus di jakarta jadi dia semangat. menurutku di gbk udah oke banget!! crew dan crowd control nya juga oke bangeeet!! pr nya cuma di pulangnya aja sih emang penuh..."</p>
                            <div class="rel-date">5 days ago</div>
                        </div>

                        <div class="rel-review-item">
                            <div class="rel-head">@abbachild</div>
                            <div class="rel-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                            <div class="rel-sub" style="font-size:10px;">Also Reviewed : <b>Mamma Mia Musical Re-Run!</b></div>
                            <p>"MERINDINGGGGGGGGGGGG!!! i feel like im dreaminggg during the show.... mau lagi mau lagi mau lagi.... finally got the chance to attend Sophie's wedding!"</p>
                            <div class="rel-date">5 days ago</div>
                        </div>

                        <div class="rel-review-item">
                            <div class="rel-head">@abincantikbanget</div>
                            <div class="rel-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                            <div class="rel-sub" style="font-size:10px;">Also Reviewed : <b>Sounds Project 2025</b></div>
                            <p>"SERU BANGEEEETTT!! banyak artisnyaaaa. makanannya enaakk. venue nya nyamaaann. banyak artis terkenaaal. jadi tempat untuk temu kangen sama temen LDR"</p>
                            <div class="rel-date">5 days ago</div>
                        </div>

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