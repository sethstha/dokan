<?php
/**
 *
 * Social Widget 
 * @author: Sanjeev Shrestha
 * @package: dokan
 *
 */

class Dokan_social_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {

        $widget_options = array(
            'description' => __( 'Social widget for the dokan theme.', 'dokan' )
        );

        $control_options = array();

        parent::__construct(
            'social-links',
            'Dokan Social Widget',
            $widget_options,
            $control_options
        );
    }

    /**
     * Front-end display of widget
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args, EXTR_SKIP );
        echo $before_widget;
        echo $before_title;
        echo $instance['dokan_title']; // Can set this with a widget option, or omit altogether
        echo $after_title;
        ?>
        <p><?php echo $instance['dokan_description'] ?></p>
        <ul class="social-list">
            <li><a href="http://facebook.com/<?php echo $instance['dokan_facebook'] ?>" target="_blank"><i class="fa fa-facebook"></i></a><span>facebook</span></li>
            <li><a href="http://twitter.com/<?php echo $instance['dokan_twitter'] ?>" target="_blank"><i class="fa fa-twitter"></i></a><span>twitter</span></li>
            <li><a href="http://tumblr.com/<?php echo $instance['dokan_tumblr'] ?>" target="_blank"><i class="fa fa-tumblr"></i></a><span>tumblr</span></li>
            <li><a href="http://instagram.com/<?php echo $instance['dokan_instagram'] ?>" target="_blank"><i class="fa fa-instagram"></i></a><span>instagram</span></li>
        </ul>
        <?php
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
         $instance = wp_parse_args( (array) $instance, array( 
            'dokan_title' => '',
            'dokan_facebook' => '',
            'dokan_twitter' => '',
            'dokan_tumblr' => '',
            'dokan_instagram' => ''
         ) );

        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'dokan_title' ) ?>">Title</label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'dokan_title' ) ?>" name ="<?php echo $this->get_field_name ('dokan_title') ?>" value ="<?php echo esc_attr ($instance['dokan_title']) ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'dokan_facebook' ) ?>">Facebook Username</label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'dokan_facebook' ) ?>" name ="<?php echo $this->get_field_name ('dokan_facebook') ?>" value ="<?php echo esc_attr ($instance['dokan_facebook']) ?>">
    
            <label for="<?php echo $this->get_field_id( 'dokan_twitter' ) ?>">Twitter Username</label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'dokan_twitter' ) ?>" name ="<?php echo $this->get_field_name ('dokan_twitter') ?>" value ="<?php echo esc_attr ($instance['dokan_twitter']) ?>">
    
            <label for="<?php echo $this->get_field_id( 'dokan_tumblr' ) ?>">Tumblr Username</label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'dokan_tumblr' ) ?>" name ="<?php echo $this->get_field_name ('dokan_tumblr') ?>" value ="<?php echo esc_attr ($instance['dokan_tumblr']) ?>">
    
            <label for="<?php echo $this->get_field_id( 'dokan_instagram    ' ) ?>">Instagram Username</label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'dokan_instagram' ) ?>" name ="<?php echo $this->get_field_name ('dokan_instagram') ?>" value ="<?php echo esc_attr ($instance['dokan_instagram']) ?>">
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $updated_instance = $new_instance;
        foreach ($new_instance as $new_inst) {
            $updated_instance[] = strip_tags($new_inst);
        }
     
        return $updated_instance;
    }
}

add_action( 'widgets_init', function() {
    register_widget( 'Dokan_social_Widget' );
} );

?>