<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after
 */
?>
</div><!-- .site-content -->
<footer id="footer" role="contentinfo">
<?php 
	if(is_active_sidebar( 'zerif-sidebar-footer' ) || is_active_sidebar( 'zerif-sidebar-footer-2' ) || is_active_sidebar( 'zerif-sidebar-footer-3' )):
		echo '<div class="footer-widget-wrap"><div class="container">';
		if(is_active_sidebar( 'zerif-sidebar-footer' )):
			echo '<div class="footer-widget col-xs-12 col-sm-4">';
			dynamic_sidebar( 'zerif-sidebar-footer' );
			echo '</div>';
		endif;
		if(is_active_sidebar( 'zerif-sidebar-footer-2' )):
			echo '<div class="footer-widget col-xs-12 col-sm-4">';
			dynamic_sidebar( 'zerif-sidebar-footer-2' );
			echo '</div>';
		endif;
		if(is_active_sidebar( 'zerif-sidebar-footer-3' )):
			echo '<div class="footer-widget col-xs-12 col-sm-4">';
			dynamic_sidebar( 'zerif-sidebar-footer-3' );
			echo '</div>';
		endif;
		echo '</div></div>';
	endif;
?>
<div class="container">
	<?php
		$footer_sections = 0;
		$zerif_address = get_theme_mod('zerif_address',__('Company address','zerif-lite'));
		$zerif_address_icon = get_theme_mod('zerif_address_icon',get_template_directory_uri().'/images/map25-redish.png');
		
		$zerif_email = get_theme_mod('zerif_email','<a href="mailto:contact@site.com">contact@site.com</a>');
		$zerif_email_icon = get_theme_mod('zerif_email_icon',get_template_directory_uri().'/images/envelope4-green.png');
		
		$zerif_phone = get_theme_mod('zerif_phone','<a href="tel:0 332 548 954">0 332 548 954</a>');
		$zerif_phone_icon = get_theme_mod('zerif_phone_icon',get_template_directory_uri().'/images/telephone65-blue.png');
		$zerif_socials_facebook = get_theme_mod('zerif_socials_facebook','#');
		$zerif_socials_twitter = get_theme_mod('zerif_socials_twitter','#');
		$zerif_socials_linkedin = get_theme_mod('zerif_socials_linkedin','#');
		$zerif_socials_behance = get_theme_mod('zerif_socials_behance','#');
		$zerif_socials_dribbble = get_theme_mod('zerif_socials_dribbble','#');
		$zerif_socials_instagram = get_theme_mod('zerif_socials_instagram');
		
		$zerif_accessibility = get_theme_mod('zerif_accessibility');
		$zerif_copyright = get_theme_mod('zerif_copyright');
		if(!empty($zerif_address) || !empty($zerif_address_icon)):
			$footer_sections++;
		endif;
		
		if(!empty($zerif_email) || !empty($zerif_email_icon)):
			$footer_sections++;
		endif;
		
		if(!empty($zerif_phone) || !empty($zerif_phone_icon)):
			$footer_sections++;
		endif;
		if( !empty($zerif_socials_facebook) || !empty($zerif_socials_twitter) || !empty($zerif_socials_linkedin) || !empty($zerif_socials_behance) || !empty($zerif_socials_dribbble) || 
		!empty($zerif_copyright) || !empty($zerif_socials_instagram) ):
			$footer_sections++;
		endif;
		
		if( $footer_sections == 1 ):
			$footer_class = 'col-md-12';
		elseif( $footer_sections == 2 ):
			$footer_class = 'col-md-6';
		elseif( $footer_sections == 3 ):
			$footer_class = 'col-md-4';
		elseif( $footer_sections == 4 ):
			$footer_class = 'col-md-3';
		else:
			$footer_class = 'col-md-3';
		endif;
		
		global $wp_customize;
		
		
		if( !empty($footer_class) ) {
			
			/* COMPANY ADDRESS */
			if( !empty($zerif_address_icon) || !empty($zerif_address) ) { 
				echo '<div class="'.$footer_class.' company-details">';
					
					if( !empty($zerif_address_icon) ) { 
						echo '<div class="icon-top red-text">';
							 echo '<img src="'.esc_url($zerif_address_icon).'" alt="" />';
						echo '</div>';
					}
					
					if( !empty($zerif_address) ) {
						echo '<div class="zerif-footer-address">';
							echo wp_kses_post( $zerif_address );
						echo '</div>';
					} else if( isset( $wp_customize ) ) {
						echo '<div class="zerif-footer-address zerif_hidden_if_not_customizer"></div>';
					}
					
				echo '</div>';
			}
			
			/* COMPANY EMAIL */
			if( !empty($zerif_email_icon) || !empty($zerif_email) ) {
				echo '<div class="'.$footer_class.' company-details">';
				
					if( !empty($zerif_email_icon) ) {
						echo '<div class="icon-top green-text">';
							echo '<img src="'.esc_url($zerif_email_icon).'" alt="" />';
						echo '</div>';
					}
					if( !empty($zerif_email) ) {
						echo '<div class="zerif-footer-email">';	
							echo wp_kses_post( $zerif_email );
						echo '</div>';
					} else if( isset( $wp_customize ) ) {
						echo '<div class="zerif-footer-email zerif_hidden_if_not_customizer"></div>';
					}	
				
				echo '</div>';
			}
			
			/* COMPANY PHONE NUMBER */
			if( !empty($zerif_phone_icon) || !empty($zerif_phone) ) {
				echo '<div class="'.$footer_class.' company-details">';
					if( !empty($zerif_phone_icon) ) {
						echo '<div class="icon-top blue-text">';
							echo '<img src="'.esc_url($zerif_phone_icon).'" alt="" />';
						echo '</div>';
					}
					if( !empty($zerif_phone) ) {
						echo '<div class="zerif-footer-phone">';
							echo wp_kses_post( $zerif_phone );
						echo '</div>';	
					} else if( isset( $wp_customize ) ) {
						echo '<div class="zerif-footer-phone zerif_hidden_if_not_customizer"></div>';
					}		
				echo '</div>';
			}
		}
		
		// open link in a new tab when checkbox "accessibility" is not ticked
		$attribut_new_tab = (isset($zerif_accessibility) && ($zerif_accessibility != 1) ? ' target="_blank"' : '' );
		
		if( !empty($zerif_socials_facebook) || !empty($zerif_socials_twitter) || !empty($zerif_socials_linkedin) || !empty($zerif_socials_behance) || !empty($zerif_socials_dribbble) || 
		!empty($zerif_copyright) || !empty($zerif_socials_instagram) ):
		
					echo '<div class="'.$footer_class.' copyright">';
					if(!empty($zerif_socials_facebook) || !empty($zerif_socials_twitter) || !empty($zerif_socials_linkedin) || !empty($zerif_socials_behance) || !empty($zerif_socials_dribbble)):
						echo '<ul class="social">';
						
						/* facebook */
						if( !empty($zerif_socials_facebook) ):
							echo '<li><a'.$attribut_new_tab.' href="'.esc_url($zerif_socials_facebook).'"><i class="fa fa-facebook"></i></a></li>';
						endif;
						/* twitter */
						if( !empty($zerif_socials_twitter) ):
							echo '<li><a'.$attribut_new_tab.' href="'.esc_url($zerif_socials_twitter).'"><i class="fa fa-twitter"></i></a></li>';
						endif;
						/* linkedin */
						if( !empty($zerif_socials_linkedin) ):
							echo '<li><a'.$attribut_new_tab.' href="'.esc_url($zerif_socials_linkedin).'"><i class="fa fa-linkedin"></i></a></li>';
						endif;
						/* behance */
						if( !empty($zerif_socials_behance) ):
							echo '<li><a'.$attribut_new_tab.' href="'.esc_url($zerif_socials_behance).'"><i class="fa fa-behance"></i></a></li>';
						endif;
						/* dribbble */
						if( !empty($zerif_socials_dribbble) ):
							echo '<li><a'.$attribut_new_tab.' href="'.esc_url($zerif_socials_dribbble).'"><i class="fa fa-dribbble"></i></a></li>';
						endif;
						/* instagram */
						if( !empty($zerif_socials_instagram) ):
							echo '<li><a'.$attribut_new_tab.' href="'.esc_url($zerif_socials_instagram).'"><i class="fa fa-instagram"></i></a></li>';
						endif;
						echo '</ul>';
					endif;
					echo '</div>';			
		endif;
	?>
<div class="disclaimer">Disclaimers:  We are not a broker-dealer or a registered investment adviser.  Under no circumstances does any information on this site constitute a recommendation to buy or sell a security, nor does it give investment advice.  This includes any publications or articles.  This is a research tool to be used by its subscribers in conjunction with the subscribers’ additional research and due diligence.  The information on this site is in no way guaranteed for completeness or accuracy.</div>
</div> <!-- / END CONTAINER -->
</footer> <!-- / END FOOOTER  -->
	</div><!-- mobile-bg-fix-whole-site -->
</div><!-- .mobile-bg-fix-wrap -->
<?php wp_footer(); ?>
<?php
	$subscriberCenterCount = 0;
	$blogCount = 0;
	$mySQLuser   = "user";
	$mySQLpass   = 'pass';
	$mySQLhost   = "host";
	$mySQLdb   = "dbname";
	$connection = mysql_connect($mySQLhost, $mySQLuser, $mySQLpass);
	if( !$connection ) {
		die('Could not connect to Database: '.mysql_error());
	}
	$db = mysql_select_db($mySQLdb,$connection);
	$unreadQuery = "SELECT COUNT(*) FROM `wpus_unread_posts` WHERE user_id = ".get_current_user_id();
	$unreadResult = mysql_result(mysql_query($unreadQuery,$connection),0);
	if( $unreadResult > 0 ) {
		?>
		<script type="text/javascript">
			jQuery("#site-navigation").addClass('forumLinkContainer');
		</script>
		<?php
	}
	$forumCountQuery = "SELECT COUNT(*) FROM `wpus_unread_posts` JOIN `wpus_posts` ON `wpus_posts`.ID = `wpus_unread_posts`.post_id WHERE user_id = ".get_current_user_id()." AND post_name = 'forum'";
	$forumCountResult = mysql_result(mysql_query($forumCountQuery,$connection),0);
	if( $forumCountResult > 0 ) {
		?>
		<script type="text/javascript">
			var html = jQuery("#menu-item-14395").html();
			var theIndex = html.indexOf('">')+2;
			var theURL1 = html.substr(0,theIndex);
			var theURL2 = html.substr(theIndex);
			var finalHtml = theURL1 + '<div class="newAlert"><?php echo $forumCountResult ?></div>' + theURL2;
			jQuery("#menu-item-14395").html(finalHtml);
		</script>
		<?php
		$subscriberCenterCount += $forumCountResult;
	}
	$announcementsCountQuery = "SELECT COUNT(*) FROM `wpus_unread_posts` JOIN `wpus_posts` ON `wpus_posts`.ID = `wpus_unread_posts`.post_id WHERE user_id = ".get_current_user_id()." AND post_name = 'announcements'";
	$announcementsCountResult = mysql_result(mysql_query($announcementsCountQuery,$connection),0);
	if( $announcementsCountResult > 0 ) {
		?>
		<script type="text/javascript">
			var html = jQuery("#menu-item-14389").html();
			var theIndex = html.indexOf('">')+2;
			var theURL1 = html.substr(0,theIndex);
			var theURL2 = html.substr(theIndex);
			var finalHtml = theURL1 + '<div class="newAlert"><?php echo $announcementsCountResult ?></div>' + theURL2;
			jQuery("#menu-item-14389").html(finalHtml);
		</script>
		<?php
		$subscriberCenterCount += $announcementsCountResult;
	}
	$helpfulCountQuery = "SELECT COUNT(*) FROM `wpus_unread_posts` JOIN `wpus_posts` ON `wpus_posts`.ID = `wpus_unread_posts`.post_id WHERE user_id = ".get_current_user_id()." AND post_name like '%helpful%'";
	$helpfulCountResult = mysql_result(mysql_query($helpfulCountQuery,$connection),0);
	if( $helpfulCountResult > 0 ) {
		?>
		<script type="text/javascript">
			var html = jQuery("#menu-item-14600").html();
			var theIndex = html.indexOf('">')+2;
			var theURL1 = html.substr(0,theIndex);
			var theURL2 = html.substr(theIndex);
			var finalHtml = theURL1 + '<div class="newAlert"><?php echo $helpfulCountResult ?></div>' + theURL2;
			jQuery("#menu-item-14600").html(finalHtml);
		</script>
		<?php
		$subscriberCenterCount += $helpfulCountResult;
	}
	$didCountQuery = "SELECT COUNT(*) FROM `wpus_unread_posts` JOIN `wpus_posts` ON `wpus_posts`.ID = `wpus_unread_posts`.post_id WHERE user_id = ".get_current_user_id()." AND post_name like '%did-you-know%'";
	$didCountResult = mysql_result(mysql_query($didCountQuery,$connection),0);
	if( $didCountResult > 0 ) {
		?>
		<script type="text/javascript">
			var html = jQuery("#menu-item-14601").html();
			var theIndex = html.indexOf('">')+2;
			var theURL1 = html.substr(0,theIndex);
			var theURL2 = html.substr(theIndex);
			var finalHtml = theURL1 + '<div class="newAlert"><?php echo $didCountResult ?></div>' + theURL2;
			jQuery("#menu-item-14601").html(finalHtml);
		</script>
		<?php
		$subscriberCenterCount += $didCountResult;
	}
	if( $subscriberCenterCount > 0 ) {
		?>
		<script type="text/javascript">
			var html = jQuery("#menu-item-14490").html();
			var theIndex = html.indexOf('">')+2;
			var theURL1 = html.substr(0,theIndex);
			var theURL2 = html.substr(theIndex);
			var finalHtml = theURL1 + '<div class="newAlertMain"><?php echo $subscriberCenterCount ?></div>' + theURL2;
			jQuery("#menu-item-14490").html(finalHtml);
		</script>
		<?php
	}
	$researchCountQuery = "SELECT COUNT(*) FROM `wpus_unread_posts` JOIN `wpus_posts` ON `wpus_posts`.ID = `wpus_unread_posts`.post_id JOIN `wpus_term_relationships` ON `wpus_term_relationships`.object_id = `wpus_posts`.ID JOIN `wpus_term_taxonomy` ON `wpus_term_taxonomy`.term_taxonomy_id = `wpus_term_relationships`.term_taxonomy_id JOIN `wpus_terms` on `wpus_terms`.term_id = `wpus_term_taxonomy`.term_id WHERE user_id = ".get_current_user_id()." AND name = 'Research Articles'";
	$researchCountResult = mysql_result(mysql_query($researchCountQuery,$connection),0);
	if( $researchCountResult > 0 ) {
		?>
		<script type="text/javascript">
			/*var html = jQuery("#menu-item-14010").html();
			var theIndex = html.indexOf('">')+2;
			var theURL1 = html.substr(0,theIndex);
			var theURL2 = html.substr(theIndex);
			var finalHtml = theURL1 + '<div class="newAlert"><?php echo $researchCountResult ?></div>' + theURL2;
			jQuery("#menu-item-14010").html(finalHtml);*/
		</script>
		<?php
		$blogCount += $researchCountResult;
	}
	$atAtGlanceCountQuery = "SELECT COUNT(*) FROM `wpus_unread_posts` JOIN `wpus_posts` ON `wpus_posts`.ID = `wpus_unread_posts`.post_id JOIN `wpus_term_relationships` ON `wpus_term_relationships`.object_id = `wpus_posts`.ID JOIN `wpus_term_taxonomy` ON `wpus_term_taxonomy`.term_taxonomy_id = `wpus_term_relationships`.term_taxonomy_id JOIN `wpus_terms` on `wpus_terms`.term_id = `wpus_term_taxonomy`.term_id WHERE user_id = ".get_current_user_id()." AND name = 'Graphs'";
	$atAtGlanceCountResult = mysql_result(mysql_query($atAtGlanceCountQuery,$connection),0);
	if( $atAtGlanceCountResult > 0 ) {
		?>
		<script type="text/javascript">
			/*var html = jQuery("#menu-item-14011").html();
			var theIndex = html.indexOf('">')+2;
			var theURL1 = html.substr(0,theIndex);
			var theURL2 = html.substr(theIndex);
			var finalHtml = theURL1 + '<div class="newAlert"><?php echo $atAtGlanceCountResult ?></div>' + theURL2;
			jQuery("#menu-item-14011").html(finalHtml);
			jQuery('.sub-menu').css('width','240px');*/
		</script>
		<?php
		$blogCount += $atAtGlanceCountResult;
	}
	$videosCountQuery = "SELECT COUNT(*) FROM `wpus_unread_posts` JOIN `wpus_posts` ON `wpus_posts`.ID = `wpus_unread_posts`.post_id JOIN `wpus_term_relationships` ON `wpus_term_relationships`.object_id = `wpus_posts`.ID JOIN `wpus_term_taxonomy` ON `wpus_term_taxonomy`.term_taxonomy_id = `wpus_term_relationships`.term_taxonomy_id JOIN `wpus_terms` on `wpus_terms`.term_id = `wpus_term_taxonomy`.term_id WHERE user_id = ".get_current_user_id()." AND name = 'Videos'";
	$videosCountResult = mysql_result(mysql_query($videosCountQuery,$connection),0);
	if( $videosCountResult > 0 ) {
		?>
		<script type="text/javascript">
			/*var html = jQuery("#menu-item-14012").html();
			var theIndex = html.indexOf('">')+2;
			var theURL1 = html.substr(0,theIndex);
			var theURL2 = html.substr(theIndex);
			var finalHtml = theURL1 + '<div class="newAlert"><?php echo $videosCountResult ?></div>' + theURL2;
			jQuery("#menu-item-14012").html(finalHtml);
			jQuery('.sub-menu').css('width','240px');*/
		</script>
		<?php
		$blogCount += $videosCountResult;
	}
	if( $blogCount > 0 ) {
		?>
		<script type="text/javascript">
			/*var html = jQuery("#menu-item-14018").html();
			var theIndex = html.indexOf('">')+2;
			var theURL1 = html.substr(0,theIndex);
			var theURL2 = html.substr(theIndex);
			var finalHtml = theURL1 + '<div class="newAlertMain"><?php echo $blogCount ?></div>' + theURL2;
			jQuery("#menu-item-14018").html(finalHtml);
			jQuery('.sub-menu').css('width','240px');*/
		</script>
		<?php
	}
	$user = wp_get_current_user();
	$unread_id = get_the_ID();
	if( $unread_id && $user ) {
		$isUnreadPost = "SELECT ID FROM `wpus_unread_posts` WHERE user_id = ".$user->ID." AND post_id = ".$post->ID;
		$isUnreadPost = mysql_query($isUnreadPost, $connection) or die ("Failed to pull unread post ID = ".$isUnreadPost);
		$isUnreadPostID = mysql_fetch_array($isUnreadPost,MYSQL_BOTH);
	
		if( $isUnreadPostID ) {
			$isUnreadDelete = "DELETE FROM `wpus_unread_posts` WHERE ID = ".$isUnreadPostID[ID];
			$result = mysql_query($isUnreadDelete, $connection) or die ("Failed to delete from unread_posts = ".$isUnreadDelete);
		}
	}
	$memberBasicMonthlyQuery = "SELECT * FROM `wpus_pmpro_membership_levels` WHERE id = 1";
	$memberBasicMonthly = mysql_query($memberBasicMonthlyQuery, $connection) or die ("Failed to pull basic monthly amount = ".$memberBasicMonthlyQuery);
	$memberBasicMonthlyAmount = mysql_fetch_array($memberBasicMonthly,MYSQL_BOTH);
	echo "<div class='basic_monthly hidden'>".$memberBasicMonthlyAmount[billing_amount]."</div>";
	$memberBasicAnnualQuery = "SELECT * FROM `wpus_pmpro_membership_levels` WHERE id = 8";
	$memberBasicAnnual = mysql_query($memberBasicAnnualQuery, $connection) or die ("Failed to pull basic annual amount = ".$memberBasicAnnualQuery);
	$memberBasicAnnualAmount = mysql_fetch_array($memberBasicAnnual,MYSQL_BOTH);
	echo "<div class='basic_annual hidden'>".$memberBasicAnnualAmount[billing_amount]."</div>";
	$memberPremiumMonthlyQuery = "SELECT * FROM `wpus_pmpro_membership_levels` WHERE id = 2";
	$memberPremiumMonthly = mysql_query($memberPremiumMonthlyQuery, $connection) or die ("Failed to pull basic annual amount = ".$memberPremiumMonthlyQuery);
	$memberPremiumMonthlyAmount = mysql_fetch_array($memberPremiumMonthly,MYSQL_BOTH);
	echo "<div class='premium_monthly hidden'>".$memberPremiumMonthlyAmount[billing_amount]."</div>";
	$memberPremiumAnnualQuery = "SELECT * FROM `wpus_pmpro_membership_levels` WHERE id = 3";
	$memberPremiumAnnual = mysql_query($memberPremiumAnnualQuery, $connection) or die ("Failed to pull basic annual amount = ".$memberPremiumAnnualQuery);
	$memberPremiumAnnualAmount = mysql_fetch_array($memberPremiumAnnual,MYSQL_BOTH);
	echo "<div class='premium_annual hidden'>".$memberPremiumAnnualAmount[billing_amount]."</div>";
	mysql_close($connection);
	
	if( is_user_logged_in() ) {
	?>
		<script type="text/javascript">
			jQuery('.col-md-9').css('width', '100%');
			if( jQuery('.separator-one').length > 0 ) {
				jQuery('.separator-one').hide();
			}
		</script>
		<?php
	} else {
		?>
		<script type="text/javascript">
			jQuery('.col-md-9').css('width', '75%');
			jQuery('.separator-one').show();
		</script>
		<?php
	}
	
	global $user_login, $user_email;
	get_currentuserinfo();
	
	?>
	<script type="text/javascript">
		$('#menu-item-14688').children(':first').text('<?php echo $user_login; ?> Summary');
	</script>
	<?php
	
	if( $_SERVER['REQUEST_URI'] == '/contact-us/' ) {
		?>
		<script type="text/javascript">
			$('#sow-contact-form-field-your-name-5750332e75be4').val('<?php echo $user_login; ?>');
			$('#sow-contact-form-field-your-email-5750332e75be4').val('<?php echo $user_email; ?>');
		</script>
		<?php
	}
?>
</body>
</html>