<?php

clearstatcache();

$servername = "localhost";
$username = "racetechtitanium_live";
$password = "kuRfec-bosnyb-worxe7";
$dbname = "racetechtitanium_live";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Drops the table if it exist
$conn->query('DROP TABLE IF EXISTS `rt_databaseSync`');

$conn->close();

//header("Refresh:0; url=https://racetechtitanium.com/test-page/");

header("Location: https://racetechtitanium.com/test-page/?tableStatus=dropped");