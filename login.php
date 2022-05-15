<?php 
    // var_dump($_POST);
    if(isset($_POST['submit']) && !empty($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $err = "";

        $user = false;
        if($user){
            
        }else{
            $err = "Invalid email or password";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once "headerLinks.php" ;?>
    <title>Login</title>
</head>
<body>
    <div class="">
        <div class="login">
            <div class="_flex">
                <div class="section-1">
                    
                     <div class="loginInner">
                     <?php if(!empty($err)) { ?>
                        <div class="alert alert-info" role="alert">
                        <?php echo $err; ?>
                        </div>
                    
                    <?php }?>
                         <h3 class="heading">Login</h3>
                         <form method="POST" class="login_form">
                             <div class="form-group">
                             <label for="email">Email:</label>
                                 <input class="form-control" type="text" name="email" id="email"   required/>
                             </div>
                            
                             <div class="form-group">
                             <label for="pass">Password:</label>
                             <input class="form-control" type="password" name="pass" id="pass"  required/>
                             </div>
                             <input type="submit" name="submit">
                         </form>

                         <div class="regLink">
                             <p>Do not have account? <a href="register.php">Register Here</a>

                         </div>
                     </div>
                </div>
                <div class="section-2">
                <div class="loginInner">
                         <h3 class="heading">Hello, Friends</h3>
                         <p>Enter your detail and start journey with us</p>
                        <a href="register.php">Sign Up</a>
                     </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>