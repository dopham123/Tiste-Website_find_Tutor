<?php include('../functions/functions.php'); ?>
<?php require "../config.php"; ?>
<?php
$target_dir_profile = "";
$target_dir_avatar = "";
$user_id = $_GET['user_id'];
$sql = "SELECT * FROM tutor_profile WHERE user_id=$user_id";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
		<div class="row">
			<div class="col-sm-6 d-flex justify-content-start mt-2">
				<label for="avatar_image">Ảnh đại diện</label>
			</div>

			<div class="col-sm-6 d-flex justify-content-start mt-2">
				<label for=" profile_image">Ảnh hồ sơ</label>
			</div>
			<div class="col-sm-6">
				<div class="custom-file mb-3">
					<input type="file" class="input-info custom-file-input" id="avatar_image" name="avatar_image">
					<label class="custom-file-label" for="avatar_image">Chọn ảnh đại diện mới</label>
				</div>
				<div class="img-container">
					<img class="ava-pro-img-format img-fluid img-thumbnail" id="avatar_image_1" src="../../resource/img_avatar/<?php echo $row['avatar_image'] ?>" alt="avatar">
				</div>
			</div>

			<div class="col-sm-6">
				<div>
					<div class="custom-file mb-3">
						<input type="file" class="input-info custom-file-input" id="profile_image" name="profile_image">
						<label class="custom-file-label" for="profile_image">Chọn ảnh hồ sơ mới</label>
					</div>
					<div class="img-container">
						<img class="ava-pro-img-format img-fluid img-thumbnail" id="profile_image_1" src="../../resource/img_profile/<?php echo $row['profile_image'] ?>" alt="profile">
					</div>
				</div>
			</div>

			<div class="col-sm-12">
				<div class="form-group">
					<label for="experience">Kinh nghiệm:</label>
					<textarea class="form-control input-info experience" rows="5" name="experience"><?php echo $row['experience']; ?></textarea>
				</div>
				<!-- <textarea class="input-info experience" disabled rows="5" cols="50" name="experience"><?php echo $row['experience']; ?></textarea> -->
			</div>

			<div class="col-sm-12">
				<div class="form-group">
					<label for="info">Thông tin thêm:</label>
					<textarea class="form-control input-info info" rows="5" name="info"><?php echo $row['info']; ?></textarea>
				</div>
			</div>
		</div>


		<?php
	}
} else {
	$sql = "INSERT INTO tutor_profile (experience, info, avatar_image, profile_image, user_id) 
			VALUES('', '', '$target_dir_avatar', '$target_dir_profile', $user_id)";
	$result = mysqli_query($con, $sql);
	$sql = "SELECT * FROM tutor_profile WHERE user_id=$user_id";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		?>
			<div class="row">
				<div class="col-sm-6 d-flex justify-content-start mt-2">
					<label for="avatar_image">Ảnh đại diện</label>
				</div>

				<div class="col-sm-6 d-flex justify-content-start mt-2">
					<label for=" profile_image">Ảnh hồ sơ</label>
				</div>
				<div class="col-sm-6">
					<div class="custom-file mb-3">
						<input type="file" class="input-info custom-file-input" id="avatar_image" name="avatar_image">
						<label class="custom-file-label" for="avatar_image">Chọn ảnh đại diện mới</label>
					</div>
					<div class="img-container">
						<img class="ava-pro-img-format img-fluid img-thumbnail" id="avatar_image_1" src="../../resource/img_avatar/<?php echo $row['avatar_image'] ?>" alt="avatar">
					</div>
				</div>

				<div class="col-sm-6">
					<div>
						<div class="custom-file mb-3">
							<input type="file" class="input-info custom-file-input" id="profile_image" name="profile_image">
							<label class="custom-file-label" for="profile_image">Chọn ảnh hồ sơ mới</label>
						</div>
						<div class="img-container">
							<img class="ava-pro-img-format img-fluid img-thumbnail" id="profile_image_1" src="../../resource/img_profile/<?php echo $row['profile_image'] ?>" alt="profile">
						</div>
					</div>
				</div>

				<div class="col-sm-12">
					<label for="experience">Kinh nghiệm:</label>
					<textarea class="form-control input-info experience" rows="5" name="experience"><?php echo $row['experience']; ?></textarea>
				</div>

				<div class="col-sm-12">
					<label for="info">Thông tin thêm:</label>
					<textarea class="form-control input-info info" rows="5" name="info"><?php echo $row['info']; ?></textarea>
				</div>
			</div>
	<?php
		}
	}
	?>
<?php
}
?>