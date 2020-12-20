<?php require "../config.php"; ?>
<?php
?>
<form class="edit-form" method="POST" onsubmit="event.preventDefault();">
    <table>
        <tr>
            <th>ID</th>
            <th>Tên đăng nhập</th>
            <th>Email</th>
            <th>Vai trò</th>
            <th>Thông tin chi tiết</th>
            <th>Operation</th>
        </tr>
        <?php
        $sql = "SELECT * FROM users WHERE user_type <> 'admin'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                <tr>
                    <td><input disabled type="text" value="<?php echo $row['id'] ?>" style="text-align: center;"></td>
                    <td><input disabled type="text" name="user-name-<?php echo $row['id'] ?>" value="<?php echo $row['username'] ?>" style="text-align: center;"> </td>
                    <td><input disabled type="text" name="email-<?php echo $row['id'] ?>" value="<?php echo $row['email'] ?>" style="text-align: center;"></td>
                    <td><input disabled type="text" name="user_type-<?php echo $row['id'] ?>" 
                        value="<?php 
                            if ($row['user_type'] == 'tutor')
                                echo "Gia sư";
                            else echo "Học viên";
                            ?>" 
                        style="text-align: center;">
                    </td>

                    <td>
                        <a class="" href="show_user_info.php?user_id=<?php echo $row['id'] ?>">Click để xem thêm</a>
                    </td>
                    <td>
                        <button onclick="
                        confirmDelete(event);
                        setTimeout(function() {
                            loadFile('data-table', 'user_info.php'
                            )}, 2000);
                        " type="submit" class="button-a btn-delete" name="<?php echo $row['id'] ?>">Delete
                        </button>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</form>