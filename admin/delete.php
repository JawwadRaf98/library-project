<?php
     include('includes/config.php');
    $id = $_GET['del-id'];

    $query = "delete from category where category_id = '{$id}'";
    $result = mysqli_query($connection,$query) or die("Query failed");

    header('location: category.php');
    
?>