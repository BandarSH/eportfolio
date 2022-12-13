<?php

// WARNING: NEVER DO THIS IN PRODUCTION
$servername = "localhost";
$username = "root";
$password = "Cpit@405#1741385";
$database = "myDB";

$conn = new mysqli($servername, $username, $password, $database);

// check the connection
if ($conn->connect_error) {
    // exit and kill this process
    echo "Failed to connect to database!";
    die("Connection failed: ");
}

?>
