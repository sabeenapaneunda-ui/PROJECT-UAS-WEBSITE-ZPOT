<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZPOT Desktop UI</title>

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

    <section class="hero-tagline-section">
        <div class="hero">
            <div class="hero-overlay"></div>

            <div class="hero-content">
                <h1 class="hero-title">Hello, Zpotter!</h1>
                <h2 class="hero-subtitle">Welcome to ZPot: Zero-Bored Picks of Taste.</h2>
                <p class="hero-desc">Discover your next favorite place or brand, and share your unique finds with the community.<br>What's catching your eye today?</p>
            </div>
        </div>
    </section>

    <div class="container">

        <section class="intro-section">
            <div class="intro-grid">
                <div class="intro-item">
                    <h3>Not sure what to try next?</h3>
                    <p>No worries. Tell us the vibes you're into, whether it's cool spots, local brands, or the fashion you're currently obsessed with, and ZPOT will serve recommendations that match your style.</p>
                </div>
                <div class="intro-item">
                    <h3>Wondering what everyone else is into?</h3>
                    <p>Check out what your friends are exploring: new cafes, trending fits, must-try products, or even the ones they totally didn't vibe with. You might find your next favorite.</p>
                </div>
            </div>
        </section>

        <section class="section-padding">
            <div class="section-title">WHAT CAN YOU DO ON ZPOT?</div>

            <div class="feature-grid">

                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="feature-text">
                        <h3>Explore and Save Every Spot You Try</h3>
                        <p>Make ZPOT your place to keep track of everywhere you’ve checked out, from hidden gems to spots that were “fun once but never again.”</p>
                    </div>
                </div>

                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="feature-text">
                        <h3>Rate the vibes, not just the place</h3>
                        <p>It’s more than numbers. Rate the vibe, how worth it it felt, or simply answer the classic “would I come back?”</p>
                    </div>
                </div>

                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="feature-text">
                        <h3>Hype the Stuff You Actually Like</h3>
                        <p>Found a brand, café, or outfit that hits just right? Give it some love so it shows up in your personal highlights.</p>
                    </div>
                </div>

                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-pen"></i>
                    </div>
                    <div class="feature-text">
                        <h3>Drop Reviews That Sound Like You</h3>
                        <p>Write reviews your way. Long, short, sarcastic, aesthetic, brutally honest — anything goes. Your friends can follow your taste too.</p>
                    </div>
                </div>

            </div>

        </section>

        <section class="mt-40">
            <section class="section-padding">
                <section class="section-padding">
                    <section class="section-padding">
                        <div class="section-title-row">
                            <h3>Popular Reviews This Week</h3>
                        </div>

                        <div class="scroll-wrapper-relative">

                            <button class="nav-arrow left-arrow" onclick="scrollHorizontal(this, 'left')">
                                <i class="fas fa-chevron-left"></i>
                            </button>

                            <div class="reviews-grid scroll-container">

                                <div class="review-column">
                                    <div class="review-card">
                                        <div class="review-text-content">
                                            <h3>Scarlett's House, Blok M</h3>
                                            <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                            <p>
                                                I had a great experience at Scarlett's House Blok M! The place itself is very nice, with a cozy and comfortable waiting area that makes you feel at home right away. All of the staff were incredibly kind, polite, and helpful.<br>
                                            </p>
                                        </div>
                                        <img src="images/index/scarleeeet.webp" class="review-img" alt="Img">
                                    </div>
                                    <div class="review-card">
                                        <div class="review-text-content">
                                            <h3>Dream Dates, Senopati</h3>
                                            <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                            <p>All the meals were very delicious. Price-wise, it's also quite affordable. The place has a nice ambience, they also provide a spacious and clean musholla on the second floor, which is accessible by lift.</p>
                                        </div>
                                        <img src="images/index/DreamDates_Photo.png" class="review-img" alt="Img">
                                    </div>
                                </div>

                                <div class="review-column">
                                    <div class="review-card">
                                        <div class="review-text-content">
                                            <h3>BSD Xtreme Park</h3>
                                            <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                            <p>Tempat bagus untuk membawa anak latihan fisik, keberanian, fokus dan bermain. Dapat juga untuk bersantai bersama keluarga dan teman-teman karena banyak sekali arena bermain, berkumpul, dan berolahraga.</p>
                                        </div>
                                        <img src="images/index/bsd xtreme park.jpg" class="review-img" alt="Img">
                                    </div>
                                    <div class="review-card">
                                        <div class="review-text-content">
                                            <h3>Urban Forest Cipete</h3>
                                            <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                            <p>Been so curious with this park and decided to visit after work, just 2 minutes walk from MRT Cipete Tuku Station. The area is very clean, quiet and well maintained. You can easily grab food or drinks around the area. Worth visit if you need some fresh air around Jakarta.</p>
                                        </div>
                                        <img src="images/index/urban forest.jpeg" class="review-img" alt="Img">
                                    </div>
                                </div>

                                <div class="review-column">
                                    <div class="review-card">
                                        <div class="review-text-content">
                                            <h3>Sentosa, Senayan</h3>
                                            <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                            <p>The food is delicious and well-prepared, with flavors that feel balanced and satisfying. The menu has a good variety of local and Asian-inspired dishes, making it easy to find something that suits everyone’s taste.</p>
                                        </div>
                                        <img src="images/index/Sentosa-Senayan.webp" class="review-img" alt="Img">
                                    </div>
                                    <div class="review-card">
                                        <div class="review-text-content">
                                            <h3>Bakoel Koffie, Cikini</h3>
                                            <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                            <p>Tempat ngopi favorit di daerah Cikini. Katanya salah satu kedai kopi tertua di Jakarta. Yang bikin nyaman disini karna kopinya yang enak bisa bertahan dari Tahun 1878, ditambah dengan suasananya yang vintage menambah kesan historis tersendiri jika berada disini.</p>
                                        </div>
                                        <img src="images/index/bakoelkoffie.webp" class="review-img" alt="Img">
                                    </div>
                                </div>

                            </div>

                            <button class="nav-arrow right-arrow" onclick="scrollHorizontal(this, 'right')">
                                <i class="fas fa-chevron-right"></i>
                            </button>

                        </div>
                    </section>
                </section>

                <section class="mt-40">

                    <section class="section-padding">
                        <section class="section-padding">
                            <div class="section-title-row">
                                <h3>Most Visit Place This Week</h3>
                            </div>

                            <div class="scroll-wrapper-relative">

                                <button class="nav-arrow left-arrow" onclick="scrollHorizontal(this, 'left')">
                                    <i class="fas fa-chevron-left"></i>
                                </button>

                                <div class="places-grid scroll-container">

                                    <div class="mv-place-card" onclick="openPlaceModal()">
                                        <img src="images/index/kopitagram kuningan.jpg" class="mv-place-img" alt="Kopitagram">
                                        <div class="mv-place-name">Kopitagram Centang Biru, Kuningan</div>
                                    </div>

                                    <div class="mv-place-card" onclick="openPlaceModal()">
                                        <img src="images/index/superpark pim.jpg" class="mv-place-img" alt="Superpark">
                                        <div class="mv-place-name">Superpark, Pondok Indah Mall</div>
                                    </div>

                                    <div class="mv-place-card" onclick="openPlaceModal()">
                                        <img src="images/index/maiku cafe.jpg" class="mv-place-img" alt="Maiku Cafe">
                                        <div class="mv-place-name">Maiku Cafe, Blok M</div>
                                    </div>

                                    <div class="mv-place-card" onclick="openPlaceModal()">
                                        <img src="images/index/tanatap.jpg" class="mv-place-img" alt="Tanatap">
                                        <div class="mv-place-name">Tanatap Coffee, Ampera</div>
                                    </div>

                                </div>

                                <button class="nav-arrow right-arrow" onclick="scrollHorizontal(this, 'right')">
                                    <i class="fas fa-chevron-right"></i>
                                </button>

                            </div>
                        </section>

                        <section class="section-padding" style="margin-bottom: 40px;">
                            <div class="section-title-row">
                                <h3>Recent News</h3>
                            </div>

                            <div class="marquee-wrapper">

                                <div class="news-track" id="newsTrack">

                                    <div class="news-item">
                                        <a href="https://rri.co.id/en/entertainment/2003150/the-rise-of-sustainable-fashion-in-indonesia-s-textile-industry?" target="_blank" class="news-link">
                                            <img src="images/index/news sustainable.jpeg" class="news-img" alt="News 1">
                                            <div class="news-text">
                                                <h4>The Rise of Sustainable Fashion</h4>
                                                <p>Sustainable style makin meningkat di Indonesia.</p>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="news-item">
                                        <a href="https://en.antaranews.com/news/382645/indonesias-fashion-industry-keeps-growing-driving-economy-ministry?" target="_blank" class="news-link">
                                            <img src="images/index/news keeps growing.webp" class="news-img" alt="News 2">
                                            <div class="news-text">
                                                <h4>Indonesia Fashion Industry</h4>
                                                <p>Industri fashion Indonesia terus menunjukkan pertumbuhan positif.</p>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="news-item">
                                        <a href="https://en.antaranews.com/news/346681/indonesian-govt-pushes-fashion-designers-to-expand-market-reach?" target="_blank" class="news-link">
                                            <img src="images/index/news ekspor.webp" class="news-img" alt="News 3">
                                            <div class="news-text">
                                                <h4>Indonesia Goes Global</h4>
                                                <p>Sektor modest fashion Indonesia makin bersinar di pasar global.</p>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="news-item">
                                        <a href="https://www.antaranews.com/berita/5137033/idfes-2025-dorong-era-next-gen-fashion-melalui-inovasi-dan-integrasi?" target="_blank" class="news-link">
                                            <img src="images/index/news IFES.webp" class="news-img" alt="News 4">
                                            <div class="news-text">
                                                <h4>Ecosystem Summit 2025</h4>
                                                <p>IDFES 2025 mendorong era Next Gen Fashion melalui inovasi.</p>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="news-item">
                                        <a href="https://link-berita-local.com" target="_blank" class="news-link">
                                            <img src="images/index/Rectangle 140.png" class="news-img" alt="News 5">
                                            <div class="news-text">
                                                <h4>Jakarta X Beauty 2025</h4>
                                                <p>Brand lokal semakin diminati pasar internasional.</p>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </section>

    </div>
    <footer>
        <div class="footer-container">
            <img src="images/index/logo-z.png" alt="Logo" class="footer-img">
            <p class="copyright-text">
                &copy; 2025 Zero-Bored Picks of Taste, Inc. All Rights Reserved.
            </p>
        </div>
    </footer>

    <a href="upload.php" class="floating-upload-btn">
        <i class="fas fa-plus"></i>
    </a>

    <div id="authModal" class="auth-overlay" style="display: <?php echo (isset($_SESSION['status']) && $_SESSION['status'] == 'login') ? 'none' : 'flex'; ?>;">
        <div class="auth-card">

            <div class="auth-left">
                <img src="images/index/LOGO ZPOT.png" alt="Zpot Art" class="auth-art-img">
            </div>

            <div class="auth-right">

                <div id="authWelcome" class="auth-content">
                    <h1>Welcome back,</h1>
                    <p style="margin-bottom: 20px;">Your world of places, fashion, and lifestyle is waiting!</p>

                    <div class="auth-form-scroll" style="overflow: hidden;">

                        <form action="login_process.php" method="POST">
                            <label>username</label>
                            <input type="text" name="username_login" class="auth-input" required>

                            <label>password</label>
                            <input type="password" name="password_login" class="auth-input" required>

                            <div class="checkbox-row" style="justify-content: space-between;">
                                <div style="display:flex; gap:5px; align-items:center;">
                                    <input type="checkbox" id="remember">
                                    <label for="remember" style="margin:0; font-weight:normal;">remember me</label>
                                </div>
                                <a href="#" style="font-size: 12px; font-weight:700; color:#4A3B2A;">forgot password?</a>
                            </div>

                            <button type="submit" name="login" class="auth-btn btn-light" style="margin-top: 20px;">sign in</button>
                        </form>

                        <div style="text-align: center; margin-top: 10px; font-size: 12px;">
                            Don't have an account?
                            <span onclick="showSignUp()" style="cursor:pointer; font-weight:bold; text-decoration:underline;">Sign Up</span>
                        </div>

                    </div>
                </div>

                <div id="authSignUp" class="auth-content" style="display: none;">

                    <div class="back-circle" onclick="showWelcome()">
                        <i class="fas fa-chevron-left"></i>
                    </div>

                    <h2 style="margin-top: 10px;">Create your own space</h2>
                    <p class="sub-text">to explore places, express your style, and follow the vibes that feel like you!</p>

                    <form action="register_process.php" method="POST" class="auth-form-scroll">

                        <label>full name</label>
                        <input type="text" name="fullname" class="auth-input" required>

                        <label>username</label>
                        <input type="text" name="username" class="auth-input" required>

                        <label>email</label>
                        <input type="email" name="email" class="auth-input" required>

                        <label>password</label>
                        <input type="password" name="password" class="auth-input" required>

                        <label>confirm password</label>
                        <input type="password" name="confirm_password" class="auth-input" required>

                        <div class="checkbox-row">
                            <input type="checkbox" id="signup-terms" required>
                            <label for="signup-terms" style="margin:0; font-size: 12px; font-weight: normal;">i agree to the terms & conditions</label>
                        </div>

                        <button type="submit" name="register" class="auth-btn btn-dark" style="margin-top: 20px;">sign up</button>

                    </form>
                </div>

            </div>
        </div>
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
        window.addEventListener('load', function() {
            var modal = document.getElementById('authModal');
            if (modal.style.display === 'none') {
                document.body.style.overflow = 'auto';
            } else {
                document.body.style.overflow = 'hidden';
            }
            const newsTrack = document.getElementById('newsTrack');
            if (newsTrack) {
                newsTrack.innerHTML += newsTrack.innerHTML;
            }
        });

        function showSignUp() {
            document.getElementById('authWelcome').style.display = 'none';
            document.getElementById('authSignUp').style.display = 'block';
        }

        function showWelcome() {
            document.getElementById('authSignUp').style.display = 'none';
            document.getElementById('authWelcome').style.display = 'block';
        }

        function scrollHorizontal(btn, direction) {
            const wrapper = btn.closest('.scroll-wrapper-relative');
            const container = wrapper.querySelector('.scroll-container');
            const scrollAmount = 350;

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

            // Tutup account popup jika terbuka
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

        function openContactModal(event) {
            event.preventDefault();
            document.getElementById('contactModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeContactModal() {
            document.getElementById('contactModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function openPlaceModal() {
            if (document.getElementById('placeDetailModal')) {
                document.getElementById('placeDetailModal').style.display = 'flex';
                document.body.style.overflow = 'hidden';
            }
        }

        function closeModal(event) {
            if (document.getElementById('placeDetailModal')) {
                document.getElementById('placeDetailModal').style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        }

        window.addEventListener('click', function(e) {
            const settingsPopup = document.getElementById('settingsDropdown');
            const accountPopup = document.getElementById('accountPopup');
            const contactModal = document.getElementById('contactModal');
            const btn = document.querySelector('.menu-btn');

            if (settingsPopup && accountPopup) {
                if (!settingsPopup.contains(e.target) &&
                    !accountPopup.contains(e.target) &&
                    !btn.contains(e.target)) {

                    settingsPopup.style.display = 'none';
                    accountPopup.style.display = 'none';
                }
            }

            if (e.target === contactModal) {
                closeContactModal();
            }

            const placeModal = document.getElementById('placeDetailModal');
            if (placeModal && e.target === placeModal) {
                closeModal();
            }
        });
    </script>

</body>

</html>