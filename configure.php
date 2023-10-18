<?php 
$server ="localhost";
$username = "root";
$password = "";
$database = "login";
// $conn = new mysqli("localhost", "root", "", "login");
$conn = new mysqli($server, $username, $password, $database);


// if($conn){
//     echo "Connection Successful";
// }else{
//     die(mysqli_error($conn));
// }
?>