<?php
session_start();

header('X-Frame-Options:SAMEORIGIN');
header('X-Content-Type-Options:nosniff');
header("X-XSS-Protection: 1; mode=block");

require("inc/bd.php");
require("inc/site_config.php");

$refid = $_SESSION['ref'];
$sid = $_SESSION['hash'];

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
		
		$workdata = explode('-', $workdata);
$year = $workdata[0];
$month = $workdata[1];
$day = $workdata[2];

$wcount = "SELECT COUNT(*) FROM  engmn_withdraws WHERE status = '1'";
$wcount = mysql_query($wcount);
$wcount = mysql_fetch_array($wcount);
$wcount = $wcount[0];
		
$monthy = date('m-Y');

$wsum = "SELECT SUM(sum) FROM engmn_withdraws WHERE status = '1'";
$wsum = mysql_query($wsum);
$wsum = mysql_fetch_array($wsum);
if ( $wsum ){

$wsumm = $wsum['SUM(sum)'];



}	
if($wsumm == '') {
  $wsumm = 0;
}		

$workdata = $month . ' ' . $day . ', ' . $year;  

		
			if ( empty($ava)  )
				{

$ava = "http://" . $_SERVER['HTTP_HOST'] . "/img/User.png";
				} else {
					
					$ava = $row['img'];
				}
			
		if ( empty($name) ){
			
			$login = $login;
		}else{
			
				$login = $row['vk_name'];
					$login = explode(' ', $login);
					$login = $login[0];
					
			
		}
				
$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
$url = explode('?', $url);
$url = $url[0];
 
$sql_select5 = "SELECT * FROM engmn_user where betsum between " . $min_rating . " and " . $max_rating . " ORDER BY betsum DESC LIMIT 10";
$result5 = mysql_query($sql_select5);

$sql_select7 = "SELECT * FROM engmn_user WHERE betsum between " . $min_top_rating . " and " . $max_top_rating . " ORDER BY betsum DESC LIMIT 3";
$result7 = mysql_query($sql_select7);

 $_monthsList = array(
"1"=>"Январь","2"=>"Февраль","3"=>"Март",
"4"=>"Апрель","5"=>"Май", "6"=>"Июнь",
"7"=>"Июль","8"=>"Август","9"=>"Сентябрь",
"10"=>"Октябрь","11"=>"Ноябрь","12"=>"Декабрь");
 
$month = $_monthsList[date("n")];
require("inc/site_config.php"); 

?>



<!DOCTYPE html>
<html lang="ru" class="js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">   
     
	<link rel="preconnect" href="/public/header.min.css?1577887420"  crossorigin="anonymous">
	<link rel="preconnect" href="/public/header-short.min.css?1577887420"  crossorigin="anonymous">

       
      
	<link rel="stylesheet" href="/public/header.min.css?1577887420"> 
	<link rel="stylesheet" href="/public/check.css?1577887420"> 

   

	<link rel="stylesheet" href="/public/header-short.min.css?1577887420" media="only screen and (max-width: 670px)">
	<link rel="stylesheet" href="/public/newMenu.css?1577887420"  media="(min-width: 0px) and (max-width: 1024px)">

	<link rel="stylesheet" href="/public/tablets.css?1577887420" media="(min-width: 670px) and (max-width: 1024px)">
	<link rel="stylesheet" href="/public/mini-desktop.css?1577887420" media="(min-width: 1024px) and (max-width: 1366px)">
		
	<link rel="preconnect" href="font/ProximaNova-Semibold.ttf" crossorigin="anonymous">
	<link rel="preconnect" href="ProximaNova-Regular.ttf" crossorigin="anonymous">
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


	<?=$snow?><link rel="prefetch" href="/img/BG_footer.png">
	<!-- <link rel="manifest" href="/manifest.json"> -->
	<link rel="dns-prefetch" href="https://www.youtube.com/">
	<!--link rel="prerender" href=""-->
	<link rel="shortcut icon" href="/fav.ico" type="image/x-icon">
	<title><?=$sitename?> | Рейтинг пользователей</title>
	<meta name="description"  content="Топ пользователей . Рейтинг сайта за последнее время" />
	<link rel="canonical" href="<?=$url?>/rating">
	<meta property="og:title" content="<?=$sitename?> | Рейтинг пользователей"> 
    <meta property="og:type" content="Website">
    <meta property="og:url" content="<?=$url?>/rating">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:image" content="/img/on.png">
    <meta property="og:description" content="Топ пользователей . Рейтинг сайта за последнее время">
    <meta name="keywords"  content="выиграть реальные деньги без вложений, кости, кидать кости, игра на рубли, выбор шанса победы, выиграть деньги онлайн, рулетка, азартная игра, казино" />
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#A33EFF"/>
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
<script src="../script/jquery-latest.min.js"></script>
    <script src="../script/odometr.js"></script>
    <script src="../script/js.cookie.js"></script>
</head>
<body>
<header class="head ">
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

	

</div>





<style>

body{background: url('/img/Bg2KMini.png');background-repeat: no-repeat;}
@media (min-width: 2500px) and (max-width: 5000px) {body{background: url(../img/fone2K.png) 0 0 no-repeat;}}
/*winter*/
@media (min-width: 0px) and (max-width: 670px) {body{background: url('/img/<?=$snowFon?>.png') 0 -115px no-repeat !important;}

</style>
<style>
@media (max-width: 1024px) and (min-width: 670px) {
	.payouts_head_txt.spec {
	    transform: translateX(-35px);
	}
}
@media (min-width: 0px) and (max-width: 670px) {
	h3.table_title.length {
	   margin-top: 30px !important;
	}
}
</style>
<section class="rate-sct ">
		<h3 class="table_title " style="margin-top: 30px;">Рейтинг за <span id="month"><?=$month?></span></h3>
		<aside class="rate-navigation">
		<!-- 	<a href="javascript:void()" id="mes" class="rate-navigation_link rate-navigation_link__left">Прошлый месяц</a> -->
			<a href="/" class="rate-navigation_link rate-navigation_link__left">Перейти к игре</a>
		</aside>
		<div class="rate-sct-block">
			

 <?php 
while($row = mysql_fetch_array($result7)) {
  $user_id = $row['id'];

  $sql_select3 = "SELECT * FROM engmn_user WHERE id='$user_id'";
$result3 = mysql_query($sql_select3);
$row3 = mysql_fetch_array($result3);
if($row3)
{
$login = $row3['login'];
$name = $row3['vk_name'];
$ava = $row3['img'];

$mybetsum = $row3['betsum'];
}
  if ( !empty($name)){

$login = $row3['vk_name'];

}else{

	$login = $row3['login'];
}
if ( empty($ava)){

$ava = '/img/User.png';

}
  

  	
  echo '<article class="rate-sct-block-cart">
				<picture class="rate-sct-block-cart_picture rate-sct-block-cart_picture__two">
					<img src="' . $ava . '" class="rate-sct-block-cart_picture_img">
				</picture>
				<figure class="rate-title-group">
					
					<p class="rate-sct-block-cart_txt"> <a style="color: black; text-decoration: underline; " target="_blank" href="/user/id/' . $user_id . '">' . $login . '</a></p>
				</figure>
				<p class="rate-sct-block-cart_wins">' . $mybetsum .  ' D.</p>
				<p class="rate-date-exp">Поставлено с начала месяца</p>
			</article>';
		
}
?>


		</div>
	<div class="rate-exp-block width-type">
		<article class="rate-exp-block_inf">
			<h4 class="rate-exp-block_title">Описание рейтинга и наград</h4>
			<p class="rate-exp-block_text">Рейтинг пользователей обновляется один раз в месяц ( 1 число ).
				Последнее обновление таблицы : <span class="rate-exp-block_date">01-<?=$monthy?></span> </p>
		</article>
		<aside class="rate-exp-block_aside">
			<p class="rate-exp-block_text">Если вы попали в топ 10 людей по выводу средств, то
				в конце месяца вы можете получить награду в <a href="/profile" style="color: #4A4A4A; text-decoration: underline;">кабинете</a>.</p>
		</aside>
	</div>

	<table id="tabls" class="table achive-none " data-tab="2">
			<thead>
				<tr class="table_bbg__grey">
					<th class="table_head table-rating  table_head_achive">Пользователь</th>
					<th class="table_head table-rating  table_head_achive">Сумма</th>
				</tr>
			</thead>
		<tbody id="table_rating"><tr class="table_bbg table_contentings table_hover">
				 <?php 
while($row = mysql_fetch_array($result5)) {
  $user_id = $row['id'];

  $sql_select2 = "SELECT * FROM engmn_user WHERE id='$user_id'";
$result2 = mysql_query($sql_select2);
$row = mysql_fetch_array($result2);
if($row)
{
$login = $row['login'];
$name = $row['vk_name'];

$mybetsum = $row['betsum'];
}
  if ( !empty($name)){

$login = $row['vk_name'];

}else{

	$login = $row['login'];
}
  
  $wallett = substr($wallet, 0, -5);
  echo '<tr class="table_bbg table_contentings table_hover">
				<td class="table_content table_content_achive"><a target="_blank" href="/user/id/' . $user_id . '" class="table-tdu">' . $login . '</a></td>
			
				<td class="table_content primary table_content_achive  rating-blue">' . $mybetsum . ' D.</td>
		    </tr>';
}
?>

			</tbody>
	</table>
</section>



<script>eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('$(\'.2-1\').0(\'8\',4(){$(\'#6\').7(\'5-3\')});$(\'.2-1\').0(\'9\',4(){$(\'#6\').a(\'5-3\')});',11,11,'on|pay|Autho|modal|function|toggle|add_class|addClass|mouseover|mouseout|removeClass'.split('|'),0,{}))
</script>
							

        <script src="/script/jquery.bundle.js"></script>
        <script src="/script/script.js"></script>

<script src="/js/rooms/modal.js?ver=1577887420"></script><div class="wrap_footer">

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




<footer>
    <section class="foot">
      <h2 class="foot_title">
        <?=$sitename?>
      </h2>
       <p class="foot_txt">Мы работаем уже <span class="linked"><script>DaysCounter();</script> дня(й)</span></p>
      <a rel="noopener" target="_blank" href="https://advisor.wmtransfer.com/sitedetails.aspx?url=<?=$hprotocol?>://<?=$linksite?>&tab=feedback" class="ref_code_button webmoney">Верифицирован</a>
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
      </ul >
    </section>

    <div class='modal-notification'>
    </div>
  </footer>
          <script defer src="/js/metrica.js"></script>
      <noscript><div><img src="https://mc.yandex.ru/watch/48692534" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- Footer -->




<script async src="/js/console.js"></script>
<noscript><link rel="stylesheet" href="/public/deferred.css"></noscript>
<script defer src="../js/js-packed.js"></script>

<script defer src='/js/newPopUp.js?1577887420'></script>

   <script>
        
        var jgjger = setInterval(function() {
  console.log("%cОстановитесь!","color: red; font-size: 42px; font-weight: 700"),console.log("%cЕсли кто-то сказал вам, что вы можете скопировать и вставить что-то здесь, то это мошенничество, которое даст злоумышленнику доступ к вашему аккаунту.","font-size: 20px;");
  
}, 2000);

setTimeout(function() {
  clearInterval(jgjger);
  console.log("%cОстановитесь!","color: red; font-size: 42px; font-weight: 700"),console.log("%cЕсли кто-то сказал вам, что вы можете скопировать и вставить что-то здесь, то это мошенничество, которое даст злоумышленнику доступ к вашему аккаунту.","font-size: 20px;");
  
}, 30000);
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
	
</body>
      