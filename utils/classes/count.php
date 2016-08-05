</br>
<h2>Group Wise Donors</h2>
<div class="left-content">
<ul>
<?php
//Database connect
include('./utils/config.php');
ob_start();
//A1+
$a1p = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A1+'");
$rows1 = mysqli_num_rows($a1p);
echo ('<li><a href="search?bloodgroup=A1%2B">'.'A1+ ('.$rows1.')'.'</a></li>');
//A1-
$a1n = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A1-'");
$rows2 = mysqli_num_rows($a1n);
echo ('<li><a href="search?bloodgroup=A1%2D">'.'A1- ('.$rows2.')'.'</a></li>');
//A2+
$a2p = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A2+'");
$rows3 = mysqli_num_rows($a2p);
echo ('<li><a href="search?bloodgroup=A2%2B">'.'A2+ ('.$rows3.')'.'</a></li>');
//A2-
$a2n = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A2-'");
$rows4 = mysqli_num_rows($a2n);
echo ('<li><a href="search?bloodgroup=A2%2D">'.'A2- ('.$rows4.')'.'</a></li>');
//B+
$bp = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'B+'");
$rows5 = mysqli_num_rows($bp);
echo ('<li><a href="search?bloodgroup=B%2B">'.'B+ ('.$rows5.')'.'</a></li>');
//B-
$bn = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'B-'");
$rows6 = mysqli_num_rows($bn);
echo ('<li><a href="search?bloodgroup=B%2D">'.'B- ('.$rows6.')'.'</a></li>');
//A1B+
$a1bp = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A1B+'");
$rows7 = mysqli_num_rows($a1bp);
echo ('<li><a href="search?bloodgroup=A1B%2B">'.'A1B+ ('.$rows7.')'.'</a></li>');
//A1B-
$a1bn = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A1B-'");
$rows8 = mysqli_num_rows($a1bn);
echo ('<li><a href="search?bloodgroup=A1B%2D">'.'A1B- ('.$rows8.')'.'</a></li>');
//A2B+
$a2bp = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A2B+'");
$rows9 = mysqli_num_rows($a2bp);
echo ('<li><a href="search?bloodgroup=A2B%2B">'.'A2B+ ('.$rows9.')'.'</a></li>');
//A2B-
$a2bn = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A2B-'");
$rows10 = mysqli_num_rows($a2bn);
echo ('<li><a href="search?bloodgroup=A2B%2D">'.'A2B- ('.$rows10.')'.'</a></li>');
//AB+
$abp = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'AB+'");
$rows11 = mysqli_num_rows($abp);
echo ('<li><a href="search?bloodgroup=AB%2B">'.'AB+ ('.$rows11.')'.'</a></li>');
//AB-
$abn = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'AB-'");
$rows12 = mysqli_num_rows($abn);
echo ('<li><a href="search?bloodgroup=AB%2D">'.'AB- ('.$rows12.')'.'</a></li>');
//O+
$op = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'O+'");
$rows13 = mysqli_num_rows($op);
echo ('<li><a href="search?bloodgroup=O%2B">'.'O+ ('.$rows13.')'.'</a></li>');
//O-
$on = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'O-'");
$rows14 = mysqli_num_rows($on);
echo ('<li><a href="search?bloodgroup=O%2D">'.'O- ('.$rows14.')'.'</a></li>');
//A+
$ap = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A+'");
$rows15 = mysqli_num_rows($ap);
echo ('<li><a href="search?bloodgroup=A%2B">'.'A+ ('.$rows15.')'.'</a></li>');
//A-
$an = mysqli_query($conn,"SELECT * FROM donor WHERE bloodgroup = 'A-'");
$rows16 = mysqli_num_rows($an);
echo ('<li><a href="search?bloodgroup=A%2D">'.'A- ('.$rows16.')'.'</a></li>');
?>
</ul>
</div>