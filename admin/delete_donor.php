<?php
session_start();
include '../utils/config.php';
include("../utils/functions.php");
include("../utils/admin_functions.php");

if(!isset($_SESSION['adminsession'])) {
  header("location: ./login.php");
}


if(isset($_GET['id']) && is_numeric($_GET['id']))
{
$id=$_GET['id'];
$result = mysqli_query($conn,"DELETE FROM donor WHERE id=$id");
session_start();
$_SESSION['success'] = "deleted";
header("Location: ./count_view.php");
exit();
}
else
{
header("Location: ./count_view.php");
}
?>
