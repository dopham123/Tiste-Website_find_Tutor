<?php require "../config.php"; ?>
<?php
$user_id = $_GET['user_id'];
?>
<form class="edit-form" method="POST" onsubmit="event.preventDefault();">
    <table>
        <tr>
            <th>Tên</th>
            <th>Họ lót</th>
            <th>Giới tính</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ 1</th>
            <th>Địa chỉ 2</th>
            <th>Quận/Huyện</th>
            <th>Tỉnh/Thành phố</th>
            <th>Mã bưu chính</th>
        </tr>
        <?php
        $sql = "SELECT * FROM users_info WHERE user_id=$user_id";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                <tr>
                    <td><input disabled type="text" value="<?php echo $row['first_name'] ?>" style="text-align: center;"></td>
                    <td><input disabled type="text" value="<?php echo $row['last_name'] ?>" style="text-align: center;"> </td>
                    <td><input disabled type="text" value="<?php echo $row['gender'] ?>" style="text-align: center;"></td>
                    <td><input disabled type="text" value="<?php echo $row['phone_number'] ?>" style="text-align: center;"> </td>
                    <td><input disabled type="text" value="<?php echo $row['address_1'] ?>" style="text-align: center;"> </td>
                    <td><input disabled type="text" value="<?php echo $row['address_2'] ?>" style="text-align: center;"> </td>
                    <td><input disabled type="text" value="<?php echo $row['district'] ?>" style="text-align: center;"> </td>
                    <td><input disabled type="text" value="<?php echo $row['city'] ?>" style="text-align: center;"> </td>
                    <td><input disabled type="text" value="<?php echo $row['post_code'] ?>" style="text-align: center;"> </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</form>