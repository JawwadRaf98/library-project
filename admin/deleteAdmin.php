<?php 
   include('includes/config.php');
   $id = $_GET['id'];

      
   
   $query = "DELETE from admin where id = '{$id}'";
   $result = mysqli_query($connection,$query) or die("Query failed");
   
   header('location: admin.php');
?>