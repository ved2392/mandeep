<?php
include "../connect/connection.php" ;
$id = $_REQUEST['id'];

$sql = "DELETE FROM `user_table` WHERE id='$id'";
$query = mysqli_query($conn, $sql);
if($query){
	header('location: manage_user.php');
}
?>