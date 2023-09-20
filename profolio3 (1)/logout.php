<?php
session_start();
$_SESSION['logout_message'] = "You have been logged out.";
header("Location: index.php");
exit;
?>
