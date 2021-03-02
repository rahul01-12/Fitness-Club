<?php
	
	if (isset($_POST['login_btn'])) {
		login();
	}

function login(){
	global $db, $username, $errors;

	$username = $_POST['username'];
	$password = $_POST['password'];
	session_start();
	
	if (count($errors) == 0) {
		$password = md5($password);
		 require_once 'db.php';
		$query = "SELECT * FROM admin WHERE admin_email='$username' AND admin_password='$password' LIMIT 1";
		$results = mysqli_query($conn, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: dashboard.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: dashboard/login.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
			$message = "hello";
			$_SESSION['errorMessage'] = true;
			$_SESSION['error']  = "You are now logged in";
			 header('location: login.php');
		}
	}
}
	
?>