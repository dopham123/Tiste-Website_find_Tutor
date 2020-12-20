<?php require "../../config.php"; ?>
<?php include('../../functions/functions.php'); ?>
<?php

$errors         = array();
$data           = array();

$username               =  e($_POST['username']);
$email                  =  e($_POST['email']);
$user_type              =  e($_POST['user_type']);
$password_1 = e($_POST['password_1']);
$password_2 = e($_POST['password_2']);

// Validate input
if (empty($username)) {
	$errors['username'] = "Tên đăng nhập không được để trống";
}
if (empty($email)) {
	$errors['email'] = "Email không được để trống";
}
if (empty($password_1)) {
	$errors['password'] = "Mật khẩu không được để trống";
}
if ($password_1 != $password_2) {
	$errors['password'] = "Mật khẩu không khớp";
}
if (count($errors) == 0) {
	$select_stmt = "SELECT * FROM users WHERE username='$username' OR email='$email'";
	$result = mysqli_query($con, $select_stmt);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			if ($row["username"] == $username) {
				$errors['username'] = "Tên đăng nhập đã tồn tại";
			}
			if ($row["email"] == $email) {
				$errors['email'] =  "Email đã tồn tại";
			}
		}
	}
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
} else {
	$password = md5($password_1); //encrypt the password before saving in the database
	$query_1 = "INSERT INTO users (username, email, user_type, password) 
	VALUES('$username', '$email', '$user_type', '$password')";
	
	mysqli_query($con, $query_1);
	$user_id = mysqli_insert_id($con);

	$query_2 = "INSERT INTO users_info (user_id) VALUES($user_id)";
	mysqli_query($con, $query_2);
	
    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo json_encode($data);
?>