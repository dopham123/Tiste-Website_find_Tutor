<?php include('../server/multi_login/functions/functions.php'); ?>
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
    <title>Đăng Ký</title>
    <style>
    </style>
</head>

<body>
    <?php echo display_error_alert(); ?>
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
                            <!-- <div class="col d-flex align-items-center justify-content-end">
							<div>
								<ul>
									<li><a class="buy text-center" href="#">Đăng nhập</a></li>
								</ul>
							</div>
						</div> -->
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
                                            <li class="active"> <a href="#">Đăng ký</a> </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- register -->
        <div class="container-fluid d-flex justify-content-center align-items-center pb-5">
            <div class="row">
                <div class="container d-flex justify-content-center align-items-center white-bg-login">
                    <div class="row bg-white width-100 d-flex justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 bg-full-img d-flex justify-content-center align-items-center mb-2">
                            <div class="row">
                                <div class="col-sm-12 d-flex justify-content-center">
                                    <h1 style="color: white;">Đăng ký tại Tiste</h1>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-center text-center">
                                    <p style="color: white;">Nếu bạn là một gia sư hoặc sinh viên muốn tận dụng Tiste, vui lòng điền vào biểu mẫu bên dưới. Nếu bất kỳ sinh viên / gia sư nào xem trang này tìm kiếm các tiêu chí của bạn, chúng tôi sẽ cho họ cơ hội liên hệ với bạn.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-10 nopadding mb-2" style="background-color: #ccc;">
                            <ul class="nav nav-pills nav-fill">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">THÔNG TIN CÁ NHÂN</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-10 border border-info rounded mt-2">
                            <form method="post" action="register_info.php">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tên</label>
                                            <input class="form-control border-edited" type="text" name="fname" value="<?php echo $fname; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Họ lót</label>
                                            <input class="form-control border-edited" type="text" name="lname" value="<?php echo $lname; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Giới tính</label>
                                            <select class="input-info user_type-class custom-select" name="gender">
                                                <option selected value="male">Nam</option>
                                                <option value="female">Nữ</option>
                                                <option value="other">Khác</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input class="form-control border-edited" type="number" name="phone_number" value="<?php echo $phone_number; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Địa chỉ 1</label>
                                            <input class="form-control border-edited" type="text" name="address_1" value="<?php echo $address_1; ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Địa chỉ 2</label>
                                            <input class="form-control border-edited" type="text" name="address_2" value="<?php echo $address_2; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Quận/Huyện</label>
                                            <input class="form-control border-edited" type="text" name="district" value="<?php echo $district; ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Tỉnh/Thành phố</label>
                                            <input class="form-control border-edited" type="text" name="city" value="<?php echo $city; ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Mã bưu chính</label>
                                            <input class="form-control border-edited" type="number" name="post_code" value="<?php echo $post_code; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" name="register_info_btn">Tiếp tục</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--  end register -->

        <footer>
            <div class="footer" style="position: absolute;
									bottom: 0;
									width: 100%;
									">
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