<?php include('../functions/functions.php'); ?>
<?php require "../config.php"; ?>
<?php
$target_dir_profile = "../../resource/img_profile/";
$target_dir_avatar = "../../resource/img_avatar/";
$user_id = $_GET['user_id'];
$sql = "SELECT * FROM tutor_profile WHERE user_id=$user_id";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
		<div class="show_profile">
			<div class="row">
				<div class="col-sm-3 d-flex justify-content-start mt-2">
					<label for="avatar_image">Ảnh đại diện</label>
				</div>
				<div class="col-sm-9">
					<div class="custom-file mb-3">
						<input type="file" onchange="showFileName('avatar_image')" class="input-info custom-file-input" id="avatar_image" name="avatar_image">
						<label class="custom-file-label" for="avatar_image">Chọn ảnh đại diện mới</label>
					</div>
					<!-- <label>Chọn ảnh đại diện mới</label>
					<input disabled class="input-info" type="file" name="avatar_image" id="avatar_image"> -->
					<img id="avatar_image_1" src="<?php echo $row['avatar_image'] ?>" alt="avatar" style="height: 300px; width: 400px;">
				</div>

				<div class="col-sm-3 d-flex justify-content-start mt-2">
					<label for=" profile_image">Ảnh hồ sơ</label>
				</div>
				<div class="col-sm-9">
					<div>
						<div class="custom-file mb-3">
							<input type="file" onchange="showFileName('profile_image')" class="input-info custom-file-input" id="profile_image" name="profile_image">
							<label class="custom-file-label" for="profile_image">Chọn ảnh hồ sơ mới</label>
						</div>
						<!-- <label>Chọn ảnh hồ sơ mới</label>
						<input disabled class="input-info" type="file" name="profile_image" id="profile_image"> -->
						<img id="profile_image_1" src="<?php echo $row['profile_image'] ?>" alt="profile" style="height: 300px; width: 400px;">
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
			<div class="show_profile">
				<div class="row">
					<div class="col-sm-3 d-flex justify-content-start mt-2">
						<label for="avatar_image">Ảnh đại diện</label>
					</div>
					<div class="col-sm-9">
						<div class="custom-file mb-3">
							<input type="file" onchange="showFileName('avatar_image')" class="input-info custom-file-input" id="avatar_image" name="avatar_image">
							<label class="custom-file-label" for="avatar_image">Chọn ảnh đại diện mới</label>
						</div>
						<!-- <label>Chọn ảnh đại diện mới</label>
					<input disabled class="input-info" type="file" name="avatar_image" id="avatar_image"> -->
						<img id="avatar_image_1" src="<?php echo $row['avatar_image'] ?>" alt="avatar" style="height: 300px; width: 400px;">
					</div>

					<div class="col-sm-3 d-flex justify-content-start mt-2">
						<label for="profile_image">Ảnh hồ sơ</label>
					</div>
					<div class="col-sm-9">
						<div>
							<div class="custom-file mb-3">
								<input type="file" onchange="showFileName('profile_image')" class="input-info custom-file-input" id="profile_image''" name="profile_image">
								<label class="custom-file-label" for="profile_image">Chọn ảnh hồ sơ mới</label>
							</div>
							<!-- <label>Chọn ảnh hồ sơ mới</label>
						<input disabled class="input-info" type="file" name="profile_image" id="profile_image"> -->
							<img id="profile_image_1" src="<?php echo $row['profile_image'] ?>" alt="profile" style="height: 300px; width: 400px;">
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
			</div>
		<?php
	}
		?>