<?php include('header.php');?>
  <body class="skin-blue">
    <div class="wrapper">
      <?php include('menu.php');?>

        <div class="content-wrapper">
          <section class="content-header">
            <h1> Update Trainer <small>it all starts here</small> </h1>
            <ol class="breadcrumb">
              <li><a href="dahboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="trainer-list.php">Trainer List</a></li>
              <li class="active">Update Trainer</li>
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
                             $trainer_id = $_REQUEST['id'];
                              require_once 'db.php';
                             $sql = "SELECT * FROM trainer  where trainer_id = '$trainer_id' ";
                             $retval = mysqli_query($conn, $sql);
                             
                             if(! $retval ) {
                                die('Could not get data: ' . mysql_error());
                             }
                  ?>
                  <form action="update.php" role="form" method="post">
                    <?php  while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {  ?>
                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Trainer First Name</label>
                        <input type="hidden" class="form-control" name="trainer_id" value="<?php echo $row['trainer_id'] ?>">
                        <input type="text" class="form-control" name="trainer_fname" value="<?php echo $row['trainer_fname'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">TrainerLast Name</label>
                        <input type="text" class="form-control" name="trainer_lname" value="<?php echo $row['trainer_lname'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Trainer Email Id</label>
                        <input type="email" class="form-control" name="trainer_email" value="<?php echo $row['trainer_email'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Trainer Contact No.</label>
                        <input type="number" class="form-control" name="trainer_contact" value="<?php echo $row['trainer_contact'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Trainer Adhar Card No.</label>
                        <input type="number" class="form-control" name="trainer_aadhar" value="<?php echo $row['trainer_aadhar'] ?>"required>
                      </div>
                      <div class="form-group">
                        <label>Trainer Gendar</label>
                        <select class="form-control" name="trainer_gender">
                           <option value="Male">Male</option>
                           <option value="Female">Female</option>

                        </select>



                      </div>
                      <?php
                           require_once 'db.php';
                           $sql = 'SELECT * FROM timeslote';
                           $retval = mysqli_query($conn, $sql);

                           if(! $retval ) {
                              die('Could not get data: ' . mysql_error());
                        }?>
                      <div class="form-group">
                        <label>Trainer Time Slote</label>
                        <select class="form-control" name="trainer_time_id">
                           


                          <?php  while($key = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {  ?>
                            <?php if($row['timeslote_id'] != $key['timeslote_id']){?>
                             <option value="<?php echo $key['timeslote_id'] ?>"><?php echo $key['timeslote_time']?></option>
                           <?php }else { ?>
                              <option value="<?php echo $row['timeslote_id'] ?>"><?php echo $row['timeslote_time'] ?></option>
                           <?php } ?>
                          <?php } ?>

                        </select>



                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                       <textarea class="form-control" rows="3" name="userAddress" ><?php echo $row['trainer_address'] ?></textarea>
                      </div>
                     <!--  <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                      </div> -->
                    <?php } ?>
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="btn_time" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>    
              </div> 
            </div>
       </section>
      </div>

 <?php include('footer.php');?>