<?php
      include('../server/multi_login/config.php');

      $firstName = '';
      $lastName = '';
      $email = '';
      $phoneNumber = '';
      $message = '';

      if (isset($_POST['submit-btn'])) {
            submit();
      }

      function submit() {
            global $con, $firstName, $lastName, $email, $phoneNumber, $message;
            $firstName    =  e($_POST['fname']);
            $email       =  e($_POST['email']);
            $lastName  =  e($_POST['lname']);
            $phoneNumber  =  e($_POST['pnumber']);
            $message		 =  e($_POST['message']);

            $query = "INSERT INTO contact_info (first_name, last_name, email, phone_number, message) 
					  VALUES('$firstName','$lastName', '$email', '$phoneNumber', '$message')";
		mysqli_query($con, $query);

      }

      // function e($val) {
      //       global $con;
      //       return mysqli_real_escape_string($con, trim($val));
      // }
      mysqli_close($con);
?>
