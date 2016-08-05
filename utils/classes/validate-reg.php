<?php
$error = "";
$error_username = "";
if(isset($_POST['submit']))
{
	$username=prevent_sql($_POST['username']);
	$password=prevent_sql($_POST['password']);
	$retypepwd=prevent_sql($_POST['retypepwd']);
	$fullname=prevent_sql($_POST['fullname']);
	$gender=prevent_sql($_POST['gender']);
	$day=prevent_sql($_POST['day']);
	$month=prevent_sql($_POST['month']);
	$year=prevent_sql($_POST['year']);
	$weight=prevent_sql($_POST['weight']);
	$bloodgroup=prevent_sql($_POST['bloodgroup']);
	$email=prevent_sql($_POST['email']);
	$mobile=prevent_sql($_POST['mobile']);
	$address=prevent_sql($_POST['address']);
	$city=prevent_sql($_POST['city']);
	$bio=prevent_sql($_POST['bio']);
	
	$qry = mysqli_query($conn,"SELECT * FROM donor WHERE username = '$username'");
	if(mysqli_num_rows($qry) == 1)
	{
		$error_username.='<p class="error"> Username already exists.</p>';	
	}
	//Validate username
	if(!ctype_alnum($username))
	{
		$error.='<p class="error"> Username should be alpha numeric characters only.</p>';
	}
	if(strlen($username)<5 OR strlen($username)>20)
	{
		$error.='<p class="error"> Username should be 5-20 characters long.</p>';
	}
	//Validate Fullname
	if(strlen($fullname)<3 OR strlen($fullname)>25)
	{
		$error.='<p class="error"> Fullname should be 3-25 characters long.</p>';
	}
	//Validate Password
	if(strlen($password)<5 OR strlen($password)>20)
	{
		$error.='<p class="error"> Password should be 5-20 characters long.</p>';
	}
	//Validate Confirm Password
	if($retypepwd != $password)
	{
		$error.='<p class="error">Retype Password Mismatch</p>';
	}
	//Validate Blood Group
	if($bloodgroup == "0")
	{
		$error.='<p class="error"> Please select bloodgroup.</p>';
	}
	//Validate Email
	if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		$error.='<p class="error"> Enter valid email address.</p>';
	}
	//Validate Phone
	if(!ctype_digit($mobile) OR strlen($mobile)!=10)
	{
		$error.='<p class="error"> Enter valid Mobile number.</p>';
	}
	//Validate Gender
	if($gender != 'Male' && $gender != 'Female')
	{
		$error.='<p class="error"> Please select your Gender.</p>';
	}
	//Validate DOB 
	if(intval($day)<1 OR intval($day)>31)
	{
		$error.='<p class="error"> Enter valid day between 1 - 31.</p>';
	}
	if(intval($month)<1 OR intval($month)>12)
	{
		$error.='<p class="error"> Enter valid month between 1 - 12.</p>';
	}
	//Validate area
	if(strlen($city)<3 OR strlen($city)>25)
	{
		$error.='<p class="error"> Enter valid area.</p>';
	}
}