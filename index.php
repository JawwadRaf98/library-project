<?php 
  include_once "header.php";

?>
        <!-- Banner-->
        <section class="_banner">
          <div class="_banner_img" ></div>
          <!-- <div class="_banner_inner">
              <div class="_content">
                <h1>E Library</h1>
                <h2>A hub of knowledge for transformation.</h2>
                <h3>Explore The Future of this world!</h3>
              </div>
          </div> -->
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
                      <span id="_closeBtn_<?php echo $i ?>" class="_closeBtn" onclick = "closeModal()">&times;</span>
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

<?php include_once "footer.php"; ?>

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
    console.log("running");
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