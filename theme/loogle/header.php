<?php /*  
	Template Name: Header
	URI: http://lineshjose.com/
	Description: This is a Free WordPress theme built-in widgets and a intuitive theme settings interface... Designed by <a href="http://lineshjose.com/">Linesh Jose</a>. Both the design and code are  released under a <a href="http://creativecommons.org/licenses/by/3.0//">Creative Commons Attribution 3.0 Unported</a> License.
	Version: 11.06
	Author: Linesh Jose 
	Author URI: http://lineshjose.com
	Tags: light, white,Three-columns,  flexible-width, right-sidebar, left-sidebar,  threaded-comments, translation-ready, white,  widgets
*/?>


	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head profile="http://gmpg.org/xfn/11">
	<title><?php lj_title();?></title>
	<meta name="description" content="<?php lj_description(); ?>" />
	<meta name="Robots" content="<?php lj_robotx(); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/menu.css" type="text/css" media="screen,projection" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,projection" />
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<script type="text/javascript">var switchTo5x=false;</script><script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher:'16858234-a2f4-42dc-b8e3-59cdcdd121cb'});</script>
	
	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); // support for comment threading ?>
	<?php wp_head(); ?>

	</head>
	<body>
	<?php global $user_identity, $user_level;
	if (is_user_logged_in()) { 
	global $current_user;
    get_currentuserinfo();
	}?>
	
	
	<!--  Top links Starts -->
	<div id="top_links">
		<!--  Page links Starts-->	
		<ul class="alignleft">
				<li class="<?php if (is_home() || is_single() || is_category() || is_archive()  || is_search())echo 'current_page_item'; ?>"><a href="<?php echo get_option('home'); ?>/" >Home</a></li>
				<?php wp_list_pages('title_li=&depth=1' ); ?>
				
			</ul>
		<!--  Page links Ends -->	
		
		
		<!--  Account links Starts-->		
			<ul class="alignright">
				<?php	global $user_identity, $user_level;
			if (is_user_logged_in()) { ?>
					<li><a href="<?php bloginfo('url'); ?>/wp-admin">Settings</a></li>
					<?php if ( $user_level >= 1 ) { ?>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/post-new.php">Write New</a><?php } ?></li>
					<li ><a href="<?php echo wp_logout_url() ?>&amp;redirect_to=<?php echo urlencode($_SERVER['REQUEST_URI']) ?>" title="<?php _e('Log Out') ?>"><?php _e('Log Out'); ?></a></li>
			<?php 	} 	else {?>
				<li><a href="<?php echo bloginfo("url"); ?>/wp-login.php"><b><?php _e('Sign In')?></b></a></li>
				<?php if (get_option('users_can_register')) { ?>
				<li ><a href="<?php echo site_url('wp-login.php?action=register', 'login') ?>"><b><?php _e('Register') ?></b></a></li>
				<?php 	}	} 	?> 
			</ul>
			<!--  Account links ends-->	
			
			<div class="clearall"></div>
	</div>
	<!--  Top links ends-->
	
	
	
	<div id="container">
		
		<!-- header -->			
		<table cellpadding="0" cellspacing="0" id="header" width="100%">
			<tr>
			<!--  Logo -->
			<td class="logo">
			<?php if( get_option('loogle_logo') && get_option('loogle_logo_header') == "yes" )  { ?>
				<a href="<?php bloginfo('url'); ?>/"><img src="<?php echo get_option('loogle_logo'); ?>" title="<?php bloginfo('name'); ?>" width="160" height="56" alt="<?php bloginfo('name'); ?>" /></a>
				<?php } else if(get_option('loogle_logo_header') == "default"  ||  !get_option('loogle_logo_header') ){ ?> 
				<a href="<?php bloginfo('url'); ?>/"><img src="<?php echo  get_stylesheet_directory_uri();?>/images/logo.png" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>" width="160" height="56" /></a> 		
				<?php } else if(get_option('loogle_logo_header')=="no") { ?>
				<div class="title"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></div>
				<?php } ?>
			</td>
			
			<!-- Search box -->
			<td class="search">
				<!--  Search box-->	
				<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
					 <table cellpadding="0" cellspacing="0"   align="left">
						<tr>
							<td class="box"><input type="text" class="textbox searchbox"  name="s" id="s" placeholder="Search" size="41"/>
							</td> 
							<td ><input type="submit" id="searchsubmit" value="Search" class="button searchbutton" /></td>
						</tr>
					</table>
				</form>	
				<!--  Search box-->	
				</td>
			</tr>
		</table>
		<!-- end header -->			
		
		
		<!-- main page starts here -->
		<table id="main_page" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<!-- Left sidebar starts here -->
			<td class="side_bar left_bar">
				<div class="widget">
					<div class="widgettitle"><?php _e('Stay Connected'); ?></div>
					<ul>
						<li  class="facebook"><a href="http://facebook.com/<?php echo get_option('loogle_facebook');?>" title="Facebook">Facebook</a></li>
						<li class="twitter"><a href="http://twitter.com/<?php echo get_option('loogle_twitter');?>" title="Twitter" >Twitter</a></li>
						<li class="myspace"><a href="http://myspace.com/<?php echo get_option('loogle_myspace');?>" title="Myspace" >Myspace</a></li>
						<li class="rss"><a href="<?php bloginfo_rss( 'rss2_url' ); ?>" title="Syndicate this site using RSS 2.0">RSS Subscribe</a></li>
					</ul>
				</div>
			
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Leftbar') ) : ?>
				<div class="widget">
					<div class="widgettitle"><?php _e('Archives'); ?></div>
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>
				</div>
					
				<div class="widget">
					<div class="widgettitle"><?php _e('Categories'); ?></div>
					<ul>
						<?php wp_list_categories('title_li'); ?>
					</ul>
				</div>
			<?php endif; ?>
			</td>
			<!-- Left sidebar ends hrer -->
			
			<td class="content">
			<!-- Content starts here -->