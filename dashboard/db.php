<?php
$host     = "remotemysql.com"; // Host name 
$username = "pVrORKezli"; // Mysql username 
$password = "0ucnwF0fNX"; // Mysql password 

$conn=mysqli_connect("remotemysql.com", "pVrORKezli", "0ucnwF0fNX", "pVrORKezli");


if (mysqli_connect_errno($conn)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
