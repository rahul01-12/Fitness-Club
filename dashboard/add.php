<?php
//require_once 'db.php';

//connect_to_database();
   // call the register() function if register_btn is clicked
    $errors = array(); 
    if (isset($_POST['register_btn'])) {
      userRegister();
    }

    if (isset($_POST['btn_add'])) {
      addPackage();
    }
    if (isset($_POST['btn_time'])) {
      addTimeslote();
    }
    if (isset($_POST['add_trainer'])) {
      addTrainer();
    }
  
    function userRegister(){
        // call these variables with the global keyword to make them available in function
          global $db, $errors, $username, $email;
           date_default_timezone_set("Asia/Kolkata");
          // receive all input values from the form. Call the e() function
            // defined below to escape form values
                $newDate = date("m/d/Y", strtotime($_POST['userDob']));  
               
          $user_fname    =  $_POST['userFirstname'];
          $user_lname       = $_POST['userLastname'];
          $user_email  =  $_POST['userEmail'];
          $user_gender  =  $_POST['userGender'];
          $user_contact  =  $_POST['userContact'];
          $user_aadhar  =  $_POST['userAdhar'];
          $user_timeslote  = $_POST['userTime'];
          $user_trainer  =  $_POST['userTriner'];
          $user_address  =  $_POST['userAddress'];
          $user_package  =  $_POST['userPackage'];
          $user_dob  =  $newDate;

          $user_cdate  = date("m/d/Y"); 
          $user_joindate  = date("m/d/Y"); 

              $sql = "INSERT INTO users(user_fname, user_lname, user_email, user_gender, user_contact, user_aadhar, user_timeslote, user_trainer, user_address, user_package, user_dob, user_cdate,user_joindate) VALUES 
('$user_fname', '$user_lname', '$user_email', '$user_gender', '$user_contact', '$user_aadhar', '$user_timeslote', '$user_trainer', '$user_address', '$user_package', '$user_dob','$user_cdate','$user_joindate');";
              //mysqli_query($db, $query);
              require_once 'db.php';

            //$conn=mysqli_connect("localhost", "root", "", "fitness_club");
            $retval = mysqli_query($conn, $sql);
             
             if(! $retval ) {
                die('Could not get data: ' . mysql_error());
             }       // get id of the created user
              //$logged_in_user_id = mysqli_insert_id($db);

              //$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
              //$_SESSION['success']  = "You are now logged in";
              header('location: user-list.php');        
            
          
    } 

    function addPackage(){
        date_default_timezone_set("Asia/Kolkata");
        $package_name    =  $_POST['package_name'];
        $package_price    =  $_POST['package_price'];
        $package_validity    =  $_POST['package_validity'];
        $package_cdate =              date("m/d/yy");    
        require_once 'db.php';
        $sql = "INSERT INTO package(package_name, package_price, package_validity, package_cdate) VALUES ('$package_name', '$package_price', '$package_validity','$package_cdate');";
         $retval = mysqli_query($conn, $sql);
             
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }   
         //array_push($errors, "Wrong username/password combination");
          session_start();
         $_SESSION['success_message'] = "Contact form saved successfully.";
         header('location: package-list.php');   
    }

     function addTimeslote(){
        date_default_timezone_set("Asia/Kolkata");
        $timeslote_time    =  $_POST['timeslote_time'];
        $timeslote_cdate =              date("m/d/Y");    
        require_once 'db.php';
        $sql = "INSERT INTO timeslote(timeslote_time,timeslote_cdate) VALUES ('$timeslote_time', '$timeslote_cdate');";
         $retval = mysqli_query($conn, $sql);
             
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }   

         header('location: timeslote-list.php');   
    }

    function addTrainer(){
         date_default_timezone_set("Asia/Kolkata");
        $trainer_fname    =  $_POST['trainer_fname'];
        $trainer_lname    =  $_POST['trainer_lname'];
        $trainer_email    =  $_POST['trainer_email'];
        $trainer_contact    =  $_POST['trainer_contact'];
        $trainer_aadhar    =  $_POST['trainer_aadhar'];
        $trainer_time_id    =  $_POST['trainer_time_id'];
        $trainer_address    =  $_POST['trainer_address'];
        $trainer_cdate =              date("m/d/Y");    

        require_once 'db.php';
        $sql = "INSERT INTO trainer(trainer_fname, trainer_lname, trainer_email, trainer_contact, trainer_aadhar, trainer_time_id, trainer_address, trainer_cdate) VALUES ('$trainer_fname', '$trainer_lname', '$trainer_email', '$trainer_contact', '$trainer_aadhar', '$trainer_time_id', '$trainer_address', '$trainer_cdate');;";
         $retval = mysqli_query($conn, $sql);
             
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }   

         header('location: trainer-list.php');   
    }
?>