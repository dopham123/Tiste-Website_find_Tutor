<?php include('./functions/functions.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <div class="header">
        <h2>Register</h2>
    </div>
    <form action="register_profile.php" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <label>Chọn ảnh hồ sơ</label>
            <input type="file" name="avatar_image" id="avatar_image">
        </div>

        <div class="input-group">
            <label>Chọn ảnh hồ sơ</label>
            <input type="file" name="profile_image" id="profile_image">
        </div>

        <div class="input-group">
            <label>Thông tin của bạn</label>
            <input type="textarea" rows="10" cols="50" name="info">
        </div>

        <div class="input-group">
            <label>Kinh nghiệm của bạn</label>
            <input type="textarea" name="experience">
        </div>

        <div class="input-group">
            <input type="submit" value="Upload Image" name="register_profile_btn">
        </div>

    </form>
    <!-- <div class="input-group">
            <label>Chọn ảnh hồ sơ</label>
            <input type="file" name="profile_image" id="profile_image">
        </div>
        <div class="input-group">
            <label>Kinh nghiệm của bạn</label>
            <input type="textarea" name="experience">
        </div>
        <div class="input-group">
            <label>Thông tin của bạn</label>
            <input type="textarea" rows="10" cols="50" name="info">
        </div>
        <div class="input-group">
            <input type="submit" value="Upload Image" name="register_profile_btn">
        </div> -->
</body>

</html>