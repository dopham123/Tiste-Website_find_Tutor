<?php include('../functions/functions.php'); ?>
<?php require "../config.php"; ?>
<div class="container">
<div class="row d-flex justify-content-center">
	<h2>DỮ LIỆU VỀ LỜI NHẮN</h2>
</div>
    <?php
    $sql = "SELECT * FROM contact_info";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-sm-8" style="background-color: #ccc;">
                    <div class="row border">
                        <div class="col-sm-6 d-flex justify-content-center" data-toggle="collapse" href="#id-<?php echo $row['id'] ?>">
                            <span><b><?php echo $row['date'] ?></b></span>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-center" data-toggle="collapse" href="#id-<?php echo $row['id'] ?>">
                            <span style="color: black;">Click để xem chi tiết</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 collapse multi-collapse" id="id-<?php echo $row['id'] ?>">
                    <div class="row border">
                        <div class="col-sm-12">
                            <div class="row m-t1">
                                <div class="col-sm-3">
                                    <span><b>Tên người gửi:</b></span>
                                </div>
                                <div class="col-sm-3">
                                    <span><?php echo $row['last_name'] . ' ' . $row['first_name'] ?></span>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span><b>Email:</b></span>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo $row['email'];?>&su=SUBJECT&body=BODY" target="_blank" style="color: blue;"><?php echo $row['email'] ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6 d-flex justify-content-end">
                                            <span><b>Số điện thoại:</b></span>
                                        </div>
                                        <div class="col-sm-6">
                                            <span style="color: black;"><?php echo $row['phone_number'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-sm-12">
                                    <span><b>Nội dung: </b></span>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <textarea class="form-control" rows="4"><?php echo $row['message'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>