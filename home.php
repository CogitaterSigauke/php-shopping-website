<!--Name Rediet Negash, CSE 305 PS 5-->
<?php
  require_once "render.php";

  require_once "pdo.php";
  session_start();

 
?>
<html>
<head>


<!-- Main Page Home--> 
  <!-- Bootstrap core External CSS -->
 <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="assets/css/grayscale.min.css" rel="stylesheet">



</head>
<body id="page-top">

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Shopping website</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">


              
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="getClothing.php">Clothing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="getAccessories.php">Accessories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="getShoes.php">Shoes</a>
          </li> 
                            
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="getAllCategores.php">All Categories</a>
          </li>

          <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="getOrders.php">My Orders</a>
          </li>
          <li class="nav-item">
            
          <a class="nav-link js-scroll-trigger" href="myCart.php">My Cart</a>
           
        </li>
      
                 
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="logout.php">SignOut</a>
          </li> 
         </ul>
      </div>
    </div>
  </nav>

</body>
</html>

  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
       
      </div>
    </div>
  </header>


  <!-- Footer -->
  <footer class="bg-black small text-center text-white-50">
    <div class="container">
      Copyright &copy; shooping Webapp CSE 305 Final project 2020
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/js/grayscale.min.js"></script> 