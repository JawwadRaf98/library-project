<?php

include('includes/config.php');
$id = $_GET['id'];

$query = "delete from books where bookID = '{$id}'";
$result = mysqli_query($connection,$query) or die("Query failed");

header('location: books.php');
?>