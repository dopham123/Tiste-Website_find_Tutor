<?php
      include('../server/multi_login/config.php');
      // include('../config.php');
      $data = array();
      if (!isset($_GET["id"])) {
            global  $data;
            $data["success"] = false;
            $data["error"] = "No tutor here";
      } else {
            global $data;
            $id = $_GET["id"];
            $query = "  SELECT us.id, us.user_type, ui.first_name, ui.last_name, ui.district, ui.city, s.img, s.subject, s.class, s.salary, s.num_of_std, s.exp, s.eval, s.star, s.intro
                              FROM users as us, users_info as ui, service as s
                              WHERE us.id = ui.user_id AND s.user_if_id = us.id AND us.id = '$id';";
            $result = mysqli_query($con, $query);
            $detail = array();
            if (mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)) {
                        array_push($detail, $row);
                  }
            }
            $data["success"] = true;
            $data["detail"] = $detail;
      }

      mysqli_close($con);
?>