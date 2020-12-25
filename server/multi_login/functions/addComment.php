<?php
      // include('../server/multi_login/config.php');
      include('../config.php');
      $data = array();
      $errors = '';

      $commentatorID = $_POST["commentatorID"];
      $comment = $_POST["newComment"];
      if ($comment == '') {
		$errors = "Vui lòng nhập bình luận của bạn!";
      } elseif (strlen($comment) <= 3) {
            $errors = "Vui lòng nhập bình luận có đọ dài lớn hơn!";
      }elseif (strlen($comment) > 100) {
            $errors = "Bình luận quá dài. Vui lòng nhập bình luận ngắn hơn!";
      }
      if ($errors == '') {
            $tutorID = $_GET["id"];
            $query = "INSERT INTO comment (comment, commentatorID, tutorID) 
                                      VALUES('$comment', $commentatorID, $tutorID)";
            if (!mysqli_query($con, $query)) {
                  global $data;
                  $data["success"] = false;
                  array_push($errors, "error in insert database");
                  $data["error"] = $errors;
            } else {
                  global $data;
                  $data["success"] = true;
            }
      } else {
            global $data;
            $data["success"] = false;
            $data["error"] = $errors;
      }
      
      echo json_encode($data);
      mysqli_close($con);
?>