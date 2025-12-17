<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location: index.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("location: profile-reviews.php");
    exit();
}

$id = $_GET['id'];
$username = $_SESSION['username'];

$query = mysqli_query($conn, "SELECT * FROM reviews WHERE id='$id' AND username='$username'");
$data = mysqli_fetch_array($query);

if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href='profile-reviews.php';</script>";
    exit();
}

$pros_list = explode(", ", $data['tag_text']);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post - ZPOT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .cat-pill {
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .cat-pill.active {
            background-color: #5E2C0E !important;
            color: #fff !important;
            border-color: #5E2C0E;
        }

        .add-more-link {
            cursor: pointer;
            user-select: none;
        }
    </style>
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
            <a href="#">Contact Us</a>
        </nav>
        <div class="user-icon">
            <a href="profile.php" style="color: inherit;"><i class="fas fa-user-circle"></i></a>
        </div>
    </header>

    <div class="container">
        <div class="upload-wrapper">

            <form action="edit_process.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <input type="hidden" name="gambar_lama" value="<?php echo $data['image']; ?>">

                <input type="file" name="foto" id="real-file-input" style="display: none;" onchange="handleFileSelect(this)">
                <input type="hidden" name="rating" id="rating-value" value="<?php echo $data['rating']; ?>">

                <?php
                $kategori_lama = isset($data['category']) ? $data['category'] : 'Place';
                ?>
                <input type="hidden" name="category" id="selected-category" value="<?php echo $kategori_lama; ?>">

                <div id="initial-view" class="upload-photo-box" onclick="startUpload()" style="display: none;">
                    <div class="counter">Change Photo</div>
                    <div class="upload-content">
                        <i class="fas fa-camera-retro"></i>
                        <h3>Change Photo</h3>
                        <p>Click to replace current photo</p>
                    </div>
                </div>

                <div id="preview-view" class="upload-photo-box active-preview" style="display: flex;">
                    <div class="counter">Current Photo</div>
                    <div class="preview-gallery" id="gallery-container">

                        <div class="preview-item" style="background-image: url('<?php echo $data['image']; ?>'); background-size: cover; background-position: center;">
                            <div class="delete-photo-btn" onclick="resetPhoto()">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-card">

                    <div class="form-group">
                        <label>Category</label>
                        <div class="category-grid-small">
                            <div id="cat-Place" class="cat-pill small" onclick="setCategory('Place', this)"><i class="fas fa-map-marker-alt"></i> Place</div>
                            <div id="cat-Brand" class="cat-pill small" onclick="setCategory('Brand', this)"><i class="fas fa-tag"></i> Brand</div>
                            <div id="cat-Aesthetic" class="cat-pill small" onclick="setCategory('Aesthetic', this)"><i class="fas fa-camera"></i> Aesthetic</div>
                            <div id="cat-Lifestyle" class="cat-pill small" onclick="setCategory('Lifestyle', this)"><i class="fas fa-headphones"></i> Lifestyle</div>
                            <div id="cat-Fashion" class="cat-pill small" onclick="setCategory('Fashion', this)"><i class="fas fa-tshirt"></i> Fashion</div>
                            <div id="cat-Food" class="cat-pill small" onclick="setCategory('Food', this)"><i class="fas fa-mug-hot"></i> Food</div>
                            <div id="cat-Trending" class="cat-pill small" onclick="setCategory('Trending', this)"><i class="fas fa-fire"></i> Trending</div>
                            <div id="cat-Community" class="cat-pill small" onclick="setCategory('Community', this)"><i class="fas fa-users"></i> Community</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Title & Rating</label>
                        <div class="sub-label">review title</div>
                        <input type="text" name="place_name" class="custom-input" value="<?php echo $data['place_name']; ?>" required>

                        <div class="sub-label">give rating (1-5 stars)</div>
                        <div class="rating-bar-input" id="rating-box">
                            <i class="far fa-star star-item" onclick="setRating(1)"></i>
                            <i class="far fa-star star-item" onclick="setRating(2)"></i>
                            <i class="far fa-star star-item" onclick="setRating(3)"></i>
                            <i class="far fa-star star-item" onclick="setRating(4)"></i>
                            <i class="far fa-star star-item" onclick="setRating(5)"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Caption</label>
                        <textarea name="review_text" class="custom-input textarea" required><?php echo $data['review_text']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Location (optional)</label>
                        <input type="text" name="location" class="custom-input" placeholder="add location">
                    </div>

                    <div class="form-group">
                        <label>Pros & Cons (Highlights)</label>
                        <div class="pros-cons-row">
                            <div class="pc-col" id="pros-wrapper">
                                <div class="sub-label">+ Pros</div>

                                <?php
                                if (!empty($pros_list[0])) {
                                    foreach ($pros_list as $pro) {
                                        echo '<input type="text" name="tag_text[]" class="custom-input" value="' . $pro . '" style="margin-bottom:10px;">';
                                    }
                                } else {

                                    echo '<input type="text" name="tag_text[]" class="custom-input" placeholder="add pros..">';
                                }
                                ?>

                                <div class="add-more-link" onclick="addExtraInput('pros')">+</div>
                            </div>

                            <div class="pc-col" id="cons-wrapper">
                                <div class="sub-label">- Cons</div>
                                <input type="text" name="cons_text[]" class="custom-input" placeholder="add cons..">
                                <div class="add-more-link" onclick="addExtraInput('cons')">+</div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" name="update" class="submit-big-btn">UPDATE REVIEW</button>
                <div style="height: 50px;"></div>

            </form>
        </div>
    </div>

    <script>
        window.onload = function() {

            let ratingDB = document.getElementById('rating-value').value;
            setRating(ratingDB);


            let kategoriDB = document.getElementById('selected-category').value;
            let targetPill = document.getElementById('cat-' + kategoriDB);

            if (!targetPill) targetPill = document.getElementById('cat-Place');

            if (targetPill) {
                targetPill.classList.add('active');
            }
        };

        function startUpload() {
            document.getElementById('real-file-input').click();
        }

        function handleFileSelect(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const gallery = document.getElementById('gallery-container');
                    gallery.innerHTML = `
                        <div class="preview-item" style="background-image: url('${e.target.result}'); background-size: cover;">
                            <div class="delete-photo-btn" onclick="resetPhoto()">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                    `;
                    document.getElementById('initial-view').style.display = 'none';
                    document.getElementById('preview-view').style.display = 'flex';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function resetPhoto() {
            document.getElementById('real-file-input').value = "";
            document.getElementById('preview-view').style.display = 'none';
            document.getElementById('initial-view').style.display = 'flex';
        }

        function setRating(n) {
            document.getElementById('rating-value').value = n;
            let stars = document.querySelectorAll('.star-item');
            for (let i = 0; i < stars.length; i++) {
                if (i < n) {
                    stars[i].classList.remove('far');
                    stars[i].classList.add('fas');
                    stars[i].style.color = '#FFC107';
                } else {
                    stars[i].classList.remove('fas');
                    stars[i].classList.add('far');
                    stars[i].style.color = '';
                }
            }
        }

        function setCategory(catName, element) {
            document.getElementById('selected-category').value = catName;
            let pills = document.querySelectorAll('.cat-pill');
            pills.forEach(p => p.classList.remove('active'));
            element.classList.add('active');
        }

        function addExtraInput(type) {
            const wrapper = document.getElementById(type === 'pros' ? 'pros-wrapper' : 'cons-wrapper');
            const newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.className = 'custom-input';
            newInput.placeholder = type === 'pros' ? 'add another pro..' : 'add another con..';
            newInput.style.marginBottom = '10px';
            newInput.name = type === 'pros' ? 'tag_text[]' : 'cons_text[]';
            wrapper.insertBefore(newInput, wrapper.lastElementChild);
        }
    </script>

</body>

</html>