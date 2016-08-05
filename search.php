<?php
$title = "Search";
include './utils/config.php';
include './utils/templates/header.php';
include './utils/tpl/header_bar.tpl';

include './utils/templates/left_panel.php';

//Prevent from sql attack
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
$tbl_name="donor";		//your table name
// How many adjacent pages should be shown on each side?
$adjacents = 2;
if(isset($_REQUEST["bloodgroup"]))
{
	$req = test_input($_REQUEST["bloodgroup"]);
}
	else
{
	$req = "";
}
if(isset($_REQUEST["area"]))
{
    $req2 = test_input($_REQUEST["area"]);
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
$query = "SELECT count(*) as num FROM $tbl_name WHERE bloodgroup='$req' AND city='$req2'";
else if($req=="" && $req2!="")
$query = "SELECT count(*) as num FROM $tbl_name WHERE city='$req2'";
else if($req!="" && $req2=="")
$query = "SELECT count(*) as num FROM $tbl_name WHERE bloodgroup='$req'";
else if($req=="" || $req2=="")
{
	if((isset($req)) && (isset($req2)))
	$query = "SELECT count(*) as num FROM $tbl_name";
}
$total_pages = mysqli_fetch_array(mysqli_query($conn,$query));
$total_pages = $total_pages['num'];

/* Setup vars for query. */
$targetpage = "search"; 	//your file name  (the name of this file)
	
	$limit = 15; 								//how many items to show per page
if(isset($_GET["page"]))
{
	$page = $_GET["page"];
}
else 
{
	$page = 1;
};	
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	if($req!="" && $req2!="")
	$sql = "SELECT * FROM $tbl_name WHERE bloodgroup='$req' AND city='$req2' ORDER BY id DESC LIMIT $start, $limit";
	else if($req=="" && $req2!="")
	$sql = "SELECT * FROM $tbl_name WHERE city='$req2' ORDER BY id DESC LIMIT $start, $limit";
	else if($req!="" && $req2=="")
	$sql = "SELECT * FROM $tbl_name WHERE bloodgroup='$req' ORDER BY id DESC LIMIT $start, $limit";
	else if($req=="" || $req2=="")
	{
	if((isset($req)) && (isset($req2)))
	$sql = "SELECT * FROM $tbl_name ORDER BY id DESC LIMIT $start, $limit";
	}
	$result = mysqli_query($conn,$sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if(isset($_GET["bloodgroup"]))
	{
		$bloodgroup = test_input($_GET["bloodgroup"]);
	}
	else
	{
		$bloodgroup = "";
	}
	if(isset($_GET["area"]))
	{
	$area = test_input($_GET["area"]);
	}
	else
	{
		$area = "";
	}
	$bloodgroup = urlencode($bloodgroup);
	$area = urlencode($area);
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?bloodgroup=$bloodgroup&area=$area&page=$prev\">&#171; previous</a>";
		else
			$pagination.= "<span class=\"disabled\">&#171; previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?bloodgroup=$bloodgroup&area=$area&page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?bloodgroup=$bloodgroup&area=$area&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?bloodgroup=$bloodgroup&area=$area&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?bloodgroup=$bloodgroup&area=$area&page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?bloodgroup=$bloodgroup&area=$area&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?bloodgroup=$bloodgroup&area=$area&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?bloodgroup=$bloodgroup&area=$area&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?bloodgroup=$bloodgroup&area=$area&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?bloodgroup=$bloodgroup&area=$area&page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?bloodgroup=$bloodgroup&area=$area&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?bloodgroup=$bloodgroup&area=$area&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?bloodgroup=$bloodgroup&area=$area&page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?bloodgroup=$bloodgroup&area=$area&page=$next\"> next &#187;</a>";
		else
			$pagination.= "<span class=\"disabled\"> next &#187;</span>";
		$pagination.= "</div>\n";		
	}
?>

	<?php
	echo '<div class="right-panel">
	<div class="right-panel-in">';
	echo '<div class="row">
	<h2 class="title"><span>Blood <span>Donors</span></span></h2>
	<div class="row2">';
	$count = mysqli_num_rows($result);
	if($count < 1)
	{
	echo "<center><h2>Sorry!! No Result Found</h2></center>";
	}
	else
	{
	echo '<CENTER><TABLE><TR WIDTH = 200 height = 10 align = center valign = middle bgcolor =#00EBEB><TH>Name</TH><TH>Blood Group</TH><TH>Gender</TH><TH>Area</TH></TR>';
		while($row = mysqli_fetch_array($result))
		{

	echo "<TR><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB>".$row['fullname']."</TD><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB><font color = red>".$row['bloodgroup']."</font></TD><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB>".$row['gender']."</TD><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB>".$row['city']."</TD></TR>";
	
		}	
	echo "</TABLE></CENTER>";
	}
	echo "</div></div>";
	?>
<center>
<?=$pagination?>
</center>
<?php 
include './utils/templates/footer.php'; 
?>