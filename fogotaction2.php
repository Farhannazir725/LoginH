<?php
$conn = new mysqli("localhost","root","","login");
$password = $_POST['password'];
$cpassword = $_POST['passwordconfirm'];
$email= $_POST['email'];

if($password!= $cpassword){
    ?>
    <script>alert("Your Password not matched")</script>
    <script>window.location.href = 'fogotaction.php';</script>
<?php }
else{
    $sql = mysqli_query($conn,"UPDATE `username` SET `password`= '$password' WHERE `email`='$email'");
    ?>  <script>alert("Your Password has been changed")</script>
    <script>window.location.href = 'login.php';</script>
<?php }

?>