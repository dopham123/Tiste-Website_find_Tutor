<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- style css -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Price</title>
</head>

<body>
    <?php include('../server/multi_login/functions/prices-info.php');?>
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
                            <div>
                                <ul>
                                    <li><a class="buy text-center" href="#">Đăng nhập</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col logo_section d-flex justify-content-center"
                        style="padding-left: 0; text-align: center;">
                        <div class="logo">
                            <a href="index.html"><img src="images/logo.png" alt="logo" /></a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main d-flex-column justify-content-around">
                                        <li> <a href="index.html">Trang chủ</a> </li>
                                        <li> <a href="about.html">Giới thiệu</a> </li>
                                        <li> <a href="service.html">Dịch vụ</a> </li>
                                        <li class="active"> <a href="prices.html">Bảng giá</a> </li>
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
                        <h2>Bảng Giá Gia Sư Dạy Kèm Tại Nhà TPHCM</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service price -->
    <div class="">
        <div class="product-bg-white">
            <div class="container">
                <div class="row">
                    <?php
                        for($i = 0; $i < count($data); $i++){
                    ?>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                        <table class="table table-cell-font-format text-center bg-table-1">
                            <thead class="caption-class">
                                <tr>
                                    <th scope="col" colspan="3" class="table-cell-head-format"><span>Lớp 2
                                            buổi/tuần</span> <span class="d-block text-dark">(8 buổi/tháng)</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Sinh viên</th>
                                    <th scope="col">Giảng viên</th>
                                </tr>
                                <tr>
                                    <th scope="row">Lớp <span class="d-block">1-5</span></th>
                                    <td>1.000.000</td>
                                    <td>1.400.000 <span class="d-block">-</span> 1.600.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Lớp <span class="d-block">6-9</span></th>
                                    <td>1.100.000 <span class="d-block">-</span> 1.200.000</td>
                                    <td>1.600.000 <span class="d-block">-</span> 1.800.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Lớp <span class="d-block">10-12</span></th>
                                    <td>1.300.000 <span class="d-block">-</span> 1.500.000</td>
                                    <td>1.800.000 <span class="d-block">-</span> 2.000.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Luyện thi đại học</th>
                                    <td>1.800.000 <span class="d-block">-</span> 2.000.000</td>
                                    <td>2.000.000 <span class="d-block">-</span> 2.200.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Toán cao cấp</th>
                                    <td>2.000.000 <span class="d-block">-</span> 2.200.000</td>
                                    <td>2.400.000 <span class="d-block">-</span> 2.600.000</td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="3"> <button type="button"
                                            class="btn btn-success hover-button bg-button-1">Xem chi tiết</button></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php
                        }
                    ?>
                    <!-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                        <table class="table table-cell-font-format text-center bg-table-2">
                            <thead class="caption-class">
                                <tr>
                                    <th scope="col" colspan="3" class="table-cell-head-format"><span>Lớp 3
                                            buổi/tuần</span> <span class="d-block text-dark">(12 buổi/tháng)</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Sinh viên</th>
                                    <th scope="col">Giảng viên</th>
                                </tr>
                                <tr>
                                    <th scope="row">Lớp <span class="d-block">1-5</span></th>
                                    <td>1.300.000 <span class="d-block">-</span> 1.400.000</td>
                                    <td>2.200.000 <span class="d-block">-</span> 2.400.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Lớp <span class="d-block">6-9</span></th>
                                    <td>1.600.000 <span class="d-block">-</span> 1.800.000</td>
                                    <td>2.400.000 <span class="d-block">-</span> 2.800.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Lớp <span class="d-block">10-12</span></th>
                                    <td>1.800.000 <span class="d-block">-</span> 2.200.000</td>
                                    <td>2.800.000 <span class="d-block">-</span> 3.000.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Luyện thi đại học</th>
                                    <td>2.000.000 <span class="d-block">-</span> 2.400.000</td>
                                    <td>3.200.000 <span class="d-block">-</span> 3.600.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Toán cao cấp</th>
                                    <td>2.400.000 <span class="d-block">-</span> 2.600.000</td>
                                    <td>3.800.000 <span class="d-block">-</span> 4.000.000</td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="3"><button type="button"
                                            class="btn btn-success hover-button bg-button-2">Xem chi tiết</button></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 text-center">
                        <table class="table table-cell-font-format text-center bg-table-3">
                            <thead class="caption-class">
                                <tr>
                                    <th scope="col" colspan="3" class="table-cell-head-format"><span>Lớp 5
                                            buổi/tuần</span> <span class="d-block text-dark">(20 buổi/tháng)</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Sinh viên</th>
                                    <th scope="col">Giảng viên</th>
                                </tr>
                                <tr>
                                    <th scope="row">Lớp <span class="d-block">1-5</span></th>
                                    <td>2.000.000 <span class="d-block">-</span> 2.400.000</td>
                                    <td>3.500.000 <span class="d-block">-</span> 4.000.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Lớp <span class="d-block">6-9</span></th>
                                    <td>2.400.000 <span class="d-block">-</span> 2.600.000</td>
                                    <td>4.000.000 <span class="d-block">-</span> 4.500.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Lớp <span class="d-block">10-12</span></th>
                                    <td>2.800.000 <span class="d-block">-</span> 3.000.000</td>
                                    <td>4.500.000 <span class="d-block">-</span> 5.000.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Luyện thi đại học</th>
                                    <td>3.200.000 <span class="d-block">-</span> 3.600.000</td>
                                    <td>5.200.000 <span class="d-block">-</span> 5.500.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Toán cao cấp</th>
                                    <td>3.800.000 <span class="d-block">-</span> 4.000.000</td>
                                    <td>5.800.000 <span class="d-block">-</span> 6.000.000</td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="3"><button type="button"
                                            class="btn btn-success hover-button bg-button-3">Xem chi tiết</button></th>
                                </tr>
                            </tbody>
                        </table>
                    </div> -->
                </div>
            </div>
        </div>
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