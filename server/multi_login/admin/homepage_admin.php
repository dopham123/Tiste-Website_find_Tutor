<?php
include('../functions/functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../../../tiste/index.php');//??????????
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header('location: ../../../tiste/index.php');//??????????
}
?>

<!DOCTYPE html>
<html lang="en" style="height: 100%;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> <!-- load jquery via CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../functions/functions.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- style css -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="./style.css">
    <style>
        .row.content {
            height: 100%;
        }

        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }

        .input-group {
            display: block;
        }

        .error {
            width: 92%;
            margin: 0px auto;
            padding: 10px;
            border: 1px solid #a94442;
            color: #a94442;
            background: #f2dede;
            border-radius: 5px;
            text-align: left;
        }

        table {
            font-family: arial, sans-serif;
            background-color: #f2f2f2;
        }

        .table-fix-head td,
        th {
            text-align: center;
            vertical-align: middle;
        }

        .table-fix-head th {
            text-align: center;
            vertical-align: middle;
            border-top: none;
            position: sticky;
            top: 0;
        }

        .table-fix-head {
            height: 300px;
            overflow-y: scroll;
        }

        .border-none {
            border: none;
        }
    </style>
</head>

<body style="height: 100%;">

    <div class="container-fluid" style="height: 100%;">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <div class="row d-flex justify-content-center">
                    <div class="p-2"><img src="../../../tiste/resource/images/admin.png" alt="" class="rounded-circle border border-dark" width="100"></div>
                </div>
                <div class="row d-flex justify-content-center">
                    <h6>Admin</h6>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="p-2"><img src="../../../tiste/images/logo.png" alt="" class="img-fluid" width="400"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="nav flex-column nav-pills">
                            <button id="user-btn" class="btn btn-info mt-3" type="button" onclick="loadFile('data-table', 'user_info.php')">Hiển thị danh sách người dùng</button>
                            <button id="add-btn" class="btn btn-success mt-3" type="button" onclick="loadFile('add-new-user', 'create_user_form.php')">Thêm một người dùng mới</button>
                            <button id="service-btn" class="btn btn-primary mt-3" type="button" onclick="loadFile('service-table', 'manage_service.php');">Xem danh sách dịch vụ</button>
                            <button id="contact-btn" class="btn btn-warning mt-3" type="button" onclick="loadFile('contact-data', 'show_contact.php');">Xem tin nhắn</button>
                            <!-- <a href="manage_service.php"><button type="button" class="btn btn-info mt-3" style="width: 100%;">Xem danh sách dịch vụ</button></a> -->
                            <!-- <a class="nav-link">Profile</a>
                            <a class="nav-link">Messages</a>
                            <a class="nav-link">Settings</a> -->
                            <a href="../../../tiste/index.php?logout=1" style="color: red;">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-12">
                        <span style="color: black; font-size: 2rem; font-weight: bold">Dashboard</span>
                    </div>
                </div>
                <hr>
                <div class="data-table"></div>
                <div class="service-table"></div>
                <div class="contact-data"></div>
                <div class="container">
                    <div class="add-new-user mt-5"></div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-10">
                            <div class="show-message" style="text-align: left;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#service-btn').click( () =>{
            $('.add-new-user').html('');
            $('.data-table').html('');
            $('.contact-data').html('');
        });
        $('#user-btn').click( () =>{
            $('.service-table').html('');
            $('.contact-data').html('');
        });
        $('#add-btn').click( () =>{
            $('.service-table').html('');
            $('.contact-data').html('');
        });
        $('#contact-btn').click( () =>{
            $('.add-new-user').html('');
            $('.data-table').html('');
            $('.service-table').html('');
        });
    </script>
</body>

</html>