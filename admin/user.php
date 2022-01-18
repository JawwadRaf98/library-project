<?php 
    include('includes/header.php');
    include('includes/sidebar.php');

?>
<link rel="stylesheet" href="css/style.css" type="text/css">
 <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
        <div id="content">
            <?php include('includes/navbar.php') ?>

        <!-- container fluid start -->
        <div class="container-fluid">
        <h1>Users</h1>
        <hr class="blue-divider">


        <?php 
            $host = 'localhost';
            $user = 'root';
            $password = '';
            $database = 'library';

            $connection = mysqli_connect($host,$user,$password,$database);

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
                        echo "<tr>";
                        echo "<td>$row[0]</td>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                        echo "<td>$row[3]</td>";
                        echo "</tr>";
                    }
                }
            ?>
                
            </tbody>
        </table>

        </div>
        <!-- container fluid end -->

<?php 
    include('includes/scripts.php');
    include('includes/footer.php');
?>