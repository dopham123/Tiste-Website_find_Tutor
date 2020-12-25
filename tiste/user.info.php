<?php include('../server/multi_login/functions/functions.php'); ?>
<?php require "../server/multi_login/config.php"; ?>

<?php
if (isLoggedIn() && isAdmin()) {
    header('location: ../server/multi_login/admin/homepage_admin.php');
}

if (!isLoggedIn()) {
    header('location: index.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- style css -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Tài Khoản</title>
    <style>
    </style>
</head>

<body>
    <div id="page-container">
        <header>
            <div class="header border">
                <div class="head_top">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="top-box">
                                    <ul class="sociel_link">
                                        <li class="size-60"> <a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="size-60"> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="size-60"> <a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li class="size-60"> <a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col d-flex align-items-center justify-content-end">
                                <?php
                                if (isTutor() || isStudent()) {
                                    $row = getInfo($_SESSION['user']['id']); ?>
                                    <div>
                                        <ul>
                                            <li><a href="user.info.php" class="buy text-center"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></a></li>
                                        </ul>
                                    </div>
                                    <div class="btn-logout">
                                        <a href="./index.php?logout='1'">Logout</a>
                                    </div>
                                <?php
                                } else { ?>
                                    <div>
                                        <ul>
                                            <li><a class=" buy text-center" href="./login.php">Đăng nhập</a></li>
                                        </ul>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col logo_section d-flex justify-content-center" style="padding-left: 0; text-align: center;">
                            <div class="logo">
                                <a href="index.php"><img src="images/logo.png" alt="logo" /></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                            <div class="menu-area">
                                <div class="limit-box">
                                    <nav class="main-menu">
                                        <ul class="menu-area-main d-flex-column justify-content-around">
                                            <li> <a href="index.php">Trang chủ</a> </li>
                                            <li> <a href="about.php">Giới thiệu</a> </li>
                                            <li> <a href="service.php">Dịch vụ</a> </li>
                                            <li> <a href="prices.php">Bảng giá</a> </li>
                                            <li> <a href="contact.php">Liên hệ</a> </li>
                                            <!-- <li> <a href="#">Đăng ký</a> </li> -->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- show user info -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 nopadding">
                    <ul class="nav nav-tabs nav-fill">
                        <li class="nav-item border-bottom border-primary">
                            <a class="nav-link active" href="user.info.php" style="font-weight: bold;">Thông tin cá nhân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user.account.php" style="color: #93999f">Thông tin tài khoản</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container border rounded mb-2">
            <!-- <div class="row d-flex justify-content-center align-items-center">
                <div class="col-sm-12 d-flex justify-content-center align-items-center p-3 border-bottom rounded">
                    <h1 style="font-weight: bold;">THÔNG TIN CÁ NHÂN CỦA BẠN</h1>
                </div>
            </div> -->
            <form style="margin-top: 1rem;" class="edit-form" method="POST" onsubmit="event.preventDefault()">
                <!-- show error here -->
                <!-- <div class="show-message"></div> -->
                <!-- show error here -->

                <!-- show info here -->
                <?php
                $user_id = $_SESSION['user']['id'];
                $sql = "SELECT * FROM users, users_info WHERE user_id=$user_id AND id=$user_id";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                        <div class="container form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="fname">Tên:</label>
                                                <input name="fname" id="fname" class="input-info form-control border-edited" disabled type="text" value="<?php echo $row['first_name'] ?>">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="lname">Họ lót:</label>
                                                <input name="lname" id="lname" class="input-info form-control border-edited" disabled type="text" value="<?php echo $row['last_name'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="user_type">Vai trò:</label>
                                                <?php
                                                if (strval($row['user_type']) == 'tutor') { ?>
                                                    <select onchange="changeUserTypeShow();" name="user_type" id="<?php echo $row['id'] ?>" class="user_type-class custom-select" disabled>
                                                        <option selected value="tutor">Gia sư</option>
                                                        <option value="user">Học viên</option>
                                                    </select>
                                                <?php
                                                } else if (strval($row['user_type']) == 'user') { ?>
                                                    <select onchange="changeUserTypeShow();" name="user_type" id="<?php echo $row['id'] ?>" class="user_type-class custom-select" disabled>
                                                        <option value="tutor">Gia sư</option>
                                                        <option selected value="user">Học viên</option>
                                                    </select>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="gender">Giới tính:</label>
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
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input name="email" id="email" class="input-info form-control border-edited" disabled type="email" value="<?php echo $row['email'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="phone_number">Số điện thoại:</label>
                                                <input name="phone_number" id="phone_number" class="input-info form-control border-edited" disabled type="number" value="<?php echo $row['phone_number'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="address_1">Địa chỉ 1:</label>
                                        <input name="address_1" id="address_1" class="input-info form-control border-edited" disabled type="text" value="<?php echo $row['address_1'] ?>">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="address_2">Địa chỉ 2:</label>
                                        <input name="address_2" id="address_2" class="input-info form-control border-edited" disabled type="text" value="<?php echo $row['address_2'] ?>">
                                    </div>
                                </div>

                                <div class=col-sm-12>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="district">Quận/Huyện:</label>
                                                <input name="district" id="district" class="input-info form-control border-edited" disabled type="text" value="<?php echo $row['district'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="city">Thành phố:</label>
                                                <input name="city" id="city" class="input-info form-control border-edited" disabled type="text" value="<?php echo $row['city'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="post_code">Mã bưu chính:</label>
                                        <input name="post_code" id="post_code" class="input-info form-control border-edited" disabled type="number" value="<?php echo $row['post_code'] ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="show_profile">
                                <?php
                                if ($row['user_type'] == 'tutor') {
                                    $sql = "SELECT * FROM tutor_profile WHERE user_id=$user_id";
                                    $result = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                                            <div class="row">
                                                <div class="col-sm-6 d-flex justify-content-start mt-2">
                                                    <label for="avatar_image">Ảnh đại diện</label>
                                                </div>

                                                <div class="col-sm-6 d-flex justify-content-start mt-2">
                                                    <label for=" profile_image">Ảnh hồ sơ</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-file mb-3">
                                                        <input disabled type="file" class="input-info custom-file-input" id="avatar_image" name="avatar_image">
                                                        <label class="custom-file-label" for="avatar_image">Chọn ảnh đại diện mới</label>
                                                    </div>
                                                    <div class="img-container">
                                                        <img class="ava-pro-img-format img-fluid img-thumbnail" id="avatar_image_1" src="../../resource/img_avatar/<?php echo $row['avatar_image'] ?>" alt="avatar">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div>
                                                        <div class="custom-file mb-3">
                                                            <input disabled type="file" class="input-info custom-file-input" id="profile_image" name="profile_image">
                                                            <label class="custom-file-label" for="profile_image">Chọn ảnh hồ sơ mới</label>
                                                        </div>
                                                        <div class="img-container">
                                                            <img class="ava-pro-img-format img-fluid img-thumbnail" id="profile_image_1" src="../../resource/img_profile/<?php echo $row['profile_image'] ?>" alt="profile">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="experience">Kinh nghiệm:</label>
                                                        <textarea class="form-control border-edited input-info experience" disabled rows="5" name="experience"><?php echo $row['experience']; ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="info">Thông tin thêm:</label>
                                                        <textarea class="form-control border-edited input-info info" disabled rows="5" name="info"><?php echo $row['info']; ?></textarea>
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
                                                <div class="row">
                                                    <div class="col-sm-6 d-flex justify-content-start mt-2">
                                                        <label for="avatar_image">Ảnh đại diện</label>
                                                    </div>

                                                    <div class="col-sm-6 d-flex justify-content-start mt-2">
                                                        <label for="profile_image">Ảnh hồ sơ</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="custom-file mb-3">
                                                            <input disabled type="file" class="input-info custom-file-input" id="avatar_image" name="avatar_image">
                                                            <label class="custom-file-label" for="avatar_image">Chọn ảnh đại diện mới</label>
                                                        </div>
                                                        <div class="img-container">
                                                            <img class="ava-pro-img-format img-fluid img-thumbnail" id="avatar_image_1" src="../../resource/img_avatar/<?php echo $row['avatar_image'] ?>" alt="avatar">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div>
                                                            <div class="custom-file mb-3">
                                                                <input disabled type="file" class="input-info custom-file-input" id="profile_image" name="profile_image">
                                                                <label class="custom-file-label" for="profile_image">Chọn ảnh hồ sơ mới</label>
                                                            </div>
                                                            <div class="img-container">
                                                                <img class="ava-pro-img-format img-fluid img-thumbnail" id="profile_image_1" src="../../resource/img_profile/<?php echo $row['profile_image'] ?>" alt="profile">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <label for="experience">Kinh nghiệm:</label>
                                                        <textarea class="form-control border-edited input-info experience" disabled rows="5" name="experience"><?php echo $row['experience']; ?></textarea>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <label for="info">Thông tin thêm:</label>
                                                        <textarea class="form-control border-edited input-info info" disabled rows="5" name="info"><?php echo $row['info']; ?></textarea>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                            </div>
                            <script>
                                // Add the following code if you want the name of the file appear on select
                                $(".custom-file-input").on("change", function() {
                                    var fileName = $(this).val().split("\\").pop();
                                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                                });
                            </script>
                        </div>
                        <div class="container mb-2">
                            <div class="row">
                                <div class="col-sm-12 d-flex justify-content-end align-items-center">
                                    <button onclick="enableEdit('input-info');" class="btn btn-primary mr-2" name="button-edit">Edit
                                    </button>
                                    <button onclick="enableEdit('input-info');" class="btn btn-success mr-2" name="button-edit" style="background-color: green;">Save
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end of show info here -->


            </form>
        </div>
        <!--  show user info -->

        <footer>
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <ul class="sociel">
                                <li> <a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li> <a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <p style="text-align: center; color: white;">Copyright 2020 All Right Reserved By Tiste Education
                        Corporation</p>
                </div>
            </div>
        </footer>
        <!-- end footer -->
    </div>
</body>


</html>