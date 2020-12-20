<?php require "../../config.php"; ?>
<?php include('../../functions/functions.php'); ?>
<?php

$errors         = array();
$data           = array();
$user_id        = $_GET['user_id'];

$username               =  e($_POST['username']);
$email                  =  e($_POST['email']);
$user_type              =  e($_POST['user_type']);
$fname                  =  e($_POST['fname']);
$lname                  =  e($_POST['lname']);
$gender                 =  e($_POST['gender']);
$phone_number           =  e($_POST['phone_number']);
$address_1              =  e($_POST['address_1']);
$address_2              =  e($_POST['address_2']);
$district               =  e($_POST['district']);
$city                   =  e($_POST['city']);
$post_code              =  e($_POST['post_code']);
$info                   =  e($_POST['info']);
$experience             =  e($_POST['experience']);


$username_valid = $email_valid = false;

// Validate for username and email
if (empty($username)) {
    $errors['username'] = 'Tên không được để trống';
}

if (empty($email)) {
    $errors['email'] = 'Email không đuợc để trống';
}

if (empty($errors)) {
    $select_stmt = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($db, $select_stmt);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            if ($row['id'] == $user_id) {
                break;
            }
            if ($row["username"] == $username) {
                $errors['username'] = "Tên đăng nhập đã tồn tại!! Vui lòng chọn tên đăng nhập khác";
            }
        }
    }
    $select_stmt = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($db, $select_stmt);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            if ($row['id'] == $user_id) {
                break;
            }
            if ($row["email"] == $email) {
                $errors['email'] = "Email đã tồn tại!! Vui lòng nhập email khác";
            }
        }
    }
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
} else {
    $sql_user = "UPDATE users SET username = '$username', email = '$email', user_type = '$user_type' WHERE id=$user_id";
    $sql_user_info = "UPDATE users_info SET 
    first_name = '$fname', 
    last_name = '$lname',
    gender = '$gender',
    phone_number = '$phone_number',
    address_1 = '$address_1',
    address_2 = '$address_2',
    district = '$district',
    city = '$city',
    post_code = '$post_code'
    WHERE user_id=$user_id";

    $result_1 = mysqli_query($con, $sql_user);
    $result_2 = mysqli_query($con, $sql_user_info);

    $sql_select = "SELECT user_type FROM users WHERE id = $user_id";
    $result_3 = mysqli_query($con, $sql_select);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result_3, MYSQLI_ASSOC)) {
            if ($row['user_type'] == 'tutor') {
                $sql_tutor_profile = "UPDATE tutor_profile SET info = '$info', experience = '$experience' WHERE user_id=$user_id";
                $result_4 = mysqli_query($con, $sql_tutor_profile);
            }
        }
    }

    $data['success'] = true;
    $data['message'] = 'Success!';
}
echo json_encode($data);
?>