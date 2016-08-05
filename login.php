<?php
$title = "Login";
include './utils/config.php';
include './utils/templates/header.php';
include './utils/tpl/header_bar.tpl';
include('./utils/templates/left_panel.php');

echo '<div class="right-panel">
<div class="right-panel-in">
<div class="row">
<h2 class="title"><span>Log <span>In</span></span></h2>
<div class="row2">';
echo '</div></td>';
$error = "";
if(isset($_POST['login']))
{
	$username=prevent_sql($_POST['username']);
	$password=prevent_sql($_POST['password']);
	
	//Validate username
	if(empty($username) && !empty($password))
	{
		$error.='<p class="error"> Please enter Username.</p>';
	}
	if(empty($password) && !empty($username))
	{
		$error.='<p class="error"> Please enter password.</p>';
	}
	if(empty($username) && empty($password))
	{
		$error.='<p class="error"> Please enter username and password.</p>';
	}
	$check = isset($_SESSION['failed']);
	if($check == "login-failed" && !empty($username) && !empty($password))
	{
	$error .= '<p class="error">Login Failed. Please do <a href="./register">Register</a></p>';
	unset($_SESSION['failed']);
	}	
}
?>
<?=$error?>
<?php
if(isset($_POST['login'])&&$error == "")
{
	$username = prevent_sql($_POST['username']);
	$password = prevent_sql($_POST['password']);
	$password = md5($password);
	$qry = "SELECT * FROM donor WHERE username = '$username' AND password = '$password'";
	$result=mysqli_query($conn,$qry);
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			if(!isset($_SESSION)) {
			session_regenerate_id();
			}
			$member = mysqli_fetch_assoc($result);
			$_SESSION['DONOR_ID'] = $member['id'];
			$_SESSION['DONOR_NAME'] = $member['username'];
			$_SESSION['DONOR_CRYPT'] = $member['password'];
			session_write_close();
			header("location: ./home");
			exit();
		}else {
			//Login failed
			$_SESSION['failed'] = "login-failed";
			header("Location: ./login");
		}		
	}
}
?>
<form class="reg" method="post" action="./login" >
<table align="center">
<tr><td>Username:</td> <td> <input type="text" class="form" name="username" value=""/></td></tr><tr>
<td>Password:</td>
<td>
<input type="password" class="form" name="password" value="" /></td></tr>
<tr><td></td><td><a href="./register">Register as Donor</a></td><td>
</table><br/>
<center><input type="submit" class="button" name="login" value=" Login "></td></tr>
</center>
</form> 

<?php
echo '</div></div>';
include "./utils/templates/footer.php";
?>