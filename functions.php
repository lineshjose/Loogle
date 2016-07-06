<?php /*  
	Function Name: Functions
	URI: http://linesh.com/
	Description: This is a Free WordPress theme built-in widgets and a intuitive theme settings interface... Designed by <a href="http://linesh.com/">Linesh Jose</a>. Both the design and code are  released under a <a href="http://creativecommons.org/licenses/by/3.0//">Creative Commons Attribution 3.0 Unported</a> License.
	Version: 15.05
	Author: Linesh Jose 
	Author URI: http://linesh.com/
	Tags: light, white,Three-columns,  flexible-width, right-sidebar, left-sidebar,  threaded-comments, translation-ready, white,  widgets
*/


	include(TEMPLATEPATH.'/admin/admin.php');
	
/* Localization Initialize ********************************************/
	
	load_theme_textdomain('Loogle');
	if (function_exists('automatic_feed_links')) automatic_feed_links();


/*  ******************************************** Header Funtions ******************************************************************************** */
	
		/* * Print the <title> tag based on what is being viewed. */
		function lj_title() {
		global $page, $paged;
		wp_title( '-', true, 'right' );
		bloginfo( 'name' );// Add the blog name.
		
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " - $site_description";
			
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' - ' . sprintf( __( 'Page %s', 'lineshjose' ), max( $paged, $page ) );
		}
		
	
		/*  Print the <description> tag based on what is being viewed. */
		function lj_description() {
			if (is_single() || is_page() )
		
						{
							if ( have_posts() ) { while ( have_posts() ) {the_post(); 
							the_excerpt_rss();
							}}
						}
					else if(is_home()) 
						{
							 lj_title();
						}
			}
		
	
		/*  Print the robot text  based on what is being viewed. */
		function lj_robotx() {
			if(is_search()) 
			{ echo "noindex, nofollow"; }  
			else { echo "index,follow" ;} 
		}

	/* ******************************************************************************************************************************************** */


/* Widgets ********************************************/

	if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Leftbar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widgettitle">',
        'after_title' => '</div>',
    ));
	register_sidebar(array(
		'name' => 'Adbar',
        'before_widget' => '<div class="widget noborder">',
        'after_widget' => '</div>',
        'before_title' => '<div class="ads_title">',
        'after_title' => '</div>',
    ));
	 register_sidebar(array(
		'name' => 'Rightbar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widgettitle">',
        'after_title' => '</div>',
    ));
	 
	
	// This theme uses post excerpt_length
	function new_excerpt_length($length) {	return 30;	}
	function new_excerpt_more($more) {return '<b> ...</b>'; }
	
	add_filter('excerpt_more', 'new_excerpt_more');
	add_filter('excerpt_length', 'new_excerpt_length');
	
	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );



	// Pagination -----------------------------------------------------------
		function lj_pagination($range = 10) 
		{
			global $paged, $wp_query;
			$paged = intval(get_query_var('paged')); 
			$max_page = $wp_query->max_num_pages; 
			if(empty($paged) || $paged == 0) {
				$paged = 1;
			}
			
			if ($max_page != 1) 
			
			{ ?>
		
				<table id="navigation">
				<tr>
				<!-- First image -->
				<td class="b">
					<?php if ($paged != 1) {	?>
						<a href="<?php previous_posts() ?>"><span class="pic pre" ></span><div style="margin-right:22px"><strong>Previous</strong></div></a>
						<?php } else { ?>
						<span class="pic first"></span><strong>&nbsp;</strong>
						<?php } ?>
					</td>
				<!-- First image ends -->
	<?php 
				if($max_page > $range)
				{
					if($paged < $range)
					{
						for($i = 1; $i <= ($range + 1); $i++)
							{
								echo '<td >';
								if($i==$paged) {echo '<span class="pic  active" ></span><strong class="active_num">'.$i.'</strong>';}
								else {echo '<a href="'.get_pagenum_link($i).'" class="" ><span class="pic loop" ></span>'.$i.'</a>';}
								echo '</td >';
							}
					} 
					elseif($paged >= ($max_page - ceil(($range/2))))
					{
						for($i = $max_page - $range; $i <= $max_page; $i++)
							{
								echo '<td >';
								if($i==$paged) {echo '<span class="pic  active" ></span><strong class="active_num">'.$i.'</strong>';}
								else {echo '<a href="'.get_pagenum_link($i).'" class="" ><span class="pic loop" ></span>'.$i.'</a>';}
								echo '</td >';
							}
					} 
					elseif($paged >= $range && $paged < ($max_page - ceil(($range/2))))
					{
						for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++)
							{
								echo '<td >';
								if($i==$paged) {echo '<span class="pic  active" ></span><strong class="active_num">'.$i.'</strong>';}
								else {echo '<a href="'.get_pagenum_link($i).'" class="" ><span class="pic loop" ></span>'.$i.'</a>';}
								echo '</td >';
							}
					}
				}
				else
				{
					for($i = 1; $i <= $max_page; $i++)
					{
						echo '<td >';
						if($i==$paged) {echo '<span class="pic  active" ></span><strong class="active_num">'.$i.'</strong>';}
						else {echo '<a href="'.get_pagenum_link($i).'" class="" ><span class="pic loop" ></span>'.$i.'</a>';}
						echo '</td >';
				
					}
				} ?>
				<!-- last image -->
				<td>
				<?php if ($paged != $max_page) {	?>
				<a href="<?php next_posts() ?>"><span class="pic last"></span><strong>Next</strong></a>
				<?php } else { ?>
				<span class="pic last_img" ></span><strong>&nbsp;</strong>
				<?php } ?>
				</td>
					<!-- last image -->
				</tr>
				</table>
<?php 				
			}
		}
		//-----------------------------------------------------------------------




	//Callback functions for comment output
	function mytheme_comment($comment, $args, $depth) {
	   $GLOBALS['comment'] = $comment; ?>
	   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	   <table cellpadding="0" cellspacing="0" id="comment-<?php comment_ID(); ?>">
			<tr>
				<td class="avt">
					<?php if(get_comment_author_url()){?><a href="<?php echo get_comment_author_url();?>"><?php echo get_avatar( $comment, 32 ); ?></a><?php } 
							else { echo get_avatar( $comment, 32 );} ?>
				</td>
				<td >
				<div class="info">
				<?php printf(__('<cite class="fn">%s</cite>','Clean'), get_comment_author_link()) ?>
				<small><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"> <?php printf(__('%1$s &bull; %2$s'), get_comment_date(),  get_comment_time()) ?></a></small>
				<?php if ( $comment->comment_approved == '0' ) : ?>(<span><em><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em></span>)<?php endif; ?> 			
				<?php edit_comment_link( __( '<span> Edit this </span>', 'twentyten' ), ' ' );?>
				<span class="reply">&nbsp;<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
	
						</div>
			<?php comment_text() ?>
				</td>
				</tr>
			</table>
			<!-- #comment-##  -->
	<?php
			}
			
			
	// add a microid to all the comments
	function comment_add_microid($classes) {
		$c_email=get_comment_author_email();
		$c_url=get_comment_author_url();
		if (!empty($c_email) && !empty($c_url)) {
			$microid = 'microid-mailto+http:sha1:' . sha1(sha1('mailto:'.$c_email).sha1($c_url));
			$classes[] = $microid;
		}
		return $classes;	
	}
	add_filter('comment_class','comment_add_microid');
	


?>