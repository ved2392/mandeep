<?php session_start(); ?>
<div class="nav-side-menu">
    <div class="brand"><?php echo $_SESSION['name']; ?></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="admin_dashboard.php">
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#products" class="collapsed">
                  <a href="add_user.php"><i class="fa fa-gift fa-lg"></i> Add New User<span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li class="<?php if($page =="add_admin.php"){echo "active";} ?>"><a href="add_admin.php">Add Admin</a></li>
                    <li class="<?php if($page =="add_user.php"){echo "active";} ?>"><a href="add_user.php">Add User</a></li>
                </ul>

                 <li  class="collapsed <?php if($page =="manage_user.php"){echo "active";} ?>">
                 <a href="manage_user.php"><i class="fa fa-gift fa-lg"></i> Manage Users</a></li>
               
             <li data-toggle="collapse" data-target="#new" class="collapsed ">
                  <a href="#"><i class="fa fa-car fa-lg"></i> Subjects <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                  <li class="<?php if($page =="subject.php"){echo "active";} ?>"><a href="subject.php">Subjects <span class="arrow"></span></a></li>
                  <li  class="<?php if($page =="addclass.php"){echo "active";} ?>"><a href="addclass.php">Add Class<span class="arrow"></span></a></li>
                  <li  class="<?php if($page =="allocate_class.php"){echo "active";} ?>"><a href="allocate_class.php">Allocate Class<span class="arrow"></span></a></li>
                </ul>


                 <li class="<?php if($page =="student_fee.php"){echo "active";} ?>">
                  <a href="student_fee.php">
                  <i class="fa fa-user fa-lg"></i> Student Fees
                  </a>
                  </li>

                 <li>
                  <a href="#">
                  <i class="fa fa-users fa-lg"></i> Users
                  </a>
                </li>
            </ul>
     </div>
</div>