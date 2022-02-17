<?php 
    session_start();
    include('includes/auth.php');
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/config.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $lname = $_POST['last-name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $pass1 = $_POST['password1'];
        $contact = $_POST['contact'];


        echo $name. ' '.$lname.' '.$email.' '.$pass.' '.$pass1;
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
               <form action = "" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="last-name" class="form-label">Last Name</label>
                        <input type="text" name="last-name" class="form-control" id="last-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password1" class="form-label">Confirm Password</label>
                        <input type="password" name="password1" class="form-control" id="password1">
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" name="contact" class="form-control" id="contact" placeholder="(E.g) +92-311-4567122">

                    </div>
                    <hr>
                    <div class="submit-btn">
                        <button type="submit" class="btn btn-primary"  id="submit">Submit</button>
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