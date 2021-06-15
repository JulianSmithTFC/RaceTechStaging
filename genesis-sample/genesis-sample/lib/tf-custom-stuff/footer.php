

<div class="container-fluid my-footer-container">
    <div class="container">
        <div class="row" align="left">

            <?php if ( have_rows( 'footer_widget_area_left', 'option' ) ) : ?>
                <?php while ( have_rows( 'footer_widget_area_left', 'option' ) ) : the_row(); ?>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="my-footer-areaLeft-container">
                            <?php $footer_logo = get_sub_field( 'footer_logo' ); ?>
                            <?php if ( $footer_logo ) : ?>
                                <a class="" href="<?php echo get_home_url(); ?>">
                                    <img class="my-footer-areaLeft-logo" src="<?php echo esc_url( $footer_logo['url'] ); ?>" alt="<?php echo esc_attr( $footer_logo['alt'] ); ?>" />
                                </a>
                            <?php endif; ?>
                            <div class="my-footer-areaLeft-bodyText"><?php the_sub_field( 'short_about_text' ); ?></div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

            <div class="col-lg-1 col-md-1 col-sm-12">

            </div>

            <?php if ( have_rows( 'footer_widget_area_center', 'option' ) ) : ?>
                <?php while ( have_rows( 'footer_widget_area_center', 'option' ) ) : the_row(); ?>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="my-footer-areaCenter-container">
                            <h4 class="my-footer-areaCenter-header"><?php the_sub_field( 'header' ); ?></h4>
                            <div class="">
                                <ul class="nav flex-column my-footer-areaCenter-ul">
                                    <?php
                                    $menuID = 4;
                                    $menuNav = wp_get_nav_menu_items($menuID);
                                    foreach ($menuNav as $item) {
                                        if ($item->menu_item_parent == 0) { ?>
                                            <li class="nav-item my-footer-areaCenter-li">
                                                <a class="nav-link my-footer-areaCenter-link" href="<?php echo $item->url ?>"><?php echo $item->title ?></a>
                                            </li>
                                        <?php }
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php if ( have_rows( 'footer_widget_area_right', 'option' ) ) : ?>
                <?php while ( have_rows( 'footer_widget_area_right', 'option' ) ) : the_row(); ?>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="my-footer-areaRight-container">
                            <h4 class="my-footer-areaRight-header"><?php the_sub_field( 'header' ); ?></h4>
                            <div class="my-footer-areaRight-subheader"><?php the_sub_field( 'subheader' ); ?></div>
                            <div align="left"><?php the_sub_field( 'mailchimp_form' ); ?></div>
                            <ul class="nav my-footer-areaRight-ul">
                                <li class="nav-item my-footer-areaRight-li">
                                    <a class="nav-link my-footer-areaRight-link" href="<?php the_field( 'facebook_page_link', 'option' ); ?>"><i class="fab fa-facebook-f my-footer-areaRight-icons"></i></a>
                                </li>
                                <li class="nav-item my-footer-areaRight-li">
                                    <a class="nav-link my-footer-areaRight-link" href="<?php the_field( 'instagram_page_link', 'option' ); ?>"><i class="fab fa-instagram my-footer-areaRight-icons"></i></a>
                                </li>
                                <li class="nav-item my-footer-areaRight-li">
                                    <a class="nav-link my-footer-areaRight-link" href="<?php the_field( 'twitter_page_link', 'option' ); ?>"><i class="fab fa-twitter my-footer-areaRight-icons"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</div>

<div class="container-fluid my-footer-credits-container" align="center">
    <div class="container">
        <ul class="nav justify-content-center my-footer-credits-ul">
            <li class="nav-item my-footer-credits-li">
                <i class="fab fa-cc-mastercard my-footer-credits-icons"></i>
            </li>
            <li class="nav-item my-footer-credits-li">
                <i class="fab fa-cc-visa my-footer-credits-icons"></i>
            </li>
            <li class="nav-item my-footer-credits-li">
                <i class="fab fa-cc-paypal my-footer-credits-icons"></i>
            </li>
            <li class="nav-item my-footer-credits-li">
                <i class="fab fa-cc-discover my-footer-credits-icons"></i>
            </li>
            <li class="nav-item my-footer-credits-li">
                <i class="fab fa-cc-amex my-footer-credits-icons"></i>
            </li>
        </ul>

        <p class="my-footer-credits-copyrightText"><i class="far fa-copyright my-footer-credits-copyrightIcon"></i> <?php echo date("Y"); ?> RaceTech Titanium | All Rights Reserved</p>
<!--        <p class="my-footer-credits-creditText">Website by <a href="https://techfusionconsulting.com/" class="my-footer-credits-link">Tech Fusion LLC</a></p>-->

    </div>
</div>