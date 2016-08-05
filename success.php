<?php
session_start();
$check = $_SESSION['success'];
if($check == "register")
{
	$title = "Registeration Success";
	include './utils/config.php';
	include './utils/templates/header.php';
	include './utils/tpl/header_bar.tpl';
	include './utils/templates/left_panel.php';
	echo '<div class="right-panel">
	<div class="right-panel-in">
	<div class="row">
	<h2 class="title"><span>Registeration <span>Success</span></span></h2>
	<div class="row2">';
	echo '<br><br><center><h1 style="color: white;">Your registeration is successful. :) Thank you!!!<h1/></center>';
	echo '<br><br><h2><a href="./"><center>Go Back</center></a></h2><br><br>';
	echo '</div></div>';
	include './utils/templates/footer.php';
	unset($_SESSION['success']);
}
if($check == "rqstblood")
{
	$title = "Request Success";
	include './utils/config.php';
	include './utils/templates/header.php';
	include './utils/tpl/header_bar.tpl';
	include './utils/templates/left_panel.php';
	echo '<div class="right-panel">
	<div class="right-panel-in">
	<div class="row">
	<h2 class="title"><span>Request <span>Success</span></span></h2>
	<div class="row2">';
	echo '<br><br><center><h1 style="color: white;">Your request is sent successfully. :)<h1/></center>';
	echo '<br><br><h2><a href="./"><center>Go Back</center></a></h2><br><br>';
	echo '</div></div>';
	include './utils/templates/footer.php';
	unset($_SESSION['success']);
}
if($check == "updated")
{
	$title = "Profile Update Success";
	include './utils/config.php';
	include './utils/templates/header.php';
	include './utils/tpl/header_bar.tpl';
	include './utils/templates/left_panel.php';
	echo '<div class="right-panel">
	<div class="right-panel-in">
	<div class="row">
	<h2 class="title"><span>Profile Update <span>Success</span></span></h2>
	<div class="row2">';
	echo '<br><br><center><h1 style="color: white;">Your Profile is updated successfully. :)<h1/></center>';
	echo '<br><br><h2><a href="./"><center>Go Back</center></a></h2><br><br>';
	echo '</div></div>';
	include './utils/templates/footer.php';
	unset($_SESSION['success']);
}
if($check == "pwdupdated")
{
	$title = "Password Update Success";
	include './utils/config.php';
	include './utils/templates/header.php';
	include './utils/tpl/header_bar.tpl';
	include './utils/templates/left_panel.php';
	echo '<div class="right-panel">
	<div class="right-panel-in">
	<div class="row">
	<h2 class="title"><span>Password Update <span>Success</span></span></h2>
	<div class="row2">';
	echo '<br><br><center><h1 style="color: white;">Your Password is updated successfully. :)<h1/></center>';
	echo '<br><br><h2><a href="./"><center>Go Back</center></a></h2><br><br>';
	echo '</div></div>';
	include './utils/templates/footer.php';
	unset($_SESSION['success']);
}
if(empty($check))
{
	header("Location: ./");
}
//session_unset();
?>