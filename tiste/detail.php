<?php include('../server/multi_login/functions/functions.php'); ?>
<?php
if (isLoggedIn() && isAdmin()) {
    header('location: ../server/multi_login/admin/homepage_admin.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> <!-- load jquery via CDN -->
      <title>Thông tin chi tiết</title>
</head>
<body>
<header>
      <div class="header">
            <div class="head_top">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="top-box">
                                <ul class="sociel_link">
                                    <li class="size-60"> <a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="size-60"> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="size-60"> <a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li class="size-60"> <a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col d-flex align-items-center justify-content-end">
                        <?php
                            if (isTutor() || isStudent()) {
                                $row = getInfo($_SESSION['user']['id']); ?>
                                <div>
                                    <ul>
                                        <li><a class="buy text-center"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></a></li>
                                        <a href="./index.php?logout='1'" style="color: red;">logout</a>
                                    </ul>
                                </div>
                            <?php
                            } else { ?>
                                <div>
                                    <ul>
                                        <li><a class=" buy text-center" href="./login.php">Đăng nhập</a></li>
                                    </ul>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col logo_section d-flex justify-content-center"
                        style="padding-left: 0; text-align: center;">
                        <div class="logo">
                            <a href="index.php"><img src="images/logo.png" alt="logo" /></a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main d-flex-column justify-content-around">
                                        <li> <a href="index.php">Trang chủ</a> </li>
                                        <li> <a href="about.php">Giới thiệu</a> </li>
                                        <li class="active"> <a href="service.php">Dịch vụ</a> </li>
                                        <li> <a href="prices.php">BẢng giá</a> </li>
                                        <li> <a href="contact.php">Liên hệ</a> </li>
                                        <li> <a href="#">Đăng ký</a> </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>
<?php include("../server/multi_login/functions/detail.php");?>
<div class="service-info">
    <div id='tutor-name' class="main-content">
        <h3><?php echo $data['detail'][0]['first_name'] ." ". $data['detail'][0]['last_name'];?></h3>
    </div>
    <div class="main-content">
        <div class="user-card detail-info">
            <div class="tutor-img">
                <img src="<?php echo $data['detail'][0]['img'];?>" alt="tutor">
            </div>
            <div id="profile">
                <h4><?php echo $data['detail'][0]['first_name'] ." ". $data['detail'][0]['last_name'];?></h4>
                <h5>Gia sư</h5>
                <div id="location">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <p><?php echo $data['detail'][0]['district'] ." ". $data['detail'][0]['city'];?></p>
                </div>
                <div id="subject">
                    <h5><?php echo $data['detail'][0]['subject'];?></h5>
                </div>
                <div id="graduate">
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                    <p>Đại học Bách Khoa TP.HCM</p>
                </div>
            </div>
            <div class="evaluate">
                <div id="evaluate-info">
                    <p>Điểm phản hồi</p>
                    <div id="evaluate-point"><?php echo $data['detail'][0]['eval'];?></div>
                </div>
            </div>
        </div>
        <div class="user-card" style="display: block">
            <h3>Đánh giá</h3>
            <div id="show-comment"></div>
        </div>
    </div>
</div>
<script>
    function addComment(id, commentatorID){
        let formData = {
            newComment: $("input[name=new-comment]").val(),
            commentatorID: commentatorID
        }
        $.ajax({
            type: "POST",
            url: "../server/multi_login/functions/addComment.php?id=" + id,
            data: formData,
            dataType: "json",
            encode: true,
            beforeSend: function () {
                $("#submit-comment").attr("disabled", true);
            }
        }).done(function (data){
            if (!data.success) {
                $("#show-error").append(`
                    <div id='error' class="error">${data.error}</div>
                `);
            } else {
                alert("successfull");
                getComment(id);
            }
        });
    }
    function getComment(id) {
        $('#show-comment').html('');
        $.ajax({
            type: "GET",
            url: "../server/multi_login/functions/comment.php?id=" +id,
            dataType: "json",
            success: (data) => {
                if (!data.success) {
                    $('#show-comment').html(`<div>${data["error"]}</div>`);
                } else {
                    for (let i = 0; i < data.comment.length; i++) {
                        $('#show-comment').append(`
                            <div id='commentator-${data.comment[i].id}' class="commentator">${data.comment[i].first_name} ${data.comment[i].last_name}:</div>
                            <div id='comment-${data.comment[i].id}' class="comment">${data.comment[i].comment}</div>
                        `);
                    }
                    <?php if (isset($_SESSION['user'])) {
                                    if ($_SESSION['user']['user_type'] == 'user') {
                     ?>
                                        $('#show-comment').append(`
                                                <div id='add-comment' class="comment">
                                                    <label for="new-comment">Viết bình luận:</label>
                                                    <input type="text" id="new-comment" name="new-comment">
                                                    <button id="submit-comment" onclick='addComment(${id}, ${<?php echo ($_SESSION['user']['id']); ?>})'>Thêm</button>
                                                </div>
                                        `);
                    <?php } }?>
                }
            }
        });
    }

    $(document).ready( () => {
        let id = <?php echo $data['detail'][0]['id'];?>;
        let data = <?php echo json_encode($data);?>;
        console.log(data)
        getComment(id);
        
    });
</script>



<footer>
      <div class="footer">
            <div class="container">
                  <div class="row">
                        <div class="col-md-6 offset-md-3">
                        <ul class="sociel">
                              <li> <a href="#"><i class="fa fa-facebook"></i></a></li>
                              <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                              <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                              <li> <a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                        </div>
                  </div>
                  <p style="text-align: center; color: white;">Copyright 2020 All Right Reserved By Tiste Education
                        Corporation</p>
            </div>
      </div>
</footer>
</body>
</html>