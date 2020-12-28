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
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Liên hệ</title>
</head>

<body>
    <?php include('../server/multi_login/functions/contact-info.php');?>
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
                                $row = getInfo($_SESSION['user']['id']);?>
                                <div>
                                    <ul>
                                        <li><a href="user.info.php?user_id=<?php echo $_SESSION['user']['id']?>" class="buy text-center"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></a></li>
                                        
                                    </ul>
                                </div>
                                <?php
                                    if (isTutor()){
                                        echo '<a href="register_class.php" class="buy text-center">Đăng ký mở lớp </a>';
                                    
                                    }
                                ?>
                                <div class="btn-logout">
                                    <a href="./index.php?logout='1'">Logout</a>
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
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col logo_section d-flex justify-content-center" style="padding-left: 0; text-align: center;">
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
                                        <li> <a href="service.php">Dịch vụ</a> </li>
                                        <li> <a href="prices.php">BẢng giá</a> </li>
                                        <li class="active"> <a href="contact.php">Liên hệ</a> </li>
                                        <?php 
                                            if (isTutor() || isStudent()) {
                                        ?>
                                        <?php 
                                        } else {
                                        ?>
                                        <li> <a href="register.php">Đăng ký</a> </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- contact us -->
    <div class="container-fluid d-flex justify-content-center align-items-center choose_bg">
        <div class="row choose_bg">
            <div class="container d-flex justify-content-center align-items-center white-bg-contact">
                <div class="row bg-white width-100">
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                        <div class="">
                            <h2 class="font-weight-bold contact-us-format">LIÊN HỆ</h2>
                            <p class="font-weight-bold">
                                Bạn đang thắc mắc về dịch vụ của chúng tôi?
                            </p>
                            <p class="font-weight-bold">
                                Đừng ngần ngại liên hệ với chúng tôi
                            </p>
                        </div>
                        <div class="text-center mt-2 mb-3"><img src="./resource/images/tutor.jpg" alt=""
                                class="img-fluid img-contact-height bg-white"></div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 bg-white">
                        <form action="contact.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fname" class="label-edited">Tên</label><span class="required" id="fname-error">*</span>
                                    <input type="text" name="fname" class="form-control input-edited" id="fname" placeholder="Ryan"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lname" class="label-edited">Họ lót</label> <span
                                        class="required" id="lname-error">*</span>
                                    <input type="text" name="lname" class="form-control input-edited" id="lname"
                                        placeholder="Reynold" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="label-edited">Địa chỉ email</label> <span
                                    class="required" id="email-error">*</span>
                                <input type="email" name="email" class="form-control input-edited" id="email"
                                    placeholder="123@example.com" required>
                            </div>
                            <div class="form-group">
                                <label for="pnumber" class="label-edited">Số điện thoại</label> <span style="color: red;"
                                     id="pnum-error"></span>
                                <input type="number" name="pnumber" class="form-control input-edited" id="pnumber"
                                    placeholder="0987654321">
                            </div>
                            <div class="form-group">
                                <label for="message" class="label-edited">Lời nhắn</label> <span
                                    class="required" id="message-error">*</span>
                                <textarea class="form-control textarea-edited" name="message" id="message" rows="4"
                                    placeholder="Để lại lời nhắn của bạn ở đây"></textarea>
                            </div>
                            <script>
                                function textValidator(text, maxlength) {
                                    if (text.length < 2 || text.length > maxlength) {
                                            return false;
                                    }
                                    return true;
                                }

                                function phoneNumberValidator(phoneNum) {
                                    if (phoneNum[0] != 0) {
                                            return false;
                                    }
                                    if (phoneNum.length < 10) {
                                        return false;
                                    }
                                    return true;
                                }

                                $('#fname').change( () => {
                                    let fname = $('#fname').val();
                                    
                                    if(!textValidator(fname,50)) {
                                        $('#fname-error').html('    Invalid First name!');
                                    } else{
                                        $('#fname-error').html('*');
                                    }
                                });
                                $('#lname').change( () => {
                                    let lname = $('#lname').val();
                                    
                                    if(!textValidator(lname,50)) {
                                        $('#lname-error').html('    Invalid Last name!');
                                    } else{
                                        $('#lname-error').html('*');
                                    }
                                });
                                $('#pnumber').change( () => {
                                    let pnumber = $('#pnumber').val();
                                    if(!phoneNumberValidator(pnumber)) {
                                        $('#pnum-error').html('    Invalid phone number!');
                                    } else{
                                        $('#lname-error').html('');
                                    }
                                });
                                $('#message').change( () => {
                                    let message = $('#message').val();
                                    
                                    if(!textValidator(message,1000)) {
                                        $('#message-error').html('    Invalid Message!');
                                    } else{
                                        $('#message-error').html('*');
                                    }
                                });
                            </script>
                            <div class="pb-4 pt-2">
                                <button type="submit" class="btn button-send-format" name="submit-btn">GỬI</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="width-100">
                <div
                    class="col-xl-12 col-lg-12 col-md-12 col-sm-12 d-flex flex-column justify-content-start align-items-center white-bg-contact nopadding">
                    <h2 class="pt-3 font-weight-bold get-in-touch-format text-center">KẾT NỐI VỚI CHÚNG TÔI</h2>
                    <div class="row">
                        <div
                            class="col-xl-4 col-lg-4 col-md-4 col-sm-12 d-flex flex-column justify-content-start align-items-center">
                            <div class="p-2"><img src="./resource/images/phone.jpg" alt=""
                                    class="rounded-circle border border-info" width="100"></div>
                            <h5 class="font-weight-bold text-primary">Gọi cho chúng tôi</h5>
                            <p class="font-weight-normal p-2">
                                <svg width="1em" height="1em" viewBox="0 0 16 15" class="bi bi-telephone-fill"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z" />
                                </svg>
                                <span class="p-2">
                                    +84-09-87-65-43-21
                                </span>
                            </p>
                        </div>
                        <div
                            class="col-xl-4 col-lg-4 col-md-4 col-sm-12 d-flex flex-column justify-content-start align-items-center">
                            <div class="p-2"><img src="./resource/images/meet.jpg" alt=""
                                    class="rounded-circle border border-info" width="100"></div>
                            <h5 class="font-weight-bold text-primary">Gặp chúng tôi tại</h5>
                            <p class="font-weight-normal p-2 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                                    <path fill-rule="evenodd"
                                        d="M11.536 3.464a5 5 0 010 7.072L8 14.07l-3.536-3.535a5 5 0 117.072-7.072v.001zm1.06 8.132a6.5 6.5 0 10-9.192 0l3.535 3.536a1.5 1.5 0 002.122 0l3.535-3.536zM8 9a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg>
                                <span class="p-2">
                                    Căn 101, Tầng 1, Tòa nhà Center Point, 106 Nguyễn Văn Trỗi, P.8, Phú
                                    Nhuận
                                    Quận, Thành phố Hồ Chí Minh, Việt Nam
                                </span>
                            </p>
                        </div>
                        <div
                            class="col-xl-4 col-lg-4 col-md-4 col-sm-12 d-flex flex-column justify-content-start align-items-center">
                            <div class="p-2"><img src="./resource/images/email.jpg" alt=""
                                    class="rounded-circle border border-info" width="100"></div>
                            <h5 class="font-weight-bold text-primary">Mail cho chúng tôi</h5>
                            <p class="font-weight-normal p-2">
                                <svg width="1em" height="1em" viewBox="0 0 16 11" class="bi bi-envelope-fill"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                                </svg>
                                <span class="p-2">
                                    support@example.com
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
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