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
                            <div>
                                <ul>
                                    <li><a class="buy text-center" href="#">Đăng nhập</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col logo_section d-flex justify-content-center"
                        style="padding-left: 0; text-align: center;">
                        <div class="logo">
                            <a href="index.html"><img src="images/logo.png" alt="logo" /></a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main d-flex-column justify-content-around">
                                        <li> <a href="index.html">Trang chủ</a> </li>
                                        <li> <a href="about.html">Giới thiệu</a> </li>
                                        <li class="active"> <a href="service.php">Dịch vụ</a> </li>
                                        <li> <a href="prices.html">BẢng giá</a> </li>
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
    <div class="main-content">
        <div class="user-card">
            <div id='tutor-name'>
                <h3><?php echo $data['detail'][0]['first_name'] ." ". $data['detail'][0]['last_name'];?></h3>
            </div>
            <div class="detail-info">
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
            </div>
        </div>
        <div class="user-card">
            <h3>Oánh giá</h3>
            <div id="show-comment"></div>
        </div>
    </div>
</div>
<script>
    $(document).ready( () => {
        $('#show-comment').html('');
        $.ajax({
            type: "GET",
            url: "../server/multi_login/functions/comment.php?id=" +<?php echo $data['detail'][0]['id'];?>,
            dataType: "json",
            success: (data) => {
                if (!data.success) {
                    $('#show-comment').html(`<div>${data["error"]}</div>`);
                } else {
                    for (let i = 0; i < data.comment.length; i++) {
                        $('#show-comment').append(`
                            <div id='comment-${data.comment[i].id}' class="comment">${data.comment[i].comment}</div>
                        `);
                    }
                }
            }
        });
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