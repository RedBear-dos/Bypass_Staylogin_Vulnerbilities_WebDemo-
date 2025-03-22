<?php
session_start();
include 'templates/header.php';

if (!isset($_SESSION['username']) && !isset($_COOKIE['stay-logged-in'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['username'] ?? explode(':', base64_decode($_COOKIE['stay-logged-in']))[0];
echo "<h1>Welcome, $username</h1>";
echo "<a href='logout.php'><button>Logout</button></a>";

include 'templates/footer.php';
?>
