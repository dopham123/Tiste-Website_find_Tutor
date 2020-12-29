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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- style css -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="./style.css">
    <script language="javascript" type="text/javascript" src="script/jquery-1.9.1.min.js"></script>
    
    <style>
		table,
		td {
			border: 1px solid black;
			background: yellow;
		}

		table {
			padding: 0;
			border-spacing: 0;
		}

		td {
			padding: 5px 5px 5px 5px;
			width: 15px;
			text-align: center;
			margin: 0px;
		}

		.del {
			border: 1px solid black;
			background: white;
			text-decoration: none;
			padding: 0px 5px 0px 5px;
			color: red;
			border-radius: 5px;
		}

		#update {
			padding: 5px 25px 5px 25px;
			margin-bottom: 10px;
			color: green;
			border: 4px solid black;
			border-radius: 5px;
		}

		#update:hover {
			background: #54e346;
			color: aliceblue;
			transition: .3s;
		}
		.service-form{
			overflow-x: scroll;
		}
    </style>
    <!-- <script>
		$(document).ready(function() {
			// Delete 
			$('.del').click(function() {
				console.log(this)
				var el = this;

				// Delete id
				var deleteid = $(this).data('id');
				//document.write(deleteid);
				var confirmalert = confirm("Are you sure?");
				if (confirmalert == true) {
					// AJAX Request
					$.ajax({
						url: 'service-manage/delete.php',
						type: 'POST',
						data: {
							id: deleteid
						},
						success: function(response) {

							if (response == 1) {
								// Remove row from HTML Table
								$(el).closest('tr').css('background', 'tomato');
								$(el).closest('tr').fadeOut(800, function() {
									$(this).remove();
								});
							} else {
								alert('Invalid ID.');
							}

						}
					});
				}

			});

			$('.update').click(function() {
				var edit_id = $(this).data('id');
				var subject = $("#" + edit_id + "_subject").val();
				var classs = $("#" + edit_id + "_class").val();
				var salary = $("#" + edit_id + "_salary").val();
				var numstd = $("#" + edit_id + "_numstd").val();
				var star = $("#" + edit_id + "_star").val();
				var eval = $("#" + edit_id + "_eval").val();
				var check_stt = $("#" + edit_id + "_check").val();
				$.ajax({
					url: "service-manage/update.php",
					type: "POST",
					cache: false,
					data: {
						edit_id: edit_id,
						subject: subject,
						class: classs,
						salary: salary,
						numstd: numstd,
						star: star,
						eval: eval,
						check_stt: check_stt
					},
					success: function(data) {
						if (data) {
							alert(data);
						} else {
							alert("Some thing went wrong");
						}
					}
				});
			});
		});
    </script> -->
</head>

<body>
    	<form>
		<div class="row d-flex justify-content-center">
			<h2>THÔNG TIN GIA SƯ</h2>
		</div>
        <div id='_table' class="service-form col-sm-12">
            <table id="fixTable">
                	<thead>
                    	<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Subject</th>
					<th>Class</th>
					<th>Salary</th>
					<th>Number of Student</th>
					<th>Star</th>
					<th>Number of Evaluate</th>
					<th>User Id</th>
					<th>Status</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody id="user_table">
			<?php
				$result = mysqli_query( $db, "SELECT * FROM service AS sv INNER JOIN users_info AS uf ON sv.user_if_id = uf.user_id" );
				//fetch the data from the database
				if ( $result ) {
                			while( $row = mysqli_fetch_array( $result) ) {
						$id = $row['id'];
						$subject = $row['subject'];
						$class = $row['class'];
						$star = $row['star'];
						$num_of_std = $row['num_of_std'];
						$salary = $row['salary'];
						$eval = $row['eval'];
                    			$user_if_id = $row['user_if_id'];
						$check_accept = $row['check_accept'];
						$name = $row['first_name'].' '.$row['last_name'];
						echo "<tr>";
						echo "<td>".$id."</td>";
						echo "<td><input id ='".$id."_name' name ='".$id."_name' type = 'text' value = '".$name."'readonly></td>";
						echo "<td><input id ='".$id."_subject' name ='".$id."_subject' type = 'text' value = '".$subject."'></td>";
						echo "<td><input id ='".$id."_class' name ='".$id."_class' type = 'text' value = '".$class."'></td>";
						echo "<td><input id ='".$id."_salary' name ='".$id."_salary' type = 'text' value = '".$salary."'></td>";
						echo "<td><input id ='".$id."_numstd' name ='".$id."_numstd' type = 'text' value = '".$num_of_std."'></td>";
						echo "<td><input id ='".$id."_star' name ='".$id."_star' type = 'text' value = '".$star."'></td>";
						echo "<td><input id ='".$id."_eval' name ='".$id."_eval' type = 'text' value = '".$eval."'></td>";
						echo "<td><input id ='".$id."_userid' name ='".$id."_userid' type = 'text' value = '".$user_if_id."'readonly></td>";
						echo '<td>';
						if($check_accept == 1){
							$text1 = 'selected';
							$text2 = '';
						}
						else{
							$text1 = '';
							$text2 = 'selected';						
						}
						echo '<select name="'.$id.'_check" id="'.$id.'_check">
								<option value="1"'.$text1.'>Available</option>
								<option value="2"'.$text2.'>Not Available</option>
                    			</select></td>';
						echo "<td><button 
									onclick='
									deleteService(event);'
						type = 'button' class = 'del' data-id='".$id."'>Delete</button></td>";
						echo "<td><button 
										onclick='
										updateService(event);'
						type = 'button' class = 'update' data-id='".$id."'>Update</button></td>";
                				echo "</tr>";
                			}
                		} else {
                			// Code xử lý lỗi
                			echo "Xảy ra lỗi khi truy vấn dữ liệu";
                		}
                			//$rowcount = mysqli_num_rows( $result );
			?>
			</tbody>
            </table>
        </div>
    </form>
</body>

</html>