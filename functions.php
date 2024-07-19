<?php
/*
  Author: Primer Co
  URL: htp://byprimer.co
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/primer.php
    - head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
    - custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/primer.php'); // if you remove this, primer will break
require_once('library/acf_blocks.php'); // ACF Gutenberg Blocks
require_once('wp_bootstrap_navwalker.php'); // Bootstrap Nav Walker

/*
3. library/admin.php
    - removing some default WordPress dashboard widgets
    - an example custom dashboard widget
    - adding custom login css
    - changing text in footer of admin
*/
// require_once('library/admin.php'); // this comes turned off by default

/*
4. library/translation/translation.php
    - adding support for other languages
*/
// require_once('library/translation/translation.php'); // this comes turned off by default


/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'primer-1400', 1400, 0, true );
add_image_size( 'primer-412', 412, 325, true );
add_image_size( 'primer-425', 425, 406, true );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function primer_register_sidebars() {

    register_sidebar(array(
    	'id' => 'sidebar1',
    	'name' => __('Sidebar 1', 'primertheme'),
    	'description' => __('The first (primary) sidebar.', 'primertheme'),
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
}

/************* COMMENT LAYOUT *********************/
// Comment Layout
function primer_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
			    <?php
			    /*
			        this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
			        echo get_avatar($comment,$size='32',$default='<path_to_url>' );
			    */
			    ?>
			    <!-- custom gravatar call -->
			    <?php
			    	// create variable
			    	$bgauthemail = get_comment_author_email();
			    ?>
			    <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
			    <!-- end custom gravatar call -->
				<?php printf(__('<cite class="fn">%s</cite>', 'primertheme'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__('F jS, Y', 'primertheme')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'primertheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
       			<div class="alert info">
          			<p><?php _e('Your comment is awaiting moderation.', 'primertheme') ?></p>
          		</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
    <!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function primer_wpsearch($form) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('Search', 'primertheme') . '</label>
    <div class="form-group">
      <input type="text" class="form-control" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search...','primertheme').'" />
    </div>
    <input type="submit" class="btn btn-primary" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </form>';
    return $form;
} // don't remove this bracket!

/************* IMAGE FORMATTING *****************/

// Allow SVG Upload to WP
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/************* ACF *****************/

// Add ACF Options Page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

/************* ESTIMATED READ TIME SINGLE POSTS *****************/

function display_read_time() {
    $content = get_post_field( 'post_content', $post->ID );
    $count_words = str_word_count( strip_tags( $content ) );

    $read_time = ceil($count_words / 250);

	$prefix = '';

	 if ($read_time == 1) { $suffix = '<span class="rt-suffix"> Min Read </span>';  }
	 else { $suffix = '<span class="rt-suffix"> Min Read </span>';  }

    $read_time_output = $prefix . $read_time . $suffix;

    return $read_time_output;
}

//AJAX URL IN HEADER
add_action('wp_head', 'ajax_url_header');
function ajax_url_header(){
	?>
	<script type="text/javascript">
		var ajaxurl = "<?php echo admin_url('admin-ajax.php') ?>";
	</script>
	<?php
}

function add_title_tag_support(){
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'add_title_tag_support' );

/*ajax setup for show more in responsive*/
add_action('wp_ajax_load_more_blogs', 'load_more_blogs');
add_action('wp_ajax_nopriv_load_more_blogs', 'load_more_blogs');

function load_more_blogs(){
    $paged = $_POST["paged"];
    $ppp = $_POST["ppp"];
    
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $ppp, 
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $paged
    );

    $loop = new WP_Query($args);    

    while ( $loop->have_posts() ) : $loop->the_post(); ?>
	<div class="s-blog">
		<?php if(get_the_post_thumbnail_url(get_the_ID(), 'full')){ ?>
        <div class="imgwrap">
        <a href="<?php echo get_the_permalink(); ?>">
        	<img alt="<?php the_title(); ?>" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" class="w100" >
            <div class="time"><?php echo display_read_time(); ?></div>
            <div class="date"><?php the_date( 'm/d/Y' ); ?></div>		                    
        </a>
        </div>
		<?php } ?>
        <div class="blog-cont">
        <a href="<?php echo get_the_permalink(); ?>"><h5><?php the_title() ;?></h5></a>
        <p><?php echo get_the_excerpt(); ?></p>
        <a href="<?php echo get_the_permalink(); ?>" class="read-more" >Read More</a>
        </div>                  
	</div>
	<?php endwhile; wp_reset_postdata(); exit;
}

function at_body_classes( $classes ) { 	
    $classes[] = 'transparent';     
    return $classes;     
}

function get_current_post_ID() {
   $page_id = get_queried_object_id();

	if( get_field('header_transperant', $page_id) == 1 ){
		add_filter( 'body_class','at_body_classes' );
	}
}
add_action( 'template_redirect', 'get_current_post_ID' );
?>
