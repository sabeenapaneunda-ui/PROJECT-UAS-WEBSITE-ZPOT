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
    <title>ZPOT - Fashion</title>
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

        <div class="fashion-page-wrapper" style="margin-top: 40px; margin-bottom: 20px;">
            <div class="big-search-bar">
                <a href="search.php" style="text-decoration: none; display: flex; align-items: center;">
                    <i class="fas fa-search search-icon-inside"></i>
                </a>

                <div class="search-tag-pill">
                    <i class="fas fa-tshirt"></i> <span>Fashion</span>
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
                <h3>Street style</h3>

            </div>

            <div class="scroll-wrapper-relative">

                <button class="nav-arrow left-arrow" onclick="scrollHorizontal(this, 'left')">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <div class="scroll-container">

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/CROOZ.png" class="place-thumb-img" alt="Crooz">
                        <div class="place-info">
                            <h4>Crooz</h4>
                            <div class="addr">Crooz Store, Jl. Cilandak Tengah No.10, Jakarta Selatan</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/PC.png" class="place-thumb-img" alt="Public Culture">
                        <div class="place-info">
                            <h4>Public Culture (PC)</h4>
                            <div class="addr">Online/pop-up event di Jakarta Pusat/Selatan</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/BLEE.jpg" class="place-thumb-img" alt="BLEE">
                        <div class="place-info">
                            <h4>BLEE</h4>
                            <div class="addr">Lippo Mall Nusantara, Lantai 1, Jakarta</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/BLUESVILLE.jpg" class="place-thumb-img" alt="Bluesville">
                        <div class="place-info">
                            <h4>Bluesville</h4>
                            <div class="addr">Cipete atau Kemang</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/thanksinsomnia.jpg" class="place-thumb-img" alt="Thanksinsomnia">
                        <div class="place-info">
                            <h4>Thanksinsomnia</h4>
                            <div class="addr">Bogor Kota atau Depok</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/ERIGO.webp" class="place-thumb-img" alt="Erigo">
                        <div class="place-info">
                            <h4>Erigo</h4>
                            <div class="addr">Memiliki banyak gerai di mall-mall besar di seluruh Jabodetabek</div>
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
                <h3>Soft girl style</h3>

            </div>

            <div class="scroll-wrapper-relative">

                <button class="nav-arrow left-arrow" onclick="scrollHorizontal(this, 'left')">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <div class="scroll-container">

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/lovebonito.webp" class="place-thumb-img" alt="Love Bonito">
                        <div class="place-info">
                            <h4>Love, Bonito</h4>
                            <div class="addr">Jakarta (Mall besar)</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/cottonink.jpg" class="place-thumb-img" alt="Cotton Ink">
                        <div class="place-info">
                            <h4>Cotton Ink</h4>
                            <div class="addr">Jakarta Selatan & Pusat</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/this is april.webp" class="place-thumb-img" alt="This Is April">
                        <div class="place-info">
                            <h4>This Is April</h4>
                            <div class="addr">Mal-mal di Jabodetabek</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/wearable.png" class="place-thumb-img" alt="Wearable">
                        <div class="place-info">
                            <h4>Wearable</h4>
                            <div class="addr">Jakarta</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/colorbox.jpg" class="place-thumb-img" alt="ColorBox">
                        <div class="place-info">
                            <h4>ColorBox</h4>
                            <div class="addr">Jabodetabek</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/3mongkis.jpeg" class="place-thumb-img" alt="3 Mongkis">
                        <div class="place-info">
                            <h4>3 Mongkis</h4>
                            <div class="addr">Jakarta (Butik/Mal)</div>
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
                <h3>Casual wear</h3>

            </div>

            <div class="scroll-wrapper-relative">

                <button class="nav-arrow left-arrow" onclick="scrollHorizontal(this, 'left')">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <div class="scroll-container">

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/uniqlo.jpg" class="place-thumb-img" alt="Uniqlo Indonesia">
                        <div class="place-info">
                            <h4>Uniqlo Indonesia</h4>
                            <div class="addr">Mal besar seluruh Jabodetabek</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/executive.jpg" class="place-thumb-img" alt="Executive">
                        <div class="place-info">
                            <h4>Executive</h4>
                            <div class="addr">Mal-mal di Jabodetabek</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/3second.jpg" class="place-thumb-img" alt="3second">
                        <div class="place-info">
                            <h4>3second</h4>
                            <div class="addr">Mal dan Distro di Jabodetabek</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/houseofsmith.jpeg" class="place-thumb-img" alt="House of Smith">
                        <div class="place-info">
                            <h4>House of Smith</h4>
                            <div class="addr">Bandung (Distro), Jakarta (Distro/Mal)</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/minimal.webp" class="place-thumb-img" alt="Minimal">
                        <div class="place-info">
                            <h4>Minimal</h4>
                            <div class="addr">Mal-mal di Jabodetabek</div>
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
                <h3>Vintage look</h3>

            </div>

            <div class="scroll-wrapper-relative">

                <button class="nav-arrow left-arrow" onclick="scrollHorizontal(this, 'left')">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <div class="scroll-container">

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/oldblueco.jpeg" class="place-thumb-img" alt="Oldblue Co.">
                        <div class="place-info">
                            <h4>Oldblue Co.</h4>
                            <div class="addr">Jakarta Selatan</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/thegooddepts.jpg" class="place-thumb-img" alt="The Goods Dept.">
                        <div class="place-info">
                            <h4>The Goods Dept.</h4>
                            <div class="addr">Jakarta Pusat/Selatan</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/Unionwell.jpeg" class="place-thumb-img" alt="Unionwell">
                        <div class="place-info">
                            <h4>Unionwell</h4>
                            <div class="addr">Bandung (Pusat), Jakarta (Retailer)</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/brodo.webp" class="place-thumb-img" alt="Brodo">
                        <div class="place-info">
                            <h4>Brodo</h4>
                            <div class="addr">Jakarta (Retailer/Showroom)</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/Goodfellas Goods.webp" class="place-thumb-img" alt="Goodfellas Goods">
                        <div class="place-info">
                            <h4>Goodfellas Goods</h4>
                            <div class="addr">Jabodetabek</div>
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
                <h3>Sporty style</h3>

            </div>

            <div class="scroll-wrapper-relative">

                <button class="nav-arrow left-arrow" onclick="scrollHorizontal(this, 'left')">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <div class="scroll-container">

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/noore.jpeg" class="place-thumb-img" alt="Noore">
                        <div class="place-info">
                            <h4>Noore</h4>
                            <div class="addr">Jakarta (Online/Butik)</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/tiento.webp" class="place-thumb-img" alt="Tiento">
                        <div class="place-info">
                            <h4>Tiento</h4>
                            <div class="addr">Jakarta/Depok (Online/Store)</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/Fitwear.jpg" class="place-thumb-img" alt="Fitwear">
                        <div class="place-info">
                            <h4>Fitwear</h4>
                            <div class="addr">Jakarta (Online/Pop-up)</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/Ortuseight.jpeg" class="place-thumb-img" alt="Ortuseight">
                        <div class="place-info">
                            <h4>Ortuseight</h4>
                            <div class="addr">Jakarta (Retailer/Store)</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/AUM Apparel.jpeg" class="place-thumb-img" alt="AUM Apparel">
                        <div class="place-info">
                            <h4>AUM Apparel</h4>
                            <div class="addr">Jakarta (Online/Studio)</div>
                            <div class="by" style="text-decoration: underline;">More Details</div>
                        </div>
                    </div>

                    <div class="place-card-brown" onclick="openPlaceModal()" style="cursor: pointer;">
                        <img src="images/search-fashions/SoulActive.jpeg" class="place-thumb-img" alt="SoulActive">
                        <div class="place-info">
                            <h4>SoulActive</h4>
                            <div class="addr">Jakarta (Online)</div>
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

            <h2 class="modal-page-title">Place Review Details</h2>

            <div class="review-details-grid">

                <div class="details-left-col">

                    <div class="tanatap-photo-grid">
                        <div class="grid-item main-pic">
                            <img src="images/Uniqlo/image.png" alt="Uniqlo Main">
                        </div>
                        <div class="grid-item top-right">
                            <img src="images/Uniqlo/uniqlo 1.jpg" alt="Store 1">
                        </div>
                        <div class="grid-item mid-right">
                            <img src="images/Uniqlo/uniqlo 2.jpg" alt="Display">
                        </div>
                        <div class="grid-item bottom-left">
                            <img src="images/Uniqlo/uniqlo 3.jpg" alt="Store 2">
                        </div>
                        <div class="grid-item bottom-mid">
                            <img src="images/Uniqlo/uniqlo 4.jpg" alt="Clothes">
                        </div>
                    </div>

                    <div class="tanatap-info-box">
                        <div class="info-text-col">
                            <h1>Uniqlo Indonesia</h1>

                            <div class="info-row">
                                <i class="fas fa-phone-alt"></i>
                                <span style="text-decoration: underline;">0811-1700-1815</span>
                            </div>
                            <div class="info-row">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Mall Besar Seluruh Indonesia</span>
                            </div>
                            <div class="info-row">
                                <i class="fab fa-instagram"></i> <span>@uniqloindonesia</span>
                            </div>

                            <div class="hours-row">
                                <span class="label">O'Clock :</span>
                                <div class="hours-list">
                                    <span>10:00 - 22:00 WIB</span>
                                </div>
                            </div>
                        </div>

                        <div class="price-range-box">
                            <h4 style="margin-bottom: 10px; color: #5E2C0E;">Price Range</h4>
                            <div class="price-row" style="border-bottom: 1px solid #5E2C0E; padding-bottom: 5px; margin-bottom: 5px;">
                                <span>100k - 1.000k</span>
                            </div>
                            <div class="price-row" style="flex-direction: column;">
                                <span style="font-weight: 800;">avg.spend</span>
                                <span>500k/person</span>
                            </div>
                        </div>
                    </div>

                    <div class="rd-box description-box">
                        <h3>Description Details</h3>
                        <p>Uniqlo Indonesia focuses on offering unique products made from high-quality, high-functioning materials at a reasonable price. The company leverages digital technology to communicate with customers and quickly incorporate their feedback into product development.</p>
                    </div>

                    <div class="rd-box reviews-box">
                        <h3>Reviews & Comments</h3>

                        <div class="rating-summary">
                            <span class="rating-score">4.7</span>
                            <span>• 3.166 reviews</span>
                        </div>

                        <div class="rating-bars">
                            <div class="bar-row"><span>5</span>
                                <div class="bar-track">
                                    <div class="bar-fill" style="width: 85%;"></div>
                                </div>
                            </div>
                            <div class="bar-row"><span>4</span>
                                <div class="bar-track">
                                    <div class="bar-fill" style="width: 30%;"></div>
                                </div>
                            </div>
                            <div class="bar-row"><span>3</span>
                                <div class="bar-track">
                                    <div class="bar-fill" style="width: 10%;"></div>
                                </div>
                            </div>
                            <div class="bar-row"><span>2</span>
                                <div class="bar-track">
                                    <div class="bar-fill" style="width: 5%;"></div>
                                </div>
                            </div>
                            <div class="bar-row"><span>1</span>
                                <div class="bar-track">
                                    <div class="bar-fill" style="width: 3%;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="best-comment">
                            <h4 style="color:#5E2C0E; margin-bottom:5px;">Best Comments</h4>
                            <div class="comment-user">
                                <i class="fas fa-user-circle"></i>
                                <span>@Hariyanto KTM</span>
                            </div>
                            <div class="stars-mini" style="color:#FFC800; font-size:10px; margin:2px 0;">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p style="font-size:12px; font-style:italic;">"Look for warm clothes as the rainy season approaches in the village, and check for discounts... who knows, you might find something interesting as a gift for your relatives back home. There's a wide variety of children's, women's, and men's clothing. After a tiring day of searching... take a break in the studio."</p>
                        </div>
                    </div>

                </div>

                <div class="details-right-col">

                    <div class="rd-box location-box">
                        <h3>Location</h3>
                        <a href="https://goo.gl/maps/UniqloPIM" target="_blank" class="map-link-wrapper">
                            <img src="images/Uniqlo/uniqlo.png" alt="Map Location" class="map-img">
                        </a>
                        <div class="map-address-text">Mall Besar Seluruh Indonesia</div>
                    </div>

                    <div class="rd-box related-reviews-box" style="height: auto; min-height: 400px;">
                        <h3>Related Reviews</h3>

                        <div class="rel-review-item">
                            <div class="rel-head">@Fitri Diana Tri Anisa</div>
                            <div class="rel-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                            <div class="rel-sub" style="font-size:10px;">Also Reviewed : <b>Uniqlo Indonesia</b></div>
                            <p>"Uniqlo has become a must-visit at GI Mall. Besides its affordable prices, the staff is also friendly and helpful..."</p>
                            <div class="rel-date">5 days ago</div>
                        </div>

                        <div class="rel-review-item">
                            <div class="rel-head">@IT NS</div>
                            <div class="rel-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                            <div class="rel-sub" style="font-size:10px;">Also Reviewed : <b>Uniqlo Indonesia</b></div>
                            <p>"As usual, it's busy. It's not a weekend or a weekday. But there's one employee who's been a bit unusual..."</p>
                            <div class="rel-date">5 days ago</div>
                        </div>

                        <div class="rel-review-item">
                            <div class="rel-head">@Bayu Ubay</div>
                            <div class="rel-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                            <div class="rel-sub" style="font-size:10px;">Also Reviewed : <b>Uniqlo Indonesia</b></div>
                            <p>"One of the biggest uniqlo that I've ever visited, huge floor space although the merch sometimes being displayed repeatedly..."</p>
                            <div class="rel-date">9 days ago</div>
                        </div>

                        <div class="rel-review-item">
                            <div class="rel-head">@Arindra Arindra</div>
                            <div class="rel-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                            <div class="rel-sub" style="font-size:10px;">Also Reviewed : <b>Uniqlo Indonesia</b></div>
                            <p>"The location is on the LG floor of Grand Indonesia East Mall... the area is very spacious compared to other Uniqlo outlets..."</p>
                            <div class="rel-date">13 days ago</div>
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