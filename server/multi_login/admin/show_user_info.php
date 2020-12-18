<?php require "../config.php"; ?>
<?php
$user_id = $_GET['user_id'];
?>
<?php
include('../functions/functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> <!-- load jquery via CDN -->
    <script src="../functions/functions.js"></script>
    <link rel="stylesheet" href="./style.css">

    <style>
        .container-1 {
            display: grid;
            grid-template-columns: 2fr 2fr;
        }
    </style>
</head>

<body class="user-info">
    <form class="edit-form" method="POST" onsubmit="event.preventDefault()">
        <button onclick="enableEdit('input-info');" class="button-a button-edit" name="button-edit">Edit
        </button>
        <button disabled onclick="confirmSaveInfo()" type="submit" class="button-a" id="save" style="background-color: #ccc">Save
        </button>

        <?php
        $sql = "SELECT * FROM users, users_info WHERE user_id=$user_id AND id=$user_id";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                <div class="container-1">

                    <label for="username">Tên đăng nhập:</label>
                    <input name="username" id="username" class="input-info" disabled type="text" value="<?php echo $row['username'] ?>">

                    <label for="email">Email:</label>
                    <input name="email" id="email" class="input-info" disabled type="email" value="<?php echo $row['email'] ?>">

                    <label for="user_type">Vai trò:</label>
                    <?php
                    if (strval($row['user_type']) == 'tutor') { ?>
                        <select name="user_type" id="user_type" class="input-info user_type-class" disabled>
                            <option selected value="tutor">Gia sư</option>
                            <option value="user">Học viên</option>
                        </select>
                    <?php
                    } else if (strval($row['user_type']) == 'user') { ?>
                        <select name="user_type" id="user_type" class="input-info user_type-class" disabled>
                            <option value="tutor">Gia sư</option>
                            <option selected value="user">Học viên</option>
                        </select>
                    <?php
                    }
                    ?>
                    <label for="fname">Tên:</label>
                    <input name="fname" id="fname" class="input-info" disabled type="text" value="<?php echo $row['first_name'] ?>">

                    <label for="lname">Họ lót:</label>
                    <input name="lname" id="lname" class="input-info" disabled type="text" value="<?php echo $row['last_name'] ?>">

                    <label for="gender">Giới tính:</label>
                    <?php
                    if (strval($row['gender']) == 'male') { ?>
                        <select name="gender" id="gender" class="input-info gender-class" disabled>
                            <option selected value="male">Nam</option>
                            <option value="female">Nữ</option>
                            <option value="other">Khác</option>
                        </select>
                    <?php
                    } else if (strval($row['gender']) == 'female') { ?>
                        <select name="gender" id="gender" class="input-info gender-class" disabled>
                            <option value="male">Nam</option>
                            <option selected value="female">Nữ</option>
                            <option value="other">Khác</option>
                        </select>
                    <?php
                    } else { ?>
                        <select name="gender" id="gender" class="input-info gender-class" disabled>
                            <option value="male">Nam</option>
                            <option value="female">Nữ</option>
                            <option selected value="other">Khác</option>
                        </select>
                    <?php
                    }
                    ?>
                    <!-- <input name="gender" id="gender" class="input-info" disabled type="text" value="<?php echo $row['gender'] ?>"> -->

                    <label for="phone_number">Số điện thoại:</label>
                    <input name="phone_number" id="phone_number" class="input-info" disabled type="number" value="<?php echo $row['phone_number'] ?>">

                    <label for="address_1">Địa chỉ 1:</label>
                    <input name="address_1" id="address_1" class="input-info" disabled type="text" value="<?php echo $row['address_1'] ?>">

                    <label for="address_2">Địa chỉ 2:</label>
                    <input name="address_2" id="address_2" class="input-info" disabled type="text" value="<?php echo $row['address_2'] ?>">

                    <label for="district">Quận/Huyện:</label>
                    <input name="district" id="district" class="input-info" disabled type="text" value="<?php echo $row['district'] ?>">

                    <label for="city">Thành phố:</label>
                    <input name="city" id="city" class="input-info" disabled type="text" value="<?php echo $row['city'] ?>">

                    <label for="post_code">Mã bưu chính:</label>
                    <input name="post_code" id="post_code" class="input-info" disabled type="number" value="<?php echo $row['post_code'] ?>">

                    <div></div>
                    <div></div>
                    <div></div><br><br><br>

                    <div></div>
                    <div></div>
                    <div></div>
                </div>
        <?php
            }
        }
        ?>
    </form>
    <input name="new_password" id="new_password" type="button" value="Tạo mật khẩu mới" onclick="
                            loadFile('new-password', 'form_create_password.php');
                            document.getElementById('new_password').setAttribute('disabled', true);
                    ">
    <form class="form-password" action="" onsubmit="event.preventDefault();">
        <div class="new-password container-1"></div>
    </form>
    <div class="show-message"></div>

</body>

</html>