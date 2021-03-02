<?php include('header.php');?>
  <body class="skin-blue">
    <div class="wrapper">
      <?php include('menu.php');?>

        <div class="content-wrapper">
          <section class="content-header">
            <h1> Add New User <small>it all starts here</small> </h1>
            <ol class="breadcrumb">
              <li><a href="dahboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="user-list.php">User List</a></li>
              <li class="active">Add User</li>
            </ol>
          </section>
         <section class="content">
            <div class="row">
              <div class="col-md-6">
                <div class="box box-primary">
                  <div class="box-header">
                   <!--  <h3 class="box-title">Add User</h3> -->
                  </div>
                  <?php
                             $user_id = $_REQUEST['id'];
                              require_once 'db.php';
                             $sql = "SELECT * FROM users left join timeslote on timeslote.timeslote_id = users.user_timeslote join trainer t on t.trainer_id = users.user_trainer join package p on p.package_id = users.user_package where user_id = '$user_id' ";
                             $retval = mysqli_query($conn, $sql);
                             
                             if(! $retval ) {
                                die('Could not get data: ' . mysql_error());
                             }
                  ?>
                  <form action="update.php" role="form" method="post">
                    <?php  while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {  ?>
                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="hidden" class="form-control" name="user_id" value="<?php echo $row['user_id'] ?>" required>
                        <input type="text" class="form-control" name="user_fname" value="<?php echo $row['user_fname'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" class="form-control" name="user_lname" value="<?php echo $row['user_lname'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email Id</label>
                        <input type="email" class="form-control" name="user_email" value="<?php echo $row['user_email'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Contact No.</label>
                        <input type="number" class="form-control" name="user_contact" value="<?php echo $row['user_contact'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Adhar Card No.</label>
                        <input type="number" class="form-control" name="user_aadhar" value="<?php echo $row['user_aadhar'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Date Of Birth</label>
                        <?php $new_date = date("Y-m-d", $row['user_dob']);?>
                        <input type="date" class="form-control" name="user_dob" value="<?php echo $new_date; ?>" required>

                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Gender</label>
                        <select class="form-control" name="user_gender">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                       <?php
                           require_once 'db.php';
                           $sql = 'SELECT * FROM trainer';
                           $sql1 = 'SELECT * FROM timeslote';
                           $sql2 = 'SELECT * FROM package';
                           $retval = mysqli_query($conn, $sql);
                           $retval1 = mysqli_query($conn, $sql1);
                           $retval2 = mysqli_query($conn, $sql2);
                           
                           if(! $retval ) {
                              die('Could not get data: ' . mysqli_error());
                        }?>
                      <div class="form-group">
                        <label>Time Slot</label>
                        <select class="form-control" name="user_timeslote" required>
                          <option value="<?php echo $row['timeslote_id'] ?>"><?php echo $row['timeslote_time'] ?></option>
                           <?php  while($key = mysqli_fetch_array($retval1, MYSQLI_ASSOC)) {  ?>
                            <?php if($row['timeslote_id'] != $key['timeslote_id']){?>
                             <option value="<?php echo $key['timeslote_id'] ?>"><?php echo $key['timeslote_time'] ?></option>
                           <?php } ?>
                          <?php } ?>
                        </select>
                      </div>
                       <div class="form-group">
                        <label>Trainer Name</label>
                        <select class="form-control" name="user_trainer" required>
                             <option value="<?php echo $row['user_trainer'] ?>"><?php echo $row['trainer_fname'] .' '. $row['trainer_lname']?></option>
                           <?php  while($rat = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {  ?>
                            <?php if($row['user_trainer'] != $rat['trainer_id']){?>
                             <option value="<?php echo $rat['trainer_id'] ?>"><?php echo $rat['trainer_fname'] .' '. $rat['trainer_lname']?></option>
                           <?php } ?>
                          <?php } ?>
                        </select>
                      </div>
                      <label>Package</label>
                        <select class="form-control" name="user_package" required>
                            <option value="<?php echo $row['package_id'] ?>"><?php echo $row['package_name']?></option>
                           <?php  while($key = mysqli_fetch_array($retval2, MYSQLI_ASSOC)) {  ?>
                             <?php if($row['package_id'] != $key['package_id']){?>
                             <option value="<?php echo $key['package_id'] ?>"><?php echo $key['package_name']?></option>
                           <?php } ?>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <textarea class="form-control" rows="3" name="user_address" ><?php echo $row['user_address'] ?></textarea>
                      </div>
                     
                      <?php } ?>
                    </div>
                    <div class="box-footer">
                      <button  type="submit" name="btn_update" class="btn btn-primary">Submit
</button>
                    </div>
                  </form>
                </div>    
              </div> 
            </div>
       </section>
      </div>

 <?php include('footer.php');?>