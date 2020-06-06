<html>
<head></head>
<?php


try {
    $conn = new PDO('mysql:host=localhost;dbname=rcdb', 'grader', 'allowme');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    }
catch(PDOException $e)
    {
        echo "Connection ++++++++++++ failed: " . $e->getMessage();
    echo "Connection failed: " . $e->getMessage();
    }
?>
</html>