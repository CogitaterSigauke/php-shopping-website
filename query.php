<html>
<body>

<?php
    require_once "render.php";
    require_once "pdo.php";


//  ======================GET ALL PRODUCTS ORDERED FROM SELLER BY ORDER STATUS =======================
// $sellerUserName = "HP3";
// $orderStatus = "shipped"; //{shipped | cancelled | delivered | orderPlaced }

// $sql = "SELECT Products.pid, price, description, image, Products.name, percentageDiscount, numProductsForDiscount 
//             FROM Products, Seller, Order, FromSeller 
//             WHERE Seller.sid=FromSeller.sid AND Products.pid=Order.pid 
//                 AND FromSeller.oid=Order.oid AND Order.status=:status
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
//                 FROM Products, Seller, Order, FromSeller 
//                 WHERE Seller.sid=FromSeller.sid AND Products.pid=Order.pid 
//                     AND FromSeller.oid=Order.oid AND Seller.uname=:uname";                
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

// =========================GET ALL PRODUCTS=======================================    

    $sql = "SELECT * FROM Products";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();

// ========================VIEW PRODUCTS====================================

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

