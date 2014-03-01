<?php

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if(is_plugin_active('advanced-custom-fields/acf.php')) {

  define('ACF', true);
/*   define( 'ACF_LITE' , true );   */

} else {

  define('ACF', false);

}

/**
 * Enqueue Google Maps
 */

function lkk_scripts() {
  
  wp_register_script('google_maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBGW3v823tOaZfVgGICOYlTikUKLojM2mA&sensor=false', false, null, true);
  wp_register_script('lkk_maps', get_template_directory_uri() . '/assets/js/lkk-maps.js', false, null, false);
  wp_enqueue_script('google_maps');
  wp_enqueue_script('lkk_maps');
}
add_action('wp_enqueue_scripts', 'lkk_scripts', 200);


/**
 * Page titles
 */
 
function lkk_title() {
  if (is_home()) {
    if (get_option('page_for_posts', true)) {
      echo get_the_title(get_option('page_for_posts', true));
    } else {
      _e('Recent Posts', 'roots');
    }
  } elseif (is_archive()) {
    $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    if ($term) {
      echo apply_filters('single_term_title', $term->name);
    } elseif (is_post_type_archive()) {
      echo apply_filters('the_title', get_queried_object()->labels->name);
    } elseif (is_day()) {
      printf(__('Archive | %s', 'roots'), get_the_date());
    } elseif (is_month()) {
      printf(__('Archive | %s', 'roots'), ucfirst(get_the_date('F Y')));
    } elseif (is_year()) {
      printf(__('Archive | %s', 'roots'), get_the_date('Y'));
    } elseif (is_author()) {
      $author = get_queried_object();
      printf(__('Archive | %s', 'roots'), $author->display_name);
    } else {
      single_cat_title();
    }
  } elseif (is_search()) {
    printf(__('Search Results for %s', 'roots'), get_search_query());
  } elseif (is_404()) {
    _e('Not Found', 'roots');
  } else {
    the_title();
  }
}


// Register Custom Post Type
function register_lkk_group_post_type() {

	$labels = array(
		'name'                => _x( 'Groups', 'Group Type General Name', 'roots' ),
		'singular_name'       => _x( 'Group', 'Group Type Singular Name', 'roots' ),
		'menu_name'           => __( 'Groups', 'roots' ),
		'parent_item_colon'   => __( 'Parent Group:', 'roots' ),
		'all_items'           => __( 'All Groups', 'roots' ),
		'view_item'           => __( 'View Group', 'roots' ),
		'add_new_item'        => __( 'Add New Group', 'roots' ),
		'add_new'             => __( 'New Group', 'roots' ),
		'edit_item'           => __( 'Edit Group', 'roots' ),
		'update_item'         => __( 'Update Group', 'roots' ),
		'search_items'        => __( 'Search groups', 'roots' ),
		'not_found'           => __( 'No groups found', 'roots' ),
		'not_found_in_trash'  => __( 'No groups found in Trash', 'roots' ),
	);
	$rewrite = array(
		'slug'                => _x('groups', 'Group Slug', 'roots'),
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'lkk_group', 'roots' ),
		'description'         => '',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'taxonomies'          => array( ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true ,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
	);
	register_post_type( 'lkk_group', $args );

}

add_action( 'init', 'register_lkk_group_post_type', 0 );


/**
 * Hack to remove current page on blog page when browsing custom posts.
 *
 */

function theme_current_type_nav_class($css_class, $item) {
    static $custom_post_types, $post_type, $post_slug, $filter_func;
  
    if (empty($custom_post_types))
        $custom_post_types = get_post_types(array('_builtin' => false));

    if (empty($post_type))
        $post_type = get_post_type();
  
    if (empty($post_type))
        $post_slug = get_post_type_object( $post_type )->rewrite['slug'];

    if (('page' == $item->object && in_array($post_type, $custom_post_types))
       || ('custom' == $item->object && !empty($item->url) && preg_match("/^$post_slug/", $item->url) === 1)) {
      
        if (empty($filter_func))
            $filter_func = create_function('$el', 'return ($el != "current_page_parent");');

        $css_class = array_filter($css_class, $filter_func);
      
        $template = get_page_template_slug($item->object_id);
        if (!empty($template) && preg_match("/^page(-[^-]+)*-$post_type/", $template) === 1)
            array_push($css_class, 'current_page_parent');
    }

    return $css_class;
}
add_filter('nav_menu_css_class', 'theme_current_type_nav_class', 1, 2);
