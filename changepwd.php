<?php
$title = "Change Password";
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
<h2 class="title"><span>Change <span>Password</span></span></h2>
<div class="row2">';
echo '</div>';

$error_oldpwd = "";
$error_newpwd = "";
$error_conformpwd = "";

if(isset($_POST['change']))
{
	$oldpwd = prevent_sql($_POST['oldpwd']);
	$newpwd = prevent_sql($_POST['newpwd']);
	$conformpwd = prevent_sql($_POST['conformpwd']);
	$oldpwd = md5($oldpwd);
	if($oldpwd == "")
	{
		$error_oldpwd .= '<td><font color="red">Fill this Field.</font></td>';	
	}
	if($newpwd == "")
	{
		$error_newpwd .= '<td><font color="red">Fill this Field.</font></td>';
	}
	if($conformpwd == "")
	{
		$error_conformpwd .= '<td><font color="red">Fill this Field.</font></td>';
	}
	if(($oldpwd != $_SESSION['DONOR_CRYPT']) && ($oldpwd != ""))
	{
		$error_oldpwd .= '<td><font color="red">Old Password do not Match.</font></td>';
	}
	if($newpwd != $conformpwd && $newpwd != "" && $conformpwd != "")
	{
		$error_conformpwd .= '<td><font color="red">Conform Password do not Match.</font></td>';
	}
}

if(isset($_POST['change']) && $error_oldpwd == "" && $error_newpwd =="")
{
	$newpwd = md5($newpwd);
	$query3 = mysqli_query($conn,"UPDATE donor SET password = '$newpwd' WHERE id='$donor_id' AND username='$donor_name' AND password='$donor_crypt'");
	if($query3)
	{
		if(!isset($_SESSION))
		{
			session_start();
		}
		$_SESSION['success'] = "pwdupdated";
		$_SESSION['DONOR_CRYPT'] = $newpwd;
		header("Location: ./success");
		exit();
	}
}

?>

<form class="reg" method="post" action="" >
<table align="center">
<tr><td>Old Password:</td><td><input type="password" class="form" name="oldpwd" value=""/></td><?=$error_oldpwd?></tr>
<tr><td>New Password: </td><td><input type="password" class="form" name="newpwd" value=""/></td><?=$error_newpwd?></tr>
<tr><td>Conform Password: </td><td><input type="password" class="form" name="conformpwd" value=""/></td><?=$error_conformpwd?></tr>
</table>
<br/>
<center><input class="button" type="submit" name="change" value=" Change Password "></center>
</form>
<br><br>

<?php
echo '</div></div>';
include "./utils/templates/footer.php";
?>