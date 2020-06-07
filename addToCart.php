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

    
       <form class="a" action="" method = "post" id="insertToCart">
         <input type="hidden" name="act" value="insertToCart">
        <label for="product"><b>Product</b></label>
        <input type="text" placeholder="Enter Product" name="product" required>
         <button class="a" type="submit" value="insertToCart">Add to Cart</button>
       </form>

       <form class="b" action="" method = "post" id="cancel">
           <button class="c" type="submit" value="register">Remove from Cart</button>
        </form>
      
    </div>

    <?php

      require_once "render.php";
      require_once "pdo.php";
      session_start();
      echo "HERE IS SID PASSED TO InsertToCart clothing";
      echo $_SESSION['login_user'];
      $description = $category = $price = $quantity = $image = $name =  $percentageDiscount =   $numProductsForDiscount= "" ;

      if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST['act'])&& $_POST['act'] == 'insertToCart'){

            $uname = $_POST['login_user'];
            $quantity = 50;

            $sql = "SELECT bid FROM Buyers Where uname=:uname";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $bid = $row["bid"];

            $sql = "INSERT INTO Cart (pid, bid, quantity) VALUES (:pid, :bid, :quantity)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array(
                ":pid"   => $pid,                   
                ":bid"  => $bid,
                ":quantity" => $quantity 
            ));

             echo "<script type='text/javascript'>alert('ADDED TO CART');</script>";
        }
      }  
    ?>

  </body>

  
</html>