<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<?php
include "dash_head.php" ;
include "../connect/connection.php" ;
$page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
?>
<div class="main-admin">

<div class="col-xs-12 col-sm-3 no_space">
<?php include "admin_sidebar.php" ;?>
</div>
<div class="col-xs-12 col-sm-9">
<div class="main">

<h2>Manage Users</h2>
<a href="add_user.php"><div class="button">Add New</div></a>
<table id="myTable" class="table table-striped table-bordered table-hover datatable dataTable" style="font-size:14px;text-align:center">  
        <thead>  
          <tr>  
            <th>S No.</th>  
            <th>Name</th>  
            <th>Email</th>  
            <th>Registered As</th>
            <th>DOB</th>			
            <th>Delete Users</th>			
            <th>Edit Users</th>			
          </tr>  
        </thead>
		  <tbody> 
<?php 
$getuser = "SELECT * FROM user_table WHERE role != 'admin'";
$userquery = mysqli_query($conn, $getuser);
$result = mysqli_num_rows($userquery);
if($result>0){
$sno = 1;
while($row = mysqli_fetch_assoc($userquery)){
$id = $row['id'];
$name = $row['name'];
$email = $row['email'];
$jobrole = $row['role'];
$dob = $row['dob'];
?>
<tr>  
            <td><?php echo $sno ; ?></td>  
            <td><?php echo $name ; ?></td>  
            <td><?php echo $email ; ?></td>  
            <td class="cpat"><?php echo $jobrole ; ?></td>  
            <td><?php echo $dob ; ?></td>  
            <td><a class="delete" href="delete_user.php?id=<?php echo $id; ?>"><img src="img/delete.png" style="width:15px"></a></td>  
            <td><a class="edit" href="edit_user.php?id=<?php echo $id; ?>"><img src="img/edit.png" style="width:15px"></a></td>  
          </tr> 

<?php
$sno++;
}
}
else{
echo "<h1>No Record Found</h1>";	
}
?>		 
        </tbody>  
      </table>  
	  <script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
</div>
</div>
</div>