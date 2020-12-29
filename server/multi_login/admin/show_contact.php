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
            <div class="row d-flex justify-content-center mt-3" id="message-<?php echo $row['id'] ;?>">
                <div class="col-sm-10" style="background-color: #ccc;">
                    <div class="row border">
                        <div class="col-sm-6 d-flex justify-content-center" data-toggle="collapse" href="#id-<?php echo $row['id'] ?>">
                            <span><b><?php echo $row['date'] ?></b></span>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-center" data-toggle="collapse" href="#id-<?php echo $row['id'] ?>">
                            <span style="color: black;">Click để xem chi tiết</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 collapse multi-collapse" id="id-<?php echo $row['id'] ?>">
                    <div class="row border">
                        <div class="col-sm-12">
                            <div class="row m-t1">
                                <div class="col-sm-2 col-2" style="min-width: 140px;">
                                    <span><b>Tên người gửi:</b></span>
                                </div>
                                <div class="col-sm-3 col-3" style="min-width: 148px;">
                                    <span><?php echo $row['last_name'] . ' ' . $row['first_name'] ?></span>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-lg-6 col-sm-12" style="padding-right: 0;">
                                    <div class="row">
                                        <div class="col-sm-1 col-1" style="min-width: 71px;">
                                            <span><b>Email:</b></span>
                                        </div>
                                        <div class="col-sm-3 col-3" style="padding-left: 0;">
                                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo $row['email'];?>&su=SUBJECT&body=BODY" target="_blank" style="color: blue;"><?php echo $row['email'] ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6  col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-3 col-3 d-flex" style="min-width: 135px;">
                                            <span><b>Số điện thoại:</b></span>
                                        </div>
                                        <div class="col-sm-6 col-6" style="min-width: 135px;">
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

                            <div class="row mt-2 mb-2">
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button onclick="deleteMessage(event);" class="btn btn-danger" name="<?php echo $row['id']; ?>" id="delete_message_btn-<?php echo $row['id']; ?>">Xóa</button>
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