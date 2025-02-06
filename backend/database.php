<?php
//Declare our server settings
$db_server = "127.0.0.1";
$db_username = "root";
$db_password ="root";
$db_name = "modern_tech_solution_hr";
$port = 3306; 
$conn = "";
//PDO || MYSQL ||MYSQLi
try {
    //connect our database
    $conn =  mysqli_connect($db_server, $db_username, $db_password, $db_name, $port);
} catch (mysqli_sql_exception) {
    echo "Database is not connected <br>";
}

if ($conn) {
    echo "Database is connected<br>";
}



