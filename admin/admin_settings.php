<?php

session_start();
include '../utils/config.php';
include("../utils/functions.php");
include("../utils/admin_functions.php");

if(!isset($_SESSION['adminsession'])) {
  header("location: ./login.php");
}

$pagename = "Admin Profile Settings";
include("./admin_header.php");
?>
  <div id="content">
    <ul id="topTabs">
      <li><a href="./index.php">Dashboard</a></li>
      <li><a href="./site_settings.php">Site Settings</a></li>
      <li class="selected"><a href="./admin_settings.php">Admin Settings</a></li>
      <li><a href="./manage_donors.php">Manage Donors</a></li>
	  <li><a href="./count_view.php">View Donors</a></li>
	  <li><a href="./count_rqst.php">View Request</a></li>
    </ul>
    <div class="clear"></div>
    <h2>Admin Profile Settings</h2>
	<label>Administrators :</label>
	<br>
<?php
//SQL Query
$sql="SELECT * FROM admin";
//record set
$rs=mysqli_query($conn,$sql);
//total record
$count = mysqli_num_rows($rs);
//loop rs
//each row made into array
if($count < 1)
{
echo "<br>No records in database";
}
else
{
while($row=mysqli_fetch_array($rs))
{
//write the value of column
echo $row['username']." - ".$row['email']."<br>";
}
}

?>	
<br>
<button><a href="./new_admin.php">Add New Admin</a></button>
<br>
<?php
echo '</div>';
include("./admin_footer.php");
?>
