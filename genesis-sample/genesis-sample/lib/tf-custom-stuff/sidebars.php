<?php

genesis_register_sidebar( array(
    'id'          => 'secondary-sidebar-cat',
    'name'        => 'Secondary Sidebar Cat',
    'description' => 'This is the secondary sidebar',
) );

function secondary_sidebar_cat() { ?>
    <div class="d-none d-lg-block">
        <?php dynamic_sidebar( 'secondary-sidebar-cat' ); ?>



    </div>
<?php
}

genesis_register_sidebar( array(
    'id'          => 'secondary-sidebar-main',
    'name'        => 'Secondary Sidebar Main',
    'description' => 'This is the secondary sidebar',
) );

function secondary_sidebar_main() { ?>
    <div class="d-none d-lg-block">
        <?php dynamic_sidebar( 'secondary-sidebar-main' ); ?>

        <?php

        echo do_shortcode('[do_cat_side_menu]');

        ?>


    </div>
    <?php
}
