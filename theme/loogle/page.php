<?php /*  
	Template Name: Page
	URI: http://lineshjose.com/
	Description: This is a Free WordPress theme built-in widgets and a intuitive theme settings interface... Designed by <a href="http://lineshjose.com/">Linesh Jose</a>. Both the design and code are  released under a <a href="http://creativecommons.org/licenses/by/3.0//">Creative Commons Attribution 3.0 Unported</a> License.
	Version: 11.06
	Author: Linesh Jose 
	Author URI: http://lineshjose.com
	Tags: light, white,Three-columns,  flexible-width, right-sidebar, left-sidebar,  threaded-comments, translation-ready, white,  widgets
*/?>
<?php get_header() ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div <?php if (function_exists('post_class')) { post_class("post"); } else { echo 'class="post"'; } ?> id="post-<?php the_ID(); ?>">
	<h1><?php the_title() ?></h1>
	<div class="cont"><?php the_content(); ?></div>
	<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	 </div>
		<?php endwhile; ?>
		
		<div style="clear:both"></div>
		
		<?php else : ?>
			<p>No standard web pages were found.</p>
            <p>Suggestions:</p>
            <ul>
            <li>* Make sure all words are spelled correctly.</li>
            <li>* Try different keywords.</li>
            <li>* Try more general keywords.</li>
            <li>* Try fewer keywords.</li>
            </ul>
		<?php endif; ?>
		</div>
	</div>
</div>

<?php get_sidebar() ?>
<?php get_footer() ?>