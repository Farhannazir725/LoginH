
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

    <div class="login-card">
        <h2>Validation form</h2>
        <h3>Enter Valid Details</h3>
            <form class="login-form" method="POST" action="forgot.php">
                <input type="text" name="first" placeholder="Name" required autocomplete="off">
                <input type="text" name="email" placeholder="email" required autocomplete="off">
                <input type="text" name="other" placeholder="Provide Other Details" required autocomplete="off">
               
                <input type="submit" value="Varify"  name="submit">
                
            </form>
            <a href="login.php">Login</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>   
</body>
</html>