<?php

session_start();
include '../utils/config.php';
include("../utils/functions.php");
include("../utils/admin_functions.php");

if(!isset($_SESSION['adminsession'])) {
  header("location: ./login.php");
}

	if(isset($_REQUEST["bloodgroup"]))
	{
	$req = prevent_sql($_REQUEST["bloodgroup"]);
	}
	else
	{
		$req = "";
	}
	if(isset($_REQUEST["area"]))
	{
    $req2 = prevent_sql($_REQUEST["area"]);
	}
	else
	{
		$req2 = "";
	}
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	if($req!="" && $req2!="")
	$filesnum_result = "SELECT count(*) as num FROM donor WHERE bloodgroup='$req' AND city='$req2'";
	else if($req=="" && $req2!="")
	$filesnum_result = "SELECT count(*) as num FROM donor WHERE city='$req2'";
	else if($req!="" && $req2=="")
	$filesnum_result = "SELECT count(*) as num FROM donor WHERE bloodgroup='$req'";
	else if($req=="" || $req2=="")
	{
	if((isset($req)) && (isset($req2)))
	$filesnum_result = "SELECT count(*) as num FROM donor";
	}	
	$total_files = mysqli_fetch_array(mysqli_query($conn,$filesnum_result));
	$total_files = $total_files['num'];

$files_limit = 15;
$stages = 3;

if(isset($_GET["page"]))
{
	$page = $_GET["page"];
}
else 
{
	$page = 1;
};

//$page = mysql_real_escape_string($_GET['page']);
if($page){
  $start = ($page - 1) * $files_limit; 
}else{
  $start = 0;  
}

/* Get data. */
	if($req!="" && $req2!="")
	$files_result = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup='$req' AND city='$req2' ORDER BY id DESC LIMIT $start, $files_limit");
	else if($req=="" && $req2!="")
	$files_result = mysqli_query($conn,"SELECT * FROM donor WHERE city='$req2' ORDER BY id DESC LIMIT $start, $files_limit");
	else if($req!="" && $req2=="")
	$files_result = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup='$req' ORDER BY id DESC LIMIT $start, $files_limit");
	else if($req=="" || $req2=="")
	{
	if((isset($req)) && (isset($req2)))
	$files_result = mysqli_query($conn,"SELECT * FROM donor ORDER BY id DESC LIMIT $start, $files_limit");
	}
	
if ($page == 0) { $page = 1; }
$prev = $page - 1;
$next = $page + 1;
$lastpage = ceil($total_files / $files_limit);
$LastPagem1 = $lastpage - 1;

$pagename = "Manage Files";
include("./admin_header.php");
?>
  <div id="content">
    <ul id="topTabs">
      <li><a href="./index.php">Dashboard</a></li>
      <li><a href="./site_settings.php">Site Settings</a></li>
      <li><a href="./admin_settings.php">Admin Settings</a></li>
      <li><a href="./manage_donors.php">Manage Donors</a></li>
      <li class="selected"><a href="./count_view.php">View Donors</a></li>
	  <li><a href="./count_rqst.php">View Request</a></li>
    </ul>
    <div class="clear"></div>
    <h2>View Donors</h2>
<?php
	if(!isset($_SESSION['success']))
	{
		echo "";
	}
	else
	{
		$check = $_SESSION['success'];
			if($check == "updated")
		{
		  print("    <div class=\"message\"><b>Success:</b> Donor is updated successfully.</div>");
		  unset($_SESSION['success']);
		}
		if($check == "deleted")
		{
		  print("    <div class=\"message\"><b>Success:</b> Donor is deleted successfully.</div>");
		  unset($_SESSION['success']);
		}
	}
	?>
    <table width="100%" border="0" class="files">
      <tr>
        <td width="8%" align="center"><b>ID</b></td>
        <td width="15%" align="center"><b>Username</b></td>
        <td width="25%" align="center"><b>Donor Name</b></td>
        <td width="12%" align="center"><b>Gender</td>
        <td width="10%" align="center"><b>DOB</b></td>
        <td width="8%" align="center"><b>Weight</b></td>
		<td width="10%" align="center"><b>Bloodgroup</b></td>
		<td width="30%" align="center"><b>Email</b></td>
		<td width="15%" align="center"><b>Mobile</b></td>
		<td width="15%" align="center"><b>Address</b></td>
		<td width="15%" align="center"><b>Area</b></td>
		<td width="15%" align="center"><b>Edit</b></td>
		<td width="15%" align="center"><b>Delete</b></td>
      </tr>
<?php while($files_row = mysqli_fetch_array($files_result)) { ?>
      <tr class="file">
        <td align="center" valign="top" style="border-left: 1px dashed grey; border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print($files_row['id']); ?></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print($files_row['username']); ?></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print($files_row['fullname']); ?></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print($files_row['gender']); ?></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print($files_row['day'].'/'.$files_row['month'].'/'.$files_row['year']); ?></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print($files_row['weight']); ?></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print($files_row['bloodgroup']); ?></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print($files_row['email']); ?></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print($files_row['mobile']); ?></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print($files_row['address']); ?></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print($files_row['city']); ?></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print('<a href="edit_donor.php?id='.$files_row['id'].'">Edit</a>'); ?></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print('<a href="delete_donor.php?id='.$files_row['id'].'">Delete</a>'); ?></td>
	  </tr>
<?php } ?>
    </table>
<?php
if(isset($_GET["bloodgroup"]))
	{
		$bloodgroup = prevent_sql($_GET["bloodgroup"]);
	}
	else
	{
		$bloodgroup = "";
	}
	if(isset($_GET["area"]))
	{
	$area = prevent_sql($_GET["area"]);
	}
	else
	{
		$area = "";
	}
	$bloodgroup = urlencode($bloodgroup);
	$area = urlencode($area);
	
print "<p>\n";
if($lastpage > 1) {
  print "<div class='paginate'>\n";
  if ($page > 1){
    print "<a href='./count_view.php?bloodgroup=$bloodgroup&area=$area&page=$prev'>previous</a>\n";
  }else{
    print "<span class='disabled'>previous</span>\n";
  }
  if ($lastpage < 7 + ($stages * 2)) {
    for ($counter = 1; $counter <= $lastpage; $counter++) {
      if ($counter == $page){
        print "<span class='current'>$counter</span>\n";
      }else{
        print "<a href='./count_view.php?bloodgroup=$bloodgroup&area=$area&page=$counter'>$counter</a>\n";
      }
    }
  }else if($lastpage > 5 + ($stages * 2)) {
    if($page < 1 + ($stages * 2)) {
      for ($counter = 1; $counter < 4 + ($stages * 2); $counter++) {
        if ($counter == $page) {
          print "<span class='current'>$counter</span>\n";
        }else{
          print "<a href='./count_view.php?bloodgroup=$bloodgroup&area=$area&page=$counter'>$counter</a>\n";
        }
      }
      print "...";
      print "<a href='./count_view.php?bloodgroup=$bloodgroup&area=$area&page=$LastPagem1'>$LastPagem1</a>\n";
      print "<a href='./count_view.php?bloodgroup=$bloodgroup&area=$area&page=$lastpage'>$lastpage</a>\n";
    }elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2)) {
      print "<a href='./count_view.php?bloodgroup=$bloodgroup&area=$area&page=1'>1</a>\n";
      print "<a href='./count_view.php?bloodgroup=$bloodgroup&area=$area&page=2'>2</a>\n";
      print "...";
      for ($counter = $page - $stages; $counter <= $page + $stages; $counter++) {
        if ($counter == $page) {
          print "<span class='current'>$counter</span>\n";
        }else{
          print "<a href='./count_view.php?bloodgroup=$bloodgroup&area=$area&page=$counter'>$counter</a>\n";
        }
      }
      print "...";
      print "<a href='./count_view.php?bloodgroup=$bloodgroup&area=$area&page=$LastPagem1'>$LastPagem1</a>\n";
      print "<a href='./count_view.php?bloodgroup=$bloodgroup&area=$area&page=$lastpage'>$lastpage</a>\n";
    }else{
      print "<a href='./count_view.php?bloodgroup=$bloodgroup&area=$area&page=1'>1</a>\n";
      print "<a href='./count_view.php?bloodgroup=$bloodgroup&area=$area&page=2'>2</a>\n";
      print "...";
      for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++) {
        if ($counter == $page) {
          print "<span class='current'>$counter</span>\n";
        }else{
          print "<a href='./count_view.php?bloodgroup=$bloodgroup&area=$area&page=$counter'>$counter</a>\n";
        }
      }
    }
  }
  if ($page < $counter - 1){
    print "<a href='./count_view.php?bloodgroup=$bloodgroup&area=$area&page=$next'>next</a>\n";
  }else{
    print "<span class='disabled'>next</span>\n";
  }
  print "</div>\n";
}
print "</p>\n";
	
?>
	
	</div>
<?php
include("./admin_footer.php");
?>