<?php require "../config.php"; ?>
<?php
$user_id = $_GET['user_id'];
?>
<?php
include('../functions/functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> <!-- load jquery via CDN -->
    <script src="../functions/functions.js"></script>
    <link rel="stylesheet" href="./style.css">

    <style>
        .container-1 {
            display: grid;
            grid-template-columns: 1fr 3fr;
        }
    </style>
</head>

<body>

    <form class="edit-form" method="POST" onsubmit="event.preventDefault();">

        <?php
        $sql = "SELECT * FROM users_info WHERE user_id=$user_id";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                <div class="container-1">
                    <label for="fname">Tên:</label>
                    <input disabled type="text" value="<?php echo $row['first_name'] ?>" style="text-align: center;">

                    <label for="lname">Họ lót:</label>
                    <input disabled type="text" value="<?php echo $row['last_name'] ?>" style="text-align: center;">

                    <label for="gender">Giới tính:</label>
                    <input disabled type="text" value="<?php echo $row['gender'] ?>" style="text-align: center;">

                    <label for="phone_number">Số điện thoại:</label>
                    <input disabled type="text" value="<?php echo $row['phone_number'] ?>" style="text-align: center;">

                    <label for="address_1">Địa chỉ 1:</label>
                    <input disabled type="text" value="<?php echo $row['address_1'] ?>" style="text-align: center;">

                    <label for="address_2">Địa chỉ 2:</label>
                    <input disabled type="text" value="<?php echo $row['address_2'] ?>" style="text-align: center;">

                    <label for="district">Quận/Huyện:</label>
                    <input disabled type="text" value="<?php echo $row['district'] ?>" style="text-align: center;">

                    <label for="city">Thành phố:</label>
                    <input disabled type="text" value="<?php echo $row['city'] ?>" style="text-align: center;">

                    <label for="post_code">Mã bưu chính:</label>
                    <input disabled type="text" value="<?php echo $row['post_code'] ?>" style="text-align: center;">
                </div>
        <?php
            }
        }
        ?>
    </form>

</body>

</html>