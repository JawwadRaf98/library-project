<?php
    include 'includes/config.php';  

    $showAlert = false;
    
    if(isset($_POST['loginSubmit']) && !empty($_POST)){

        
        $login = false;
        $showAlert = false;
        
        $email = $_POST['email'];
        echo $password = md5($_POST['password']);

        $query = "SELECT * from admin WHERE adminEmail = '$email' AND adminPassword = '$password' AND status = 1";
        // $query = "select * from admin ";

        $result = mysqli_query($connection, $query) or die("Query failed");
        $userData =  mysqli_fetch_array($result);

        $num =  mysqli_num_rows($result);
        // var_dump($userData);
        // exit();
        if($num != NULL){
            $login =  true;
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['adminEmail'] = $email;
            $_SESSION['userData'] = $userData;
       
            
            
            header("location: index.php");
            $showAlert = false;

        }
        else{
            $showAlert = true;
            $errMessage = "Invalid email or password";

        }
       
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin-Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <?php

                                    if($showAlert){
                                        echo'<div class="alert alert-danger" role="alert">'.$errMessage .'</div>';
                                    }
                                    ?>
                                    <form class="user" action='login.php' method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <input type="Submit" name="loginSubmit" value="Submit" class="btn btn-primary btn-user btn-block"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                       
                                        

                                    </form>
                                  
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>