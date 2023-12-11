<?php
session_start();
include ('core/validation.php');
session_destroy();
redirect("login.php");
die;
?>