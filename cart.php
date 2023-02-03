<!DOCTYPE html>
<html lang="en">
<?php
require_once('connection.php');
session_start();


if (empty($_SESSION["id"])) {
  header('Location: ./login.php');
}
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

  <title>EMY HOME</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/tooplate-main.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="cart_css.css">


  <title>Basket</title>
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img style="max-width: 15%;margin-top: 0px;margin-bottom: 10px;" src="assets/images/header-logo.png" alt=""></a>
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
          if (!empty(isset($_SESSION['id']))) {
            echo '<li class="nav-item"><a class="nav-link" href="carthistory.php">History</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="logout.php">Log out</a></li>';
          } else {
            echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <div class="featured-page">
    <div class="container">
      <form action="./crud_cart.php" id="update" method="post">
        <main>
          <div class="basket">
            <div class="basket-labels">
              <ul>
                <li class="item item-heading">Produit</li>
                <li class="price">Prix</li>
                <li class="quantity">Quantite</li>
                <li class="subtotal">Total</li>
              </ul>
            </div>

            <?php
            $query = "SELECT c.idp, p.title, p.description, p.price, p.imageLocation, c.quantity, p.category, c.orderDate FROM command as c, product as p where c.idc = " . $_SESSION["id"] . " and c.isSaled = 0 and p.id = c.idp";
            $result = $conn->query($query);
            $sum = 0;
            $id = 0;
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $sum += $row['price'] * $row['quantity'];
                echo  '
      <div class="basket-product">
        <div class="item">
          <div class="product-image">
            <img src="image/' . $row['imageLocation'] . '"alt="Placholder Image 2" class="product-frame">
          </div>
          <div class="product-details">
            <h1><strong><span class="item-quantity">' . $row['quantity'] . '</span> x ' . $row['title'] . '</strong> ' . $row['description'] . '</h1>
            <p>' . $row['category'] . ' </p>
          </div>
        </div>
        <div class="price">' . $row['price'] . '</div>
        <div class="quantity">
          <input type="number" class="quantity-field" readonly="readonly" form="update"  name ="qte' . $id . '"  value ="' . $row['quantity'] . '">
          <input type="text"  style="visibility: hidden;" form="update" value ="' . $row['idp'] . ' " name ="id' . $id . '">
          
        </div>
        <div class="subtotal">' . $row['price'] * $row['quantity'] . '</div>
        <div class="remove">
        <form action="./crud_cart.php  " method="post">
        <input type="text"  style="visibility: hidden;" value ="' . $row['idp'] . '" name ="id">
        <input type="text"  style="visibility: hidden;" value ="' . $row['orderDate'] . '" name ="date">
        <input type="submit" value="Remove" name="sub">
        </form>
        </div>
      </div>';
                $id += 1;
              }
            }

            ?>

          </div>
          <aside>
            <div class="summary">
              <div class="summary-total">
                <div class="total-title">Total</div>
                <?php echo '<div class="total-value final-value" id="basket-total">' . $sum . '</div>' ?>
              </div>

              <div class="summary-checkout">
                <input type="submit" value="Achetez maintenant" form="update" class="checkout-cta" name="ach">
              </div>

            </div>
          </aside>

        </main>
      </form>
    </div>
  </div>
</body>


</html>