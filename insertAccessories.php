<html>
  <head>
    <style>
      body {font-family: Arial, Helvetica, sans-serif;}
    
      form.a {padding-top: 16px; padding-right: 16px; padding-left: 16px; margin: 0}
      form.b {padding-right: 16px; padding-left: 16px; margin: 0}
      .topnav {
        background-color: #333;
        overflow: hidden;
      }
      .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
      }
      input[type=text], [type=file], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
      }

      button.a {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
      }
      button.b {
        background-color: blue;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
      }
      button.c {
        background-color: red;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
      }

      button:hover {
        opacity: 0.8;
      }

      .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
      }


      .container {
        padding: 16px;
        border: 3px solid #f1f1f1; width: 40%; margin: auto;
      }

      span.psw {
        float: right;
        padding-top: 16px;
      }
    </style>

  </head>
  <body>
   

    <div class="container">

    
      <form class="a" action="" method = "post" id="insert">
         <input type="hidden" name="act" value="insert">

         <label for="name"><b>Product Name</b></label>
         <input type="text" placeholder="Enter productName "  name="name" required>
        
         
      
         </br></br>
         <label for="description"><b>Descirption</b></label>
         <input type="text" placeholder="Enter the product Description"  name="description" required>

         <label for="type"><b>Type</b></label>
         <input type="text" placeholder="Enter type"  name="type" required>

         <label for="brand"><b>Brand</b></label>
         <input type="text" placeholder="Enter brand"  name="brand" required>

         <label for="price"><b>Price</b></label>
         <input type="text" placeholder="Enter price"  name="price" required>

         <label for="quantity"><b>Quantity</b></label>
         <input type="text" placeholder="Enter the quantity of your products"  name="quantity" required>
            
        <!-- <span className="input-group-text recipe-ul" id="inputGroupFileAddon01" >Upload Image</span> -->
       
       
        <label for="prDisc"><b>percentage Discount</b></label>
        <input type="text" placeholder="Enter the discount that you want to give" name="prDisc" required>

        <label for="numPrDisc"><b>Number of Discount</b></label>
        <input type="text" placeholder="Enter the discount" name="numPrDisc" required>
      
        <!-- <label for="numPrDisc"><b>number of Product Discount</b></label>
        <input type="text" placeholder="Enter Product Discount" name="numPrDisc" required>
         -->
        <!-- <input type="file" onChange="handleFileChange()">
        
        <button for = "image"  onClick= "handleUpload()">Upload Image</button>
          </br></br> -->
         <button class="a" type="submit" value="insert">Submit</button>

       </form>
       <form class="b" action="home_seller.php" method = "" id="cancel">
           <button class="c" type="submit" value="register">cancel</button>
        </form>
    </div>

    <?php

      require_once "render.php";
      require_once "pdo.php";
      session_start();
      echo "HERE IS SID PASSED TO Insert Accessories";
      echo $_SESSION['login_sid'];
      
      $description = $category = $price = $quantity = $image = $name =  $percentageDiscount =   $numProductsForDiscount= "" ;

      if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST['act'])&& $_POST['act'] == 'insert'){

          $name = $_POST['name'];

          $sql = "SELECT COUNT(*) FROM Products";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          print_r($row);
          $count = $row["COUNT(*)"];
          echo $count;


          $pid  = $count + 1; 
          $price =$_POST['price'];   
          $description = $_POST['description'];    
          $image ="No image";         
          $name = $_POST['name']; 
          $percentageDiscount = $_POST['prDisc'];   
          // echo "<h1> pid == $_POST['numPrDisc']</h1>";
          echo "Here isnum of products =======";
          echo  $_POST['numPrDisc'];
          $numProductsForDiscount= $_POST['numPrDisc'];       
          $category = "accessories";     
          $sid = $_SESSION['login_sid'];
          $quantity = $_POST['quantity'];
        echo "<h1> pid == $pid</h1>";
        echo ("sid == $sid");
        echo ("quantity == $quantity");
        echo ("quantity9999999999 == $quantity");
        echo ("quantity == $quantity");
        echo ("quantity == $quantity");
          
        $sql = "INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (:pid, :price, :description, :image, :name, :percentageDiscount, :numProductsForDiscount)";
        echo "insert sql";
        $stmt = $conn->prepare($sql);
        echo "after prepare stmt sql";
echo "<br/> 'pid,                  ' ==>  $pid,                  ";
echo "<br/> 'price,                ' ==>  $price,                ";
echo "<br/> 'description,          ' ==>  $description,          ";
echo "<br/> 'image,                ' ==>  $image,                ";
echo "<br/> 'name ,                ' ==>  $name ,                ";
echo "<br/> 'percentageDiscount,   ' ==>  $percentageDiscount,   ";
echo "<br/> 'numProductsForDiscount' ==>  $numProductsForDiscount";

        $stmt->execute(array(
            ":pid"                    => $pid,                   
            ":price"                  => $price,                 
            ":description"            => $description,           
            ":image"                  => $image,                 
            ":name"                   => $name ,                 
            ":percentageDiscount"     => $percentageDiscount,     
            ":numProductsForDiscount" => $numProductsForDiscount
        ));
        echo "after execute";
        echo "<script type='text/javascript'>alert('PRODUCT INSERTED');</script>";


          $sql = "INSERT INTO HasProd (pid, sid, quantity) VALUES (:pid, :sid, :quantity)";
         
          $stmt = $conn->prepare($sql);
       
          $stmt->execute(array(
              ":pid"         => $pid,                   
              ":sid"         => $sid,                 
              ":quantity"    => $quantity
          ));
          echo "after preparing before echo";
          echo "<script type='text/javascript'>alert('HAS PRODUCT INSERTED');</script>";

         
         if($category == "accessories"){

              $type  = "large";
              $brand = "adidas";

              $sql = "INSERT INTO Accessories (pid, type, brand) VALUES (:pid, :type, :brand)";
              $stmt = $conn->prepare($sql);
              $stmt->execute(array(
                  ":pid"   => $pid,                   
                  ":type"  => $type,
                  ":brand" => $brand 
              ));

              echo "<script type='text/javascript'>alert('ACCESSORIES INSERTED');</script>";
              // header("location: ./home_seller.php");
              echo "<script>window.location.href='./home_seller.php';</script>";
              exit;
          }
        }
      }  
    ?>

  </body>

  
</html>