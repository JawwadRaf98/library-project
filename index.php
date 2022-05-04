<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boot Strap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
    <!-- Script -->


    
</head>
<body>
    <main>
        <!-- Header --> 
        <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">E-Library</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse  navbar-collapse" id="navbarText">
                <ul class="nav navbar-nav navbar-righ mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">category</a>
                    <ul class="innerUl">
                        <li><a href="">computer</a></li>
                        <li><a href="">english</a></li>
                        <li><a href="">physic</a></li>
                        <li><a href="">maths</a></li>
                        <li><a href="">Urdu</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="">contact</a>
                  </li>
                </ul>
                
              </div>
            </div>
            <button type="button" class="btn btn-dark">Login</button>

          </nav>
        </header>

        <!-- Banner-->
        <section class="_banner">
          <div class="_banner_inner">
              <div class="_content">
                <h1>E Library</h1>
                <h2>A hub of knowledge for transformation.</h2>
                <h3>Explore The Future of this world!</h3>
              </div>
          </div>
        </section>
        
        <div class="container">
          <!-- Newly Added Books -->

          <section class="new__books books">  
            <h1 class="heading"> Feature Books</h1>
            <div class="books__section">
              <div class="row">
                <?php 
                  $modalContant = ["Jawwad","Rafique","Ahmed","Ai"];
                
                for($i =1; $i<=4 ; $i++){?>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                  <div class="book">
                    <img src = "images/book.png" />
                    <div class="content">
                        <h4>Jawwad</h4>
                        <p class="detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni aliquid laborum cumque </p> 
                        <p class="date">20-apr-2022</p>
                        <button class="view__book" onclick="view_book_detail(<?php echo $i ?>)">View</button>
                    </div>
                  </div>
                </div>

                <div id="_book_modal_<?php echo $i ?>" class="_modal">
                  <div class="_modal_content">
                    <div class="_modal_header">
                      <h3>Jawwad</h3>
                      <span id="_closeBtn_<?php echo $i ?>" class="_closeBtn">&times;</span>
                    </div>
              
                    <div class="_modal_body">
                      <div class="image">
                        <img src="images/book.png" alt="">
                      </div>
                      <div class="_table">
                        <table>
                          <tr>
                            <th>Book Name:</th>
                            <td>Harry Porter</td>
                          </tr>
                          <tr>
                            <th>Category:</th>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet voluptatum nostrum excepturi, quibusdam optio, reprehenderit dolor ad placeat veritatis labore modi non veniam, nisi tenetur sapiente. Iste odit eveniet voluptate?</td>
                          </tr>
                          <tr>
                            <th>Date of Publish:</th>
                            <td>11-Sep-2015</td>
                          </tr>
                        </table>
                      </div>
                    </div>

                    <div class="_modal_footer">
                      <?php if(isset($_SESSION['userIsLogin'])) {?>
                        <a href="" class="btn">Read</a>
                      <?php }else{?>
                        <p>Please Login to read this book
                        <a href="" class="btn btn-primary">login</a>
                        </p>
                      <?php } ?>
                    </div>
                  </div>
                </div>

                <?php } ?>
               
              </div>
            </div>
          </section>


          <!-- categories -->
          <section class="categories books">  
            <h1 class="heading">Categories</h1>
            <div class="books__section">
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                  <div class="book">
                    <img src = "images/category/computer.png" />
                    <div class="content">
                        <h4>Computer</h4>
                        <p class="detail">Books: <span class="no_of_books">10</span></p> 
                        <button class="view__book" onclick="categories()">Explore</button>
                    </div>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                  <div class="book">
                    <img src = "images/category/maths.jpg" />
                    <div class="content">
                        <h4>Maths</h4>
                        <p class="detail">Books: <span class="no_of_books">10</span></p> 
                        <button class="view__book" onclick="categories()">Explore</button>
                    </div>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                  <div class="book">
                    <img src = "images/category/ds.png" />
                    <div class="content">
                        <h4>Data Science</h4> 
                        <p class="detail">Books: <span class="no_of_books">10</span></p>
                        <button class="view__book" onclick="categories()">Explore</button>
                    </div>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                  <div class="book">
                    <img src = "images/category/eng.png" />
                    <div class="content">
                        <h4>English</h4>
                        <p class="detail">Books: <span class="no_of_books">10</span></p> 
                        <button class="view__book" onclick="categories()">Explore</button>
                    </div>
                  </div>
                </div>
  
              </div>
            </div>
          </section>
      </div>

    </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script>

  var modal = '';
  var closeBtn = '';

  view_book_detail = (id) =>{
    // get modal Element
    var modalTarget = '_book_modal_'+id;
    var btn = '_closeBtn_'+id
    modal = document.getElementById(modalTarget);

    // close btn
    closeBtn = document.getElementById(btn);
    modal.style.display = 'block';
    closeBtn.addEventListener('click', closeModal)

  }

  window.addEventListener('click', clickOutSide);

  function closeModal(){
    modal.style.display = 'none';
  }
   
  function clickOutSide(e){
    if(e.target == modal){
      modal.style.display = 'none';
    }
  }


</script>
</body>


</html>