<?php


require_once "render.php";
require_once "pdo.php";
session_start();

echo "bid", $_SESSION['login_bid'];

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

        echo "<br/>bid =$bid pid = $pid : quantity = $quantity finalPrice = $finalPriceAfterDiscount originalPrice = $price";



     $sql = "SELECT COUNT(*) FROM OrderTable";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        print_r($row);
        $count = $row["COUNT(*)"];
        echo $count;

        // $uname = "abeni";
        // $pid = ;
        // $quantity = 50;
        // $bid = $;
        // $finalPriceAfterDiscount = 100;
        $orderId = $count + 1;
        $orderStatus = "placed";

        // echo "<br/> HERE";

        $sql = "INSERT INTO OrderTable(oid, price, quantity, status) VALUES (:oid, :price, :quantity, :status)";
        $stmt = $conn->prepare($sql);
        // echo "<br/> HERE";
        // echo "<br/> oid $orderId";
        // echo "<br/> price $finalPriceAfterDiscount";
        // echo "<br/> quantity $quantity";         
        // echo "<br/> status $orderStatus"; 


        $stmt->execute(array(
            ":oid"   => $orderId,                       
            ":price" => $finalPriceAfterDiscount,
            ":quantity" => $quantity,               
            ":status"  => $orderStatus              
         ));
     
        // echo "<script type='text/javascript'>alert('ORDER PLACED ');</script>";

        // $sql = "SELECT bid FROM Buyers Where uname=:bid";
        // $stmt = $conn->prepare($sql);
        // $stmt->execute(array(
        //     ":bid"
        // ));
        // $row = $stmt->fetch(PDO::FETCH_ASSOC);
        

        $sql = "SELECT sid FROM HasProd Where pid=:pid";
        $stmt = $conn->prepare($sql);
        echo "<br/ AFTER HAS PRODUCT>";
        $stmt->execute(array(
            "pid" => $pid
        ));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $sid = $row["sid"];

        // echo "<br/ AFTER HAS PRODUCT SID $sid";

        $sql = "INSERT INTO HasOrder(bid, oid) VALUES (:bid, :oid)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ":bid"  => $buyerUserId,
            ":oid"  => $orderId
         ));

        //  echo "<script type='text/javascript'>alert('HAS ORDER INSERTED');</script>";

        $sql = "INSERT INTO OrderOf(oid, pid) VALUES (:oid, :pid)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ":oid"  => $orderId,
            ":pid"  => $pid
         ));

        // echo "<script type='text/javascript'>alert('ORDEROF INSERTED');</script>";
     
        $sql = "INSERT INTO FromSeller(oid, sid) VALUES (:oid, :sid)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ":oid"  => $orderId,
            ":sid"  => $sid
         ));

        // echo "<script type='text/javascript'>alert('FROM SELLER INSERTED');</script>";
     

        $sql = "DELETE FROM Cart WHERE bid=:bid AND pid=:pid AND quantity=:quantity";
        echo "<br/> HERE";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ":bid" => $buyerUserId,           
            ":pid" => $pid,                
            ":quantity" => $quantity,
        ));
        // echo ":bid => $buyerUserId";           
        // echo ":pid => $pid";                
        // echo ":quantity => $quantity";
        // echo "<br/> THERE";
        // echo "<script type='text/javascript'>alert('PRODUCT DELETED FROM CART');</script>";

    }

 
    echo "<script>window.location.href='./myCart.php';</script>";
    exit;

}
echo "<script type='text/javascript'>alert('FNOTHING IN CART');</script>";
echo "<script>window.location.href='./getAllCategores.php';</script>";
exit;

?>