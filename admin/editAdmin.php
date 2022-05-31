<?php 
    session_start();
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/config.php');
    include('includes/auth.php');
    
    $id = $_GET['id'];
    $err = false;
    $errMsg = '';

    
    if(isset($_POST['submit']) && !empty($_POST['submit']) ){

       
            $name =  empty($_POST['name']) ? "" : $_POST['name'] ;
            $lname = empty($_POST['last-name'])? "" : $_POST['last-name'];
            $email = empty($_POST['email']) ? "" : $_POST['email'] ;
            // $pass =  $_POST['password'];
            // $pass1 = $_POST['password1'];
            $contact = empty($_POST['contact']) ? "" : $_POST['contact'];
            $status = 1;
         
            
            $query = "UPDATE `admin` SET 
            `adminName`= '$name',
            `adminLastName`='$lname',
            `adminEmail`='$email',
            `adminContact`='$contact'
            WHERE `id` = '$id'";
            $result = mysqli_query($connection,$query) or die("Query failed");
            
            if($result){
                $err = true;
                $errMsg = "Admin edit succesfully!";
            }
            else{
                $err = true;
                $errMsg = "Admin edit failed!";
            }
                
        }
    
    $query =  "SELECT * from admin where id = '$id'";
    $sql = mysqli_query($connection,$query) or die("Query failed");
    $data = mysqli_fetch_assoc($sql);
        
    

    // var_dump($data);

    if(!empty($data)){
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
                   <h3>Edit Admin Information </h3>
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
                        <input type="text" name="name" value="<?php echo $data['adminName'] ?>"
                        class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="last-name" class="form-label">Last Name</label>
                        <input type="text" name="last-name" value="<?php echo $data['adminLastName'] ?>"
                        class="form-control" id="last-name" >
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" value="<?php echo $data['adminEmail'] ?>"
                         class="form-control" id="email"  required>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password"  required>
                    </div>
                    <div class="mb-3">
                        <label for="password1" class="form-label">Confirm Password</label>
                        <input type="password" name="password1" class="form-control" id="password1" required>
                    </div> -->
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" name="contact" value="<?php echo $data['adminContact'] ?>"
                         class="form-control" id="contact" placeholder="(E.g) +92-311-4567122">

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


<?php } ?>