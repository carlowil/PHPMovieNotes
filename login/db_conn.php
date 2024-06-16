<?php

$host= "127.0.0.1";
$uname= "carlowil";
$password = "Dad2003dad!";
$port = "3306";
$db_name = "mylib";

$conn = mysqli_connect($host, $uname, $password, $db_name, $port);

if (!$conn) {
	echo "Connection failed!";
}

