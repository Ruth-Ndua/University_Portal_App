<?php
// Database configuration settings
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'university_portal');

// Attempt to connect to the MySQL database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection status
if ($conn === false) {
    die("ERROR: Could not connect to the database. " . mysqli_connect_error());
}
?>