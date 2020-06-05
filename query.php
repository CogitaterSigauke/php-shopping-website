<html>
<body>

<?php
    require_once "render.php";
    require_once "pdo.php";



// ============================INSERT ADDRESS=====================================


    $uid     = 0000001;
    $accType = "buyer";
    $country = "South Korea";
    $city    = "Incheon"; 
    $street  = "My Street";

    $sql = "INSERT INTO Address (uid, accType, country, city, street) VALUES (:uid, :accType, :country, :city, :street)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        ":uid"     => $uid     ,
        ":accType" => $accType ,
        ":country" => $country ,
        ":city"    => $city    , 
        ":street"  => $street  
    ));

    echo "<script type='text/javascript'>alert('ADDRESS INSERTED');</script>";

?>
<hr />
<a href="index.php"> Home Page<a>
</body>
</html>

