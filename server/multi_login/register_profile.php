<?php include('./functions/functions.php'); ?>
<?php
if (isStudent()) {
	header('location: ./index.php');
}
?>
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
        <?php echo display_error(); ?>

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
            <textarea rows="10" cols="50" name="info"><?php echo $info; ?></textarea>
        </div>

        <div class="input-group">
            <label>Kinh nghiệm của bạn</label>
            <textarea rows="10" cols="50" name="experience"><?php echo $experience; ?></textarea>
        </div>

        <div class="input-group">
            <input type="submit" value="Đăng ký" name="register_profile_btn">
        </div>

    </form>
</body>

</html>