<php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST['act'])&& $_POST['act'] == 'login'){


            $sql = "SELECT COUNT(*) FROM Orders";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            print_r($row);
            $count = $row["COUNT(*)"];
            echo $count;

            $uname = "cogi";
            $pid = 101;
            $quantity = 50;
            $finalPriceAfterDiscount = 100;
            $orderId = $count + 1;
            $orderStatus = "orderPlaced";

            $sql = "INSERT INTO OrderTable(oid, price, quantity, status) VALUES (:oid, :price, :quantity, :status)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array(
                ":oid"   => $oid,   
                ":price" => $finalPriceAfterDiscount,
                ":quantity" => $quantity,
                ":status"  => $orderStatus 
            ));

            echo "<script type='text/javascript'>alert('ORDER PLACED ');</script>";

            $sql = "SELECT bid FROM Buyers Where uname=:uname";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $bid = $row["bid"];

            $sql = "SELECT sid FROM HasProd Where pid=:pid";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $sid = $row["sid"];


            $sql = "INSERT INTO HasOrder(bid, oid) VALUES (:bid, :oid)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array(
                ":bid"  => $bid,
                ":oid"  => $oid
            ));

            echo "<script type='text/javascript'>alert('HAS ORDER INSERTED');</script>";

            $sql = "INSERT INTO OrderOf(oid, pid) VALUES (:oid, :pid)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array(
                ":oid"  => $oid,
                ":pid"  => $pid
            ));
            
            echo "<script type='text/javascript'>alert('ORDEROF INSERTED');</script>";
        
            $sql = "INSERT INTO FromSeller(oid, sid) VALUES (:oid, :sid)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array(
                ":oid"  => $oid,
                ":sid"  => $sid
            ));
            
            echo "<script type='text/javascript'>alert('FROM SELLER INSERTED');</script>";
        
        }
    }
?>