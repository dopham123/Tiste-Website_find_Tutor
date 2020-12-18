<?php require "../../config.php"; ?>
<?php include('../../functions/functions.php'); ?>
<?php

$errors         = array();
$data           = array();
$user_id        = $_GET['user_id'];

$password               =  e($_POST['password']);
$confirm_password       =  e($_POST['confirm_password']);

if (empty($password)) {
    $errors['password'] = 'Mật khẩu không được để trống';
} else {
    if($password != $confirm_password){
        $errors['password'] = "Mật khẩu không khớp";
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
    $data['message'] = 'Success!';
}

echo json_encode($data);
?>