<?php 
/**
 * new WordPress Widget format
 * Wordpress 2.8 and above
 * @see http://codex.wordpress.org/Widgets_API#Developing_Widgets
 */
class sanjeev_social_Widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     **/
    function sanjeev_social_Widget() {
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
        echo $instance['sanjeev_title']; // Can set this with a widget option, or omit altogether
        echo $after_title;
		?>
		<p><?php echo $instance['sanjeev_description'] ?></p>
		<ul class="social-list">
			<li><a href="http://facebook.com/<?php echo $instance['sanjeev_facebook'] ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
			<!-- <li><a href="http://twitter.com/<?php //echo $instance['sanjeev_twitter'] ?>" target="_blank"><i class="fa fa-twitter"></i></a></li> -->
			<!-- <li><a href="http://tumblr.com/<?php //echo $instance['sanjeev_tumblr'] ?>" target="_blank"><i class="fa fa-tumblr"></i></a></li> -->
			<li><a href="http://instagram.com/<?php echo $instance['sanjeev_instagram'] ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
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
		$updated_instance['sanjeev_title'] = strip_tags($new_instance ['sanjeev_title']);
		$updated_instance['sanjeev_description'] = strip_tags($new_instance ['sanjeev_description']);
		$updated_instance['sanjeev_facebook'] = strip_tags($new_instance ['sanjeev_facebook']);
		$updated_instance['sanjeev_twitter'] = strip_tags($new_instance ['sanjeev_twitter']);
		$updated_instance['sanjeev_tumblr'] = strip_tags($new_instance ['sanjeev_tumblr']);
		$updated_instance['sanjeev_instagram'] = strip_tags($new_instance ['sanjeev_instagram']);
     
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
        	'sanjeev_title' => '',
        	'sanjeev_description' => '',
        	'sanjeev_facebook' => '',
        	'sanjeev_twitter' => '',
        	'sanjeev_tumblr' => '',
        	'sanjeev_instagram' => ''
         ) );

        ?>
        <p>
        	<label for="<?php echo $this->get_field_id( 'sanjeev_title' ) ?>">Title</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'sanjeev_title' ) ?>" name ="<?php echo $this->get_field_name ('sanjeev_title') ?>" value ="<?php echo esc_attr ($instance['sanjeev_title']) ?>">
			
			<label for="<?php echo $this->get_field_id( 'sanjeev_description' ) ?>">Description</label>
			<textarea type="text" class="widefat" id="<?php echo $this->get_field_id( 'sanjeev_description' ) ?>" name ="<?php echo $this->get_field_name ('sanjeev_description') ?>" value =""><?php echo esc_attr ($instance['sanjeev_description']) ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sanjeev_facebook' ) ?>">Facebook Username</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'sanjeev_facebook' ) ?>" name ="<?php echo $this->get_field_name ('sanjeev_facebook') ?>" value ="<?php echo esc_attr ($instance['sanjeev_facebook']) ?>">
	
			<label for="<?php echo $this->get_field_id( 'sanjeev_twitter' ) ?>">Twitter Username</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'sanjeev_twitter' ) ?>" name ="<?php echo $this->get_field_name ('sanjeev_twitter') ?>" value ="<?php echo esc_attr ($instance['sanjeev_twitter']) ?>">
	
			<label for="<?php echo $this->get_field_id( 'sanjeev_tumblr' ) ?>">Tumblr Username</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'sanjeev_tumblr' ) ?>" name ="<?php echo $this->get_field_name ('sanjeev_tumblr') ?>" value ="<?php echo esc_attr ($instance['sanjeev_tumblr']) ?>">
	
			<label for="<?php echo $this->get_field_id( 'sanjeev_instagram	' ) ?>">Instagram Username</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'sanjeev_instagram' ) ?>" name ="<?php echo $this->get_field_name ('sanjeev_instagram') ?>" value ="<?php echo esc_attr ($instance['sanjeev_instagram']) ?>">
		</p>
        <?php
        // display field names here using:
        // $this->get_field_id( 'option_name' ) - the CSS ID
        // $this->get_field_name( 'option_name' ) - the HTML name
        // $instance['option_name'] - the option value
    }
}

add_action( 'widgets_init', create_function( '', "register_widget( 'sanjeev_social_Widget' );" ) );

?>