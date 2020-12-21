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
		<label for="avatar_image">Ảnh đại diện</label>
		<div>
			<label>Chọn ảnh đại diện mới</label>
			<input disabled class="input-info" type="file" name="avatar_image" id="avatar_image">
			<img id="avatar_image_1" src="<?php echo $row['avatar_image'] ?>" alt="avatar" style="height: 300px; width: 400px;">
		</div>

		<label for=" profile_image">Ảnh hồ sơ</label>
		<div>
			<label>Chọn ảnh hồ sơ mới</label>
			<input disabled class="input-info" type="file" name="profile_image" id="profile_image">
			<img id="profile_image_1" src="<?php echo $row['profile_image'] ?>" alt="profile" style="height: 300px; width: 400px;">
		</div>

		<label for="experience">Kinh nghiệm</label>
		<textarea class="input-info experience" disabled rows="5" cols="50" name="experience"><?php echo $row['experience']; ?></textarea>

		<label for="info">Thông tin thêm:</label>
		<textarea class="input-info info" disabled rows="5" cols="50" name="info"><?php echo $row['info']; ?></textarea>
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
			<label for="avatar_image">Ảnh đại diện</label>
			<div>
				<label>Chọn ảnh đại diện mới</label>
				<input disabled class="input-info" type="file" name="avatar_image" id="avatar_image">
				<img id="avatar_image_1" src="<?php echo $row['avatar_image'] ?>" alt="avatar" style="height: 300px; width: 400px;">
			</div>

			<label for="profile_image">Ảnh hồ sơ</label>
			<div>
				<label>Chọn ảnh hồ sơ mới</label>
				<input disabled class="input-info" type="file" name="profile_image" id="profile_image">
				<img id="profile_image_1" src="<?php echo $row['profile_image'] ?>" alt="profile" style="height: 300px; width: 400px;">
			</div>

			<label for="experience">Kinh nghiệm</label>
			<textarea class="input-info experience" disabled rows="5" cols="50" name="experience"><?php echo $row['experience']; ?></textarea>

			<label for="info">Thông tin thêm:</label>
			<textarea class="input-info info" disabled rows="5" cols="50" name="info"><?php echo $row['info']; ?></textarea>
<?php
		}
	}
}
