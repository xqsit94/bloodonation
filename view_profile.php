<?php

$title = "View Profile";
include './utils/config.php';
include './utils/templates/header.php';
include './utils/tpl/header_bar.tpl';
include('./utils/templates/left_panel.php');

if(!isset($_SESSION['DONOR_ID']) && !isset($_SESSION['DONOR_NAME']) && !isset($_SESSION['DONOR_CRYPT'])) {
  header("location: ./login.php");
}

echo '<div class="right-panel">
<div class="right-panel-in">
<div class="row">
<h2 class="title"><span>'.$name.' <span>Profile</span></span></h2>
<div class="row2">';
echo '</div>';
$query1 = mysqli_query($conn,"SELECT * FROM donor WHERE id='$donor_id' AND username='$donor_name' AND password='$donor_crypt'");
$query2 = mysqli_fetch_array($query1);
?>
<table class="view" align="center">
	<tr><td>Username:</td><td><font color="orange"><?=$query2['username'];?></font></td></tr>
	<tr><td>Fullname:</td><td><font color="orange"><?=$query2['fullname'];?></font></td></tr>
	<tr><td>Gender:</td><td><font color="orange"><?=$query2['gender'];?></font></td></tr>
	<tr><td>Date of Birth:</td><td><font color="orange"><?=$query2['day'];?> / <?=$query2['month'];?> / <?=$query2['year'];?></font></td></tr>
	<tr><td>Weight:</td><td><font color="orange"><?=$query2['weight'];?></font></td></tr>
	<tr><td>Bloodgroup:</td><td><font color="orange"><?=$query2['bloodgroup'];?></font></td></tr>
	<tr><td>Email:</td><td><font color="orange"><?=$query2['email'];?></font></td></tr>
	<tr><td>Mobile:</td><td><font color="orange"><?=$query2['mobile'];?></font></td></tr>
	<tr><td>Address:</td><td><font color="orange"><?=$query2['address'];?></font></td></tr>
	<tr><td>Area:</td><td><font color="orange"><?=$query2['city'];?></font></td></tr>
	<tr><td>Bio:</td><td><font color="orange"><?=$query2['bio'];?></font></td></tr>
</table>
<br><br>
<table align="center">
	<tr><td><a href="./edit_profile"><button class="button"><font color="white">Edit Profile</font></button></a></td>
	<td><a href="./change_pwd"><button class="button"><font color="white">Change Password</font></button></a></td></tr>
</table>
<br><br><br>
<?php
echo '</div></div>';
include "./utils/templates/footer.php";
?>