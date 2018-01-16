<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<?php
include "dash_head.php" ;
include "../connect/connection.php" ;
$page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
if(isset($_POST['add_subject'])){
	$subject_name = $_POST['subject_name'];

$addsql = "INSERT INTO `subject_table`(`id`, `name`) VALUES (' ','$subject_name')";	
$addquery = mysqli_query($conn, $addsql);
if($addquery){
	$message = "Subject Added";
}
else{
$message = "Subject not Added";	
}	
}
if(isset($_POST['edit'])){
 $subid = $_REQUEST['subjectid'];
 $subid = $_REQUEST['subjectid'];
$subname = $_REQUEST['subject_name'];
 
$editsql = "UPDATE `subject_table` SET `id`='$subid',`name`='$subname' WHERE id='$subid'";
$editquery = mysqli_query($conn, $editsql);
if($editquery){
$message = "Subject Updated Successfully";	
}
else{
$message = "Error While updating Subject";		
}
}
?>
<div class="main-admin">
<div class="col-xs-12 col-sm-3 no_space">
<?php include "admin_sidebar.php" ;?>
</div>
<div class="col-xs-12 col-sm-9">

<!-- Add Subject Model Start -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Subject</h4>
      </div>
      <div class="modal-body">
      <form action ="" method ="post">
     <div class="col-xs-12 col-sm-12">
       <div class="form-group">
	   <label for="email">Subject Name</label>
       <input type="text" class="form-control" placeholder="Subject Name" name="subject_name" required>
       </div>
     </div>
	 <div class="col-xs-12 col-sm-12">
       <div class="form-group">
       <button type="submit" class="button" name="add_subject"> Submit</button>
       </div>
     </div>
	  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Add Subject Model End -->





<div class="main">
<h2>Manage Subjects</h2>
<div class="mess"><?php echo $message; ?></div>
<div class="button" data-toggle="modal" data-target="#myModal">Add New</div>
<table id="myTable" class="table table-striped table-bordered table-hover datatable dataTable" style="font-size:14px;text-align:center">  
        <thead>  
          <tr>  
            <th>S No.</th>  
            <th>Subjact Name</th>  
            <th>Delete</th>  
            <th>Edit</th>		
          </tr>  
        </thead>
		  <tbody> 
<?php 
$getsub = "SELECT * FROM subject_table order by id desc";
$subquery = mysqli_query($conn, $getsub);
$result = mysqli_num_rows($subquery);
if($result>0){
$sno = 1;
while($row = mysqli_fetch_assoc($subquery)){
$id = $row['id'];
$name = $row['name'];
?>
<tr> 
            <td><?php echo $sno ; ?></td>  
            <td><?php echo $name ; ?></td>  
            <td><a href="delete_subject.php?id=<?php echo $id; ?>" class="delete"><img src="img/delete.png" style="width:15px"></a></td>  
            <td><a class="edit" class="button" data-toggle="modal" data-target="#myModaledit<?php echo $id; ?>"><img src="img/edit.png" style="width:15px"></a></td>  
          </tr>
<!-- Edit Subject Model Start -->
<div id="myModaledit<?php echo $id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Subject</h4>
      </div>
      <div class="modal-body">
      <form action ="" method ="post">
     <div class="col-xs-12 col-sm-12">
       <div class="form-group">
	   <label for="email">Subject Name</label>
       <input type="text" class="form-control" placeholder="Subject Name" name="subject_name" required>
       <input type="hidden" id ="subjectid" name="subjectid" value="<?php echo $row['id'] ; ?>">
       </div>
     </div>
	 <div class="col-xs-12 col-sm-12">
       <div class="form-group">
       <button type="submit" id ="edit" class="button" name="edit"> Submit</button>
       </div>
     </div>
	  </form>
      </div>
    </div>

  </div>
</div>
<!-- Add Subject Model End -->		  

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