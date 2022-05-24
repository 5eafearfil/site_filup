<?php
session_start();

header('X-Frame-Options:SAMEORIGIN');
header('X-Content-Type-Options:nosniff');
header('X-Frame-Options: DENY');
header("X-XSS-Protection: 1; mode=block");

require("inc/bd.php");
require("inc/site_config.php");

$site_access = $_GET['access'];
if($site_access != '') {
  $_SESSION['access'] = $site_access;
  header('Location: /');
}


$refid = $_SESSION['ref'];
$sid = $_SESSION['hash'];

$s = file_get_contents('https://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']); 
$user = json_decode($s, true);
$user['network']; // соц. сеть, через которую авторизовался пользователь
$user['identity']; // уникальная строка определяющая конкретного пользователя соц. сети
$user['first_name']; // имя пользователя
$user['last_name']; // фамилия пользователя
$user['photo_big']; // фото пользователя
$network = $user['network'];
$firstname = $user['first_name'];
$lastname = $user['last_name'];
$name = "$firstname $lastname";
$avito = $user['photo_big'];
$hashq = $user['identity'];

$sql_select2 = "SELECT COUNT(*) FROM engmn_user WHERE hash='$hashq'";
$result2 = mysql_query($sql_select2);
$row = mysql_fetch_array($result2);
if($row)
{   
$logc = $row['COUNT(*)'];
}
    
        if($logc == 0) {
        if($hashq != '') {
     $insert_sql1 = "UPDATE `engmn_user` SET `vk_name` = '$name', `social` = '$hashq', `hash` = '$hashq', `img` = '$avito' WHERE `hash`='$sid'";
mysql_query($insert_sql1);
            $_SESSION['hash'] = $hashq;
            $_SESSION['login'] = 1;
            $home_url = 'http://'.$_SERVER['HTTP_HOST'] .'/profile';
            header('Location: ' . $home_url);
    
        }
        }

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
          $ref_code = $row['ref_code'];
		  $ava = $row['img'];
		  $datareg = $row['date_reg'];
		  $datareg = substr($datareg, 0, 10);
		  $datareg = str_replace('.', '-', $datareg);
        
				if ( empty($name) ){
			
			$login = $row['login'];
		}else{
			
				$login = $row['vk_name'];
					$login = explode(' ', $login);
					$login = $login[0];
					
			
		}
		
		}
		
$gacount = "SELECT COUNT(*) FROM  engmn_games WHERE user_id = '$id'";
$ress = mysql_query($gacount);
$mgcount = mysql_fetch_array($ress);
$mgcount = $mgcount[0];
$sql_select23 = "SELECT SUM(sum) FROM engmn_games WHERE user_id='$id'";
$result23 = mysql_query($sql_select23);
$rowa = mysql_fetch_array($result23);
if ( $rowa ){

	$mybetsum = round($rowa['SUM(sum)'], 2);
	if ( empty($mybetsum)){

		$mybetsum = "0";

	}

}
		if ( empty($social_link) ){
			if ( empty($name) ){
			
			$name = "Не привязан";
			$social_link = "";
			
			}
		}
			
		
			

				
$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
$url = explode('?', $url);
$url = $url[0];
    $sql_select5 = "SELECT * FROM engmn_games WHERE user_id = $id ORDER BY id DESC LIMIT 5";
$result5 = mysql_query($sql_select5);
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
require("inc/site_config.php"); 

  ?>








<html lang="Ru-ru"><head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">   
    <!--<script src="../script/script.js"></script>
	<script src="../script/jquery-latest.min.js"></script>
    <script src="../script/odometr.js"></script>
    <script src="../script/js.cookie.js"></script>-->
    <script src="../ajax/functions.js"></script>
	<link rel="stylesheet" href="/style/style.css?1577994533">
	<link rel="stylesheet" href="/style/style-tablet.css?1577994533" media="(min-width: 670px) and (max-width: 1024px)">
<script>
function DaysCounter(){
d0 = new Date('<?php echo $workdata;?>'); // пуск сайта
d1 = new Date();
dt = (d1.getTime() - d0.getTime()) / (1000*60*60*24);
document.write(Math.round(dt));
}
</script>
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
    window.renderRecaptchas = function() {
        var recaptchas = document.querySelectorAll('.g-recaptcha');
        for (var i = 0; i < recaptchas.length; i++) {
            grecaptcha.render(recaptchas[i], {
                sitekey: recaptchas[i].getAttribute('data-sitekey')
            });
        }
    }
</script>
       
      
	<!--<link rel="stylesheet" href="/public/header.min.css?1577887206"> -->
	<style>
	.table{max-width:1250px;width:97%;margin:20px auto 20px;text-align:left;padding-left:10px;padding-right:10px;border-collapse:collapse}
.table_title{position:relative;margin-top:90px;text-align:center;color:#000;font-size:30px;font-family:'Proxima Bold',Arial}
.table_bb{border-bottom:1px solid #000;padding-bottom:15px}
.table_head{padding-top:10px;padding-bottom:10px;font-size:16px;font-family:'Proxima ExtraBold',Arial}
.table_content{padding-top:15px;padding-bottom:15px;font-size:16px}
.table_bbg{border-collapse:collapse;border-bottom:1px solid #eeeeef;margin:0 auto;-webkit-box-pack:space-evenly;-ms-flex-pack:space-evenly;justify-content:space-evenly}
</style>


   

	<link rel="stylesheet" href="/public/header-short.min.css?1577887206" media="only screen and (max-width: 670px)">
	<link rel="stylesheet" href="/public/newMenu.css?1577887206"  media="(min-width: 0px) and (max-width: 1024px)">

	<link rel="stylesheet" href="/public/tablets.css?1577887206" media="(min-width: 670px) and (max-width: 1024px)">
	<link rel="stylesheet" href="/public/mini-desktop.css?1577887206" media="(min-width: 1024px) and (max-width: 1366px)">
			
	<link rel="preconnect" href="/font/ProximaNova-Semibold.ttf" crossorigin="anonymous">
	<link rel="preconnect" href="/font/ProximaNova-Regular.ttf" crossorigin="anonymous">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">



     <!-- WINTER -->

   <!--    -->
     <!-- WINTER -->


<?=$snow?>	<link rel="prefetch" href="/img/BG_footer.png">
	<!-- <link rel="manifest" href="/manifest.json"> -->
	<link rel="dns-prefetch" href="https://www.youtube.com/">
	<!--link rel="prerender" href=""-->
	<link rel="shortcut icon" href="/fav.ico" type="image/x-icon">
	<title><?=$sitename?> | Личный кабинет</title>
	<meta name="description" content="Личный кабинет">
	<link rel="canonical" href="<?=$url?>/profile">
	<meta property="og:title" content="<?=$sitename?> | Личный кабинет"> 
    <meta property="og:type" content="Website">
    <meta property="og:url" content="<?=$url?>/profile">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:image" content="/img/on.png">
    <meta property="og:description" content="Личный кабинет">
    <meta name="keywords" content="выиграть реальные деньги без вложений, кости, кидать кости, игра на рубли, выбор шанса победы, выиграть деньги онлайн, рулетка, азартная игра, казино">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#A33EFF">
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
    margin-top: -40px;
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

</head>
<body><!-- <style>a.winter-logo:before {transform: translate(-110px,-48px);}</style> --><link rel="stylesheet" href="/js/css/fontawesome-all.min.css">

<aside class="adaptive">
		<button class="adaptive_burger">
			
		</button>
		<h2 class="adaptive_title">
			<a class="inherit" href="/"><?=$sitename?></a>
		</h2>
	</aside>
	<aside class="left">
		<p class="left_logo" style="left: 20px;">
			 <a href="/" class="left_logo_link"><?=$sitename?></a>
			<span class="close_x">
				×
			</span>
		</p>
		<figure class="wrap-winter">
			<?php
if ( empty($ava)  )
				{

				$ava = "/img/User.png";
				} 
			 echo'<img src="' . $ava . '" alt="user" class="left_img">'; ?>
		</figure>
		<span class="left_name"><?=$login?></span>

		<input id="tokens" type="hidden" token="21f2d45e5dca46248da18e439c2913ed0c1b0bf19810cf314bd3b97b1c3d5bed" user="79877">

		<div class="left_stats">
			<span class="left_stats_name" style="display: inline-block;white-space: nowrap;">
				Ваша реф. ссылка:
				<a href="/ref"><span id="refLink" class="left_stats_block color_selection" title="Кликните, для того,&#013;чтобы перейти по вашей реф. ссылке">
					<?=$ref_code?> 
				</span></a>
			</span>
			
			<span class="left_stats_name">
				Баланс:
				<span id="balance" class="left_stats_block purple"><?=$balance?> D.</span>
			</span>
		</div>
		<nav class="left_nav">
			<ul class="left_nav_ul">
				<li class="left_nav_ul_li lienfild">
					<a href="/" class="link">
						<span class="left_nav_ul_li_img">
							<i class="fas fa-dice"></i>
						</span> 
					Перейти к игре					</a>
				</li>
				<li class="left_nav_ul_li">
					<a href="/profile" class="link">
						<span class="left_nav_ul_li_img">
							<i class="fas fa-home"></i>
						</span> 
					Главная					</a>
				</li>
				<li class="left_nav_ul_li">
					<a href="/winthdraw" class="link">
						<span class="left_nav_ul_li_img" style="
						">
							<i class="fas fa-sign-out-alt " style="transform: rotate(-90deg);"></i>
						</span> Вывод средств					</a>
				</li>
				<li class="left_nav_ul_li">
					<a href="/pay" class="link">
						<span class="left_nav_ul_li_img">
							<i class="fas fa-sign-out-alt" style="transform: rotate(90deg);"></i>
						</span> Пополнение баланса												
					</a>
				</li>
				<li class="left_nav_ul_li">
					<a href="/ref" class="link">
						<span class="left_nav_ul_li_img">
							<i class="fas fa-users"></i>
						</span> Рефералы					</a>
				</li>
	
				<li class="left_nav_ul_li">
					<a href="/bonus" class="link">
						<span class="left_nav_ul_li_img">
							<i class="fas fa-gift"></i>
						</span> Бонус					</a>
				</li>
				<li class="left_nav_ul_li">
					<a href="/terms" class="link">
						<span class="left_nav_ul_li_img">
							<i class="fas fa-file"></i>
						</span> Соглашение					</a>
				</li>
				<li class="left_nav_ul_li">
					<a href="<?=$site_support?>" class="link">
						<span class="left_nav_ul_li_img">
							<i class="far fa-comment-alt"></i>
						</span> Поддержка					</a>
				</li>

				<li class="left_nav_ul_li">
					<a href="/payouts" class="link">
						<span class="left_nav_ul_li_img">
							<i class="far fa-check-circle"></i>
						</span> Выплаты					</a>
				</li>
				<li class="left_nav_ul_li">
					<a onclick="exit();location.href = '';exit();location.href = '';" class="link linkCall">
						<span class="left_nav_ul_li_img">
							<i class="fas fa-sign-out-alt"></i>
						</span > Выход					</a>
				</li>
			</ul>
		</nav>
		<center><p class="left_bottom">  Мы работаем уже <span class="purple_two"><script>DaysCounter();</script> дня(й)</span></p></center>
		<p class="left_bottom">Дата регистрации: <?=$datareg?></p>
	</aside>


  <div class="modal-room_cont"></div>

  <div class="pop-up-wrap"></div>

  	
<div class="modal-notification"></div>




<script defer="" src="../js/script.js"></script>
<script defer="" src="../js/modals.js?ver=1578145099"></script>

<script src="/js/rooms/modal.js?ver=1578145099"></script>
<script defer="" src="/js/newPopUp.js?1578145099"></script>	
<script src="//ulogin.ru/js/ulogin.js"></script>
		<style>.admibs-none{display: none;}</style>
		<div class="flex">
			<figure class="Private-cabinet">
				<h2 class="last_off_title">Личный кабинет</h2>
				<section class="general-information">
					<h2 class="general-information_title">Общая информация о ставках</h2>
					<p style="font-size: 16px" class="general-information_text">Чтобы посмотреть больше материалов по сайту <?=$sitename?> перейдите на <a href="<?=$site_support?>" class="general-information_link">эту страницу</a>. Здесь вы узнаете о уровнях, акциях и новостях</p>
					<div class="general-stat">

						<p class="general-container"><span class="general-inf">Ваш уникальный ID</span><span class="general-inf-num blue"><?=$id?></span></p>
						<p class="general-container"><span class="general-inf ">ВКонтакте</span><span class="general-inf-num blue"><a href="<?=$social_link?>"><font size="5px"><?php if ( empty($social_link) ){
?>  <a id="uLogin" title="Привязать ВК" data-ulogin="display=panel;theme=flat;fields=photo_big,first_name,last_name;mobilebuttons=0;providers=vkontakte;hidden=;redirect_uri=http%3A%2F%2F<?=$_SERVER['HTTP_HOST']?>/profile.php;" title="Привязать ВК">Привязать ВК</a>
<? }else{

echo $name;

} ?>	</font></a></span></p>
  					
						<p class="general-container"><span class="general-inf ">Всего сыграно игр</span><span class="general-inf-num "><?=$mgcount?></span></p>
						<p class="general-container"><span class="general-inf ">Сумма всех ставок</span><span class="general-inf-num "><?=$mybetsum?></span></p>
				
					</div>
					<div class="typical-block-wrap">

							<form id="bonus" action="" class="promo-from">
							<div class="promo-form-wrap">

							<figure class="cons-form-picture indexBlock">
								<a href="https://teleg.one/dicegroups" target="_blank"><img class="cons-form_image" src="/img/gift.png" alt="Подарок"></a>
								<figcaption class="cons-form-picture_txt commision-modal">Больше промо-кодов в нашем<br> канале Телеграм! </figcaption>
							</figure>

								<h4 class="promo-form-title">Активация промокода </h4>  <p id="error"></p> 
								<p id="clases" class="captha hidden"> Каптча:
									<span class="sumA"></span> +
									<span class="sumB"></span>
									<span class="summCaptha">?</span>
								</p>
							</div>
							
							<label id="old_cap" for="promo" class="promo-form-cont promo-form-cont__standart" aria-label="Введите промо-код">
								<input type="text" id="promoactive" class="promo-form-inp" placeholder="Введите промо-код">
								<input autocomplete="off" class="promo-form-btn" type="button" onclick="activepromo();" id="activebutton" name="" value="Использовать">
							</label>
 
	
							<aside id="captyre" class="promo-captha promo-captha__id hidden" role="captha">
								<label for="promo" class="promo-form-cont promo-form-cont__before" aria-label="Введите промо-код">
									<input type="text" id="code_captha" class="promo-form-inp promo-form-inp__mod" placeholder="Введите капчу">
									<input autocomplete="off" class="promo-form-btn" type="button" id="AnswerBtn" onclick="valid(document.getElementById('bonus')); " value="Ответить">
								</label>
							</aside>

							<p class="promo-form-text">
								<a href="/faq" class="promo-form_link">Как получить промо-код?</a> <a href="/faq" class="promo-form_link promo-form_link__left">Зачем нужны промо-коды?</a>
							</p>
						</form>
						
						
						<!--<div class="promo-from" style=''>
    <figure class="cons-form-picture indexBlock">
								<a href="https://teleg.one/dicegroups" target="_blank"><img class="cons-form_image" src="/img/gift.png" alt="Подарок"></a>
								<figcaption class="cons-form-picture_txt commision-modal">Больше промо-кодов в нашем<br> канале Телеграм! </figcaption>
							</figure>

								<h4 class="promo-form-title">Активация промокода </h4>  <p id="error"></p> 

    Введите промокод<br>
<input type='text' style='width:250px;' class='promo-form-inp' id='promoactive' value='' placeholder='Промокод'><br>
  
    <!-- ОПОВЕЩЕНИЯ -->
   
                               
    <!-- КОНЕЦ -->  
   
   
                                      <br><br>
                                     


            
						<style>.none-admin{display: none;}</style>

						
						</div>


				</section>
				<div class="wrap-special">
 <style>
		.table_title {
			    margin-top: 160px;
		}
		@media screen and (max-width: 670px) {
			.table_title {
			    margin-top: -20px;
			}
		}
</style>
					<section class="last_off margin__top">
						<h3 class="last_off_title">Последние ставки</h3>
						<div class="table_last_head">
							<p  class="table_last_head_txt stavka ">Ставка</p>
							<p class="table_last_head_txt number deactive">Число</p>
							<p class="table_last_head_txt deactive">Цель</p>
							<p class="table_last_head_txt chance ">Шанс</p>
							<p class="table_last_head_txt" style="width: 123px;">Выплата</p>
						</div>
					<div id="bets_users" class="wrap">

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


 echo '<div class="table_last_content">

					<p class="table_last_content_txt sta">' . $sum .' D.</p>
					<p class="table_last_content_txt chislo deactive">' . $number .'</p>
					<p class="table_last_content_txt deactive">' . $cel .'</p>
					<p class="table_last_content_txt chance_no">' . $chance .'</p>
                   <p class="table_last_content_txt number_home ' . $color .'"> ' . $wsum . ' D.</p>	</div>';

}
?>              	
					
						
					<!--<section class="rate" style="height: 700px">			-->	
<? /*<h3 class="table_title">Последние ставки:</h3>
	<table class="table">
		<thead>
			<tr class="table_bb">
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
		</section> */?>
				</div>
			</section>
			</figure>

	</div>
    <script defer="" src="../../js/lk.js?1577994533"></script>
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
<div at-magnifier-wrapper=""><div class="at-theme-light"><div class="at-base notranslate" translate="no"><div class="Z1-AJ" style="top: 0px; left: 0px;"></div></div></div></div></body></html>