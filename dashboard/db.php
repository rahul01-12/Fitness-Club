<?php
$host     = "localhost"; // Host name 
$username = "root"; // Mysql username 
$password = "root"; // Mysql password 

$conn=mysqli_connect("localhost", "root", "root", "fitness_club");


if (mysqli_connect_errno($conn)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>