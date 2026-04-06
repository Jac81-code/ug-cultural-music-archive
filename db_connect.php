<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ug_cultural_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Note: If the connection is successful, this page will be blank.
?>