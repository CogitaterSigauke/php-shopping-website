<?php


require_once "render.php";
require_once "pdo.php";
session_start();

echo "bid", $_SESSION['login_bid'];

$buyerUserId = $_SESSION['login_bid'];



$sql = "DELETE FROM Cart WHERE bid=:bid";
$stmt = $conn->prepare($sql);
$stmt->execute(array(
    ":bid" => $buyerUserId
));

echo "<script type='text/javascript'>alert('Cart Empty');</script>";
echo "<script>window.location.href='./getAllCategores.php';</script>";
exit;


?>