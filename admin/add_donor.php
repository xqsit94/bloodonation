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
    <h2>Add Donor</h2>
<?php
	$error = "";
if(isset($_POST['submit']))
{
	$username=prevent_sql($_POST['username']);
	$password=prevent_sql($_POST['password']);
	$retypepwd=prevent_sql($_POST['retypepwd']);
	$fullname=prevent_sql($_POST['fullname']);
	$gender=prevent_sql($_POST['gender']);
	$day=prevent_sql($_POST['day']);
	$month=prevent_sql($_POST['month']);
	$year=prevent_sql($_POST['year']);
	$weight=prevent_sql($_POST['weight']);
	$bloodgroup=prevent_sql($_POST['bloodgroup']);
	$email=prevent_sql($_POST['email']);
	$mobile=prevent_sql($_POST['mobile']);
	$address=prevent_sql($_POST['address']);
	$city=prevent_sql($_POST['city']);
	$bio=prevent_sql($_POST['bio']);
	//Validate Password
	if(strlen($password)<5 OR strlen($password)>20)
	{
		$error.='<p class="error"> Password should be 5-20 characters long.</p>';
	}
	//Validate Confirm Password
	if($retypepwd != $password)
	{
		$error.='<p class="error">Retype Password Mismatch</p>';
	}
}
	
?>	
<?=$error?>
<?php 
if(isset($_POST['submit'])&&$error == "")
{
	$_POST['password'] = md5($_POST['password']);

	$sql = "INSERT INTO donor(username, password, fullname, gender, day, month, year, bloodgroup, email, mobile, address, city ,bio) VALUES ('$username', '$password', '$fullname', '$gender', '$day', '$month', '$year', '$bloodgroup', '$email', '$mobile', '$address', '$city', '$bio')";
	mysqli_query($conn,$sql);
	mysqli_close($conn);
	session_start();
	$_SESSION['success'] = "adddonor";
	header("Location: ./success.php");
	exit();
}
?>

<form method="post" action="./add_donor.php" >
<table align="center">
<tr><td>Username:</td> <td> <input type="text" name="username" value="<?=@$username?>"/></td></tr><tr>
<td>Password:</td>
<td>
<input type="password" name="password" value="<?=@$password?>" /></td></tr>
<tr><td>Retypepassword:</td><td><input type="password"   name="retypepwd" value="<?=@$retypepwd?>" ></td></tr>
<tr><td>Fullname:</td><td><input type="text"   name="fullname" value="<?=@$fullname?>"/></td></tr>
<tr><td>Gender: </td><td><input type="radio" class="rform" name="gender" value="Male"
<?php
if(@$gender == 'Male')
	echo 'checked = "true"';
?> checked/> Male
<input type="radio" class="rform" name="gender" value="Female"
<?php
if(@$gender == 'Female')
	echo 'checked = "true"';
?>/> Female</td></tr>
<tr><td>Date Of Birth:</td><td><input type="number"   name="day" placeholder="DD" value="<?=@$day?>" style="width:40px;" size="2"> / <input type="number"   name="month" placeholder="MM" style="width:40px;" value="<?=@$month?>" size="2"> / <input type="number"   name="year" placeholder="YYYY" style="width:60px;" value="<?=@$year?>" size="4"></td></tr>
<tr><td>Weight:</td><td><input type="text"   name="weight" value="<?=@$weight?>" size="4"></td></tr>
<tr><td>Blood Group:</td><td><select name="bloodgroup"  >
<option value="0" <?php selected(@$bloodgroup,0) ?> />Select Blood Group </option>
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

<tr><td>Email:</td><td><input type="text"   name="email" placeholder="name@domain.com" value="<?=@$email?>"></td></tr>
<tr><td>Mobile:</td><td><input type="text"   name="mobile" placeholder="10 digit mobile number" value="<?=@$mobile?>"></td></tr>
<tr><td>Address:</td>
<td><textarea   name="address"
           rows="5"
           cols="25"/><?=@$address?></textarea></td></tr>
		   <tr><td>Area:</td><td><input type="text"   name="city" value="<?=@$city?>" placeholder="Kundrathur"></td></tr>

<tr><td>Bio:</td><td><textarea   name="bio"><?=@$bio?></textarea></td></tr>

<tr><td></td><td>
</table><br/>
<center><input type="submit" name="submit" value="SUBMIT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="Cancel" value="RESET"></td></tr>
</center>
</form> 

<?php
include("./admin_footer.php");
?>
	