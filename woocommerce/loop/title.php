<?php
/**
 * Product loop title
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<a href="<?php the_permalink()?>"> 
	<h3 class="name"><?php the_title(); ?></h3>
</a>
