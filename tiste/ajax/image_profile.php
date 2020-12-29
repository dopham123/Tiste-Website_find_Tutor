<?php require "../../server/multi_login/config.php"; ?>
<?php include('../../server/multi_login/functions/functions.php'); ?>

<?php
$user_id = $_GET['user_id'];
$sql = "SELECT * FROM tutor_profile WHERE user_id=$user_id";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
?>
        <img class="ava-pro-img-format img-fluid img-thumbnail pro_img" id="profile_image_1" src="../server/resource/img_profile/<?php echo $row['profile_image'] ?>" alt="profile">
<?php
    }
}
?>