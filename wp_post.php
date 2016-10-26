/* code to add an unread value to the proper table. */
	if( $post_status == 'publish' && ( $post_type == 'dwqa-question' || $post_type == 'dwqa-answer' || $post_type == 'post' || $post_type == 'ufaq' || $post_type == 'page' || $post_type == 'revision' ) ) {
		$mySQLuser   = "user";
		$mySQLpass   = 'pass';
		$mySQLhost   = "host";
		$mySQLdb   = "dbname";
		$connection = mysql_connect($mySQLhost, $mySQLuser, $mySQLpass);
		if( !$connection ) {
			die('Could not connect to Database: '.mysql_error());
		}
		$db = mysql_select_db($mySQLdb,$connection);
		$userListQuery="SELECT `wpus_users`.ID, name FROM `wpus_users` JOIN `wpus_pmpro_memberships_users` ON `wpus_pmpro_memberships_users`.user_id = `wpus_users`.ID JOIN `wpus_pmpro_membership_levels` ON `wpus_pmpro_membership_levels`.id = `wpus_pmpro_memberships_users`.membership_id WHERE `wpus_pmpro_memberships_users`.enddate = '0000-00-00' OR `wpus_pmpro_memberships_users`.enddate > '".date("Y-m-d")."'";
		$userListResult=mysql_query($userListQuery,$connection) or die("Failed to pull user list = ".$userListQuery);
		while ($buffer=mysql_fetch_array($userListResult,MYSQL_BOTH)) {$userCollection[$c]=$buffer;$c++;}
		while(list($key,$val)=each($userCollection)) {
			if( preg_match('/Premium/',$val[name]) ) {
				$query="INSERT INTO `wpus_unread_posts` (ID, user_id, post_id) VALUES (null, ".$val[ID].", ".$post_ID.")";
				$result=mysql_query($query,$connection) or die("Failed to insert count into unread_posts= ".$query);
			}
		}
		mysql_close($connection);
	};
	return $post_ID;
}