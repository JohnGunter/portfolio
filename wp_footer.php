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
?>