<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $name = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST['Password'];
    $cpassword = $_POST['C-Password'];

    $user_checking_query = "SELECT * from users WHERE email = '$email' LIMIT 1";
        
    $result = mysqli_query($db, $user_checking_query);
    $user = mysqli_fetch_assoc($result);
    if($password == $cpassword){

        $query = "";
    }


    

    echo($name. " ". $email . " ".$password ." ".$cpassword);


   
}
  
?>