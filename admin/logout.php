<?php
session_start();
session_destroy();
header("Location: admin-bookings.php");
exit();
?>