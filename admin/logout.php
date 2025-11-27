<?php
require_once 'config.inc.php'; 

session_unset();

session_destroy();

header("Location: index.php"); 
exit;
?>