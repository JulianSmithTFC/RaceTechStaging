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

//Drops the table if it exist
$conn->query('DROP TABLE IF EXISTS `rt_databaseSync`');


//Creates the table and makes the structure
$sqlCreateTable = "CREATE TABLE rt_databaseSync (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
prodID INT(6),
p_sku longtext NOT NULL,
p_name longtext NOT NULL,
p_weight longtext NOT NULL,
p_length longtext NOT NULL,
p_width longtext NOT NULL,
p_height longtext NOT NULL,
p_category varchar(500) NOT NULL,
p_stock longtext NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$conn->query($sqlCreateTable);

//--------------------------------Get the Post related to the categories--------------------------
$product_ids = array();

$sql = "SELECT * FROM wp_posts WHERE post_type='product' AND (post_status='publish' OR  post_status='inherit')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $product_ids[] = $row["ID"];
    }
}

//---------------------------Get Product Deminsions With Post ID-------------------------------
$products_meta = array();

foreach ($product_ids as $prodID) {

    $sqlWeight = "SELECT meta_value FROM wp_postmeta WHERE post_id='" . $prodID . "' AND meta_key='_weight'";
    $resultWeight = $conn->query($sqlWeight);
    $sqlLength = "SELECT meta_value FROM wp_postmeta WHERE post_id='" . $prodID . "' AND meta_key='_length'";
    $resultLength = $conn->query($sqlLength);
    $sqlWidth = "SELECT meta_value FROM wp_postmeta WHERE post_id='" . $prodID . "' AND meta_key='_width'";
    $resultWidth = $conn->query($sqlWidth);
    $sqlHeight = "SELECT meta_value FROM wp_postmeta WHERE post_id='" . $prodID . "' AND meta_key='_height'";
    $resultHeight = $conn->query($sqlHeight);

    $sqlSKU = "SELECT meta_value FROM wp_postmeta WHERE post_id='" . $prodID . "' AND meta_key='_sku'";
    $resultSKU = $conn->query($sqlSKU);

    $sqlStock = "SELECT meta_value FROM wp_postmeta WHERE post_id='" . $prodID . "' AND meta_key='_stock'";
    $resultStock = $conn->query($sqlStock);

    $sqlName = "SELECT post_title FROM wp_posts WHERE ID='" . $prodID . "'";
    $resultName = $conn->query($sqlName);

    $sqlTermRel = "SELECT term_taxonomy_id FROM wp_term_relationships WHERE object_id='" . $prodID . "'";
    $resultTermRel = $conn->query($sqlTermRel);

    $product_termRel = array();
    $product_terms = array();

    if ($resultTermRel->num_rows > 0) {
        while ($rowTermRel = $resultTermRel->fetch_assoc()) {
            $product_termRel[] = $rowTermRel["term_taxonomy_id"];
        }
        foreach ($product_termRel as $termRel){

            $sqlTerm = "SELECT term_id FROM wp_term_taxonomy WHERE term_id='" . $termRel . "' AND taxonomy='product_cat'";
            $resultTerm = $conn->query($sqlTerm);

            if ($resultTerm->num_rows > 0) {
                while ($rowTerm = $resultTerm->fetch_assoc()) {
                    $product_terms[] = $rowTerm["term_id"];
                }
            }

        }
    }


    if (($resultWeight->num_rows > 0) && ($resultLength->num_rows > 0) && ($resultWidth->num_rows > 0) && ($resultHeight->num_rows > 0) && ($resultSKU->num_rows > 0) && ($resultStock->num_rows > 0) && ($resultName->num_rows > 0)) {
        while(($rowWeight = $resultWeight->fetch_assoc()) && ($rowLength = $resultLength->fetch_assoc()) && ($rowWidth = $resultWidth->fetch_assoc()) && ($rowHeight = $resultHeight->fetch_assoc()) && ($rowSKU = $resultSKU->fetch_assoc()) && ($rowStock = $resultStock->fetch_assoc()) && ($rowName = $resultName->fetch_assoc())) {
            $products_meta[] = array(
                "id" => $prodID,
                "sku" => $rowSKU["meta_value"],
                "cats" => implode(", ", $product_terms),
                "stock" => $rowStock["meta_value"],
                "name" => $rowName["post_title"],
                "shipping" => array(
                    "weight" => $rowWeight["meta_value"],
                    "length" => $rowLength["meta_value"],
                    "width" => $rowWidth["meta_value"],
                    "height" => $rowHeight["meta_value"]
                ));
        }
    }
}


sleep ( 4 );

//print_r($products_meta);

foreach ($products_meta as $products){
    $id = $products['id'];
    $sku = $products['sku'];
    $name = $products['name'];
    $weight = $products['shipping']['weight'];
    $length = $products['shipping']['length'];
    $width = $products['shipping']['width'];
    $height = $products['shipping']['height'];
    $cats = $products['cats'];
    $stock = $products['stock'];
    $sqlProducts = "INSERT INTO rt_databaseSync (prodID, p_sku, p_name, p_weight, p_length, p_width, p_height, p_category, p_stock) VALUES ('" . $id . "', '" . $sku . "', '" . $name . "', '" . $weight . "', '" . $length . "', '" . $width . "', '" . $height . "', '" . $cats . "', '" . $stock . "')";
    $conn->query($sqlProducts);
}

//print_r($products_meta);


$conn->close();

//header("Refresh:0; url=https://racetechtitanium.com/test-page/");

header("Location: https://racetechtitanium.com/test-page/?tableStatus=synced");

?>