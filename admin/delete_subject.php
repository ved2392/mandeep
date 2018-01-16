<?php
include "../connect/connection.php" ;
echo $id = $_REQUEST['id'];

echo $sql = "DELETE FROM `subject_table` WHERE id='$id'";
$query = mysqli_query($conn, $sql);
if($query){
header('location: subject.php');
	
}
?>