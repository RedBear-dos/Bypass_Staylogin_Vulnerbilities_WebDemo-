<?php
session_start();
session_destroy();
setcookie('stay-logged-in', '', time() - 3600, "/");
header("Location: index.php");
exit;
?>
