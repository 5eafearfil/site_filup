<?php
  require("inc/site_config.php"); 
require("inc/main.php"); 
header('X-Frame-Options:SAMEORIGIN');
header('X-Content-Type-Options:nosniff');
header('X-Frame-Options: DENY');
header("X-XSS-Protection: 1; mode=block");
header("X-XSS-Protection: 1; mode=block");
?> 
<?
include 'config.php';
?>
<!-- https://dev.vk.com/api/access-token/authcode-flow-user -->
<a href="https://oauth.vk.com/authorize?client_id=<?=ID?>&display=page&redirect_uri=<?=URL?>&scope=photos&response_type=code&v=5.131" target="_blank">VK AUTHORIZE</a>
