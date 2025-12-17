<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header(header: "location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZPOT - Places</title>
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
                <h3>Coffee Shop</h3>

            </div>
            <div class="scroll-wrapper-relative">
                <button class="nav-arrow left-arrow" onclick="scrollHorizontal(this, 'left')">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="scroll-container">

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-places/tanatap.jpg" class="place-thumb-img" alt="Tanatap">
                        <div class="place-info">
                            <h4>Tanatap Coffee Ampera</h4>
                            <div class="addr">Jl. Ampera Raya No.129, Ragunan, Ps. Minggu, Jakarta Selatan</div>
                            <div class="by">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-places/bakedkemang.webp" class="place-thumb-img" alt="Baked">
                        <div class="place-info">
                            <h4>Baked Kemang</h4>
                            <div class="addr">Jl. Kemang Utara No. 39a, Bangka, Mampang Prapatan, Jaksel</div>
                            <div class="by">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-places/littletalkcoffee.jpg" class="place-thumb-img" alt="Little Talk">
                        <div class="place-info">
                            <h4>Little Talk Coffee</h4>
                            <div class="addr">Insitu, Bumiwedari, Vida Bekasi, Bantar Gebang, Kota Bekasi</div>
                            <div class="by">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-places/simetricoffee.jpg" class="place-thumb-img" alt="Simetri">
                        <div class="place-info">
                            <h4>Simetri Coffee Roasters</h4>
                            <div class="addr">Jalan Bulevar Bekasi CBD, Marga Mulya, Bekasi Utara</div>
                            <div class="by">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-places/matteasocialspace.jpg" class="place-thumb-img" alt="Mattea">
                        <div class="place-info">
                            <h4>Mattea Social Space</h4>
                            <div class="addr">Jalan Raya Pekayon No.10, Pekayon Jaya, Bekasi Selatan</div>
                            <div class="by">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-places/authenticcoffe.webp" class="place-thumb-img" alt="Authentic">
                        <div class="place-info">
                            <h4>Authentic Coffee</h4>
                            <div class="addr">Jl. Pluit Permai No. 26, Pluit, Penjaringan, Jakarta Utara</div>
                            <div class="by">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-places/scarlettscafe.webp" class="place-thumb-img" alt="Scarlett">
                        <div class="place-info">
                            <h4>Scarlett's Cafe</h4>
                            <div class="addr">Ruko Golf Island, Blok L No. 31, Pantai Indah Kapuk</div>
                            <div class="by">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-places/bakoelkoffie.webp" class="place-thumb-img" alt="Bakoel">
                        <div class="place-info">
                            <h4>Bakoel Koffie</h4>
                            <div class="addr">Jl. Cikini Raya No. 25, Menteng, Jakarta Pusat</div>
                            <div class="by">More Details</div>
                        </div>
                    </div>
                    <button class="nav-arrow right-arrow" onclick="scrollHorizontal(this, 'right')">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div class="horizontal-section">
                <div class="h-section-header">
                    <h3>Photo Spots</h3>

                </div>

                <div class="scroll-wrapper-relative">

                    <button class="nav-arrow left-arrow" onclick="scrollHorizontal(this, 'left')">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    <div class="scroll-container">

                        <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                            <img src="images/search-places/hutankota.webp" class="place-thumb-img" alt="Hutan Kota GBK">
                            <div class="place-info">
                                <h4>Hutan Kota GBK</h4>
                                <div class="addr">Jl. Jenderal Sudirman, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat</div>
                                <div class="by" style="text-decoration: underline;">More Details</div>
                            </div>
                        </div>

                        <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                            <img src="images/search-places/ashta.jpg" class="place-thumb-img" alt="Ashta District 8">
                            <div class="place-info">
                                <h4>Ashta District 8</h4>
                                <div class="addr">Jalan Jenderal Sudirman Kav. 52-53, SCBD, Jakarta Selatan</div>
                                <div class="by" style="text-decoration: underline;">More Details</div>
                            </div>
                        </div>

                        <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                            <img src="images/search-places/sentosasenayan.webp" class="place-thumb-img" alt="Sentosa Senayan">
                            <div class="place-info">
                                <h4>Sentosa Senayan</h4>
                                <div class="addr">Rooftop Gedung Parkir Elevated A, Kompleks Gelora Bung Karno (GBK)</div>
                                <div class="by" style="text-decoration: underline;">More Details</div>
                            </div>
                        </div>

                        <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                            <img src="images/search-places/chillax.webp" class="place-thumb-img" alt="Chillax Sudirman">
                            <div class="place-info">
                                <h4>Chillax Sudirman</h4>
                                <div class="addr">Jl. Jenderal Sudirman, Kuningan, Karet Kuningan, Kecamatan Setiabudi</div>
                                <div class="by" style="text-decoration: underline;">More Details</div>
                            </div>
                        </div>

                        <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                            <img src="images/search-places/plazasenayan.webp" class="place-thumb-img" alt="Plaza Senayan">
                            <div class="place-info">
                                <h4>Plaza Senayan</h4>
                                <div class="addr">Jl. Asia Afrika No.8, Gelora, Kecamatan Tanah Abang, Jakarta Pusat</div>
                                <div class="by" style="text-decoration: underline;">More Details</div>
                            </div>
                        </div>

                        <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                            <img src="images/search-places/Taman-Ismail-Marzuki.webp" class="place-thumb-img" alt="Taman Ismail Marzuki">
                            <div class="place-info">
                                <h4>Taman Ismail Marzuki</h4>
                                <div class="addr">Jl. Cikini Raya No.73, Cikini, Kec. Menteng, Kota Jakarta Pusat</div>
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
                    <h3>Hidden gems</h3>

                </div>

                <div class="scroll-wrapper-relative">

                    <button class="nav-arrow left-arrow" onclick="scrollHorizontal(this, 'left')">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    <div class="scroll-container">

                        <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                            <img src="images/search-places/rumahakar.jpg" class="place-thumb-img" alt="Rumah Akar">
                            <div class="place-info">
                                <h4>Rumah Akar Batavia</h4>
                                <div class="addr">Jalan Kali Besar Timur, di belakang Museum Wayang, Tamansari, Jakarta Barat</div>
                                <div class="by" style="text-decoration: underline;">More Details</div>
                            </div>
                        </div>

                        <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                            <img src="images/search-places/kampoenggallery.jpeg" class="place-thumb-img" alt="Kampoeng Gallery">
                            <div class="place-info">
                                <h4>Kampoeng Gallery</h4>
                                <div class="addr">jalan Masjid Al Huda No. 1, Kebayoran Lama Utara, Jakarta Selatan</div>
                                <div class="by" style="text-decoration: underline;">More Details</div>
                            </div>
                        </div>

                        <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                            <img src="images/search-places/stonegarden.jpeg" class="place-thumb-img" alt="Stone Garden">
                            <div class="place-info">
                                <h4>Stone Garden Citatah</h4>
                                <div class="addr">Gunung Masigit, Citatah, Kec. Cipatat, Kabupaten Bandung Barat, Jawa Barat 40554</div>
                                <div class="by" style="text-decoration: underline;">More Details</div>
                            </div>
                        </div>

                        <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                            <img src="images/search-places/selasar.webp" class="place-thumb-img" alt="Selasar Sunaryo">
                            <div class="place-info">
                                <h4>Selasar Sunaryo</h4>
                                <div class="addr">Jl. Bukit Pakar Timur No.100, Ciburial, Kec. Cimenyan, Kabupaten Bandung, Jawa Barat 40198</div>
                                <div class="by" style="text-decoration: underline;">More Details</div>
                            </div>
                        </div>

                        <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                            <img src="images/search-places/curug.jpeg" class="place-thumb-img" alt="Sungai Cikahuripan">
                            <div class="place-info">
                                <h4>Sungai Cikahuripan</h4>
                                <div class="addr">Kampung Panyusupan, Desa Baranangsiang, Kecamatan Cipongkor, Kabupaten Bandung Barat, Jawa Barat</div>
                                <div class="by" style="text-decoration: underline;">More Details</div>
                            </div>
                        </div>

                    </div>

                    <button class="nav-arrow right-arrow" onclick="scrollHorizontal(this, 'right')">
                        <i class="fas fa-chevron-right"></i>
                    </button>

                </div>
            </div>

        </div>
        <div class="horizontal-section">
            <div class="h-section-header">
                <h3>Hangout places</h3>

            </div>

            <div class="scroll-wrapper-relative">

                <button class="nav-arrow left-arrow" onclick="scrollHorizontal(this, 'left')">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <div class="scroll-container">

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-places/vs.webp" class="place-thumb-img" alt="VS Thrillix">
                        <div class="place-info">
                            <h4>VS Thrillix</h4>
                            <div class="addr">AEON Mall, 2nd Floor, Tj. Bar., Kec. Jagakarsa, Kota Jakarta Selatan</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-places/hangoutplace.jpeg" class="place-thumb-img" alt="Hangout Place Bekasi">
                        <div class="place-info">
                            <h4>Hangout Place Bekasi</h4>
                            <div class="addr">Blk. AA 12, Jl. Celebration Boulevard Jl. Grand Wisata No.96, Lambangsari, Bekasi</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-places/kevstation.jpeg" class="place-thumb-img" alt="Kev Station Depok">
                        <div class="place-info">
                            <h4>Kev Station Depok</h4>
                            <div class="addr">Jl. Raya Citayam No.25C & 25B, Pancoran Mas, Kota Depok, Jawa Barat 16431</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-places/Wonder_Universe (1).webp" class="place-thumb-img" alt="Wonder Universe">
                        <div class="place-info">
                            <h4>Wonder Universe </h4>
                            <div class="addr">Living World Alam Sutera, Jl. Alam Sutera Boulevard No.Kav. 21 Lantai 2, Pakulonan, Serpong Utara, South Tangerang City, Banten 15325</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-places/playtopia.webp" class="place-thumb-img" alt="Playtopia Sport">
                        <div class="place-info">
                            <h4>Playtopia Sport</h4>
                            <div class="addr">Jl. Puri Indah Raya, RT.3/RW.2, Kembangan Sel., Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11610</div>
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
                <h3>Dinner & Fine Dining</h3>

            </div>

            <div class="scroll-wrapper-relative">

                <button class="nav-arrow left-arrow" onclick="scrollHorizontal(this, 'left')">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <div class="scroll-container">

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-places/TOMA.webp" class="place-thumb-img" alt="TOMA Brasserie">
                        <div class="place-info">
                            <h4>TOMA Brasserie</h4>
                            <div class="addr">Jl. Jenderal Sudirman No.Kav 22-23, Kuningan, Karet, Setiabudi, Jakarta Selatan</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-places/alcienda.jpeg" class="place-thumb-img" alt="La Alcienda">
                        <div class="place-info">
                            <h4>La Alcienda</h4>
                            <div class="addr">Bintaro Jaya, Jl. Cemp. Raya No.8 Sektor 2, Rengas, Ciputat Tim., Tangerang Selatan</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-places/fourpoints.jpeg" class="place-thumb-img" alt="Four Points Bekasi">
                        <div class="place-info">
                            <h4>Four Points Bekasi</h4>
                            <div class="addr">Jl. Raya Pekayon No.002, Pekayon Jaya, Kec. Bekasi Sel., Kota Bks, Jawa Barat</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-places/djatiseruni.webp" class="place-thumb-img" alt="Djati Seruni Kafe">
                        <div class="place-info">
                            <h4>Djati Seruni Kafe</h4>
                            <div class="addr">Jl. Perumahan Jatijajar No.1 Blok b1, Jatijajar, Kec. Tapos, Kota Depok</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-places/novusgiri.jpg" class="place-thumb-img" alt="Novus Giri Puncak">
                        <div class="place-info">
                            <h4>Novus Giri Puncak</h4>
                            <div class="addr">Jl. Sindanglaya Raya No.180, Sindangjaya, Kec. Cipanas, Kabupaten Cianjur</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-places/blackowl.jpg" class="place-thumb-img" alt="Black Owl">
                        <div class="place-info">
                            <h4>Black Owl</h4>
                            <div class="addr">Golf Island Beach Theme Park, PIK, Kamal Muara, Jakarta Utara</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                </div>

                <button class="nav-arrow right-arrow" onclick="scrollHorizontal(this, 'right')">
                    <i class="fas fa-chevron-right"></i>
                </button>

            </div>
        </div>
    </div>

    <div style="height: 50px;"></div>
    </div>
</body>

</html>
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

                <div class="tanatap-photo-grid">
                    <?php
                    // DAFTAR FOTO (Nanti bisa diganti database)
                    $gallery_images = [
                        'images/tanatap/tanatap1.png',
                        'images/tanatap/tanatap2.png',
                        'images/tanatap/tanatap3.png',
                        'images/tanatap/tanatap4.png',
                        'images/tanatap/tanatap5.png'
                    ];

                    // Mapping Class CSS Grid (Agar posisi besar/kecilnya pas)
                    $grid_classes = ['main-pic', 'top-right', 'mid-right', 'bottom-left', 'bottom-mid'];

                    $i = 0;
                    foreach ($gallery_images as $img) {
                        // Tentukan class posisi berdasarkan urutan
                        $posisi = isset($grid_classes[$i]) ? $grid_classes[$i] : 'mid-right';
                    ?>
                        <div class="grid-item <?php echo $posisi; ?>">
                            <img src="<?php echo $img; ?>" alt="Place Photo">

                            <a href="<?php echo $img; ?>" download class="download-photo-btn" title="Download Photo">
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                    <?php
                        $i++;
                        if ($i >= 5) break; // Stop loop jika sudah 5 foto agar layout tidak rusak
                    }
                    ?>
                </div>

                <div class="tanatap-info-box">
                    <div class="info-text-col">
                        <h1>Tanatap Coffee Ampera</h1>
                        <div class="info-row">
                            <i class="fas fa-phone-alt"></i>
                            <span style="text-decoration: underline;">0812-7419-4789</span>
                        </div>
                        <div class="info-row">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Jl. Ampera Raya No. 123A, Ragunan, Pasar Minggu, Kota Jakarta Selatan, Daerah Khusus</span>
                        </div>
                        <div class="info-row" style="margin-top: 5px;">
                            <span>Ibukota Jakarta 12560</span>
                        </div>
                        <div class="info-row">
                            <i class="fas fa-camera"></i> <span>@tanatapcoffee</span>
                        </div>

                        <div class="hours-row">
                            <span class="label">O'Clock :</span>
                            <div class="hours-list">
                                <span>Weekdays (10.00 - 21.30)</span>
                                <span>Weekend (09.00 - 21.30)</span>
                            </div>
                        </div>
                    </div>

                    <div class="price-range-box">
                        <h4 style="margin-bottom: 10px; color: #5E2C0E;">Price Range</h4>
                        <div class="price-row">
                            <span>Coffee</span>
                            <span>25k - 55k</span>
                        </div>
                        <div class="price-row">
                            <span>Food</span>
                            <span>35k - 85k</span>
                        </div>
                        <div class="price-row" style="margin-top: 10px; border-top: 1px solid #5E2C0E; padding-top: 5px;">
                            <span>avg.spend</span>
                            <span>90k/person</span>
                        </div>
                    </div>
                </div>

                <div class="rd-box description-box">
                    <h3>Description Details</h3>
                    <p>A unique coffee shop with iconic glass block architecture surrounded by green plants. Perfect spot for coffee lovers who appreciate aesthetic vibes and quality brews. Known for their specialty coffee and Instagram-worthy interior design.</p>
                </div>

                <div class="rd-box reviews-box">
                    <h3>Reviews & Comments</h3>

                    <div class="rating-summary">
                        <span class="rating-score">4.7 out of 5</span>
                        <span class="rating-count">• 234 reviews</span>
                    </div>

                    <div class="rating-bars">
                        <div class="bar-row">
                            <span>5</span>
                            <div class="bar-track">
                                <div class="bar-fill" style="width: 80%;"></div>
                            </div>
                            <span>156</span>
                        </div>
                        <div class="bar-row">
                            <span>4</span>
                            <div class="bar-track">
                                <div class="bar-fill" style="width: 40%;"></div>
                            </div>
                            <span>58</span>
                        </div>
                        <div class="bar-row">
                            <span>3</span>
                            <div class="bar-track">
                                <div class="bar-fill" style="width: 15%;"></div>
                            </div>
                            <span>15</span>
                        </div>
                        <div class="bar-row">
                            <span>2</span>
                            <div class="bar-track">
                                <div class="bar-fill" style="width: 5%;"></div>
                            </div>
                            <span>3</span>
                        </div>
                        <div class="bar-row">
                            <span>1</span>
                            <div class="bar-track">
                                <div class="bar-fill" style="width: 2%;"></div>
                            </div>
                            <span>2</span>
                        </div>
                    </div>

                    <div class="best-comment">
                        <h4>Best Comments</h4>
                        <div class="comment-user">
                            <i class="fas fa-user-circle"></i>
                            <span>@chintya_az</span>
                        </div>
                        <div class="stars-mini"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <p>"Having my first date here. I totally love the atmosphere. Went to the place on Monday afternoon, the place was not as crowded as it usually was. Either outdoor or indoor was cozy."</p>
                    </div>
                </div>

            </div>

            <div class="details-right-col">

                <div class="rd-box location-box">
                    <h3>Location</h3>

                    <a href="https://maps.app.goo.gl/CRiDYwPUyiErWTUm9" target="_blank" class="map-link-wrapper">
                        <img src="images/maps/tanatap.png" alt="Map Location" class="map-img">
                    </a>

                    <div class="map-address-text">
                        Jl. Ampera Raya No. 123A Ragunan, Pasar Minggu<br>Jakarta Selatan 12560
                    </div>
                </div>

                <div class="rd-box related-reviews-box">
                    <h3>Related Reviews</h3>

                    <div class="rel-review-item">
                        <div class="rel-head">@salsabilaputri</div>
                        <div class="rel-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <div class="rel-sub">Also Reviewed : <b>Mattea Social Space</b></div>
                        <p>"Tempat sih enak buat hangout. Kuah Tumyum enak, cman seafood nya berasa agak fresh..."</p>
                        <div class="rel-date">5 days ago</div>
                    </div>

                    <div class="rel-review-item">
                        <div class="rel-head">@rizkyfebrian</div>
                        <div class="rel-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <div class="rel-sub">Also Reviewed : <b>Scarlett's House</b></div>
                        <p>"Karena jalan depan renov jd agak PR ya ke sini. Tapi wow! Dibanding PIK..."</p>
                        <div class="rel-date">2 days ago</div>
                    </div>

                    <div class="rel-review-item">
                        <div class="rel-head">@dimasaditya</div>
                        <div class="rel-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <div class="rel-sub">Also Reviewed : <b>Mattea Social Space</b></div>
                        <p>"Tempat sih enak buat hangout. Kuah Tumyum enak..."</p>
                        <div class="rel-date">5 days ago</div>
                    </div>

                    <div class="rel-review-item">
                        <div class="rel-head">@gemafajar</div>
                        <div class="rel-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <div class="rel-sub">Also Reviewed : <b>Mattea Social Space</b></div>
                        <p>"Salah satu hidden gem di Jaksel sih ini..."</p>
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
        document.body.style.overflow = 'auto';
    }

    function scrollHorizontal(btn, direction) {
        const wrapper = btn.closest('.scroll-wrapper-relative');
        const container = wrapper.querySelector('.scroll-container');
        const amount = 300;
        if (direction === 'left') container.scrollBy({
            left: -amount,
            behavior: 'smooth'
        });
        else container.scrollBy({
            left: amount,
            behavior: 'smooth'
        });
    }

    function openPlaceModal(key) {
        const data = placesData[key];
        if (!data) return;

        document.getElementById('p-title').innerText = data.title;
        document.getElementById('p-phone').innerText = data.phone;
        document.getElementById('p-address').innerText = data.address;
        document.getElementById('p-city').innerText = data.city;
        document.getElementById('p-ig').innerText = data.ig;
        document.getElementById('p-hours-wk').innerText = data.hoursWk;
        document.getElementById('p-hours-we').innerText = data.hoursWe;
        document.getElementById('p-price-coffee').innerText = data.pCoffee;
        document.getElementById('p-price-food').innerText = data.pFood;
        document.getElementById('p-price-avg').innerText = data.pAvg;
        document.getElementById('p-desc').innerText = data.desc;
        document.getElementById('p-img-main').src = data.imgMain;
        document.getElementById('p-img-tr').src = data.imgTr;
        document.getElementById('p-img-rv').src = data.imgRv;
        document.getElementById('p-img-bl').src = data.imgBl;
        document.getElementById('p-img-bm').src = data.imgBm;
        document.getElementById('p-score').innerText = data.ratingScore;
        document.getElementById('p-count').innerText = data.ratingCount;

        for (let i = 0; i < 5; i++) {
            document.getElementById(`bar-${5-i}`).style.width = data.bars[i];
            document.getElementById(`count-${5-i}`).innerText = data.counts[i];
        }

        document.getElementById('p-best-user').innerText = data.bestUser;
        document.getElementById('p-best-text').innerText = data.bestText;

        document.getElementById('p-map-img').src = data.mapImg;
        document.getElementById('p-map-link').href = data.mapLink;
        document.getElementById('p-map-addr').innerText = data.mapAddr;

        const container = document.getElementById('related-reviews-container');
        container.innerHTML = "";
        data.related.forEach(rev => {
            container.innerHTML += `
                <div class="rel-review-item">
                    <div class="rel-head">${rev.user}</div>
                    <div class="rel-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <div class="rel-sub" style="font-size:10px; margin-bottom:5px;">${rev.sub}</div>
                    <p>${rev.text}</p>
                    <div class="rel-date">${rev.date}</div>
                </div>
            `;
        });

        document.getElementById('placeDetailModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeModal(event) {
        document.getElementById('placeDetailModal').style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    function scrollHorizontal(btn, direction) {
        const wrapper = btn.closest('.scroll-wrapper-relative');
        const container = wrapper.querySelector('.scroll-container');
        const amount = 300;
        if (direction === 'left') container.scrollBy({
            left: -amount,
            behavior: 'smooth'
        });
        else container.scrollBy({
            left: amount,
            behavior: 'smooth'
        });
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