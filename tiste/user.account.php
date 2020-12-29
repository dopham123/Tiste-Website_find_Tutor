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
    <script src="../server/multi_login/functions/functions.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Tài Khoản</title>
    <style>
    </style>
</head>

<body>
    <!-- show error here -->
    <div class="show-message"></div>
    <!-- show error here -->
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
                                        <a href="./index.php?logout='1'">Đăng xuất</a>
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
                        <li class="nav-item">
                            <a class="nav-link" href="user.info.php?user_id=<?php echo $_SESSION['user']['id'] ?>" style="color: #93999f">Thông tin cá nhân</a>
                        </li>
                        <li class="nav-item border-bottom border-primary">
                            <a class="nav-link active" href="user.account.php?user_id=<?php echo $_SESSION['user']['id'] ?>" style="font-weight: bold;">Thông tin tài khoản</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container border rounded mb-2">
            <!-- <div class="row d-flex justify-content-center align-items-center">
                <div class="col-sm-12 d-flex justify-content-center align-items-center p-3 border-bottom rounded">
                    <h1 style="font-weight: bold;">THÔNG TIN TÀI KHOẢN CỦA BẠN</h1>
                </div>
            </div> -->
            <form style="margin-top: 1rem;" class="edit-form" method="POST" onsubmit="event.preventDefault()">

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
                                    <div class="form-group">
                                        <label for="username">Tên đăng nhập:</label>
                                        <input name="username" id="username" class="input-info form-control border-edited" disabled type="text" value="<?php echo $row['username'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="current_password">Mật khẩu hiện tại:</label>
                                        <input name="current_password" id="current_password" class="input-info form-control border-edited" type="password" value="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="password">Mật khẩu mới</label>
                                                <input name="password" id="password" class="input-info form-control border-edited" type="password" value="">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="confirm_password">Nhập lại mật khẩu mới</label>
                                                <input name="confirm_password" id="confirm_password" class="input-info form-control border-edited" type="password" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                    <?php
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
                        <div class="container mb-2">
                            <div class="row">
                                <div class="col-sm-12 d-flex justify-content-end align-items-center">
                                    <button onclick="changePassword();" class="btn btn-success mr-2" name="button-edit" style="background-color: green;">Save
                                    </button>
                                </div>
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