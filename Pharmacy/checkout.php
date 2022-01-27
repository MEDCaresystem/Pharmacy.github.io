<?php
	require 'config.php';

	$grand_total = 0;
	$allItems = '';
	$items = [];

	$sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $grand_total += $row['total_price'];
	  $items[] = $row['ItemQty'];
	}
	$allItems = implode(', ', $items);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Checkout</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel="stylesheet" href="style.css">
</head>

<body>
<header class="header">

<a href="index.php" class="logo"> <i class="fas fa-heart"></i> Medcare </a>
  <!-- Navbar start -->
 
  <nav class="navbar">
    
      
          <a class="nav-link active" href="index.php"><i class="fas fa-home"></i>Home</a>
        
        
          <a class="nav-link" href="product.php"><i class="fas fa-prescription-bottle"></i>Products</a>
        
        
          <a class="nav-link" href="categories.php"><i class="fas fa-bars"></i>Categories</a>
        
        
          <a class="nav-link" href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
        
        
          <a class="nav-link active" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        
      
  </nav>
  <!-- Navbar end -->
</header>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 px-5 pb-6" id="order">
        <h1 class="text-center text-info p-2">Complete your order!</h1>
        <div class="jumbotron p-3 mb-2 text-center">
          <h3 class="lead"><b>Product(s) : </b><?= $allItems; ?></h3>
          <h2 class="lead"><b>Delivery Charge : </b>Free</h2>
          <h2><b>Total Amount Payable : </b><?= number_format($grand_total,2) ?>/-</h2>
        </div>
        <form action="" method="post" id="placeOrder">
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
          </div>
          <div class="form-group">
            <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
          </div>
          <h2 class="text-center lead">Select Payment Mode</h2>
          <div class="form-group">
            <select name="pmode" class="form-control">
              <option value="" selected disabled>-Select Payment Mode-</option>
              <option value="cod">Cash On Delivery</option>
              <option value="netbanking">Net Banking</option>
              <option value="cards">Debit/Credit Card</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
  <section class="footer">

<div class="box-container">

    <div class="box">
        <h3>quick links</h3>
        <a href="index.php"> <i class="fas fa-arrow-right"></i> home</a>
        <a href="product.php"> <i class="fas fa-arrow-right"></i> product</a>
        
        <a href="#"> <i class="fas fa-arrow-right"></i> about</a>
        
        <a href="cart.php"> <i class="fas fa-arrow-right"></i> cart</a>
    </div>

    <div class="box">
        <h3>extra links</h3>
        <a href="#"> <i class="fas fa-arrow-right"></i> my order </a>
        <a href="#"> <i class="fas fa-arrow-right"></i> my favorite </a>
        <a href="#"> <i class="fas fa-arrow-right"></i> my wishlist </a>
        <a href="#"> <i class="fas fa-arrow-right"></i> my account </a>
        <a href="#"> <i class="fas fa-arrow-right"></i> terms or use </a>
    </div>

    <div class="box">
        <h3>follow us</h3>
        <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
        <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
        <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
        <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
        <a href="#"> <i class="fab fa-pinterest"></i> pinterest </a>
    </div>

    <div class="box">
        <h3>newsletter</h3>
        <p>subscribe for latest updates</p>
        <form action="">
            <input type="email" placeholder="enter your email">
            <input type="submit" value="subscribe" class="btn">
        </form>
        <img src="Images/payment.png" class="payment" alt="">
    </div>

</div>

</section>

<section class="credit">created by ABC | all rights reserved!</section>
</body>

</html>