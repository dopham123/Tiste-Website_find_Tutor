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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <title>Giới thiệu</title>
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
                                        <a href="./index.php?logout='1'" style="color: red;">logout</a>
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
                                        <li class="active"> <a href="about.php">Giới thiệu</a> </li>
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
    <!--   -->

    <div class="about">
        <div class="container">
            <div class="about_box">
                <div class="title">
                    <h2>Tiste</h2>
                    <span>Vì nền giáo dục Việt</span>
                </div>
                <p>Website <span class="tiste">Tiste</span> được thành lập vào tháng 11/2010 bởi những sinh viên Đại Học
                    Bách Khoa TPHCM.</p>
                <p>Sau hơn 10 năm hoạt động, <span class="tiste">Tiste</span> đã trở thành website tìm gia sư số 1 Việt
                    Nam và đạt được nhiều giải thưởng lớn.</p>
            </div>
        </div>
    </div>
    <!-- CHOOSE  -->
    <div class="banner">
        <div class="title">
            <h2>Tiste</h2>
            <span>Uy tín - Chất lượng tạo nên thành công</span>
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
                            <p><span class="tiste"><a href="contact.php">Trung tâm CSKH</a></span> của <span
                                    class="tiste">Tiste</span> luôn sẵn sàng 24/24 để giải đáp thắc mắc của bạn.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end CHOOSE -->
    <div class="service">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="title">
                        <h2>Tiste</h2>
                        <span>Sự hài lòng của khách hàng là mục tiêu</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="service-box height-400px">
                        <i><img src="icon/service1.png" alt="icon" /></i>
                        <h3>Tìm kiếm dễ dàng</h3>
                        <p>Chỉ mất 1 phút để tìm kiếm dịch vụ mong muốn trên <span class="tiste">Tiste</span></p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="service-box height-400px">
                        <i><img src="icon/service2.png" alt="icon" /></i>
                        <h3>Chi phí hợp lý</h3>
                        <p>Chi phí hoa hồng thấp hơn các trung tâm gia sư truyền thống khác</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="service-box height-400px">
                        <i><img src="icon/service3.png" alt="icon" /></i>
                        <h3>Gia sư chất lượng</h3>
                        <p>Gia sư <span class="tiste">Tiste</span> phải trải qua 3 vòng kiểm tra kiến thức gắt gao</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="service-box height-400px">
                        <i><img src="icon/service6.png" alt="icon" /></i>
                        <h3>Website của năm</h3>
                        <p><span class="tiste">Tiste</span> vinh dự được trao thưởng giải Website của năm của Hội XYZ
                            năm 2020</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">

                </div>
            </div>
        </div>
    </div>
    <!-- Leader -->
    <div class="service">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="title">
                        <h2>Tiste</h2>
                        <span>Lãnh đạo ưu tú dẫn lối thành công</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <!-- empty -->
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="service-box height-400px">
                        <i><img src="images/director.jpg" alt="icon" /></i>
                        <h3>Luc Le</h3>
                        <p>(Chủ tịch)</p>
                        <p>Tốt nghiệp Đại Học Bách Khoa TPHCM chuyên ngành CNTT</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <!-- empty -->
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="service-box height-400px">
                        <i><img src="./images/CEO1.jpg" alt="icon" /></i>
                        <h3>Lau Truong</h3>
                        <p>(CEO - Co-Founder)</p>
                        <p>Tốt nghiệp Đại Học Bách Khoa TPHCM chuyên ngành CNTT</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="service-box height-400px">
                        <i><img src="./images/CEO2.jpg" alt="icon" /></i>
                        <h3>Khoi Pham</h3>
                        <p>(CEO - Co-Founder)</p>
                        <p>Tốt nghiệp Đại Học Bách Khoa TPHCM chuyên ngành CNTT</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="service-box height-400px">
                        <i><img src="./images/CEO3.jpg" alt="icon" /></i>
                        <h3>Do Pham</h3>
                        <p>(CEO - Co-Founder)</p>
                        <p>Tốt nghiệp Đại Học Bách Khoa TPHCM chuyên ngành CNTT</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="service">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="title">
                            <h2>Tiste</h2>
                            <span>Những đối tác đồng hành</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                        <div class="service-box height-200px">
                            <i><img src="./images/logo-báo-tiền-phong.png" alt="icon"/></i>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                        <div class="service-box height-200px">
                            <i><img src="./images/logo-tn.png" alt="icon"/></i>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                        <div class="service-box height-200px">
                            <i><img src="./images/Vietnamnet-Logo.png" alt="icon"/></i>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                        <div class="service-box height-200px">
                            <i><img src="./images/unnamed.png" alt="icon"/></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>
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
                </div>
                <p style="text-align: center; color: white;">Copyright 2020 All Right Reserved By Tiste Education
                    Corporation</p>
            </div>
        </footer>
    </body>

</html>