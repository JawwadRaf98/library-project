<?php 
    session_start();
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/config.php');
    include('includes/auth.php');
?>

 <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
        <div id="content">
            <?php include('includes/navbar.php') ?>

        <!-- container fluid start -->
        <div class="container-fluid">

        <h1>Admins</h1>
        <div>
        <a type="button" href="add-admin.php" class="btn btn-outline-primary" >
         Add Admin
        </a>
        </div>
        <hr class="blue-divider">


        <?php 
            
            $query = "SELECT * FROM admin";
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
                <th scope="col">Status</th>
                <?php if($_SESSION['userData']['super'] == 1){ ?>
                <th scope="col">Action</th>
                <?php } ?>
                </tr>
            </thead>
            <tbody>

            <?php 
                if( mysqli_num_rows($run_query) > 0){
                    $i = 1;
                    foreach($data as $row){
                        $status = $row[6] == "1" ? "Active" : "Deactive";
                        $id = $row[0];
                        echo "<tr>";
                        echo "<td>$i</td>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                        echo "<td style='text-transform: none'>$row[3]</td>";
                        echo "<td>". $status . "</td>";
                        echo "<td>
                        <a href = 'editAdmin.php?id=".$row[0]."'>Edit</a>
                        <a onClick=\"javascript: return confirm('Please confirm deletion');\" href = 'deleteAdmin.php?id=".$row[0]."'>Delete</a></td>";
                       
                       $i++;
                    }
                }
            ?>
                
            </tbody>
        </table>

        </div>


        <!-- page content here -->


        </div>
        <!-- container fluid end -->
<script>

     deleteAdmin = (ths)=>{
         btn=$(ths);
         id=btn.attr('data-id');

         $.ajax({
                type: 'POST',
                url: 'deleteAdmin.php',
                data: { id:id }
            }).done(function(data)
                {
                    ift =true;
                    if(data== 1){
                        ift = false;
                        btn.closest('tr').hide(1000,function(){$(this).remove()});
                    }
                    else if(data== 0){
                        alert('<?php echo ($_e['Delete Fail Please Try Again.']); ?>');
                    }
                    else{
                        btn.append(data);
                    }
                    if(ift){
                        btn.removeClass('disabled');
                    }

                });
     }
</script>
<?php 
    include('includes/scripts.php');
    include('includes/footer.php');
?>