<?php
require_once("connect.php");
if (!isset($_SESSION['ID'])) {
    session_start();
}

$product_id = $_GET['id'];
echo $product_id;
echo "<br>";
echo $_SESSION['ID']

?>