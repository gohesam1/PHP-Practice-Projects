<?php
// Connecting to DB
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'login');

// Connection statement 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Checking the connection 
if ($conn==false){
    dir('ERROR: Can not connect to DB.');
} 

?>