<?php
session_start();
include '../utils/config.php';
include("../utils/functions.php");
include("../utils/admin_functions.php");

if(!isset($_SESSION['adminsession'])) {
  header("location: ./login.php");
}

$filesnum_result = "SELECT count(*) as num FROM bloodrqst";
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

$files_result = mysqli_query($conn,"SELECT * FROM bloodrqst ORDER BY id DESC LIMIT $start, $files_limit");
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
      <li><a href="./count_view.php">View Donors</a></li>
	  <li class="selected"><a href="./count_rqst.php">View Request</a></li>
    </ul>
    <div class="clear"></div>
    <h2>View Request</h2>
    <table width="100%" border="0" class="files">
      <tr>
        <td width="3%" align="center"><b>ID</b></td>
        <td width="15%" align="center"><b>Patient Name</b></td>
        <td width="15%" align="center"><b>Hospital Name</b></td>
        <td width="12%" align="center"><b>Bloodgroup</td>
        <td width="10%" align="center"><b>Quantity Required</b></td>
        <td width="8%" align="center"><b>Required Date</b></td>
		<td width="15%" align="center"><b>Person to Contact</b></td>
		<td width="10%" align="center"><b>Mobile</b></td>
		<td width="30%" align="center"><b>Msg</b></td>
      </tr>
<?php 
while($files_row = mysqli_fetch_array($files_result)) { ?>
      <tr class="file">
        <td align="center" valign="top" style="border-left: 1px dashed grey; border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print($files_row['id']); ?></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print($files_row['patient']); ?></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print($files_row['hospital']); ?></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print($files_row['bloodgroup']); ?></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print($files_row['quantity']); ?></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print($files_row['day'].'/'.$files_row['month'].'/'.$files_row['year']); ?></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print($files_row['person']); ?></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><b><?php print($files_row['phone']); ?></b></td>
		<td align="center" valign="top" style="border-top: 1px dashed grey; border-right: 1px dashed grey; padding: 5px 5px 5px 5px;"><?php print($files_row['msg']); ?></td>
	  </tr>
<?php } ?>
    </table>
<?php
	print "<p>\n";
if($lastpage > 1) {
  print "<div class='paginate'>\n";
  if ($page > 1){
    print "<a href='./count_rqst.php?page=$prev'>previous</a>\n";
  }else{
    print "<span class='disabled'>previous</span>\n";
  }
  if ($lastpage < 7 + ($stages * 2)) {
    for ($counter = 1; $counter <= $lastpage; $counter++) {
      if ($counter == $page){
        print "<span class='current'>$counter</span>\n";
      }else{
        print "<a href='./count_rqst.php?page=$counter'>$counter</a>\n";
      }
    }
  }else if($lastpage > 5 + ($stages * 2)) {
    if($page < 1 + ($stages * 2)) {
      for ($counter = 1; $counter < 4 + ($stages * 2); $counter++) {
        if ($counter == $page) {
          print "<span class='current'>$counter</span>\n";
        }else{
          print "<a href='./count_rqst.php?page=$counter'>$counter</a>\n";
        }
      }
      print "...";
      print "<a href='./count_rqst.php?page=$LastPagem1'>$LastPagem1</a>\n";
      print "<a href='./count_rqst.php?page=$lastpage'>$lastpage</a>\n";
    }elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2)) {
      print "<a href='./count_rqst.php?page=1'>1</a>\n";
      print "<a href='./count_rqst.php?page=2'>2</a>\n";
      print "...";
      for ($counter = $page - $stages; $counter <= $page + $stages; $counter++) {
        if ($counter == $page) {
          print "<span class='current'>$counter</span>\n";
        }else{
          print "<a href='./count_rqst.php?page=$counter'>$counter</a>\n";
        }
      }
      print "...";
      print "<a href='./count_rqst.php?page=$LastPagem1'>$LastPagem1</a>\n";
      print "<a href='./count_rqst.php?page=$lastpage'>$lastpage</a>\n";
    }else{
      print "<a href='./count_rqst.php?page=1'>1</a>\n";
      print "<a href='./count_rqst.php?page=2'>2</a>\n";
      print "...";
      for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++) {
        if ($counter == $page) {
          print "<span class='current'>$counter</span>\n";
        }else{
          print "<a href='./count_rqst.php?page=$counter'>$counter</a>\n";
        }
      }
    }
  }
  if ($page < $counter - 1){
    print "<a href='./count_rqst.php?page=$next'>next</a>\n";
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