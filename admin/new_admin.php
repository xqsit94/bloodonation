<?php

session_start();
include '../utils/config.php';
include("../utils/functions.php");
include("../utils/admin_functions.php");

if(!isset($_SESSION['adminsession'])) {
  header("location: ./login.php");
}

if(isset($_POST['adminsettings'])) {
  if($_POST['adminuser'] == "") {
    $error = "You did not enter an admin username";
  }else if($_POST['adminpass'] == "") {
    $error = "You did not enter an admin password";
  }else if($_POST['adminemail'] == "") {
    $error = "You did not enter an admin email";
  }else if(!verifyEmail($_POST['adminemail'])) {
    $error = "You did not enter a valid admin email";
  }else{
    $adminuser = prevent_sql($_POST['adminuser']);
	$adminpass = prevent_sql($_POST['adminpass']);
	$adminpass = md5($adminpass);
	$adminemail = prevent_sql($_POST['adminemail']);
    mysqli_query($conn,"INSERT INTO admin (username, password, email) VALUES ('$adminuser','$adminpass','$adminemail')");
    $success = "The admin settings have been successfully updated.";
  }
}

$pagename = "Admin Profile Settings";
include("./admin_header.php");
?>
  <div id="content">
    <ul id="topTabs">
      <li><a href="./index.php">Dashboard</a></li>
      <li><a href="./site_settings.php">Site Settings</a></li>
      <li class="selected"><a href="./admin_settings.php">Admin Settings</a></li>
      <li><a href="./manage_donors.php">Manage Donors</a></li>
	  <li><a href="./count_view.php">View Donors</a></li>
	  <li><a href="./count_rqst.php">View Request</a></li>
    </ul>
    <div class="clear"></div>
    <h2>Add New Admin</h2>
<?php
if(isset($error)) {
  print("    <div class=\"error\"><b>Error:</b> ".$error."</div>");
}
if(isset($success)) {
  print("    <div class=\"message\">".$success."</div>");
}
?>
    <form method="post" action="./new_admin.php" id="adminsettings">
      <input type="hidden" name="adminsettings" value="1" />
      <label for="adminuser">Admin Username</label><br />
      <input type="text" name="adminuser" id="adminuser" value="" size="40" /><br />
      <span class="supporting">The admin accounts username.</span><br /><br />
      <label for="adminpass">Admin Password</label><br />
      <input type="text" name="adminpass" id="adminpass" value="" size="40" /><br />
      <span class="supporting">The admin accounts password.</span><br /><br />
      <label for="adminemail">Admin Email</label><br />
      <input type="text" name="adminemail" id="adminemail" value="" size="40" /><br />
      <span class="supporting">Admin email address, emails sent out by the script will be sent to this address.</span><br /><br />
      <input type="submit" value="Save" class="submit" /> <input type="reset" value="Reset" class="submit" />
    </form>
  </div>
<?php
include("./admin_footer.php");
?>
