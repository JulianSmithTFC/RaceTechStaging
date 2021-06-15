<?php
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


$sqlWeight = "UPDATE wp_postmeta SET meta_value='" . $_POST['singleWeight'] . "' WHERE post_id='" . $_POST['singleID'] . "' AND meta_key='_weight'";
$resultWeight = $conn->query($sqlWeight);
$sqlLength = "UPDATE wp_postmeta SET meta_value='" . $_POST['singleLength'] . "'  WHERE post_id='" . $_POST['singleID'] . "' AND meta_key='_length'";
$resultLength = $conn->query($sqlLength);
$sqlWidth = "UPDATE wp_postmeta SET meta_value='" . $_POST['singleWidth'] . "'  WHERE post_id='" . $_POST['singleID'] . "' AND meta_key='_width'";
$resultWidth = $conn->query($sqlWidth);
$sqlHeight = "UPDATE wp_postmeta SET meta_value='" . $_POST['singleHeight'] . "'  WHERE post_id='" . $_POST['singleID'] . "' AND meta_key='_height'";
$resultHeight = $conn->query($sqlHeight);

$conn->close();

header('Location: https://racetechtitanium.com/database-update-toolkit/');