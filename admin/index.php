<?php

session_start();
include '../utils/config.php';
include("../utils/functions.php");
include("../utils/admin_functions.php");

if(!isset($_SESSION['adminsession'])) {
  header("location: ./login.php");
}

$file_query = mysqli_query($conn,"SELECT * FROM `".$table_prefix."donor`");
$file_query_rqst = mysqli_query($conn,"SELECT * FROM `".$table_prefix."bloodrqst`");

$pagename = "Dashboard";
include("./admin_header.php");
?>
  <div id="content">
    <ul id="topTabs">
      <li class="selected"><a href="./index.php">Dashboard</a></li>
      <li><a href="./site_settings.php">Site Settings</a></li>
      <li><a href="./admin_settings.php">Admin Settings</a></li>
      <li><a href="./manage_donors.php">Manage Donors</a></li>
      <li><a href="./count_view.php">View Donors</a></li>
	  <li><a href="./count_rqst.php">View Request</a></li>
    </ul>
    <div class="clear"></div>
    <h2>Admin Dashboard</h2>
    <table width="100%" border="0">
      <tr>
        <td width="100%" colspan="4"><b>Site Statistics</b></td>
      </tr>
      <tr>
        <td width="5%">Total Donors Registered:</td>
        <td width="2%"><?php print(mysqli_num_rows($file_query)); ?></td>
		<td width="25%"><a href="./count_view.php">View</a></td>
	  </tr>
	  <tr>
        <td width="5%">Blood Request Received:</td>
        <td width="2%"><?php print(mysqli_num_rows($file_query_rqst)); ?></td>
		<td width="25%"><a href="./count_rqst.php">View</a></td>
     </tr>
      
    </table>
	<br>
    <table width="100%" border="0">
      <tr>
        <td width="100%" colspan="4"><b>Donors Count</b></td>
      </tr>
    <?php  //A1+
$a1p = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A1+'");
$rows1 = mysqli_num_rows($a1p);
echo ('<tr width="5%"><td><a href="count_view.php?bloodgroup=A1%2B">'.'A1+ </td><td width="25%">('.$rows1.')</td>'.'</a></tr>');
//A1-
$a1n = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A1-'");
$rows2 = mysqli_num_rows($a1n);
echo ('<tr width="5%"><td><a href="count_view.php?bloodgroup=A1%2D">'.'A1- </td><td width="25%">('.$rows2.')</td>'.'</a></tr>');
//A2+
$a2p = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A2+'");
$rows3 = mysqli_num_rows($a2p);
echo ('<tr width="5%"><td><a href="count_view.php?bloodgroup=A2%2B">'.'A2+ </td><td width="25%">('.$rows3.')</td>'.'</a></tr>');
//A2-
$a2n = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A2-'");
$rows4 = mysqli_num_rows($a2n);
echo ('<tr width="5%"><td><a href="count_view.php?bloodgroup=A2%2D">'.'A2- </td><td width="25%">('.$rows4.')</td>'.'</a></tr>');
//B+
$bp = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'B+'");
$rows5 = mysqli_num_rows($bp);
echo ('<tr width="5%"><td><a href="count_view.php?bloodgroup=B%2B">'.'B+ </td><td width="25%">('.$rows5.')</td>'.'</a></tr>');
//B-
$bn = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'B-'");
$rows6 = mysqli_num_rows($bn);
echo ('<tr width="5%"><td><a href="count_view.php?bloodgroup=B%2D">'.'B- </td><td width="25%">('.$rows6.')</td>'.'</a></tr>');
//A1B+
$a1bp = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A1B+'");
$rows7 = mysqli_num_rows($a1bp);
echo ('<tr width="5%"><td><a href="count_view.php?bloodgroup=A1B%2B">'.'A1B+ </td><td width="25%">('.$rows7.')</td>'.'</a></tr>');
//A1B-
$a1bn = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A1B-'");
$rows8 = mysqli_num_rows($a1bn);
echo ('<tr><td width="5%><a href="count_view.php?bloodgroup=A1B%2D">'.'A1B- </td><td width="25%">('.$rows8.')</td>'.'</a></tr>');
//A2B+
$a2bp = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A2B+'");
$rows9 = mysqli_num_rows($a2bp);
echo ('<tr width="5%"><td><a href="count_view.php?bloodgroup=A2B%2B">'.'A2B+ </td><td width="25%">('.$rows9.')</td>'.'</a></tr>');
//A2B-
$a2bn = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A2B-'");
$rows10 = mysqli_num_rows($a2bn);
echo ('<tr width="5%"><td><a href="count_view.php?bloodgroup=A2B%2D">'.'A2B- </td><td width="25%">('.$rows10.')</td>'.'</a></tr>');
//AB+
$abp = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'AB+'");
$rows11 = mysqli_num_rows($abp);
echo ('<tr width="5%"><td><a href="count_view.php?bloodgroup=AB%2B">'.'AB+ </td><td width="25%">('.$rows11.')</td>'.'</a></tr>');
//AB-
$abn = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'AB-'");
$rows12 = mysqli_num_rows($abn);
echo ('<tr width="5%"><td><a href="count_view.php?bloodgroup=AB%2D">'.'AB- </td><td width="25%">('.$rows12.')</td>'.'</a></tr>');
//O+
$op = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'O+'");
$rows13 = mysqli_num_rows($op);
echo ('<tr width="5%"><td><a href="count_view.php?bloodgroup=O%2B">'.'O+ </td><td width="25%">('.$rows13.')</td>'.'</a></tr>');
//O-
$on = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'O-'");
$rows14 = mysqli_num_rows($on);
echo ('<tr width="5%"><td><a href="count_view.php?bloodgroup=O%2D">'.'O- </td><td width="25%">('.$rows14.')</td>'.'</a></tr>');
//A+
$ap = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A+'");
$rows15 = mysqli_num_rows($ap);
echo ('<tr width="5%"><td><a href="count_view.php?bloodgroup=A%2B">'.'A+ </td><td width="25%">('.$rows15.')</td>'.'</a></tr>');
//A-
$an = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A-'");
$rows16 = mysqli_num_rows($an);
echo ('<tr width="5%"><td><a href="count_view.php?bloodgroup=A%2D">'.'A- </td><td width="25%">('.$rows16.')</td>'.'</a></tr>');
?>      
    </table>
  </div>
<?php
include("./admin_footer.php");
?>
