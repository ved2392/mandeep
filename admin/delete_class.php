<?php
include "../connect/connection.php" ;
$id = $_REQUEST['id'];

echo $sql = "DELETE FROM `class_table` WHERE id='$id'";
$query = mysqli_query($conn, $sql);
if($query){
header('location: allocate_class.php');
	
}
?>