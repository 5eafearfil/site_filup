<?php
header('X-Frame-Options:SAMEORIGIN');
header('X-Content-Type-Options:nosniff');
header("X-XSS-Protection: 1; mode=block");
?>
<script>
 setTimeout(function() {
   location.href = '/';
 }, 1000);
</script> 