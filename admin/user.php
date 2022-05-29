<?php 
    session_start();
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/config.php');
    include('includes/auth.php')
?>
<!-- <link rel="stylesheet" href="css/style.css" type="text/css"> -->
 <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
        <div id="content">
            <?php include('includes/navbar.php') ?>

        <!-- container fluid start -->
        <div class="container-fluid">
        <h1>Users</h1>
        <div>
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#add-user">
            Add User
        </button>
        </div>
        <hr class="blue-divider">


        <?php 
            
            $query = "SELECT * FROM users";
            $run_query = mysqli_query($connection, $query);
            $data = mysqli_fetch_all($run_query);

        ?>

        <!-- user table -->
        <table class="table table-hover" id="users" width= '100%'>
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>

            <?php 
                if(mysqli_num_rows($run_query) > 0){
                    foreach($data as $row){

                        $status = 1;
                        echo "<tr>";
                        echo "<td>$row[0]</td>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                        echo "<td>$row[3]</td>";
                        echo "<td>". $status . "</td>";
                        echo "<td>
                        <a href = 'deleteAdmin.php?id='$row[0]'>Edit</a>
                        <a href = 'deleteAdmin.php?id='$row[0]'>Delete</a>";
                        echo "</tr>";
                    }
                }
            ?>
                
            </tbody>
        </table>

        </div>
        <!-- container fluid end -->


<!-- Modal -->
<div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            
      <form action="addUserAuth.php" method="POST">
        <div class="form-group">
            <label for="username">User Name</label>
            <input type="username" class="form-control" name = "username" id="username" aria-describedby="emailHelp" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name = "email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name='Password'  placeholder="Enter Password">
        </div>
        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="C-Password" placeholder="Enter Confirm Password">
        </div>
    
        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name='addUser'>Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" class="btn btn-primary">Save </button> -->
      </div>
      </form>

    </div>
  </div>
</div>

</div>

<?php 
    include('includes/scripts.php');
    include('includes/footer.php');
?>