<html>
<head></head>
<body>
<a href="index.php"> Home Page</a>
</br>
</br>
<a href="manufacturer.php"> Back to Search</a>

<div>
<h1>View Products</h1>
</div>
<?php
    require_once "render.php";
    require_once "pdo.php";
    if(isset($_POST['maker'])){
        // echo "<h1>POST REQUEST!!</h1>";
        $sql = "SELECT Products.model, maker, Products.type as productType, 
            color, Printers.type as printerType , price FROM Printers, Products 
            WHERE Printers.model=Products.model AND Products.maker=:maker";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(":maker" => $_POST['maker']));
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();
        $count = count($rows);
        // echo "<h1>count: $count</h1>";
        // print_r($rows);
        $total = $count;
        
        if($count){
            echo "<table style='border: solid 1px black;'>";
            echo "<tr><th>Model</th> <th>Maker</th><th>Product Type</th>
                <th>Color</th> <th>Printer Type</th> <th>Price</th></tr>";
            foreach(new TableRows(new RecursiveArrayIterator($rows)) as $k=>$v) {
                 echo $v;
            }
            echo"</table>";
            echo"<br /><br /><br />";
       }
        
        $sql = "SELECT Products.model, maker, type, speed, ram, hd, price 
            FROM PCs, Products WHERE PCs.model=Products.model AND Products.maker=:maker";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(":maker" => $_POST['maker']));
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();
        
        $count = count($rows);
        // echo "<h1>count: $count</h1>";
        // print_r($rows);
        $total = $total + $count;
        if($count){
            echo "<table style='border: solid 1px black;'>";
            echo "<tr><th>Model</th> <th>Maker</th><th>Product Type</th>
                <th>Speed</th><th>RAM</th><th>Hard Disk</th><th>Price</th></tr>";
            foreach(new TableRows(new RecursiveArrayIterator($rows)) as $k=>$v) {
                 echo $v;
            }
            echo"</table>";
            echo"<br /><br /><br />";
        }

        $sql = "SELECT Products.model, maker, type, speed, ram, hd, price, weight 
        FROM Laptops, Products WHERE Laptops.model=Products.model 
        AND Products.maker=:maker";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(":maker" => $_POST['maker']));
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();
            
        $count = count($rows);
        $total = $total + $count;
        // echo "<h1>count: $count</h1>";
        // print_r($rows);
        
        
        if($count){
            
            echo "<table style='border: solid 1px black;'>";
            echo "<tr><th>Model</th> <th>Maker</th><th>Product Type</th>
                <th>Speed</th><th>RAM</th><th>Hard Disk</th><th>Price</th><th>Weight</th></tr>";
            foreach(new TableRows(new RecursiveArrayIterator($rows)) as $k=>$v) {
                 echo $v;
            }
            echo"</table>";
            echo"<br /><br /><br />";
        }
        
        if(!$total){
            echo "<h3><em>NO RESULT FOUND</em></h3>";
        }else{
            echo "<h2><em>total results: $total</em></h2>";
        }
    }
?>
<hr />
<a href="index.php"> Home Page</a>
</body>
</html>