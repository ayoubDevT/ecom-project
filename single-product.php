<?php
    require_once ('connection.php');
    session_start();
    if(!isset($_GET['id'])||empty($_GET['id']))
        header('location:index.php');
    $query="select * from product where id=".$_GET['id'];
    $result=$conn->query($query);
    $title='';
    $desc='';
    $price=0;
    $img='';
    $qty='';
    $cat='';
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
        $title=$row['title'];
        $desc=$row['description'];
        $price=$row['price'];
        $img=$row['imageLocation'];
        $qty=$row['quantityInStore'];
        $cat=$row['category'];
    }
    else
        header('location:index.php');
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title><?php echo $title=$row['title']; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/flex-slider.css">
<!--
Tooplate 2114 Pixie
https://www.tooplate.com/view/2114-pixie
-->
  </head>

  <body>
    
  <?php
        if(!empty(isset($_SESSION['username']))){
            $username=$_SESSION['username'];
            echo '<div id="pre-header"><div class="container"><div class="row"><div class="col-md-12">';
            echo '<span>Welcome '.$username=$_SESSION['username'].'</span></div></div></div></div>';
        }
    ?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="assets/images/header-logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="index.php">Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">Cart</a>
            </li>
            <?php
                if(!empty(isset($_SESSION['id']))){
                    echo '<li class="nav-item"><a class="nav-link" href="carthistory.php">History</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="logout.php">Log out</a></li>';
                }
                else{
                    echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>';
                }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <!-- Single Starts Here -->
    <div class="single-product">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Single Product</h1>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-slider">
              <div id="slider" class="flexslider">
                <ul class="slides">
                  <li>
                    <?php echo '<img src="./image/'.$row['imageLocation'].'">';?>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
              <h4><?php echo $title?></h4>
              <h6>$<?php echo $price?></h6>
              <p><?php echo $desc?></p>
              <span><?php echo $qty?> left on stock</span>
              <form action="addToCart.php" method="post" id="frm">
                <label for="quantity">Quantity:</label>
                <input name="qte" type="number" required default="1" <?php echo 'max="'.$qty.'"'?> min="1"  class="quantity-text" id="quantity"
                	onfocus="if(this.value == '1') { this.value = ''; }" 
                  onblur="if(this.value > <?php echo $qty?>) { this.value = <?php echo $qty?>;}"
                  value="1">
                <?php
                if(!empty(isset($_SESSION['id']))){
                  if($qty<=0){
                    echo '<input disabled type="submit"  id="notSold" name="s" class="button" value="Order Now!">';
                    echo '<input disabled type="submit" id="sold" name="n" class="button" value="Add to cart">';
                  }
                  else{
                    echo '<input type="submit"  id="notSold" name="s" class="button" value="Order Now!">';
                    echo '<input type="submit" id="sold" name="n" class="button" value="Add to cart">';
                  }
                  echo '<input type="hidden" name="idp" value="'.$_GET['id'].'"/>';
                    //echo '<input type="hidden" name="isSold" id="isSold" value="0"/>';
                }
                else{
                    echo '<a class="button" href="login.php">Login to buy</a>';
                }
                ?>
                
              </form>
              <div class="down-content">
                <div class="categories">
                  <h6>Category:<span><a href="#"><?php echo $cat?></a></span></h6>
                </div>
                <div class="share">
                  <h6>Share: <span><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></span></h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Single Page Ends Here -->


    <!-- Similar Starts Here -->
    <div class="featured-items">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>You May Also Like</h1>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-carousel owl-theme">
            <?php
                $query="select * from product";
                $result=$conn->query($query);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        echo '<a href="single-product.php?id='.$row['id'].'" ><div class="featured-item">';
                        echo '<img src="./image/'.$row['imageLocation'].'" alt="Item 1">';
                        echo '<h4>'.$row['title'].'</h4>';
                        echo '<h6>$'.$row['price'].'</h6></div></a>';
                    }
                }
            ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Similar Ends Here -->


    


    
    <!-- Footer Starts Here -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="logo">
              <img src="assets/images/header-logo.png" alt="">
            </div>
          </div>
          <div class="col-md-12">
            <div class="footer-menu">
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">How It Works ?</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="social-icons">
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Ends Here -->


    <!-- Sub Footer Starts Here -->
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright-text">
                <p>Copyright &copy; 2022 ENNACHAT MENIOUI YAFOUZE </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Sub Footer Ends Here -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/flex-slider.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

    <script>
      var frm=document.getElementById('frm')
      var type=document.getElementById('isSold')
      document.getElementById('notSold').onclick=function(){
        type=0
        frm.submit()
      }
      document.getElementById('sold').onclick=function(){
        type=1
        frm.submit()
      }
    </script>


  </body>

</html>
