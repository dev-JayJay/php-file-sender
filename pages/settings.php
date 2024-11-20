<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Settings</title>
    <?php 
        include_once '../config.php';
    ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/styles/setting.css">
</head>
<body>
    <header class="header_container">
        <div class="wrapper">
            <span>UserName</span>
            <ul>
                <li><a href="<?php BASE_URL ?>/pages/dashboard.php">Home</a></li>
                <li><a href="<?php BASE_URL ?>/pages/file.php">File</a></li>
                <li><a href="<?php BASE_URL ?>/pages/faq.php">Faq</a></li>
                <li><a href="<?php BASE_URL ?>/pages/settings.php">Settings</a></li>
            </ul>
            <button>log out</button>
        </div>
    </header>
    <div class="settings-container">
        <h2>User Settings</h2>
        
        <form action="#" method="POST" enctype="multipart/form-data" class="settings-form">
            <!-- Name Field -->
            <div class="form-group">
                <label for="full-name">Full Name</label>
                <input type="text" id="full-name" name="full-name" placeholder="Enter your full name" required>
            </div>
            <!-- Profile Picture Section -->
            <div class="form-group">
                <label for="profile-image">Profile Image</label>
                <div class="image-upload">
                    <input type="file" id="profile-image" name="profile-image" accept="image/*"> <br>
                    <div class="image-preview">
                        <img src="default-avatar.png" alt="Profile Image Preview" id="image-preview">
                    </div>
                </div>
            </div>
            <!-- Username Field -->
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>

            <!-- Email Field -->
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address" required>
            </div>

            <!-- Password Change Section -->
            <div class="form-group">
                <label for="new-password">New Password</label>
                <input type="password" id="new-password" name="new-password" placeholder="Enter new password">
            </div>

            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm new password">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Save Changes</button>
        </form>
    </div>
    <footer>
        <p>all right reserved @ daha</p>
    </footer>

    <script>
        // Preview profile image before uploading
        const imageInput = document.getElementById('profile-image');
        const imagePreview = document.getElementById('image-preview');

        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                imagePreview.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = 'default-avatar.png';
            }
        });
    </script>
</body>
</html>
