<?php
session_start();
include '../utils/config.php';
include("../utils/functions.php");
include("../utils/admin_functions.php");


if(isset($_SESSION['adminsession'])) {
  header("location: ./index.php");
}

if(isset($_POST['login'])) {
  if($_POST['username'] == "") {
    $error = "Please enter a username.";
  }else if($_POST['password'] == "") {
    $error = "Please enter a password.";
  //}else if(!mysql_num_rows(mysql_query("SELECT * FROM " . $table_prefix . "settings WHERE admin_user = '" . mysql_real_escape_string($_POST['username']) . "' AND admin_pass = '" . $_POST['password'] . "'"))) {
  //}else if( ( $_POST['username'] !== get_config('admin_username') ) || ( $_POST['password'] !== get_config('admin_password') ) ) {
  //  $error = "Those login credentials are incorrect.";
  }else{
  // Define $myusername and $mypassword
	$username=$_POST['username'];
	$password=$_POST['password'];

	// To protect MySQL injection
	$username = prevent_sql($username);
	$password = prevent_sql($password);
	$password = md5($password);

	$sql="SELECT * FROM admin WHERE username='$username' and password='$password'";
	$result=mysqli_query($conn,$sql);

	// Mysql_num_row is counting table row
	$count=mysqli_num_rows($result);
	if($count==1){
    $_SESSION['adminsession'] = true;
    header("Location: ./index.php");
  }  else	{
  $error = "Those login credentials are incorrect.";
  }
  }
}

$pagename = "Log In";
include("./admin_header.php");
?>
  <div id="content">
    <h2>Log In</h2>
<?php
if(isset($error)) {
  print("    <div class=\"error\"><b>ERROR:</b> ".$error."</div>");
}
?>
    <form method="post" action="./login.php" id="login">
      <input type="hidden" name="login" value="1" />
      <label for="username">Username</label><br />
      <input type="text" name="username" id="username" value="<?php //echo $_POST['username']; ?>" size="40" class="w40" /><br /><br />
      <label for="password">Password</label><br />
      <input type="password" name="password" id="password" value="" size="40" maxlength="60" class="w40" /><br />
      <input type="submit" value="Log In" class="submit" />
    </form>
  </div>
<?php
include("./admin_footer.php");
?>
