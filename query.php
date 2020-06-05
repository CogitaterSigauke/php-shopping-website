<html>
<body>
<a href="index.php"> <h2>Home Page</h2></a>
<a href="budget.php"> <h2>Back to Budget Search</h2></a>

<div>
<h1>Systems Found</h1>
</div>
<?php
    require_once "render.php";
    require_once "pdo.php";

    INSERT INTO Address (uid, accType, country, street) VALUES (000001, "buyer", "South Korea",  "Incheon", "My Street");




    //  if(isset($_POST['budget']) && isset($_POST['speed'])){
          
    //       $sql = "SELECT PCs.model as pcModel, speed, 
    //       PCs.price as pcPrice, Printers.model as printerModel, color, 
    //       Printers.price as printerPrice FROM PCs, Printers 
    //       WHERE PCs.model IN 
    //            (SELECT model FROM PCs WHERE speed >= :speed)
    //       AND (CASE WHEN EXISTS (SELECT PCs.model FROM PCs, Printers 
    //                           WHERE (PCs.price + Printers.price) <= :budget
    //                           AND color=\"true\")
    //            THEN color=\"true\" 
    //            ELSE color=\"false\" END) 
    //       AND (PCs.price + Printers.price) <= :budget 
    //       ORDER BY (PCs.price + Printers.price) 
    //       LIMIT 1";
    //       $stmt = $conn->prepare($sql);
    //       $stmt->execute(array(":speed" => $_POST['speed'],
    //               ":budget" => $_POST['budget']
    //               ));

    //       $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //       $rows = $stmt->fetchAll();
    //       $count = count($rows);
          
    //       if($count){
    //            echo "<table style='border: solid 1px black;'>";
    //            echo "<tr><th>PC Model</th> <th>PC Speed</th> <th> PC Price</th> <th>Printer Model</th> <th>Printer Speed</th> <th>Printer Price</th></tr>";
    //            foreach(new TableRows(new RecursiveArrayIterator($rows)) as $k=>$v) {
    //                 echo $v;
    //            }
    //            echo"</table>";
    //            echo"<br /><br /><br />";
    //       }else{
    //            echo "<h3> No Sytem in your Budget Found </h3>";
        //   }
          
    //  }

?>
<hr />
<a href="index.php"> Home Page<a>
</body>
</html>

