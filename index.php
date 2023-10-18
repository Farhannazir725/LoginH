<?php

$conn = new mysqli("localhost", "root", "", "dropdown");

$country = "SELECT * FROM country";
$sql = mysqli_query($conn,$country);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   
    <title>Document</title>
</head>
<body>
    <h2>Php and Ajax drop down list</h2>
    
        <form method="POST">
            
                <div class="col-sm-4">
                    <select class="form-control" id="country" name="country" >
                       <option>Select Country</option>
                     <?php while($row = mysqli_fetch_assoc($sql)) {?>   
                    <option value="<?php echo $row["country_id"];?>"><?php echo $row["country_name"];?></option>
                    <?php }?>
                    </select>
                </div>
            
<br>
            
                <div class="col-sm-4">
                    <select class="form-control" id="state" name="state" >
                       <option>Select State</option> 
                    </select>
                </div>
            </div>
        

                      
<br>  
                <div class="col-sm-4">
                    <select class="form-control" id="city" name="city" >
                       <option>Select City</option> 
                    </select>
                </div>
            




        </form>

        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>


 <script>
   // Country state

   $('#country').on('change', function(){
    let country_id = this.value;
    console.log(country_id);
    $.ajax({
        url:"raj.php",
        type:"POST",
        data: {
            country_data:country_id
         },
         success: function(result){
            $('#state').html(result);
            console.log(result);
         }
    })
     });

    // alert("Hello");
 </script>
 
 <script>
    // city
      $('#state').on('change', function(){
    let state_id = this.value;
    console.log(state_id);
    $.ajax({
        url:"city.php",
        type:"POST",
        data: {
            city_data:state_id
         },
         success: function(result){
            $('#city').html(result);
            console.log(result);
         }
    })
     });

    // alert("city");
 </script>       
</body>
</html>