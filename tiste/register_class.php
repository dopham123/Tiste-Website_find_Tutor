<?php
include '../server/multi_login/config.php';
?>

<?php include('../server/multi_login/functions/functions.php'); ?>
<?php
if (isLoggedIn() && isAdmin()) {
    header('location: ../server/multi_login/admin/homepage_admin.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-register-class.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <title>Dịch vụ</title>
</head>

<body>
    <header>
        <div class="header">
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
                                        <li><a class="buy text-center"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></a></li>
                                        <a href="register_class.php" style="color: #678804; border-right:solid 2px grey;">Đăng ký mở lớp </a>
                                        <a href="./index.php?logout='1'" style="color: red; padding-left: 5px;">Logout</a>
                                    </ul>
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
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col logo_section d-flex justify-content-center"
                        style="padding-left: 0; text-align: center;">
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
                                        <li> <a href="prices.php">BẢng giá</a> </li>
                                        <li> <a href="contact.php">Liên hệ</a> </li>
                                        <li> <a href="#">Đăng ký</a> </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>ĐĂNG KÝ MỞ LỚP</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body-form-class">
    <div class="header-form">
        <h2>Điền Thông Tin Lớp Học</h2>
    </div>
    <form method="post" action="service.php">
        <div class="input-group">
            <label>Môn Học</label>
            <input type="text" name="subject" placeholder="Ex: 'Toán'" require>
        </div>
        <div class="input-group">
            <label>Lớp</label>
            <input type="text" name="class" placeholder="Ex: '1 - 3'">
        </div>
        <div class="input-group">
            <label>Học phí mỗi tháng(Triệu Đồng)</label>
            <input type="text" name="salary" placeholder="Ex: '2'">
        </div>
        <div class="input-group">
            <label>Số lượng học sinh</label>
            <input type="text" name="num-of-std" placeholder="Ex: '10'">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="register_class">Gửi Đăng Ký</button>
        </div>
    </form>
    </div>
    

    <!--  footer -->

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
</body>

</html>