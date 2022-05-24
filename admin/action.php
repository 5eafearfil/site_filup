<?php
  session_start();
$sid = $_SESSION['hash'];
require("../inc/bd.php");
   
$maxId = "SELECT * FROM `engmn_sysmsg` WHERE active='1' ORDER BY `id` DESC LIMIT 1";
   $maxId = mysql_query($maxId);
   $maxId = mysql_fetch_array($maxId);
   if ( $maxId ){
        $maxIdActive = $maxId['active'];
        $maxId = $maxId['id'];
        if ( $maxIdActive == 1){
        $yeMax = 1;
    }
}
   $minId = "SELECT * FROM `engmn_sysmsg` WHERE active='1' ORDER BY `id` ASC LIMIT 1";
   $minId = mysql_query($minId);
   $minId = mysql_fetch_array($minId);
   if ( $minId ){
        $minIdActive = $minId['active'];
        $minId = $minId['id'];
        if ( $minIdActive == 1){
        $minId = rand($minId, $maxId);
        $yeMin = 1;
    }
   }
   if ( $yeMax == 1 and $yeMin == 1 ){
   $randomMessage = "SELECT * FROM engmn_sysmsg WHERE id='" . $maxId . "' AND active='1'";
   $randomMessage = mysql_query($randomMessage);
   $randomMessage = mysql_fetch_array($randomMessage);
   if ( $randomMessage ){

        $randomMessage = $randomMessage['message'];

   } 
$text = $_GET['text'];

 mysql_query("INSERT INTO engmn_messages (user_id,name,text,prefix,admin_hide) VALUES ('','sys', '" . $text . "', 'sys', '1')");

}
?>