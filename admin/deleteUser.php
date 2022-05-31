<?php 
   include('includes/config.php');
   $id = $_GET['id'];

    // var_dump($id);
//    
   $query = "DELETE from users where id = '{$id}'";
   $result = mysqli_query($connection,$query) or die("Query failed");
   var_dump($result);
   header('location: user.php');
?>