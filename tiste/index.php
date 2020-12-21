<?php include('../server/multi_login/functions/functions.php'); ?>
<?php
if (isLoggedIn() && isAdmin()) {
    header('location: ../server/multi_login/admin/homepage_admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <title>Trang chủ</title>
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
                                        <li><a class="buy text-center"><?php echo $row['first_name'] . ' ' .$row['last_name'] ; ?></a></li>
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
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col logo_section d-flex justify-content-center" style="padding-left: 0; text-align: center;">
                        <div class="logo">
                            <a href="index.html"><img src="images/logo.png" alt="logo" /></a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main d-flex-column justify-content-around">
                                        <li class="active"> <a href="index.html">Trang chủ</a> </li>
                                        <li> <a href="about.html">Giới thiệu</a> </li>
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
    <section class="slider_section">
        <div id="main_slider" class="carousel slide banner-main" data-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <video class="page-header__video" autoplay="" loop="" muted="">
                        <source src="video/index-bg.mp4" type="video/mp4">
                    </video>


                    <div class="carousel-caption relative">
                        <h1 style="color: white;"><strong class="yellow_bold" style="font-size: larger;">Tiste</strong><br>Vì nền giáo dục Việt<br>
                        </h1>
                        <p>Nơi tốt nhất để tìm kiếm gia sư cho bạn</p>
                        <a href="service.php">Tìm gia sư</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CHOOSE  -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-7 offset-md-3">
                    <div class="title">
                        <h2>Tại sao lại là Tiste?</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="choose_bg">
        <div class="container">
            <div class="white_bg">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="for_box">
                            <i><img src="icon/Icon_Tutors.png" alt="icon" /></i>
                            <h3>Gia sư chất lượng</h3>
                            <p>Gia sư của <span class="tiste">Tiste</span> được tuyển chọn cẩn thận, trình độ chuyên môn
                                cao và thái độ chuyên nghiệp</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="for_box">
                            <i><img src="icon/Icon_Mem.png" alt="icon" /></i>
                            <h3>Phủ sóng cả nước</h3>
                            <p><span class="tiste">Tiste</span> tự hào được cộng tác với hơn 200.000 gia sư trên cả
                                nước.</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="for_box">
                            <i><img src="icon/Icon_Subjects.png" alt="icon" /></i>
                            <h3>Môn học đa dạng</h3>
                            <p>Hệ thống môn học vô cùng phong phú, từ các môn văn hóa cho tới các môn năng khiếu.</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="for_box">
                            <i><img src="icon/Icon_Personal.png" alt="icon" /></i>
                            <h3>Hỗ trợ tận tâm</h3>
                            <p><span class="tiste"><a href="contact.php">Trung tâm CSKH</a></span> của <span class="tiste">Tiste</span> luôn sẵn sàng 24/24 để giải đáp thắc mắc của bạn.</p>
                        </div>
                    </div>
                </div>
                <div class="read-more">
                    <a href="about.html">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end CHOOSE -->

    <!-- what client say -->
    <div class="product-bg">
        <div class="Clients_bg_white">
            <div class="container">
                <div id="client_slider" class="carousel slide banner_Client" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="carousel-caption text-bg">
                                    <div class="img_bg">
                                        <i><img src="images/steve.png" alt="icon" /><span>Luc Le (Chủ tịch)<br><strong class="date">28/10/2020</strong></span></i>
                                    </div>
                                    <p style="font-style: italic;">Trong bối cảnh mà xã hội thay đổi không ngừng thì
                                        những thương hiệu tồn tại lâu dài là những thương hiệu được tạo dựng từ trái tim
                                        – điều đó khiến chúng bền vững và chân thật hơn. Những công ty này cũng mạnh hơn
                                        vì họ xây dựng thương hiệu dựa trên chính tâm hồn của con người, không phải từ
                                        những quảng cáo. Những công ty đúng nghĩa sẽ là những công ty tồn tại lâu dài.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- end our services -->
    <!-- map -->
    <div class="container-fluid padin">
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4272.728587798533!2d106.80426879135803!3d10.879283864146885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x29d5aeb365cee20b!2sKTX%20Khu%20A%20%C4%90HQG%20TP.HCM!5e0!3m2!1svi!2s!4v1606484954232!5m2!1svi!2s" height="650" style="border:0; width: 100%;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
    <!-- end map -->

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