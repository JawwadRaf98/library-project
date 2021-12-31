<?php 

    session_start();

    // initializing variable
    $username = '';
    $email = '';

    $_SESSION['username'] = $username;

    // error array = 

    $errors = array();

    // configration DB

    $host = 'localhost';
    $root = 'root';
    $pass = '';
    $dbName = 'library';

    $db = mysqli_connect($host,$root,$pass,$dbName) or die('Could not connect to database');

    // Adding User

    if(isset($_POST['add_user'])){
        // getting data from form
        $fname = mysqli_real_escape_string($db , $_POST['fName']);
        $lname = mysqli_real_escape_string($db , $_POST['lName']);
        $email = mysqli_real_escape_string($db , $_POST['email']);
        $password1 = mysqli_real_escape_string($db , $_POST['password']);
        $password2 = mysqli_real_escape_string($db , $_POST['confirm_pwd']);
        
        // VALIDATION
        if(empty($fname)) array_push($errors, "Fist Name is required");
        if(empty($lname)) array_push($errors, "Last Name is required");
        if(empty($email)) array_push($errors, "Email is required");
        if(empty($password1)) array_push($errors, "Password is required");
        if($password1 != $password2) array_push($errors, "Passwords do not match");

        // Checking that user already exists;

        $user_checking_query = "SELECT * from users WHERE email = '$email' LIMIT 1";
        
        $result = mysqli_query($db, $user_checking_query);
        $user = mysqli_fetch_assoc($result);
        
        


        if($user){
            if($user['email'] === $email) {
                array_push($errors , "User already exits");
                echo "already exits";
            }
        };

        print_r($errors);

        // // register user if no errors
        if(count($errors)==0){
            $password = md5($password1); //encryption
            $query = "INSERT INTO users (fname,lname,email,password) VALUES('$fname','$lname','$email','$password')";
            mysqli_query($db, $query);

            $_SESSION['username'] = $fname . ' ' .$lname;
            $_SESSION['success'] = "You are successfully register";

            header('location: index.php');

            }
        }

        //  LOGIN AUTH
        if(isset($_POST['login-user'])){
            $email = mysqli_real_escape_string($db, $_POST['email']);
            $pass = mysqli_real_escape_string($db, $_POST['password']);
    
            echo($email . " ". $pass);

            // validation
            if(empty($email)){
                array_push($errors , "Email is required");
            }
            if(empty($pass)){
                array_push($errors , "Password is required");
            }

            // echo(count($errors));

            if(count($errors) == 0 ){
                $password = md5($pass);
                $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
                $result = mysqli_query($db, $query);
                $user = mysqli_fetch_assoc($result);

                // print_r(($result));
                if(mysqli_num_rows($result)){
                    $_SESSION['username'] = $user['fname']." ".$user['lname'];
                    $_SESSION['success'] = "Loggr in successfully";
                    header('location: index.php');
                }else{
                    array_push($errors,"Invalid email or password");
                }
            }
        }
?>
