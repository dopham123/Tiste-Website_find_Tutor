<?php
include '../server/multi_login/config.php';
?>

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
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <title>Dịch vụ</title>
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
                                        <a href="register_class.php" style="color: #678804; border-right:solid 2px grey;">Đăng ký mở lớp </a>
                                        <a href="./index.php?logout='1'" style="color: red; padding-left: 5px;">Logout</a>
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
    <div class="search brand_color">
        <div id="search-panel">
            <p id="location">
                <a class="btn" href="#">Tìm gia sư</a>
                <a class="btn" href="#">Tìm môn học</a>
            </p>
            <h1>Gia sư môn toán</h1>
            <div class="search-box">
                <div class="search-bar">
                    <a href="#" class="search-type">Tìm gia sư</a>
                    <a href="#" class="search-type">Tìm lớp</a>
                </div>
                <form class="search-content" method = "GET" action = "">
                    <div class="search-row">
                        <div id="subject-input" class="ipt col-xl-5">
                            <input class="input-search search-component" name="subject" id="subject"
                                placeholder="Nhập tên môn học">
                        </div>
                        <div id="level-input" class="ipt col-xl-4">
                            <select class="input-search search-component" name="level" id="level">
                                <option value="">Tất Cả </option>
                                <option value="1 2 3">Lớp 1 - Lớp 3 </option>
                                <option value="4 5">Lớp 4 - Lớp 5 </option>
                                <option value="6 7">Lớp 6 - Lớp 7 </option>
                                <option value="8 9">Lớp 8 - Lớp 9 </option>
                                <option value="10">Lớp 10 </option>
                                <option value="11">Lớp 11 </option>
                                <option value="12">Lớp 12 </option>
                                <option value="Luyện thi đại học">Luyện thi đại học </option>
                                <option value="Toán cao cấp">Toán cao cấp </option>
                            </select>
                        </div>
                        <div id="search-btn" class="col-xl-3">
                            <button type = "submit" class="btn-search search-component">
                                <img id="search-icon" src="./images/baseline_search_white_18dp.png" alt="search">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="service-info">
        <div class="main-content">
            <div id="total-member"></div>
            <div class="search-page">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">8</a></li>
                    <li class="page-item"><a class="page-link" href="#">9</a></li>
                    <li class="page-item"><a class="page-link" href="#">10</a></li>
                    <li class="page-item"><a class="page-link" href="#">></a></li>
                </ul>
                <p style="clear: both; margin-top: 0; margin-bottom: 1em;"></p>
                <?php
                        if (isset($_GET['subject']) && $_GET['subject'] != '')
                        {
                          $search_text = trim($_GET['subject']);
                          $search_class = trim($_GET['level']);
                          
                          $query_string = "SELECT * FROM users_info AS ui INNER JOIN service AS sv ON ui.user_id = sv.user_if_id INNER JOIN tutor_profile AS pf ON ui.user_id = pf.user_id WHERE check_accept = 1 AND (";
                          
                          
                          $k = explode(' ', $search_text);
                          $c = explode(' ', $search_class);
                          foreach($k as $word){
                            $query_string .= "sv.subject LIKE '%".$word."%' OR ";
                          }
                          $query_string = substr($query_string, 0, strlen($query_string) - 3);
                          $query_string .= ") AND (";
                          foreach($c as $word){
                            $query_string .= "sv.class LIKE '%".$word."%' OR ";
                          }
                          $query_string = substr($query_string, 0, strlen($query_string) - 3);
                          $query_string .= ")";
                          $result = mysqli_query($con, $query_string);
                          $count = mysqli_num_rows($result);
                          echo('<script>document.getElementById("total-member").innerHTML = "<strong>'.$count.' kết quả tìm kiếm cho \"'.$search_text.' - Lớp '.$search_class.'\"</strong>";</script>');
                        }
                        else{
                          $query_string = "SELECT * FROM users_info AS ui INNER JOIN service AS sv ON ui.user_id = sv.user_if_id INNER JOIN tutor_profile AS pf ON ui.user_id = pf.user_id WHERE check_accept = 1";
                          $result = mysqli_query($con, $query_string);
                        }                
                        
                        
                        
                        while($row = mysqli_fetch_array($result))
                        {
                          echo '<div class="user-card" onclick="tutorDetail('.$row["user_id"].');">
                                    <div class="user-card-img">
                                        <a href="#"><img src="../server/multi_login/admin/'.$row["avatar_image"].'" alt="image"></a>
                                    </div>
                                    <div class="user-main-info">
                                        <div class="user-card-info">
                                            <div class="user-card-container">
                                                <div class="user-card-name">
                                                    <a href="#">'.$row["first_name"].' '.$row["last_name"].'</a>
                                                </div>
                                                <div class="user-rating">
                                                    <img src="./icon/rating.png" alt="rating">
                                                    <strong>'.$row["star"].'</strong>
                                                    <span>('.$row["eval"].' đánh giá)</span>
                                                </div>
                                            </div>
                                            <div class="user-card-title">
                                                '.$row["subject"].'
                                            </div>
                                            <div class="user-card-title" style = "color: green;">
                                            Lớp '.$row["class"].'
                                            </div>
                                            <div class="user-card-salary">
                                                <div class="salary">
                                                    '.$row["salary"].' triệu
                                                </div>
                                                <div class="per"> / tháng</div>
                                            </div>
                                            <div class="user-card-break"></div>
                                        </div>
                                            <div class="user-card-experiment">
                                                
                                                <div class="experiment">
                                                    '.$row["info"].'
                                                </div>
                                                <div class="address">
                                                    <img src="./icon/compass.png" alt="location">
                                                    <a href="#">'.$row["district"].'</a>
                                                </div>
                                                <div class="user-card-meta">
                                                    <div class="user-card-meta-hightlight">
                                                        <div class="user-card-meta-label">
                                                            <img class="user-card-meta-icon" src="./icon/member.png" alt="member"> '.$row["num_of_std"].'
                                                        </div>
                                                        <div class="user-card-total-member">
                                                            học viên đã dạy
                                                        </div>
                                                    </div>
                                                    <div class="user-card-meta-hightlight">
                                                        <div class="user-card-meta-label">
                                                            <img class="user-card-meta-icon" src="./icon/clock.png" alt="member"> '.$row["experience"].'
                                                        </div>
                                                        <div class="user-card-total-member">
                                                            năm kinh nghiệm
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>';
                        }
                        ?>
                        <script>
                            function tutorDetail(id) {
                                location.replace('./detail.php?id='+id);
                            }
                        </script>
                <!-- 
                <div class="user-card">
                    <div class="user-card-img">
                        <a href="#"><img src="./images/hoang.jpg" alt="lau"></a>
                    </div>
                    <div class="user-main-info">
                        <div class="user-card-info">
                            <div class="user-card-container">
                                <div class="user-card-name">
                                    <a href="#">Trương Đình Hoàng</a>
                                </div>
                                <div class="user-rating">
                                    <img src="./icon/rating.png" alt="rating">
                                    <strong>4.6</strong>
                                    <span>(7 đánh giá)</span>
                                </div>
                            </div>
                            <div class="user-card-title">
                                Toán
                            </div>
                            <div class="user-card-salary">
                                <div class="salary">
                                    1,4 triệu
                                </div>
                                <div class="per"> / tháng</div>
                            </div>
                            <div class="user-card-break"></div>
                        </div>
                        <div class="user-card-experiment">
                            <div class="experiment">
                                Đại học Bách Khoa TP.HCM - Vui vẻ, hoạt bát, năng động, cách giảng dạy sáng tạo 1
                                năm kinh nghiệm làm gia sư lớp 6 - lớp 9 ...
                            </div>
                            <div class="address">
                                <img src="./icon/compass.png" alt="location">
                                <a href="#">Tân Phú</a>
                            </div>
                            <div class="user-card-meta">
                                <div class="user-card-meta-hightlight">
                                    <div class="user-card-meta-label">
                                        <img class="user-card-meta-icon" src="./icon/member.png" alt="member"> 8
                                    </div>
                                    <div class="user-card-total-member">
                                        học viên đã dạy
                                    </div>
                                </div>
                                <div class="user-card-meta-hightlight">
                                    <div class="user-card-meta-label">
                                        <img class="user-card-meta-icon" src="./icon/clock.png" alt="member"> 1
                                    </div>
                                    <div class="user-card-total-member">
                                        năm kinh nghiệm
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <p style="clear: both; margin-top: 0; margin-bottom: 1em;"></p>
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">8</a></li>
                    <li class="page-item"><a class="page-link" href="#">9</a></li>
                    <li class="page-item"><a class="page-link" href="#">10</a></li>
                    <li class="page-item"><a class="page-link" href="#">></a></li>
                </ul>
                <p style="clear: both; margin-top: 0; margin-bottom: 1em;"></p>
            </div>
        </div>
    </div>

    <!--  footer -->

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
    <!-- end footer -->
</body>

</html>