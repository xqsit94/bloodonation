<?php

$title = "Edit Profile";
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
<h2 class="title"><span>Log <span>In</span></span></h2>
<div class="row2">';
echo '</div></td>';
$error = "";
if(isset($_POST['submit']))
{
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

	//Validate Blood Group
	if($bloodgroup == "0")
	{
		$error.='<p class="error"> Please select bloodgroup.</p>';
	}
	//Validate Email
	if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		$error.='<p class="error"> Enter valid email address.</p>';
	}
	//Validate Phone
	if(!ctype_digit($mobile) OR strlen($mobile)!=10)
	{
		$error.='<p class="error"> Enter valid Mobile number.</p>';
	}
	//Validate Gender
	if($gender != 'Male' && $gender != 'Female')
	{
		$error.='<p class="error"> Please select your Gender.</p>';
	}
	//Validate DOB 
	if(intval($day)<1 OR intval($day)>31)
	{
		$error.='<p class="error"> Enter valid day between 1 - 31.</p>';
	}
	if(intval($month)<1 OR intval($month)>12)
	{
		$error.='<p class="error"> Enter valid month between 1 - 12.</p>';
	}
	//Validate area
	if(strlen($city)<3 OR strlen($city)>25)
	{
		$error.='<p class="error"> Enter valid area.</p>';
	}
}
?>
<?=$error?>
<?php
if(isset($_POST['submit'])&&$error == "")
{
	$query3 = mysqli_query($conn,"UPDATE donor SET fullname = '$fullname', gender = '$gender', weight = '$weight', bloodgroup = '$bloodgroup', email = '$email', mobile = '$mobile', address = '$address', city = '$city', bio = '$bio' WHERE id='$donor_id' AND username='$donor_name' AND password='$donor_crypt'");
	if($query3)
	{
		if(!isset($_SESSION))
		{
			session_start();
		}
		$_SESSION['success'] = "updated";
		header("Location: ./success");
		exit();
	}
}
$query1 = mysqli_query($conn,"SELECT * FROM donor WHERE id='$donor_id' AND username='$donor_name' AND password='$donor_crypt'");
$query2 = mysqli_fetch_array($query1);
//echo var_dump($query1);
?>

		<form class="reg" method="post" action="" >
<table align="center">
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
<center><input class="button" type="submit" name="submit" value=" Update "></center>
</form>


<?php
echo '</div></div>';
include "./utils/templates/footer.php";
?>