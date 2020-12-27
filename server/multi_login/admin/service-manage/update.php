
<?php
include('../../functions/functions.php');

$id = $_POST["edit_id"];
$subject=$_POST["subject"];
$class=$_POST["class"];
$salary = $_POST["salary"];
$numstd=$_POST["numstd"];
$star=$_POST["star"];
$eval = $_POST["eval"];
$check_stt=$_POST["check_stt"];
$sql="UPDATE service set subject='$subject', class='$class', salary='$salary', num_of_std='$numstd', star='$star', eval='$eval', check_accept='$check_stt' where id='$id'";
if($db->query($sql)===TRUE){
    echo "DATA updated";
}
?>
