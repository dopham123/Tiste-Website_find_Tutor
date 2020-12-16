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
	<link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <div class="container">
        <div class="data-table">
		</div>
		<div class="show-message"></div>

        <button type="button" onclick="loadFile('data-table', 'user_info.php')">Show Data</button>
	</div>

	<div class=""></div>
</body>
</html>

