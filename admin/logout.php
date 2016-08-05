<?php
session_start();
include '../utils/config.php';
include("../utils/functions.php");
include("../utils/admin_functions.php");

session_destroy();
header("Location: ./login.php");
?>