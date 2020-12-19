<?php
      // include('../server/multi_login/config.php');
      include('../config.php');
      $query = "SELECT * FROM users WHERE user_type='tutor';";
	$result = mysqli_query($con, $query);
	$data = array();
	if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)) {
                  array_push($data, $row);
            }
	}
	echo json_encode($data);
      mysqli_close($con);
?>