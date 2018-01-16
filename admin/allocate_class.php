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

<h2>Allocated Classess</h2>
<a href="addclass.php"><div class="button">Add New</div></a>
<table id="myTable" class="table table-striped table-bordered table-hover datatable dataTable" style="font-size:14px;text-align:center">  
        <thead>  
          <tr>  
            <th>S No.</th>  
            <th>Class Name</th>  
            <th>Day</th>			
            <th>Subject</th>			
            <th>Teacher Id</th>			
            <th>Teacher Name</th>			
            <th>Student Id</th>			
            <th>Student Name</th>			
            <th>Delete</th>			
            <th>Edit</th>			
          </tr>  
        </thead>
		  <tbody> 
<?php 
$getclass = "SELECT * FROM  class_table order by id desc";
$alloc_query = mysqli_query($conn, $getclass);
$result = mysqli_num_rows($alloc_query);
if($result>0){
$sno = 1;
while($row = mysqli_fetch_assoc($alloc_query)){
$id = $row['id'];
$class_name = $row['class_name'];
$start_time = $row['start_time'];
$end_time = $row['end_time'];
$day = $row['day'];
$subject_id = $row['subject_id'];
$teacher_id = $row['teacher'];
$student_id = $row['student'];
?>
<tr>  
            <td><?php echo $sno ; ?></td>  
            <td><?php echo $class_name ; ?></td>  
            <td><?php echo $day ; ?></td>  
            <td><?php 
             $getsub = "SELECT * FROM subject_table WHERE id = '$subject_id' LIMIT 0, 1";
			 $subquery = mysqli_query($conn, $getsub);
			 while($subrow = mysqli_fetch_assoc($subquery)){
				echo $subrow['name']; 
			 }
            ?></td>  
            <td><?php echo $teacher_id ; ?></td>  
            <td>
			<?php 
             $getteach = "SELECT * FROM user_table WHERE role ='teacher' and id = '$teacher_id' LIMIT 0, 1";
			 $teachquery = mysqli_query($conn, $getteach);
			 while($techrow = mysqli_fetch_assoc($teachquery)){
				echo $techrow['name']; 
			 }
            ?>
			</td>  
            <td><?php echo $student_id ; ?></td>  
           <td>
		   <?php 
		  $getstu = "SELECT * FROM user_table WHERE role ='student' and id = '$student_id' LIMIT 0, 1";
			 $studentquery = mysqli_query($conn, $getstu);
			 while($studrow = mysqli_fetch_assoc($studentquery)){
				echo $studrow['name']; 
			 }
            ?>
		   
		
		   </td>  
            <td><a class="delete" href="delete_class.php?id=<?php echo $id; ?>"><img src="img/delete.png" style="width:15px"></a></td>  
            <td><a class="edit" href="edit_class.php?id=<?php echo $id; ?>"><img src="img/edit.png" style="width:15px"></a></td>  
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