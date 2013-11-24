<?php


load_theme_textdomain( 'lkk_admin', get_template_directory() . '/languages/admin' );
load_theme_textdomain( 'lkk', get_template_directory() . '/languages' );

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
      _e('Recent Posts', 'lkk');
    }
  } elseif (is_archive()) {
    $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    if ($term) {
      echo apply_filters('single_term_title', $term->name);
    } elseif (is_post_type_archive()) {
      echo apply_filters('the_title', get_queried_object()->labels->name);
    } elseif (is_day()) {
      printf(__('Archive | %s', 'lkk'), get_the_date());
    } elseif (is_month()) {
      printf(__('Archive | %s', 'lkk'), ucfirst(get_the_date('F Y')));
    } elseif (is_year()) {
      printf(__('Archive | %s', 'lkk'), get_the_date('Y'));
    } elseif (is_author()) {
      $author = get_queried_object();
      printf(__('Archive | %s', 'lkk'), $author->display_name);
    } else {
      single_cat_title();
    }
  } elseif (is_search()) {
    printf(__('Search Results for %s', 'lkk'), get_search_query());
  } elseif (is_404()) {
    _e('Not Found', 'lkk');
  } else {
    the_title();
  }
}


// Register Custom Post Type
function register_lkk_group_post_type() {

	$labels = array(
		'name'                => _x( 'Groups', 'Group Type General Name', 'lkk_admin' ),
		'singular_name'       => _x( 'Group', 'Group Type Singular Name', 'lkk_admin' ),
		'menu_name'           => __( 'Groups', 'lkk_admin' ),
		'parent_item_colon'   => __( 'Parent Group:', 'lkk_admin' ),
		'all_items'           => __( 'All Groups', 'lkk_admin' ),
		'view_item'           => __( 'View Group', 'lkk_admin' ),
		'add_new_item'        => __( 'Add New Group', 'lkk_admin' ),
		'add_new'             => __( 'New Group', 'lkk_admin' ),
		'edit_item'           => __( 'Edit Group', 'lkk_admin' ),
		'update_item'         => __( 'Update Group', 'lkk_admin' ),
		'search_items'        => __( 'Search groups', 'lkk_admin' ),
		'not_found'           => __( 'No groups found', 'lkk_admin' ),
		'not_found_in_trash'  => __( 'No groups found in Trash', 'lkk_admin' ),
	);
	$rewrite = array(
		'slug'                => _x('groups', 'Group Slug', 'lkk_admin'),
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'lkk_group', 'lkk_admin' ),
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
		'has_archive'         => false,
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
    static $custom_post_types, $post_type, $filter_func;

    if (empty($custom_post_types))
        $custom_post_types = get_post_types(array('_builtin' => false));

    if (empty($post_type))
        $post_type = get_post_type();

    if ('page' == $item->object && in_array($post_type, $custom_post_types)) {
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
