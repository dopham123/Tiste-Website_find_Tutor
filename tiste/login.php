<?php include('../server/multi_login/functions/functions.php'); ?>

<?php
if (isAdmin()) {
	header('location: ../server/multi_login/admin/homepage_admin.php');
}

if (isTutor() || isStudent()) {
	header('location: ./index.php');
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
	<title>Đăng nhập</title>
	<style>
		.welcom-login-format {
			font-size: 2rem;
			color: #20aeff;
		}

		.login-grid {
			display: grid;
			grid-template-columns: 1fr 3fr;
		}

		.form-control-edited {
			margin-bottom: 1rem;
			margin-top: 1rem;
		}

		input.input-login {
			border-radius: 1rem;
			background-color: white;
			border: 2px solid black;
			box-shadow: none !important;
			padding-left: 10px;
			padding: 0.6rem 0.75rem;
		}

		.white-bg-login {
			background: #fff;
			padding: 40px 20px;
			margin-bottom: 0;
		}

		.blue-bg-login {
			background-color: #09a6ff;
		}

		.label-edited-login {
			font-size: 0.8rem;
			font-weight: bold;
			color: white;
			padding-top: 0.7rem;
		}

		.login-btn {
			background-color: #0c6cc2;
			color: white;
		}
	</style>
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
	<!-- login -->
	<div class="container-fluid d-flex justify-content-center align-items-center border" style="padding: 10.6vh;">
		<div class="row">
			<div class="container d-flex justify-content-center align-items-center white-bg-login">
				<div class="row bg-white width-100 d-flex justify-content-center">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="">
							<h2 class="font-weight-bold welcom-login-format text-center">CHÀO MỪNG BẠN TRỞ LẠI VỚI TISTE</h2>
						</div>
					</div>
					<div class="col-sm-6 border border-info rounded blue-bg-login">
						<form method="post" action="login.php">
							<?php echo display_error(); ?>
							<div class="row">
								<div class="col-sm-12 d-flex justify-content-start mt-2">
									<h1 style="color: white; font-weight: bold;">ĐĂNG NHẬP</h1>
								</div>
								<div class="col-sm-3 d-flex align-items-center">
									<label for="username" class="label-edited-login">Tên đăng nhập<span class="required" id="username-error"></span></label>
								</div>
								<div class="col-sm-9 d-flex justify-content-center align-items-center">
									<input type="text" name="username" class="form-control form-control-edited input-login" id="username" placeholder="wibuneverdie" required>
								</div>
								<div class="col-sm-3 d-flex align-items-center">
									<label for="password" class="label-edited-login">Mật khẩu</label> <span style="color: red;" id="password-error"></span>
								</div>
								<div class="col-sm-9">
									<input type="password" name="password" class="form-control form-control-edited input-login" id="password" placeholder="*******" required>
								</div>
							</div>
							<div class="row pb-4 pt-2">
								<div class="col-sm-12 d-flex align-items-center justify-content-end">
									<button type="submit" class="login-btn rounded-pill border border-dark" name="login_btn">Đăng nhập</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-sm-12 d-flex align-items-center justify-content-center">
						<p class="font-weight-bold">
						 	Bạn chưa có tài khoản? <a href="../server/multi_login/register.php"><u style="color: blue;">Đăng ký ngay</u></a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--  login -->

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