<?php
session_start();
include('inc/header.php');
?>
<?php
include('navbar.php');
?>
<?php print_r($_SESSION['auth'])?>
<h1>home page</h1>

<?php
include('inc/footer.php');
?>