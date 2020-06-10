
<html>

<head>
    <title>Orders</title>
    <style>
      tr {
        margin-bottom: 15px;
      }
      tr:hover {
        cursor:pointer;
      }
      tr:hover {
        background-color: #ccc;
      }
    </style>
    <script>

    function handleSelectedProduct(element) {

      console.log("CALLED HERE");

      let oid = element.firstChild.innerHTML;

      let tag = document.getElementById("shippedFromOrderInput");
      tag.setAttribute("value", oid);
 
    }
</script>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="assets/css/grayscale.min.css" rel="stylesheet">

</head>

<body>

 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Shopping website</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
         <form action="home_seller.php" method = "" id="home">
              <button type= "submit" value= "signout">Home</button>
          </form>
         <form action="logout.php" method = "" id="signout">
              <button type= "submit" value= "signout">SignOut</button>
          </form>
          <form action="" method="post" id="shippedFromOrder">
             <input type="hidden" name="act" value="shippedFromOrder" >
            
            <!-- <br/><br/> -->
             <input  type="text" name="productToBeShipped" value="" id= "shippedFromOrderInput" >
             <button type= "submit" value=""> Ship Order</button>
          </form>
        </ul>
     </div>
    </div>
  </nav>

  

</body>

<?php



    require_once "render2.php";
    require_once "pdo.php";
    session_start();
   

    //  ======================GET ALL PRODUCTS ORDERED FROM SELLER =======================
    $sellerUserId = $_SESSION['login_sid'];

    $sql = "SELECT OrderTable.oid, status, Products.* FROM OrderOf, Products, OrderTable, FromSeller, Seller 
            WHERE OrderOf.pid=Products.pid 
                AND OrderOf.oid=OrderTable.oid 
                AND FromSeller.oid=OrderTable.oid 
                AND Seller.sid=FromSeller.sid
                AND Seller.sid=:sid";

    $stmt = $conn->prepare($sql);
  
    $stmt->execute(array(
        ":sid" => $sellerUserId
    ));
   
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();
    
        $count = count($rows);
       
        if($count){
           
            echo "<br/><br/><br/>";
            $name = $_SESSION['login_name'];
            echo "<h1></b><em>ORDERS FROM $name </em></b></h1>";
            echo "<br/><br/>";
            echo "<table style='border: solid 1px black;'>";
            echo "<tr><th>Order Number</th><th>Status</th><th>ProductID</th> <th>Price</th><th>Description</th>
                <th>Image</th> <th>Name</th> <th>% Discount</th><th>numProducts</th></tr>";
            foreach(new TableRows(new RecursiveArrayIterator($rows)) as $k=>$v) {
                 echo $v;
            }
            echo"</table>";
            echo"<br /><br /><br />";
       }else{

        echo"<h1>NO ORDERS FOUND</h1>";
       }


       if($_SERVER['REQUEST_METHOD'] == "POST") {
  
        if(isset($_POST['act'])&& $_POST['act'] == 'shippedFromOrder'){
          
          $oid = $_POST['productToBeShipped'];
    
          $sql = "UPDATE OrderTable 
                    SET 
                        status='shipped'
                    WHERE
                        oid=:oid";
          $stmt = $conn->prepare($sql);          
          $stmt->execute(array(
              ":oid"   => $oid         
          ));
  
          echo "<script type='text/javascript'>alert('ORDER SHIPPED');</script>";
          echo "<script>window.location.href='./getAllOrdersFromSeller.php';</script>";
          exit;        
        }
      }

?>

</html>