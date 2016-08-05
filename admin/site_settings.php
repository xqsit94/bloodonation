<?php

session_start();
include '../utils/config.php';
include("../utils/functions.php");
include("../utils/admin_functions.php");

if(!isset($_SESSION['adminsession'])) {
  header("location: ./login.php");
}

if(isset($_POST['sitesettings'])) {
  if(trim($_POST['site_name']) == "") {
    $error = "You did not enter a site name.";
  }else if(trim($_POST['site_domain']) == "") {
    $error = "You did not enter a site URL.";
  }else if(trim($_POST['site_metadesc']) == "") {
    $error = "You did not enter a site Meta Description.";
  }else if(!verifyEmail($_POST['site_email'])) {
    $error = "You did not enter a valid admin email";
  }else if(trim($_POST['site_metakey']) == "") {
    $error = "You did not enter a site Meta Keywords.";
  }else{
    mysqli_query($conn,"UPDATE `".$table_prefix."settings` SET `value` = '" . prevent_sql($_POST['site_name']) . "' WHERE `setting` = 'site_name';");
    mysqli_query($conn,"UPDATE `".$table_prefix."settings` SET `value` = '" . prevent_sql($_POST['site_metakey']) . "' WHERE `setting` = 'site_metakey';");
    mysqli_query($conn,"UPDATE `".$table_prefix."settings` SET `value` = '" . prevent_sql($_POST['site_metadesc']) . "' WHERE `setting` = 'site_metadesc';");
    mysqli_query($conn,"UPDATE `".$table_prefix."settings` SET `value` = '" . prevent_sql($_POST['site_domain']) . "' WHERE `setting` = 'site_domain';");
	mysqli_query($conn,"UPDATE `".$table_prefix."settings` SET `value` = '" . prevent_sql($_POST['site_email']) . "' WHERE `setting` = 'site_email';");
	mysqli_query($conn,"UPDATE `".$table_prefix."settings` SET `value` = '" . prevent_sql($_POST['site_copyright']) . "' WHERE `setting` = 'site_copyright';");
    $success = "The admin settings have been successfully updated.";
  }
}

$settings_result = mysqli_query($conn,"SELECT * FROM `".$table_prefix."settings`");
$settings_row = mysqli_fetch_array($settings_result);

$pagename = "Site Settings";
include("./admin_header.php");
?>
  <div id="content">
    <ul id="topTabs">
      <li><a href="./index.php">Dashboard</a></li>
      <li class="selected"><a href="./site_settings.php">Site Settings</a></li>
      <li><a href="./admin_settings.php">Admin Settings</a></li>
      <li><a href="./manage_donors.php">Manage Donors</a></li>
	  <li><a href="./count_view.php">View Donors</a></li>
	  <li><a href="./count_rqst.php">View Request</a></li>
    </ul>
    <div class="clear"></div>
    <h2>Site Settings</h2>
<?php
if(isset($error)) {
  print("    <div class=\"error\"><b>Error:</b> ".$error."</div>");
}
if(isset($success)) {
  print("    <div class=\"message\">".$success."</div>");
}
?>
    <form method="post" action="./site_settings.php" id="sitesettings">
      <input type="hidden" name="sitesettings" value="1" />
      
      <label for="site_name">Site Name</label><br />
      <input type="text" name="site_name" id="site_name" value="<?php print stripslashes(get_config('site_name')); ?>" size="40" /><br />
      <span class="supporting">The name of the website. E.g. <i>Easy File</i></span><br /><br />
      
      <label for="site_metakey">Meta Keywords</label><br />
      <input type="text" name="site_metakey" id="site_metakey" value="<?php print stripslashes(get_config('site_metakey')); ?>" size="85" /><br />
      <span class="supporting">The meta keywords that will be displayed on all pages.</span><br /><br />
      
      <label for="site_metadesc">Meta Description</label><br />
      <input type="text" name="site_metadesc" id="site_metadesc" value="<?php print stripslashes(get_config('site_metadesc')); ?>" size="85" /><br />
      <span class="supporting">The meta description that will be displayed on all pages.</span><br /><br />
      
      <label for="site_domain">Site Domain</label><br />
      <input type="text" name="site_domain" id="site_email" value="<?php print stripslashes(get_config('site_domain')); ?>" size="40" /><br />
      <span class="supporting">The full site domain excluding http:// and any slashes. E.g. <i>www.domain.com</i></span><br /><br />
	  
	  <label for="site_email">Site Email</label><br />
      <input type="text" name="site_email" id="site_copyright" value="<?php print stripslashes(get_config('site_email')); ?>" size="40" /><br />
      <span class="supporting">The site email address, emails sent out by the script to admins will be sent from this address..</span><br /><br />
	  
	  <label for="site_domain">Site Copyright</label><br />
      <input type="text" name="site_copyright" id="site_copyright" value="<?php print stripslashes(get_config('site_copyright')); ?>" size="40" /><br />
      <span class="supporting">The Site copyright will be displayed on footer.</span><br /><br />
      
	  <input type="submit" value="Save" class="submit" /> <input type="reset" value="Reset" class="submit" />
    </form>
<?php
  if(isset($_POST['randmsg'])) {
  $file = '../utils/templates/quotes.txt';
  $content = trim($_POST['content']);
  file_put_contents($file, $content);
  }
  ?>
    <form action="?" method="post">
    <label for="site_quote">Site Quotes</label><br />
    <textarea rows="15" cols="150" size="200" name="content"><?php echo file_get_contents('../utils/templates/quotes.txt'); ?></textarea><br/>
    <span class="supporting">The Site Quotes will be displayed randomly near the header menu.</span><br/><br/>
    <input type="submit" class="submit" name="randmsg" value="Apply Site Quotes">
    </form>
  </div>
<?php
include("./admin_footer.php");
?>
