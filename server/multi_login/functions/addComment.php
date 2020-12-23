<?php
      // include('../server/multi_login/config.php');
      include('../config.php');
      $data = array();

      $commentatorID = $_POST["commentatorID"];
      $comment = $_POST["newComment"];
      $tutorID = $_GET["id"];
      $query = "INSERT INTO comment (comment, commentatorID, tutorID) 
					  VALUES('$comment', $commentatorID, $tutorID)";
      if (!mysqli_query($con, $query)) {
            global $data;
            $data["success"] = false;
            $data["error"] = "error";
      } else {
            global $data;
            $data["success"] = true;
      }
      echo json_encode($data);
      mysqli_close($con);
      
?>