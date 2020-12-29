<?php require "../../config.php"; ?>
<?php include('../../functions/functions.php'); ?>

<?php
    $id = $_GET['id'];
    $id = e($id);
	$query = "DELETE FROM contact_info WHERE id = $id";
    $qry_result = mysqli_query($con, $query);
?>