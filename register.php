<?php
$title = "Register";
include './utils/config.php';
include './utils/templates/header.php';
include './utils/tpl/header_bar.tpl';
include('./utils/templates/left_panel.php');

echo '<div class="right-panel">
<div class="right-panel-in">
<div class="row">
<h2 class="title"><span>Register as <span>Donor</span></span></h2>
<div class="row2">';
echo '</div></td>';
	
	include('./utils/classes/validate-reg.php');

?>	
<?=$error?>
<?php 
if(isset($_POST['submit'])&&$error == ""&&$error_username == "")
{
	$password = md5($password);

	$sql = "INSERT INTO donor(username, password, fullname, gender, day, month, year, bloodgroup, email, mobile, address, city ,bio) VALUES ('$username', '$password', '$fullname', '$gender', '$day', '$month', '$year', '$bloodgroup', '$email', '$mobile', '$address', '$city', '$bio')";
	mysqli_query($conn,$sql);
	mysqli_close($conn);
	session_start();
	$_SESSION['success'] = "register";
	header("Location: ./success");
	exit();
}
if(!isset($_SESSION['DONOR_ID']) && !isset($_SESSION['DONOR_NAME']) && !isset($_SESSION['DONOR_CRYPT'])) {
?>

<form class="reg" method="post" action="./register" >
<table align="center">
<tr><td>Username:</td> <td> <input type="text" class="form" name="username" value="<?=@$username?>"/></td></tr><?=$error_username?><tr>
<td>Password:</td>
<td>
<input type="password" class="form" name="password" value="<?=@$password?>" /></td></tr>
<tr><td>Retypepassword:</td><td><input type="password" class="form" name="retypepwd" value="<?=@$retypepwd?>" ></td></tr>
<tr><td>Fullname:</td><td><input type="text" class="form" name="fullname" value="<?=@$fullname?>"/></td></tr>
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
<tr><td>Date Of Birth:</td><td><input type="number" class="form" name="day" placeholder="DD" value="<?=@$day?>" style="width:40px;" size="2"> / <input type="number" class="form" name="month" placeholder="MM" style="width:40px;" value="<?=@$month?>" size="2"> / <input type="number" class="form" name="year" placeholder="YYYY" style="width:60px;" value="<?=@$year?>" size="4"></td></tr>
<tr><td>Weight:</td><td><input type="text" class="form" name="weight" value="<?=@$weight?>" size="4"></td></tr>
<tr><td>Blood Group:</td><td><select name="bloodgroup" class="form">
<option value="0" <?php selected(@bloodgroup,0) ?> />Select Blood Group </option>
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

<tr><td>Email:</td><td><input type="text" class="form" name="email" placeholder="name@domain.com" value="<?=@$email?>"></td></tr>
<tr><td>Mobile:</td><td><input type="text" class="form" name="mobile" placeholder="10 digit mobile number" value="<?=@$mobile?>"></td></tr>
<tr><td>Address:</td>
<td><textarea class="form" name="address"
           rows="5"
           cols="25"/><?=@$address?></textarea></td></tr>
		   <tr><td>Area:</td><td><input type="text" class="form" name="city" value="<?=@$city?>" placeholder="Kundrathur"></td></tr>

<tr><td>Bio:</td><td><textarea class="form" name="bio"><?=@$bio?></textarea></td></tr>

<tr><td></td><td>
</table><br/>
<center><input type="submit" class="button" name="submit" value="SUBMIT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" class="button" name="Cancel" value="RESET"></td></tr>
</center>
</form> 
<?php
}
else
{
	echo '<br><center><h1 style="color: white;">You have already been Registered.</h1></center>';
}
?>
<br><br>

<?php
echo '</div></div>';
include "./utils/templates/footer.php";
?>