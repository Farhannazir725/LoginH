<?php
// include 'configure.php'; 
$conn = new mysqli("localhost","root","","login");

$name = $_POST['first'];
$email = $_POST['email'];
$other = $_POST['other'];

$sql = mysqli_query($conn,"SELECT * FROM `username` WHERE `fname`='$name' AND `email`='$email' AND `other`='$other' ");
$sql1 = mysqli_num_rows($sql);
if($sql1==1){ 
    ?>
     <script>alert('your Datail has been matched');</script>
     <script>window.location.href ="fogotaction.php?email=<?php echo $email;?>"</script>
<?php }
else{
    
        echo "<script>alert('Datails are not matched');</script>";
        echo "<script>window.location.href ='fogot.php'</script>";
    
}?>
<!-- // while($row= mysqli_fetch_array($sql)){

//     if( $name==$row['fname'] && $email== $row['email'] && $other==$row['other']){
        
        
//     }
   

   


?> -->

