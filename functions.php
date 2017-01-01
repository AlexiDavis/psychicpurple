<?php

/*-----------------------------------------------------------------------[ theme setup function ] */

// if ! psychicpurple_setup
if ( ! function_exists( 'psychicpurple_setup' ) ) :

	// psychicpurple_setup
	function psychicpurple_setup() {

		/*-----------------------------------[ HTML title tag filter ] */

		// display a meaningful title depending on the page being rendered
		function psychicpurple_title_filter( $title, $sep ) {
			global $paged, $page;
	
			if ( is_feed() )
				return $title;

			$title .= get_bloginfo( 'name' );
			$bloginfo_description = get_bloginfo( 'description' );
	
			if ( $bloginfo_description && ( is_home() || is_front_page() ) )
				$title = "$title $sep $bloginfo_description";

			// add a page number if necessary.
			if ( $paged >= 2 || $page >= 2 )
				$title = "$title $sep " . sprintf( __( 'Page %s', 'psychicpurple' ), max( $paged, $page ) );

			return $title;
		}

		add_filter( 'wp_title', 'psychicpurple_title_filter', 10, 2 );


		/*-----------------------------------[ register the custom nav menu(s) ] */

		register_nav_menus( array(
			'primary'   => __('Primary Navigation', 'psychicpurple'),
		));


		/*-----------------------------------[ navigation menu ] */

		// display a navigation menu created in the Appearance → Menus panel
		function psychicpurple_nav() {
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'menu',
				'echo'           => true,
				'before'         => '',
				'after'          => '',
				'link_before'    => '',
				'link_after'     => '',
				'depth'          => '3',
				'fallback_cb'    => 'false',
				'items_wrap'     => '<ul class="menu-list">%3$s</ul>',
				'walker'         => ''
			));

		}

		
		// remove class and ID from wp_nav_menu() for cleaner output
		function wp_nav_menu_attributes_filter($var) {
			return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
		}
		// add_filter('nav_menu_css_class', 'wp_nav_menu_attributes_filter', 100, 1);
		add_filter('nav_menu_item_id', 'wp_nav_menu_attributes_filter', 100, 1);
		

		/*-----------------------------------[ switch default core markup ] */
		
		// @link http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
		//
		// output valid HTML5 for search form, comment form, and comments/
		//
		add_theme_support( 'html5', array( 
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption'
		));

		/*-----------------------------------[ title tag support ] */

	 	// Let WordPress manage the document title
	 		
		add_theme_support( 'title-tag' );
	
		/*-----------------------------------[ post thumbnails ] */

		// enables post-thumbnail support

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 200, 300, true ); // default Post Thumbnail dimensions (cropped)

		// additional image sizes
		add_image_size( 'archive', 200, 9999 ); //200 pixels wide (and unlimited height)

	

		/*-----------------------------------[ image post format ] */

		add_theme_support( 'post-formats', array( 'image' ) );
		
		/*-----------------------------------[ wordpress needs this ] */
		add_theme_support( 'automatic-feed-links' );
		
		if ( ! isset( $content_width ) ) {
	        $content_width = 800;
        }


		/*-----------------------------------[ external javascript and stylesheet assets ] */

		// @link http://codex.wordpress.org/Function_Reference/wp_enqueue_script
		// 
		// to hook stylesheet and script enqueue callbacks into `wp_enqueue_scripts` 
		function psychicpurple_assets_loader() {

			// loads the main stylesheet
			wp_enqueue_style( 'psychicpurple-style', get_stylesheet_uri(), array(), '2014-08-08');
			wp_enqueue_style( 'googlefonts', "https://fonts.googleapis.com/css?family=Righteous|Roboto|Roboto+Slab", array(),'4.2.0');
						
			// required WordPress core feature
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );
		
			// loads JavaScript files	
  			wp_enqueue_script('main', get_template_directory()."/js/global.js", array('jquery'),'2014-08-08',true);
  			
		}
		add_action( 'wp_enqueue_scripts', 'psychicpurple_assets_loader' );


		/*-----------------------------------[ widgets ] */

		// widget setup
		function psychicpurple_widget() {
			// call register_sidebar wp method as array
			register_sidebar( array(
				'ID'            => 'sidebar',
				'name'          => __( 'Sidebar', 'psychicpurple' ),
				'description'   => __( 'Widgets will be shown on the right-hand side.', 'psychicpurple' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			));
			// call register_sidebar wp method as array
			register_sidebar( array(
				'ID'            => 'footer-1',
				'name'          => __( 'Footer 1', 'psychicpurple' ),
				'description'   => __( 'Widgets will be shown on the left-hand side of the footer.', 'psychicpurple' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			));
			// call register_sidebar wp method as array
			register_sidebar( array(
				'ID'            => 'footer-2',
				'name'          => __( 'Footer 2', 'psychicpurple' ),
				'description'   => __( 'Widgets will be shown in the center of the footer.', 'psychicpurple' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			));
			// call register_sidebar wp method as array
			register_sidebar( array(
				'ID'            => 'footer-3',
				'name'          => __( 'Footer 3', 'psychicpurple' ),
				'description'   => __( 'Widgets will be shown on the left-hand side of the footer.', 'psychicpurple' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			));
		};

		add_action( 'widgets_init' , 'psychicpurple_widget' );
		
		/*-----------------------------------[ excerpt edits ] */
		/**
		* Filter the except length to 20 words.
 		*
		* @param int $length Excerpt length.
		* @return int (Maybe) modified excerpt length.
		*/
		function wpdocs_custom_excerpt_length( $length ) {
		    return 20;
		}
		add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

		/**
		 * Filter the "read more" excerpt string link to the post.
		 *
		 * @param string $more "Read more" excerpt string.
		 * @return string (Maybe) modified "read more" excerpt string.
		 */
		function wpdocs_excerpt_more( $more ) {
			return sprintf( '<p><a class="read-more" href="%1$s">%2$s</a></p>',
			get_permalink( get_the_ID() ),
			__( 'Read More', 'psychicpurple' )
			);
		}
		add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
		

}// end psychicpurple_setup
endif;// end ! function_exists( 'psychicpurple_setup' )


/*-----------------------------------------------------------------------[ after setup theme init ] */

//themename custom function setup
add_action( 'after_setup_theme', 'psychicpurple_setup' );

function get_my_url() {
    if ( ! preg_match( '/<img\s[^>]*?src=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
        return false;
    return esc_url_raw( $matches[1] );
}