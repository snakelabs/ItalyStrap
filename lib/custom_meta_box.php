<?php
//Meta box to visualize slide in home page
//http://wp.tutsplus.com/tutorials/plugins/how-to-create-custom-wordpress-writemeta-boxes/
add_action( 'add_meta_boxes', 'slide_init' );
function slide_init(){
	add_meta_box("slide", __('Select if you want show this in home page slider', 'ItalyStrap'), "italystrap_select_slide", "prodotti", "side", "high");
	add_meta_box("pageOptions", __('Choose options for this page', 'ItalyStrap'), "italystrap_page_options", "page", "side", "high");
}

function italystrap_page_options( $post ){
	$values = get_post_custom( $post->ID );
	$show_page_meta_check = isset( $values['show_page_meta'] ) ? esc_attr( $values['show_page_meta'][0] ) : 'on';
	$show_lasteditdate_check = isset( $values['show_lasteditdate'] ) ? esc_attr( $values['show_lasteditdate'][0] ) : 'on';
	$show_author_box_check = isset( $values['show_author_box'] ) ? esc_attr( $values['show_author_box'][0] ) : 'on';
	wp_nonce_field( 'italystrap_page_options_metabox_nonce', 'meta_box_nonce' );
	?>
	<p>
		<input type="checkbox" name="show_page_meta" id="show_page_meta" <?php checked( $show_page_meta_check, 'on' ); ?> />
		<label for="slide"><?php _e('Do you want to show page metas?', 'ItalyStrap'); ?></label>
	</p>
	<p>
		<input type="checkbox" name="show_lasteditdate" id="show_lasteditdate" <?php checked( $show_lasteditdate_check, 'on' ); ?> />
		<label for="slide"><?php _e('Do you want to show last edit date?', 'ItalyStrap'); ?></label>
	</p>
	<p>
		<input type="checkbox" name="show_author_box" id="show_lastedit_box" <?php checked( $show_author_box_check, 'on' ); ?> />
		<label for="slide"><?php _e('Do you want to show author box?', 'ItalyStrap'); ?></label>
	</p>
	<?php	
}


add_action( 'save_post', 'italystrap_page_options_meta_box_save' );
function italystrap_page_options_meta_box_save( $page_id ){
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	
	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'italystrap_page_options_metabox_nonce' ) ) return;
	
	// if our current user can't edit this post, bail
	//http://code.tutsplus.com/tutorials/how-to-create-custom-wordpress-writemeta-boxes--wp-20336#comment-802227555
	//prevents undefined offset notice and cannot modify header warning - add second parameters $post_id
	if( !current_user_can( 'edit_page' , $page_id ) ) return;
	
	// now we can actually save the data	
	// Probably a good idea to make sure your data is set
	// This is purely my personal preference for saving checkboxes

	$show_page_meta_check = ( isset( $_POST['show_page_meta'] ) && $_POST['show_page_meta'] ) ? 'on' : 'off';
	$show_lasteditdate_check = ( isset( $_POST['show_lasteditdate'] ) && $_POST['show_lasteditdate'] ) ? 'on' : 'off';
	$show_author_box_check = ( isset( $_POST['show_author_box'] ) && $_POST['show_author_box'] ) ? 'on' : 'off';
	update_post_meta( $page_id, 'show_page_meta', $show_page_meta_check );
	update_post_meta( $page_id, 'show_lasteditdate', $show_lasteditdate_check );
	update_post_meta( $page_id, 'show_author_box', $show_author_box_check );
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