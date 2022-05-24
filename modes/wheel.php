<?php
require ("../inc/bd.php");
require ("../inc/site_config.php");

session_start();
header('X-Frame-Options:SAMEORIGIN');
header('X-Content-Type-Options:nosniff');
header('X-Frame-Options: DENY');
header("X-XSS-Protection: 1; mode=block");
$site_access = $_GET['access'];
if($site_access != '') {
  $_SESSION['access'] = $site_access;
  header('Location: /');
}
$refer = $_GET['bonus'];
if($refer != '') {
  $_SESSION['ref'] = $refer;
  header('Location: /');
}

$sid = $_SESSION['hash'];

$workdata = explode('-', $workdata);
$year = $workdata[0];
$month = $workdata[1];
$day = $workdata[2];

$workdata = $month . ' ' . $day . ', ' . $year;  
  

$selecter1 = "SELECT * FROM engmn_user WHERE hash = '$sid'";
         $result4 = mysql_query($selecter1);
         $row = mysql_fetch_array($result4);
     if($row)
    { 
          $name = $row['vk_name'];
      $loginn = $row['login'];
          $pass = $row['pass'];
          $balance = $row['balance'];
      $balance = round($balance, 2);
          $id = $row['id'];
          $social_link = $row['social'];
          $is_admin = $row['admin'];
          $is_ban = $row['ban'];
      $ava = $row['img'];
      if ( empty($ava)  )
        {

$ava = "../img/User.png";
        } else {
          
          $ava = $row['img'];
        }
      if ( empty($name) ){
      
      $login = $row['login'];
    }else{
      
      $login = $row['vk_name'];
          $login = explode(' ', $login);
          $login = $login[0];
      
    }
        }
    
    $selecter2 = "SELECT * FROM engmn_config WHERE id = '1'";
         $result5 = mysql_query($selecter1);
         $row = mysql_fetch_array($result4);
     if($row)
    { 
         $ref_proc = $row['ref_proc'];
    
        }
if($social_link == '') {
  $social_link = "Не привязан";
}
$select_deps = "SELECT * FROM engmn_payments WHERE user_id = '$id' ORDER BY id DESC";
$result_deps = mysql_query($select_deps);
$select_refs = "SELECT * FROM engmn_user WHERE ref_id = '$id'";
$result_ref = mysql_query($select_refs);
$sql_select222 = "SELECT * FROM engmn_withdraws WHERE user_id = '$id' ORDER BY id DESC";
$result2 = mysql_query($sql_select222);

$img = substr($login, 0, 2);
$img = strtoupper($img);// аватарка (не трогать)


if($is_ban == 1) {
  header('Location: /ban');
} 
if($_SESSION['login'] != 1) {
  header('Location: /login');
}
if($_SESSION['login'] == 1) {
if($loginn == '' || $pass == '') {
  header('Location: /complete');
}
}

if ( $betsumreload == 0 ){
      if ( date('j') == 1 or date('j') == 13 ){

    $sql_select11 = "UPDATE engmn_user SET betsum=0";
  $result11 = mysql_query($sql_select11);
  $sql_select12 = "Update engmn_config set betsumreload = '1'";
  $result12 = mysql_query($sql_select12);
    
  }
    }
$sql_select51 = "SELECT * FROM engmn_games WHERE mode=1 AND user_id=" . $id . " ORDER BY id DESC LIMIT 5";
$result51 = mysql_query($sql_select51);
    
?>
<?php   
  if(empty($_SESSION['access'])) {
    ?>
      <?php } ?>



<html lang="Ru-ru"><head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">   
     
   

    <script src="/script/jquery-latest.min.js"></script>
    <script src="/script/odometr.js"></script>
    <script src="/script/js.cookie.js"></script>
    <script src="../ajax/functions.js"></script>
  <script>function DaysCounter(){d0 = new Date('<?php echo $workdata;?>');d1 = new Date();dt = (d1.getTime() - d0.getTime()) / (1000*60*60*24);document.write(Math.round(dt));}</script>
  
  
  
    <link rel="preconnect" href="../public/header.min.css?1577959303" crossorigin="anonymous">
    <link rel="preconnect" href="../public/header-short.min.css?1577959303" crossorigin="anonymous">
  
  
       
      
  <link rel="stylesheet" href="../public/header.min.css?1577959303"> 
  <link rel="stylesheet" href="../public/check.css?1577959303"> 

   

  <link rel="stylesheet" href="../public/header-short.min.css?1577959303" media="only screen and (max-width: 670px)">
  <link rel="stylesheet" href="../public/newMenu.css?1577959303" media="(min-width: 0px) and (max-width: 1024px)">

  <link rel="stylesheet" href="../public/tablets.css?1577959303" media="(min-width: 670px) and (max-width: 1024px)">
  <link rel="stylesheet" href="../public/mini-desktop.css?1577959303" media="(min-width: 1024px) and (max-width: 1366px)">
        <link rel="stylesheet" href="../css/fa.css">
    <link rel="stylesheet" href="../css/ti.css">   
    <script src="../ajax/functions.js"></script>
    <script src="https://d3js.org/d3-path.v1.min.js"></script>
  <script src="https://d3js.org/d3-shape.v1.min.js"></script>                          
    <script src="https://www.google.com/recaptcha/api.js?onload=renderRecaptchas&render=explicit" async defer></script>
    <style>
      /*! Themify Icon*/
@font-face {
    font-family: themify;
    src: url(../font/themify.eot?-fvbane);
    src: url(../font/themify.eot?#iefix-fvbane) format('embedded-opentype'), url(../font/themify.woff?-fvbane) format('woff'), url(../font/themify.ttf?-fvbane) format('truetype'), url(../font/themify.svg?-fvbane#themify) format('svg');
    font-weight: 400;
    font-style: normal
}

[class*=" ti-"],
[class^=ti-] {
    font-family: themify;
    speak: none;
    font-style: normal;
    font-weight: 400;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale
}

.ti-wand:before {
    content: "\e600"
}

.ti-volume:before {
    content: "\e601"
}

.ti-user:before {
    content: "\e602"
}

.ti-unlock:before {
    content: "\e603"
}

.ti-unlink:before {
    content: "\e604"
}

.ti-trash:before {
    content: "\e605"
}

.ti-thought:before {
    content: "\e606"
}

.ti-target:before {
    content: "\e607"
}

.ti-tag:before {
    content: "\e608"
}

.ti-tablet:before {
    content: "\e609"
}

.ti-star:before {
    content: "\e60a"
}

.ti-spray:before {
    content: "\e60b"
}

.ti-signal:before {
    content: "\e60c"
}

.ti-shopping-cart:before {
    content: "\e60d"
}

.ti-shopping-cart-full:before {
    content: "\e60e"
}

.ti-settings:before {
    content: "\e60f"
}

.ti-search:before {
    content: "\e610"
}

.ti-zoom-in:before {
    content: "\e611"
}

.ti-zoom-out:before {
    content: "\e612"
}

.ti-cut:before {
    content: "\e613"
}

.ti-ruler:before {
    content: "\e614"
}

.ti-ruler-pencil:before {
    content: "\e615"
}

.ti-ruler-alt:before {
    content: "\e616"
}

.ti-bookmark:before {
    content: "\e617"
}

.ti-bookmark-alt:before {
    content: "\e618"
}

.ti-reload:before {
    content: "\e619"
}

.ti-plus:before {
    content: "\e61a"
}

.ti-pin:before {
    content: "\e61b"
}

.ti-pencil:before {
    content: "\e61c"
}

.ti-pencil-alt:before {
    content: "\e61d"
}

.ti-paint-roller:before {
    content: "\e61e"
}

.ti-paint-bucket:before {
    content: "\e61f"
}

.ti-na:before {
    content: "\e620"
}

.ti-mobile:before {
    content: "\e621"
}

.ti-minus:before {
    content: "\e622"
}

.ti-medall:before {
    content: "\e623"
}

.ti-medall-alt:before {
    content: "\e624"
}

.ti-marker:before {
    content: "\e625"
}

.ti-marker-alt:before {
    content: "\e626"
}

.ti-arrow-up:before {
    content: "\e627"
}

.ti-arrow-right:before {
    content: "\e628"
}

.ti-arrow-left:before {
    content: "\e629"
}

.ti-arrow-down:before {
    content: "\e62a"
}

.ti-lock:before {
    content: "\e62b"
}

.ti-location-arrow:before {
    content: "\e62c"
}

.ti-link:before {
    content: "\e62d"
}

.ti-layout:before {
    content: "\e62e"
}

.ti-layers:before {
    content: "\e62f"
}

.ti-layers-alt:before {
    content: "\e630"
}

.ti-key:before {
    content: "\e631"
}

.ti-import:before {
    content: "\e632"
}

.ti-image:before {
    content: "\e633"
}

.ti-heart:before {
    content: "\e634"
}

.ti-heart-broken:before {
    content: "\e635"
}

.ti-hand-stop:before {
    content: "\e636"
}

.ti-hand-open:before {
    content: "\e637"
}

.ti-hand-drag:before {
    content: "\e638"
}

.ti-folder:before {
    content: "\e639"
}

.ti-flag:before {
    content: "\e63a"
}

.ti-flag-alt:before {
    content: "\e63b"
}

.ti-flag-alt-2:before {
    content: "\e63c"
}

.ti-eye:before {
    content: "\e63d"
}

.ti-export:before {
    content: "\e63e"
}

.ti-exchange-vertical:before {
    content: "\e63f"
}

.ti-desktop:before {
    content: "\e640"
}

.ti-cup:before {
    content: "\e641"
}

.ti-crown:before {
    content: "\e642"
}

.ti-comments:before {
    content: "\e643"
}

.ti-comment:before {
    content: "\e644"
}

.ti-comment-alt:before {
    content: "\e645"
}

.ti-close:before {
    content: "\e646"
}

.ti-clip:before {
    content: "\e647"
}

.ti-angle-up:before {
    content: "\e648"
}

.ti-angle-right:before {
    content: "\e649"
}

.ti-angle-left:before {
    content: "\e64a"
}

.ti-angle-down:before {
    content: "\e64b"
}

.ti-check:before {
    content: "\e64c"
}

.ti-check-box:before {
    content: "\e64d"
}

.ti-camera:before {
    content: "\e64e"
}

.ti-announcement:before {
    content: "\e64f"
}

.ti-brush:before {
    content: "\e650"
}

.ti-briefcase:before {
    content: "\e651"
}

.ti-bolt:before {
    content: "\e652"
}

.ti-bolt-alt:before {
    content: "\e653"
}

.ti-blackboard:before {
    content: "\e654"
}

.ti-bag:before {
    content: "\e655"
}

.ti-move:before {
    content: "\e656"
}

.ti-arrows-vertical:before {
    content: "\e657"
}

.ti-arrows-horizontal:before {
    content: "\e658"
}

.ti-fullscreen:before {
    content: "\e659"
}

.ti-arrow-top-right:before {
    content: "\e65a"
}

.ti-arrow-top-left:before {
    content: "\e65b"
}

.ti-arrow-circle-up:before {
    content: "\e65c"
}

.ti-arrow-circle-right:before {
    content: "\e65d"
}

.ti-arrow-circle-left:before {
    content: "\e65e"
}

.ti-arrow-circle-down:before {
    content: "\e65f"
}

.ti-angle-double-up:before {
    content: "\e660"
}

.ti-angle-double-right:before {
    content: "\e661"
}

.ti-angle-double-left:before {
    content: "\e662"
}

.ti-angle-double-down:before {
    content: "\e663"
}

.ti-zip:before {
    content: "\e664"
}

.ti-world:before {
    content: "\e665"
}

.ti-wheelchair:before {
    content: "\e666"
}

.ti-view-list:before {
    content: "\e667"
}

.ti-view-list-alt:before {
    content: "\e668"
}

.ti-view-grid:before {
    content: "\e669"
}

.ti-uppercase:before {
    content: "\e66a"
}

.ti-upload:before {
    content: "\e66b"
}

.ti-underline:before {
    content: "\e66c"
}

.ti-truck:before {
    content: "\e66d"
}

.ti-timer:before {
    content: "\e66e"
}

.ti-ticket:before {
    content: "\e66f"
}

.ti-thumb-up:before {
    content: "\e670"
}

.ti-thumb-down:before {
    content: "\e671"
}

.ti-text:before {
    content: "\e672"
}

.ti-stats-up:before {
    content: "\e673"
}

.ti-stats-down:before {
    content: "\e674"
}

.ti-split-v:before {
    content: "\e675"
}

.ti-split-h:before {
    content: "\e676"
}

.ti-smallcap:before {
    content: "\e677"
}

.ti-shine:before {
    content: "\e678"
}

.ti-shift-right:before {
    content: "\e679"
}

.ti-shift-left:before {
    content: "\e67a"
}

.ti-shield:before {
    content: "\e67b"
}

.ti-notepad:before {
    content: "\e67c"
}

.ti-server:before {
    content: "\e67d"
}

.ti-quote-right:before {
    content: "\e67e"
}

.ti-quote-left:before {
    content: "\e67f"
}

.ti-pulse:before {
    content: "\e680"
}

.ti-printer:before {
    content: "\e681"
}

.ti-power-off:before {
    content: "\e682"
}

.ti-plug:before {
    content: "\e683"
}

.ti-pie-chart:before {
    content: "\e684"
}

.ti-paragraph:before {
    content: "\e685"
}

.ti-panel:before {
    content: "\e686"
}

.ti-package:before {
    content: "\e687"
}

.ti-music:before {
    content: "\e688"
}

.ti-music-alt:before {
    content: "\e689"
}

.ti-mouse:before {
    content: "\e68a"
}

.ti-mouse-alt:before {
    content: "\e68b"
}

.ti-money:before {
    content: "\e68c"
}

.ti-microphone:before {
    content: "\e68d"
}

.ti-menu:before {
    content: "\e68e"
}

.ti-menu-alt:before {
    content: "\e68f"
}

.ti-map:before {
    content: "\e690"
}

.ti-map-alt:before {
    content: "\e691"
}

.ti-loop:before {
    content: "\e692"
}

.ti-location-pin:before {
    content: "\e693"
}

.ti-list:before {
    content: "\e694"
}

.ti-light-bulb:before {
    content: "\e695"
}

.ti-Italic:before {
    content: "\e696"
}

.ti-info:before {
    content: "\e697"
}

.ti-infinite:before {
    content: "\e698"
}

.ti-id-badge:before {
    content: "\e699"
}

.ti-hummer:before {
    content: "\e69a"
}

.ti-home:before {
    content: "\e69b"
}

.ti-help:before {
    content: "\e69c"
}

.ti-headphone:before {
    content: "\e69d"
}

.ti-harddrives:before {
    content: "\e69e"
}

.ti-harddrive:before {
    content: "\e69f"
}

.ti-gift:before {
    content: "\e6a0"
}

.ti-game:before {
    content: "\e6a1"
}

.ti-filter:before {
    content: "\e6a2"
}

.ti-files:before {
    content: "\e6a3"
}

.ti-file:before {
    content: "\e6a4"
}

.ti-eraser:before {
    content: "\e6a5"
}

.ti-envelope:before {
    content: "\e6a6"
}

.ti-download:before {
    content: "\e6a7"
}

.ti-direction:before {
    content: "\e6a8"
}

.ti-direction-alt:before {
    content: "\e6a9"
}

.ti-dashboard:before {
    content: "\e6aa"
}

.ti-control-stop:before {
    content: "\e6ab"
}

.ti-control-shuffle:before {
    content: "\e6ac"
}

.ti-control-play:before {
    content: "\e6ad"
}

.ti-control-pause:before {
    content: "\e6ae"
}

.ti-control-forward:before {
    content: "\e6af"
}

.ti-control-backward:before {
    content: "\e6b0"
}

.ti-cloud:before {
    content: "\e6b1"
}

.ti-cloud-up:before {
    content: "\e6b2"
}

.ti-cloud-down:before {
    content: "\e6b3"
}

.ti-clipboard:before {
    content: "\e6b4"
}

.ti-car:before {
    content: "\e6b5"
}

.ti-calendar:before {
    content: "\e6b6"
}

.ti-book:before {
    content: "\e6b7"
}

.ti-bell:before {
    content: "\e6b8"
}

.ti-basketball:before {
    content: "\e6b9"
}

.ti-bar-chart:before {
    content: "\e6ba"
}

.ti-bar-chart-alt:before {
    content: "\e6bb"
}

.ti-back-right:before {
    content: "\e6bc"
}

.ti-back-left:before {
    content: "\e6bd"
}

.ti-arrows-corner:before {
    content: "\e6be"
}

.ti-archive:before {
    content: "\e6bf"
}

.ti-anchor:before {
    content: "\e6c0"
}

.ti-align-right:before {
    content: "\e6c1"
}

.ti-align-left:before {
    content: "\e6c2"
}

.ti-align-justify:before {
    content: "\e6c3"
}

.ti-align-center:before {
    content: "\e6c4"
}

.ti-alert:before {
    content: "\e6c5"
}

.ti-alarm-clock:before {
    content: "\e6c6"
}

.ti-agenda:before {
    content: "\e6c7"
}

.ti-write:before {
    content: "\e6c8"
}

.ti-window:before {
    content: "\e6c9"
}

.ti-widgetized:before {
    content: "\e6ca"
}

.ti-widget:before {
    content: "\e6cb"
}

.ti-widget-alt:before {
    content: "\e6cc"
}

.ti-wallet:before {
    content: "\e6cd"
}

.ti-video-clapper:before {
    content: "\e6ce"
}

.ti-video-camera:before {
    content: "\e6cf"
}

.ti-vector:before {
    content: "\e6d0"
}

.ti-themify-logo:before {
    content: "\e6d1"
}

.ti-themify-favicon:before {
    content: "\e6d2"
}

.ti-themify-favicon-alt:before {
    content: "\e6d3"
}

.ti-support:before {
    content: "\e6d4"
}

.ti-stamp:before {
    content: "\e6d5"
}

.ti-split-v-alt:before {
    content: "\e6d6"
}

.ti-slice:before {
    content: "\e6d7"
}

.ti-shortcode:before {
    content: "\e6d8"
}

.ti-shift-right-alt:before {
    content: "\e6d9"
}

.ti-shift-left-alt:before {
    content: "\e6da"
}

.ti-ruler-alt-2:before {
    content: "\e6db"
}

.ti-receipt:before {
    content: "\e6dc"
}

.ti-pin2:before {
    content: "\e6dd"
}

.ti-pin-alt:before {
    content: "\e6de"
}

.ti-pencil-alt2:before {
    content: "\e6df"
}

.ti-palette:before {
    content: "\e6e0"
}

.ti-more:before {
    content: "\e6e1"
}

.ti-more-alt:before {
    content: "\e6e2"
}

.ti-microphone-alt:before {
    content: "\e6e3"
}

.ti-magnet:before {
    content: "\e6e4"
}

.ti-line-double:before {
    content: "\e6e5"
}

.ti-line-dotted:before {
    content: "\e6e6"
}

.ti-line-dashed:before {
    content: "\e6e7"
}

.ti-layout-width-full:before {
    content: "\e6e8"
}

.ti-layout-width-default:before {
    content: "\e6e9"
}

.ti-layout-width-default-alt:before {
    content: "\e6ea"
}

.ti-layout-tab:before {
    content: "\e6eb"
}

.ti-layout-tab-window:before {
    content: "\e6ec"
}

.ti-layout-tab-v:before {
    content: "\e6ed"
}

.ti-layout-tab-min:before {
    content: "\e6ee"
}

.ti-layout-slider:before {
    content: "\e6ef"
}

.ti-layout-slider-alt:before {
    content: "\e6f0"
}

.ti-layout-sidebar-right:before {
    content: "\e6f1"
}

.ti-layout-sidebar-none:before {
    content: "\e6f2"
}

.ti-layout-sidebar-left:before {
    content: "\e6f3"
}

.ti-layout-placeholder:before {
    content: "\e6f4"
}

.ti-layout-menu:before {
    content: "\e6f5"
}

.ti-layout-menu-v:before {
    content: "\e6f6"
}

.ti-layout-menu-separated:before {
    content: "\e6f7"
}

.ti-layout-menu-full:before {
    content: "\e6f8"
}

.ti-layout-media-right-alt:before {
    content: "\e6f9"
}

.ti-layout-media-right:before {
    content: "\e6fa"
}

.ti-layout-media-overlay:before {
    content: "\e6fb"
}

.ti-layout-media-overlay-alt:before {
    content: "\e6fc"
}

.ti-layout-media-overlay-alt-2:before {
    content: "\e6fd"
}

.ti-layout-media-left-alt:before {
    content: "\e6fe"
}

.ti-layout-media-left:before {
    content: "\e6ff"
}

.ti-layout-media-center-alt:before {
    content: "\e700"
}

.ti-layout-media-center:before {
    content: "\e701"
}

.ti-layout-list-thumb:before {
    content: "\e702"
}

.ti-layout-list-thumb-alt:before {
    content: "\e703"
}

.ti-layout-list-post:before {
    content: "\e704"
}

.ti-layout-list-large-image:before {
    content: "\e705"
}

.ti-layout-line-solid:before {
    content: "\e706"
}

.ti-layout-grid4:before {
    content: "\e707"
}

.ti-layout-grid3:before {
    content: "\e708"
}

.ti-layout-grid2:before {
    content: "\e709"
}

.ti-layout-grid2-thumb:before {
    content: "\e70a"
}

.ti-layout-cta-right:before {
    content: "\e70b"
}

.ti-layout-cta-left:before {
    content: "\e70c"
}

.ti-layout-cta-center:before {
    content: "\e70d"
}

.ti-layout-cta-btn-right:before {
    content: "\e70e"
}

.ti-layout-cta-btn-left:before {
    content: "\e70f"
}

.ti-layout-column4:before {
    content: "\e710"
}

.ti-layout-column3:before {
    content: "\e711"
}

.ti-layout-column2:before {
    content: "\e712"
}

.ti-layout-accordion-separated:before {
    content: "\e713"
}

.ti-layout-accordion-merged:before {
    content: "\e714"
}

.ti-layout-accordion-list:before {
    content: "\e715"
}

.ti-ink-pen:before {
    content: "\e716"
}

.ti-info-alt:before {
    content: "\e717"
}

.ti-help-alt:before {
    content: "\e718"
}

.ti-headphone-alt:before {
    content: "\e719"
}

.ti-hand-point-up:before {
    content: "\e71a"
}

.ti-hand-point-right:before {
    content: "\e71b"
}

.ti-hand-point-left:before {
    content: "\e71c"
}

.ti-hand-point-down:before {
    content: "\e71d"
}

.ti-gallery:before {
    content: "\e71e"
}

.ti-face-smile:before {
    content: "\e71f"
}

.ti-face-sad:before {
    content: "\e720"
}

.ti-credit-card:before {
    content: "\e721"
}

.ti-control-skip-forward:before {
    content: "\e722"
}

.ti-control-skip-backward:before {
    content: "\e723"
}

.ti-control-record:before {
    content: "\e724"
}

.ti-control-eject:before {
    content: "\e725"
}

.ti-comments-smiley:before {
    content: "\e726"
}

.ti-brush-alt:before {
    content: "\e727"
}

.ti-youtube:before {
    content: "\e728"
}

.ti-vimeo:before {
    content: "\e729"
}

.ti-twitter:before {
    content: "\e72a"
}

.ti-time:before {
    content: "\e72b"
}

.ti-tumblr:before {
    content: "\e72c"
}

.ti-skype:before {
    content: "\e72d"
}

.ti-share:before {
    content: "\e72e"
}

.ti-share-alt:before {
    content: "\e72f"
}

.ti-rocket:before {
    content: "\e730"
}

.ti-pinterest:before {
    content: "\e731"
}

.ti-new-window:before {
    content: "\e732"
}

.ti-microsoft:before {
    content: "\e733"
}

.ti-list-ol:before {
    content: "\e734"
}

.ti-linkedin:before {
    content: "\e735"
}

.ti-layout-sidebar-2:before {
    content: "\e736"
}

.ti-layout-grid4-alt:before {
    content: "\e737"
}

.ti-layout-grid3-alt:before {
    content: "\e738"
}

.ti-layout-grid2-alt:before {
    content: "\e739"
}

.ti-layout-column4-alt:before {
    content: "\e73a"
}

.ti-layout-column3-alt:before {
    content: "\e73b"
}

.ti-layout-column2-alt:before {
    content: "\e73c"
}

.ti-instagram:before {
    content: "\e73d"
}

.ti-google:before {
    content: "\e73e"
}

.ti-github:before {
    content: "\e73f"
}

.ti-flickr:before {
    content: "\e740"
}

.ti-facebook:before {
    content: "\e741"
}

.ti-dropbox:before {
    content: "\e742"
}

.ti-dribbble:before {
    content: "\e743"
}

.ti-apple:before {
    content: "\e744"
}

.ti-android:before {
    content: "\e745"
}

.ti-save:before {
    content: "\e746"
}

.ti-save-alt:before {
    content: "\e747"
}

.ti-yahoo:before {
    content: "\e748"
}

.ti-wordpress:before {
    content: "\e749"
}

.ti-vimeo-alt:before {
    content: "\e74a"
}

.ti-twitter-alt:before {
    content: "\e74b"
}

.ti-tumblr-alt:before {
    content: "\e74c"
}

.ti-trello:before {
    content: "\e74d"
}

.ti-stack-overflow:before {
    content: "\e74e"
}

.ti-soundcloud:before {
    content: "\e74f"
}

.ti-sharethis:before {
    content: "\e750"
}

.ti-sharethis-alt:before {
    content: "\e751"
}

.ti-reddit:before {
    content: "\e752"
}

.ti-pinterest-alt:before {
    content: "\e753"
}

.ti-microsoft-alt:before {
    content: "\e754"
}

.ti-linux:before {
    content: "\e755"
}

.ti-jsfiddle:before {
    content: "\e756"
}

.ti-joomla:before {
    content: "\e757"
}

.ti-html5:before {
    content: "\e758"
}

.ti-flickr-alt:before {
    content: "\e759"
}

.ti-email:before {
    content: "\e75a"
}

.ti-drupal:before {
    content: "\e75b"
}

.ti-dropbox-alt:before {
    content: "\e75c"
}

.ti-css3:before {
    content: "\e75d"
}

.ti-rss:before {
    content: "\e75e"
}

.ti-rss-alt:before {
    content: "\e75f"
}
/*! Font Awesome Free 5.0.13  * License - https://fontawesome.com/license (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)*/
.fa,
.fab,
.fal,
.far,
.fas {
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    line-height: 1
}

.fa-lg {
    font-size: 1.33333em;
    line-height: .75em;
    vertical-align: -.0667em
}

.fa-xs {
    font-size: .75em
}

.fa-sm {
    font-size: .875em
}

.fa-1x {
    font-size: 1em
}

.fa-2x {
    font-size: 2em
}

.fa-3x {
    font-size: 3em
}

.fa-4x {
    font-size: 4em
}

.fa-5x {
    font-size: 5em
}

.fa-6x {
    font-size: 6em
}

.fa-7x {
    font-size: 7em
}

.fa-8x {
    font-size: 8em
}

.fa-9x {
    font-size: 9em
}

.fa-10x {
    font-size: 10em
}

.fa-fw {
    text-align: center;
    width: 1.25em
}

.fa-ul {
    list-style-type: none;
    margin-left: 2.5em;
    padding-left: 0
}

.fa-ul > li {
    position: relative
}

.fa-li {
    left: -2em;
    position: absolute;
    text-align: center;
    width: 2em;
    line-height: inherit
}

.fa-border {
    border: .08em solid #eee;
    border-radius: .1em;
    padding: .2em .25em .15em
}

.fa-pull-left {
    float: left
}

.fa-pull-right {
    float: right
}

.fa.fa-pull-left,
.fab.fa-pull-left,
.fal.fa-pull-left,
.far.fa-pull-left,
.fas.fa-pull-left {
    margin-right: .3em
}

.fa.fa-pull-right,
.fab.fa-pull-right,
.fal.fa-pull-right,
.far.fa-pull-right,
.fas.fa-pull-right {
    margin-left: .3em
}

.fa-spin {
    animation: a 2s infinite linear
}

.fa-pulse {
    animation: a 1s infinite steps(8)
}

@keyframes a {
    0% {
        transform: rotate(0deg)
    }

    to {
        transform: rotate(1turn)
    }
}

.fa-rotate-90 {
    -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=1)";
    transform: rotate(90deg)
}

.fa-rotate-180 {
    -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2)";
    transform: rotate(180deg)
}

.fa-rotate-270 {
    -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=3)";
    transform: rotate(270deg)
}

.fa-flip-horizontal {
    -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0, mirror=1)";
    transform: scaleX(-1)
}

.fa-flip-vertical {
    transform: scaleY(-1)
}

.fa-flip-horizontal.fa-flip-vertical,
.fa-flip-vertical {
    -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1)"
}

.fa-flip-horizontal.fa-flip-vertical {
    transform: scale(-1)
}

:root .fa-flip-horizontal,
:root .fa-flip-vertical,
:root .fa-rotate-90,
:root .fa-rotate-180,
:root .fa-rotate-270 {
    -webkit-filter: none;
    filter: none
}

.fa-stack {
    display: inline-block;
    height: 2em;
    line-height: 2em;
    position: relative;
    vertical-align: middle;
    width: 2em
}

.fa-stack-1x,
.fa-stack-2x {
    left: 0;
    position: absolute;
    text-align: center;
    width: 100%
}

.fa-stack-1x {
    line-height: inherit
}

.fa-stack-2x {
    font-size: 2em
}

.fa-inverse {
    color: #fff
}

.fa-500px:before {
    content: "\f26e"
}

.fa-accessible-icon:before {
    content: "\f368"
}

.fa-accusoft:before {
    content: "\f369"
}

.fa-address-book:before {
    content: "\f2b9"
}

.fa-address-card:before {
    content: "\f2bb"
}

.fa-adjust:before {
    content: "\f042"
}

.fa-adn:before {
    content: "\f170"
}

.fa-adversal:before {
    content: "\f36a"
}

.fa-affiliatetheme:before {
    content: "\f36b"
}

.fa-algolia:before {
    content: "\f36c"
}

.fa-align-center:before {
    content: "\f037"
}

.fa-align-justify:before {
    content: "\f039"
}

.fa-align-left:before {
    content: "\f036"
}

.fa-align-right:before {
    content: "\f038"
}

.fa-allergies:before {
    content: "\f461"
}

.fa-amazon:before {
    content: "\f270"
}

.fa-amazon-pay:before {
    content: "\f42c"
}

.fa-ambulance:before {
    content: "\f0f9"
}

.fa-american-sign-language-interpreting:before {
    content: "\f2a3"
}

.fa-amilia:before {
    content: "\f36d"
}

.fa-anchor:before {
    content: "\f13d"
}

.fa-android:before {
    content: "\f17b"
}

.fa-angellist:before {
    content: "\f209"
}

.fa-angle-double-down:before {
    content: "\f103"
}

.fa-angle-double-left:before {
    content: "\f100"
}

.fa-angle-double-right:before {
    content: "\f101"
}

.fa-angle-double-up:before {
    content: "\f102"
}

.fa-angle-down:before {
    content: "\f107"
}

.fa-angle-left:before {
    content: "\f104"
}

.fa-angle-right:before {
    content: "\f105"
}

.fa-angle-up:before {
    content: "\f106"
}

.fa-angrycreative:before {
    content: "\f36e"
}

.fa-angular:before {
    content: "\f420"
}

.fa-app-store:before {
    content: "\f36f"
}

.fa-app-store-ios:before {
    content: "\f370"
}

.fa-apper:before {
    content: "\f371"
}

.fa-apple:before {
    content: "\f179"
}

.fa-apple-pay:before {
    content: "\f415"
}

.fa-archive:before {
    content: "\f187"
}

.fa-arrow-alt-circle-down:before {
    content: "\f358"
}

.fa-arrow-alt-circle-left:before {
    content: "\f359"
}

.fa-arrow-alt-circle-right:before {
    content: "\f35a"
}

.fa-arrow-alt-circle-up:before {
    content: "\f35b"
}

.fa-arrow-circle-down:before {
    content: "\f0ab"
}

.fa-arrow-circle-left:before {
    content: "\f0a8"
}

.fa-arrow-circle-right:before {
    content: "\f0a9"
}

.fa-arrow-circle-up:before {
    content: "\f0aa"
}

.fa-arrow-down:before {
    content: "\f063"
}

.fa-arrow-left:before {
    content: "\f060"
}

.fa-arrow-right:before {
    content: "\f061"
}

.fa-arrow-up:before {
    content: "\f062"
}

.fa-arrows-alt:before {
    content: "\f0b2"
}

.fa-arrows-alt-h:before {
    content: "\f337"
}

.fa-arrows-alt-v:before {
    content: "\f338"
}

.fa-assistive-listening-systems:before {
    content: "\f2a2"
}

.fa-asterisk:before {
    content: "\f069"
}

.fa-asymmetrik:before {
    content: "\f372"
}

.fa-at:before {
    content: "\f1fa"
}

.fa-audible:before {
    content: "\f373"
}

.fa-audio-description:before {
    content: "\f29e"
}

.fa-autoprefixer:before {
    content: "\f41c"
}

.fa-avianex:before {
    content: "\f374"
}

.fa-aviato:before {
    content: "\f421"
}

.fa-aws:before {
    content: "\f375"
}

.fa-backward:before {
    content: "\f04a"
}

.fa-balance-scale:before {
    content: "\f24e"
}

.fa-ban:before {
    content: "\f05e"
}

.fa-band-aid:before {
    content: "\f462"
}

.fa-bandcamp:before {
    content: "\f2d5"
}

.fa-barcode:before {
    content: "\f02a"
}

.fa-bars:before {
    content: "\f0c9"
}

.fa-baseball-ball:before {
    content: "\f433"
}

.fa-basketball-ball:before {
    content: "\f434"
}

.fa-bath:before {
    content: "\f2cd"
}

.fa-battery-empty:before {
    content: "\f244"
}

.fa-battery-full:before {
    content: "\f240"
}

.fa-battery-half:before {
    content: "\f242"
}

.fa-battery-quarter:before {
    content: "\f243"
}

.fa-battery-three-quarters:before {
    content: "\f241"
}

.fa-bed:before {
    content: "\f236"
}

.fa-beer:before {
    content: "\f0fc"
}

.fa-behance:before {
    content: "\f1b4"
}

.fa-behance-square:before {
    content: "\f1b5"
}

.fa-bell:before {
    content: "\f0f3"
}

.fa-bell-slash:before {
    content: "\f1f6"
}

.fa-bicycle:before {
    content: "\f206"
}

.fa-bimobject:before {
    content: "\f378"
}

.fa-binoculars:before {
    content: "\f1e5"
}

.fa-birthday-cake:before {
    content: "\f1fd"
}

.fa-bitbucket:before {
    content: "\f171"
}

.fa-bitcoin:before {
    content: "\f379"
}

.fa-bity:before {
    content: "\f37a"
}

.fa-black-tie:before {
    content: "\f27e"
}

.fa-blackberry:before {
    content: "\f37b"
}

.fa-blender:before {
    content: "\f517"
}

.fa-blind:before {
    content: "\f29d"
}

.fa-blogger:before {
    content: "\f37c"
}

.fa-blogger-b:before {
    content: "\f37d"
}

.fa-bluetooth:before {
    content: "\f293"
}

.fa-bluetooth-b:before {
    content: "\f294"
}

.fa-bold:before {
    content: "\f032"
}

.fa-bolt:before {
    content: "\f0e7"
}

.fa-bomb:before {
    content: "\f1e2"
}

.fa-book:before {
    content: "\f02d"
}

.fa-book-open:before {
    content: "\f518"
}

.fa-bookmark:before {
    content: "\f02e"
}

.fa-bowling-ball:before {
    content: "\f436"
}

.fa-box:before {
    content: "\f466"
}

.fa-box-open:before {
    content: "\f49e"
}

.fa-boxes:before {
    content: "\f468"
}

.fa-braille:before {
    content: "\f2a1"
}

.fa-briefcase:before {
    content: "\f0b1"
}

.fa-briefcase-medical:before {
    content: "\f469"
}

.fa-broadcast-tower:before {
    content: "\f519"
}

.fa-broom:before {
    content: "\f51a"
}

.fa-btc:before {
    content: "\f15a"
}

.fa-bug:before {
    content: "\f188"
}

.fa-building:before {
    content: "\f1ad"
}

.fa-bullhorn:before {
    content: "\f0a1"
}

.fa-bullseye:before {
    content: "\f140"
}

.fa-burn:before {
    content: "\f46a"
}

.fa-buromobelexperte:before {
    content: "\f37f"
}

.fa-bus:before {
    content: "\f207"
}

.fa-buysellads:before {
    content: "\f20d"
}

.fa-calculator:before {
    content: "\f1ec"
}

.fa-calendar:before {
    content: "\f133"
}

.fa-calendar-alt:before {
    content: "\f073"
}

.fa-calendar-check:before {
    content: "\f274"
}

.fa-calendar-minus:before {
    content: "\f272"
}

.fa-calendar-plus:before {
    content: "\f271"
}

.fa-calendar-times:before {
    content: "\f273"
}

.fa-camera:before {
    content: "\f030"
}

.fa-camera-retro:before {
    content: "\f083"
}

.fa-capsules:before {
    content: "\f46b"
}

.fa-car:before {
    content: "\f1b9"
}

.fa-caret-down:before {
    content: "\f0d7"
}

.fa-caret-left:before {
    content: "\f0d9"
}

.fa-caret-right:before {
    content: "\f0da"
}

.fa-caret-square-down:before {
    content: "\f150"
}

.fa-caret-square-left:before {
    content: "\f191"
}

.fa-caret-square-right:before {
    content: "\f152"
}

.fa-caret-square-up:before {
    content: "\f151"
}

.fa-caret-up:before {
    content: "\f0d8"
}

.fa-cart-arrow-down:before {
    content: "\f218"
}

.fa-cart-plus:before {
    content: "\f217"
}

.fa-cc-amazon-pay:before {
    content: "\f42d"
}

.fa-cc-amex:before {
    content: "\f1f3"
}

.fa-cc-apple-pay:before {
    content: "\f416"
}

.fa-cc-diners-club:before {
    content: "\f24c"
}

.fa-cc-discover:before {
    content: "\f1f2"
}

.fa-cc-jcb:before {
    content: "\f24b"
}

.fa-cc-mastercard:before {
    content: "\f1f1"
}

.fa-cc-paypal:before {
    content: "\f1f4"
}

.fa-cc-stripe:before {
    content: "\f1f5"
}

.fa-cc-visa:before {
    content: "\f1f0"
}

.fa-centercode:before {
    content: "\f380"
}

.fa-certificate:before {
    content: "\f0a3"
}

.fa-chalkboard:before {
    content: "\f51b"
}

.fa-chalkboard-teacher:before {
    content: "\f51c"
}

.fa-chart-area:before {
    content: "\f1fe"
}

.fa-chart-bar:before {
    content: "\f080"
}

.fa-chart-line:before {
    content: "\f201"
}

.fa-chart-pie:before {
    content: "\f200"
}

.fa-check:before {
    content: "\f00c"
}

.fa-check-circle:before {
    content: "\f058"
}

.fa-check-square:before {
    content: "\f14a"
}

.fa-chess:before {
    content: "\f439"
}

.fa-chess-bishop:before {
    content: "\f43a"
}

.fa-chess-board:before {
    content: "\f43c"
}

.fa-chess-king:before {
    content: "\f43f"
}

.fa-chess-knight:before {
    content: "\f441"
}

.fa-chess-pawn:before {
    content: "\f443"
}

.fa-chess-queen:before {
    content: "\f445"
}

.fa-chess-rook:before {
    content: "\f447"
}

.fa-chevron-circle-down:before {
    content: "\f13a"
}

.fa-chevron-circle-left:before {
    content: "\f137"
}

.fa-chevron-circle-right:before {
    content: "\f138"
}

.fa-chevron-circle-up:before {
    content: "\f139"
}

.fa-chevron-down:before {
    content: "\f078"
}

.fa-chevron-left:before {
    content: "\f053"
}

.fa-chevron-right:before {
    content: "\f054"
}

.fa-chevron-up:before {
    content: "\f077"
}

.fa-child:before {
    content: "\f1ae"
}

.fa-chrome:before {
    content: "\f268"
}

.fa-church:before {
    content: "\f51d"
}

.fa-circle:before {
    content: "\f111"
}

.fa-circle-notch:before {
    content: "\f1ce"
}

.fa-clipboard:before {
    content: "\f328"
}

.fa-clipboard-check:before {
    content: "\f46c"
}

.fa-clipboard-list:before {
    content: "\f46d"
}

.fa-clock:before {
    content: "\f017"
}

.fa-clone:before {
    content: "\f24d"
}

.fa-closed-captioning:before {
    content: "\f20a"
}

.fa-cloud:before {
    content: "\f0c2"
}

.fa-cloud-download-alt:before {
    content: "\f381"
}

.fa-cloud-upload-alt:before {
    content: "\f382"
}

.fa-cloudscale:before {
    content: "\f383"
}

.fa-cloudsmith:before {
    content: "\f384"
}

.fa-cloudversify:before {
    content: "\f385"
}

.fa-code:before {
    content: "\f121"
}

.fa-code-branch:before {
    content: "\f126"
}

.fa-codepen:before {
    content: "\f1cb"
}

.fa-codiepie:before {
    content: "\f284"
}

.fa-coffee:before {
    content: "\f0f4"
}

.fa-cog:before {
    content: "\f013"
}

.fa-cogs:before {
    content: "\f085"
}

.fa-coins:before {
    content: "\f51e"
}

.fa-columns:before {
    content: "\f0db"
}

.fa-comment:before {
    content: "\f075"
}

.fa-comment-alt:before {
    content: "\f27a"
}

.fa-comment-dots:before {
    content: "\f4ad"
}

.fa-comment-slash:before {
    content: "\f4b3"
}

.fa-comments:before {
    content: "\f086"
}

.fa-compact-disc:before {
    content: "\f51f"
}

.fa-compass:before {
    content: "\f14e"
}

.fa-compress:before {
    content: "\f066"
}

.fa-connectdevelop:before {
    content: "\f20e"
}

.fa-contao:before {
    content: "\f26d"
}

.fa-copy:before {
    content: "\f0c5"
}

.fa-copyright:before {
    content: "\f1f9"
}

.fa-couch:before {
    content: "\f4b8"
}

.fa-cpanel:before {
    content: "\f388"
}

.fa-creative-commons:before {
    content: "\f25e"
}

.fa-creative-commons-by:before {
    content: "\f4e7"
}

.fa-creative-commons-nc:before {
    content: "\f4e8"
}

.fa-creative-commons-nc-eu:before {
    content: "\f4e9"
}

.fa-creative-commons-nc-jp:before {
    content: "\f4ea"
}

.fa-creative-commons-nd:before {
    content: "\f4eb"
}

.fa-creative-commons-pd:before {
    content: "\f4ec"
}

.fa-creative-commons-pd-alt:before {
    content: "\f4ed"
}

.fa-creative-commons-remix:before {
    content: "\f4ee"
}

.fa-creative-commons-sa:before {
    content: "\f4ef"
}

.fa-creative-commons-sampling:before {
    content: "\f4f0"
}

.fa-creative-commons-sampling-plus:before {
    content: "\f4f1"
}

.fa-creative-commons-share:before {
    content: "\f4f2"
}

.fa-credit-card:before {
    content: "\f09d"
}

.fa-crop:before {
    content: "\f125"
}

.fa-crosshairs:before {
    content: "\f05b"
}

.fa-crow:before {
    content: "\f520"
}

.fa-crown:before {
    content: "\f521"
}

.fa-css3:before {
    content: "\f13c"
}

.fa-css3-alt:before {
    content: "\f38b"
}

.fa-cube:before {
    content: "\f1b2"
}

.fa-cubes:before {
    content: "\f1b3"
}

.fa-cut:before {
    content: "\f0c4"
}

.fa-cuttlefish:before {
    content: "\f38c"
}

.fa-d-and-d:before {
    content: "\f38d"
}

.fa-dashcube:before {
    content: "\f210"
}

.fa-database:before {
    content: "\f1c0"
}

.fa-deaf:before {
    content: "\f2a4"
}

.fa-delicious:before {
    content: "\f1a5"
}

.fa-deploydog:before {
    content: "\f38e"
}

.fa-deskpro:before {
    content: "\f38f"
}

.fa-desktop:before {
    content: "\f108"
}

.fa-deviantart:before {
    content: "\f1bd"
}

.fa-diagnoses:before {
    content: "\f470"
}

.fa-dice:before {
    content: "\f522"
}

.fa-dice-five:before {
    content: "\f523"
}

.fa-dice-four:before {
    content: "\f524"
}

.fa-dice-one:before {
    content: "\f525"
}

.fa-dice-six:before {
    content: "\f526"
}

.fa-dice-three:before {
    content: "\f527"
}

.fa-dice-two:before {
    content: "\f528"
}

.fa-digg:before {
    content: "\f1a6"
}

.fa-digital-ocean:before {
    content: "\f391"
}

.fa-discord:before {
    content: "\f392"
}

.fa-discourse:before {
    content: "\f393"
}

.fa-divide:before {
    content: "\f529"
}

.fa-dna:before {
    content: "\f471"
}

.fa-dochub:before {
    content: "\f394"
}

.fa-docker:before {
    content: "\f395"
}

.fa-dollar-sign:before {
    content: "\f155"
}

.fa-dolly:before {
    content: "\f472"
}

.fa-dolly-flatbed:before {
    content: "\f474"
}

.fa-donate:before {
    content: "\f4b9"
}

.fa-door-closed:before {
    content: "\f52a"
}

.fa-door-open:before {
    content: "\f52b"
}

.fa-dot-circle:before {
    content: "\f192"
}

.fa-dove:before {
    content: "\f4ba"
}

.fa-download:before {
    content: "\f019"
}

.fa-draft2digital:before {
    content: "\f396"
}

.fa-dribbble:before {
    content: "\f17d"
}

.fa-dribbble-square:before {
    content: "\f397"
}

.fa-dropbox:before {
    content: "\f16b"
}

.fa-drupal:before {
    content: "\f1a9"
}

.fa-dumbbell:before {
    content: "\f44b"
}

.fa-dyalog:before {
    content: "\f399"
}

.fa-earlybirds:before {
    content: "\f39a"
}

.fa-ebay:before {
    content: "\f4f4"
}

.fa-edge:before {
    content: "\f282"
}

.fa-edit:before {
    content: "\f044"
}

.fa-eject:before {
    content: "\f052"
}

.fa-elementor:before {
    content: "\f430"
}

.fa-ellipsis-h:before {
    content: "\f141"
}

.fa-ellipsis-v:before {
    content: "\f142"
}

.fa-ember:before {
    content: "\f423"
}

.fa-empire:before {
    content: "\f1d1"
}

.fa-envelope:before {
    content: "\f0e0"
}

.fa-envelope-open:before {
    content: "\f2b6"
}

.fa-envelope-square:before {
    content: "\f199"
}

.fa-envira:before {
    content: "\f299"
}

.fa-equals:before {
    content: "\f52c"
}

.fa-eraser:before {
    content: "\f12d"
}

.fa-erlang:before {
    content: "\f39d"
}

.fa-ethereum:before {
    content: "\f42e"
}

.fa-etsy:before {
    content: "\f2d7"
}

.fa-euro-sign:before {
    content: "\f153"
}

.fa-exchange-alt:before {
    content: "\f362"
}

.fa-exclamation:before {
    content: "\f12a"
}

.fa-exclamation-circle:before {
    content: "\f06a"
}

.fa-exclamation-triangle:before {
    content: "\f071"
}

.fa-expand:before {
    content: "\f065"
}

.fa-expand-arrows-alt:before {
    content: "\f31e"
}

.fa-expeditedssl:before {
    content: "\f23e"
}

.fa-external-link-alt:before {
    content: "\f35d"
}

.fa-external-link-square-alt:before {
    content: "\f360"
}

.fa-eye:before {
    content: "\f06e"
}

.fa-eye-dropper:before {
    content: "\f1fb"
}

.fa-eye-slash:before {
    content: "\f070"
}

.fa-facebook:before {
    content: "\f09a"
}

.fa-facebook-f:before {
    content: "\f39e"
}

.fa-facebook-messenger:before {
    content: "\f39f"
}

.fa-facebook-square:before {
    content: "\f082"
}

.fa-fast-backward:before {
    content: "\f049"
}

.fa-fast-forward:before {
    content: "\f050"
}

.fa-fax:before {
    content: "\f1ac"
}

.fa-feather:before {
    content: "\f52d"
}

.fa-female:before {
    content: "\f182"
}

.fa-fighter-jet:before {
    content: "\f0fb"
}

.fa-file:before {
    content: "\f15b"
}

.fa-file-alt:before {
    content: "\f15c"
}

.fa-file-archive:before {
    content: "\f1c6"
}

.fa-file-audio:before {
    content: "\f1c7"
}

.fa-file-code:before {
    content: "\f1c9"
}

.fa-file-excel:before {
    content: "\f1c3"
}

.fa-file-image:before {
    content: "\f1c5"
}

.fa-file-medical:before {
    content: "\f477"
}

.fa-file-medical-alt:before {
    content: "\f478"
}

.fa-file-pdf:before {
    content: "\f1c1"
}

.fa-file-powerpoint:before {
    content: "\f1c4"
}

.fa-file-video:before {
    content: "\f1c8"
}

.fa-file-word:before {
    content: "\f1c2"
}

.fa-film:before {
    content: "\f008"
}

.fa-filter:before {
    content: "\f0b0"
}

.fa-fire:before {
    content: "\f06d"
}

.fa-fire-extinguisher:before {
    content: "\f134"
}

.fa-firefox:before {
    content: "\f269"
}

.fa-first-aid:before {
    content: "\f479"
}

.fa-first-order:before {
    content: "\f2b0"
}

.fa-first-order-alt:before {
    content: "\f50a"
}

.fa-firstdraft:before {
    content: "\f3a1"
}

.fa-flag:before {
    content: "\f024"
}

.fa-flag-checkered:before {
    content: "\f11e"
}

.fa-flask:before {
    content: "\f0c3"
}

.fa-flickr:before {
    content: "\f16e"
}

.fa-flipboard:before {
    content: "\f44d"
}

.fa-fly:before {
    content: "\f417"
}

.fa-folder:before {
    content: "\f07b"
}

.fa-folder-open:before {
    content: "\f07c"
}

.fa-font:before {
    content: "\f031"
}

.fa-font-awesome:before {
    content: "\f2b4"
}

.fa-font-awesome-alt:before {
    content: "\f35c"
}

.fa-font-awesome-flag:before {
    content: "\f425"
}

.fa-font-awesome-logo-full:before {
    content: "\f4e6"
}

.fa-fonticons:before {
    content: "\f280"
}

.fa-fonticons-fi:before {
    content: "\f3a2"
}

.fa-football-ball:before {
    content: "\f44e"
}

.fa-fort-awesome:before {
    content: "\f286"
}

.fa-fort-awesome-alt:before {
    content: "\f3a3"
}

.fa-forumbee:before {
    content: "\f211"
}

.fa-forward:before {
    content: "\f04e"
}

.fa-foursquare:before {
    content: "\f180"
}

.fa-free-code-camp:before {
    content: "\f2c5"
}

.fa-freebsd:before {
    content: "\f3a4"
}

.fa-frog:before {
    content: "\f52e"
}

.fa-frown:before {
    content: "\f119"
}

.fa-fulcrum:before {
    content: "\f50b"
}

.fa-futbol:before {
    content: "\f1e3"
}

.fa-galactic-republic:before {
    content: "\f50c"
}

.fa-galactic-senate:before {
    content: "\f50d"
}

.fa-gamepad:before {
    content: "\f11b"
}

.fa-gas-pump:before {
    content: "\f52f"
}

.fa-gavel:before {
    content: "\f0e3"
}

.fa-gem:before {
    content: "\f3a5"
}

.fa-genderless:before {
    content: "\f22d"
}

.fa-get-pocket:before {
    content: "\f265"
}

.fa-gg:before {
    content: "\f260"
}

.fa-gg-circle:before {
    content: "\f261"
}

.fa-gift:before {
    content: "\f06b"
}

.fa-git:before {
    content: "\f1d3"
}

.fa-git-square:before {
    content: "\f1d2"
}

.fa-github:before {
    content: "\f09b"
}

.fa-github-alt:before {
    content: "\f113"
}

.fa-github-square:before {
    content: "\f092"
}

.fa-gitkraken:before {
    content: "\f3a6"
}

.fa-gitlab:before {
    content: "\f296"
}

.fa-gitter:before {
    content: "\f426"
}

.fa-glass-martini:before {
    content: "\f000"
}

.fa-glasses:before {
    content: "\f530"
}

.fa-glide:before {
    content: "\f2a5"
}

.fa-glide-g:before {
    content: "\f2a6"
}

.fa-globe:before {
    content: "\f0ac"
}

.fa-gofore:before {
    content: "\f3a7"
}

.fa-golf-ball:before {
    content: "\f450"
}

.fa-goodreads:before {
    content: "\f3a8"
}

.fa-goodreads-g:before {
    content: "\f3a9"
}

.fa-google:before {
    content: "\f1a0"
}

.fa-google-drive:before {
    content: "\f3aa"
}

.fa-google-play:before {
    content: "\f3ab"
}

.fa-google-plus:before {
    content: "\f2b3"
}

.fa-google-plus-g:before {
    content: "\f0d5"
}

.fa-google-plus-square:before {
    content: "\f0d4"
}

.fa-google-wallet:before {
    content: "\f1ee"
}

.fa-graduation-cap:before {
    content: "\f19d"
}

.fa-gratipay:before {
    content: "\f184"
}

.fa-grav:before {
    content: "\f2d6"
}

.fa-greater-than:before {
    content: "\f531"
}

.fa-greater-than-equal:before {
    content: "\f532"
}

.fa-gripfire:before {
    content: "\f3ac"
}

.fa-grunt:before {
    content: "\f3ad"
}

.fa-gulp:before {
    content: "\f3ae"
}

.fa-h-square:before {
    content: "\f0fd"
}

.fa-hacker-news:before {
    content: "\f1d4"
}

.fa-hacker-news-square:before {
    content: "\f3af"
}

.fa-hand-holding:before {
    content: "\f4bd"
}

.fa-hand-holding-heart:before {
    content: "\f4be"
}

.fa-hand-holding-usd:before {
    content: "\f4c0"
}

.fa-hand-lizard:before {
    content: "\f258"
}

.fa-hand-paper:before {
    content: "\f256"
}

.fa-hand-peace:before {
    content: "\f25b"
}

.fa-hand-point-down:before {
    content: "\f0a7"
}

.fa-hand-point-left:before {
    content: "\f0a5"
}

.fa-hand-point-right:before {
    content: "\f0a4"
}

.fa-hand-point-up:before {
    content: "\f0a6"
}

.fa-hand-pointer:before {
    content: "\f25a"
}

.fa-hand-rock:before {
    content: "\f255"
}

.fa-hand-scissors:before {
    content: "\f257"
}

.fa-hand-spock:before {
    content: "\f259"
}

.fa-hands:before {
    content: "\f4c2"
}

.fa-hands-helping:before {
    content: "\f4c4"
}

.fa-handshake:before {
    content: "\f2b5"
}

.fa-hashtag:before {
    content: "\f292"
}

.fa-hdd:before {
    content: "\f0a0"
}

.fa-heading:before {
    content: "\f1dc"
}

.fa-headphones:before {
    content: "\f025"
}

.fa-heart:before {
    content: "\f004"
}

.fa-heartbeat:before {
    content: "\f21e"
}

.fa-helicopter:before {
    content: "\f533"
}

.fa-hips:before {
    content: "\f452"
}

.fa-hire-a-helper:before {
    content: "\f3b0"
}

.fa-history:before {
    content: "\f1da"
}

.fa-hockey-puck:before {
    content: "\f453"
}

.fa-home:before {
    content: "\f015"
}

.fa-hooli:before {
    content: "\f427"
}

.fa-hospital:before {
    content: "\f0f8"
}

.fa-hospital-alt:before {
    content: "\f47d"
}

.fa-hospital-symbol:before {
    content: "\f47e"
}

.fa-hotjar:before {
    content: "\f3b1"
}

.fa-hourglass:before {
    content: "\f254"
}

.fa-hourglass-end:before {
    content: "\f253"
}

.fa-hourglass-half:before {
    content: "\f252"
}

.fa-hourglass-start:before {
    content: "\f251"
}

.fa-houzz:before {
    content: "\f27c"
}

.fa-html5:before {
    content: "\f13b"
}

.fa-hubspot:before {
    content: "\f3b2"
}

.fa-i-cursor:before {
    content: "\f246"
}

.fa-id-badge:before {
    content: "\f2c1"
}

.fa-id-card:before {
    content: "\f2c2"
}

.fa-id-card-alt:before {
    content: "\f47f"
}

.fa-image:before {
    content: "\f03e"
}

.fa-images:before {
    content: "\f302"
}

.fa-imdb:before {
    content: "\f2d8"
}

.fa-inbox:before {
    content: "\f01c"
}

.fa-indent:before {
    content: "\f03c"
}

.fa-industry:before {
    content: "\f275"
}

.fa-infinity:before {
    content: "\f534"
}

.fa-info:before {
    content: "\f129"
}

.fa-info-circle:before {
    content: "\f05a"
}

.fa-instagram:before {
    content: "\f16d"
}

.fa-internet-explorer:before {
    content: "\f26b"
}

.fa-ioxhost:before {
    content: "\f208"
}

.fa-italic:before {
    content: "\f033"
}

.fa-itunes:before {
    content: "\f3b4"
}

.fa-itunes-note:before {
    content: "\f3b5"
}

.fa-java:before {
    content: "\f4e4"
}

.fa-jedi-order:before {
    content: "\f50e"
}

.fa-jenkins:before {
    content: "\f3b6"
}

.fa-joget:before {
    content: "\f3b7"
}

.fa-joomla:before {
    content: "\f1aa"
}

.fa-js:before {
    content: "\f3b8"
}

.fa-js-square:before {
    content: "\f3b9"
}

.fa-jsfiddle:before {
    content: "\f1cc"
}

.fa-key:before {
    content: "\f084"
}

.fa-keybase:before {
    content: "\f4f5"
}

.fa-keyboard:before {
    content: "\f11c"
}

.fa-keycdn:before {
    content: "\f3ba"
}

.fa-kickstarter:before {
    content: "\f3bb"
}

.fa-kickstarter-k:before {
    content: "\f3bc"
}

.fa-kiwi-bird:before {
    content: "\f535"
}

.fa-korvue:before {
    content: "\f42f"
}

.fa-language:before {
    content: "\f1ab"
}

.fa-laptop:before {
    content: "\f109"
}

.fa-laravel:before {
    content: "\f3bd"
}

.fa-lastfm:before {
    content: "\f202"
}

.fa-lastfm-square:before {
    content: "\f203"
}

.fa-leaf:before {
    content: "\f06c"
}

.fa-leanpub:before {
    content: "\f212"
}

.fa-lemon:before {
    content: "\f094"
}

.fa-less:before {
    content: "\f41d"
}

.fa-less-than:before {
    content: "\f536"
}

.fa-less-than-equal:before {
    content: "\f537"
}

.fa-level-down-alt:before {
    content: "\f3be"
}

.fa-level-up-alt:before {
    content: "\f3bf"
}

.fa-life-ring:before {
    content: "\f1cd"
}

.fa-lightbulb:before {
    content: "\f0eb"
}

.fa-line:before {
    content: "\f3c0"
}

.fa-link:before {
    content: "\f0c1"
}

.fa-linkedin:before {
    content: "\f08c"
}

.fa-linkedin-in:before {
    content: "\f0e1"
}

.fa-linode:before {
    content: "\f2b8"
}

.fa-linux:before {
    content: "\f17c"
}

.fa-lira-sign:before {
    content: "\f195"
}

.fa-list:before {
    content: "\f03a"
}

.fa-list-alt:before {
    content: "\f022"
}

.fa-list-ol:before {
    content: "\f0cb"
}

.fa-list-ul:before {
    content: "\f0ca"
}

.fa-location-arrow:before {
    content: "\f124"
}

.fa-lock:before {
    content: "\f023"
}

.fa-lock-open:before {
    content: "\f3c1"
}

.fa-long-arrow-alt-down:before {
    content: "\f309"
}

.fa-long-arrow-alt-left:before {
    content: "\f30a"
}

.fa-long-arrow-alt-right:before {
    content: "\f30b"
}

.fa-long-arrow-alt-up:before {
    content: "\f30c"
}

.fa-low-vision:before {
    content: "\f2a8"
}

.fa-lyft:before {
    content: "\f3c3"
}

.fa-magento:before {
    content: "\f3c4"
}

.fa-magic:before {
    content: "\f0d0"
}

.fa-magnet:before {
    content: "\f076"
}

.fa-male:before {
    content: "\f183"
}

.fa-mandalorian:before {
    content: "\f50f"
}

.fa-map:before {
    content: "\f279"
}

.fa-map-marker:before {
    content: "\f041"
}

.fa-map-marker-alt:before {
    content: "\f3c5"
}

.fa-map-pin:before {
    content: "\f276"
}

.fa-map-signs:before {
    content: "\f277"
}

.fa-mars:before {
    content: "\f222"
}

.fa-mars-double:before {
    content: "\f227"
}

.fa-mars-stroke:before {
    content: "\f229"
}

.fa-mars-stroke-h:before {
    content: "\f22b"
}

.fa-mars-stroke-v:before {
    content: "\f22a"
}

.fa-mastodon:before {
    content: "\f4f6"
}

.fa-maxcdn:before {
    content: "\f136"
}

.fa-medapps:before {
    content: "\f3c6"
}

.fa-medium:before {
    content: "\f23a"
}

.fa-medium-m:before {
    content: "\f3c7"
}

.fa-medkit:before {
    content: "\f0fa"
}

.fa-medrt:before {
    content: "\f3c8"
}

.fa-meetup:before {
    content: "\f2e0"
}

.fa-meh:before {
    content: "\f11a"
}

.fa-memory:before {
    content: "\f538"
}

.fa-mercury:before {
    content: "\f223"
}

.fa-microchip:before {
    content: "\f2db"
}

.fa-microphone:before {
    content: "\f130"
}

.fa-microphone-alt:before {
    content: "\f3c9"
}

.fa-microphone-alt-slash:before {
    content: "\f539"
}

.fa-microphone-slash:before {
    content: "\f131"
}

.fa-microsoft:before {
    content: "\f3ca"
}

.fa-minus:before {
    content: "\f068"
}

.fa-minus-circle:before {
    content: "\f056"
}

.fa-minus-square:before {
    content: "\f146"
}

.fa-mix:before {
    content: "\f3cb"
}

.fa-mixcloud:before {
    content: "\f289"
}

.fa-mizuni:before {
    content: "\f3cc"
}

.fa-mobile:before {
    content: "\f10b"
}

.fa-mobile-alt:before {
    content: "\f3cd"
}

.fa-modx:before {
    content: "\f285"
}

.fa-monero:before {
    content: "\f3d0"
}

.fa-money-bill:before {
    content: "\f0d6"
}

.fa-money-bill-alt:before {
    content: "\f3d1"
}

.fa-money-bill-wave:before {
    content: "\f53a"
}

.fa-money-bill-wave-alt:before {
    content: "\f53b"
}

.fa-money-check:before {
    content: "\f53c"
}

.fa-money-check-alt:before {
    content: "\f53d"
}

.fa-moon:before {
    content: "\f186"
}

.fa-motorcycle:before {
    content: "\f21c"
}

.fa-mouse-pointer:before {
    content: "\f245"
}

.fa-music:before {
    content: "\f001"
}

.fa-napster:before {
    content: "\f3d2"
}

.fa-neuter:before {
    content: "\f22c"
}

.fa-newspaper:before {
    content: "\f1ea"
}

.fa-nintendo-switch:before {
    content: "\f418"
}

.fa-node:before {
    content: "\f419"
}

.fa-node-js:before {
    content: "\f3d3"
}

.fa-not-equal:before {
    content: "\f53e"
}

.fa-notes-medical:before {
    content: "\f481"
}

.fa-npm:before {
    content: "\f3d4"
}

.fa-ns8:before {
    content: "\f3d5"
}

.fa-nutritionix:before {
    content: "\f3d6"
}

.fa-object-group:before {
    content: "\f247"
}

.fa-object-ungroup:before {
    content: "\f248"
}

.fa-odnoklassniki:before {
    content: "\f263"
}

.fa-odnoklassniki-square:before {
    content: "\f264"
}

.fa-old-republic:before {
    content: "\f510"
}

.fa-opencart:before {
    content: "\f23d"
}

.fa-openid:before {
    content: "\f19b"
}

.fa-opera:before {
    content: "\f26a"
}

.fa-optin-monster:before {
    content: "\f23c"
}

.fa-osi:before {
    content: "\f41a"
}

.fa-outdent:before {
    content: "\f03b"
}

.fa-page4:before {
    content: "\f3d7"
}

.fa-pagelines:before {
    content: "\f18c"
}

.fa-paint-brush:before {
    content: "\f1fc"
}

.fa-palette:before {
    content: "\f53f"
}

.fa-palfed:before {
    content: "\f3d8"
}

.fa-pallet:before {
    content: "\f482"
}

.fa-paper-plane:before {
    content: "\f1d8"
}

.fa-paperclip:before {
    content: "\f0c6"
}

.fa-parachute-box:before {
    content: "\f4cd"
}

.fa-paragraph:before {
    content: "\f1dd"
}

.fa-parking:before {
    content: "\f540"
}

.fa-paste:before {
    content: "\f0ea"
}

.fa-patreon:before {
    content: "\f3d9"
}

.fa-pause:before {
    content: "\f04c"
}

.fa-pause-circle:before {
    content: "\f28b"
}

.fa-paw:before {
    content: "\f1b0"
}

.fa-paypal:before {
    content: "\f1ed"
}

.fa-pen-square:before {
    content: "\f14b"
}

.fa-pencil-alt:before {
    content: "\f303"
}

.fa-people-carry:before {
    content: "\f4ce"
}

.fa-percent:before {
    content: "\f295"
}

.fa-percentage:before {
    content: "\f541"
}

.fa-periscope:before {
    content: "\f3da"
}

.fa-phabricator:before {
    content: "\f3db"
}

.fa-phoenix-framework:before {
    content: "\f3dc"
}

.fa-phoenix-squadron:before {
    content: "\f511"
}

.fa-phone:before {
    content: "\f095"
}

.fa-phone-slash:before {
    content: "\f3dd"
}

.fa-phone-square:before {
    content: "\f098"
}

.fa-phone-volume:before {
    content: "\f2a0"
}

.fa-php:before {
    content: "\f457"
}

.fa-pied-piper:before {
    content: "\f2ae"
}

.fa-pied-piper-alt:before {
    content: "\f1a8"
}

.fa-pied-piper-hat:before {
    content: "\f4e5"
}

.fa-pied-piper-pp:before {
    content: "\f1a7"
}

.fa-piggy-bank:before {
    content: "\f4d3"
}

.fa-pills:before {
    content: "\f484"
}

.fa-pinterest:before {
    content: "\f0d2"
}

.fa-pinterest-p:before {
    content: "\f231"
}

.fa-pinterest-square:before {
    content: "\f0d3"
}

.fa-plane:before {
    content: "\f072"
}

.fa-play:before {
    content: "\f04b"
}

.fa-play-circle:before {
    content: "\f144"
}

.fa-playstation:before {
    content: "\f3df"
}

.fa-plug:before {
    content: "\f1e6"
}

.fa-plus:before {
    content: "\f067"
}

.fa-plus-circle:before {
    content: "\f055"
}

.fa-plus-square:before {
    content: "\f0fe"
}

.fa-podcast:before {
    content: "\f2ce"
}

.fa-poo:before {
    content: "\f2fe"
}

.fa-portrait:before {
    content: "\f3e0"
}

.fa-pound-sign:before {
    content: "\f154"
}

.fa-power-off:before {
    content: "\f011"
}

.fa-prescription-bottle:before {
    content: "\f485"
}

.fa-prescription-bottle-alt:before {
    content: "\f486"
}

.fa-print:before {
    content: "\f02f"
}

.fa-procedures:before {
    content: "\f487"
}

.fa-product-hunt:before {
    content: "\f288"
}

.fa-project-diagram:before {
    content: "\f542"
}

.fa-pushed:before {
    content: "\f3e1"
}

.fa-puzzle-piece:before {
    content: "\f12e"
}

.fa-python:before {
    content: "\f3e2"
}

.fa-qq:before {
    content: "\f1d6"
}

.fa-qrcode:before {
    content: "\f029"
}

.fa-question:before {
    content: "\f128"
}

.fa-question-circle:before {
    content: "\f059"
}

.fa-quidditch:before {
    content: "\f458"
}

.fa-quinscape:before {
    content: "\f459"
}

.fa-quora:before {
    content: "\f2c4"
}

.fa-quote-left:before {
    content: "\f10d"
}

.fa-quote-right:before {
    content: "\f10e"
}

.fa-r-project:before {
    content: "\f4f7"
}

.fa-random:before {
    content: "\f074"
}

.fa-ravelry:before {
    content: "\f2d9"
}

.fa-react:before {
    content: "\f41b"
}

.fa-readme:before {
    content: "\f4d5"
}

.fa-rebel:before {
    content: "\f1d0"
}

.fa-receipt:before {
    content: "\f543"
}

.fa-recycle:before {
    content: "\f1b8"
}

.fa-red-river:before {
    content: "\f3e3"
}

.fa-reddit:before {
    content: "\f1a1"
}

.fa-reddit-alien:before {
    content: "\f281"
}

.fa-reddit-square:before {
    content: "\f1a2"
}

.fa-redo:before {
    content: "\f01e"
}

.fa-redo-alt:before {
    content: "\f2f9"
}

.fa-registered:before {
    content: "\f25d"
}

.fa-rendact:before {
    content: "\f3e4"
}

.fa-renren:before {
    content: "\f18b"
}

.fa-reply:before {
    content: "\f3e5"
}

.fa-reply-all:before {
    content: "\f122"
}

.fa-replyd:before {
    content: "\f3e6"
}

.fa-researchgate:before {
    content: "\f4f8"
}

.fa-resolving:before {
    content: "\f3e7"
}

.fa-retweet:before {
    content: "\f079"
}

.fa-ribbon:before {
    content: "\f4d6"
}

.fa-road:before {
    content: "\f018"
}

.fa-robot:before {
    content: "\f544"
}

.fa-rocket:before {
    content: "\f135"
}

.fa-rocketchat:before {
    content: "\f3e8"
}

.fa-rockrms:before {
    content: "\f3e9"
}

.fa-rss:before {
    content: "\f09e"
}

.fa-rss-square:before {
    content: "\f143"
}

.fa-ruble-sign:before {
    content: "\f158"
}

.fa-ruler:before {
    content: "\f545"
}

.fa-ruler-combined:before {
    content: "\f546"
}

.fa-ruler-horizontal:before {
    content: "\f547"
}

.fa-ruler-vertical:before {
    content: "\f548"
}

.fa-rupee-sign:before {
    content: "\f156"
}

.fa-safari:before {
    content: "\f267"
}

.fa-sass:before {
    content: "\f41e"
}

.fa-save:before {
    content: "\f0c7"
}

.fa-schlix:before {
    content: "\f3ea"
}

.fa-school:before {
    content: "\f549"
}

.fa-screwdriver:before {
    content: "\f54a"
}

.fa-scribd:before {
    content: "\f28a"
}

.fa-search:before {
    content: "\f002"
}

.fa-search-minus:before {
    content: "\f010"
}

.fa-search-plus:before {
    content: "\f00e"
}

.fa-searchengin:before {
    content: "\f3eb"
}

.fa-seedling:before {
    content: "\f4d8"
}

.fa-sellcast:before {
    content: "\f2da"
}

.fa-sellsy:before {
    content: "\f213"
}

.fa-server:before {
    content: "\f233"
}

.fa-servicestack:before {
    content: "\f3ec"
}

.fa-share:before {
    content: "\f064"
}

.fa-share-alt:before {
    content: "\f1e0"
}

.fa-share-alt-square:before {
    content: "\f1e1"
}

.fa-share-square:before {
    content: "\f14d"
}

.fa-shekel-sign:before {
    content: "\f20b"
}

.fa-shield-alt:before {
    content: "\f3ed"
}

.fa-ship:before {
    content: "\f21a"
}

.fa-shipping-fast:before {
    content: "\f48b"
}

.fa-shirtsinbulk:before {
    content: "\f214"
}

.fa-shoe-prints:before {
    content: "\f54b"
}

.fa-shopping-bag:before {
    content: "\f290"
}

.fa-shopping-basket:before {
    content: "\f291"
}

.fa-shopping-cart:before {
    content: "\f07a"
}

.fa-shower:before {
    content: "\f2cc"
}

.fa-sign:before {
    content: "\f4d9"
}

.fa-sign-in-alt:before {
    content: "\f2f6"
}

.fa-sign-language:before {
    content: "\f2a7"
}

.fa-sign-out-alt:before {
    content: "\f2f5"
}

.fa-signal:before {
    content: "\f012"
}

.fa-simplybuilt:before {
    content: "\f215"
}

.fa-sistrix:before {
    content: "\f3ee"
}

.fa-sitemap:before {
    content: "\f0e8"
}

.fa-sith:before {
    content: "\f512"
}

.fa-skull:before {
    content: "\f54c"
}

.fa-skyatlas:before {
    content: "\f216"
}

.fa-skype:before {
    content: "\f17e"
}

.fa-slack:before {
    content: "\f198"
}

.fa-slack-hash:before {
    content: "\f3ef"
}

.fa-sliders-h:before {
    content: "\f1de"
}

.fa-slideshare:before {
    content: "\f1e7"
}

.fa-smile:before {
    content: "\f118"
}

.fa-smoking:before {
    content: "\f48d"
}

.fa-smoking-ban:before {
    content: "\f54d"
}

.fa-snapchat:before {
    content: "\f2ab"
}

.fa-snapchat-ghost:before {
    content: "\f2ac"
}

.fa-snapchat-square:before {
    content: "\f2ad"
}

.fa-snowflake:before {
    content: "\f2dc"
}

.fa-sort:before {
    content: "\f0dc"
}

.fa-sort-alpha-down:before {
    content: "\f15d"
}

.fa-sort-alpha-up:before {
    content: "\f15e"
}

.fa-sort-amount-down:before {
    content: "\f160"
}

.fa-sort-amount-up:before {
    content: "\f161"
}

.fa-sort-down:before {
    content: "\f0dd"
}

.fa-sort-numeric-down:before {
    content: "\f162"
}

.fa-sort-numeric-up:before {
    content: "\f163"
}

.fa-sort-up:before {
    content: "\f0de"
}

.fa-soundcloud:before {
    content: "\f1be"
}

.fa-space-shuttle:before {
    content: "\f197"
}

.fa-speakap:before {
    content: "\f3f3"
}

.fa-spinner:before {
    content: "\f110"
}

.fa-spotify:before {
    content: "\f1bc"
}

.fa-square:before {
    content: "\f0c8"
}

.fa-square-full:before {
    content: "\f45c"
}

.fa-stack-exchange:before {
    content: "\f18d"
}

.fa-stack-overflow:before {
    content: "\f16c"
}

.fa-star:before {
    content: "\f005"
}

.fa-star-half:before {
    content: "\f089"
}

.fa-staylinked:before {
    content: "\f3f5"
}

.fa-steam:before {
    content: "\f1b6"
}

.fa-steam-square:before {
    content: "\f1b7"
}

.fa-steam-symbol:before {
    content: "\f3f6"
}

.fa-step-backward:before {
    content: "\f048"
}

.fa-step-forward:before {
    content: "\f051"
}

.fa-stethoscope:before {
    content: "\f0f1"
}

.fa-sticker-mule:before {
    content: "\f3f7"
}

.fa-sticky-note:before {
    content: "\f249"
}

.fa-stop:before {
    content: "\f04d"
}

.fa-stop-circle:before {
    content: "\f28d"
}

.fa-stopwatch:before {
    content: "\f2f2"
}

.fa-store:before {
    content: "\f54e"
}

.fa-store-alt:before {
    content: "\f54f"
}

.fa-strava:before {
    content: "\f428"
}

.fa-stream:before {
    content: "\f550"
}

.fa-street-view:before {
    content: "\f21d"
}

.fa-strikethrough:before {
    content: "\f0cc"
}

.fa-stripe:before {
    content: "\f429"
}

.fa-stripe-s:before {
    content: "\f42a"
}

.fa-stroopwafel:before {
    content: "\f551"
}

.fa-studiovinari:before {
    content: "\f3f8"
}

.fa-stumbleupon:before {
    content: "\f1a4"
}

.fa-stumbleupon-circle:before {
    content: "\f1a3"
}

.fa-subscript:before {
    content: "\f12c"
}

.fa-subway:before {
    content: "\f239"
}

.fa-suitcase:before {
    content: "\f0f2"
}

.fa-sun:before {
    content: "\f185"
}

.fa-superpowers:before {
    content: "\f2dd"
}

.fa-superscript:before {
    content: "\f12b"
}

.fa-supple:before {
    content: "\f3f9"
}

.fa-sync:before {
    content: "\f021"
}

.fa-sync-alt:before {
    content: "\f2f1"
}

.fa-syringe:before {
    content: "\f48e"
}

.fa-table:before {
    content: "\f0ce"
}

.fa-table-tennis:before {
    content: "\f45d"
}

.fa-tablet:before {
    content: "\f10a"
}

.fa-tablet-alt:before {
    content: "\f3fa"
}

.fa-tablets:before {
    content: "\f490"
}

.fa-tachometer-alt:before {
    content: "\f3fd"
}

.fa-tag:before {
    content: "\f02b"
}

.fa-tags:before {
    content: "\f02c"
}

.fa-tape:before {
    content: "\f4db"
}

.fa-tasks:before {
    content: "\f0ae"
}

.fa-taxi:before {
    content: "\f1ba"
}

.fa-teamspeak:before {
    content: "\f4f9"
}

.fa-telegram:before {
    content: "\f2c6"
}

.fa-telegram-plane:before {
    content: "\f3fe"
}

.fa-tencent-weibo:before {
    content: "\f1d5"
}

.fa-terminal:before {
    content: "\f120"
}

.fa-text-height:before {
    content: "\f034"
}

.fa-text-width:before {
    content: "\f035"
}

.fa-th:before {
    content: "\f00a"
}

.fa-th-large:before {
    content: "\f009"
}

.fa-th-list:before {
    content: "\f00b"
}

.fa-themeisle:before {
    content: "\f2b2"
}

.fa-thermometer:before {
    content: "\f491"
}

.fa-thermometer-empty:before {
    content: "\f2cb"
}

.fa-thermometer-full:before {
    content: "\f2c7"
}

.fa-thermometer-half:before {
    content: "\f2c9"
}

.fa-thermometer-quarter:before {
    content: "\f2ca"
}

.fa-thermometer-three-quarters:before {
    content: "\f2c8"
}

.fa-thumbs-down:before {
    content: "\f165"
}

.fa-thumbs-up:before {
    content: "\f164"
}

.fa-thumbtack:before {
    content: "\f08d"
}

.fa-ticket-alt:before {
    content: "\f3ff"
}

.fa-times:before {
    content: "\f00d"
}

.fa-times-circle:before {
    content: "\f057"
}

.fa-tint:before {
    content: "\f043"
}

.fa-toggle-off:before {
    content: "\f204"
}

.fa-toggle-on:before {
    content: "\f205"
}

.fa-toolbox:before {
    content: "\f552"
}

.fa-trade-federation:before {
    content: "\f513"
}

.fa-trademark:before {
    content: "\f25c"
}

.fa-train:before {
    content: "\f238"
}

.fa-transgender:before {
    content: "\f224"
}

.fa-transgender-alt:before {
    content: "\f225"
}

.fa-trash:before {
    content: "\f1f8"
}

.fa-trash-alt:before {
    content: "\f2ed"
}

.fa-tree:before {
    content: "\f1bb"
}

.fa-trello:before {
    content: "\f181"
}

.fa-tripadvisor:before {
    content: "\f262"
}

.fa-trophy:before {
    content: "\f091"
}

.fa-truck:before {
    content: "\f0d1"
}

.fa-truck-loading:before {
    content: "\f4de"
}

.fa-truck-moving:before {
    content: "\f4df"
}

.fa-tshirt:before {
    content: "\f553"
}

.fa-tty:before {
    content: "\f1e4"
}

.fa-tumblr:before {
    content: "\f173"
}

.fa-tumblr-square:before {
    content: "\f174"
}

.fa-tv:before {
    content: "\f26c"
}

.fa-twitch:before {
    content: "\f1e8"
}

.fa-twitter:before {
    content: "\f099"
}

.fa-twitter-square:before {
    content: "\f081"
}

.fa-typo3:before {
    content: "\f42b"
}

.fa-uber:before {
    content: "\f402"
}

.fa-uikit:before {
    content: "\f403"
}

.fa-umbrella:before {
    content: "\f0e9"
}

.fa-underline:before {
    content: "\f0cd"
}

.fa-undo:before {
    content: "\f0e2"
}

.fa-undo-alt:before {
    content: "\f2ea"
}

.fa-uniregistry:before {
    content: "\f404"
}

.fa-universal-access:before {
    content: "\f29a"
}

.fa-university:before {
    content: "\f19c"
}

.fa-unlink:before {
    content: "\f127"
}

.fa-unlock:before {
    content: "\f09c"
}

.fa-unlock-alt:before {
    content: "\f13e"
}

.fa-untappd:before {
    content: "\f405"
}

.fa-upload:before {
    content: "\f093"
}

.fa-usb:before {
    content: "\f287"
}

.fa-user:before {
    content: "\f007"
}

.fa-user-alt:before {
    content: "\f406"
}

.fa-user-alt-slash:before {
    content: "\f4fa"
}

.fa-user-astronaut:before {
    content: "\f4fb"
}

.fa-user-check:before {
    content: "\f4fc"
}

.fa-user-circle:before {
    content: "\f2bd"
}

.fa-user-clock:before {
    content: "\f4fd"
}

.fa-user-cog:before {
    content: "\f4fe"
}

.fa-user-edit:before {
    content: "\f4ff"
}

.fa-user-friends:before {
    content: "\f500"
}

.fa-user-graduate:before {
    content: "\f501"
}

.fa-user-lock:before {
    content: "\f502"
}

.fa-user-md:before {
    content: "\f0f0"
}

.fa-user-minus:before {
    content: "\f503"
}

.fa-user-ninja:before {
    content: "\f504"
}

.fa-user-plus:before {
    content: "\f234"
}

.fa-user-secret:before {
    content: "\f21b"
}

.fa-user-shield:before {
    content: "\f505"
}

.fa-user-slash:before {
    content: "\f506"
}

.fa-user-tag:before {
    content: "\f507"
}

.fa-user-tie:before {
    content: "\f508"
}

.fa-user-times:before {
    content: "\f235"
}

.fa-users:before {
    content: "\f0c0"
}

.fa-users-cog:before {
    content: "\f509"
}

.fa-ussunnah:before {
    content: "\f407"
}

.fa-utensil-spoon:before {
    content: "\f2e5"
}

.fa-utensils:before {
    content: "\f2e7"
}

.fa-vaadin:before {
    content: "\f408"
}

.fa-venus:before {
    content: "\f221"
}

.fa-venus-double:before {
    content: "\f226"
}

.fa-venus-mars:before {
    content: "\f228"
}

.fa-viacoin:before {
    content: "\f237"
}

.fa-viadeo:before {
    content: "\f2a9"
}

.fa-viadeo-square:before {
    content: "\f2aa"
}

.fa-vial:before {
    content: "\f492"
}

.fa-vials:before {
    content: "\f493"
}

.fa-viber:before {
    content: "\f409"
}

.fa-video:before {
    content: "\f03d"
}

.fa-video-slash:before {
    content: "\f4e2"
}

.fa-vimeo:before {
    content: "\f40a"
}

.fa-vimeo-square:before {
    content: "\f194"
}

.fa-vimeo-v:before {
    content: "\f27d"
}

.fa-vine:before {
    content: "\f1ca"
}

.fa-vk:before {
    content: "\f189"
}

.fa-vnv:before {
    content: "\f40b"
}

.fa-volleyball-ball:before {
    content: "\f45f"
}

.fa-volume-down:before {
    content: "\f027"
}

.fa-volume-off:before {
    content: "\f026"
}

.fa-volume-up:before {
    content: "\f028"
}

.fa-vuejs:before {
    content: "\f41f"
}

.fa-walking:before {
    content: "\f554"
}

.fa-wallet:before {
    content: "\f555"
}

.fa-warehouse:before {
    content: "\f494"
}

.fa-weibo:before {
    content: "\f18a"
}

.fa-weight:before {
    content: "\f496"
}

.fa-weixin:before {
    content: "\f1d7"
}

.fa-whatsapp:before {
    content: "\f232"
}

.fa-whatsapp-square:before {
    content: "\f40c"
}

.fa-wheelchair:before {
    content: "\f193"
}

.fa-whmcs:before {
    content: "\f40d"
}

.fa-wifi:before {
    content: "\f1eb"
}

.fa-wikipedia-w:before {
    content: "\f266"
}

.fa-window-close:before {
    content: "\f410"
}

.fa-window-maximize:before {
    content: "\f2d0"
}

.fa-window-minimize:before {
    content: "\f2d1"
}

.fa-window-restore:before {
    content: "\f2d2"
}

.fa-windows:before {
    content: "\f17a"
}

.fa-wine-glass:before {
    content: "\f4e3"
}

.fa-wolf-pack-battalion:before {
    content: "\f514"
}

.fa-won-sign:before {
    content: "\f159"
}

.fa-wordpress:before {
    content: "\f19a"
}

.fa-wordpress-simple:before {
    content: "\f411"
}

.fa-wpbeginner:before {
    content: "\f297"
}

.fa-wpexplorer:before {
    content: "\f2de"
}

.fa-wpforms:before {
    content: "\f298"
}

.fa-wrench:before {
    content: "\f0ad"
}

.fa-x-ray:before {
    content: "\f497"
}

.fa-xbox:before {
    content: "\f412"
}

.fa-xing:before {
    content: "\f168"
}

.fa-xing-square:before {
    content: "\f169"
}

.fa-y-combinator:before {
    content: "\f23b"
}

.fa-yahoo:before {
    content: "\f19e"
}

.fa-yandex:before {
    content: "\f413"
}

.fa-yandex-international:before {
    content: "\f414"
}

.fa-yelp:before {
    content: "\f1e9"
}

.fa-yen-sign:before {
    content: "\f157"
}

.fa-yoast:before {
    content: "\f2b1"
}

.fa-youtube:before {
    content: "\f167"
}

.fa-youtube-square:before {
    content: "\f431"
}

.sr-only {
    border: 0;
    clip: rect(0, 0, 0, 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px
}

.sr-only-focusable:active,
.sr-only-focusable:focus {
    clip: auto;
    height: auto;
    margin: 0;
    overflow: visible;
    position: static;
    width: auto
}

@font-face {
    font-family: Font Awesome\ 5 Brands;
    font-style: normal;
    font-weight: 400;
    src: url(../font/fa-brands-400.eot);
    src: url(../font/fa-brands-400.eot?#iefix) format("embedded-opentype"), url(../font/fa-brands-400.woff2) format("woff2"), url(../font/fa-brands-400.woff) format("woff"), url(../font/fa-brands-400.ttf) format("truetype"), url(../font/fa-brands-400.svg#fontawesome) format("svg")
}

.fab {
    font-family: Font Awesome\ 5 Brands
}

@font-face {
    font-family: Font Awesome;
    font-style: normal;
    font-weight: 400;
    src: url(../font/fa-regular-400.eot);
    src: url(../font/fa-regular-400.eot?#iefix) format("embedded-opentype"), url(../font/fa-regular-400.woff2) format("woff2"), url(../font/fa-regular-400.woff) format("woff"), url(../font/fa-regular-400.ttf) format("truetype"), url(../font/fa-regular-400.svg#fontawesome) format("svg")
}

.far {
    font-weight: 400
}

@font-face {
    font-family: Font Awesome;
    font-style: normal;
    font-weight: 900;
    src: url(../font/fa-solid-900.eot);
    src: url(../font/fa-solid-900.eot?#iefix) format("embedded-opentype"), url(../font/fa-solid-900.woff2) format("woff2"), url(../font/fa-solid-900.woff) format("woff"), url(../font/fa-solid-900.ttf) format("truetype"), url(../font/fa-solid-900.svg#fontawesome) format("svg")
}

.fa,
.far,
.fas {
    font-family: Font Awesome
}

.fa,
.fas {
    font-weight: 900
}

/*! Ikon * custom icon font for this template made by SoftNio Team */
@font-face {
    font-family: ikon;
    src: url(../font/ikon.eot?q3pyw5);
    src: url(../font/ikon.eot?q3pyw5#iefix) format('embedded-opentype'), url(../font/ikon.ttf?q3pyw5) format('truetype'), url(../font/ikon.woff?q3pyw5) format('woff'), url(../font/ikon.svg?q3pyw5#ikon) format('svg');
    font-weight: 400;
    font-style: normal
}
.cursor {
    font-size: 50px;
    color: white;
    text-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2);
    text-align: center;
    position: absolute;
    left: 0;
    right: 0;
    top: 20px;
}
.no-copy {
    -webkit-user-select: none;
    -moz-user-select: none;
    -khtml-user-select: none;
    user-select: none;
}
.counter {
    width: 240px;
    height: 240px;
    border-radius: 50%;
    /* box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.08); */
    font-weight: 300;
    align-items: center;
    justify-content: center;
}
.counter {
    height: 100%;
    font-size: 70px;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    font-weight: bold;
    display: flex;
    width: 100%;
}
.flex {
    display: flex;
}
 .blue {
   color:#5dc0ff;
 }
 .red {
   color:#ff7365;
 }
</style>

  <link rel="preconnect" href="font/ProximaNova-Semibold.ttf" crossorigin="anonymous">
  <link rel="preconnect" href="font/ProximaNova-Regular.ttf" crossorigin="anonymous">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">



     
<?=$snow?>
  <link rel="prefetch" href="../img/BG_footer.png">
  <!-- <link rel="manifest" href="/manifest.json"> -->
  <link rel="dns-prefetch" href="https://www.youtube.com/">
  <!--link rel="prerender" href=""-->
  <link rel="shortcut icon" href="/fav.ico" type="image/x-icon">
  <title><?=$sitename?> | Азартная игра с выбором шанса победы. Моментальные выплаты. Уникальная система уровней</title>
  <meta name="description" content="Азартная игра с выводом реальных денег! Выберите шанс победы и выигрывайте рубли бесплатно каждый день. Киньте кости и получите бонус на сайте <?=$sitename?> уже сегодня! С нами уже более <?=$countusers?> пользователей">
  <link rel="canonical" href="<?=$hprotocol?>://<?=$linksite?>">
  <meta property="og:title" content="<?=$sitename?> - Азартная игра с выбором шанса победы. Моментальные выплаты. Уникальная система уровней"> 
    <meta property="og:type" content="Website">
    <meta property="og:url" content="<?=$hprotocol?>://<?=$linksite?>">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:image" content="../img/on.png">
    <meta property="og:description" content="Азартная игра с выводом реальных денег! Выберите шанс победы и выигрывайте рубли бесплатно каждый день. Киньте кости и получите бонус на сайте <?=$sitename?> уже сегодня! С нами уже более <?=$countusers?> пользователей">
    <meta name="keywords" content="выиграть реальные деньги без вложений, кости, кидать кости, игра на рубли, выбор шанса победы, выиграть деньги онлайн, рулетка, азартная игра, казино">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#A33EFF">
    <script src="../js/jq.js"></script>

        <!-- BEGIN Page Level CSS-->
      
    <link rel="stylesheet" href="./public/right-nav-style.css">
    
 <style>

    /* Важное свойство */
    .chat {
    height: 430px;
    width: 110%;
    overflow: auto; /* Это позволяет отображать полосу прокрутки */
    position: relative; /* Это позволяет съезжать тексту в слое, не растягивая страницу */
    text-align: left;
background-color:White;
    border: solid #7440ef 1px;
    }

    .chat div {
    position: absolute; /* Страница остаётся того же размера */
background-color:White;
    }

    .chat span {
background-color:White;
    display: block;
    }

    /* Для CSS 3 */
    .r4 {
background-color:White;
    -moz-border-radius: 15px;
    -khtml-border-radius: 15px;
    -webkit-border-radius: 15px;
    border-radius: 15px;
    }
</style>
<?php
echo $chatCode;

?>
 

<div class="modal-notification">
    </div>
<script>
let popUpNew = document.querySelectorAll('.pop-up'),
  popUpProgress = document.querySelectorAll('.pop-up_progress'),
  modalNotification = document.querySelector('.modal-notification');

  function hiddenPopUp() {
    for (let i = 0; i < popUpNew.length; i++) {
      popUpProgress[i].classList.add('pop-up__animate');
      setTimeout(function() {
      popUpNew[i].classList.add('pop-up__none');
      }, 1700)
      setTimeout(function() {
        popUpNew[i].classList.add('pop-up__hidden');
        popUpNew[i].remove();
      }, 1700)
      
    }
  }

  function showModal(text,color) {
    let classType;
    if (color == 'green') {
      classType = 'succses';
    } else if (color == 'red') {
      classType = 'error';
    }
    let modalBody = '<p class="pop-up pop-up_'+classType+' pop-up__fadeIn"><span class="pop-up_txt">'+text+'</span><span class="pop-up_progress"></span><span class="pop-up_exit" aria-label="Закрыть всплывающее окно"></span></p>';
    modalNotification.insertAdjacentHTML('beforeend', `${modalBody}`);

    popUpNew = document.querySelectorAll('.pop-up');
    popUpProgress = document.querySelectorAll('.pop-up_progress');


    setTimeout(hiddenPopUp,1000);

    for (let i = 0; i < popUpNew.length; i++) {
    popUpNew[i].addEventListener('click', function() {
      popUpNew[i].classList.add('pop-up__none');
      setTimeout(function() {
        popUpNew[i].classList.add('pop-up__hidden');
        popUpNew[i].remove();
      }, 200)
    }) 
  }
  }
  </script>



 <script>
                            function exit() {
$.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
          
                    },  
                                                                                data: {
                                                                                    type: "exit"
                                                                                  
                                                                                   
                                                                                    
                                                                                },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                                               
          location.reload(true);
                                                                return 
                                            }else{
                                               
        alert('Что-то пошло не так, обратитесь в поддержку...');
                                            }
                                        }   
   });
                              
}


                          </script>
<link rel="stylesheet" href="../public/deferred.css?1577959304737"></head>
<body class="body-min-long"><!-- <style>a.winter-logo:before {transform: translate(-110px,-48px);}</style> -->

  <script defer="" src="../js/index.js?ver=1577959303"></script>
<header class="head head_noneAuth" style="width: 1150px;">
    <aside class="head_logo">
      <a href="/" class="head_logo_txt "><?=$sitename?></a>
    </aside>
    <nav class="nav">
      <ul class="nav_ul">
        <li><a href="/" class="nav_ul_a">Главная</a></li>
        <li><a href="/faq" class="nav_ul_a">Помощь</a></li>
        <li><a href="/payouts" class="nav_ul_a">Выплаты</a></li>
        <li><a href="/rating" class="nav_ul_a">Рейтинг</a></li>

        
  
        <li>
          <ul class="mode">
            <li class="mode-li_step">
              <a href="#" class="mode-link mode-link__before">Режимы</a> 
              <button class="mode_btn" aria-label="Развернуть/Свернуть меню"></button>
            </li>
            <li class="mode-li wheel mode-min"><a href="/wheel" class="mode-link">Колесо</a></li>
           
            <li class="mode-li dice "><a href="/" class="mode-link">Кости</a></li>
      
      
          </ul>
        </li>

      
    
      </ul>
    </nav>

     
 
    


    
    <div class="wrap-ul">
          <aside class="profile">
          <div class="profile_block">
            <div class="profile-light">
              <p class="profile-light_txt"><span><?=$login?></span></p>
              <ul class="profile-light_ul back">
                <li><a href="/profile" class="profile-light_link">Кабинет</a></li>
                <li><a href="/pay" class="profile-light_link">Пополнить</a></li>
                <li><a href="/winthdraw" class="profile-light_link">Вывести</a></li>
                
                <li><a href="/ref" class="profile-light_link">Рефералы</a></li>
              <span id="adminus"><?=$adminus?></span>
                
                <li><a onclick="exit();location.href = '';exit();" class="profile-light_link">Выйти</a></li>
              </ul>
            </div>
            <p class="profile_block_balance">
              <span class="balance" id="userBalanceMob"><?=$balancce?></span> D.</p><p class="balance_animate"></p>
            <p></p>
          </div>

          <input id="tokens" type="hidden" token="21f2d45e5dca46248da18e439c2913ed0c1b0bf19810cf314bd3b97b1c3d5bed" user="79877">
          <a href="/profile" class="Snow-awatar"><img src="<?=$ava?>" alt="User_icon" class="profile_user"></a>
        </aside>
        </div></header>

<div class="head-mobaile">
  
  <a href="/" class="head_logo_txt"><?=$sitename?></a>

  <div class="head-mobaile-cont">
    <div class="head-mobaile-cont_profile">
      <img src="<?=$ava?>" alt="Фото профиля пользователя" class="head-mobaile-cont_img">
      <a href="/profile" class="head-mobaile-cont_txt"><?=$login?></a>

    </div>
    <a href="/pay" class="head-mobaile-cont_link"><span mybalanceMob="0.00" class="odometr" id="userBalanceMobb"><?=$balancce?></span> D.<span class="balance_animate"></span></a>
    <div class="head-mobaile-cont_burger"><button class="head-mobaile-cont_burger__before mobaile"></button></div>
  </div>

</div>





 
    

<input id="colorselected" value="0" hidden />
<form id="game_form" action="">
   <section class="game width-type">
    <h2 class="game_title">Чтобы начать игру, выберите цвет, процент и ставку</h2> 
  <div class="game-content">
    <div class="game-mode-standart game-mode-find" data-game="1">
      <aside class="game_value">


<article class="game_value_label label-modifed margintop label-full">
         
          <label for="stavka" class="game_value_label  label-column">
            <span class="game_value_label_span Main_game_span">Изменить шанс:</span>
            <div class="game_value_label_block percent" style="width: 130px;">
              <input  value="50.00" id="BetPerBattle" onkeyup="battlechance(this); profitbattle()" type="text" class="game_value_inp inp-purple" placeholder="Введите число" disabled>
            </div>
            <div class="game_value_gradient gradient-short font-arial">
                            <button id="minus_per" class="game_value_mod before-mod" onClick="battlechance(this); profitbattle();return false;" disabled>-</button>
                          
                            <button id="plus_per" class="game_value_mod before-mod" onClick="battlechance(this); profitbattle();return false;" disabled>+</button>
                        </div>
          </label>
          <?php
          $maxLenghtBet = strlen($max_bet);
          ?>
           <label for="stavka" class="game_value_label  label-column">
            <span class="game_value_label_span Main_game_span">Введите ставку:</span>
            <div class="game_value_label_block" style="width: 130px;">
              <input value="<?=$min_bet?>" style="overflow: auto;" name="BetSizeBattle" type="text" class="game_value_inp" maxlength="<?=$maxLenghtBet?>" onchange="profitbattle();" oninput="profitbattle();" id="BetSizeBattle" placeholder="Ставка от <?=$min_bet?> D." max="99999">
            </div>
            <div class="game_value_gradient gradient-short font-arial">
                            <button id="max_dice" class="game_value_mod" onClick="return false;">max</button>
<button id="x2_dice" class="game_value_mod" onClick="return false;">&nbsp;x2</button>
                         <button id="m2_dice" class="game_value_mod" onClick="return false;">1/2</button>
                        </div>
          </label>
        
                                       
                                                           <span class="promo-form-btn" style="display:none">0 - <span id="MinRangeBattle" >499</span></span>
                                                            <div id="BattleMin" class="promo-form-btn"><button id="redselect" style="width: 175px;height: 50px;font-size: 20px;" onclick="select_team('red', 'blue');return false;" class="promo-form-btn"><i class="fa fa-angle-down red">&nbsp;</i>&nbsp;Красный</button></div><!-- .input-item -->
                                                       
                                                     
                                                            <span class="promo-form-btn" style="display:none"><span id="MaxRangeBattle">500</span> - 999</span>
                                                            <span>&nbsp;</span>
                                                            <div id="BattleMax" class="promo-form-btn"><button id="blueselect" style="width: 175px;height: 50px;font-size: 20px;" onclick="select_team('blue', 'red');return false;" class="promo-form-btn"><i class="fa fa-angle-up blue">&nbsp;</i>&nbsp;Синий</button></div><!-- .input-item -->
                            
                                                     
        </article>
    
        <div class="battle-roulette no-copy" style="position: relative;">
     <div class="cursor" style="position: absolute;z-index: 1"><i class="fas fa-sort-up"></i>
    </div> 
     <div style="margin: 0;position: absolute;top: 50%;left: 25%;transform: translate(0, -50%);overflow: hidden;word-wrap: break-word;" ><h5 class="game_value_label_span">Возможный выигрыш</h5>
          <p class="game_value_inp_alt" style="overflow: hidden;word-wrap: break-word;">
            <mark id="ProfitBattle" style="position: absolute;top: 50%;left: 20%;transform: translate(0, -50%);overflow: hidden;word-wrap: break-word;"> 1.98</mark>
          </p>
      </div>
      <svg id="circle" style="position:relative;" version="1" xmlns="http://www.w3.org/2000/svg" width="350" height="350" viewBox="0 0 400 400" >
      <defs><linearGradient id="grad2" x1="0%" y1="0%" x2="0%" y2="100%">
          <stop offset="0%" style="stop-color:#5dc0ff;stop-opacity:1"></stop>
          <stop offset="100%" style="stop-color:#0b6cee;stop-opacity:1"></stop>
          </linearGradient></defs>
          <defs><linearGradient id="grad1" x1="0%" y1="0%" x2="0%" y2="100%">
            <stop offset="0%" style="stop-color:#ff7365;stop-opacity:1;"></stop>
            <stop offset="100%" style="stop-color:#f92e7f;stop-opacity:1"></stop>
            </linearGradient></defs>
            <g class="chart" transform="translate(200, 200)">
              <g class="timer" transform="translate(0,0)">
                <g class="bets" id="circle" style="transform: rotate(0deg); transition: transform 4s cubic-bezier(0.15, 0.15, 0, 1);">
                  <path id="blue" fill="url(#grad2)" d="M1.1021821192326179e-14,-180A180,180,0,1,1,1.1021821192326179e-14,180L9.491012693391987e-15,155A155,155,0,1,0,9.491012693391987e-15,-155Z" transform="rotate(0)" style="opacity: 1;"></path>
                  <path id="red" fill="url(#grad1)" d="M1.1021821192326179e-14,180A180,180,0,1,1,-3.3065463576978534e-14,-180L-2.847303808017596e-14,-155A155,155,0,1,0,9.491012693391987e-15,155Z" transform="rotate(0)" style="opacity: 1; "></path>
                  </g></g></g></svg>
                  </div>


    </aside>

      <aside class="control-block">
        <div class="control-element">
          <div class="mod-regulator-wrap">
            
             <!-- TASKS -->
                       
   <div id="modal-tasking" class="modal-task disabled-bloc-im">
    <article class="tasks">


      <h2 class="tasks-title">Ежедневные задачи</h2>
      <p class="tasks-text">Каждый день вы можете выполнять задачи и получить за них хорошую <br> награду на сайте <?=$sitename?></p>
      <article class="tasks-art">
        <h3 class="tasks-title-min">Сегодня мы подготовили для вас след.задачу:</h3>
        <ul class="tasks-task">
          <li class="tasks-li">Сыграйте 189 игр ( Выполнено: <span id="task_g">0</span> из 189 )</li>
        </ul>
      </article>
      <article class="tasks-art">
        <h3 class="tasks-title-min">Приз</h3>
        <p class="tasks-text">После выполнения вы получите +3.15 D. на баланс и 9 XP к <a href="/lvl/" class="task-link-wrap">уровню</a></p>
      </article>
      <div class="task-link-block">
        <a href="/profile" class="task-link link-trf">В кабинет</a>
        <a id="close_task" class="task-link__big">Перейти к игре</a>
        <p class="tasks-text-block">*Успеть за <mark class="task-link">24 часа</mark></p>
      </div>

    </article>
  </div> 

            

   <script>
        $('#close_task').on('click', function () {
          $('#modal-tasking').removeClass('modal-task-in');       
           $('#modal-tasking').addClass('modal-task-out');   
           $('#modal-tasking').addClass('disabled-bloc-im');     
        });

        $('#open_task').on('click', function () {
          $('#modal-tasking').removeClass('disabled-bloc-im');       
         $('#modal-tasking').removeClass('modal-task-out');       
           $('#modal-tasking').addClass('modal-task-in');       
        });
    </script>                                <!-- //////////// -->

            
          </div>
        </div>
        <div class="control-element">
          
          
        </div>
      </aside>
        
      </div>
    </div>






  <div class="game-cricle-modification game-mode-find disabled-block" data-game="0">
    <aside class="game_value">
        <label for="stavka" class="game_value_label label-modifed null-top">
          <span class="game_value_label_span">Введите ставку:</span>
          <div class="game_value_label_block">
            <input value="1" name="price" maxlength="5" type="text" class="game_value_inp" id="BetSize" onchange="javascript:toChange();" placeholder="Ставка от 1 D.">
            <span class="game_value_gradient">
              <a href="javascript:void(0)" id="max" data-order="1" class="game_value_mod game-after">max</a>
              <a href="javascript:void(0)" id="x2" data-order="1" class="game_value_mod game-after-x">x2</a>
              <a href="javascript:void(0)" id="m2" data-order="2" class="game_value_mod">1/2</a>
            </span>
          </div>
        </label>
        <article class="game_value_label label-modifed margintop label-full">
          <h5 class="game_value_label_span">Возможный выигрыш</h5>
          <p class="game_value_inp_alt label-full">
            <mark id="win_2">1.98</mark><span style="font-size: 12px;color: #979696;"> D.</span>
          </p>
        </article>
      </aside>
    <div class="clock-mod">
      <div class="mod-regulator">
        <div class="mod-regulator-wrap">
          <article class="game_value_label modifed-value value-medium">
            <h5 class="game_value_label_span modifed-span">Выплата</h5>
            <p class="game_value_inp_alt not-before">
              <mark id="winner_2" style="color: #633EE2;">1.98</mark><span class="regulator-factor">X</span>
            </p>
          </article>
          <article class="game_value_label modifed-value value-short">
            <h5 class="game_value_label_span modifed-span" style="color:#A7A7A7;">Режим</h5>
            <figure class="game_value_inp_alt not-before">
              <a href="#cricle" aria-label="Switch-button on Standart game" class="regulator-switch  regulator-cricle active-switch-clock" data-game="1"></a>
              <a href="#standart" aria-label="Switch-button on Crircle game" class="regulator-switch switch-dice " data-game="0"></a>
            </figure>
          </article>
        </div>
        <label for="stavka" class="game_value_label labal-margin label-column">
          <span class="game_value_label_span ">Изменить шанс:</span>
          <div class="game_value_label_block percent" style="width: 130px;">
            <input value="1" name="chance" type="text" max="99" class="game_value_inp inp-purple" id="chance" placeholder="Введите число" onchange="changeValue(this);">
          </div>
          <div class="game_value_gradient gradient-short font-arial">
            <button type="button" class="game_value_mod before-mod" onclick="changeChance(1)">-</button>
                        <button type="button" class="game_value_mod" onclick="changeChance(2)">+</button>
          </div>
        </label>
        
      </div>
      <div class="clock-mod-game">
        <svg viewBox="0 0 300 275" class="new-game">
                        <defs>
              <pattern id="image" x="0%" y="0%" height="100%" width="100%" viewBox="0 0 512 512">
                <image x="0%" y="0%" width="512" height="512" xlink:href="../img/worker.png" transform="rotate(180,256, 256)"></image>
              </pattern>
                            
                            <pattern id="imagetasker" patternUnits="userSpaceOnUse" height="20" width="20">
                <image x="0" y="0" width="20" height="20" xlink:href="../img/leftright.jpg"></image>
              </pattern>
              <linearGradient id="linear-gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                <stop offset="0%" stop-color="#733adc"></stop>
                <stop offset="100%" stop-color="#0065ff"></stop>
              </linearGradient>
                        
              <radialGradient id="grad1" cx="50%" cy="50%" r="50%" fx="50%" fy="50%">
                <stop offset="0%" style="stop-color:rgb(11,97,252);"></stop>
                <stop offset="100%" style="stop-color:rgb(17,133,237);stop-opacity:1"></stop>
              </radialGradient>
    
                        </defs>
            <defs>
              <linearGradient id="gradient-cricle" x1="35%" y1="0%" x2="40%" y2="100%" gradientUnits="userSpaceOnUse">
                <stop offset="0%" class="stp2"></stop>
                <stop offset="100%" class="stp4"></stop>
              </linearGradient>
   
              <linearGradient id="gradient-support" x1="35%" y1="0%" x2="40%" y2="100%" gradientUnits="userSpaceOnUse">
                <stop offset="0%" class="stp1"></stop>
                <stop offset="100%" class="stp3"></stop>
              </linearGradient>
            </defs>
                        <text x="135" y="15" font-family="Arial" font-size="10" text-anchor="middle" fill="#A9A8A8">100</text>
                        <text x="165" y="15" font-family="Arial" font-size="10" text-anchor="middle" fill="#A9A8A8">0</text>
                        <circle r="125" cx="150" cy="145" fill="none" stroke-width="6" stroke="#F5F5F5" stroke-dasharray="785" transform="rotate(-87 150 145)" stroke-dashoffset="12"></circle>
                        <circle r="100" cx="150" cy="145" fill="none" stroke-width="12" stroke="#ccc" stroke-dasharray="628" transform="rotate(-88 150 145)" stroke-dashoffset="9" id="strokerID"></circle>
                        <circle id="strokerRed" r="100" cx="150" cy="145" stroke-width="8" stroke="url(#gradient-support)" stroke-dasharray="612 22" stroke-dashoffset="148" fill="none" stroke-linecap="butt"></circle>
                        <circle id="stroker" r="100" cx="150" cy="145" stroke-width="8" stroke="url(#gradient-cricle)" stroke-dasharray="307.87608005179976 320.4424506661589" stroke-dashoffset="153" fill="none" stroke-linecap="butt"></circle>
                       
                        <g id="pointer">
                            <circle id="circle" r="40" cx="150" cy="145" fill="none" stroke-width="8" stroke="#0065ff" class="grey-cricle"></circle>

                            <polygon id="pointDir" points="150 18, 145 105, 155 105" fill="url(#linear-gradient)"></polygon>
                            <polygon id="pointDirLeft" points="150 95, 140 105,150 105" rx="100" ry="100" fill="#0065ff"></polygon>
                            <polygon id="pointDirLeft" points="150 95, 160 105,150 105" rx="100" ry="100" fill="#0065ff"></polygon>
                        </g>
                        <circle r="30" cx="150" cy="145" fill="url(#grad1)" stroke="#0f76f3"></circle>
                        <text x="150" y="150" fill="#0f76f3" font-size="16" text-anchor="middle" id="textVal">50.00</text>
                        <text x="150" y="150" fill="#fff" font-size="16" text-anchor="middle" id="textValBet">00.00</text>
                        <circle id="tasker" r="17" cx="153.1410759078128" cy="244.95065603657315" fill="url(#image)"></circle>  
                    </svg>
          
          
          <!-- <style>a.winter-logo:before {transform: translate(0px,-48px);}.head_logo {-webkit-transform: translate(-130px,0);transform: translate(-130px,0);}@media (min-width: 0px) and (max-width: 670px) {.range {transform: translate(0,12px);-webkit-transform: translate(0,12px);-ms-transform: translate(0,12px);-o-transform: translate(0,12px);}}</style> -->
      </div>
    </div>
    </div>




  <script>
                                                function validateBetPercentD(inp) {
                                                    if (inp.value > 95) {
                                                        inp.value = 95;
                                                    }


                                                    inp.value = inp.value.replace(/[,]/g, '.')
                                                        .replace(/[^\d,.]*/g, '')
                                                        .replace(/([,.])[,.]+/g, '$1')
                                                        .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
                                                }

                                            </script>
                                            <script>
                                                function validateBetSizeD(inp) {

                                                    inp.value = inp.value.replace(/[,]/g, '.')
                                                        .replace(/[^\d,.]*/g, '')
                                                        .replace(/([,.])[,.]+/g, '$1')
                                                        .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
                                                }

                                            </script>
<script>    
 window.onerror = null;                              
$(function() {
  window.history.replaceState(null, null, window.location.pathname);
  

                $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));

            });
                              function bots() {
if(navigator.onLine) {
 $.ajax({
            url: '../bots.php',
            timeout: 10000,
            success: function(data) {
        var obj = jQuery.parseJSON(data);
                $("#table").prepend(obj.game);
        $('#table').children().slice(15).remove();
        
            },
            error: function() {
            }
        });
    } else {
}
    }
    
    setInterval('bots()',<?=$fake_interval?>);
                              function historys() {
if(navigator.onLine) {
 $.ajax({
            url: '../core.php',
            timeout: 10000,
            success: function(data) {
        var obj = jQuery.parseJSON(data);
                $("#table").prepend(obj.game);
        $('#table').children().slice(12).remove();
        $("#gm_users_online").html(obj.online);
        $("#gm_users_total").html(obj.ucount);
        $("#gm_bets_total").html(obj.gcount);
        $("#gm_bets_amount").html(obj.betsum);
        $("#userBalanceMob").html(obj.balancce);
        $("#userBalanceMobb").html(obj.balancce);
        $("#cislo").html(obj.numberr);
        $("#type").html(obj.type);
        $("#chanc").html(obj.chanc);
        $("#adminus").html(obj.adminus);
        $("#maxdic").html(obj.maxbetos);
            },
            error: function() {
            }
        });
    } else {
}
    }
    
    function statistic() {
      
      
if(navigator.onLine) {
 $.ajax({
            url: '../action.php',
            timeout: 10000,
            success: function(data) {
        var obj = jQuery.parseJSON(data);
        
        $("#cislo").html(obj.cNumber);
        $("#type").html(obj.type);
        $("#chanc").html(obj.chanc);
        
            },
            error: function() {
            }
        });
    } else {
}
      
    }
    
    setInterval('historys()',300);
        
        
         function offliner() {
if(navigator.onLine) {
 $.ajax({
            url: '../offline.php',
            timeout: 10000,
            success: function(data) {
            },
            error: function() {
            }
        });
    } else {
}
    }
    
    setInterval('offliner()',3000);                             
            </script>
</div>   
<style type="text/css">
.parent
{
float: right;
}
.child
{
    height: 50px;
    display: inline-block;
    width: 30%;

}
  </style>
       <!--<div class="parent" >
<h2>
          Ваши последние игры        

        </h2> 
           <?php 
/*while($row = mysql_fetch_array($result51)) {
 $colordrop = $row['colordrop'];
$colordrop = str_replace('red', '#f9307e', $colordrop);
$colordrop = str_replace('blue', '#3ea1f8', $colordrop);
  echo ' <div class="child" style="width: 50px;height: 50px;background: ' . $colordrop . ';border-radius: 50%;"></div>';
}*/
?>
       </div>-->
       <div class="wrap">    
       
      <aside class="index_stat alt">
        <p class="index_stat_txt alt">
          Пользователей         <span id="gm_users_total" class="index_stat_number alt"><?=$ucount?></span>
        </p>
        <p class="index_stat_txt alt">
          Всего игр         <span id="gm_bets_total" class="index_stat_number alt"><?=$gcount?></span>
        </p>
        <p class="index_stat_txt alt">
          Онлайн          <span id="gm_users_online" class="index_stat_number alt"><?=$online?></span>
        </p>
        <p class="index_stat_txt alt">
                    Сумма ставок                  <span id="gm_bets_amount" class="index_stat_number alt"><?=$betsum?></span>
                </p>
        <p class="index_stat_txt alt" style="display:none">
          Выпало          <span id="cislo" class="index_stat_number alt"><?=$cNumber?></span>
        </p>

        <p class="index_stat_txt alt" style="display:none">
          Тип         <span id="type" class="index_stat_number alt"><?=$type?></span>
        </p>
        <p class="index_stat_txt alt" style="display:none">
          Шанс          <span id="chanc" class="index_stat_number alt"><?=$chanc?></span>
        </p>
        <p class="index_stat_txt alt" style="display:none">
          Можно          <span id="mojno" class="index_stat_number alt"></span>
        </p>
      </aside>
      <div class="auto-game-block"> 
       
          <button data-order="2" id="createBetBattle" style="right: 30px;" class="auth_btn alt min-h game-button" onclick="battlebet();return false;">Сделать ставку</button>
        
      <button  data-order="2" id="createBetBattle" style="right: 30px;" class="auth_btn alt min-h game-button disabled-block" onclick="battlebet();return false;">Сделать ставку</button>
      
                     
                                                
                                                      

                                                       
                                                      
      </div>
    </div>

      
      <p class="game_txt">*Посмотреть подробную статистику вы можете в личном кабинете.</p>
  </section>
</form>

<script src="../js/jquery.maskedinput.min.js?1577959303"></script>
<script src="../js/games.js?1577959303"></script>
<script src="../js/cricle.js?1577959303"></script>
<script async="" src="../js/scroll.js?ver=1577959303"></script>
  




<!-- <script defer src="../js/AutoBet.js"></script> -->
<script src="../js/max.js?1577959303"></script>


    

  <section class="rate" style="height: 700px">        
<h3 class="table_title">Все ставки</h3>
  <table class="table">
    <thead>
      <tr class="table_bb">
        <th class="table_head ">Пользователь</th>
        <th class="table_head none">Число</th>
        <th class="table_head">Цель</th>
            <th class="table_head none">Сумма</th>
        <th class="table_head none">Шанс</th>
       <th class="table_head">Выплата</th>
        <th class="table_head">Режим</th>

      </tr>
    </thead>
   <tbody id="table">
                                                  
      </tbody>
  </table>
    </section>

    


      


<div class="wrap_footer footer-bg">
    <section class="qestion">
      <h3 class="qestion_title letter-to-santa">У тебя есть вопросы?</h3>
      <p class="qestion_txt">Пожалуйста, свяжитесь с нами напрямую по почте или в нашей <br> контактной форме. Вы также можете посетить нашу страницу <br> поддержки, которая поможет решить вашу проблему.</p>
      <a href="<?=$site_support?>" class="index_stat_register no_style">
            <span class="index_stat_register_txt">
              Поддержка            </span>
      </a>
    </section>
</div>



  <div class="modal-overflow modal-overflow-clouse"></div>

  

<div class="modal-room_cont"></div>




<!--  -->

  
<footer>
    <section class="foot">
      <h2 class="foot_title">
        <?=$sitename?>
      </h2>

    <p class="foot_txt">Мы работаем уже <span class="linked"><script>DaysCounter();</script> дня(й)</span></p>
      <a rel="noopener" target="_blank" href="https://advisor.wmtransfer.com/sitedetails.aspx?url=<?=$hprotocol?>://<?=$linksite?>&amp;tab=feedback" class="ref_code_button webmoney">Верифицирован</a>
      <a rel="noopener" target="_blank" href="<?=$group?>" class="ref_code_button vk">       
        Мы в ВКонтакте
      </a>
    </section>
    <section class="foot_menu">
      <h3 class="table_title tal">
        Меню      </h3>
      <ul class="foot_menu_ul">
        <li><a href="/" class="foot_menu_el">Главная</a></li>
        <li><a href="/faq" class="foot_menu_el">Помощь</a></li>  
        <li><a href="/payouts" class="foot_menu_el">Выплаты</a></li>
          
        <li><a href="<?=$site_support?>" class="foot_menu_el">Поддержка</a></li>
        <li><a href="/terms" class="foot_menu_el">Соглашение</a></li>
      </ul>
    </section>
    
     

  </footer>
          <!-- Footer -->



<div class="modal-mobaile-overflow hiddenOverflow">
  <div class="modal-mobaile">
    <button class="modal-mobaile__btn mobaile" aria-label="Закрыть модальное окно"></button>
    <p class="modal-mobaile_title"><?=$sitename?></p>
    <ul class="modal-mobaile-ul">
      <li><a href="/" class="modal-mobaile_link">Главная</a></li>
      <li><a href="/faq" class="modal-mobaile_link">Помощь</a></li>
      <li><a href="/payouts" class="modal-mobaile_link">Выплаты</a></li>
      <li><a href="/rating" class="modal-mobaile_link">Рейтинг</a></li>
      
    </ul>
    <p class="modal-mobaile_dscr">Мы работаем уже <mark><script>DaysCounter();</script> дня(й)</mark></p>
  </div>
</div>
<div class="mode-block hidden noneTablet">
  <div class="mode-block_wrap">
    <figure class="mode-block_figure findWheel ">
      <a target="_self" href="/" class="mode-block__link wheelHost">
        <img src="../img/dicesRange.png" alt="Режим кости" class="mode-block_img">
        <figurcaption class="mode-block_caption ">Кости</figurcaption>
      </a>
    </figure>
    <figure class="mode-block_figure findWheel mode-block_caption__active">
      <a href="/wheel" class="mode-block__link">
        <img src="../img/wheelMode.png" alt="Режим колесо" class="mode-block_img">
        <figurcaption class="mode-block_caption">Колесо</figurcaption>
      </a>
    </figure>
</div>
</div>





<script async="" src="../js/console.js"></script>
<noscript><link rel="stylesheet" href="../public/deferred.css"></noscript>
<script defer="" src="../js/js-packed.js"></script>

<!--<script defer="" src="../js/newPopUp.js"></script>-->
 
<script>



</script>
      <div at-magnifier-wrapper=""><div class="at-theme-light"><div class="at-base notranslate" translate="no"><div class="Z1-AJ" style="top: 0px; left: 0px;"></div></div></div></div
    
    </body></html>
    
    <?php
    
    if( $balance > $max_bet || $balance == $max_bet ){
      
      $maxbet = $max_bet;
      
    }else{
      
      $maxbet = $balance;
      
    }
    
    ?>
      <span class="maxdic" id="maxdic" style="display: none"><?=$maxbetos?></span>