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

         <label for="size"><b>Size</b></label>
         <input type="text" placeholder="Enter size"  name="size" required>

         <label for="gender"><b>Gender</b></label>
         <input type="text" placeholder="Enter gender"  name="gender" required>

         <label for="maker"><b>Maker</b></label>
         <input type="text" placeholder="Enter maker"  name="maker" required>

         <label for="type"><b>Type</b></label>
         <input type="text" placeholder="Enter type"  name="type" required>
      
         <label for="price"><b>Price</b></label>
         <input type="text" placeholder="Enter price"  name="price" required>

         <label for="quantity"><b>Quantity</b></label>
         <input type="text" placeholder="Enter the quantity of your products"  name="quantity" required>
          
        <label for="prDisc"><b>percentage Discount</b></label>
        <input type="text" placeholder="Enter the discount that you want to give" name="prDisc" required>
      
        <label for="numPrDisc"><b>number of Product Discount</b></label>
        <input type="text" placeholder="Enter the discount that you want to give" name="numPrDisc" required>
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
      echo "HERE ============IS SID";
      echo $_SESSION['login_sid'];
      $description = $category = $price = $quantity = $image = $name =  $percentageDiscount =   $numProductsForDiscount= "";
      


      if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST['act'])&& $_POST['act'] == 'insert'){

          $name = $_POST['name'];
          echo "inside post method insert";
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
          $numProductsForDiscount= $_POST['numPrDisc'];       
          $category =  "clothing";     
          $sid = $_SESSION['login_sid'];
          $quantity = $_POST['quantity'];;

          echo "after assigning the variables";
          
          $sql = "INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (:pid, :price, :description, :image, :name, :percentageDiscount, :numProductsForDiscount)";
          echo "inserted in products";
          $stmt = $conn->prepare($sql);

echo "<br/> => pid,                  $pid,                  ";          
echo "<br/> => price,                $price,                ";
echo "<br/> => description,          $description,          ";
echo "<br/> => image,                $image,                ";
echo "<br/> => name ,                $name ,                ";
echo "<br/> => percentageDiscount,   $percentageDiscount,   ";
echo "<br/> => numProductsForDiscount$numProductsForDiscount";          
          $stmt->execute(array(
              ":pid"                    => $pid,                   
              ":price"                  => $price,                 
              ":description"            => $description,           
              ":image"                  => $image,                 
              ":name"                   => $name ,                 
              ":percentageDiscount"     => $percentageDiscount,     
              ":numProductsForDiscount" => $numProductsForDiscount
          ));
          echo "inserted in products";
          echo "<script type='text/javascript'>alert('PRODUCT INSERTED');</script>";
          

          $sql = "INSERT INTO HasProd (pid, sid, quantity) VALUES (:pid, :sid, :quantity)";
          $stmt = $conn->prepare($sql);
          $stmt->execute(array(
              ":pid"         => $pid,                   
              ":sid"         => $sid,                 
              ":quantity"    => $quantity
          ));
          echo "after inserting into has prodcut";
          echo "<script type='text/javascript'>alert('HAS PRODUCT INSERTED');</script>";

          if($category == "clothing"){

              $size   = $_POST['size'];  
              $gender = $_POST['gender']; 
              $maker  = $_POST['maker']; 
              $type   = $_POST['type']; 

              $sql = "INSERT INTO Clothing (pid, size, gender, maker, type) VALUES (:pid, :size, :gender, :maker, :type)";
              $stmt = $conn->prepare($sql);
              $stmt->execute(array(
                  ":pid"   => $pid,                   
                  ":size"  => $size,
                  ":gender"=> $gender,
                  ":maker" => $maker,
                  ":type"  => $type  
              ));

              echo "<script type='text/javascript'>alert('CLOTHING INSERTED');</script>";
              echo "<script>window.location.href='./home_seller.php';</script>";
              exit;
          }
        }
      }  



    ?>

  </body>

  
</html>