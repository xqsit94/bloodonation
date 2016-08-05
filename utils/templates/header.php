<?php 
include './utils/functions.php';
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
echo '<html xmlns="http://www.w3.org/1999/xhtml">';
echo '<head>';
  echo '<meta charset="UTF-8">';
  echo '<title>'.$title.' | '.$site_name.'</title>';
  echo '<meta name="description" content="'.$site_metadesc.'">';
  echo '<meta name="keywords" content="'.$site_metakey.'">';
  echo '<link href="css/style.css" rel="stylesheet" type="text/css">';
echo '<link rel="icon" 
      type="image/ico" 
      href="img/favicon.ico">';
	  ?>
	  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script>
		  $(document).ready(function(){
				$('#login-trigger').click(function(){
					$(this).next('#login-content').slideToggle();
					$(this).toggleClass('active');					
					
					if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
						else $(this).find('span').html('&#x25BC;')
					})
		  });
	</script>
<?php
echo '</head>';
echo '<body>';
echo '<div class="main">
<div class="page">
<div class="header">
<div class="banner">
<h1>'.$site_name.'</h1>
</div>';
ob_start();
?>