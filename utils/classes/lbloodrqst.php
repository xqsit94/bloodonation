<?php
//Connect to database
include('./utils/config.php');
//SQL Query
$sql="SELECT * FROM bloodrqst ORDER BY id DESC LIMIT 5";
//record set
$rs=mysqli_query($conn,$sql);
//total record
$count = mysqli_num_rows($rs);
//loop rs
//each row made into array
if($count < 1)
{
echo "";
}
else
{
echo '<div class="row">
<h2 class="title"><span>Blood <span>Requests</span></span></h2>
<div class="row2">';
echo '<CENTER><TABLE><TR WIDTH = 200 height = 10 align = center valign = middle bgcolor =#00EBEB><TH>Patient Name</TH><TH>Blood Group</TH><TH>Contact Number</TH><TH>Quantity Required</TH><TH>Hospital Name</TH></TR>';
while($row=mysqli_fetch_array($rs))
{
//write the value of column
echo "<TR><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB>".$row['patient']."</TD><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB><font color = red>".$row['bloodgroup']."</font></TD><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB>".$row['phone']."</TD><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB>".$row['quantity']."</TD><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB>".$row['hospital']."</TD></TR>";
}
echo '<tr><td WIDTH = 200 height = 30 align = middle bgcolor = #EEEBEB colspan = 5><a href="bloodrqst-list"><b><font color="ff00cc">View all</font></b></a></td></tr>';

echo "</TABLE></CENTER>";
echo "</div></div>";
}

?>
