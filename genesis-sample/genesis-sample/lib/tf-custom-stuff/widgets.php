<?php

class Menu_Main_Widget extends WP_Widget {


    public function __construct() {
        $widget_ops = array(
            'classname' => 'menu_main_widget',
            'description' => 'Main Menu Widget',
        );
        parent::__construct( 'menu_main_widget', 'Main Menu Widget', $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */

    public function widget( $args, $instance ) {



        echo '<h1>test this</h1>';

        echo do_shortcode('[do_cat_side_menu]');

    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
    }
}