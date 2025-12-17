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
    <title>ZPOT - Create Post</title>
    <link rel="stylesheet" href="https:
    <link rel=" stylesheet" href="style.css">
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

        .add-more-link:hover {
            font-weight: bold;
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
            <a href="#" onclick="openContactModal(event)">Contact Us</a>
        </nav>
        <div class="user-icon">
            <a href="profile.php" style="color: inherit;"><i class="fas fa-user-circle"></i></a>
        </div>
    </header>

    <div class="container">
        <div class="upload-wrapper">

            <form action="upload_process.php" method="POST" enctype="multipart/form-data">

                <input type="file" name="foto" id="real-file-input" style="display: none;" onchange="handleFileSelect(this)">
                <input type="hidden" name="rating" id="rating-value" value="0">
                <input type="hidden" name="category" id="selected-category" value="Place">

                <div id="initial-view" class="upload-photo-box" onclick="startUpload()">
                    <div class="counter">0/10</div>
                    <div class="upload-content">
                        <i class="fas fa-camera-retro"></i>
                        <h3>Upload Photo</h3>
                        <p>Click to select a file from your device</p>
                    </div>
                </div>

                <div id="preview-view" class="upload-photo-box active-preview" style="display: none;">
                    <div class="counter" id="photo-counter">1/10</div>
                    <div class="preview-gallery" id="gallery-container">
                        <div class="add-more-box" onclick="startUpload()">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                </div>

                <div class="form-card">

                    <div class="form-group">
                        <label>Category</label>
                        <div class="category-grid-small">
                            <div class="cat-pill small active" onclick="setCategory('Place', this)"><i class="fas fa-map-marker-alt"></i> Place</div>
                            <div class="cat-pill small" onclick="setCategory('Brand', this)"><i class="fas fa-tag"></i> Brand</div>
                            <div class="cat-pill small" onclick="setCategory('Aesthetic', this)"><i class="fas fa-camera"></i> Aesthetic</div>
                            <div class="cat-pill small" onclick="setCategory('Lifestyle', this)"><i class="fas fa-headphones"></i> Lifestyle</div>
                            <div class="cat-pill small" onclick="setCategory('Fashion', this)"><i class="fas fa-tshirt"></i> Fashion</div>
                            <div class="cat-pill small" onclick="setCategory('Food', this)"><i class="fas fa-mug-hot"></i> Food</div>
                            <div class="cat-pill small" onclick="setCategory('Trending', this)"><i class="fas fa-fire"></i> Trending</div>
                            <div class="cat-pill small" onclick="setCategory('Community', this)"><i class="fas fa-users"></i> Community</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Details</label>

                        <div class="sub-label">Place Name / Location</div>
                        <input type="text" name="place_name" class="custom-input" placeholder="e.g. Nanny's Pavillon, Central Park" required>

                        <div class="sub-label">Review Headline (Title)</div>
                        <input type="text" name="review_title" class="custom-input" placeholder="e.g. Best coffee in town!" required>

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
                        <textarea name="review_text" class="custom-input textarea" placeholder="write your caption here...." required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Location Details (Optional)</label>
                        <input type="text" name="location" class="custom-input" placeholder="add specific location details">
                    </div>

                    <div class="form-group">
                        <label>Pros & Cons</label>
                        <div class="pros-cons-row">
                            <div class="pc-col" id="pros-wrapper">
                                <div class="sub-label">+ Pros</div>
                                <input type="text" name="tag_text[]" class="custom-input" placeholder="add pros..">
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

                <button type="submit" name="upload" class="submit-big-btn">SUBMIT</button>
                <div style="height: 50px;"></div>

            </form>
        </div>
    </div>

    <div id="contactModal" class="auth-overlay" style="display: none;">
        <div class="auth-card contact-card-size">
            <div class="modal-close-btn" onclick="closeContactModal()"><i class="fas fa-times"></i></div>
            <div class="auth-left contact-left-bg"><img src="images/index/LOGO ZPOT.png" class="auth-art-img"></div>
            <div class="auth-right contact-right-bg">
                <h1>Contact Us</h1><button onclick="closeContactModal()">Close</button>
            </div>
        </div>
    </div>

    <script>
        function addExtraInput(type) {
            const wrapper = document.getElementById(type === 'pros' ? 'pros-wrapper' : 'cons-wrapper');
            const newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.className = 'custom-input';
            newInput.placeholder = type === 'pros' ? 'add another pro..' : 'add another con..';
            newInput.style.marginTop = '10px';
            newInput.name = type === 'pros' ? 'tag_text[]' : 'cons_text[]';
            wrapper.insertBefore(newInput, wrapper.lastElementChild);
        }

        function setCategory(catName, element) {
            document.getElementById('selected-category').value = catName;
            document.querySelectorAll('.cat-pill').forEach(p => p.classList.remove('active'));
            element.classList.add('active');
        }

        let photoCount = 0;
        const maxPhotos = 10;

        function startUpload() {
            document.getElementById('real-file-input').click();
        }

        function handleFileSelect(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    addNewPhoto(e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function addNewPhoto(imgSrc) {
            if (photoCount >= maxPhotos) return;
            photoCount++;
            document.getElementById('initial-view').style.display = 'none';
            document.getElementById('preview-view').style.display = 'flex';
            document.getElementById('photo-counter').innerText = photoCount + "/" + maxPhotos;
            const newHTML = `<div class="preview-item" style="background-image: url('${imgSrc}'); background-size: cover;"><div class="delete-photo-btn" onclick="deletePhoto(this)"><i class="fas fa-times"></i></div></div>`;
            document.querySelector('.add-more-box').insertAdjacentHTML('beforebegin', newHTML);
        }

        function deletePhoto(btn) {
            btn.parentElement.remove();
            photoCount--;
            document.getElementById('photo-counter').innerText = photoCount + "/" + maxPhotos;
            if (photoCount === 0) {
                document.getElementById('preview-view').style.display = 'none';
                document.getElementById('initial-view').style.display = 'flex';
            }
        }

        function setRating(n) {
            document.getElementById('rating-value').value = n;
            let stars = document.querySelectorAll('.star-item');
            stars.forEach((s, i) => {
                if (i < n) {
                    s.classList.remove('far');
                    s.classList.add('fas');
                    s.style.color = '#FFC107';
                } else {
                    s.classList.remove('fas');
                    s.classList.add('far');
                    s.style.color = '';
                }
            });
        }

        function openContactModal(e) {
            e.preventDefault();
            document.getElementById('contactModal').style.display = 'flex';
        }

        function closeContactModal() {
            document.getElementById('contactModal').style.display = 'none';
        }
    </script>
</body>

</html>