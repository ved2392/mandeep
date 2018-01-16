<?php 
include "dash_head.php" ;
include "../connect/connection.php" ;
$page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
if(isset($_POST['register'])){
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$date = date("d/m/Y");
date_default_timezone_set("Asia/Kolkata");
$time = date("h:i:sa");
$role= "admin";
/*Check if user not already registered*/

$chksql = "select * from user_table where email = '$email'";
$chkquery = mysqli_query($conn, $chksql);
$result = mysqli_num_rows($chkquery);
if($result >0){
$message = "User already Registered with this email";	
}
else{
$sql = "INSERT INTO `user_table`(`id`, `name`,`email`, `password`, `dob`, `gender`, `contact_number`, `school`, `class_year`, `class_name`, `role`, `date`, `time`) VALUES (' ','$name','$email','$password',' ',' ',' ',' ',' ',' ','$role','$date','$time')";
$query = mysqli_query($conn, $sql);
if($query){
	$message = "successfully Registerd";
}
else{
	$message = "Error While Registration";
}
}
}


?>
<div class="main-admin">

<div class="col-xs-12 col-sm-3 no_space">
<?php include "admin_sidebar.php" ;?>
</div>
<div class="col-xs-12 col-sm-9">
<div class="main">
<div class="register-from">

  <h2>Online Learning Portal</h2>
  <div class="mess"><?php echo $message; ?></div>
  <form action="" method="post">
  <div class="col-xs-12 col-sm-12">
  <div class="form-group">
       <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
  </div>
  </div>
  
  <div class="col-xs-12 col-sm-12">
  <div class="form-group">
      <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
  </div>
  </div>
  
  <div class="col-xs-12 col-sm-6">
  <div class="form-group">
     <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
  </div>
  </div>
  <div class="col-xs-12 col-sm-6">
  <div class="form-group">
     <input type="password" class="form-control" id="re_password" placeholder="Renter password" name="password" required>
  </div>
  </div>
  
  
<div class="col-xs-12 col-sm-12">
  <div class="form-group">
<button type="submit" name = "register" class="button" >Register</button>
 </form>
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
var password = document.getElementById("password")
  , confirm_password = document.getElementById("re_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
