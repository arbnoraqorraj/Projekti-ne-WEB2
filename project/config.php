<?php

$dbhost='localhost:3307';
$dbuser='root';
$dbpass='12345678';
$db='shop_db';

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db) 
or die ('Connection failed !');

?>