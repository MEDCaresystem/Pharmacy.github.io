<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Pharmacy System</title>
  <!-- custom css file link  -->
  <link rel="stylesheet" href="style.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
</head>
<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
<body>

<header class="header">

<a href="index.php" class="logo"> <i class="fas fa-heart"></i> Medcare </a>
  <!-- Navbar start -->
 
  <nav class="navbar">
    
      
          <a class="nav-link active" href="index.php"><i class="fas fa-home"></i>Home</a>
        
        
          <a class="nav-link" href="product.php"><i class="fas fa-prescription-bottle"></i>Products</a>
        
        
          <a class="nav-link" href="#"><i class="fas fa-bars"></i>Categories</a>
        
        
          <a class="nav-link" href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
        
        
          <a class="nav-link active" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        
      
  </nav>
  <!-- Navbar end -->
</header>

<section class="home">
    <video src="images/11.mp4" muted autoplay loop class="video-slider active"></video>
    <video class="video-slider" src="Images/22.mp4" autoplay muted loop></video>
    <video class="video-slider" src="Images/33.mp4" autoplay muted loop></video>
    <video class="video-slider" src="Images/44.mp4" autoplay muted loop></video>
    
    


    <div class="slider-navigation">
        <div class="nav-btn active"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
      </div>     
</section>
<div class="image">
    <img src="Images/Home.png" alt="">
</div>
<div class="content">
    <h3><span>stay safe</span><span> stay healthy</span></h3>
    <p>Ordering medicines need not to be complicated</p> 
    <p>but rather a cakewalk!!!</p>
    
    <a href="sample.php" class="btn"> order now <span class="fas fa-chevron-right"></span> </a>
</div>
<div class="categories">
<h1 class="title"> <span>our categories</span>  </h1>
<br>
<br>

  <div class="category-container">
      <div class="category-card">
          <img src="Images/A.jfif" class="category-img" alt="">
          <p class="category-name">Heart care</p>
      </div>
      <div class="category-card">
        <img src="Images/B.jfif" class="category-img" alt="">
        <p class="category-name">Stomach care </p>
    </div>
    <div class="category-card">
        <img src="Images/C.jfif" class="category-img" alt="">
        <p class="category-name">Eye care </p>
    </div>
    <div class="category-card">
        <img src="Images/D.jfif" class="category-img" alt="">
        <p class="category-name">Pain relief</p>
    </div>
    <div class="category-card">
        <img src="Images/E.jfif" class="category-img" alt="">
        <p class="category-name">Common care </p>
    </div>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="about-section">
  <h1 class="heading">About Us Page</h1>
  <div class="image">
            <img src="Images/about-img.svg" alt="">
        </div>
 
  <p class="content">Putting our clients’ needs has been at the core of our team’s culture since day one. We began as a small web design agency and have spent over a decade growing exponentially into a comprehensive digital agency, which provides the best possible design, development, and marketing services for the pharmacy industry through our philosophy of ensuring delivery..</p>
</div>

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="index.php"> <i class="fas fa-arrow-right"></i> home</a>
            <a href="sample.php"> <i class="fas fa-arrow-right"></i> product</a>
            
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


<script>
  const btns = document.querySelectorAll('.nav-btn');
  const slides = document.querySelectorAll('.video-slider');

var slidernav = function(index) {
    btns.forEach((btn) => {
        btn.classList.remove('active');
    });

    slides.forEach((slide) => {
        slide.classList.remove('active');
    });


    btns[index].classList.add('active');
    slides[index].classList.add('active');
}

btns.forEach((btn,i)  =>  {
    btn.addEventListener('click',() => {
        slidernav(i);
    });
}); 
</script>
