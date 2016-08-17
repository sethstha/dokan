<?php 
/**
 * new WordPress Widget format
 * Wordpress 2.8 and above
 * @package: dokan
 * @see http://codex.wordpress.org/Widgets_API#Developing_Widgets
 */
class dokan_social_Widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     **/
    function dokan_social_Widget() {
        $widget_ops = array( 'classname' => 'widget-social', 'description' => 'This widget will show social icons.' );
        $this->WP_Widget( 'widget-social', 'Social Links', $widget_ops );
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    function widget( $args, $instance ) {
        extract( $args, EXTR_SKIP );
        echo $before_widget;
        echo $before_title;
        echo $instance['dokan_title']; // Can set this with a widget option, or omit altogether
        echo $after_title;
		?>
		<p><?php echo $instance['dokan_description'] ?></p>
		<ul class="social-list">
			<li><a href="http://facebook.com/<?php echo $instance['dokan_facebook'] ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
			<!-- <li><a href="http://twitter.com/<?php //echo $instance['dokan_twitter'] ?>" target="_blank"><i class="fa fa-twitter"></i></a></li> -->
			<!-- <li><a href="http://tumblr.com/<?php //echo $instance['dokan_tumblr'] ?>" target="_blank"><i class="fa fa-tumblr"></i></a></li> -->
			<li><a href="http://instagram.com/<?php echo $instance['dokan_instagram'] ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
		</ul>
		<?php

    //
    // Widget display logic goes here
    //

    echo $after_widget;
    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    function update( $new_instance, $old_instance ) {

		$updated_instance = $new_instance;
		$updated_instance['dokan_title'] = strip_tags($new_instance ['dokan_title']);
		$updated_instance['dokan_description'] = strip_tags($new_instance ['dokan_description']);
		$updated_instance['dokan_facebook'] = strip_tags($new_instance ['dokan_facebook']);
		$updated_instance['dokan_twitter'] = strip_tags($new_instance ['dokan_twitter']);
		$updated_instance['dokan_tumblr'] = strip_tags($new_instance ['dokan_tumblr']);
		$updated_instance['dokan_instagram'] = strip_tags($new_instance ['dokan_instagram']);
     
        return $updated_instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void Echoes it's output
     **/
    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 
        	'dokan_title' => '',
        	'dokan_description' => '',
        	'dokan_facebook' => '',
        	'dokan_twitter' => '',
        	'dokan_tumblr' => '',
        	'dokan_instagram' => ''
         ) );

        ?>
        <p>
        	<label for="<?php echo $this->get_field_id( 'dokan_title' ) ?>">Title</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'dokan_title' ) ?>" name ="<?php echo $this->get_field_name ('dokan_title') ?>" value ="<?php echo esc_attr ($instance['dokan_title']) ?>">
			
			<label for="<?php echo $this->get_field_id( 'dokan_description' ) ?>">Description</label>
			<textarea type="text" class="widefat" id="<?php echo $this->get_field_id( 'dokan_description' ) ?>" name ="<?php echo $this->get_field_name ('dokan_description') ?>" value =""><?php echo esc_attr ($instance['dokan_description']) ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'dokan_facebook' ) ?>">Facebook Username</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'dokan_facebook' ) ?>" name ="<?php echo $this->get_field_name ('dokan_facebook') ?>" value ="<?php echo esc_attr ($instance['dokan_facebook']) ?>">
	
			<label for="<?php echo $this->get_field_id( 'dokan_twitter' ) ?>">Twitter Username</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'dokan_twitter' ) ?>" name ="<?php echo $this->get_field_name ('dokan_twitter') ?>" value ="<?php echo esc_attr ($instance['dokan_twitter']) ?>">
	
			<label for="<?php echo $this->get_field_id( 'dokan_tumblr' ) ?>">Tumblr Username</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'dokan_tumblr' ) ?>" name ="<?php echo $this->get_field_name ('dokan_tumblr') ?>" value ="<?php echo esc_attr ($instance['dokan_tumblr']) ?>">
	
			<label for="<?php echo $this->get_field_id( 'dokan_instagram	' ) ?>">Instagram Username</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'dokan_instagram' ) ?>" name ="<?php echo $this->get_field_name ('dokan_instagram') ?>" value ="<?php echo esc_attr ($instance['dokan_instagram']) ?>">
		</p>
        <?php
        // display field names here using:
        // $this->get_field_id( 'option_name' ) - the CSS ID
        // $this->get_field_name( 'option_name' ) - the HTML name
        // $instance['option_name'] - the option value
    }
}

add_action( 'widgets_init', create_function( '', "register_widget( 'dokan_social_Widget' );" ) );

?>