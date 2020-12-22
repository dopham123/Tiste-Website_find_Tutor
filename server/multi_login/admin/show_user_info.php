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
$target_dir_profile = "../../resource/img_profile/";
$target_dir_avatar = "../../resource/img_avatar/";

?>

<!DOCTYPE html>
<html lang="en" class="user-info">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- style css -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> <!-- load jquery via CDN -->
    <script src="../functions/functions.js"></script>
    <link rel="stylesheet" href="./style.css">

    <style>
        .container-1 {
            display: grid;
            grid-template-columns: 2fr 2fr;
        }

        input {
            display: block;
        }

        select {
            display: block;
        }

        label {
            display: inline;
        }
    </style>
</head>

<body>
    <form class="edit-form" method="POST" onsubmit="event.preventDefault()">
        <button onclick="enableEdit('input-info');" class="button-a button-edit" name="button-edit">Edit
        </button>
        <button disabled onclick="confirmSaveInfo()" type="submit" class="button-a" id="save" name="btn-save" style="background-color: #ccc">Save
        </button>

        <!-- show error here -->
        <div class="show-message"></div>
        <!-- show error here -->

        <!-- show info here -->
        <?php
        $sql = "SELECT * FROM users, users_info WHERE user_id=$user_id AND id=$user_id";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                <div class="container form-group">
                    <div class="row">
                        <div class="col-sm-3 d-flex justify-content-start align-items-center">
                            <label for="username">Tên đăng nhập:</label>
                        </div>
                        <div class="col-sm-9">
                            <input name="username" id="username" class="input-info form-control" disabled type="text" value="<?php echo $row['username'] ?>">
                        </div>

                        <div class="col-sm-3 d-flex justify-content-start align-items-center">
                            <label for="email">Email:</label>
                        </div>
                        <div class="col-sm-9">
                            <input name="email" id="email" class="input-info form-control" disabled type="email" value="<?php echo $row['email'] ?>">
                        </div>

                        <div class="col-sm-3 d-flex justify-content-start align-items-center">
                            <label for="user_type">Vai trò:</label>
                        </div>
                        <div class="col-sm-9">
                            <?php
                            if (strval($row['user_type']) == 'tutor') { ?>
                                <select onchange="changeUserTypeShow();" name="user_type" id="<?php echo $row['id'] ?>" class="input-info user_type-class custom-select" disabled>
                                    <option selected value="tutor">Gia sư</option>
                                    <option value="user">Học viên</option>
                                </select>
                            <?php
                            } else if (strval($row['user_type']) == 'user') { ?>
                                <select onchange="changeUserTypeShow();" name="user_type" id="<?php echo $row['id'] ?>" class="input-info user_type-class custom-select" disabled>
                                    <option value="tutor">Gia sư</option>
                                    <option selected value="user">Học viên</option>
                                </select>
                            <?php
                            }
                            ?>
                        </div>

                        <div class="col-sm-3 d-flex justify-content-start align-items-center">
                            <label for="fname">Tên:</label>
                        </div>
                        <div class="col-sm-9">
                            <input name="fname" id="fname" class="input-info form-control" disabled type="text" value="<?php echo $row['first_name'] ?>">
                        </div>

                        <div class="col-sm-3 d-flex justify-content-start align-items-center">
                            <label for="lname">Họ lót:</label>
                        </div>
                        <div class="col-sm-9">
                            <input name="lname" id="lname" class="input-info form-control" disabled type="text" value="<?php echo $row['last_name'] ?>">
                        </div>

                        <div class="col-sm-3 d-flex justify-content-start align-items-center">
                            <label for="gender">Giới tính:</label>
                        </div>
                        <div class="col-sm-9">
                            <?php
                            if (strval($row['gender']) == 'male') { ?>
                                <select name="gender" id="gender" class="input-info gender-class custom-select" disabled>
                                    <option selected value="male">Nam</option>
                                    <option value="female">Nữ</option>
                                    <option value="other">Khác</option>
                                </select>
                            <?php
                            } else if (strval($row['gender']) == 'female') { ?>
                                <select name="gender" id="gender" class="input-info gender-class custom-select" disabled>
                                    <option value="male">Nam</option>
                                    <option selected value="female">Nữ</option>
                                    <option value="other">Khác</option>
                                </select>
                            <?php
                            } else { ?>
                                <select name="gender" id="gender" class="input-info gender-class custom-select" disabled>
                                    <option value="male">Nam</option>
                                    <option value="female">Nữ</option>
                                    <option selected value="other">Khác</option>
                                </select>
                            <?php
                            }
                            ?>

                        </div>

                        <div class="col-sm-3 d-flex justify-content-start align-items-center">
                            <label for="phone_number">Số điện thoại:</label>
                        </div>
                        <div class="col-sm-9">
                            <input name="phone_number" id="phone_number" class="input-info form-control" disabled type="number" value="<?php echo $row['phone_number'] ?>">
                        </div>

                        <div class="col-sm-3 d-flex justify-content-start align-items-center">
                            <label for="address_1">Địa chỉ 1:</label>
                        </div>
                        <div class="col-sm-9">
                            <input name="address_1" id="address_1" class="input-info form-control" disabled type="text" value="<?php echo $row['address_1'] ?>">
                        </div>

                        <div class="col-sm-3 d-flex justify-content-start align-items-center">
                            <label for="address_2">Địa chỉ 2:</label>
                        </div>
                        <div class="col-sm-9">
                            <input name="address_2" id="address_2" class="input-info form-control" disabled type="text" value="<?php echo $row['address_2'] ?>">
                        </div>

                        <div class="col-sm-3 d-flex justify-content-start align-items-center">
                            <label for="district">Quận/Huyện:</label>
                        </div>
                        <div class="col-sm-9">
                            <input name="district" id="district" class="input-info form-control" disabled type="text" value="<?php echo $row['district'] ?>">
                        </div>

                        <div class="col-sm-3 d-flex justify-content-start align-items-center">
                            <label for="city">Thành phố:</label>
                        </div>
                        <div class="col-sm-9">
                            <input name="city" id="city" class="input-info form-control" disabled type="text" value="<?php echo $row['city'] ?>">
                        </div>

                        <div class="col-sm-3 d-flex justify-content-start align-items-center">
                            <label for="post_code">Mã bưu chính:</label>
                        </div>
                        <div class="col-sm-9">
                            <input name="post_code" id="post_code" class="input-info form-control" disabled type="number" value="<?php echo $row['post_code'] ?>">
                        </div>
                    </div>

                    <div></div>
                    <div></div>
                    <div></div><br><br><br>

                    <div></div>
                    <div></div>


                    <?php
                    if ($row['user_type'] == 'tutor') {
                        $sql = "SELECT * FROM tutor_profile WHERE user_id=$user_id";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                                <div class="show_profile">
                                    <div class="row">
                                        <div class="col-sm-3 d-flex justify-content-start mt-2">
                                            <label for="avatar_image">Ảnh đại diện</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file mb-3">
                                                <input disabled type="file" class="input-info custom-file-input" id="avatar_image" name="avatar_image">
                                                <label class="custom-file-label" for="avatar_image">Chọn ảnh đại diện mới</label>
                                            </div>
                                            <!-- <label>Chọn ảnh đại diện mới</label>
                                            <input disabled class="input-info" type="file" name="avatar_image" id="avatar_image"> -->
                                            <img id="avatar_image_1" src="<?php echo $row['avatar_image'] ?>" alt="avatar" style="height: 300px; width: 400px;">
                                        </div>

                                        <div class="col-sm-3 d-flex justify-content-start mt-2">
                                            <label for=" profile_image">Ảnh hồ sơ</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div>
                                                <div class="custom-file mb-3">
                                                    <input disabled type="file" class="input-info custom-file-input" id="profile_image" name="profile_image">
                                                    <label class="custom-file-label" for="profile_image">Chọn ảnh hồ sơ mới</label>
                                                </div>
                                                <!-- <label>Chọn ảnh hồ sơ mới</label>
                                                <input disabled class="input-info" type="file" name="profile_image" id="profile_image"> -->
                                                <img id="profile_image_1" src="<?php echo $row['profile_image'] ?>" alt="profile" style="height: 300px; width: 400px;">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="experience">Kinh nghiệm:</label>
                                                <textarea class="form-control input-info experience" disabled rows="5" name="experience"><?php echo $row['experience']; ?></textarea>
                                            </div>
                                            <!-- <textarea class="input-info experience" disabled rows="5" cols="50" name="experience"><?php echo $row['experience']; ?></textarea> -->
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="info">Thông tin thêm:</label>
                                                <textarea class="form-control input-info info" disabled rows="5" name="info"><?php echo $row['info']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        // Add the following code if you want the name of the file appear on select
                                        $(".custom-file-input").on("change", function() {
                                            var fileName = $(this).val().split("\\").pop();
                                            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                                        });
                                    </script>
                                </div>


                                <?php
                            }
                        } else {
                            $sql = "INSERT INTO tutor_profile (experience, info, avatar_image, profile_image, user_id) 
                                    VALUES('', '', '$target_dir_avatar', '$target_dir_profile', $user_id)";
                            $result = mysqli_query($con, $sql);
                            $sql = "SELECT * FROM tutor_profile WHERE user_id=$user_id";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                ?>
                                    <div class="show_profile">
                                        <div class="row">
                                            <div class="col-sm-3 d-flex justify-content-start mt-2">
                                                <label for="avatar_image">Ảnh đại diện</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="custom-file mb-3">
                                                    <input disabled type="file" class="input-info custom-file-input" id="avatar_image" name="avatar_image">
                                                    <label class="custom-file-label" for="avatar_image">Chọn ảnh đại diện mới</label>
                                                </div>
                                                <!-- <label>Chọn ảnh đại diện mới</label>
                                            <input disabled class="input-info" type="file" name="avatar_image" id="avatar_image"> -->
                                                <img id="avatar_image_1" src="<?php echo $row['avatar_image'] ?>" alt="avatar" style="height: 300px; width: 400px;">
                                            </div>

                                            <div class="col-sm-3 d-flex justify-content-start mt-2">
                                                <label for="profile_image">Ảnh hồ sơ</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div>
                                                    <div class="custom-file mb-3">
                                                        <input disabled type="file" class="input-info custom-file-input" id="profile_image" name="profile_image">
                                                        <label class="custom-file-label" for="profile_image">Chọn ảnh hồ sơ mới</label>
                                                    </div>
                                                    <!-- <label>Chọn ảnh hồ sơ mới</label>
                                                <input disabled class="input-info" type="file" name="profile_image" id="profile_image"> -->
                                                    <img id="profile_image_1" src="<?php echo $row['profile_image'] ?>" alt="profile" style="height: 300px; width: 400px;">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="experience">Kinh nghiệm:</label>
                                                <textarea class="form-control input-info experience" disabled rows="5" name="experience"><?php echo $row['experience']; ?></textarea>
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="info">Thông tin thêm:</label>
                                                <textarea class="form-control input-info info" disabled rows="5" name="info"><?php echo $row['info']; ?></textarea>
                                            </div>
                                        </div>
                                <?php
                                }
                            }
                                ?>
                                    </div>
                    <?php
                        }
                    }
                }
            }
                    ?>
                    <script>
                        // Add the following code if you want the name of the file appear on select
                        $(".custom-file-input").on("change", function() {
                            var fileName = $(this).val().split("\\").pop();
                            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                        });
                    </script>
                </div>
                <!-- end of show info here -->
    </form>

    <!-- create new password -->
    <input name="new_password" id="new_password" type="button" value="Tạo mật khẩu mới" onclick="
                            loadFile('new-password', 'form_create_password.php');
                            document.getElementById('new_password').setAttribute('disabled', true);
                    ">
    <form class="form-password" action="" onsubmit="event.preventDefault();">
        <div class="new-password container-1"></div>
    </form>
    <div class="show-message-pass"></div>
    <!--end of create new password -->

</body>

</html>