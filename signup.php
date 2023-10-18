<?php
if($_SERVER["REQUEST_METHOD"]== "POST"){
    $showerror = false;
    $showalert = false;
include 'configure.php'; 
   
   $first = $_POST["first"];
   $last = $_POST["last"];
   $email = $_POST["email"];
   $password = $_POST["password"];
   $cpassword = $_POST["passwordconfirm"];
   $other = $_POST["other"];
//    $exists=false;

   
    //   check whether this username Exists
    $existSql = "SELECT * FROM `username` WHERE email = '$email'";
    
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showerror = " Email is already Exists";
        }
        else{
            // $exists = false;
    if(($password == $cpassword)&&  $first<3){
        $hash = password_hash($password,PASSWORD_BCRYPT);
    $sql = "INSERT INTO `login`.`username` (`id`, `fname`, `lname`, `email`, `password`, `other`) VALUES (NULL, '$first',    
     '$last', '$email', '$hash', '$other')";
    
    if(strlen($first)<3)
    {
        $error[] ='Please Enter 6 Character Atleast'; 
    }
   $result = mysqli_query($conn,$sql);
   if($result){
    $showalert = true;
   
   }
   }
   else{
    $showerror = "Password Do not Match";
   }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-card">
        <?php
        // if(isset($_POST['signup']))
        // {
        //     extract($_POST);
        //     if(strlen($first)<6)
        //     {
        //         $error[] ='Please Enter 6 Character Atleast'; 
        //     }
        //     if(strlen($first)>20)
        //     {
        //         $error[] ='Not More than 20 Character Are Allowed'; 
        //     }
        //     if(strlen($last)<5)
        //     {
        //         $error[] ='Please Enter 5 Character Atleast'; 
        //     }
        //     if(strlen($last)>10)
        //     {
        //         $error[] ='Not More than 10 Character Are Allowed'; 
        //     }
        //     if(strlen($password)<8){
        //         $error[] = 'Password is 6th character long';
        //     }
        //     if($passwordconfirm ==''){
        //         $error[] = 'Please Confirm The Password.';
        //     }
        //     if($password != $passwordconfirm){
        //         $error[] = 'Password Do not match';
        //     }
        //     if(!isset($error)){
        //         $option = array("cost"=>4);
        //         $password = password_hash($password,PASSWORD_BCRYPT,$option);
        //     }

            // $sql = "select * from username Where (email='$email');";
            // $res = mysqli_query($login,$sql);
            // if(mysqli_num_row($res)>0){
            //     $row = mysqli_fetch_array($res);
            //     if($email==$row['email']){
            //         $error = 'Email Already Exits';
            //     }
            // }
            



        // }
        
        ?>
        <h2>Sign Up</h2>
        <?php
        if(isset($error))
        {
            foreach($error as $error)
            {
                echo '&#x26A0'.$error;
            }
        }
        ?>
        <h3>Enter the Credentials</h3>
       <?php
       if($showalert){
       echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> Your Account is Now Is created and You can login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}
       if($showerror){
       echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error</strong> '.$showerror.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}
?>
            <form class="login-form" method="POST" action="signup.php">
                <input type="text" name="first" placeholder="First Name" required autocomplete="off">
                <input type="text" name="last" placeholder="Last Name" required autocomplete="off">
                <input type="text" name="email" maxlenth="30" placeholder="Email" required autocomplete="off">
                <input type="password" name="password" placeholder="Password" required autocomplete="off">
                <input type="password" name="passwordconfirm" placeholder="Confirm Password" required autocomplete="off">
                <input type="text" name="other" placeholder="In case of Forgot Password Verification" required autocomplete="off">
                <button type="submit" value="Submit" name="signup">Sign Up</button>
                <a href="login.php">Login</a>
            </form>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> 
</body>
</html>