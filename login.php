
<?php
$con = mysqli_connect("localhost", "root", "", "POS");

//CHECK  CONNECTION
if (!$con) {
    die("". mysqli_connect_error());
}


$showAlert = false;  
$showError = false;  
$exists=false; 
    
if($_SERVER["REQUEST_METHOD"] == "POST") { 
      
        
    
    $username = $_POST["username"];  
    $password = $_POST["password"];  
    $cpassword = $_POST["cpassword"]; 
            
    
    $sql = "Select * from login where username='$username'"; 
    
    $result = mysqli_query($conn, $sql); 
    
    $num = mysqli_num_rows($result);  
    
    // This sql query is use to check if 
    // the username is already present  
    // or not in our Database 
    if($num == 0) { 
        if(($password == $cpassword) && $exists==false) { 
    
            $hash = password_hash($password,  
                                PASSWORD_DEFAULT); 
                
            // Password Hashing is used here.  
            $sql = "INSERT INTO `users` ( `username`,  
                `password`, `date`) VALUES ('$username',  
                '$hash', current_timestamp())"; 
    
            $result = mysqli_query($conn, $sql); 
    
            if ($result) { 
                $showAlert = true;  
            } 
        }  
        else {  
            $showError = "Passwords do not match";  
        }       
    }// end if  
    
   if($num>0)  
   { 
      $exists="Username not available";  
   }  
    
}//end if    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <h1>LOGIN</h1>
    <form method="POST" action="">
        <label for="username">Your username</label>
<input type="text" id="username" name="username" placeholder="please enter your username">

<label for="password">Your password</label>
<input type="password" name="password" id="password" placeholder="please enter password">
    </form>
</body>
</html>