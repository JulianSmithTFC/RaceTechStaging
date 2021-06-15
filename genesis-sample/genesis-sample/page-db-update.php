<?php
/**
 * @package WordPress
 */
/*
 * Template Name: Database Update ToolKit
 */

//get_header(); ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

    <style>
        .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .button, input[type="submit"]{
            float: none;
        }
    </style>

<?php //if ( ! post_password_required( $post ) ) { ?>

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

//--------------------------use to get the category ids--------------------------

//foreach ($product_categories as $cat) {
//
//    $sql = "SELECT term_id FROM wp_term_taxonomy WHERE taxonomy='product_cat' AND parent='" . $cat . "'";
//    $result = $conn->query($sql);
//
//    if ($result->num_rows > 0) {
//        while($row = $result->fetch_assoc()) {
//            if (!in_array ($row["term_id"], $product_categories)){
//                $product_categories[] = $row["term_id"];
//            }
//        }
//    } else {
//        echo "0 results";
//    }
//
//
//}
//
//print_r($product_categories);



//------------------------ get the term names really quick--------------------------
    $product_categories_withMeta = array();

    foreach ($product_categories as $cat) {

        $sql = "SELECT * FROM wp_terms WHERE term_id='" . $cat . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $product_categories_withMeta[$cat] = array("name" => $row["name"], "slug" => $row["slug"]);
            }
        } else {
            echo "0 results";
        }
    }

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

        $sqlName = "SELECT post_title FROM wp_posts WHERE ID='" . $prodID . "'";
        $resultName = $conn->query($sqlName);


        if (($resultWeight->num_rows > 0) && ($resultLength->num_rows > 0) && ($resultWidth->num_rows > 0) && ($resultHeight->num_rows > 0) && ($resultSKU->num_rows > 0) && ($resultName->num_rows > 0)) {
            while(($rowWeight = $resultWeight->fetch_assoc()) && ($rowLength = $resultLength->fetch_assoc()) && ($rowWidth = $resultWidth->fetch_assoc()) && ($rowHeight = $resultHeight->fetch_assoc()) && ($rowSKU = $resultSKU->fetch_assoc()) && ($rowName = $resultName->fetch_assoc())) {
                $products_meta[] = array(
                    "id" => $prodID,
                    "sku" => $rowSKU["meta_value"],
                    "name" => $rowName["post_title"],
                    "shipping" => array(
                        "weight" => $rowWeight["meta_value"],
                        "length" => $rowLength["meta_value"],
                        "width" => $rowWidth["meta_value"],
                        "height" => $rowHeight["meta_value"]
                    ));
            }
        } else {
            //echo "0 results";
        }
    }

//print_r($products_meta);



    $conn->close();

    ?>

    <div class="container">

        <br/>
        <br/>

        <table id="table_id" class="display">
            <thead>
            <tr>
                <th>Product ID</th>
                <th>SKU</th>
                <th>Name</th>
                <th>Weight</th>
                <th>Length</th>
                <th>Width</th>
                <th>Height</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products_meta as $prod) { ?>
                <tr>
                    <td><?php echo $prod['id'] ?></td>
                    <td><?php echo $prod['sku'] ?></td>
                    <td><?php echo $prod['name'] ?></td>
                    <td><?php echo $prod['shipping']['weight'] ?></td>
                    <td><?php echo $prod['shipping']['length'] ?></td>
                    <td><?php echo $prod['shipping']['width'] ?></td>
                    <td><?php echo $prod['shipping']['height'] ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

<br/>
<br/>

    <div class="container">

        <div>This is for changing single products at a time:</div>
        <br/>
        <form action="<?php echo get_template_directory_uri() ?>/database-update-tools/db-singleChange.php" method="post">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="ID" id="singleID" name="singleID">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Weight" id="singleWeight" name="singleWeight">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="L" id="singleLength" name="singleLength">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="W" id="singleWidth" name="singleWidth">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="H" id="singleHeight" name="singleHeight">
                </div>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

<br/>
<br/>

    <div class="container">

        <div>This is for mass changing products at one time:</div>
        <br/>
        <form action="<?php echo get_template_directory_uri() ?>/database-update-tools/db-massChange.php" method="post">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Weight" id="massWeight" name="massWeight">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="L" id="massLength" name="massLength">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="W" id="massWidth" name="massWidth">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="H" id="massHeight" name="massHeight">
                </div>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


        <script>
            $(document).ready( function () {
                $('#table_id').DataTable();
            } );
        </script>

<?php //}else{ ?>
<!--    <br/>-->
<!--    <br/>-->
<!--    <div class="container" align="center">-->
<!--        --><?php //echo get_the_password_form(); ?>
<!--    </div>-->
<?php //} ?>

        <br/>
        <br/>

<?php //get_footer(); ?>