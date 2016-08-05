<?php

session_start();
include '../utils/config.php';
include("../utils/functions.php");
include("../utils/admin_functions.php");

if(!isset($_SESSION['adminsession'])) {
  header("location: ./login.php");
}

$pagename = "Dashboard";
include("./admin_header.php");
?>
  <div id="content">
    <ul id="topTabs">
      <li><a href="./index.php">Dashboard</a></li>
      <li><a href="./site_settings.php">Site Settings</a></li>
      <li><a href="./admin_settings.php">Admin Settings</a></li>
      <li class="selected"><a href="./manage_donors.php">Manage Donors</a></li>
      <li><a href="./count_view.php">View Donors</a></li>
	  <li><a href="./count_rqst.php">View Request</a></li>
    </ul>
    <div class="clear"></div>
    <h2>Manage Donors</h2>
	<fieldset>
	<legend><label>Search Donor</label></legend>
	<form name="input" action="./count_view.php" method="get">
<fieldset>
<legend><font color="black">Blood Group: </font></legend>
<select name="bloodgroup">
<option value="A1+" selected>A1+</option>
<option value="A1-" >A1-</option>
<option value="A1B+" >A1B+</option>
<option value="A1B-" >A1B-</option>
<option value="A2+" >A2+</option>
<option value="A2-" >A2-</option>
<option value="A2B+" >A2B+</option>
<option value="A2B-" >A2B-</option>
<option value="A+" >A+</option>
<option value="A-"/>A-</option>
<option value="B+"/>B+</option>
<option value="B-"/>B-</option>
<option value="AB+"/>AB+</option>
<option value="AB-"/>AB-</option>
<option value="O+"/>O+</option>
<option value="O-"/>O-</option>
</select>
</fieldset>
<br/>
<fieldset>
<legend><font color="black">Area: </font></legend>
<input type="text" name="area" value="" placeholder="Kundrathur"/>
</fieldset><br/>
<center><input type="submit" value=" Submit "/></center>
</form>
</fieldset>
	<li><h4><a href="add_donor.php">Add Donors</a><h4></li>
	<li><h4><a href="count_view.php">View Donors</a><h4></li>
	<li><h4><a href="count_view.php">Edit/Delete Donors</a><h4></li>
	</div>
<?php
include("./admin_footer.php");
?>