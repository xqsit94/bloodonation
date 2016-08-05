<div class="left-panel">
<h2>Search Donor</h2>
<div class="left-content">
</br>
<?php include'./utils/classes/search.html'; ?>
</div>
</br>
<h2>Categories</h2>
<div class="left-content">
<ul>
  <li><a href="./">Home</a></li>
    <li><a href="./donors">Donors List</a></li>
    <?php
    if(!empty($_SESSION['DONOR_ID']) && !empty($_SESSION['DONOR_NAME']) && !empty($_SESSION['DONOR_CRYPT'])) {
		echo '<li><a href="./view_profile">View Profile</a></li>';
	}
	else
	{
		echo '<li><a href="./register">Register as Donor</a></li>';
	}
	?>
  <li><a href="./rqstblood">Request Blood</a></li>
 
  <li><a href="./contactus">Contact Us</a></li>
  
</ul>
</div>

<?php 
include './utils/classes/count.php'; ?>
<div class="gap"></div>

</div>