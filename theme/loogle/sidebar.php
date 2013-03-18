<?php /*  
	Template Name: Sidebar
	URI: http://lineshjose.com/
	Description: This is a Free WordPress theme built-in widgets and a intuitive theme settings interface... Designed by <a href="http://lineshjose.com/">Linesh Jose</a>. Both the design and code are  released under a <a href="http://creativecommons.org/licenses/by/3.0//">Creative Commons Attribution 3.0 Unported</a> License.
	Version: 11.06
	Author: Linesh Jose 
	Author URI: http://lineshjose.com
	Tags: light, white,Three-columns,  flexible-width, right-sidebar, left-sidebar,  threaded-comments, translation-ready, white,  widgets
*/?>

	</td>
	<!-- Content ends here -->
	
	<!-- rightbar Starts -->
	<td class="side_bar right_bar">
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Adbar') ) : ?>
	<div class="widget noborder">
		<!-- ads starts -->
		<div class="ads_title">Ads</div>

		<em>This is a demo ad unit. Put your adsense script into  adbar widget area by using <strong>Text Widget</strong> unit.</em><br  /><br  />
		<!-- Remove This demo ad starts here  -->
		<ul class="ads">
			<li>
				<a class="adt" href="#" >Surprise Your Mother</a>
				<div class="adb">Mothers Day on 8th May. Gift her a surprise thing that will help her</div>
				<div class="adus" >www.shop.infolona.com</div>
			</li>

			<li >
				<a class="adt" href="#" ><span>CourseForMe</span></a>
				<div class="adb">The new portal entirely dedicated to courses and training</div>
				<div class="adus" >www.courseforme.in</div>
			</li>
			
			<li>
				<a class="adt" href="#"><span>B2B Marketing Training</span></a>
				<div class="adb">2 Day Strategic Marketing Seminar Over 70,000 Succesful Alumni</div>
				<div  class="adus">www.pragmaticmarketing.com</div>
			</li>
			
			<li>
				<a class="adt" href="#" >Surprise Your Mother</a>
				<div class="adb">Mothers Day on 8th May. Gift her a surprise thing that will help her</div>
				<div class="adus" >www.shop.infolona.com</div>
			</li>

			<li >
				<a class="adt" href="#" ><span>CourseForMe</span></a>
				<div class="adb">The new portal entirely dedicated to courses and training</div>
				<div class="adus" >www.courseforme.in</div>
			</li>
			
			
			</ul>
		<!-- Remove This demo ad ends here  -->
	
		</div>
		<!-- demo ads ends -->
		<?php endif; ?>
				
		
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Rightbar') ) : ?>
		<?php endif; ?>
	</td>
	<!-- rightbar ends -->
	</tr>
	</table>