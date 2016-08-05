<?php

session_start();
include '../utils/config.php';
include("../utils/functions.php");
include("../utils/admin_functions.php");

if(!isset($_SESSION['adminsession'])) {
  header("location: ./login.php");
}
if(isset($_SESSION['success']))
{
 $check = $_SESSION['success'];	
}
else
{
	header("Location: ./index.php");
}
if($check == "adddonor")
{
$pagename = "Success";
include("./admin_header.php");
echo '  <div id="content">
    <ul id="topTabs">
      <li><a href="./index.php">Dashboard</a></li>
      <li><a href="./site_settings.php">Site Settings</a></li>
      <li><a href="./admin_settings.php">Admin Settings</a></li>
      <li class="selected"><a href="./manage_donors.php">Manage Donors</a></li>
      <li><a href="./count_view.php">View Donors</a></li>
	  <li><a href="./count_rqst.php">View Request</a></li>
    </ul>
    <div class="clear"></div>
    <h2>Success</h2>';
echo '<center><h4> Donor is added successfully</h4><br><a href="./add_donor.php">Go Back</a></center></div>';
unset($_SESSION['success']);
include("./admin_footer.php");
}
if(!empty($_SESSION['success']))
{
	header("Location: ./index.php");
}