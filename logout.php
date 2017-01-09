<!-- Destroy The Session & Send The User To Index.php -->
<?php 
session_start();
session_destroy();
header('Location: index.php');
exit;
?>