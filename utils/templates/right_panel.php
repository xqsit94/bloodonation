<?php
echo '<div class="right-panel">
<div class="right-panel-in">
<div class="row">
<div class="row2">';

include './utils/slider.html';

echo '</div>
</div>';
//Donors List
echo '<div class="row">
<h2 class="title"><span>Donors <span>List</span></span></h2>
<div class="row2">';
include './utils/classes/lblooddonor.php';
echo'</div>
</div>';

//Blood Request

include './utils/classes/lbloodrqst.php';

?>