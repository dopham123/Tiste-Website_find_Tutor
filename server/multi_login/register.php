<?php include('./functions/functions.php');?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header">
        <h2>Đăng ký</h2>
    </div>
    <form method="post" action="register.php">
        <?php echo display_error(); ?>
        <div class="input-group">
            <label>Loại tài khoản</label>
            <select name="role">
                <option selected value="admin">Tôi là gia sư</option>
                <option value="user">Tôi là học viên</option>
            </select>
        </div>
        <div class="input-group">
            <label>Tên đăng nhập</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label>Mật khẩu</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Xác nhận mật khẩu</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="register_btn">Tiếp tục</button>
        </div>
        <p>
            Already a member? <a href="login.php">Sign in</a>
        </p>
    </form>
</body>

</html>