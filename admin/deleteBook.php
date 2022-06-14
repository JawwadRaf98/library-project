<?php

include('includes/config.php');
$id = $_GET['id'];
$query = "SELECT bookFile, bookImage from books where bookID = '{$id}'";
$result = mysqli_query($connection,$query) or die("Query failed");
$data = mysqli_fetch_assoc($result);
$dir = './uploads';
$delBook =  unlink($dir.'/books/'.$data['bookFile']);
$delImage =  unlink($dir.'/images/'.$data['bookImage']);

// var_dump($delBook, $delImage);

if($delBook && $delImage){
    $query = "delete from books where bookID = '{$id}'";
    $result = mysqli_query($connection,$query) or die("Query failed");
}

header('location: books.php');
?>