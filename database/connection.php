<?php
$servername = "localhost";
$username = "root";
$password = "";
$my_db  = "haetest";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$my_db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>