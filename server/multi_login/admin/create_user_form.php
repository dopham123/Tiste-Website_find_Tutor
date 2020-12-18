<?php include('../functions/functions.php'); ?>
<?php require "../config.php"; ?>
<form method="post" action="" onsubmit="event.preventDefault();">

	<?php echo display_error(); ?>

	<div class="input-group">
		<label>Tên đăng nhập</label>
		<input type="text" name="username" value="">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value="">
	</div>
	<div class="input-group">
		<label>Loại tài khoản</label>
        <select name="user_type" id="user_type" class="user_type-class">
			<option selected value="tutor">Gia sư</option>
			<option value="user">Học viên</option>
		</select>
	</div>
	<div class="input-group">
		<label>Mật khẩu</label>
		<input type="password" name="password_1">
	</div>
	<div class="input-group">
		<label>Xác nhận mật khẩu</label>
		<input type="password" name="password_2">
	</div>
	<div class="input-group">
    <button onclick="createUser()" type="submit" class="button-a" id="create" style="background-color: #ccc">Tạo
        </button>	
    </div>

</form>