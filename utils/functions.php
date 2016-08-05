<?php

// Connect to the MySQL database
$conn = mysqli_connect($host, $username, $password, $db_name);
if(mysqli_connect_error()) 
{
$errmsg = 'MySQL Error:'.mysqli_connect_error();
die('Could not connect to the database');
}


// Assign important variables their setting values
$site_name = get_config('site_name');
$site_domain = get_config('site_domain');
$site_metadesc = get_config('site_metadesc');
$site_metakey = get_config('site_metakey');
$site_copyright = get_config('site_copyright');
$site_email = get_config('site_email');

// Get site configuration
function get_config($setting_name) {
	global $table_prefix;
	global $conn;
	$setting_name = mysqli_real_escape_string($conn, $setting_name);
	$setting_query = mysqli_query($conn,"SELECT `value` FROM `" . $table_prefix . "settings` WHERE `setting` = '" .$setting_name. "'");
	while($row = mysqli_fetch_array($setting_query)) {
	return $row[0];
	}
}

//Prevent Sql Injection
function prevent_sql($data) {
   global $conn;
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   $date = mysqli_real_escape_string($conn,$data);
   return $data;
}

function selected($bloodgroup,$choice) {
	if($bloodgroup == $choice)
		echo "selected";
}

function randmsg() {
	$msg_array = file("./utils/templates/quotes.txt");
	$msg = array_rand($msg_array);
	return $msg_array[$msg];
}

function sendmail($to,$subject,$body) {
	global $site_name;
	global $site_email;
	$headers .= "From: ".$site_name."\r\n";
	$headers .= "Reply-To: ".$site_email."\r\n";
	$headers .= "Return-Path: ".$site_email."\r\n";
	$headers .= "X-Mailer: PHP5\n";
	$headers .= 'MIME-Version: 1.0'."\n";
	$headers .= 'Content-type: text/html;
	charset=iso-8859-1'."\r\n";
	return mail($to,$subject,$body,$headers);
}
?>