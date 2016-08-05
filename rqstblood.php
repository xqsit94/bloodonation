<?php
$title = "Request Blood";
include './utils/config.php';
include './utils/templates/header.php';
include './utils/tpl/header_bar.tpl';
include('./utils/templates/left_panel.php');

echo '<div class="right-panel">
<div class="right-panel-in">
<div class="row">
<h2 class="title"><span>Request <span>Blood</span></span></h2>
<div class="row2">';
echo '</div></td>';

	include('./utils/classes/validate-bloodrqst.php');

?>	
<?=$error?>

<?php 
if(isset($_POST['submit'])&&$error == "")
{

	$sql = "INSERT INTO bloodrqst(patient, hospital, day, month, year, phone, bloodgroup, quantity, person ,msg) VALUES ('$patient', '$hospital', '$day', '$month', '$year', '$phone', '$bloodgroup', '$quantity', '$person', '$msg')";
	mysqli_query($conn,$sql);
	mysqli_close($conn);
	$to = "mani@tadka.com";
	$subject = "New Blood Request Received from".$person;
	$body = "<br><br>
	<CENTER><TABLE>
	<TR WIDTH = 200 height = 10 align = center valign = middle bgcolor =#00EBEB><TH>Patient Name</TH><TH>Required Date</TH><TH>Blood Group</TH><TH>Contact Number</TH><TH>Quantity Required</TH><TH>Hospital Name</TH><TH>Person to Contact</TH><TH>Message</TH></TR>
	<TR><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB>".$patient."</TD><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB>".$day."-".$month."-".$year."</TD><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB><font color = red>".$bloodgroup."</font></TD><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB>".$phone."</TD><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB>".$quantity."</TD><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB>".$hospital."</TD><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB>".$person."</TD><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB>".$message."</TD></TR>
	<br><br>- Regards: ".$site_name;
	$headers .= "From: ".$site_name."\r\n";
	$headers .= "Reply-To: ".$site_email."\r\n";
	$headers .= "Return-Path: ".$site_email."\r\n";
	$headers .= "X-Mailer: PHP5\n";
	$headers .= 'MIME-Version: 1.0'."\n";
	$headers .= 'Content-type: text/html;
	charset=iso-8859-1'."\r\n";
        mail($to,$subject,$body,$headers);
	session_start();
	$_SESSION['success'] = "rqstblood";
	header("Location: ./success");
	exit();
	
	//var_dump($_POST);
}
?>

<form class="reg" method="post" action="./rqstblood">
<table align="center">
<tr><td>Patient Name:</td><td><input type="text" class="form" name="patient" value="<?=@$patient?>"></td></tr>
<tr><td>Hospital Name:</td><td><input type="text" class="form" name="hospital" value="<?=@$hospital?>"></td></tr>
<tr><td>Required Date:</td><td><input type="number" class="form" name="day" placeholder="DD" value="<?=@$day?>" style="width:40px;" size="2"> - <input type="number" class="form" name="month" placeholder="MM" style="width:40px;" value="<?=@$month?>" size="2"> - <input type="number" class="form" name="year" placeholder="YYYY" style="width:60px;" value="<?=@$year?>" size="4"></td></tr>
<tr><td>Phone No:</td><td><input type="text" class="form" name="phone" value="<?=@$phone?>"></span></td></tr>
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

<tr><td>Units Required:</td><td><input type="text" class="form" name="quantity" value="<?=@$quantity?>"></td></tr>
<tr><td>Person To Contact:</td><td><input type="text" class="form" name="person" placeholder="Please Enter Your Name" value="<?=@$person?>"></td></tr>
<tr><td>Message:</td><td><textarea name="msg" class="form"><?=@$msg?></textarea></td></tr>

<tr><td></td><td></table><br>
<center><input type="submit" class="button" value=" Submit " name="submit"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" class="button" value=" Cancel " name="reset"></td></tr></center>
</center></form>
<br/><br/><br/>

<?php
echo '</div></div>';
include "./utils/templates/footer.php";
?>


	