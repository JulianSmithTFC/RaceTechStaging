<div class="container-fluid header-before-top-container">

    <div class="d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="header-before-top-navbar-div">
                    <span class="header-before-top-navbar">
                        <a class="header-before-top-navtext" href="mailto:<?php the_field( 'support_email', 'option' ); ?>">
                            <?php the_field( 'top_nav_message', 'option' ); ?>
                        </a>
                    </span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div>
                        <ul class="nav justify-content-end header-before-top-ul">
                            <li class="nav-item header-before-top-li">
                                <a class="nav-link header-before-top-link" href="<?php the_field( 'facebook_page_link', 'option' ); ?>"><i class="fab fa-facebook-f header-before-top-icon"></i></a>
                            </li>
                            <li class="nav-item header-before-top-li">
                                <a class="nav-link header-before-top-link" href="<?php the_field( 'instagram_page_link', 'option' ); ?>"><i class="fab fa-instagram header-before-top-icon"></i></a>
                            </li>
                            <li class="nav-item header-before-top-li">
                                <a class="nav-link header-before-top-link" href="<?php the_field( 'twitter_page_link', 'option' ); ?>"><i class="fab fa-twitter header-before-top-icon"></i></a>
                            </li>
                            <li class="nav-item header-before-top-li">
                                <div id="google-translate-regular-header-container">
                                    <div class="google-translate-container-widget google-translate-desktop">
                                        <?php echo do_shortcode( "[google-translator]" ); ?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<hr class="header-before-top-hrline"/>


<?php

//require_once (get_stylesheet_directory() . '/lib/tf-custom-stuff/main-menu.php');

$menuObj = new RTMenuclass();
$parentArray = $menuObj->getMainMenu();

?>


<div class="container-fluid my-header-navbar-container" style="position: relative;">

    <!--    =====================  Desktop Header  ===============================   -->
    <div class="container d-none d-lg-block">
        <div class="" style="position: relative;">
            <div class="row" style="position: relative;">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="container-fluid my-header-container">
                        <div class="container">
                            <div class="my-header-logoContainer">
                                <?php $logo = get_field( 'logo', 'option' ); ?>
                                <?php if ( $logo ) : ?>
                                    <a class="my-header-logoLink" href="<?php echo get_home_url(); ?>">
                                        <img class="my-header-logo" src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" />
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="container-fluid header-before-container">
                        <div class="row">
                            <div class="col-lg-5 col-md-12 col-sm-12">
                                <?php echo do_shortcode( '[woocommerce_product_search]' ); ?>
                            </div>
                            <div class="col-lg-7 col-md-12 col-sm-12">
                                <ul class="nav justify-content-end header-before-ul">
                                    <li class="nav-item header-before-li" onclick="contactUsPopup()">
                                        <a class="nav-link text-uppercase header-before-links" href="#"><i class="fas fa-phone"></i></a>
                                    </li>
                                    <li class="nav-item header-before-li">
                                        <a class="nav-link text-uppercase header-before-links" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><i class="fas fa-user header-before-icons"></i></a>
                                    </li>
                                    <li class="nav-item header-before-li" onclick="cartPopup()">
                                        <a class="nav-link text-uppercase header-before-links" href="#"><i class="fas fa-shopping-cart header-before-icons"></i></a>
                                    </li>
                                </ul>
                                <div class="container-fluid" align="right">
                                    <div id="contactUsPopupContainer" class="d-none " align="left">
                                        <h3><?php the_field( 'contact_us_header', 'option' ); ?></h3>
                                        <p><i class="fas fa-phone"></i>  <a href="tel:<?php the_field( 'phone_number', 'option' ); ?>"><?php the_field( 'phone_number', 'option' ); ?></a></p>
                                        <p><i class="fas fa-envelope-open"></i>  <a href="mailto:<?php the_field( 'email_address', 'option' ); ?>"><?php the_field( 'email_address', 'option' ); ?></a></p>
                                    </div>
                                </div>
                                <div class="container-fluid" align="right">
                                    <div id="cartPopupContainer" class="d-none " align="left">
                                        <h3><?php the_field( 'cart_header', 'option' ); ?></h3>
                                        <p>Total Products: <?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></p>
                                        <p>Total Cost: <?php echo WC()->cart->get_cart_total(); ?></p>
                                        <a href="<?php echo wc_get_cart_url(); ?>">
                                            <button ><i class="fas fa-shopping-cart"></i> View Cart</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>



        <?php if (!empty($parentArray)){ ?>
            <div align="center" style="text-align: center">
                <ul class="nav justify-content-center my-header-navbar">
                    <?php foreach ($parentArray as $item){ ?>
                        <?php if (!empty($item['secondLevel'])){ ?>
                            <li id="dropdown-link-<?php echo $item['ID'] ?>" class="nav-item my-header-navbar-li dropdown-link-<?php echo $item['ID'] ?>">
                                <?php if($item['object'] == 'product_cat'){ ?>
                                    <a class="nav-link text-uppercase my-header-navbar-links" href="<?php echo get_category_link( (int)$item['object_id'] ); ?>"><?php echo get_term( (int)$item['object_id'] )->name; ?></a>
                                <?php }elseif ($item['object'] == 'custom'){ ?>
                                    <a class="nav-link text-uppercase my-header-navbar-links" href="<?php echo $item['url']; ?>"><?php echo $item['name']; ?></a>
                                <?php } ?>
                            </li>
                        <?php }else{ ?>
                            <li class="nav-item my-header-navbar-li">
                                <?php if($item['object'] == 'product_cat'){ ?>
                                    <a class="nav-link text-uppercase my-header-navbar-links" href="<?php echo get_category_link( (int)$item['object_id'] ); ?>"><?php echo get_term( (int)$item['object_id'] )->name; ?></a>
                                <?php }elseif ($item['object'] == 'custom'){ ?>
                                    <a class="nav-link text-uppercase my-header-navbar-links"  href="<?php echo $item['url']; ?>"><?php echo $item['name']; ?></a>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    <?php }?>
                </ul>
            </div>
        <?php } ?>
    </div>


    <div class="container-fluid my-header-megamenu-container">
        <div class="my-header-megamenu-containerInner">
            <?php foreach ($parentArray as $item){ ?>
                <?php if(!empty($item['secondLevel'])){ ?>
                    <div id="dropdown-container-<?php echo $item['ID'] ?>" class="d-none dropdown-container">
                        <div class="container ">
                            <div align="center">
                                <h5 class="sub-title text-uppercase my-header-megamenu-header">
                                    <?php if($item['object'] == 'product_cat'){ ?>
                                        <a class="nav-link text-uppercase my-header-megamenu-headerLinks" href="<?php echo get_category_link( (int)$item['object_id'] ); ?>"><?php echo get_term( (int)$item['object_id'] )->name; ?></a>
                                    <?php }elseif ($item['object'] == 'custom'){ ?>
                                        <a class="nav-link text-uppercase my-header-megamenu-headerLinks" href="<?php echo $item['url']; ?>"><?php echo $item['name']; ?></a>
                                    <?php } ?>
                                </h5>
                            </div>
                            <div class="row">
                                <?php foreach ($item['secondLevel'] as $subParent) { ?>
                                    <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4 my-header-megamenu-containers">
                                        <?php if($subParent['object'] == 'product_cat'){ ?>
                                            <h6 class="sub-title text-uppercase my-header-megamenu-subheaders">
                                                <a class="my-header-megamenu-subheadersLinks" href="<?php echo get_category_link( (int)$subParent['object_id'] ); ?>"><?php echo get_term( (int)$subParent['object_id'] )->name; ?></a>
                                            </h6>
                                        <?php }elseif ($subParent['object'] == 'custom'){ ?>
                                            <h6 class="sub-title text-uppercase my-header-megamenu-subheaders">
                                                <a class="my-header-megamenu-subheadersLinks" href="<?php echo $subParent['url']; ?>"><?php echo $subParent['name']; ?></a>
                                            </h6>
                                        <?php } ?>
                                        <?php if(!empty($subParent['thirdLevel'])){ ?>
                                            <hr class="my-header-megamenu-hrlines"/>
                                            <ul class="list-unstyled my-header-megamenu-ul">
                                                <?php foreach ($subParent['thirdLevel'] as $childItem) { ?>
                                                    <?php if($childItem['object'] == 'product_cat'){ ?>
                                                        <li class="my-header-megamenu-li">
                                                            <a class="menu-item pl-0 my-header-megamenu-links" href="<?php echo get_category_link( (int)$childItem['object_id'] ); ?>">
                                                                <?php echo get_term( (int)$childItem['object_id'] )->name; ?>
                                                            </a>
                                                        </li>
                                                    <?php }elseif ($childItem['object'] == 'custom'){ ?>
                                                        <li class="my-header-megamenu-li">
                                                            <a class="menu-item pl-0 my-header-megamenu-links" href="<?php echo $childItem['url']; ?>">
                                                                <?php echo $childItem['name']; ?>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>

    <!--   ========================================   Mobile Header  ===============================================   -->
    <div class="container-fluid d-lg-none my-headerMobile-container">

        <div class="row">
            <div class="col-3">
                <div class="my-headerMobile-containerLeft">

                </div>
            </div>
            <div class="col-6">
                <div class="my-headerMobile-containerMiddle" align="center">
                    <?php $logo = get_field( 'logo', 'option' ); ?>
                    <?php if ( $logo ) : ?>
                        <a class="my-headerMobile-logoLink" href="<?php echo get_home_url(); ?>">
                            <img class="my-headerMobile-logo" src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" />
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-3">
                <div class="my-headerMobile-containerRight" align="center">
                    <?php if (!empty($parentArray)){ ?>
                        <a class="btn my-headerMobile-hamDropdownLink" style="color: #fff !important;" type="button" onclick="mobileMenuToggle(this)" data-toggle="collapse" href="#ham-menu-container-dropdown" role="button" aria-expanded="false" aria-controls="ham-menu-container-dropdown">
                            <i class="fas fa-bars fa-2x my-headerMobile-hamDropdownIcon"></i>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="" align="center">
            <?php echo do_shortcode( '[woocommerce_product_search]' ); ?>
            <br/>
        </div>

        <div class="collapse my-headerMobile-dropdown-container" id="ham-menu-container-dropdown">

            <ul class="nav justify-content-center my-headerMobile-dropdown-top-ul">
                <li class="nav-item my-headerMobile-dropdown-top-li">
                    <div id="google-translate-mobile-header-container">

                    </div>
                </li>
                <li class="nav-item my-headerMobile-dropdown-top-li">
                    <a class="nav-link text-uppercase my-headerMobile-dropdown-top-links" href="<?php the_field( 'contact_page_link', 'option' ); ?>"><i class="fas fa-phone my-headerMobile-dropdown-top-icons"></i></a>
                </li>
                <li class="nav-item my-headerMobile-dropdown-top-li">
                    <a class="nav-link text-uppercase my-headerMobile-dropdown-top-links" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><i class="fas fa-user my-headerMobile-dropdown-top-icons"></i></a>
                </li>
                <li class="nav-item my-headerMobile-dropdown-top-li">
                    <a class="nav-link text-uppercase my-headerMobile-dropdown-top-links" href="<?php echo wc_get_cart_url(); ?>" tabindex="-1" aria-disabled="true"><i class="fas fa-shopping-cart my-headerMobile-dropdown-top-icons"></i></a>
                </li>
            </ul>


            <?php if (!empty($parentArray)){ ?>

                <?php
                require('main/first-menu.php');
                ?>

            <?php } ?>

            <hr class="my-headerMobile-dropdown-hrlines"/>

            <a class="my-headerMobile-dropdown-supportText" href="mailto:<?php the_field( 'support_email', 'option' ); ?>">
                <?php the_field( 'top_nav_message', 'option' ); ?>
            </a>

            <hr class="my-headerMobile-dropdown-hrlines"/>

            <ul class="nav justify-content-center my-headerMobile-dropdown-social-ul">
                <li class="nav-item my-headerMobile-dropdown-social-li">
                    <a class="nav-link my-headerMobile-dropdown-social-links" href="<?php the_field( 'facebook_page_link', 'option' ); ?>"><i class="fab fa-facebook-f my-headerMobile-dropdown-social-icons"></i></a>
                </li>
                <li class="nav-item my-headerMobile-dropdown-social-li">
                    <a class="nav-link my-headerMobile-dropdown-social-links" href="<?php the_field( 'instagram_page_link', 'option' ); ?>"><i class="fab fa-instagram my-headerMobile-dropdown-social-icons"></i></a>
                </li>
                <li class="nav-item my-headerMobile-dropdown-social-li">
                    <a class="nav-link my-headerMobile-dropdown-social-links" href="<?php the_field( 'twitter_page_link', 'option' ); ?>"><i class="fab fa-twitter my-headerMobile-dropdown-social-icons"></i></a>
                </li>
            </ul>


        </div>

    </div>

</div>


<script>
    <?php if (!empty($parentArray)){ ?>
    <?php foreach ($parentArray as $item){ ?>

    $( "#dropdown-link-<?php echo $item['ID'] ?>" ).hover(
        function() {
            $( "#dropdown-container-<?php echo $item['ID'] ?>" ).removeClass( "d-none" );
        }, function() {
            $( "#dropdown-container-<?php echo $item['ID'] ?>" ).addClass( "d-none" );
        }
    );

    $( "#dropdown-container-<?php echo $item['ID'] ?>" ).hover(
        function() {
            $( "#dropdown-container-<?php echo $item['ID'] ?>" ).removeClass( "d-none" );
        }, function() {
            $( "#dropdown-container-<?php echo $item['ID'] ?>" ).addClass( "d-none" );
        }
    );

    <?php } ?>
    <?php } ?>

    function contactUsPopup() {
        $( "#cartPopupContainer" ).removeClass( "d-none" ).addClass( "d-none" );
        $( "#contactUsPopupContainer" ).toggleClass( "d-none" );
    }
    function cartPopup() {
        $( "#contactUsPopupContainer" ).removeClass( "d-none" ).addClass( "d-none" );
        $( "#cartPopupContainer" ).toggleClass( "d-none" );
    }

    function mobileMenuToggle(toggleButton){
        $(toggleButton).find('i').toggleClass('fa-bars fa-times');
    }

    // function subcatIconChange(toggleButton){
    //     $(toggleButton).find('i').toggleClass('fa-angle-right fa-angle-down');
    // }

</script>