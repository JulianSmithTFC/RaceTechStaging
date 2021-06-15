<?php

if (is_singular( 'landing_pages' )){
    if (get_field( 'menu_id' )) {
        $menu_id = get_field('menu_id');
        require_once get_stylesheet_directory() . '/lib/tf-custom-stuff/headers/header-cat.php';
    }else{
        require_once get_stylesheet_directory() . '/lib/tf-custom-stuff/headers/header-main.php';
    }
}elseif (is_product_category()) {

    $term_id = get_queried_object()->term_id;
    $term_group = get_queried_object()->taxonomy;


    $ancestor_cats = get_ancestors( $term_id, $term_group );

    $menuObj = new RTMenuclass();
    $termRelationship = $menuObj->getMenuID(array(0 => $term_id));

    if($termRelationship != false){
        $menu_id = $termRelationship;
        require_once get_stylesheet_directory() . '/lib/tf-custom-stuff/headers/header-cat.php';
    }else{
        require_once get_stylesheet_directory() . '/lib/tf-custom-stuff/headers/header-main.php';
    }

}elseif(is_product()){

    $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );

    $ancestor_cats = get_ancestors( $product_cats[0]->term_id, 'product_cat');

    $productTermIds = array();
    foreach ($product_cats as $product){
        array_push($productTermIds, $product->term_id);
    }

    $post_categories = get_post_primary_category( get_the_ID(), 'product_cat');
    $primary_category = $post_categories['primary_category'];
    $primaryTermID = $primary_category->term_id;

    $menuObj = new RTMenuclass();
    $termRelationship = $menuObj->getMenuIDWithPrimary($productTermIds, $primaryTermID);

    if($termRelationship != false){
        $menu_id = $termRelationship;
        require_once get_stylesheet_directory() . '/lib/tf-custom-stuff/headers/header-cat.php';
    }else{
        require_once get_stylesheet_directory() . '/lib/tf-custom-stuff/headers/header-main.php';
    }

}else{
    require_once get_stylesheet_directory() . '/lib/tf-custom-stuff/headers/header-main.php';
}

?>
