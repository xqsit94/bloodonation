<?php

session_start();
include '../utils/config.php';
include("../utils/functions.php");
include("../utils/admin_functions.php");

if(!isset($_SESSION['adminsession'])) {
  header("location: ./login.php");
}

if(isset($_GET['id']))
{
	$id=$_GET['id'];
if(isset($_POST['submit']))
{
	$username=prevent_sql($_POST['username']);
	$fullname=prevent_sql($_POST['fullname']);
	$gender=prevent_sql($_POST['gender']);
	$weight=prevent_sql($_POST['weight']);
	$bloodgroup=prevent_sql($_POST['bloodgroup']);
	$email=prevent_sql($_POST['email']);
	$mobile=prevent_sql($_POST['mobile']);
	$address=prevent_sql($_POST['address']);
	$city=prevent_sql($_POST['city']);
	$bio=prevent_sql($_POST['bio']);
	$query3 = mysqli_query($conn,"UPDATE donor SET username = '$username', fullname = '$fullname', gender = '$gender', weight = '$weight', bloodgroup = '$bloodgroup', email = '$email', mobile = '$mobile', address = '$address', city = '$city', bio = '$bio' WHERE id=$id");
	if($query3)
	{
		session_start();
		$_SESSION['success'] = "updated";
		header("Location: ./count_view.php");
		exit();
	}
}
$query1 = mysqli_query($conn,"select * from donor where id=$id");
$query2 = mysqli_fetch_array($query1);
?>
<?php
$pagename = "Edit Donor ";
include("./admin_header.php");
?>
  <div id="content">
    <ul id="topTabs">
      <li><a href="./index.php">Dashboard</a></li>
      <li><a href="./site_settings.php">Site Settings</a></li>
      <li><a href="./admin_settings.php">Admin Settings</a></li>
      <li><a href="./manage_donors.php">Manage Donors</a></li>
      <li><a href="./count_view.php">View Donors</a></li>
    </ul>

		<form method="post" action="" >
<table align="center">
<tr><td>Username:</td> <td> <input type="text" class="form" name="username" value="<?=$query2['username'];?>"/></td></tr><tr>
<tr><td>Fullname:</td><td><input type="text" class="form" name="fullname" value="<?=$query2['fullname'];?>"/></td></tr>
<tr><td>Gender: </td><td><input type="radio" class="rform" name="gender" value="Male"
<?php
if($query2['gender'] == 'Male')
	echo 'checked = "true"';
?> checked/> Male
<input type="radio" class="rform" name="gender" value="Female"
<?php
if($query2['gender'] == 'Female')
	echo 'checked = "true"';
?>/> Female</td></tr>
<tr><td>Date Of Birth:</td><td><input type="number" class="form" name="day" placeholder="DD" value="<?=$query2['day'];?>" style="width:40px;" size="2"> / <input type="number" class="form" name="month" placeholder="MM" style="width:40px;" value="<?=$query2['month'];?>" size="2"> / <input type="number" class="form" name="year" placeholder="YYYY" style="width:60px;" value="<?=$query2['year'];?>" size="4"></td></tr>
<tr><td>Weight:</td><td><input type="text" class="form" name="weight" value="<?=$query2['weight'];?>" size="4"></td></tr>
<tr><td>Bloodgroup:</td><td><select name="bloodgroup" class="form">
	<?php $bloodgroup = $query2['bloodgroup']; ?>
<option value="A+" <?php selected(@$bloodgroup,"A+") ?> />A+</option>
<option value="A-" <?php selected(@$bloodgroup,"A-") ?> />A-</option>
<option value="A1+" <?php selected(@$bloodgroup,"A1+") ?> />A1+</option>
<option value="A1-" <?php selected(@$bloodgroup,"A1-") ?> />A1-</option>
<option value="A2+" <?php selected(@$bloodgroup,"A2+") ?> />A2+</option>
<option value="A2-" <?php selected(@$bloodgroup,"A2-") ?> />A2-</option>
<option value="A1B+" <?php selected(@$bloodgroup,"A1B+") ?> />A1B+</option>
<option value="A1B-" <?php selected(@$bloodgroup,"A1B-") ?> />A1B-</option>
<option value="A2B+" <?php selected(@$bloodgroup,"A2B+") ?> />A2B+</option>
<option value="A2B-" <?php selected(@$bloodgroup,"A2B-") ?> />A2B-</option>
<option value="B+" <?php selected(@$bloodgroup,"B+") ?> />B+</option>
<option value="B-" <?php selected(@$bloodgroup,"B-") ?> />B-</option>
<option value="AB+" <?php selected(@$bloodgroup,"AB+") ?> />AB+</option>
<option value="AB-" <?php selected(@$bloodgroup,"AB-") ?> />AB-</option>
<option value="O+" <?php selected(@$bloodgroup,"O+") ?> />O+</option>
<option value="O-" <?php selected(@$bloodgroup,"O-") ?> />O-</option>
</select></td></tr>
<tr><td>Email:</td><td><input type="text" class="form" name="email" placeholder="name@domain.com" value="<?=$query2['email'];?>"></td></tr>
<tr><td>Mobile:</td><td><input type="text" class="form" name="mobile" placeholder="10 digit mobile number" value="<?=$query2['mobile'];?>"></td></tr>
<tr><td>Address:</td>
<td><textarea class="form" name="address"
           rows="5"
           cols="25"/><?=$query2['address'];?></textarea></td></tr>
		   <tr><td>Area:</td><td><input type="text" class="form" name="city" value="<?=$query2['city'];?>" placeholder="Kundrathur"></td></tr>

<tr><td>Bio:</td><td><textarea class="form" name="bio"><?=$query2['bio'];?></textarea></td></tr>

<tr><td></td><td>
</table><br/>
<center><input type="submit" name="submit" value=" Update "></center>
</form>

	</div>
<?php
}
?>
<?php
include("./admin_footer.php");
?>