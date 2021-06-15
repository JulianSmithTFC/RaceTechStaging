<?php
/**
 * Template Name: Home Page
 * Description: Used as a page template to show page contents, followed by a loop
 */
// Add our custom loop

add_filter( 'genesis_markup_site-inner', '__return_null' );
add_filter( 'genesis_markup_content-sidebar-wrap_output', '__return_false' );
add_filter( 'genesis_markup_content', '__return_null' );

add_action( 'genesis_loop', 'home_content' );

function home_content() {

//    Block One

    echo do_shortcode( get_field( 'slider_shortcode' ) );
    ?>

    <!--    Block Two  -->
    <?php if ( have_rows( 'block_one' ) ) : ?>
        <div class="container-fluid home-blockOne-container" align="center">
            <div class="container">
                <?php while ( have_rows( 'block_one' ) ) : the_row(); ?>
                    <h2 class="home-blockOne-header"><?php the_sub_field( 'heading' ); ?></h2>
                    <div class="home-blockOne-bodyText"><?php the_sub_field( 'body_text' ); ?></div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>


    <!--    Block Three -->
    <?php if ( have_rows( 'block_two' ) ) : ?>
        <div class="container-fluid home-blockTwo-container">
            <div class="row home-blockTwo-row display-flex justify-content-center">
                <?php
                $loopCount = 0;
                while ( have_rows( 'block_two' ) ) : the_row();
                if(($loopCount == 3) || ($loopCount == 6) || ($loopCount == 9) || ($loopCount == 12)) : ?>
            </div>
            <div class="row home-blockTwo-row display-flex justify-content-center">
                <?php endif; ?>
                <div class="col-lg-4 col-md-4 col-sm-12 home-blockTwo-containers">
                    <?php $link = get_sub_field( 'link' ); ?>
                    <?php if ( $link ) :

                    $url = $link['url'];
                    $string = "landing_pages";
                    if (strpos($url,$string) !== false) {
                        if (strpos($url,'?') !== false) {
                            $url = $url . '&cache_id=' . rand();
                        }else{
                            $url = $url . '?cache_id=' . rand();
                        }
                    }
                    
                    ?>
                    <a class="home-blockTwo-cardLink" href="<?php echo $url; ?>" target="<?php echo esc_attr( $link['target'] ); ?>">
                        <div class="home-blockTwo-innerContainers featured-fix hvr-grow z-depth-1-half" align="center" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('<?php echo the_sub_field( 'background_image' ); ?>'); background-position: <?php the_sub_field( 'background_position' ); ?>; background-size: cover !important;">
                            <div class="home-blockTwo-textContainer">
                                <h3 class="home-blockTwo-cardHeading">
                                    <?php echo esc_html( $link['title'] ); ?>
                                </h3>
                            </div>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
                <?php
                $loopCount++;
                endwhile; ?>
            </div>
        </div>
    <?php endif; ?>




    <!--    Block Four -->
    <?php if ( have_rows( 'block_three' ) ) : ?>
        <div class="container-fluid home-blockThree-container" align="center">
            <div class="container">
                <?php while ( have_rows( 'block_three' ) ) : the_row(); ?>
                    <h2 class="home-blockThree-header"><?php the_sub_field( 'heading' ); ?></h2>
                    <div class="home-blockThree-subheader"><?php the_sub_field( 'subheading' ); ?></div>
                    <div><?php the_sub_field( 'mailchimp_form' ); ?></div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>



    <!--    Block Five -->
    <?php if ( have_rows( 'block_four' ) ) : ?>
        <?php while ( have_rows( 'block_four' ) ) : the_row(); ?>
            <div class="container-fluid home-blockFour-container">
                <div class="container">
                    <div class="">
                        <?php $featured_product = get_sub_field( 'featured_product' ); ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="home-blockFour-containerLeft">
                                    <h2 class="home-blockFour-header">
                                        <a class="home-blockFour-link" href="<?php echo get_permalink( $featured_product ); ?>"><?php echo get_the_title( $featured_product ); ?></a>
                                    </h2>
                                    <div class="home-blockFour-description"><?php the_sub_field( 'product_description' ); ?></div>
                                    <a href="<?php echo get_permalink( $featured_product ); ?>">
                                        <button class="home-blockFour-button btn"><?php the_sub_field( 'button_text' ); ?></button>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="home-blockFour-containerRight">
                                    <?php if ( has_post_thumbnail($featured_product ) ) {
                                        $attachment_ids[0] = get_post_thumbnail_id( $featured_product );
                                        $attachment = wp_get_attachment_image_src($attachment_ids[0], 'full' ); ?>
                                        <img src="<?php echo $attachment[0] ; ?>" class="home-blockFour-image"  />
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>


<?php }
genesis();

