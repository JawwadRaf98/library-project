<?php 
    session_start();
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/config.php');
    include('includes/auth.php');
    $data = $_SESSION['userData'];

    $currPassErr = "";
    $newPassError = "";
    $updateStatus = false;
    $updateMessage = "";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'includes/config.php';
        
        $current_password = $_POST['current-pass'];
        $new_password = $_POST['new-pass'];
        $confirm_password = $_POST['confirm-pass'];
      
        if($current_password != $data['adminPassword']){
            $currPassErr = "Invalid password";
        }
        else{

            $currPassErr = "";
            if($new_password != $confirm_password){
                $newPassError = "Password doesn't matched";
            }
            else{
                $adminEmail  = $data['adminEmail'];
                print_r($connection) ;
                $newPassError = "";

                $query = "UPDATE admin SET adminPassword = '{$new_password}' WHERE adminEmail = '{$adminEmail}'";
                $result = mysqli_query($connection, $query) or die("Query unseccessful");
                print_r($result);
                if($result){
                    $updateStatus = true;
                    $updateMessage = "Recode update successfully";
                }
            }
        }
        
        

    }

    function getName($data){
       return $data['adminName']." ".$data['adminLastName'];
    }
    function getEmail($data){
        return $data['adminEmail'];
    }
     function getContact($data){
        return $data['adminContact'];
    }


?>
 <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
        <div id="content">
            <?php include('includes/navbar.php') ?>

        <!-- container fluid start -->
        <div class="container-fluid">


        <?php if($_GET['tab'] == 'setting'): ?>
            <div class="container setting">
                <div class="row">
                    <div class="column col-xl-6 col-md-12 col-sm-12 col-xs-12">
                        <?php 
                            if($updateStatus){
                                echo '<div class="alert alert-primary" role="alert">';
                                echo $updateMessage;
                                echo "</div>";
                            }

                        ?>

                    <form class="setting-form" action="profile.php?tab=setting" method="POST">
                        <div class="mb-3">
                            <label for="CurrentPassword" class="form-label">Current Password</label>
                            <input type="password" name="current-pass" class="form-control" id="CurrentPassword" required>
   
                            <small class="err-msg"><?php echo $currPassErr; ?></small>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" name="new-pass"class="form-control" id="newPassword" required>

                        </div>
                        <div class="mb-3 ">
                            <label for="confrimPassword" class="form-label">Comfirm Password</label>
                            <input type="password" name="confirm-pass" class="form-control" id="confrimPassword" required>
                        </div>
                        <small class="err-msg"><?php echo $newPassError ?></small>
                        <hr>
                        <div id="submit">
                        <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        
        
        
        
        <?php elseif($_GET['tab'] == 'profile'): ?>
            <div style="margin-bottom: 40px;" class="profile container col-lg-8 col-md-8 col-sm-12 col-xs-12"  >
                <div class="profile_card card" style="width:70%;margin:0 auto; ">
                <img profile-i style="margin:20px auto;width:50% ;box-shadow:0px 0px 10px black;" class="card-img-top img-profile rounded-circle" src="img/undraw_profile.svg">
                <div class="card-body">
                    <h4 style="text-align: center; "><?php echo getName($data)?> </h4>
                    <hr class="divider">
                    <table >
                        <tr>
                            <th style="padding-right:30px">Email:</th>
                            <td style="font-size: larger;"><?php echo getEmail($data) ?></td>
                        </tr>
                        
                        <tr>
                            <th style="padding-right:30px">Contact:</th>
                            <td><?php echo getContact($data) ?></td>
                        </tr>
                    </table>
                </div>
                </div>
            </div>

        <?php endif ?>


        </div>
        <!-- container fluid end -->

<?php 
    include('includes/scripts.php');
    include('includes/footer.php');
?>