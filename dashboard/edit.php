<?php

    if (isset($_POST['update_admin'])) {
      adminUpdate();
    }

    function adminUpdate(){

         $admin_id=$_POST['admin_id'];
         $admin_name= $_POST['admin_name']; 
         $admin_email= $_POST['admin_email'];
         $admin_contact= $_POST['admin_contact'];
         $admin_oldgpic= $_POST['admin_oldgpic'];
        //die();
        $c_image= $_FILES['admin_picture']['name'];
        $c_image_temp=$_FILES['admin_picture']['tmp_name'];

        if($c_image_temp != "")
        {
            move_uploaded_file($c_image_temp , "../images/$c_image");
            $sql ="update admin set admin_name='$admin_name', admin_email= '$admin_email', admin_contact = '$admin_contact' , admin_picture= '$c_image'  where admin_id='$admin_id'";  

            unlink("../images/$admin_oldgpic"); 
        }else
        {
          //echo "dd"; die();
           // $sql ="update admin set admin_name='$admin_name', admin_email='$admin_email', where admin_id='$admin_id'";

            $sql = "UPDATE admin SET admin_name= '$admin_name', admin_email= '$admin_email', admin_contact = '$admin_contact' WHERE admin_id = '$admin_id' ";
        }

             require_once 'db.php';
             $retval = mysqli_query($conn, $sql);
             
             if(! $retval ) {
                die('Could not get data: ' . mysql_error());
             }       // get id of the created user
  
           header('location: profile.php'); 

    }
    if (isset($_POST['btn_add'])) {
      changePassword();
    }

    function changePassword(){

         $admin_id=$_POST['admin_id'];
         $admin_name= $_POST['admin_name']; 
         $admin_email= $_POST['admin_email'];
         $admin_contact= $_POST['admin_contact'];
        //die();

            $sql = "UPDATE admin SET admin_name= '$admin_name', admin_email= '$admin_email', admin_contact = '$admin_contact' WHERE admin_id = '$admin_id' ";
        

             require_once 'db.php';
             $retval = mysqli_query($conn, $sql);
             
             if(! $retval ) {
                die('Could not get data: ' . mysql_error());
             }       // get id of the created user
  
           header('location: profile.php'); 
    }

    if (isset($_POST['btn_time'])) {
      addTimeslote();
    }
    if (isset($_POST['add_trainer'])) {
      addTrainer();
    }
  
?>