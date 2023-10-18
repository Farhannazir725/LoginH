<?php
$login = false;
$showerror = false;
if($_SERVER["REQUEST_METHOD"]== "POST"){
    
include 'configure.php'; 
   
   $email = $_POST["email"];
   $password = $_POST["password"];
 
 
   
            
        

   
    // $sql = "select * from username where email = '$email' AND password = '$password'";
    $sql = "select * from username where email = '$email'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
   if($num == 1){
    while($row=mysqli_fetch_array($result)){
        if(password_verify($password,$row['password'])){
            $login = true;
            session_start();
             $_SESSION['loggedin'] = true;
            $_SESSION['email']= $email;
            header("location:welcome.php");
    
        }
        else{
            $showerror = "Invalid Credentials";
           } 
       
    }
    
    
   }
   
   else{
    $showerror = "Invalid Credentials";
   }

}
?>


<?php
//   if(isset($_POST['submit'])){
//     $username = $_POST['username'];
//     $password = $_POST['password'];
// if(strlen($username)<=8){
//     echo "<span style='color:red;'>Username Shoud Be More Than 8 Character</span> ";
// }

// if(strlen($password)<=8){
//     echo "<span style='color:red;'>Password Shoud Be More Than 8 Character</span> ";
// }

// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<?php
       if($login){
       echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> You Are logged In.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}
 if($showerror){
       echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error</strong> '.$showerror.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}
?>
    <div class="login-card">
        <h2>Login</h2>
        <h3>Enter the Credentials</h3>
            <form class="login-form" method="POST" action="login.php">
                <input type="text" name="email" placeholder="email" required autocomplete="off">
                <input type="password" name="password" placeholder="Password" required autocomplete="off">
                <a href="fogot.php">Forgot Your Password</a>
                <button type="submit" value="Submit"  name="submit">LOGIN</button>
                <a href="signup.php">Sign Up</a>
            </form>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>   
</body>
</html>