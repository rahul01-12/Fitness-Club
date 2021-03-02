<?php include('header.php');?>
  <body class="skin-blue">
    <div class="wrapper">
      <?php include('menu.php');?>

        <div class="content-wrapper">
          <section class="content-header">
            <h1> Add New Trainer <small>it all starts here</small> </h1>
            <ol class="breadcrumb">
              <li><a href="dahboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="trainer-list.php">Trainer List</a></li>
              <li class="active">Add Trainer</li>
            </ol>
          </section>
         <section class="content">
            <div class="row">
              <div class="col-md-6">
                <div class="box box-primary">
                  <div class="box-header">
                   <!--  <h3 class="box-title">Add User</h3> -->
                  </div>
                  <form action="add.php" role="form" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Trainer First Name</label>
                        <input type="text" class="form-control" name="trainer_fname" placeholder="Enter First Name" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">TrainerLast Name</label>
                        <input type="text" class="form-control" name="trainer_lname" placeholder="Enter First Name" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Trainer Email Id</label>
                        <input type="email" class="form-control" name="trainer_email" placeholder="Enter Email Id" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Trainer Contact No.</label>
                        <input type="number" class="form-control" name="trainer_contact" placeholder="Enter Contact No." required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Trainer Adhar Card No.</label>
                        <input type="number" class="form-control" name="trainer_aadhar" placeholder="Enter Contact No." required>
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
                           <option value="">--Please choose an option--</option>
                          <?php  while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {  ?>
                             <option value="<?php echo $row['timeslote_id'] ?>"><?php echo $row['timeslote_time']?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <textarea class="form-control" rows="3" name="trainer_address" placeholder="Enter ..."></textarea>
                      </div>
                     <!--  <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                      </div> -->
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="add_trainer" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>    
              </div> 
            </div>
       </section>
      </div>

 <?php include('footer.php');?>