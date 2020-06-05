<?php

$dbServername = "localhost";
$dbUsername = "grader";

$dbPassword = "allowme";

$dbName = "rcdb";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
// $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/* print server version */
printf("Server version: %s\n", mysqli_get_server_info($conn));

/* close connection */
// mysqli_close($conn);


?>

<!--  -->
