<html>
<body>

<?php
    require_once "render.php";
    require_once "pdo.php";




    // $pid  = $count + 1; 
    // $price = 1053200  ;     
    // $description = "This is a good Accessories";     
    // $image = "no image" ;         
    // $name = "accessories" ;     
    // $percentageDiscount = 10  ;     
    // $numProductsForDiscount= 5 ;       
    // $category = "accessories";     
    // $sid = 23;
    // $quantity = 55;

//    =====================GET SHOP ACCOUNT BALANCE ====================

    // $sid = 5;
    // $sql =  "SELECT * FROM Accounts, HasAcc WHERE HasAcc.aid=Accounts.aid AND sid=:sid";
    // $stmt = $conn->prepare($sql);
    // $stmt->execute(array(
    //     ":sid" => $aid
    // ));
    // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    // $rows = $stmt->fetchAll();

    // $count = count($rows);
    // print_r($count);
    //     if($count){
    //     echo "<table style='border: solid 1px black;'>";
    //     echo "<tr><th>Seller ID</th> <th>Password</th><th>Name</th>
    //         <th>Username</th> <th>Email</th></tr>";
    //     foreach(new TableRows(new RecursiveArrayIterator($rows)) as $k=>$v) {
    //          echo $v;
    //     }
    //     echo"</table>";
    //     echo"<br /><br /><br />";
    // }




// // ======================CREATE SHOP ACCOUNT===========================

    // $sid = 5;
    // $sql = "SELECT COUNT(*) FROM Accounts";
    // $stmt = $conn->prepare($sql);
    // $stmt->execute();
    // $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // print_r($row);
    // $count = $row["COUNT(*)"];

    // $aid  = $count + 1; 

    // $sql = "INSERT INTO Accounts (aid, balance) VALUES (:aid, 0)";
    // $stmt = $conn->prepare($sql);
    // $stmt->execute(array(
    //     ":aid" => $aid
    // ));

    // echo "<script type='text/javascript'>alert('Account Created');</script>";

    // $sql = "INSERT INTO HasAcc (sid, aid) VALUES (:sid, :aid)";
    // $stmt = $conn->prepare($sql);
    // echo "<br/> HERE";
    // $stmt->execute(array(
    //     ":sid" => $sid,
    //     ":aid" => $aid        
    // ));
    // echo "<br/> THERE";
    // echo "<script type='text/javascript'>alert(' HasAcc Created');</script>";



// //  ======================DELETE FROM CART ======================= 
    // $bid = 5;   
    // $pid = 40;       
    // $quantity = 50;
    // $sql = "DELETE FROM Cart WHERE bid=:bid AND pid=:pid AND quantity=:quantity";
    // echo "<br/> HERE";
    // $stmt = $conn->prepare($sql);
    // $stmt->execute(array(
    //     ":bid" => $bid,           
    //     ":pid" => $pid,                
    //     ":quantity" => $quantity,
    // ));
    // echo "<br/> THERE";
    // echo "<script type='text/javascript'>alert('PRODUCT DELETED FROM CART');</script>";


// // //  ======================GET ALL SELLERS =======================

//     $sql = "SELECT  * FROM Seller";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $rows = $stmt->fetchAll();

//     $count = count($rows);
//     // print_r($count);
//     if($count){
//         echo "<table style='border: solid 1px black;'>";
//         echo "<tr><th>Seller ID</th> <th>Password</th><th>Name</th>
//             <th>Username</th> <th>Email</th></tr>";
//         foreach(new TableRows(new RecursiveArrayIterator($rows)) as $k=>$v) {
//              echo $v;
//         }
//         echo"</table>";
//         echo"<br /><br /><br />";
//     }



// //  ======================GET SELLER USER DETAILS =======================

//     $sellerUserName = "amanu";
//     $sql = "SELECT  * FROM Seller WHERE uname=:uname";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute(array(
//         ":uname" => $sellerUserName
//     ));
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $rows = $stmt->fetchAll();

//     $count = count($rows);
//     // print_r($count);
//     if($count){
//         echo "<table style='border: solid 1px black;'>";
//         echo "<tr><th>Seller ID</th> <th>Password</th><th>Name</th>
//             <th>Username</th> <th>Email</th></tr>";
//         foreach(new TableRows(new RecursiveArrayIterator($rows)) as $k=>$v) {
//              echo $v;
//         }
//         echo"</table>";
//         echo"<br /><br /><br />";
//     }


// // //  ======================GET BUYER USER DETAILS =======================

//     $buyerUserName = "abeni";
//     $sql = "SELECT  * FROM Buyer WHERE uname=:uname";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute(array(
//         ":uname" => $buyerUserName
//     ));
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $rows = $stmt->fetchAll();

//     $count = count($rows);
//     // print_r($count);
//     if($count){
//         echo "<table style='border: solid 1px black;'>";
//         echo "<tr><th>Buyer ID</th> <th>Password</th><th>Name</th>
//             <th>Username</th> <th>Email</th></tr>";
//         foreach(new TableRows(new RecursiveArrayIterator($rows)) as $k=>$v) {
//              echo $v;
//         }
//         echo"</table>";
//         echo"<br /><br /><br />";
//    }

//  ======================GET ALL PRODUCTS THE BUYER HAS ORDERED =======================
$buyerUserId = 5;

$sql = "SELECT Products.* FROM OrderOf, Products, OrderTable, HasOrder, Buyer 
        WHERE OrderOf.pid=Products.pid 
            AND OrderOf.oid=OrderTable.oid 
            AND HasOrder.oid=OrderTable.oid 
            AND Buyer.bid=HasOrder.bid
            AND Buyer.bid=:bid";

$stmt = $conn->prepare($sql);
echo "HERE1";
$stmt->execute(array(
    ":bid" => $buyerUserId
));
echo "HERE";
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();

    $count = count($rows);
    print_r($count);
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

// //  ======================GET ALL PRODUCTS IN BUYER'S CART =======================
// $buyerUserId = 5;

// $sql = "SELECT Products.pid, price, description, image, Products.name, percentageDiscount, numProductsForDiscount 
//             FROM Products, Cart, Buyer 
//             WHERE Buyer.bid=Cart.bid AND Products.pid=Cart.pid AND Buyer.bid=:bid";
// $stmt = $conn->prepare($sql);
// $stmt->execute(array(
//     ":bid" => $buyerUserId
// ));
// $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
// $rows = $stmt->fetchAll();

//     $count = count($rows);
    
//     if($count){
//         echo "<table style='border: solid 1px black;'>";
//         echo "<tr><th>ProductID</th> <th>Price</th><th>Description</th>
//             <th>Image</th> <th>Name</th> <th>percentageDiscount</th><th>numProductsForDiscount</th></tr>";
//         foreach(new TableRows(new RecursiveArrayIterator($rows)) as $k=>$v) {
//              echo $v;
//         }
//         echo"</table>";
//         echo"<br /><br /><br />";
//    }


// // ==========================ADD PRODUCT TO ORDERS==================
//     $sql = "SELECT COUNT(*) FROM OrderTable";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     $row = $stmt->fetch(PDO::FETCH_ASSOC);
//     print_r($row);
//     $count = $row["COUNT(*)"];
//     echo $count;

//     // $uname = "abeni";
//     $pid = 43;
//     $quantity = 50;
//     $bid = 5;
//     $finalPriceAfterDiscount = 100;
//     $orderId = $count + 1;
//     $orderStatus = "placed";

//     echo "<br/> HERE";

//     $sql = "INSERT INTO OrderTable(oid, price, quantity, status) VALUES (:oid, :price, :quantity, :status)";
//     $stmt = $conn->prepare($sql);
//     echo "<br/> HERE";
//     echo "<br/> oid $orderId";
//     echo "<br/> price $finalPriceAfterDiscount";
//     echo "<br/> quantity $quantity";         
//     echo "<br/> status $orderStatus"; 
//     $stmt->execute(array(
//         ":oid"   => $orderId,                       
//         ":price" => $finalPriceAfterDiscount,
//         ":quantity" => $quantity,               
//         ":status"  => $orderStatus              
//      ));
    
//     echo "<script type='text/javascript'>alert('ORDER PLACED ');</script>";

//     // $sql = "SELECT bid FROM Buyers Where uname=:bid";
//     // $stmt = $conn->prepare($sql);
//     // $stmt->execute(array(
//     //     ":bid"
//     // ));
//     // $row = $stmt->fetch(PDO::FETCH_ASSOC);
   

//     $sql = "SELECT sid FROM HasProd Where pid=:pid";
//     $stmt = $conn->prepare($sql);
//     echo "<br/ AFTER HAS PRODUCT>";
//     $stmt->execute(array(
//         "pid" => $pid
//     ));
//     $row = $stmt->fetch(PDO::FETCH_ASSOC);
//     $sid = $row["sid"];
    
//     echo "<br/ AFTER HAS PRODUCT>";

//     $sql = "INSERT INTO HasOrder(bid, oid) VALUES (:bid, :oid)";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute(array(
//         ":bid"  => $bid,
//         ":oid"  => $orderId
//      ));

//      echo "<script type='text/javascript'>alert('HAS ORDER INSERTED');</script>";

//     $sql = "INSERT INTO OrderOf(oid, pid) VALUES (:oid, :pid)";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute(array(
//         ":oid"  => $orderId,
//         ":pid"  => $pid
//      ));
     
//     echo "<script type='text/javascript'>alert('ORDEROF INSERTED');</script>";
 
//     $sql = "INSERT INTO FromSeller(oid, sid) VALUES (:oid, :sid)";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute(array(
//         ":oid"  => $orderId,
//         ":sid"  => $sid
//      ));
     
//     echo "<script type='text/javascript'>alert('FROM SELLER INSERTED');</script>";
 
// // ==========================ADD PRODUCT TO CART==================
   

    // $sql = "SELECT bid FROM Buyers Where uname=:uname";
    // $stmt = $conn->prepare($sql);
    // $stmt->execute(

    //     array(
    //         ":uname" => $
    //     )
    // );
    // $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // $bid = $row["bid"];
    // $uname = "cogi";






    $quantity = 240000;
    $bid = 6;
    $pid = 4341;


    // $sql = "SELECT EXISTS(SELECT * FROM Cart WHERE bid=:bid AND pid=:pid AND quantity=:quantity)";
    // $stmt = $conn->prepare($sql);

    // echo "HERE4";
    // $stmt->execute(array(
    //     ":pid"   => $pid,                   
    //     ":bid"  => $bid,
    //     ":quantity" => $quantity 
    //  ));  
    //  echo "HERE5";
    // $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // print_r($row);
    // $count = $row["[SELECT EXISTS(SELECT * FROM Cart WHERE bid='$bid' AND pid='$pid' AND quantity='$quantity')]"];
    // // echo "[SELECT EXISTS(SELECT * FROM Cart WHERE bid='$bid' AND pid='$pid' AND quantity='$quantity')";
    // echo $count;
    // echo "this is count", $count;  
    // if($count){
    //     echo "HERE HERE ";
    //     // echo "<script type='text/javascript'>alert('PRODUCT ALREADY ADDED TO CART');</script>";


    // }
       




    //     echo "HERE";
    //     $sql = "INSERT INTO Cart (pid, bid, quantity) VALUES (:pid, :bid, :quantity)";
    //     $stmt = $conn->prepare($sql);
    //     echo "HERE";
    //     echo "<br/> bid $bid";
    //     echo "<br/> quantity $quantity";
    //     echo "<br/> pid $pid";
        
    // $stmt->execute(array(
    //     ":pid"   => $pid,                   
    //     ":bid"  => $bid,
    //     ":quantity" => $quantity 
    //  ));
    //  print_r($row);

    //  echo "<script type='text/javascript'>alert('ADDED TO CART');</script>";

    
    


//  ======================GET ALL PRODUCTS ORDERED FROM SELLER BY ORDER STATUS =======================
// $sellerUserName = "HP3";
// $orderStatus = "shipped"; //{shipped | cancelled | delivered | orderPlaced }

// $sql = "SELECT Products.pid, price, description, image, Products.name, percentageDiscount, numProductsForDiscount 
//             FROM Products, Seller, OrderTable, FromSeller 
//             WHERE Seller.sid=FromSeller.sid AND Products.pid=OrderTable.pid 
//                 AND FromSeller.oid=OrderTable.oid AND OrderTable.status=:status
//                 Seller.uname=:uname";                
// $stmt = $conn->prepare($sql);
// $stmt->execute(array(
//     ":uname" => $sellerUserName,
//     ":status" => $orderStatus
// ));
// $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
// $rows = $stmt->fetchAll();

//     $count = count($rows);
    
//     if($count){
//         echo "<table style='border: solid 1px black;'>";
//         echo "<tr><th>ProductID</th> <th>Price</th><th>Description</th>
//             <th>Image</th> <th>Name</th> <th>percentageDiscount</th><th>numProductsForDiscount</th></tr>";
//         foreach(new TableRows(new RecursiveArrayIterator($rows)) as $k=>$v) {
//              echo $v;
//         }
//         echo"</table>";
//         echo"<br /><br /><br />";
//    }

// //  ======================GET ALL PRODUCTS ORDERED FROM SELLER=======================
//     $sellerUserName = "HP3";
//     $sql = "SELECT Products.pid, price, description, image, Products.name, percentageDiscount, numProductsForDiscount 
//                 FROM Products, Seller, OrderTable, FromSeller 
//                 WHERE Seller.sid=FromSeller.sid AND Products.pid=OrderTable.pid 
//                     AND FromSeller.oid=OrderTable.oid AND Seller.uname=:uname";                
//     $stmt = $conn->prepare($sql);
//     $stmt->execute(array(
//         ":uname" => $sellerUserName
//     ));
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $rows = $stmt->fetchAll();

//     $count = count($rows);
    
//     if($count){
//         echo "<table style='border: solid 1px black;'>";
//         echo "<tr><th>ProductID</th> <th>Price</th><th>Description</th>
//             <th>Image</th> <th>Name</th> <th>percentageDiscount</th><th>numProductsForDiscount</th></tr>";
//         foreach(new TableRows(new RecursiveArrayIterator($rows)) as $k=>$v) {
//              echo $v;
//         }
//         echo"</table>";
//         echo"<br /><br /><br />";
//    }


// // =========================GET ALL PRODUCTS FROM SELLER AND FILTER BY PRICE=======================================    
//     $sellerUserName = "HP3";
//     $price = 2000;
//     $sql = "SELECT Products.pid, price, description, image, Products.name, percentageDiscount, numProductsForDiscount 
//         FROM Products, Seller, HasProd 
//         WHERE Seller.sid=HasProd.sid AND Products.pid=HasProd.pid 
//             AND Seller.uname=:uname AND price=:price";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute(array(
//         ":uname" => $sellerUserName,
//         ":price" => $price
//     ));
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $rows = $stmt->fetchAll();

//     $count = count($rows);
    
//     if($count){
//         echo "<table style='border: solid 1px black;'>";
//         echo "<tr><th>ProductID</th> <th>Price</th><th>Description</th>
//             <th>Image</th> <th>Name</th> <th>percentageDiscount</th><th>numProductsForDiscount</th></tr>";
//         foreach(new TableRows(new RecursiveArrayIterator($rows)) as $k=>$v) {
//              echo $v;
//         }
//         echo"</table>";
//         echo"<br /><br /><br />";
//    }





// // =========================GET ALL PRODUCTS FROM SELLER=======================================    
//     $sellerUserName = "HP3";
//     $sql = "SELECT Products.pid, price, description, image, Products.name, percentageDiscount, numProductsForDiscount FROM Products, Seller, HasProd WHERE Seller.sid=HasProd.sid AND Products.pid=HasProd.pid AND Seller.uname=:uname";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute(array(
//         ":uname" => $sellerUserName
//     ));
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $rows = $stmt->fetchAll();

//     $count = count($rows);
    
//     if($count){
//         echo "<table style='border: solid 1px black;'>";
//         echo "<tr><th>ProductID</th> <th>Price</th><th>Description</th>
//             <th>Image</th> <th>Name</th> <th>percentageDiscount</th><th>numProductsForDiscount</th></tr>";
//         foreach(new TableRows(new RecursiveArrayIterator($rows)) as $k=>$v) {
//              echo $v;
//         }
//         echo"</table>";
//         echo"<br /><br /><br />";
//    }


// // =========================GET ALL PRODUCTS BY PRICE=======================================    
// $price = 2000;
// $sql = "SELECT * FROM Products WHERE price=:price";
    
// $stmt = $conn->prepare($sql);
// $stmt->execute(array(
//     ":price" => $price
// ));
// $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
// $rows = $stmt->fetchAll();



// =========================GET ALL PRODUCTS=======================================    

//     $sql = "SELECT * FROM Products";
    
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $rows = $stmt->fetchAll();

// // ========================VIEW PRODUCTS====================================

//     $count = count($rows);
    
//     if($count){
//         echo "<table style='border: solid 1px black;'>";
//         echo "<tr><th>ProductID</th> <th>Price</th><th>Description</th>
//             <th>Image</th> <th>Name</th> <th>percentageDiscount</th><th>numProductsForDiscount</th></tr>";
//         foreach(new TableRows(new RecursiveArrayIterator($rows)) as $k=>$v) {
//              echo $v;
//         }
//         echo"</table>";
//         echo"<br /><br /><br />";
//    }


// ======================INSERT PRODUCT===========================



    // $sql = "SELECT COUNT(*) FROM Products";
    // $stmt = $conn->prepare($sql);
    // $stmt->execute();
    // $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // print_r($row);
    // $count = $row["COUNT(*)"];
    // echo $count;


    // $pid  = $count + 1; 
    // $price = 1053200  ;     
    // $description = "This is a good Accessories";     
    // $image = "no image" ;         
    // $name = "accessories" ;     
    // $percentageDiscount = 10  ;     
    // $numProductsForDiscount= 5 ;       
    // $category = "accessories";     
    // $sid = 23;
    // $quantity = 55;

    // $sql = "INSERT INTO HasProd (pid, sid, quantity) VALUES (:pid, :sid, :quantity)";
    // $stmt = $conn->prepare($sql);
    // $stmt->execute(array(
    //     ":pid"         => $pid,                   
    //     ":sid"         => $sid,                 
    //     ":quantity"    => $quantity
    // ));

    // echo "<script type='text/javascript'>alert('HAS PRODUCT INSERTED');</script>";

    // $sql = "INSERT INTO Products (pid, price, description, image, name, percentageDiscount, numProductsForDiscount) VALUES (:pid, :price, :description, :image, :name, :percentageDiscount, :numProductsForDiscount)";
    // $stmt = $conn->prepare($sql);
    // $stmt->execute(array(
    //     ":pid"                    => $pid,                   
    //     ":price"                  => $price,                 
    //     ":description"            => $description,           
    //     ":image"                  => $image,                 
    //     ":name"                   => $name ,                 
    //     ":percentageDiscount"     => $percentageDiscount,
    //     ":numProductsForDiscount" => $numProductsForDiscount
    // ));

    // echo "<script type='text/javascript'>alert('PRODUCT INSERTED');</script>";

    // if($category == "shoes"){

    //     $size  =  23;
    //     $gender=  "male";
    //     $model =  "adidas3";
    //     $brand = "adidas";

    //     $sql = "INSERT INTO Shoes (pid, size, gender, model, brand) VALUES (:pid, :size, :gender, :model, :brand)";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->execute(array(
    //         ":pid"   => $pid,                   
    //         ":size"  => $size, 
    //         ":gender"=> $gender, 
    //         ":model" => $model, 
    //         ":brand" => $brand  
    //      ));

    //      echo "<script type='text/javascript'>alert('SHOES INSERTED');</script>";


    // }elseif($category == "clothing"){

    //     $size   =  34;
    //     $gender =  "female";
    //     $maker  =  "nike";
    //     $type   =  "summer";

    //     $sql = "INSERT INTO Clothing (pid, size, gender, maker, type) VALUES (:pid, :size, :gender, :maker, :type)";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->execute(array(
    //         ":pid"   => $pid,                   
    //         ":size"  => $size,
    //         ":gender"=> $gender,
    //         ":maker" => $maker,
    //         ":type"  => $type  
    //      ));

    //      echo "<script type='text/javascript'>alert('CLOTHING INSERTED');</script>";

    // }elseif($category == "accessories"){

    //     $type  = "large";
    //     $brand = "adidas";

    //     $sql = "INSERT INTO Accessories (pid, type, brand) VALUES (:pid, :type, :brand)";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->execute(array(
    //         ":pid"   => $pid,                   
    //         ":type"  => $type,
    //         ":brand" => $brand 
    //      ));

    //      echo "<script type='text/javascript'>alert('ACCESSORIES INSERTED');</script>";

    // }

// // =============================SELECT ADDRESS BY USER ID AND ACC TYPE=================================================

//     $uid     = 0000001;
//     $accType = "buyer";
//     $sql = "SELECT * FROM Address WHERE uid=:uid AND accType=:accType";
//     $stmt = $conn->prepare($sql);

//     $stmt->execute(array(
//         ":uid"     => $uid     ,
//         ":accType" => $accType 
//     ));
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $rows = $stmt->fetchAll();
//     $count = count($rows);


//     if($count){
//         echo "<table style='border: solid 1px black;'>";
//         echo "<tr><th>AddressID</th><th>UserID</th> <th>accType</th><th>Country</th><th>City</th><th>Street</th></tr>";
//         foreach(new TableRows(new RecursiveArrayIterator($rows)) as $k=>$v) {
//              echo $v;
//         }
//         echo"</table>";
//         echo"<br /><br /><br />";
//     }

// ============================INSERT ADDRESS=====================================


    // $uid     = 0000001;
    // $accType = "buyer";
    // $country = "South Korea";
    // $city    = "Incheon"; 
    // $street  = "My Street";

    // $sql = "INSERT INTO Address (uid, accType, country, city, street) VALUES (:uid, :accType, :country, :city, :street)";
    // $stmt = $conn->prepare($sql);
    // $stmt->execute(array(
    //     ":uid"     => $uid     ,
    //     ":accType" => $accType ,
    //     ":country" => $country ,
    //     ":city"    => $city    , 
    //     ":street"  => $street  
    // ));

    // echo "<script type='text/javascript'>alert('ADDRESS INSERTED');</script>";


?>
<hr />
<a href="index.php"> Home Page<a>
</body>
</html>

