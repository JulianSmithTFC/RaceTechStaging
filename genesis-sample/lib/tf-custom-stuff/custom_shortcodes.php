<?php

function cat_side_menu(){

    if(is_product_category()){
        $term_id = get_queried_object()->term_id;
        $term_group = get_queried_object()->taxonomy;

        $ancestor_cats = get_ancestors( $term_id, $term_group );

        $menuObj = new RTMenuclass();
        $menu_id = $menuObj->getMenuID(array(0 => $term_id));
        $parentArray = $menuObj->getCatMenuArray($menu_id);

    }elseif (is_product()){
        $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );

        $ancestor_cats = get_ancestors( $product_cats[0]->term_id, 'product_cat');

        $productTermIds = array();
        foreach ($product_cats as $product){
            array_push($productTermIds, $product->term_id);
        }

        $menuObj = new RTMenuclass();
        $menu_id = $menuObj->getMenuID($productTermIds);
        $parentArray = $menuObj->getCatMenuArray($menu_id);
    }

    if (!empty($parentArray)){
        echo '<div style="margin-left: 30px">';
        require (get_stylesheet_directory() . '/lib/tf-custom-stuff/headers/cat/first-menu.php');
        echo '</div>';
    }
}

add_shortcode('do_cat_side_menu', 'cat_side_menu');