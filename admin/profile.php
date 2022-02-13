<?php 
    session_start();
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/config.php');
    include('includes/auth.php');
    $data = $_SESSION['userData'];
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
<link rel="stylesheet" href="css/style.css" type="text/css">
 <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
        <div id="content">
            <?php include('includes/navbar.php') ?>

        <!-- container fluid start -->
        <div class="container-fluid">


        <?php if($_GET['tab'] == 'setting'): ?>
            <h1>Jawwad</h1>
        
        <?php elseif($_GET['tab'] == 'profile'): ?>
            <div style="margin-bottom: 40px;" class="profile container col-lg-8 cil-md-6 col-sm-6 col-xs-6"  >
                <div class="profile_card card" style="width:70%;margin:0 auto; ">
                <img profile-i style="margin:20px auto;width:50% ;box-shadow:0px 0px 10px black;" class="card-img-top img-profile rounded-circle" src="img/undraw_profile.svg">
                <div class="card-body">
                    <h4 style="text-align: center; "><?php echo getName($data)?> </h4>
                    <hr class="divider">
                    <table style="font-size: 20px;">
                        <tr>
                            <th style="width:40%">Email:</th>
                            <td><?php echo getEmail($data) ?></td>
                        </tr>
                        
                        <tr>
                            <th>Contact:</th>
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