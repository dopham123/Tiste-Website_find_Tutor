<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'web-ass-2');

// variable declaration
$username = "";
$email    = "";
$errors   = array();


$fname = "";
$lname = "";
$gender = "";
$phone_number = "";
$address_1 = "";
$address_2 = "";
$district = "";
$city = "";
$post_code = "";
$target_file_avatar = "";
$target_file_profile = "";
$experience = "";
$info = "";
// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// add register class
if (isset($_POST['register_class'])) {
	register_cls();
} 

// call the register_infor() function if register_info_btn is clicked
if (isset($_POST['register_info_btn'])) {
	register_info();
}

if (isset($_POST['register_profile_btn'])) {
	register_profile();
}

// REGISTER CLASS
function register_cls()
{
	global $db, $errors, $subject, $class;

	$subject    =  e($_POST['subject']);
	$class       =  e($_POST['class']);
	$salary  =  e($_POST['salary']);
	$num_std  =  e($_POST['num-of-std']);

	if (empty($subject)) {
		array_push($errors, "Môn học không được để trống");
	}
	if (empty($class)) {
		array_push($errors, "Lớp không được để trống");
	}
	if (empty($salary)) {
		array_push($errors, "Học phí không được để trống");
	}
	if (empty($num_std)) {
		array_push($errors, "Số học sinh không khớp");
	}

	if (count($errors) == 0) {
		$user_id = $_SESSION['user']['id'];
		$query = "INSERT INTO service (subject, class, salary, num_of_std, user_if_id) 
					  VALUES('$subject', '$class', '$salary', '$num_std', '$user_id')";
		if (mysqli_query($db, $query)){
			echo ("<script>alert('Gửi Đăng Ký Thành Công!');</script>");
		}
		else{
			echo ("<script>alert('Gửi Đăng Ký Thất Bại!');</script>");
		}
	}
}

// REGISTER USER
function register()
{
	global $db, $errors, $username, $email;

	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);
	$role		 =  e($_POST['role']);

	if (empty($username)) {
		array_push($errors, "Tên đăng nhập không được để trống");
	}
	if (empty($email)) {
		array_push($errors, "Email không được để trống");
	}
	if (empty($password_1)) {
		array_push($errors, "Mật khẩu không được để trống");
	}
	if ($password_1 != $password_2) {
		array_push($errors, "Mật khẩu không khớp");
	}
	if (count($errors) == 0) {
		$select_stmt = "SELECT * FROM users WHERE username='$username' OR email='$email'";
		$result = mysqli_query($db, $select_stmt);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				if ($row["username"] == $username) {
					array_push($errors, "Tên đăng nhập đã tồn tại");
				}
				if ($row["email"] == $email) {
					array_push($errors, "Email đã tồn tại");
				}
			}
		}
	}
	if (count($errors) == 0) {
		$password = md5($password_1); 
		$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', '$role', '$password')";
		mysqli_query($db, $query);

		// get id of the created user
		$logged_in_user_id = mysqli_insert_id($db);

		$_SESSION['user'] = getUserById($logged_in_user_id);
		$_SESSION['success']  = "You are now logged in";
		header('location: register_info.php');
	}
}

function register_info()
{
	global $fname, $lname, $gender, $phone_number, $address_1, $address_2, $district, $city, $post_code, $errors, $db;

	$fname    	=  	e($_POST['fname']);
	$lname      =  	e($_POST['lname']);
	$gender  	=  	e($_POST['gender']);
	$phone_number = e($_POST['phone_number']);
	$address_1  =  	e($_POST['address_1']);
	$address_2	=  	e($_POST['address_2']);
	$district 	= 	e($_POST['district']);
	$city 		= 	e($_POST['city']);
	$post_code 	=	e($_POST['post_code']);


	if (empty($fname)) {
		array_push($errors, "Tên không được để trống");
	} else if (!(0 === preg_match('~[0-9]~', $fname))) {
		array_push($errors, "Tên chỉ chứa các chữ cái");
	}
	if (empty($lname)) {
		array_push($errors, "Họ lót không được để trống");
	} else if (!(0 === preg_match('~[0-9]~', $fname))) {
		array_push($errors, "Họ lót chỉ chứa các chữ cái");
	}
	if (empty($phone_number)) {
		array_push($errors, "Số điện thoại không được để trống");
	}
	if (empty($address_1)) {
		array_push($errors, "Địa chỉ 1 không được để trống");
	}
	if (empty($district)) {
		array_push($errors, "Quận/huyện không được để trống");
	}
	if (empty($city)) {
		array_push($errors, "Tỉnh/Thành phố không được để trống");
	}
	if (empty($post_code)) {
		array_push($errors, "Mã bưu chính không được để trống");
	}

	$user_id = $_SESSION['user']['id'];

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$query = "INSERT INTO users_info (first_name, last_name, gender, phone_number, address_1, address_2, district, city, post_code, user_id) 
					  VALUES('$fname', '$lname', '$gender', '$phone_number', '$address_1', '$address_2', '$district', '$city', '$post_code', $user_id)";
		mysqli_query($db, $query);
		header('location: register_profile.php');
	}
}


function register_profile()
{
	global $db, $errors, $info, $experience;

	// check image
	$target_dir_avatar = "";
	$target_file_avatar = "";
	// Check if image file is a actual image or fake image
	if (!isset($_FILES['avatar_image']) || $_FILES['avatar_image']['error'] == UPLOAD_ERR_NO_FILE) {
	} else {
		$check_avatar = getimagesize($_FILES["avatar_image"]["tmp_name"]);
		if ($check_avatar !== false) {
			$target_file_avatar = $target_dir_avatar . basename($_FILES["avatar_image"]["name"]);
		} else {
			array_push($errors, "File ảnh đại diện không đúng định dạng");
		}
	}

	// check image
	$target_dir_profile = "";
	$target_file_profile = "";
	if (!isset($_FILES['profile_image']) || $_FILES['profile_image']['error'] == UPLOAD_ERR_NO_FILE) {
	} else {
		$check_profile = getimagesize($_FILES["profile_image"]["tmp_name"]);
		if ($check_profile !== false) {
			$target_file_profile = $target_dir_profile . basename($_FILES["profile_image"]["name"]);
		} else {
			array_push($errors, "File ảnh hồ sơ không đúng định dạng");
		}
	}

	$experience = e($_POST['experience']);
	$info  =  	e($_POST['info']);
	$user_id = $_SESSION['user']['id'];

	if (count($errors) == 0) {
		$query = "INSERT INTO tutor_profile (experience, info, avatar_image, profile_image, user_id) 
					  VALUES('$experience', '$info', '$target_file_avatar', '$target_file_profile', $user_id)";
		mysqli_query($db, $query);
		header('location: index.php');
	}
}

// return user array from their id
function getUserById($id)
{
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val)
{
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error()
{
	global $errors;

	if (count($errors) > 0) {
		echo '<div class="error">';
		foreach ($errors as $error) {
			echo $error . '<br>';
		}
		echo '</div>';
	}
}

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	} else {
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login()
{
	global $db, $username, $errors;

	$username = e($_POST['username']);
	$password = e($_POST['password']);

	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { 
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/homepage_admin.php');
			} else {
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: ../../ass_2_ver1/Tiste-Website_find_Tutor/tiste/index.php');
			}
		} else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin') {
		return true;
	} else {
		return false;
	}
}

function isTutor()
{
	if (isset($_SESSION['user']) && ($_SESSION['user']['user_type'] == 'tutor')) {
		return true;
	} else {
		return false;
	}
}

function isStudent()
{
	if (isset($_SESSION['user']) && ($_SESSION['user']['user_type'] == 'user')) {
		return true;
	} else {
		return false;
	}
}

function getInfo($id)
{
	global $db;
	$row = array();
	$sql = "SELECT * FROM users_info WHERE user_id=$id";
	$result = mysqli_query($db, $sql);
	if (mysqli_num_rows($result) > 0) {
		return $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	return $row;
}

function display_error_alert()
{
	global $errors;
	if (count($errors) > 0) {
		echo '<div class="alert alert-danger alert-top" role="alert">';
		echo 	'<strong>';
		echo 		$errors[0];
		echo 	'</strong>';
		echo	' <button type="button" class="close" data-dismiss="alert">×</button>';
		echo '</div>';
		echo '<script> 
				window.setTimeout(function() {
					$(".alert").fadeTo(500, 0).slideUp(500, function(){
						$(this).remove(); 
					});
				}, 2000); 
			</script>';
	}
}
