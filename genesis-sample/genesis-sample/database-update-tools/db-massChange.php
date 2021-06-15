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

$product_categories = array(
    0 => 2988,
    1 => 816,
    2 => 887,
    3 => 3018,
    4 => 817,
    5 => 818,
    6 => 882,
    7 => 888,
    8 => 889,
    9 => 1228,
    10 => 1273,
    11 => 1390,
    12 => 1451,
    13 => 819,
    14 => 890,
    15 => 891,
    16 => 820,
    17 => 821,
    18 => 822,
    19 => 823,
    20 => 880,
    21 => 881,
    22 => 2498,
    23 => 2499,
    24 => 1421,
    25 => 1422,
    26 => 3163,
    27 => 3164,
    28 => 1413,
    29 => 1414,
    30 => 827,
    31 => 828,
    32 => 829,
    33 => 837,
    34 => 1434,
    35 => 3341,
    36 => 831,
    37 => 832,
    38 => 868,
    39 => 915,
    40 => 1435,
    41 => 3342,
    42 => 824,
    43 => 825,
    44 => 917,
    45 => 1381,
    46 => 826,
    47 => 918,
    48 => 919,
    49 => 1382,
    50 => 3165,
    51 => 846,
    52 => 847,
    53 => 851,
    54 => 902,
    55 => 906,
    56 => 1446,
    57 => 3084,
    58 => 883,
    59 => 884,
    60 => 885,
    61 => 886,
    62 => 1431,
    63 => 1432,
    64 => 1433,
    65 => 1441,
    66 => 1442,
    67 => 838,
    68 => 839,
    69 => 920,
    70 => 921,
    71 => 1393,
    72 => 1436,
    73 => 1437,
    74 => 1438,
    75 => 1439,
    76 => 1457,
    77 => 1458,
    78 => 922,
    79 => 923,
    80 => 924,
    81 => 1449,
    82 => 1450,
    83 => 1459,
    84 => 869,
    85 => 870,
    86 => 871,
    87 => 872,
    88 => 873,
    89 => 1227,
    90 => 916,
    91 => 925,
    92 => 1402,
    93 => 1445,
    94 => 1819,
    95 => 3343,
    96 => 3344,
    97 => 3345,
    98 => 3166,
    99 => 3167,
    100 => 3168
);

//--------------------------------Get the Post related to the categories--------------------------
$product_ids = array();

foreach ($product_categories as $cat) {

    $sql = "SELECT * FROM wp_term_relationships WHERE term_taxonomy_id='" . $cat . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $product_ids[] = $row["object_id"];
        }
    } else {
        //echo "0 results";
    }

    //print_r($product_ids);
}


//---------------------------Update Product Deminsions With Post ID-------------------------------
$products_meta = array();


foreach ($product_ids as $prodID) {

    $sqlWeight = "UPDATE wp_postmeta SET meta_value='" . $_POST['massWeight'] . "' WHERE post_id='" . $prodID . "' AND meta_key='_weight'";
    $resultWeight = $conn->query($sqlWeight);
    $sqlLength = "UPDATE wp_postmeta SET meta_value='" . $_POST['massLength'] . "'  WHERE post_id='" . $prodID . "' AND meta_key='_length'";
    $resultLength = $conn->query($sqlLength);
    $sqlWidth = "UPDATE wp_postmeta SET meta_value='" . $_POST['massWidth'] . "'  WHERE post_id='" . $prodID . "' AND meta_key='_width'";
    $resultWidth = $conn->query($sqlWidth);
    $sqlHeight = "UPDATE wp_postmeta SET meta_value='" . $_POST['massHeight'] . "'  WHERE post_id='" . $prodID . "' AND meta_key='_height'";
    $resultHeight = $conn->query($sqlHeight);

}


$conn->close();


header('Location: https://racetechtitanium.com/database-update-toolkit/');