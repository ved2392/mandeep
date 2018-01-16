<?php
session_start();
include "dash_head.php";
echo $_SESSION['name'];
if($_SESSION['name']){
	$user_id = $_SESSION['user_id'];
$sql = "SELECT role FROM user_table WHERE id='$user_id'";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($query)){
	$role = $row['role'];
	 if($role == 'teacher'){
	 header('location: teacher_dashboard.php');
 }
 else if($role == 'student'){
	header('location: student_dashboard.php'); 
 }
  else if($role == 'parent'){
	header('location: parent_dashboard.php'); 
 }
 else{
	header('location: admin_dashboard.php');  
 }
}
}
else{
	header('location:login.php');
}

?>