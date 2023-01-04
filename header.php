<?php include_once "global.php";
 session_start();
$url = $functions->webUrl();
 $title = $functions->getTitle();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once "headerLinks.php"; ?>
    <title><?php echo isset($title) && !empty($title) ? $title : "Library Management System"; ?></title>
    <!-- Script -->


    
</head>
<body>
    <main>
        <!-- Header --> 
        <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="<?php echo $url; ?>">E-Library</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse  navbar-collapse" id="navbarText">
                <ul class="nav navbar-nav navbar-righ mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo $url; ?>">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url.'/about-us.php'?>">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url.'/books.php'?>">category</a>
                    <ul class="innerUl">
                        <li><a href="">computer</a></li>
                        <li><a href="">english</a></li>
                        <li><a href="">physic</a></li>
                        <li><a href="">maths</a></li>
                        <li><a href="">Urdu</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url.'/contact.php'?>">contact</a>
                  </li>
                </ul>
                
              </div>
            </div>
            <button type="button" class="btn btn-dark"><a href="<?php echo $url.'/login.php'?>">Login</a></button>

          </nav>
        </header>