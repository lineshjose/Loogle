<?php /*  
	Template Name: Footer
	URI: http://linesh.com/
	Description: This is a Free WordPress theme built-in widgets and a intuitive theme settings interface... Designed by <a href="http://linesh.com/">Linesh Jose</a>. Both the design and code are  released under a <a href="http://creativecommons.org/licenses/by/3.0//">Creative Commons Attribution 3.0 Unported</a> License.
	Version: 15.05
	Author: Linesh Jose 
	Author URI: http://linesh.com/
	Tags: light, white,Three-columns,  flexible-width, right-sidebar, left-sidebar,  threaded-comments, translation-ready, white,  widgets
*/?>
   <div id="footer">
		<ul>
		<li><a href="<?php bloginfo('url') ?>">Home</a></li>
		<?php wp_list_pages('title_li=&depth=1'); ?>
        </ul>
		<p>Copyright &copy; <?php echo date('Y'); ?> <a href="<?php bloginfo('url') ?>"><?php bloginfo('name'); ?></a>
		all rights reserved.	Powered by  <a href="http://wordpress.org/" titl="Powered by WordPress">WordPress</a>. 
		Theme by <a href="http://linesh.com/">Linesh Jose</a></p>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
