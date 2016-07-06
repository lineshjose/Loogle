<?php /*  
	Template Name: Single
	URI: http://linesh.com/
	Description: This is a Free WordPress theme built-in widgets and a intuitive theme settings interface... Designed by <a href="http://linesh.com/">Linesh Jose</a>. Both the design and code are  released under a <a href="http://creativecommons.org/licenses/by/3.0//">Creative Commons Attribution 3.0 Unported</a> License.
	Version: 15.05
	Author: Linesh Jose 
	Author URI: http://linesh.com/
	Tags: light, white,Three-columns,  flexible-width, right-sidebar, left-sidebar,  threaded-comments, translation-ready, white,  widgets
*/?>
<?php get_header() ?>

 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div <?php if (function_exists('post_class')) { post_class(); } else { echo 'class="post"'; } ?> id="post-<?php the_ID(); ?>">
	<h1><?php the_title() ?></h1>
		<div class="share">
			<span  class='st_facebook_hcount' displayText='Facebook'></span>
			<span  class='st_twitter_hcount' displayText='Tweet'></span>
			<span  class='st_delicious_hcount' displayText='Delicious'></span>
			<span  class='st_digg_hcount' displayText='Digg'></span>
			<span  class='st_linkedin_hcount' displayText='LinkedIn'></span>
			<span  class='st_sharethis_hcount' displayText='ShareThis'></span>
		</div>
		<ul class="meta">
			<li class="noborder"><!-- Post Date-->Posted on :<span class="date"><?php echo get_the_date();?></span></li>
			<li class="category"><?php the_category(' , ') ?></li>
			<!-- Post Comments-->
			<li class="comment"><?php comments_popup_link('No comments', '1 comment', '% comments', ''); ?></li>
			<?php edit_post_link('Edit this','<!-- Post Edit--><li class="edit">','</li>'); ?> 
		</ul>
			
		<div class="cont"><?php the_content(); ?></div>
	                <?php wp_link_pages(array('before' => ' <div id="navigation"><p><strong>Pages:</strong> ', 'after' => '</p></div>', 'next_or_number' => 'number')); ?>
					<?php if (function_exists('the_tags')) { ?>
                    <?php the_tags('<p class="tags"><b>Tags:</b> ', ', ', '</p>'); ?>
                    <?php } ?>
                    <br>
                    <?php comments_template(); ?>
	
	
		<?php endwhile; ?>

		
		<?php else : ?>
			<div class="post">
			<h1>No standard web pages were found.</h1>
			<br />
			<div class="cont">
			<p>Suggestions:</p>
				<ul>
					<li> Make sure all words are spelled correctly.</li>
					<li> Try different keywords.</li>
					<li> Try more general keywords.</li>
					<li> Try fewer keywords.</li>
					</ul>
				</div>
			</div>
		<?php endif; ?>


<br clear="all" />
<?php get_sidebar() ?>

<?php get_footer() ?>