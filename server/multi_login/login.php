<?php 
include('functions.php');

if (isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ./admin/homepage_admin.php');
}

if (isUser()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ./index.php');
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Login</h2>
	</div>
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Tên đăng nhập</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Mật khẩu</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
</body>
</html>