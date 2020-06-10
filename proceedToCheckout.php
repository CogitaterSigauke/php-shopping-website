<?php


require_once "render.php";
require_once "pdo.php";
session_start();


$buyerUserId = $_SESSION['login_bid'];

$sql = "SELECT Products.pid, Cart.quantity, percentageDiscount, price 
            FROM Products, Cart, Buyer 
            WHERE Buyer.bid=Cart.bid AND Products.pid=Cart.pid AND Buyer.bid=:bid";
$stmt = $conn->prepare($sql); 
$stmt->execute(array(
    ":bid" => $buyerUserId
));

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();

if(count($rows)){
    foreach ($rows as &$value) {
        $pid =  $value["pid"];
        $quantity = $value["quantity"];
        $num = $value["numProductsForDiscount"];
        $discount = $value["percentageDiscount"];
        $price =  $value["price"];
        $finalPriceAfterDiscount = $price;
        if($quantity >= $num){
            $finalPriceAfterDiscount = $value["price"] * (100 - $discount) / 100;
        } 

       

     $sql = "SELECT COUNT(*) FROM OrderTable";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $count = $row["COUNT(*)"];

        $orderId = $count + 1;
        $orderStatus = "placed";

     

        $sql = "INSERT INTO OrderTable(oid, price, quantity, status) VALUES (:oid, :price, :quantity, :status)";
        $stmt = $conn->prepare($sql);
      

        $stmt->execute(array(
            ":oid"   => $orderId,                       
            ":price" => $finalPriceAfterDiscount,
            ":quantity" => $quantity,               
            ":status"  => $orderStatus              
         ));
     
      

        $sql = "SELECT sid FROM HasProd Where pid=:pid";
        $stmt = $conn->prepare($sql);
       
        $stmt->execute(array(
            "pid" => $pid
        ));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $sid = $row["sid"];

        $sql = "INSERT INTO HasOrder(bid, oid) VALUES (:bid, :oid)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ":bid"  => $buyerUserId,
            ":oid"  => $orderId
         ));

        $sql = "INSERT INTO OrderOf(oid, pid) VALUES (:oid, :pid)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ":oid"  => $orderId,
            ":pid"  => $pid
         ));


        $sql = "INSERT INTO FromSeller(oid, sid) VALUES (:oid, :sid)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ":oid"  => $orderId,
            ":sid"  => $sid
         ));

        
        echo "<script type='text/javascript'>alert('FROM SELLER INSERTED');</script>";

        $sql = "SELECT Accounts.* FROM HasAcc, Accounts 
                    WHERE sid=:sid AND Accounts.aid=HasAcc.aid";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ":sid" => $sid
        ));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $aid = $row['aid'];
        $balance = $row['balance'];
        $newBalance = $balance + $finalPriceAfterDiscount;
        
        $sql = "UPDATE Accounts 
                    SET balance=:newBalance 
                    WHERE aid=:aid";
        $stmt = $conn->prepare($sql);

        $stmt->execute(array(
            ":newBalance" => $newBalance,           
            ":aid" => $aid
        ));
        
        $sql = "DELETE FROM Cart WHERE bid=:bid AND pid=:pid AND quantity=:quantity";
      
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ":bid" => $buyerUserId,           
            ":pid" => $pid,                
            ":quantity" => $quantity,
        ));

    }

    echo "<script type='text/javascript'>alert('ORDER SUCCESS');</script>";
    echo "<script>window.location.href='./getOrders.php';</script>";
    exit;

}
echo "<script type='text/javascript'>alert('NOTHING IN CART');</script>";
echo "<script>window.location.href='./getAllCategores.php';</script>";
exit;

?>