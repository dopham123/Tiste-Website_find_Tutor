<?php require "../../config.php"; ?>
<?php include('../../functions/functions.php'); ?>
<?php

$errors         = array();
$data           = array();
$user_id        = $_GET['user_id'];

$current_password       =  e($_POST['current_password']);
$password               =  e($_POST['password']);
$confirm_password       =  e($_POST['confirm_password']);

// Validate input
if (empty($current_password)) {
    array_push($errors, 'Mật khẩu hiện không được để trống');
}
if (empty($password)) {
    array_push($errors, 'Mật khẩu mới không được để trống');
} else {
    if($password != $confirm_password){
        array_push($errors, "Mật khẩu mới không khớp");
    }
}

if (empty($errors)) {
    $select_stmt = "SELECT * FROM users WHERE id='$user_id'";
    $result = mysqli_query($db, $select_stmt);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            if ($row['password'] == md5($current_password)) {
                break;
            } else {
                array_push($errors, "Mật khẩu hiện tại không đúng");
            }
        }
    }
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
} else {
    $new_password = md5($password);
    $sql = "UPDATE users SET password = '$new_password' WHERE id=$user_id";
    $result = mysqli_query($con,$sql);
    $data['success'] = true;
    $data['message'] = 'Đổi mật khẩu thành công';
}

echo json_encode($data);
?>