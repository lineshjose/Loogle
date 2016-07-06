<?php
//-------------------------------------------------- Theme admin section -------------------------------------------------------//

//delete_option('loogle_logo');
		
	$themename = "Loogle";
	$shortname = "loogle";
	$options = array (	

		array(  "name" => "Header Logo",
				"desc" => "Would you like a logo in your header?",
				"id" => $shortname."_logo_header",
				"default" => "default",
				"type" => "logo",
				"default_img" => get_bloginfo('template_url').'/images/logo.png'),	
		
				
		array(  "name" => "Twitter.com",
				"desc" => "<br>http://twitter.com/<b>username</b>",
				"id" => $shortname."_twitter",
				"default" => "lineshjose",
				"type" => "twitter"),
				
		array(  "name" => "Facebook.com",
				"desc" => "<br>http://facebook.com/<b>username</b>",
				"id" => $shortname."_facebook",
				"default" => "linesh.jose",
				"type" => "facebook"),
				
		array(  "name" => "Myspace.com",
				"desc" => "<br>http://myspace.com/<b>username</b>",
				"id" => $shortname."_myspace",
				"default" => "lineshjose",
				"type" => "myspace"),
	);
	

	add_action('admin_head', 'wp_admin_js');
	function wp_admin_js() {echo '<script type="text/javascript" src="'; echo bloginfo('template_url'); echo '/admin/header.js"></script>'."\n"; }

	

	function loogle_add_admin() {
	global $themename, $shortname, $options;

		if ( 'save' == $_REQUEST['action'] ) {
					
					foreach ($options as $value) {
					if( !isset( $_REQUEST[ $value['id'] ] ) ) {  } else { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } }
						
					if(stristr($_SERVER['REQUEST_URI'],'&saved=true')) 
					{
						$location = $_SERVER['REQUEST_URI'];
					}
					else
					{
						$location = $_SERVER['REQUEST_URI'] . "&saved=true";		
					}
						
					if ($_FILES["file"]["type"])
					{
						$directory = TEMPLATEPATH."/images/";
						$filename= time().$_FILES["file"]["name"];			
						move_uploaded_file($_FILES["file"]["tmp_name"],$directory.$filename);
						update_option('loogle_logo',get_bloginfo('template_url').'/images/'.$filename);
					}
							
					
									
					header("Location: $location");
					die;
			} 
	   
		// Set all default options
		foreach ($options as $default) 
		{
			if(get_option($default['id'])=="")		 {		update_option($default['id'],$default['default']);		}
		}
		add_theme_page('Page title', 'Loogle settings', 10, $shortname, 'loogle_header');
		
	}

	add_action('admin_menu', 'loogle_add_admin'); 

	function loogle_header()  {
	global $themename, $shortname, $options;
	?>
<?php if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';	?>

<div class="wrap">
<h2><?php echo $themename; ?></h2>
<p>Thanks for downloading <strong><a href="http://linesh.com/projects/loogle/"><?php echo $themename; ?></a></strong> by Linesh Jose. Hope you enjoy using it!</p>
<p>There are tons of layout possibilities available with this theme, as well as a bunch of cool features that will surely help you get your site looking and working it's best.</p>
<p>A lot of hard work went in to programming and designing <strong><?php echo $themename; ?></strong>, and if you would like to support Linesh Jose (the guy who designed it) please <a href="http://linesh.com/make-a-donation/">make a  donation</a>.  If you have any questions, comments, or if you encounter a bug, please <a href="http://linesh.com/">contact me</a>.</p>
<h4 style="margin:0;padding:10px 0 0 0;border-bottom:1px solid #ccc;clear:both;">Theme Settings</h4>
<form method="post" class="jqtransform" id="myForm" enctype="multipart/form-data" action="">
  <table cellpadding="0" cellspacing="10" >
    <tr>
      <td width="80%" valign="top"><div id="poststuff" class="">
          <?php
		foreach ($options as $value) { 
		switch ( $value['type'] ) {
		case "logo":			?>
          <div class="stuffbox">
            <h3><?php echo $value['name']; ?></h3>
            <div class="inside">
              <table>
                <tr>
                  <th><?php echo $value['desc']; ?></th>
                  <td><input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>_yes" type="radio" value="yes"<?php if ( get_settings( $value['id'] ) == "yes") { echo " checked"; } ?> onclick="showMe()" />
                    <label for="<?php echo $value['id']; ?>_yes">Yes</label>
                    <input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>_no" type="radio" value="no"<?php if ( get_settings( $value['id'] ) == "no") { echo " checked"; } ?> onclick="showMe()" />
                    <label for="<?php echo $value['id']; ?>_no">No</label>
                    <input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>_default" type="radio" value="default"<?php if ( get_settings( $value['id'] ) == "default") { echo " checked"; } ?> onclick="showMe()" />
                    <label for="<?php echo $value['id']; ?>_default">Default</label></td>
                </tr>
              </table>
              <div id="headerLogo"> Choose a file to upload:
                <input type="file" name="file" id="file" />
                <br />
                <small>Please upload 160x56 pixel image for better view</small><br />
                <?php if(get_option('loogle_logo')) {
						 echo '<img src="'; echo get_option('loogle_logo'); echo '"  style="margin-top:10px;border:1px solid #aaa;padding:10px;" />'; 
						 } ?>
              </div>
              <div id="headerLogodefault"> <img src="<?php echo  get_stylesheet_directory_uri();?>/images/logo.png" style="margin-top:10px;border:1px solid #aaa;padding:10px;"  title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>" width="160" height="56" /> </div>
            </div>
          </div>
          <?php
			break;	
			case "twitter":
		?>
          <div class="stuffbox">
            <h3>Your Social Usernames</h3>
            <div class="inside">
              <table>
                <tr>
                  <td width="250"><table>
                      <tr>
                        <th align="left"><?php echo $value['name']; ?></th>
                      </tr>
                      <tr>
                        <td><input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo get_settings( $value['id'] );?>">
                          <small><?php echo $value['desc']; ?></small></td>
                      </tr>
                    </table></td>
                  <?php
			break;	
			case "facebook":
		?>
                  <td width="250"><table>
                      <tr>
                        <th align="left"><?php echo $value['name']; ?></th>
                      </tr>
                      <tr>
                        <td><input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo get_settings( $value['id'] );?>">
                          <small><?php echo $value['desc']; ?></small></td>
                      </tr>
                    </table></td>
                  <?php
			break;	
			case "myspace":
		?>
                  <td width="250"><table>
                      <tr>
                        <th align="left"><?php echo $value['name']; ?></th>
                      </tr>
                      <tr>
                        <td><input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo get_settings( $value['id'] );?>">
                          <small><?php echo $value['desc']; ?></small></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <?php
			break;		
		}
	}
	?>
      </div>
    
      </div>
    
      </td>
    
      <td valign="top"><div id="poststuff" class="metabox-holder has-right-sidebar" style="margin-top:-10px;">
          <div id="linksubmitdiv" class="postbox " >
            <h3>Current Saved Settings</h3>
            <div id="minor-publishing">
              <ul style="padding:10px">
                <li>Header Logo: <strong><?php echo ucwords(get_option('loogle_logo_header')); ?></strong></li>
              </ul>
              <div style="padding:10px;">
                <div style="border-bottom:1px solid #ccc;">Social usernames</div>
                <ul style="padding:10px;">
                  <li>Twitter : <strong><?php echo ucwords(get_option('loogle_twitter')); ?></strong></li>
                  <li>Facebook: <strong><?php echo ucwords(get_option('loogle_facebook')); ?></strong></li>
                  <li>Myspace : <strong><?php echo ucwords(get_option('loogle_myspace')); ?></strong></li>
                </ul>
              </div>
              <div id="major-publishing-actions">
                <input name="save" type="submit" value="Save changes" />
                <input type="hidden" name="action" value="save" />
              </div>
            </div>
          </div>
        </div></td>
    </tr>
  </table>
</form>
</div>
<?php  }?>
