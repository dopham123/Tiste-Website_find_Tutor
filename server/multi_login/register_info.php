<?php include('./functions/functions.php');?>
<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <div class="header">
        <h2>Register</h2>
    </div>
    <form method="post" action="register_info.php">
        <?php echo display_error(); ?>
        <div class="input-group">
            <label>Tên</label>
            <input type="text" name="fname" value="<?php echo $fname; ?>">
        </div>
        <div class="input-group">
            <label>Họ lót</label>
            <input type="text" name="lname" value="<?php echo $lname; ?>">
        </div>
        <div class="input-group">
            <label>Giới tính</label>
            <select name="gender">
                <option selected value="male">Nam</option>
                <option value="female">Nữ</option>
                <option value="other">Khác</option>
            </select>
        </div>
        <div class="input-group">
            <label>Số điện thoại</label>
            <input type="number" name="phone_number" value="<?php echo $phone_number; ?>">
        </div>

        <div class="input-group">
            <label>Địa chỉ 1</label>
            <input type="text" name="address_1" value="<?php echo $address_1; ?>">
        </div>
        <div class="input-group">
            <label>Địa chỉ 2</label>
            <input type="text" name="address_2" value="<?php echo $address_2; ?>">
        </div>
        <div class="input-group">
            <label>Quận/Huyện</label>
            <input type="text" name="district" value="<?php echo $district; ?>">
        </div>
        <div class="input-group">
            <label>Tỉnh/Thành phố</label>
            <input type="text" name="city" value="<?php echo $city; ?>">
        </div>
        <div class="input-group">
            <label>Mã bưu chính</label>
            <input type="number" name="post_code" value="<?php echo $post_code; ?>">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="register_info_btn">Tiếp tục</button>
        </div>
    </form>
</body>

</html>