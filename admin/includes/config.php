<?php

    // Database Authentication
    $host = 'localhost'; 
    $user = 'root'; 
    $password = '';
    $database = 'library';

    $connection = mysqli_connect($host,$user,$password,$database) or die("Connection Failed");

    // project name
    $project_name = "library-project" //same as in the url
?>