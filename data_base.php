<?php

$db = "DATA_BASE_001";

$conn = mysql_connect('localhost','root',''); 
if (!$conn)  { die('Could not connect to MySQL: ' . mysql_error()); } 

$result = mysql_query("CREATE DATABASE IF NOT EXISTS $db");
if (!$result)  { die('Could not create new database: ' . mysql_error()); } 

$db = mysql_select_db("$db" , $conn);
if (!$db)  { die('Could not connect to database $db : ' . mysql_error()); } 


?>