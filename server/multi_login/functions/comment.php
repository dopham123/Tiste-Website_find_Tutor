<?php
      // include('../server/multi_login/config.php');
      include('../config.php');
      $data = array();
      if (!isset($_GET["id"])) {
            global  $data;
            $data["success"] = false;
            $data["error"] = "No comment here";
      }
      else {
            global $data;
            $id = $_GET["id"];
            $query = " SELECT c.id, u.user_id, u.first_name, u.last_name, c.comment, c.tutorID
                              FROM comment AS c , users_info AS u
                              WHERE tutorID='$id' 
                              AND c.commentatorID = u.user_id;";
            $result = mysqli_query($con, $query);
            $comment = array();
            if (mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)) {
                        array_push($comment, $row);
                  }
            }
            $data["success"] = true;
            $data["comment"] = $comment;
      }
      
	echo json_encode($data);
      mysqli_close($con);
?>