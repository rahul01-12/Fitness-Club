<?php
$host     = "remotemysql.com"; // Host name 
$username = "pVrORKezli"; // Mysql username 
$password = "Wsy4c56mDy"; // Mysql password 

$conn=mysqli_connect("remotemysql.com", "pVrORKezli", "Wsy4c56mDy", "pVrORKezli");


if (mysqli_connect_errno($conn)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
