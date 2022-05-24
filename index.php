<?php
  require("inc/site_config.php"); 
require("inc/main.php"); 
header('X-Frame-Options:SAMEORIGIN');
header('X-Content-Type-Options:nosniff');
header('X-Frame-Options: DENY');
header("X-XSS-Protection: 1; mode=block");
header("X-XSS-Protection: 1; mode=block");
?> 