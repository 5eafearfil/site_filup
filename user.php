<?php
session_start();

header('X-Frame-Options:SAMEORIGIN');
header('X-Content-Type-Options:nosniff');
header('X-Frame-Options: DENY');
header('X-Frame-Options: DENY');
header("X-XSS-Protection: 1; mode=block");
header("X-XSS-Protection: 1; mode=block");
require("inc/bd.php");
require("inc/site_config.php");

$refid = $_SESSION['ref'];
$sid = $_SESSION['hash'];
$userid = $_GET['id'];
$userid = preg_replace("/[^0-9]/", '', $userid);
$redicet = $_SERVER['HTTP_REFERER'];

$selecter = "SELECT * FROM engmn_user WHERE id = '$userid'";
         $resulter = mysql_query($selecter);
         $rower = mysql_fetch_array($resulter);
		 if($rower)
		{	
		$user_login = $rower['login'];
		$user_social = $rower['social'];
		$user_name = $rower['vk_name'];
		$user_ava = $rower['img'];
		$user_reg = $rower['date_reg'];
		$user_reg = substr($user_reg, 0, 10);
		

		$user_reg = str_replace('.', '-', $user_reg);
		}
		$workdata = explode('-', $workdata);
$year = $workdata[0];
$month = $workdata[1];
$day = $workdata[2];


$workdata = $month . ' ' . $day . ', ' . $year;  

					if ( empty($user_ava)  )
				{

$user_ava = "http://" . $_SERVER['HTTP_HOST'] . "/img/User.png";
				} 
		if ( !empty($user_name) ){
	
			$user_login = $rower['vk_name'];
					
		}

$selecter1 = "SELECT * FROM engmn_user WHERE hash = '$sid'";
         $result4 = mysql_query($selecter1);
         $row = mysql_fetch_array($result4);
		 if($row)
		{	
		  $name = $row['vk_name'];
          $login = $row['login'];
          $pass = $row['pass'];
          $balance = $row['balance'];
		  $balance = round($balance, 2);
          $id = $row['id'];
          $social_link = $row['social'];
          $is_admin = $row['admin'];
          $is_ban = $row['ban'];
		  $ava = $row['img'];
        }
			if ( empty($ava)  )
				{

$ava = "http://" . $_SERVER['HTTP_HOST'] . "/img/User.png";
				}
			
		if ( !empty($name) ){

				$login = $row['vk_name'];
					$login = explode(' ', $login);
					$login = $login[0];
					
			
		}
		
$sql_select5 = "SELECT * FROM engmn_games WHERE user_id = $userid AND mode < 1 ORDER BY id DESC LIMIT 5";
$result5 = mysql_query($sql_select5);

$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
$url = explode('?', $url);
$url = $url[0];
    
require("inc/site_config.php"); 
  ?>
  

<!DOCTYPE html>
<html lang="Ru-ru"><head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">   
     
	<link rel="preconnect" href="/public/header.min.css?1577959303" crossorigin="anonymous">
        <link rel="preconnect" href="/public/header-short.min.css?1577959303" crossorigin="anonymous">
    
    
       
      
    <link rel="stylesheet" href="/public/header.min.css?1577959303"> 
    <link rel="stylesheet" href="/public/check.css?1577959303"> 

   

    <link rel="stylesheet" href="/public/header-short.min.css?1577959303" media="only screen and (max-width: 670px)">
    <link rel="stylesheet" href="/public/newMenu.css?1577959303" media="(min-width: 0px) and (max-width: 1024px)">

    <link rel="stylesheet" href="/public/tablets.css?1577959303" media="(min-width: 670px) and (max-width: 1024px)">
    <link rel="stylesheet" href="/public/mini-desktop.css?1577959303" media="(min-width: 1024px) and (max-width: 1366px)">
        
    <link rel="preconnect" href="font/ProximaNova-Semibold.ttf" crossorigin="anonymous">
    <link rel="preconnect" href="font/ProximaNova-Regular.ttf" crossorigin="anonymous">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
<script>
function DaysCounter(){
d0 = new Date('<?php echo $workdata;?>'); // пуск сайта
d1 = new Date();
dt = (d1.getTime() - d0.getTime()) / (1000*60*60*24);
document.write(Math.round(dt));
}
</script>


     <!-- WINTER -->

   <!--    -->
     <!-- WINTER -->

<?=$snow?>	<link rel="prefetch" href="/img/BG_footer.png">
	<!-- <link rel="manifest" href="/manifest.json"> -->
	<link rel="dns-prefetch" href="https://www.youtube.com/">
	<!--link rel="prerender" href=""-->
	<link rel="shortcut icon" href="/fav.ico" type="image/x-icon">
	<title><?=$sitename?> | Азартная игра с выбором шанса победы. Моментальные выплаты. Уникальная система уровней</title>
	<meta name="description" content="Азартная игра с выводом реальных денег! Выберите шанс победы и выигрывайте рубли бесплатно каждый день. Киньте кости и получите бонус на сайте <?=$sitename?> уже сегодня! С нами уже более <?=$countusers?> пользователей">
	<link rel="canonical" href="<?=$url?>/public/">
	<meta property="og:title" content="<?=$sitename?> - Азартная игра с выбором шанса победы. Моментальные выплаты. Уникальная система уровней"> 
    <meta property="og:type" content="Website">
    <meta property="og:url" content="<?=$url?>/public/">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:image" content="/img/on.png">
    <meta property="og:description" content="Азартная игра с выводом реальных денег! Выберите шанс победы и выигрывайте рубли бесплатно каждый день. Киньте кости и получите бонус на сайте <?=$sitename?> уже сегодня! С нами уже более <?=$countusers?> пользователей">
    <meta name="keywords" content="выиграть реальные деньги без вложений, кости, кидать кости, игра на рубли, выбор шанса победы, выиграть деньги онлайн, рулетка, азартная игра, казино">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#A33EFF">
    <base href="/">
        <script src="/js/jq.js"></script>

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
        position:relative;
    margin-top: -10px;
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

<link rel="stylesheet" href="/public/deferred.css?1578047017007"><link rel="stylesheet" type="text/css" href="chrome-extension://glgemekgfjppocilabhlcbngobillcgf/styles.css"></head>
<body class="body-min-long"><!-- <style>a.winter-logo:before {transform: translate(-110px,-48px);}</style> -->
<header class="head head_noneAuth">
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
		</nav>

		


			      	<?php
			
			if ( $_SESSION["login"] != 1 ){

?>
<a href="/" class="auth_primary">
			Авторизация
		</a>

<?
}	else {		
			
		?>	
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
								<li><a onclick="exit();location.href = '';exit();location.href = '';" class="profile-light_link">Выйти</a></li>
							</ul>
						</div>
						<p class="profile_block_balance">
							<span class="balance"><?=$balance?></span> D.</p><p class="balance_animate"></p>
						<p></p>
					</div>

					<input id="tokens" type="hidden" token="26f29592809ac2befc6614317c9be74b607a33ccc180866220c8a11b2afd1451" user="1091498">
					<a href="/profile" class="Snow-awatar"><img src="<?=$ava?>" alt="User_icon" class="profile_user"></a>
				</aside>
			
				</div><? }?></header>

<div class="head-mobaile">
	
	<a href="/" class="head_logo_txt"><?=$sitename?></a>

	<div class="head-mobaile-cont">
		<div class="head-mobaile-cont_profile">
			<img src="<?=$ava?>" alt="Фото профиля пользователя" class="head-mobaile-cont_img">
			<a href="/profile" class="head-mobaile-cont_txt"><?=$login?></a>

		</div>
		<a href="/pay" class="head-mobaile-cont_link"><span class="balance"><?=$balance?></span> D.<span class="balance_animate"></span></a>
		<div class="head-mobaile-cont_burger"><button class="head-mobaile-cont_burger__before mobaile"></button></div>
	</div>

</div>





<style>
/*No winter*/
/*body{background: url('../img/Bg2KMini.png');background-repeat: no-repeat;}*/
/*No winter*/
/*@media (min-width: 0px) and (max-width: 670px) {body{background: url(../img/Bg670.png) 0 -65px no-repeat;}}*/

/*Winter*/
body{background: url('/img/Bg2KMini.png');background-repeat: no-repeat;}
@media (min-width: 2500px) and (max-width: 5000px) {body{background: url(../img/fone2K.png) 0 0 no-repeat;}}
/*winter*/
@media (min-width: 0px) and (max-width: 670px) {body{background: url('/img/<?=$snowFon?>.png') 0 -115px no-repeat !important;}
</style>
<style>
		.table_title {
			    margin-top: 160px;
		}
		.auth_btn {
			-webkit-transform: translate(0px, 10px);
			-ms-transform: translate(0px, 10px);
			-o-transform: translate(0px, 10px);
			transform: translate(0px, 10px);
			margin-top: 0px;
			width: 260px;
    		height: 60px;
		}
		.auth_btn:hover {
			-webkit-transform: translate(0px, 10px) scale(1.05);
			-ms-transform: translate(0px, 10px) scale(1.05);
			-o-transform: translate(0px, 10px) scale(1.05);
			transform: translate(0px, 10px) scale(1.05);
		}
		.qestion {
			-webkit-transform: translateY(150px);
			-ms-transform: translateY(150px);
			-o-transform: translateY(150px);
			transform: translateY(150px); 
		}
	</style>
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

<style>
	.table{
		display: none;
	}
</style>

		<div class="user">
		<aside class="user_sct">
			<a target="_blank" href="<?=$user_social?>">
			<img src="<?=$user_ava?>" alt="user" class="user_sct_img">

			</a>		
			<div class="user_sct_ass">
				<h5 class="user_sct_ass_title"><?=$user_login?></h5>
		
				<p class="user_sct_ass_txt">Зарегестрирован: <?=$user_reg?></p>

			

		</aside>
		<a href="<?=$redicet?>" class="auth_btn">
				Вернуться
			</a>
	</div>
		
	
			<style>@media(min-width: 0px) and (max-width: 670px) {.tab-game::after, .tab-new-game::after {height: 40px;-webkit-transform: translateY(-18px);transform: translateY(-18px);}}</style>

		<!--<h3 class="table_title" style="top: 155px;" >Последние ставки</h3>-->
		<div class="tab-nav ">
			
			<table class="table achive-none" id="new_test" data-tab="1"> 

			<thead>

				<tr class="table_bb">
					<th class="table_head none">Число</th>
					<th class="table_head">Цель</th>
					<th class="table_head none">Сумма</th>
					<th class="table_head none">Шанс</th>
					<th class="table_head none">Выплата</th>
				</tr>
			</thead>
	
			<tbody id="block_user_dice">
				
 <?php 
while($row = mysql_fetch_array($result5)) {
  $user_id = $row['user_id'];
  $number = $row['number'] . '%';
  $sum = $row['sum'];
  $chance = $row['chance'] . '%';
  $cel = 100 / $chance;
  $cel = round($cel, 2);
  $cel = "x" . $cel;
  $number = $number / 10000;
  $number = round($number, 2) . '%';
  $type = $row['type'];
  $win_summa = $row['win_summa'];

  if ( $type == "win" ){

  		$wsum = $win_summa;
  		$color = "green";
  }else{

  		$wsum = "-" . $sum;
  		$color = "red";
  }


 echo "<tr><td><b>$number</b></td><td><b>$cel</b></td><td><b>$sum</b></td><td><b>$chance</b></td><td><b><font color='$color'>$wsum</font></b></td></tr>";

}
?>

			</tbody>
	
	

	</table>

		</div>
	

		
		
		


	<script>
	
	let user = <?php echo $userid;?>;

    </script>		

<script defer="" src="/js/profile_user.js?1578159970"></script>
<script defer="" src="/js/tabs_jq.js"></script>
<div class="wrap_footer footer-bg">
    <section class="qestion">
      <h3 class="qestion_title letter-to-santa">У тебя есть вопросы?</h3>
      <p class="qestion_txt">Пожалуйста, свяжитесь с нами напрямую по почте или в нашей <br> контактной форме. Вы также можете посетить нашу страницу <br> поддержки, которая поможет решить вашу проблему.</p>
      <a href="/help/" class="index_stat_register no_style">
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
          
        <li><a href="/help/" class="foot_menu_el">Поддержка</a></li>
        <li><a href="/terms" class="foot_menu_el">Соглашение</a></li>
      </ul>
    </section>
    
      
    <div class="modal-notification">
    </div>
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






<script async="" src="/js/console.js"></script>
<noscript><link rel="stylesheet" href="/public/deferred.css"></noscript>
<script defer="" src="../js/js-packed.js"></script>

<script defer="" src="/js/newPopUp.js?1578159970"></script>


      <div at-magnifier-wrapper=""><div class="at-theme-light"><div class="at-base notranslate" translate="no"><div class="Z1-AJ" style="top: 0px; left: 0px;"></div></div></div></div><div class="mallbery-caa" style="z-index: 2147483647 !important; text-transform: none !important; position: fixed;"></div></body></html>