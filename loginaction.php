<?php 
$conn = new mysqli("localhost", "root", "", "login");

$fname = $_POST['first'];
$lname = $_POST['last'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = mysqli_query($conn,"INSERT INTO `login`.`username` (`id`, `fname`, `lname`, `email`, `password`) VALUES (NULL, '$fname', '$lname', '$email', '$password')");



?>
<script >alert('Added Successfully!');</script>
<script>
window.location.href='login.php';
</script>