<?php
include('connection.php');
$record= $conn->prepare("SELECT * FROM products limit 8");
$record->execute();
$products= $record->get_result();
?>
