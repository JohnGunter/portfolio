//[faq_category_name]
function faq_category_name() {
	$sqluser   = "user";
	$sqlpass   = 'pass';
	$sqlhost   = "host";
	$sqldb   = "dbname";
	$connection = mysql_connect($sqlhost, $sqluser, $sqlpass);
	if( !$connection ) {
		die('Could not connect to Database: '.mysql_error());
	}
	$db = mysql_select_db($sqldb,$connection);
	$query = "select name from `wpus_terms` join `wpus_term_taxonomy` on `wpus_terms`.term_id = `wpus_term_taxonomy`.term_id where taxonomy = 'ufaq-category'";
	$daftar = mysql_query($query,$connection) or die("Failed to pull category name list = ".$query);
	
	$category_list = "<option>All FAQ</option>";
	
	while ($buffer = mysql_fetch_array($daftar,MYSQL_BOTH)) {$result[$c]=$buffer;$c++;};
	
	while (list($key, $val)=each($result)) {
		$category_list .= "<option>$val[name]</option>";
	}
	
	mysql_close($connection);
	return  $category_list;
}
add_shortcode( 'faq_category_name', 'faq_category_name' );