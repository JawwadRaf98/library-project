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
    <title>Registration</title>
</head>
<body>
    <div class="">
        <div class="login">
            <div class="_flex">
                <div class="section-1">
                    
                     <div class="loginInner registrationInner">
                     <?php if(!empty($err)) { ?>
                        <div class="alert alert-info" role="alert">
                        <?php echo $err; ?>
                        </div>
                    
                    <?php }?>
                         <h3 class="heading">Registration</h3>
                         <form method="POST" class="login_form">
                           
                            <div class="form-group">
                                <label for="email">First Name:</label>
                                <input class="form-control" type="text" name="fname" id="fname"   required/>
                            </div>

                            <div class="form-group">
                                <label for="email">Last Name:</label>
                                <input class="form-control" type="text" name="lname" id="lname"   required/>
                             </div>
                            
                             <div class="form-group">
                                <label for="email">Email:</label>
                                <input class="form-control" type="text" name="email" id="email"   required/>
                             </div>
                            
                             <div class="form-group">
                                <label for="pass">Password:</label>
                                <input class="form-control" type="password" name="pass" id="pass"  required/>
                             </div>
                            
                             <div class="form-group">
                                <label for="pass">Confirm Password:</label>
                                <input class="form-control" type="password" name="cpass" id="cpass"  required/>
                             </div>

                             <small class="err" id="pass-err"></small>
                

                             <input type="submit" name="submit" id="submitBtn" disabled>
                         </form>

                        
                     </div>
                </div>
                <div class="section-2">
                <div class="loginInner">
                         <h3 class="heading">Hello, Friends</h3>
                         <p>If you have already an account please sign in and continue your journey!</p>
                        <a href="login.php">Sign In</a>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const validatePass = () =>{


        }
    </script>
</body>
</html>