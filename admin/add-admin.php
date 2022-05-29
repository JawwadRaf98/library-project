<?php 
    session_start();
    include('includes/auth.php');
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/config.php');
    $success = false;
    $successMsg = "";
    $err= false;
    $errMsg = '';
    $data = 0;
    if(isset($_POST['submit']) && !empty($_POST['submit']) ){

        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) ){
            $err = true;
            $errMsg = "Name, Email and Password Required!";
        }
        else{
            $name =  $_POST['name'];
            $lname = empty($_POST['last-name'])? "" : $_POST['last-name'];
            $email =  $_POST['email'];
            $pass =  $_POST['password'];
            $pass1 = $_POST['password1'];
            $contact = empty($_POST['contact']) ? "" : $_POST['contact'];
            $status = 1;
            if($pass == $pass1){
            $query = "select * from admin where adminEmail = '{$email}' LIMIT 1";
            $result = mysqli_query($connection, $query) or die("Query failed");
            $data = mysqli_num_rows($result);
            }
            else{
                $err = true;
                $errMsg = "Password doesn't matched";
            }

            if($data<1){
                if($pass != $pass1){
                    $err = true;
                    $errMsg = "Password doesn't match!";
                }
                else{
                    $passMd5 = md5($pass);
                    $query = "insert into admin (adminName, adminLastName, adminEmail, adminPassword, adminContact,status) values ('{$name}','{$lname}','{$email}','{$passMd5}','{$contact}' ,'{$status}')";
                    $result = mysqli_query($connection,$query) or die("Query failed");
                    
                    if($result){
                        $err = true;
                        $errMsg = "Admin added succesfully!";
                    }
                    else{
                        $err = true;
                        $errMsg = "Admin add failed!";
                    }
                }
            }
            else{
                $err = true;
                $errMsg = "This email id already exist";
            }
        }
    }

?>

 <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
        <div id="content">
            <?php include('includes/navbar.php') ?>

        <!-- container fluid start -->
        <div class="container-fluid">


       <div class="container add-admin">
           <div class="row">
               <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 add-admin-col">
                <?php
                    if($err){
                        echo '<div class="alert alert-primary" role="alert">';
                        echo $errMsg;
                        echo '</div>';
                    }
                ?>

               <form action = "" method="POST" >
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="last-name" class="form-label">Last Name</label>
                        <input type="text" name="last-name" class="form-control" id="last-name" >
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email"  required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password"  required>
                    </div>
                    <div class="mb-3">
                        <label for="password1" class="form-label">Confirm Password</label>
                        <input type="password" name="password1" class="form-control" id="password1" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" name="contact" class="form-control" id="contact" placeholder="(E.g) +92-311-4567122">

                    </div>
                    <hr>
                    <div class="submit-btn">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit">Submit</button>
                    </div>
                </form>
               </div>
           </div>
       </div>


        </div>
        <!-- container fluid end -->

<?php 
    include('includes/scripts.php');
    include('includes/footer.php');
?>