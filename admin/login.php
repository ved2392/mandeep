<?php 
session_start();
include "dash_head.php";
include "../connect/connection.php";
if(isset($_POST['login'])){
$email = $_POST['email'];
$password = $_POST['password'];
echo $sql = "SELECT * FROM user_table WHERE email = '$email'  and password = '$password'";
$query = mysqli_query($conn, $sql);
$result = mysqli_num_rows($query);
if($result >=1){
while($row = mysqli_fetch_assoc($query)){
$_SESSION['name'] = $row['name'];
$_SESSION['user_id'] = $row['id'];
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
	$message = "Invalid Username Or Password";
}
}


?>
<div class="main">
<div class="container">
<div class="row">
<div class="register-from">
  <h2>Online Learning Portal Login</h2>
  <div class= "mess"><span><?php echo $message ; ?></span></div>
  <form action="" method="post">
  
  <div class="col-xs-12 col-sm-12">
  <div class="form-group">
      <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
  </div>
  </div>
  
  <div class="col-xs-12 col-sm-12">
  <div class="form-group">
     <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
  </div>
  </div>


<div class="col-xs-12 col-sm-12">
  <div class="form-group">
<button type="submit" name = "login" class="button" >Login</button>
 </form>
</div>
</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

</script>
