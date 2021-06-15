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


$changeCount = 0;
$perChangeCount = 0;
$numLoops = 0;
$productsChangeCount = 0;

$sql = "SELECT * FROM rt_databaseSync";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $proxyDBSync[] = array(
            "id" => $row["prodID"],
            "sku" => $row["p_sku"],
            "stock" => $row["p_stock"],
            "shipping" => array(
                "weight" => $row["p_weight"],
                "length" => $row["p_length"],
                "width" => $row["p_width"],
                "height" => $row["p_height"]
        ));
    }


    foreach ($proxyDBSync as $proxyKey){

        $prodID = $proxyKey['id'];

        $sqlWeight = "SELECT meta_value FROM wp_postmeta WHERE post_id='" . $prodID . "' AND meta_key='_weight'";
        $resultWeight = $conn->query($sqlWeight);

        if ($resultWeight->num_rows > 0) {
            while ($rowWeight = $resultWeight->fetch_assoc()) {
                if(isset($proxyKey["shipping"]["weight"])){
                    if ($proxyKey['shipping']["weight"] != $rowWeight['meta_value']){
                        $changeCount++;
                        $sqlWeightChange = "UPDATE wp_postmeta SET meta_value='" . $proxyKey["shipping"]["weight"] . "' WHERE post_id='" . $prodID . "' AND meta_key='_weight'";
                        $resultWeightChange = $conn->query($sqlWeightChange);
                    }
                }
            }
        }

        $sqlLength = "SELECT meta_value FROM wp_postmeta WHERE post_id='" . $prodID . "' AND meta_key='_length'";
        $resultLength = $conn->query($sqlLength);

        if ($resultLength->num_rows > 0) {
            while ($rowLength = $resultLength->fetch_assoc()) {
                if(isset($proxyKey["shipping"]["length"])){
                    if ($proxyKey["shipping"]["length"] != $rowLength["meta_value"]){
                        $changeCount++;
                        $sqlLengthChange = "UPDATE wp_postmeta SET meta_value='" . $proxyKey["shipping"]["length"] . "' WHERE post_id='" . $prodID . "' AND meta_key='_length'";
                        $resultLengthChange = $conn->query($sqlLengthChange);
                    }
                }
            }
        }

        $sqlWidth = "SELECT meta_value FROM wp_postmeta WHERE post_id='" . $prodID . "' AND meta_key='_width'";
        $resultWidth = $conn->query($sqlWidth);

        if ($resultWidth->num_rows > 0) {
            while ($rowWidth = $resultWidth->fetch_assoc()) {
                if(isset($proxyKey["shipping"]["width"])){
                    if ($proxyKey["shipping"]["width"] != $rowWidth["meta_value"]){
                        $changeCount++;
                        $sqlWidthChange = "UPDATE wp_postmeta SET meta_value='" . $proxyKey["shipping"]["width"] . "' WHERE post_id='" . $prodID . "' AND meta_key='_width'";
                        $resultWidthChange = $conn->query($sqlWidthChange);
                    }
                }
            }
        }

        $sqlHeight = "SELECT meta_value FROM wp_postmeta WHERE post_id='" . $prodID . "' AND meta_key='_height'";
        $resultHeight = $conn->query($sqlHeight);

        if ($resultHeight->num_rows > 0) {
            while ($rowHeight = $resultHeight->fetch_assoc()) {
                if(isset($proxyKey["shipping"]["height"])){
                    if ($proxyKey["shipping"]["height"] != $rowHeight["meta_value"]){
                        $changeCount++;
                        $sqlHeightChange = "UPDATE wp_postmeta SET meta_value='" . $proxyKey["shipping"]["height"] . "' WHERE post_id='" . $prodID . "' AND meta_key='_height'";
                        $resultHeightChange = $conn->query($sqlHeightChange);
                    }
                }
            }
        }

        $sqlSKU = "SELECT meta_value FROM wp_postmeta WHERE post_id='" . $prodID . "' AND meta_key='_sku'";
        $resultSKU = $conn->query($sqlSKU);

        if ($resultSKU->num_rows > 0) {
            while ($rowSKU = $resultSKU->fetch_assoc()) {
                if(isset($proxyKey["sku"])){
                    if ($proxyKey["sku"] != $rowSKU["meta_value"]){
                        $changeCount++;
                        $sqlSKUChange = "UPDATE wp_postmeta SET meta_value='" . $proxyKey["sku"] . "' WHERE post_id='" . $prodID . "' AND meta_key='_sku'";
                        $resultSKUChange = $conn->query($sqlSKUChange);
                    }
                }
            }
        }

        $sqlStock = "SELECT meta_value FROM wp_postmeta WHERE post_id='" . $prodID . "' AND meta_key='_stock'";
        $resultStock = $conn->query($sqlStock);

        if ($resultStock->num_rows > 0) {
            while ($rowStock = $resultStock->fetch_assoc()) {
                if(isset($proxyKey["stock"])){
                    if ($proxyKey["stock"] != $rowStock["meta_value"]){
                        $changeCount++;
                        $sqlStockChange = "UPDATE wp_postmeta SET meta_value='" . $proxyKey["stock"] . "' WHERE post_id='" . $prodID . "' AND meta_key='_stock'";
                        $resultStockChange = $conn->query($sqlStockChange);
                    }
                }
            }
        }
        $numLoops++;

        if (($perChangeCount != $changeCount) && ($numLoops != 1)){
            $productsChangeCount++;
        }

        $perChangeCount = $changeCount;
        if(($numLoops == 1) && ($changeCount > 0)){
            $productsChangeCount++;
        }

    }

}


$conn->close();

header("Location: https://racetechtitanium.com/test-page/?changeCount=" . $productsChangeCount);

?>