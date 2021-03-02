<?php //require('dashboard/function.php');  



?>



<?php 
session_start();

if(!isset($_SESSION['username'])){

	header("location: dashboard/login.php");
}
else {
  	
  	header("location: dashboard/login.php");

}
?>
