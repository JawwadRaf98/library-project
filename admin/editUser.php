<?php 
    session_start();
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/config.php');
    include('includes/auth.php');
    
    $id = $_GET['id'];
    $err = false;
    $errMsg = '';

    // var_dump($_POST);
    if(isset($_POST['submit']) && !empty($_POST['submit']) ){

            $status =  empty($_POST['status']) ? "" : $_POST['status'] ;

            $query = "UPDATE `users` SET 
            `status`= '$status'
            
            WHERE `id` = '$id'";
            $result = mysqli_query($connection,$query) or die("Query failed");
            
            if($result){
                $err = true;
                $errMsg = "User edit succesfully!";
            }
            else{
                $err = true;
                $errMsg = "User edit failed!";
            }
                
        }
    
    $query =  "SELECT * from users where id = '$id'";
    $sql = mysqli_query($connection,$query) or die("Query failed");
    $data = mysqli_fetch_assoc($sql);
        
    

    // var_dump($data);


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
                   <h3>Edit User Information </h3>
                <?php
                    if($err){
                        echo '<div class="alert alert-primary" role="alert">';
                        echo $errMsg;
                        echo '</div>';
                    }
                ?>
               <?php if(!empty($data)){ ?>
               <form action = "" method="POST" >
                   <small class="note">Admin can only update status of user</small>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" value="<?php echo $data['fname'] ?> "
                        class="form-control" id="name" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="last-name" class="form-label">Last Name</label>
                        <input type="text" name="lname" value="<?php echo $data['lname'] ?>"
                        class="form-control" id="last-name" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" value="<?php echo $data['email'] ?>"
                         class="form-control" id="email"  disabled>
                    </div>
                    
                    <div class="mb-3">
                    <label for="email" class="form-label">Status</label>
                    <div class="options">
                        <input type="radio" <?php echo $data['status'] == '1' ? "checked": "" ?> name ="status" value=1>
                        <span>Active</span>
                        <input type="radio" <?php echo $data['status'] == '0' ? "checked": "" ?> name ="status" value=0>
                        <span>Deactive</span>
                        

                </div>
                       

                    </div>
                    <hr>
                    <div class="submit-btn">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit">Submit</button>
                    </div>
                </form>
            <?php }else{ ?>
                        <div class="not-found">
                            <h1>Data not found</h1>
                        </div>

            <?php }?> 
               
            
            
            
            
        </div>
           </div>
       </div>


        </div>


