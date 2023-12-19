<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "electronics_e-commerce";

if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("".mysqli_connect_error());
}
?>