<?php include('../functions/functions.php'); ?>
<?php require "../config.php"; ?>
<form method="post" action="" onsubmit="event.preventDefault();">

	<?php echo display_error(); ?>
	<div class="row d-flex justify-content-center">
		<div class="col-sm-3 d-flex justify-content-start align-items-center">
			<label>Tên đăng nhập:</label>
		</div>
		<div class="col-sm-7">
			<input class="form-control" type="text" name="username" value="">
		</div>

		<div class="col-sm-3 d-flex justify-content-start align-items-center">
			<label>Email:</label>
		</div>
		<div class="col-sm-7">
			<input class="form-control" type="email" name="email" value="">
		</div>

		<div class="col-sm-3 d-flex justify-content-start align-items-center">
			<label>Loại tài khoản</label>
		</div>
		<div class="col-sm-7">
			<select name="user_type" id="user_type" class="user_type-class">
				<option selected value="tutor">Gia sư</option>
				<option value="user">Học viên</option>
			</select>
		</div>
		<div class="col-sm-3 d-flex justify-content-start align-items-center">
			<label>Mật khẩu:</label>
		</div>
		<div class="col-sm-7">
			<input class="form-control" type="password" name="password_1">
		</div>
		<div class="col-sm-3 d-flex justify-content-start align-items-center">
			<label>Xác nhận mật khẩu:</label>
		</div>
		<div class="col-sm-7">
			<input class="form-control" type="password" name="password_2">
		</div>

		<div class="col-sm-10 d-flex justify-content-end align-items-center mt-2">
			<button onclick="
				createUser();
			" type="submit" class="btn btn-primary" id="create">Tạo
			</button>
			<button class="btn btn-danger" name="cancel" onclick="
            $('.add-new-user').html('');
        ">Huỷ</button>
		</div>
	</div>

</form>