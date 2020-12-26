<?php require "../../config.php"; ?>
<?php include('../../functions/functions.php'); ?>
<?php

$errors         = array();
$data           = array();
$user_id        = $_GET['user_id'];

$email                  =  e($_POST['email']);
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
$profile_image             =  e($_POST['profile_image']);
$avatar_image             =  e($_POST['avatar_image']);


// Validate for username and email

if (empty($email)) {
    array_push($errors, 'Email không đuợc để trống');
}
if (empty($fname)) {
    array_push($errors, 'Tên không được để trống');
} else if (!(0 === preg_match('~[0-9]~', $fname))) {
    array_push($errors, "Tên chỉ chứa các chữ cái");
}
if (empty($lname)) {
    array_push($errors, 'Họ lót không đuợc để trống');
} else if (!(0 === preg_match('~[0-9]~', $fname))) {
    array_push($errors, "Họ lót chỉ chứa các chữ cái");
}
if (empty($phone_number)) {
    array_push($errors, 'Số điện thoại không đuợc để trống');
}
if (empty($address_1)) {
    array_push($errors, 'Địa chỉ 1 không đuợc để trống');
}
if (empty($district)) {
    array_push($errors, 'Quận/Huyện không đuợc để trống');
}
if (empty($city)) {
    array_push($errors, 'Thành không đuợc để trống');
}
if (empty($post_code)) {
    array_push($errors, 'Mã bưu chính không đuợc để trống');
}
if (empty($errors)) {
    $select_stmt = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($db, $select_stmt);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            if ($row['id'] == $user_id) {
                break;
            }
            if ($row["email"] == $email) {
                array_push($errors, "Email đã tồn tại!! Vui lòng nhập email khác");
            }
        }
    }
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
} else {
    $sql_user = "UPDATE users SET email = '$email' WHERE id=$user_id";
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

    if (mysqli_num_rows($result_3) > 0) {
        while ($row = mysqli_fetch_array($result_3, MYSQLI_ASSOC)) {
            if ($row['user_type'] == 'tutor') {
                $sql_tutor_profile = "UPDATE tutor_profile SET info = '$info', experience = '$experience', profile_image = '$profile_image', avatar_image = '$avatar_image' WHERE user_id=$user_id";
                $result_4 = mysqli_query($con, $sql_tutor_profile);
            }
        }
    }

    $data['success'] = true;
    $data['message'] = 'Success!';
}
echo json_encode($data);
?>