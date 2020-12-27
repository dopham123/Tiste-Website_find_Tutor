<?php require "../config.php"; ?>
<?php
?>
<div class="row d-flex justify-content-center">
    <h2>THÔNG TIN KHÁCH HÀNG</h2>
</div>
<form class="edit-form" method="POST" onsubmit="event.preventDefault();">
    <div class="table-fix-head table-responsive">
        <table id="user-table" class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên đăng nhập</th>
                    <!-- <th scope="col">Email</th> -->
                    <th scope="col">Vai trò</th>
                    <th scope="col">Thông tin chi tiết</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM users WHERE user_type <> 'admin'";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $row['id'] ?></td>
                            <td style="text-align: center;" name="user-name-<?php echo $row['id'] ?>"><?php echo $row['username'] ?></td>
                            <!-- <td style="text-align: center;" name="email-<?php echo $row['id'] ?>"><?php echo $row['email'] ?></td> -->
                            <td style="text-align: center;" name="user_type-<?php echo $row['id'] ?>"><?php
                                                                                                        if ($row['user_type'] == 'tutor')
                                                                                                            echo "Gia sư";
                                                                                                        else echo "Học viên";
                                                                                                        ?>
                            </td>

                            <td>
                                <a class="" href="show_user_info.php?user_id=<?php echo $row['id'] ?>">Click để xem thêm</a>
                            </td>
                            <td>
                                <button onclick="
                        confirmDelete(event);
                        setTimeout(function() {
                            loadFile('data-table', 'user_info.php'
                            )}, 500);
                        " type="submit" class="btn btn-danger" name="<?php echo $row['id'] ?>">Delete
                                </button>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</form>