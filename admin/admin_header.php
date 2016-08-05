<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $pagename; ?> | <?php echo get_config('site_name'); ?> Administration</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link type="image/x-icon" href="../img/favicon.ico" rel="icon" />
<link type="image/x-icon" href="../img/favicon.ico" rel="shortcut icon" />
<link type="text/css" href="./stylesheet.css" rel="stylesheet" />
</head>

<body>
<div id="wrapper">
  <div id="header">
    <div id="logo">
      <a href="./index.php"><?php print ucwords(get_config('site_name')); ?> Administration</a>
    </div>
    <ul id="headernav">
<?php
if(isset($_SESSION['adminsession'])){
?>
      <li><a href="./logout.php">Logout</a></li>
<?php
}
?>
      <li><a href="../">Return to Site</a></li>
    </ul>
    <div class="clear"></div>
  </div>
