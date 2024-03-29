<?php
/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('350x350', 350, 350, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
    add_image_size('475x300', 475, 300, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
    add_image_size('550x340', 550, 340, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
    add_image_size('992x300', 992, 300, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
    add_image_size('1920x520', 1920, 520, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');


    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('omron', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// omrom Blank navigation
function omron_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'nav',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load omrom Blank scripts (header.php)
// function omron_header_scripts()
// {
//     if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

//     	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
//         wp_enqueue_script('conditionizr'); // Enqueue it!

//         wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
//         wp_enqueue_script('modernizr'); // Enqueue it!

//         wp_register_script('omronscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
//         wp_enqueue_script('omronscripts'); // Enqueue it!
//     }
// }

// Load omrom Blank conditional scripts
// function omron_conditional_scripts()
// {
//     if (is_page('pagenamehere')) {
//         wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
//         wp_enqueue_script('scriptname'); // Enqueue it!
//     }
// }

// Load omrom Blank styles
function omron_styles()
{
    wp_register_style('omron', get_template_directory_uri() . '/css/style.css', array(), '1.0', 'all');
    wp_enqueue_style('omron'); // Enqueue it!
}

// Register omrom Blank Navigation
function register_omrom_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'omron'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'omron'), // Sidebar Navigation
        'footer-menu' => __('Footer Menu', 'omron') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'omron'),
        'description' => __('Description for this widget-area...', 'omron'),
        'id' => 'widget-area-1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h6>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'omron'),
        'description' => __('Description for this widget-area...', 'omron'),
        'id' => 'widget-area-2',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h6>',
        'after_title' => '</h6>'
    ));

    // Define Sidebar Widget Area 3
    register_sidebar(array(
        'name' => __('Widget Area 3', 'omron'),
        'description' => __('Description for this widget-area...', 'omron'),
        'id' => 'widget-area-3',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h6>',
        'after_title' => '</h6>'
    ));

    // Define Sidebar Widget Area 4
    register_sidebar(array(
        'name' => __('Widget Area 4', 'omron'),
        'description' => __('Description for this widget-area...', 'omron'),
        'id' => 'widget-area-4',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h6>',
        'after_title' => '</h6>'
    ));

    // Define Sidebar Widget Area 5
    register_sidebar(array(
        'name' => __('Widget Area 5', 'omron'),
        'description' => __('Description for this widget-area...', 'omron'),
        'id' => 'widget-area-5',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h6>',
        'after_title' => '</h6>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function omromwp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function omromwp_index($length) // Create 20 Word Callback for Index page Excerpts, call using omromwp_excerpt('omromwp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using omromwp_excerpt('omromwp_custom_post');
function omromwp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function omromwp_excerpt($length_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function omrom_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'omron') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function omrom_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function omrongravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function omroncomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
//add_action('init', 'omron_header_scripts'); // Add Custom Scripts to wp_head
//add_action('wp_print_scripts', 'omron_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'omron_styles'); // Add Theme Stylesheet
add_action('init', 'register_omrom_menu'); // Add omrom Blank Menu
// add_action('init', 'create_post_type_omrom'); // Add our omrom Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'omromwp_pagination'); // Add our omrom Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'omrongravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
//add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
//add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'omrom_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'omrom_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
// add_shortcode('omrom_shortcode_demo', 'omrom_shortcode_demo'); // You can place [omrom_shortcode_demo] in Pages, Posts now.
// add_shortcode('omrom_shortcode_demo_2', 'omrom_shortcode_demo_2'); // Place [omrom_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [omrom_shortcode_demo] [omrom_shortcode_demo_2] Here's the page title! [/omrom_shortcode_demo_2] [/omrom_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called omron
// function create_post_type_omrom()
// {
//     register_taxonomy_for_object_type('category', 'omron'); // Register Taxonomies for Category
//     register_taxonomy_for_object_type('post_tag', 'omron');
//     register_post_type('omron', // Register Custom Post Type
//         array(
//         'labels' => array(
//             'name' => __('omrom Blank Custom Post', 'omron'), // Rename these to suit
//             'singular_name' => __('omrom Blank Custom Post', 'omron'),
//             'add_new' => __('Add New', 'omron'),
//             'add_new_item' => __('Add New omrom Blank Custom Post', 'omron'),
//             'edit' => __('Edit', 'omron'),
//             'edit_item' => __('Edit omrom Blank Custom Post', 'omron'),
//             'new_item' => __('New omrom Blank Custom Post', 'omron'),
//             'view' => __('View omrom Blank Custom Post', 'omron'),
//             'view_item' => __('View omrom Blank Custom Post', 'omron'),
//             'search_items' => __('Search omrom Blank Custom Post', 'omron'),
//             'not_found' => __('No omrom Blank Custom Posts found', 'omron'),
//             'not_found_in_trash' => __('No omrom Blank Custom Posts found in Trash', 'omron')
//         ),
//         'public' => true,
//         'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
//         'has_archive' => true,
//         'supports' => array(
//             'title',
//             'editor',
//             'excerpt',
//             'thumbnail'
//         ), // Go to Dashboard Custom omrom Blank post for supports
//         'can_export' => true, // Allows export in Tools > Export
//         'taxonomies' => array(
//             'post_tag',
//             'category'
//         ) // Add Category and Post Tags support
//     ));
// }

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
// function omrom_shortcode_demo($atts, $content = null)
// {
//     return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
// }

// Shortcode Demo with simple <h2> tag
// function omrom_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
// {
//     return '<h2>' . $content . '</h2>';
// }

function remove_menus() {
	remove_menu_page( 'index.php' );                        //Dashboard
	// remove_menu_page( 'jetpack' );                       //Jetpack*
	// remove_menu_page( 'edit.php' );                      //Posts
	remove_menu_page( 'upload.php' );                       //Media
	// remove_menu_page( 'edit.php?post_type=page' );       //Pages
	remove_menu_page( 'woocommerce' );                      //Woocommerce
	remove_menu_page( 'edit-comments.php' );                //Comments
	// remove_menu_page( 'themes.php' );                    //Appearance
	// remove_menu_page( 'plugins.php' );                   //Plugins
	// remove_menu_page( 'users.php' );                     //Users
	// remove_menu_page( 'tools.php' );                     //Tools
	// remove_menu_page( 'options-general.php' );           //Settings
}
add_action( 'admin_menu', 'remove_menus' );

function cptui_register_my_cpts() {

	/**
	 * Post Type: Carrousel.
	 */

	$labels = array(
		"name" => __( "Carrousel", "custom-post-type-ui" ),
		"singular_name" => __( "Carrousel", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Carrousel", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "carrousel",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "carrousel", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,
		"supports" => array( "title", "thumbnail", "custom-fields" ),
	);

	register_post_type( "carrousel", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );


function custom_theme_setup() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'custom_theme_setup' );

?>