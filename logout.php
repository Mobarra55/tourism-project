<?php
session_start();
session_destroy();
$_SESSION['success_message']="You have been logged out successfully.";
session_destroy();
header("Location: index.php");
exit();
?>