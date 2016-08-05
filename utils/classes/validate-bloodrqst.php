<?php
$error = "";
if(isset($_POST['submit']))
{
	$patient=prevent_sql($_POST['patient']);
	$hospital=prevent_sql($_POST['hospital']);
	$day=prevent_sql($_POST['day']);
	$month=prevent_sql($_POST['month']);
	$year=prevent_sql($_POST['year']);
	$phone=prevent_sql($_POST['phone']);
	$bloodgroup=prevent_sql($_POST['bloodgroup']);
	$quantity=prevent_sql($_POST['quantity']);
	$person=prevent_sql($_POST['person']);
	$msg=prevent_sql($_POST['msg']);
	
	//Validate Patient name
	if(strlen($patient)<3 OR strlen($patient)>25)
	{
		$error.='<p class="error"> Patient Name should be 3-25 characters long.</p>';
	}
	//Validate Hospital name
	if(strlen($patient)<5 OR strlen($patient)>30)
	{
		$error.='<p class="error"> Hospital Name should be 5-30 characters long.</p>';
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
	//Validate Phone
	if(!ctype_digit($phone) OR strlen($phone)!=10)
	{
		$error.='<p class="error"> Enter valid Mobile number.</p>';
	}
	//Validate Blood Group
	if($bloodgroup == "0")
	{
		$error.='<p class="error"> Please select bloodgroup.</p>';
	}
	//Validate Quantity
	if(intval($quantity)<1 OR intval($quantity)>10)
	{
		$error.='<p class="error"> Enter valid Required Unit of Blood.</p>';
	}
	//Validate Person name
	if(strlen($person)<3 OR strlen($person)>25)
	{
		$error.='<p class="error"> Person to Contact should be 3-25 characters long.</p>';
	}
}