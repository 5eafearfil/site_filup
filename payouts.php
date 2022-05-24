<?php
session_start();

header('X-Frame-Options:SAMEORIGIN');
header('X-Content-Type-Options:nosniff');
header('X-Frame-Options: DENY');
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
 
$sql_select5 = "SELECT * FROM engmn_withdraws ORDER BY id DESC LIMIT 20";
$result5 = mysql_query($sql_select5);
 
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
	<title><?=$sitename?> | Последние выплаты</title>
	<meta name="description"  content="Здесь вы можете посмотреть наши последние выводы пользователям. Также, можно перейти в профиль человека и спросить у него о выплате денег." />
	<link rel="canonical" href="<?=$url?>/payouts">
	<meta property="og:title" content="<?=$sitename?> | Последние выплаты"> 
    <meta property="og:type" content="Website">
    <meta property="og:url" content="<?=$url?>/payouts">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:image" content="/img/on.png">
    <meta property="og:description" content="Здесь вы можете посмотреть наши последние выводы пользователям. Также, можно перейти в профиль человека и спросить у него о выплате денег.">
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

		<script>

			$('body').on('click', '.secretclick', function(event) {
				event.preventDefault();

				////////

				$('.modal-overflow').empty();
				$('.modal-overflow').removeClass('modal-overflow-clouse');

				$('.modal-overflow').append("<article class='modal-friend modal-friend__long'><button class='modal-news_clouse modal-room__clouse' aria-label='Закрыть модальное окно'></button><h2 class='modal-friend_title'>Секретный режим </h2><p class='modal-friend_txt modal-friend_txt__medium'>Псс... Это секрет от всех. Мы готовим что-то новенькое для этого места.</p><h3 class='modal-upd_title'>Обсуди! Что мы будем добавлять ?</h3><p class='modal-friend_txt modal-friend_txt__mini'>*Мы читаем все и прислушиваемся</p><a target = '_blank' href ='https://vk.com/topic-189272521_39964401' class='modal-friend_btn auth_btn'>BAZINGA!</a></article>");

				
			});
			


		</script>


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
<table class="payouts width-type">
	
	<thead style="margin-bottom: 20px;">
		<tr class="payouts_head">
			<th class="payouts_head_txt spec">Пользователь</th>
			<th class="payouts_head_txt" style="width: 280px;">Платежная система</th>
			<th class="payouts_head_txt payouts_summ">Сумма</th>

			<th class="payouts_head_txt none none-tablet">Дата выплаты</th>
		
			<th class="payouts_head_txt none">Статус</th>
		</tr>
	</thead>
	<h3 class="table_title ">Последние выплаты</h3>
	<tbody class="payouts_tb">

  <?php 
while($row = mysql_fetch_array($result5)) {
  $user_id = $row['user_id'];
  $ps = $row['ps'];
  $sum = $row['sum'];
  $wallet = $row['wallet'];
  $fake = $row['fake'];
  $wdate = $row['date'];
  $wstatus = $row['status'];
  switch ( $wstatus ){

  		case 0:
  		$wstatus = "Ожидание";
  			break;
  			case 1:
  			$wstatus = "Выплачено";
  			break;
  			case 2:
  			$wstatus = "Отклонено";
  			break;

  }
  switch ( $ps ){

  			case 'qiwi':
  			$ps = "<img src='img/" . $ps . ".png' /> QIWI";
  			break;
  			case 'beeline':
  			$ps = "<img src='img/" . $ps . ".png' /> Билайн";
  			break;
  			case 'mc':
  			$ps = "<img src='img/" . $ps . ".png' /> Мастер-кард";
  			break;
  			case 'megafon':
  			$ps = "<img src='img/" . $ps . ".png' /> Мегафон";
  			break;
  			case "mts":
  			$ps = "<img src='img/" . $ps . ".png' /> МТС";
  			break;
case "payeer":
  			$ps = "<img src='img/" . $ps . ".png' /> PAYEER";
  			break;
case "tele":
  			$ps = "<img src='img/" . $ps . ".png' /> Теле2";
  			break;
case "visa":
  			$ps = "<img src='img/" . $ps . ".png' /> VISA";
  			break;
case "wm":
  			$ps = "<img src='img/" . $ps . ".png' /> WebMoney";
  			break;
  			case "ya":
  			$ps = "<img src='img/" . $ps . ".png' /> Яндекс Деньги";
  			break;



  }
  if($fake == 0) {
  $sql_select2 = "SELECT * FROM engmn_user WHERE id='$user_id'";
$result2 = mysql_query($sql_select2);
$row = mysql_fetch_array($result2);
if($row)
{
$login = $row['login'];
if ( !empty($row['name'])){

$login = $row['vk_name'];
$login = explode(' ', $login);
$login = $login[0];

}
$user_ava = $row['img'];
if ( empty($user_ava) ){

	$user_ava = "/img/User.png";
}
}
  }
  
  if($fake == 1) {
    $login = $row['login_fake'];
    $user_ava = "/img/User.png";
    $user_bot = "#";
    $user_id = "";
  }else{
  	$user_bot = "/user/id/";
  }
  $wallett = substr($wallet, 0, -5);
  echo '<tr class="payouts_content">
		<td class="payouts_content_txt">
			<div class="payouts_content_txt_flex">
				<a target="_blank" href="' . $user_bot . '' . $user_id . '"> <img src="' . $user_ava .  '" alt="' . $user_ava .  '" class="payouts_content_txt_flex_img none"></a>
				<p class="payouts_content_txt_head">
					<span class="name-overfollow">' . $login . '</span>
					<a target="_blank" href="' . $user_bot . '' . $user_id . '" class="payouts_content_txt_head_span">
						    Профиль
					</a>
				</p>
			</div>
		</td>
		<td class="payouts_content_txt system-hidden">' . $ps . '</td>
		<td class="payouts_content_txt" style="color: #1500FF;">' . $sum . '<span style="color: #3B3B3B;">D.</span></td>
		<td class="payouts_content_txt none none-tablet"><time>' . $wdate . '</time></td>
		<td class="payouts_content_txt psevdo none">' . $wstatus . ' <span class="Autho-pay"></span></td> 
	</tr>';
}
?>

	</tbody>
</table>

<aside class="inform">
	<img src="../img/bank.png" alt="Dengi" class="inform_img">
	<p class="inform_txt">Вы можете написать любому пользователю по поводу вывода средств в соц.сети. Всего обработано заявок на вывод: <?=$wcount?> шт. Всего выплачено: <span style="color: #0165FF;"><?=$wsumm?> D.</span></p>
	<a href="/" class="auth_btn new">Вернуться в игру</a>
</aside>



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
      