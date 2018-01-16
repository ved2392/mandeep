<?php
include "../connect/connection.php" ;
$id = $_REQUEST['id'];

echo $sql = "DELETE FROM `student_fee` WHERE id='$id'";
$query = mysqli_query($conn, $sql);
if($query){
header('location: student_fee.php');
	
}
?>