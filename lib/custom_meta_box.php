<?php
//Meta box to visualize slide in home page
//http://wp.tutsplus.com/tutorials/plugins/how-to-create-custom-wordpress-writemeta-boxes/
add_action( 'add_meta_boxes', 'slide_init' );
function slide_init(){
	add_meta_box("slide", __('Select if you want show this in home page slider', 'ItalyStrap'), "italystrap_select_slide", "prodotti", "side", "high");
}

function italystrap_select_slide( $post ){
	$values = get_post_custom( $post->ID );
	$check = isset( $values['slide'] ) ? esc_attr( $values['slide'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
	<p>
		<input type="checkbox" name="slide" id="slide" <?php checked( $check, 'on' ); ?> />
		<label for="slide"><?php _e('Do you want to show it in the home slider?', 'ItalyStrap'); ?></label>
	</p>
	<?php	
}

add_action( 'save_post', 'italystrap_meta_box_save' );
function italystrap_meta_box_save( $post_id ){
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	
	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	
	// if our current user can't edit this post, bail
	//http://code.tutsplus.com/tutorials/how-to-create-custom-wordpress-writemeta-boxes--wp-20336#comment-802227555
	//prevents undefined offset notice and cannot modify header warning - add second parameters $post_id
	if( !current_user_can( 'edit_post' , $post_id ) ) return;
	
	// now we can actually save the data	
	// Probably a good idea to make sure your data is set
	// This is purely my personal preference for saving checkboxes
	$chk = ( isset( $_POST['slide'] ) && $_POST['slide'] ) ? 'on' : 'off';
	update_post_meta( $post_id, 'slide', $chk );
}