<?php
include('../functions/functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home Page</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> <!-- load jquery via CDN -->
	<script src="../functions/functions.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<!-- style css -->
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
	<link rel="stylesheet" href="./style.css">
	<style>
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
			border-collapse: collapse;
			width: 100%;
		}

		.table-fix-head td,
		th {
			border: 1px solid black;
			text-align: left;
			padding: 8px;
			text-align: center;
			width: 1%;
		}

		.table-fix-head th {
			border: 1px solid black;
			border-top: none;
			position: sticky;
			top: 0;
			background-color: #ccc;
		}

		.table-fix-head {
			height: 300px;
			overflow-y: scroll;
		}
	</style>
</head>

<body>
	<div class="container">
		<h1>Admin Page</h1>
		<div class="text-center">
			<div class="row">
				<div class="col-sm-12">
					<button type="button" onclick="loadFile('data-table', 'user_info.php')">Hiển thị danh sách người dùng</button>
					<button type="button" onclick="loadFile('add-new-user', 'create_user_form.php')">Thêm một người dùng mới</button>
					<a href="manage_service.php"><button type="button" >Xem danh sách dịch vụ</button></a>
					<a href="../index.php?logout='1'" style="color: red;">logout</a>
				</div>
				<div class="col-sm-12">
					<div class="data-table"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="container mt-5 border p-4">
		<div class="add-new-user"></div>
		<div class="row d-flex justify-content-center">
			<div class="col-sm-10">
				<div class="show-message" style="text-align: left;"></div>
			</div>
		</div>
	</div>

</body>

</html>