<?php

/**
 * @package WordPress
 */
/*
 * Template Name: NEW Database Update ToolKit
 */

get_header(); ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/moment-2.18.1/dt-1.10.21/b-1.6.2/sl-1.3.1/datatables.min.css">

<!--<link rel="stylesheet" type="text/css" href="--><?php //echo get_stylesheet_directory_uri() ?><!--/DataTablesEditor/css/generator-base.css">-->
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/DataTablesEditor/css/editor.dataTables.min.css">

<style>
    ul {
        list-style-type: none;
    }
    li {
        padding-left: 20px !important;
    }

    .dt-button{
        color: #000000 !important;
    }

</style>

    <style>
        .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .button, input[type="submit"]{
            float: none;
        }
    </style>


<?php if ( ! post_password_required( $post ) ) { ?>


    <?php if (isset($_GET['changeCount'])){
        $productsChangeCount = $_GET['changeCount']; ?>
        <script>
            alert("You have change <?php echo $productsChangeCount ?> products");
            window.history.replaceState({}, document.title, "/" + "test-page/");
        </script>
    <?php } ?>


    <?php if (isset($_GET['tableStatus'])){
        $tableStatus = $_GET['tableStatus'];

        if ($tableStatus ==  "dropped"){ ?>
            <script>
                alert("You have successfully dropped the table");
                window.history.replaceState({}, document.title, "/" + "test-page/");
            </script>
        <?php }
        if ($tableStatus == "synced"){ ?>
            <script>
                alert("You have successfully synced the products");
                window.history.replaceState({}, document.title, "/" + "test-page/");
            </script>
        <?php } ?>
    <?php } ?>



<br/>
<br/>
<div class="container">


    <?php

    $taxonomy     = 'product_cat';
    $orderby      = 'name';
    $show_count   = 0;
    $pad_counts   = 0;
    $hierarchical = 1;
    $title        = '';
    $empty        = 0;

    $args = array(
        'taxonomy'     => $taxonomy,
        'orderby'      => $orderby,
        'show_count'   => $show_count,
        'pad_counts'   => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li'     => $title,
        'hide_empty'   => $empty
    );

    $all_categories = get_categories( $args );

    function printCat($catNum){
        echo '<input type="checkbox" class="cats" name="categories[]" id="cat-'. $catNum->slug .'" value="'. $catNum->term_id .'" />';
        echo '<label for="cat-'. $catNum->slug .'">' . $catNum->name . ' '.apply_filters( 'woocommerce_subcategory_count_html', ' (' . $catNum->count . ')', $catNum->term_id ) .'</label>';
    }

    function catArgsArray($catNum){
        $taxonomy     = 'product_cat';
        $orderby      = 'name';
        $show_count   = 0;
        $pad_counts   = 0;
        $hierarchical = 1;
        $title        = '';
        $empty        = 0;

        $argsArray = array(
            'taxonomy' => $taxonomy,
            'parent' => $catNum->term_id,
            'orderby' => $orderby,
            'show_count' => $show_count,
            'pad_counts' => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li' => $title,
            'hide_empty' => $empty
        );

        return $argsArray;
    }

    ?>

    <a href="<?php echo get_stylesheet_directory_uri() ?>/database-update-tools/db-drop.php?sessionCount=<?php echo mt_rand(0,10000); ?>">
        <button type="button" class="btn btn-primary">Drop Table</button>
    </a>

    <a href="<?php echo get_stylesheet_directory_uri() ?>/database-update-tools/db-sync.php?sessionCount=<?php echo mt_rand(0,10000); ?>">
        <button type="button" class="btn btn-primary">Sync Products</button>
    </a>

    <br/>
    <br/>

    <?php

    echo '<ul class="checktree">';

    echo '<li>';
    echo '<input type="checkbox" id="cat-all" />';
    echo '<label for="cat-all">All Categories</label>';
    echo '<ul>';

    $clapseNavID = 0;

    foreach ($all_categories as $cat) {
        if($cat->category_parent == 0) {

            $catNum = $cat;
            $sub_cats = get_categories(catArgsArray($catNum));

            if ($sub_cats){
                echo '<li> <i class="fas fa-angle-right fa-lg" data-toggle="collapse" data-target="#collapse-'. $clapseNavID .'" aria-expanded="false" aria-controls="collapse-'. $clapseNavID .'"></i> ';
            }else{
                echo '<li>';
            }

            printCat($catNum);


            if($sub_cats) {
                echo '<ul class="collapse" id="collapse-'. $clapseNavID .'">';

                $clapseNavID++;

                foreach($sub_cats as $sub_category) {

                    $catNum = $sub_category;
                    $sub_cats2 = get_categories(catArgsArray($catNum));

                    if ($sub_cats2){
                        echo '<li> <i class="fas fa-angle-right fa-lg" data-toggle="collapse" data-target="#collapse-'. $clapseNavID .'" aria-expanded="false" aria-controls="collapse-'. $clapseNavID .'"></i> ';
                    }else{
                        echo '<li>';
                    }

                    printCat($catNum);

                    if($sub_cats2) {

                        echo '<ul class="collapse" id="collapse-'. $clapseNavID .'">';

                        $clapseNavID++;

                        foreach($sub_cats2 as $sub_category2) {

                            $catNum = $sub_category2;
                            $sub_cats3 = get_categories(catArgsArray($catNum));

                            if ($sub_cats3){
                                echo '<li> <i class="fas fa-angle-right fa-lg" data-toggle="collapse" data-target="#collapse-'. $clapseNavID .'" aria-expanded="false" aria-controls="collapse-'. $clapseNavID .'"></i> ';
                            }else{
                                echo '<li>';
                            }

                            printCat($catNum);

                            if($sub_cats3) {
                                echo '<ul class="collapse" id="collapse-'. $clapseNavID .'">';

                                $clapseNavID++;

                                foreach($sub_cats3 as $sub_category3) {

                                    $catNum = $sub_category3;
                                    $sub_cats4 = get_categories(catArgsArray($catNum));

                                    if ($sub_cats4){
                                        echo '<li> <i class="fas fa-angle-right fa-lg" data-toggle="collapse" data-target="#collapse-'. $clapseNavID .'" aria-expanded="false" aria-controls="collapse-'. $clapseNavID .'"></i> ';
                                    }else{
                                        echo '<li>';
                                    }

                                    printCat($catNum);

                                    if($sub_cats4) {

                                        echo '<ul class="collapse" id="collapse-'. $clapseNavID .'">';

                                        $clapseNavID++;

                                        foreach($sub_cats4 as $sub_category4) {

                                            $catNum = $sub_category4;
                                            $sub_cats5 = get_categories(catArgsArray($catNum));

                                            if ($sub_cats5){
                                                echo '<li> <i class="fas fa-angle-right fa-lg" data-toggle="collapse" data-target="#collapse-'. $clapseNavID .'" aria-expanded="false" aria-controls="collapse-'. $clapseNavID .'"></i> ';
                                            }else{
                                                echo '<li>';
                                            }

                                            printCat($catNum);

                                            if($sub_cats5) {

                                                echo '<ul class="collapse" id="collapse-'. $clapseNavID .'">';

                                                $clapseNavID++;

                                                foreach($sub_cats5 as $sub_category5) {

                                                    $catNum = $sub_category5;
                                                    $sub_cats6 = get_categories(catArgsArray($catNum));

                                                    if ($sub_cats6){
                                                        echo '<li> <i class="fas fa-angle-right fa-lg" data-toggle="collapse" data-target="#collapse-'. $clapseNavID .'" aria-expanded="false" aria-controls="collapse-'. $clapseNavID .'"></i> ';
                                                    }else{
                                                        echo '<li>';
                                                    }

                                                    printCat($catNum);

                                                    if($sub_cats6) {

                                                        echo '<ul class="collapse" id="collapse-'. $clapseNavID .'">';

                                                        $clapseNavID++;

                                                        foreach($sub_cats6 as $sub_category6) {

                                                            $catNum = $sub_category6;
                                                            $sub_cats7 = get_categories(catArgsArray($catNum));

                                                            if ($sub_cats7){
                                                                echo '<li> <i class="fas fa-angle-right fa-lg" data-toggle="collapse" data-target="#collapse-'. $clapseNavID .'" aria-expanded="false" aria-controls="collapse-'. $clapseNavID .'"></i> ';
                                                            }else{
                                                                echo '<li>';
                                                            }

                                                            printCat($catNum);

                                                            if($sub_cats7) {

                                                                echo '<ul class="collapse" id="collapse-'. $clapseNavID .'">';

                                                                $clapseNavID++;

                                                                foreach ($sub_cats7 as $sub_category7) {

                                                                    $catNum = $sub_category7;
                                                                    $sub_cats8 = get_categories(catArgsArray($catNum));

                                                                    if ($sub_cats8){
                                                                        echo '<li> <i class="fas fa-angle-right fa-lg" data-toggle="collapse" data-target="#collapse-'. $clapseNavID .'" aria-expanded="false" aria-controls="collapse-'. $clapseNavID .'"></i> ';
                                                                    }else{
                                                                        echo '<li>';
                                                                    }

                                                                    printCat($catNum);

                                                                    if($sub_cats8) {

                                                                        echo '<ul class="collapse" id="collapse-'. $clapseNavID .'">';

                                                                        $clapseNavID++;

                                                                        foreach ($sub_cats8 as $sub_category8) {
                                                                            $catNum = $sub_category8;
                                                                            printCat($catNum);
                                                                            echo '</li>';
                                                                        }
                                                                        echo '</ul>';
                                                                    }
                                                                    echo '</li>';
                                                                }
                                                                echo '</ul>';
                                                            }
                                                            echo '</li>';
                                                        }
                                                        echo '</ul>';
                                                    }
                                                    echo '</li>';
                                                }
                                                echo '</ul>';
                                            }
                                            echo '</li>';
                                        }
                                        echo '</ul>';
                                    }
                                    echo '</li>';
                                }
                                echo '</ul>';
                            }
                            echo '</li>';
                        }
                        echo '</ul>';
                    }
                    echo '</li>';
                    $clapseNavID++;
                }
                echo '</ul>';
            }
            echo '</li>';
        }
        $clapseNavID++;
    }

    echo '</ul>';
    echo '</li>';
    echo '</ul>';

    ?>
    <br/>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/9a44acfcc2.js" crossorigin="anonymous"></script>

<script>

    $.fn.checktree = function(){
        $(':checkbox').on('click', function (event){
            event.stopPropagation();
            var clk_checkbox = $(this),
                chk_state = clk_checkbox.is(':checked'),
                parent_li = clk_checkbox.closest('li'),
                parent_uls = parent_li.parents('ul');
            parent_li.find(':checkbox').prop('checked', chk_state);
            parent_uls.each(function(){
                parent_ul = $(this);
                parent_state = (parent_ul.find(':checkbox').length == parent_ul.find(':checked').length);
                parent_ul.siblings(':checkbox').prop('checked', parent_state);
            });
        });
    };

    $("ul.checktree").checktree();

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/v/dt/jqc-1.12.4/moment-2.18.1/dt-1.10.21/b-1.6.2/sl-1.3.1/datatables.min.js"></script>

<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

<script type="text/javascript" charset="utf-8" src="<?php echo get_stylesheet_directory_uri() ?>/DataTablesEditor/js/dataTables.editor.min.js"></script>




<?php
$products_meta = array();
?>

<div class="container">

    <br/>
    <br/>


    <table cellpadding="0" cellspacing="0" border="0" class="display" id="rt_databaseSync" width="100%">
        <thead>
        <tr>
            <th></th>
            <th>ProdID</th>
            <th>SKU</th>
            <th>Name</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Weight</th>
            <th>Length</th>
            <th>Width</th>
            <th>Height</th>
        </tr>
        </thead>
        <!--        <tfoot>-->
        <!--        <tr>-->
        <!--            <th></th>-->
        <!--            <th>ProdID</th>-->
        <!--            <th>SKU</th>-->
        <!--            <th>Name</th>-->
        <!--            <th>Category</th>-->
        <!--            <th>Stock</th>-->
        <!--            <th>Weight</th>-->
        <!--            <th>Length</th>-->
        <!--            <th>Width</th>-->
        <!--            <th>Height</th>s-->
        <!--        </tr>-->
        <!--        </tfoot>-->
    </table>


    <br/>
    <br/>

    <a href="<?php echo get_stylesheet_directory_uri() ?>/database-update-tools/db-syncDB.php?sessionCount=<?php echo mt_rand(0,10000); ?>">
        <button type="button" class="btn btn-primary">Save Changes</button>
    </a>
    <br/>
    <br/>
</div>


<script>
    (function($){

        $(document).ready(function() {
            var editor = new $.fn.dataTable.Editor( {
                ajax: '<?php echo get_stylesheet_directory_uri() ?>/DataTablesEditor/php/table.rt_databaseSync.php',
                table: '#rt_databaseSync',
                fields: [
                    {
                        "label": "prodID:",
                        "name": "prodID"
                    },
                    {
                        "label": "SKU:",
                        "name": "p_sku"
                    },
                    {
                        "label": "Name:",
                        "name": "p_name"
                    },
                    {
                        "label": "Cats:",
                        "name": "p_category"
                    },
                    {
                        "label": "Stock:",
                        "name": "p_stock"
                    },
                    {
                        "label": "Weight:",
                        "name": "p_weight"
                    },
                    {
                        "label": "Length:",
                        "name": "p_length"
                    },
                    {
                        "label": "Width:",
                        "name": "p_width"
                    },
                    {
                        "label": "Height:",
                        "name": "p_height"
                    }
                ]
            } );

            // // Setup - add a text input to each footer cell
            // $('#rt_databaseSync tfoot th').each( function () {
            // 	var title = $(this).text();
            // 	$(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            // } );

            // function ExcludeSearch(term, column) {
            // 	//apply search plugin
            // 	$.fn.dataTable.ext.search.push(
            // 		function(settings, data, dataIndex) {
            // 			//if column data != to search term then return true to display
            // 			if (data[column] != term){
            // 				return true;
            // 			}
            // 			//otherwise return false to filter from display
            // 			return false;
            // 		}
            // 	);
            // 	//draw table based on search
            // 	table.draw();
            // 	//remove search plugin
            // 	$.fn.dataTable.ext.search.pop();
            // }

            var table = $('#rt_databaseSync').DataTable( {
                dom: 'Bfrtip',
                ajax: '<?php echo get_stylesheet_directory_uri() ?>/DataTablesEditor/php/table.rt_databaseSync.php',
                columns: [
                    {
                        data: null,
                        defaultContent: '',
                        className: 'select-checkbox',
                        orderable: false
                    },
                    {
                        "data": "prodid"
                    },
                    {
                        "data": "p_sku"
                    },
                    {
                        "data": "p_name"
                    },
                    {
                        "data": "p_category"
                    },
                    {
                        "data": "p_stock"
                    },
                    {
                        "data": "p_weight"
                    },
                    {
                        "data": "p_length"
                    },
                    {
                        "data": "p_width"
                    },
                    {
                        "data": "p_height"
                    }
                ],
                select: {
                    style:    'os',
                    selector: 'td:first-child',
                    blurable: true
                },
                lengthChange: false,
                buttons: [
                    {
                        text: 'Apply Categorys',
                        action: function () {
                            var checkBoxArray = [];

                            $('input.cats:checkbox:checked').each(function () {
                                checkBoxArray.push($(this).val());

                                return checkBoxArray;
                            });

                            var checkBoxString = checkBoxArray.toString();

                            var checkBoxStringFixed = checkBoxString.replace(/,/g, "|");

                            var table = $('#rt_databaseSync').DataTable();
                            table.column(4, { search: 'applied' }).search(checkBoxStringFixed, true, false).draw();
                        }
                    },
                    {
                        text: 'Single Products /',
                        action: function () {

                            $.fn.dataTable.ext.search.pop();

                            $.fn.dataTable.ext.search.push(
                                function( settings, data, dataIndex ) {
                                    var includesValue = data[2].includes("/");
                                    if ((includesValue == true) && (data[2].length >= 18)){
                                        return false;
                                    }else{
                                        return true;
                                    }
                                }
                            );
                            var table = $('#rt_databaseSync').DataTable();
                            table.draw();


                            // ExcludeSearch("/", "2");
                            // var table = $('#rt_databaseSync').DataTable();
                            //
                            // var filteredData = table
                            // 	.column( 2, { search: 'applied' } )
                            // 	.data()
                            // 	.filter( function ( value, index ) {
                            // 		var includesValue = value.includes("/");
                            //         if ((includesValue == true) && (value.length >= 18)){
                            //             return false;
                            //         }else{
                            //             return true;
                            //         }
                            // 	} );
                            //
                            // var filteredArray = [];
                            //
                            // for (var filterKey in filteredData){
                            //     filteredArray.push(Object.values(filteredData));
                            // }
                            // // var filteredDataString = filteredData.toString();
                            // // var filteredDataStringFixed = filteredDataString.replace(/,/g, "|");
                            // table.column(2).search(filteredArray.join("|"), true, false, true).draw();
                            // console.log(filteredArray);
                        }
                    },
                    {
                        text: 'Single Products (1)',
                        action: function () {
                            var table = $('#rt_databaseSync').DataTable();
                            table.column(2, { search: 'applied' }).search('(1)').draw();
                        }
                    },
                    {
                        text: 'Kit Products',
                        action: function () {

                            $.fn.dataTable.ext.search.pop();

                            $.fn.dataTable.ext.search.push(
                                function( settings, data, dataIndex ) {
                                    var includesValue = data[2].includes("/");
                                    if ((includesValue == true) && (data[2].length >= 18)){
                                        return true;
                                    }else{
                                        return false;
                                    }
                                }
                            );

                            var table = $('#rt_databaseSync').DataTable();
                            table.draw();

                        }
                    },
                    {
                        text: 'Clear Filters',
                        action: function () {

                            var table = $('#rt_databaseSync').DataTable();

                            $.fn.dataTable.ext.search.pop();

                            table
                                .search( '' )
                                .columns().search( '' )
                                .draw();

                            $('#rt_databaseSync').dataTable().fnDraw();

                        }
                    },
                    {
                        text: 'Select All Items',
                        action: function () {
                            table.rows( { search: 'applied' } ).select();
                        }
                    },
                    'selectNone',
                    { extend: 'edit',   editor: editor }
                ],
                language: {
                    buttons: {
                        selectNone: "Select none"
                    }
                }
                // initComplete: function () {
                // 	// Apply the search
                // 	this.api().columns([1, 2, 4]).every( function () {
                // 		var that = this;
                //
                // 		$( 'input', this.footer() ).on( 'keyup change clear', function () {
                // 			if ( that.search() !== this.value ) {
                // 				that
                // 					.search( this.value )
                // 					.draw();
                // 			}
                // 		} );
                // 	} );
                // }
            } );
        } );

    }(jQuery));


</script>

<?php }else{ ?>
    <br/>
    <br/>
    <div class="container" align="center">
        <?php echo get_the_password_form(); ?>
    </div>
<?php } ?>

    <br/>
    <br/>

<?php get_footer(); ?>