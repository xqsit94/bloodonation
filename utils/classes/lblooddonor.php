<?php
//Connect to database
include('./utils/config.php');
//SQL Query
$sql="SELECT * FROM donor ORDER BY id DESC LIMIT 5";
//record set
$rs=mysqli_query($conn,$sql);
//total record
$count = mysqli_num_rows($rs);
//loop rs
//each row made into array
if($count < 1)
{
echo "No records in database";
}
else
{
echo '<CENTER><TABLE><TR WIDTH = 200 height = 10 align = center valign = middle bgcolor =#00EBEB><TH>Name</TH><TH>Blood Group</TH><TH>Gender</TH><TH>Area</TH></TR>';
while($row=mysqli_fetch_array($rs))
{
//write the value of column
echo "<TR><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB>".$row['fullname']."</TD><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB><font color = red>".$row['bloodgroup']."</TD><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB>".$row['gender']."</font></TD><TD WIDTH = 200 height = 30 align = middle bgcolor =#EEEBEB>".$row['city']."</TD></TR>";
}
echo '<tr><td WIDTH = 200 height = 30 align = middle bgcolor = #EEEBEB colspan = 4><a href="./donors"><b><font color="ff00cc">View all</font></b></a></td></tr>';
echo "</TABLE></CENTER>";
}
?>