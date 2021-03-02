<header class="main-header">
      
        <a href="dashboard.php" class="logo"><b>Fitness</b>Club</a>
      
        <nav class="navbar navbar-static-top" role="navigation">
         
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
           <?php

              require_once 'db.php';
               $sql = 'SELECT * FROM admin';
               $retval = mysqli_query($conn, $sql);
               
               if(! $retval ) {
                  die('Could not get data: ' . mysql_error());
             }?>
             
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?php  while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {  ?>
                  <img src="../images/<?php echo $row['admin_picture'] ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs">Rahul Kurmi</span>
                </a>
                <ul class="dropdown-menu">
                  
                           
                  <li class="user-header">
                    
                    <img src="../images/<?php echo $row['admin_picture'] ?>" class="img-circle" alt="User Image">
                    <p>
                       
   
                       <?php echo $row['admin_name'] ?> - Fitness Club 
                      <small>Member since Nov. 2020</small>
                    </p>
                  <?php } ?>
                  </li>
                  
                 
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" onclick= "logout();" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header><aside class="main-sidebar">
      
        <section class="sidebar" style="height: auto;">
         
           <img src="../dist/img/fitness-club-two.png" class="img-circle" alt="User Image" style="padding: 34px;">
         
          <ul class="sidebar-menu">
            
            <li class="active treeview">
              <a href="dashboard.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
          
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>User</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="user-list.php"><i class="fa fa-circle-o"></i> User List</a></li>
                <li><a href="add-user.php"><i class="fa fa-circle-o"></i> Add User</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Packages</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="package-list.php"><i class="fa fa-circle-o"></i> Packages List</a></li>
                <li><a href="add-package.php"><i class="fa fa-circle-o"></i>Add Packages</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Time Slots</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="timeslote-list.php"><i class="fa fa-circle-o"></i> Time Slots List</a></li>
                <li><a href="add-timeslote.php"><i class="fa fa-circle-o"></i> Add Time Slots</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Trainer</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="trainer-list.php"><i class="fa fa-circle-o"></i>Trainer List</a></li>
                <li><a href="add-trainer.php"><i class="fa fa-circle-o"></i>Add Trainer</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Reports</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               
                <li><a href="report-list.php"><i class="fa fa-circle-o"></i> Report</a></li>
              </ul>
            </li>
         
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Admin</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="profile.php"><i class="fa fa-circle-o"></i>Admin Profile</a></li>
              </ul>
            </li>
           
          </ul>
        </section>
        
      </aside>
      <script>
function logout() {
     var r = confirm("Do you really want to log out?");
    if (r==true)
        {
        <?php
          if (!empty($_SESSION["username"])) {
            unset($_SESSION["username"]);
            session_destroy();
          }
        
        ?>
         window.location.href = 'login.php'
        } 
}
</script>