<div class="topmenu">
<header class="cf">
<nav>
  <ul>
  <li style="border-left: medium none;"><a href="./">Home</a></li>
  <li id="aboutus"><a href="./aboutus">About Us</a></li>
  <li id="bloodtypes"><a href="./bloodtypes">Blood Types</a></li>
  <li id="eligibility"><a href="./eligibility">Eligibility</a></li>
  <li id="peoplebehind"><a href="./peoplebehind">People Behind</a></li>
  <li id="contactus"><a href="./contactus">Contact Us</a></li>
  <?php
  if(!isset($_SESSION))
  {
  session_start();
  }
  if(!empty($_SESSION['DONOR_ID']) && !empty($_SESSION['DONOR_NAME']) && !empty($_SESSION['DONOR_CRYPT'])) {
  	$donor_id = $_SESSION['DONOR_ID'];
  	$donor_name = $_SESSION['DONOR_NAME'];
  	$donor_crypt = $_SESSION['DONOR_CRYPT'];
   	$result3 = mysqli_query($conn,"SELECT * FROM donor where id='$donor_id' AND username='$donor_name' AND password='$donor_crypt'");
	while($row3 = mysqli_fetch_array($result3))
	{ 
	$name = $row3['fullname'];
	}
    if(isset($name)) { $name = $name; }
  	echo '<li id="login"><a id="login-trigger" href="#">'.$name.' <span>&#x25BC;</span></a>
    <div id="login-content">
    <a href="./view_profile">View Profile</a><hr/>
    <a href="./edit_profile">Edit Profile</a><hr/>
    <a href="./changepwd">Change Password</a><hr/>
    <a href="./logout">Logout</a>
    </div></li>';
} else {
	echo '<li id="login">
            <a id="login-trigger" href="#">
                Log in <span>&#x25BC;</span>
            </a>
            <div id="login-content">
                <form method="post" action="./login">
                    <fieldset class="login" id="inputs">
                        <input id="username" type="username" name="username" placeholder="Username" required>   
                        <input id="password" type="password" name="password" placeholder="Password" required>
                    </fieldset>
                    <fieldset class="login" id="actions">
                        <input type="submit" name="login" id="submit" value="Log in">
                        <label><a href="./register">Register as Donor</a></label>
                    </fieldset>
                </form>
            </div>                     
        </li>
    ';
}

  ?>
</ul>
</nav>
</header>
</div>
</div>
<div class="content">
<div class="content-in">
<marquee direction="left" scrollamount="4"><font color="#00FF00"><?=randmsg();?></font></marquee>
