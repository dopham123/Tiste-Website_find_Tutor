<?php
      include('../server/multi_login/config.php');
      // include('../config.php');
      
      $query = '  SELECT p.id, c.name AS class_type, g.name AS grade, t.name AS tutor_type, p.min_price, p.max_price 
                        FROM prices AS p
                        LEFT JOIN class_type AS c ON p.class_typeID = c.id
                        LEFT JOIN grade AS g ON p.gradeID = g.id
                        LEFT JOIN tutor_type AS t ON p.tutor_typeID = t.id
                        ORDER BY c.name, g.name, t.name;';
      $result = mysqli_query($con, $query);
      $data = array();
      if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)) {
                  array_push($data, $row);
            }
      }
      
      $data = json_encode($data);
      mysqli_close($con);
      ?>