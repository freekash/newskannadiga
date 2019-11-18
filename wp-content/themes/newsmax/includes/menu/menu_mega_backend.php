<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * backend mega menu
 */
class newsmax_ruby_walker_backend extends Walker_Nav_Menu {
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
	}

	public function end_lvl( &$output, $depth = 0, $args = array() ) {
	}

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $_wp_nav_menu_max_depth;
		$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		ob_start();
		$item_id = esc_attr( $item->ID );

		//category mega menu
		if ( empty( $item->newsmax_ruby_mega_cat ) ) {
			$newsmax_ruby_item_mega_cat = null;
		} else {
			$newsmax_ruby_item_mega_cat = esc_attr( $item->newsmax_ruby_mega_cat[0] );
		}

		//enable ajax pagination
		if ( empty( $item->newsmax_ruby_mega_cat_ajax ) ) {
			$newsmax_ruby_item_mega_cat_ajax = null;
		} else {
			$newsmax_ruby_item_mega_cat_ajax = esc_attr( $item->newsmax_ruby_mega_cat_ajax[0] );
		}

		//column mega menu
		if ( empty( $item->newsmax_ruby_mega_col ) ) {
			$newsmax_ruby_item_mega_col = null;
		} else {
			$newsmax_ruby_item_mega_col = esc_attr( $item->newsmax_ruby_mega_col[0] );
		}

		//column background
		if ( empty( $item->newsmax_ruby_mega_col_bg ) ) {
			$newsmax_ruby_item_mega_col_bg = null;
		} else {
			$newsmax_ruby_item_mega_col_bg = esc_attr( $item->newsmax_ruby_mega_col_bg );
		}

		//menu icon
		if ( empty( $item->newsmax_ruby_icon ) ) {
			$newsmax_ruby_item_icon = null;
		} else {
			$newsmax_ruby_item_icon = esc_attr( $item->newsmax_ruby_icon );
		}


		$removed_args = array( 'action', 'customlink-tab', 'edit-menu-item', 'menu-item', 'page-tab', '_wpnonce', );
		$original_title = '';

		if ( 'taxonomy' == $item->type ) {
			$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
			if ( is_wp_error( $original_title ) ) {
				$original_title = false;
			}
		} elseif ( 'post_type' == $item->type ) {
			$original_object = get_post( $item->object_id );
			$original_title  = $original_object->post_title;
		}

		$classes = array(
			'menu-item menu-item-depth-' . $depth,
			'menu-item-' . esc_attr( $item->object ),
			'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive' ),
		);

		$title = $item->title;

		if ( ! empty( $item->_invalid ) ) {
			$classes[] = 'menu-item-invalid';
			$title     = sprintf( esc_html__( '%s (Invalid)', 'newsmax' ), $item->title );
		} elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
			$classes[] = 'pending';
			$title     = sprintf( esc_html__( '%s (Pending)', 'newsmax' ), $item->title );
		}

		$title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

		$submenu_text = '';
		if ( 0 == $depth ) {
			$submenu_text = 'style="display: none;"';
		}
		?>

	<li id="menu-item-<?php echo esc_attr( $item_id ); ?>" class="<?php echo implode( ' ', $classes ); ?>">
		<dl class="menu-item-bar">
			<dt class="menu-item-handle">
                <span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span class="is-submenu" <?php echo esc_attr( $submenu_text ); ?>><?php esc_html_e( 'sub item', 'newsmax' ); ?></span></span>
                    <span class="item-controls">
                        <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
                        <span class="item-order hide-if-js">
                            <a href="<?php echo wp_nonce_url( add_query_arg(array( 'action'    => 'move-up-menu-item','menu-item' => $item_id), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ))),'move-menu_item');?>" class="item-move-up"><abbr title="<?php esc_attr_e( 'Move up', 'newsmax' ); ?>">&#8593;</abbr></a>|
                            <a href="<?php echo wp_nonce_url( add_query_arg( array( 'action'    => 'move-down-menu-item', 'menu-item' => $item_id), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ))), 'move-menu_item');?>" class="item-move-down"><abbr title="<?php esc_attr_e( 'Move down', 'newsmax' ); ?>">&#8595;</abbr></a>
                        </span>
                        <a class="item-edit" id="edit-<?php echo esc_attr( $item_id ); ?>" title="<?php echo esc_attr( 'Edit Menu Item' ); ?>" href="<?php echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : esc_url( add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) ) ); ?>"><?php esc_html_e( 'Edit Menu Item', 'newsmax' ); ?></a>
                    </span>
			</dt>
		</dl>

		<div class="menu-item-settings" id="menu-item-settings-<?php echo esc_attr( $item_id ); ?>">

			<?php if ( 'custom' == $item->type ) : ?>
				<p class="field-url description description-wide">
					<label for="edit-menu-item-url-<?php echo esc_attr( $item_id ); ?>">
						<?php esc_html_e( 'URL', 'newsmax' ); ?><br/>
						<input type="text" id="edit-menu-item-url-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_url( $item->url ); ?>"/>
					</label>
				</p>
			<?php endif; ?>

			<p class="description description-thin">
				<label for="edit-menu-item-title-<?php echo esc_attr( $item_id ); ?>">
					<?php esc_html_e( 'Navigation Label', 'newsmax' ); ?><br/>
					<input type="text" id="edit-menu-item-title-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->title ); ?>"/>
				</label>
			</p>
			<!--# menu icon -->
			<p class="description description-thin">
				<label for="edit-menu-item-attr-title-<?php echo esc_attr( $item_id ); ?>">
					<?php esc_html_e( 'Title Attribute', 'newsmax' ); ?><br/>
					<input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>"/>
				</label>
			</p>

			<p class="field-ruby-mega description description-wide">
				<label class="ruby-meta-menu-label" for="edit-menu-item-newsmax-ruby-icon-<?php echo esc_attr( $item_id ); ?>"><?php esc_html_e( 'Menu Icon Name: ', 'newsmax' ); ?></label>
				<input type="text" id="edit-menu-item-newsmax-ruby-icon-<?php echo esc_attr( $item_id ); ?>"  name="menu-item-newsmax-ruby-icon[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $newsmax_ruby_item_icon ); ?>"/>
				<span style="display: block; font-size: 12px; font-style: italic; margin-top: 5px; color: #aaa"><?php echo html_entity_decode(esc_html__( 'Input the class name of Font Awesome icon. ie: <strong>fa-heart</strong>', 'newsmax' )); ?></span>
				<span><a style=" font-size: 12px;" href="http://fontawesome.io/icons/">http://fontawesome.io/icons/</a></span>
			</p>

			<p class="field-link-target description">
				<label for="edit-menu-item-target-<?php echo esc_attr( $item_id ); ?>">
					<input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr( $item_id ); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr( $item_id ); ?>]"<?php checked( $item->target, '_blank' ); ?> />
					<?php esc_html_e( 'Open link in a new window/tab', 'newsmax' ); ?>
				</label>
			</p>

			<p class="field-css-classes description description-thin">
				<label for="edit-menu-item-classes-<?php echo esc_attr( $item_id ); ?>">
					<?php esc_html_e( 'CSS Classes (optional)', 'newsmax' ); ?><br/>
					<input type="text" id="edit-menu-item-classes-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( implode( ' ', $item->classes ) ); ?>"/>
				</label>
			</p>

			<p class="field-xfn description description-thin">
				<label for="edit-menu-item-xfn-<?php echo esc_attr( $item_id ); ?>">
					<?php esc_html_e( 'Link Relationship (XFN)', 'newsmax' ); ?><br/>
					<input type="text" id="edit-menu-item-xfn-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>"/>
				</label>
			</p>

			<!--# category mega menu -->
			<?php if ( 0 == $depth && ( ( $item->object == 'category' ) ) ) :?>
				<p class="field-ruby-mega description description-wide">
					<label class="ruby-meta-menu-label" for="edit-menu-item-newsmax-ruby-mega-cat-<?php echo esc_attr( $item_id ); ?>"><?php esc_html_e( 'Category Mega Menu: ', 'newsmax' ); ?></label>
					<input type="checkbox" id="edit-menu-item-newsmax-ruby-mega-cat-<?php echo esc_attr( $item_id ); ?>" name="menu-item-newsmax-ruby-mega-cat[<?php echo esc_attr( $item_id ); ?>]" value="1" <?php checked( $newsmax_ruby_item_mega_cat, 1 ); ?> />
					<span style="display: block; font-size: 12px; font-style: italic; margin-top: 5px; color: #aaa"><?php esc_html_e( 'Display the latest posts of this category', 'newsmax' ); ?></span>
				</p>


				<p class="field-ruby-mega description description-wide">
					<label class="ruby-meta-menu-label" for="edit-menu-item-newsmax-ruby-mega-cat-ajax-<?php echo esc_attr( $item_id ); ?>"><?php esc_html_e( 'Ajax pagination: ', 'newsmax' ); ?></label>
					<input type="checkbox" id="edit-menu-item-newsmax-ruby-mega-cat-ajax-<?php echo esc_attr( $item_id ); ?>" name="menu-item-newsmax-ruby-mega-cat-ajax[<?php echo esc_attr( $item_id ); ?>]" value="1" <?php checked( $newsmax_ruby_item_mega_cat_ajax, 1 ); ?> />
					<span style="display: block; font-size: 12px; font-style: italic; margin-top: 5px; color: #aaa"><?php esc_html_e( 'Enable ajax pagination for blog listing of this mega item', 'newsmax' ); ?></span>
				</p>

			<?php endif; ?>

			<!--#column mega menu -->
			<?php if ( $depth == 0 && ( $item->object == 'custom' ) ) { ?>
				<p class="field-ruby-mega description description-wide">
					<label class="ruby-meta-menu-label" for="edit-menu-item-newsmax-ruby-mega-col-<?php echo esc_attr( $item_id ); ?>"><?php esc_html_e( 'Columns Mega Menu: ', 'newsmax' ); ?></label>
					<input type="checkbox" id="edit-menu-item-newsmax-ruby-mega-col-<?php echo esc_attr( $item_id ); ?>"  name="menu-item-newsmax-ruby-mega-col[<?php echo esc_attr( $item_id ); ?>]" value="1" <?php checked( $newsmax_ruby_item_mega_col, 1 ); ?> />
					<span style="display: block; font-size: 12px; font-style: italic; margin-top: 5px; color: #aaa"><?php esc_html_e( 'The theme support columns mega menu (4 columns)', 'newsmax' ); ?></span>
				</p>

				<p class="field-ruby-mega description description-wide">
					<label class="ruby-meta-menu-label" for="edit-menu-item-newsmax-ruby-mega-col-bg-<?php echo esc_attr( $item_id ); ?>"><?php esc_html_e( 'BG Image URL: ', 'newsmax' ); ?></label>
					<input type="text" id="edit-menu-item-newsmax-ruby-mega-col-bg-<?php echo esc_attr( $item_id ); ?>"  name="menu-item-newsmax-ruby-mega-col-bg[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_url( $newsmax_ruby_item_mega_col_bg ); ?>"/>
					<span style="display: block; font-size: 12px; font-style: italic; margin-top: 5px; color: #aaa"><?php esc_html_e( 'Input url of image background for this mega menu, leave blank if you want to disable this option', 'newsmax' ); ?></span>
				</p>
			<?php } ?>

			<p class="field-description description description-wide">
				<label for="edit-menu-item-description-<?php echo esc_attr( $item_id ); ?>">
					<?php esc_html_e( 'Description', 'newsmax' ); ?><br/>
					<textarea id="edit-menu-item-description-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr( $item_id ); ?>]">
						<?php echo esc_html( $item->description ); ?></textarea>
					<span class="description"><?php esc_html_e( 'The description will be displayed in the menu if the current theme supports it.', 'newsmax' ); ?></span>
				</label>
			</p>

			<p class="field-move hide-if-no-js description description-wide">
				<label>
					<span><?php esc_html_e( 'Move', 'newsmax' ); ?></span>
					<a href="#" class="menus-move-up"><?php esc_html_e( 'Up one', 'newsmax' ); ?></a>
					<a href="#" class="menus-move-down"><?php esc_html_e( 'Down one', 'newsmax' ); ?></a>
					<a href="#" class="menus-move-left"></a>
					<a href="#" class="menus-move-right"></a>
					<a href="#" class="menus-move-top"><?php esc_html_e( 'To the top', 'newsmax' ); ?></a>
				</label>
			</p>

			<div class="menu-item-actions description-wide submitbox">
				<?php if ( 'custom' != $item->type && $original_title !== false ) : ?>
					<p class="link-to-original">
						<?php printf( esc_html__( 'Original: %s', 'newsmax' ), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
					</p>
				<?php endif; ?>
				<a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr( $item_id ); ?>" href="<?php echo wp_nonce_url(add_query_arg( array('action'=> 'delete-menu-item','menu-item' => $item_id), admin_url( 'nav-menus.php' )),'delete-menu_item_' . $item_id); ?>"><?php esc_html_e( 'Remove', 'newsmax' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span>
				<a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo esc_attr( $item_id ); ?>"href="<?php echo esc_url( add_query_arg( array('edit-menu-item' => $item_id, 'cancel'=> time()), admin_url( 'nav-menus.php' ) ) );?>#menu-item-settings-<?php echo esc_attr( $item_id ); ?>"><?php esc_html_e( 'Cancel', 'newsmax' ); ?></a>
			</div>

			<input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item_id ); ?>"/>
			<input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>"/>
			<input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->object ); ?>"/>
			<input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>"/>
			<input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>"/>
			<input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr( $item_id ); ?>]"  value="<?php echo esc_attr( $item->type ); ?>"/>
		</div>
		<!-- .menu-item-settings-->
		<ul class="menu-item-transport"></ul>
		<?php
		$output .= ob_get_clean();
	}
}


if ( ! function_exists( 'newsmax_ruby_megamenu_walker' ) ) {
	function newsmax_ruby_megamenu_walker( $walker ) {
		if ( $walker === 'Walker_Nav_Menu_Edit' ) {
			$walker = 'newsmax_ruby_walker_backend';
		}

		return $walker;
	}

	add_filter( 'wp_edit_nav_menu_walker', 'newsmax_ruby_megamenu_walker' );
}


if ( ! function_exists( 'newsmax_ruby_mega_walker_save' ) ) {
	function newsmax_ruby_mega_walker_save( $menu_id, $menu_item_db_id ) {

		//category menu
		if ( isset( $_POST['menu-item-newsmax-ruby-mega-cat'][ $menu_item_db_id ] ) ) {
			update_post_meta( $menu_item_db_id, '_menu_item_newsmax_ruby_mega_cat', esc_attr($_POST['menu-item-newsmax-ruby-mega-cat'][ $menu_item_db_id ]) );
		} else {
			update_post_meta( $menu_item_db_id, '_menu_item_newsmax_ruby_mega_cat', '0' );
		}

		//ajax menu
		if ( isset( $_POST['menu-item-newsmax-ruby-mega-cat-ajax'][ $menu_item_db_id ] ) ) {
			update_post_meta( $menu_item_db_id, '_menu_item_newsmax_ruby_mega_cat_ajax', esc_attr($_POST['menu-item-newsmax-ruby-mega-cat-ajax'][ $menu_item_db_id ]) );
		} else {
			update_post_meta( $menu_item_db_id, '_menu_item_newsmax_ruby_mega_cat_ajax', '0' );
		}

		//columns mega menu
		if ( isset( $_POST['menu-item-newsmax-ruby-mega-col'][ $menu_item_db_id ] ) ) {
			update_post_meta( $menu_item_db_id, '_menu_item_newsmax_ruby_mega_col', esc_attr($_POST['menu-item-newsmax-ruby-mega-col'][ $menu_item_db_id ]) );
		} else {
			update_post_meta( $menu_item_db_id, '_menu_item_newsmax_ruby_mega_col', '0' );
		}

		//column mega background
		if ( isset( $_POST['menu-item-newsmax-ruby-mega-col-bg'][ $menu_item_db_id ] ) ) {
			update_post_meta( $menu_item_db_id, '_menu_item_newsmax_ruby_mega_col_bg', esc_attr($_POST['menu-item-newsmax-ruby-mega-col-bg'][ $menu_item_db_id ]) );
		} else {
			update_post_meta( $menu_item_db_id, '_menu_item_newsmax_ruby_mega_col_bg', '0' );
		}

		//menu icon
		if ( isset( $_POST['menu-item-newsmax-ruby-icon'][ $menu_item_db_id ] ) ) {
			update_post_meta( $menu_item_db_id, '_menu_item_newsmax_ruby_icon', esc_attr($_POST['menu-item-newsmax-ruby-icon'][ $menu_item_db_id ]) );
		} else {
			update_post_meta( $menu_item_db_id, '_menu_item_newsmax_ruby_icon', '0' );
		}
	}

	add_action( 'wp_update_nav_menu_item', 'newsmax_ruby_mega_walker_save', 10, 2 );
}



if ( ! function_exists( 'newsmax_ruby_mega_walker_loader' ) ) {
	function newsmax_ruby_mega_walker_loader( $menu_item ) {
		$menu_item->newsmax_ruby_mega_cat      = get_post_meta( $menu_item->ID, '_menu_item_newsmax_ruby_mega_cat', true );
		$menu_item->newsmax_ruby_mega_cat_ajax = get_post_meta( $menu_item->ID, '_menu_item_newsmax_ruby_mega_cat_ajax', true );
		$menu_item->newsmax_ruby_mega_col      = get_post_meta( $menu_item->ID, '_menu_item_newsmax_ruby_mega_col', true );
		$menu_item->newsmax_ruby_mega_col_bg   = get_post_meta( $menu_item->ID, '_menu_item_newsmax_ruby_mega_col_bg', true );
		$menu_item->newsmax_ruby_icon          = get_post_meta( $menu_item->ID, '_menu_item_newsmax_ruby_icon', true );

		return $menu_item;
	}

	add_filter( 'wp_setup_nav_menu_item', 'newsmax_ruby_mega_walker_loader' );
}