<html>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="assets/css/grayscale.min.css" rel="stylesheet">

<body>
<hr />
 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Shpping website</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
         <form action="home.php" method = "" id="home">
              <button type= "submit" value= "signout">Home</button>
          </form>
          <form action="getAllCategores.php" method = "" id="all_Categories">
              <button type= "submit" value= "all_Categories">All Categoires</button>
          </form>
          <form action="logout.php" method = "" id="signout">
              <button type= "submit" value= "signout">SignOut</button>
          </form>
        </ul>
     </div>
    </div>
  </nav>

  <h2>Filter By Seller<h2>
  <form class="a" action="" method = "post" id="filterBySeller">
    <input type="hidden" name="act" value="filterBySeller" id="filterBySeller">

    <label for="seller">Enter Seller Name</label>
    <input type="text" placeholder="Enter seller Name"  name="seller" required>
    <button type= "submit" value= "submit">submit</button>
  </form>



<?php
    require_once "render.php";
    require_once "pdo.php";

    session_start();
        
    if($_SERVER['REQUEST_METHOD'] == "POST") {
      if(isset($_POST['act'])&& $_POST['act'] == 'filterBySeller'){
       
        $sellerUserName = $_POST['seller'];
       
        $sql = "SELECT Products.pid, price, description, image, Products.name, percentageDiscount, numProductsForDiscount FROM Products, Seller, HasProd WHERE Seller.sid=HasProd.sid AND Products.pid=HasProd.pid AND Seller.uname=:uname";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ":uname" => $sellerUserName
        ));
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();

        $count = count($rows);
       
        
        if($count){
            echo "<table style='border: solid 1px black;'>";
            echo "<tr><th>ProductID</th> <th>Price</th><th>Description</th>
                <th>Image</th> <th>Name</th> <th>percentageDiscount</th><th>numProductsForDiscount</th></tr>";
            foreach(new TableRows(new RecursiveArrayIterator($rows)) as $k=>$v) {
                echo $v;
            }
            echo"</table>";
            echo"<br /><br /><br />";
        }
      }
    }

?>

</body>
</html>