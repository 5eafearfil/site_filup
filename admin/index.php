<?php
require("../inc/bd.php"); 
require("../inc/site_config.php"); 
session_start();
$sid = $_SESSION['hash'];




// проверка на админа
$admin_check = "SELECT * FROM engmn_user WHERE hash = '$sid'";
$result_admin = mysql_query($admin_check);
$row = mysql_fetch_array($result_admin);
if($row)
{	
$last_check = $row['admin'];
}
if($last_check == 1) {
  ?>
<!DOCTYPE html>
<html lang="Ru-ru"><head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">   
     
	<link rel="preconnect" href="../public/header.min.css?1578047019" crossorigin="anonymous">
	<link rel="preconnect" href="../public/header-short.min.css?1578047019" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.css?v=1575178639" id="layoutstyle">
    	<link rel="stylesheet" href="../css/datatables.min.css">
<link rel="stylesheet" href="../css/vendor.bundle.css">		
      
	<link rel="stylesheet" href="../public/header.min.css?1578047019"> 
	<link rel="stylesheet" href="../public/check.css?1578047019"> 

   

	<link rel="stylesheet" href="../public/header-short.min.css?1578047019" media="only screen and (max-width: 670px)">
	<link rel="stylesheet" href="../public/newMenu.css?1578047019" media="(min-width: 0px) and (max-width: 1024px)">

	<link rel="stylesheet" href="../public/tablets.css?1578047019" media="(min-width: 670px) and (max-width: 1024px)">
	<link rel="stylesheet" href="../public/mini-desktop.css?1578047019" media="(min-width: 1024px) and (max-width: 1366px)">
		
	<link rel="preconnect" href="..font/ProximaNova-Semibold.ttf" crossorigin="anonymous">
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


     <!-- WINTER -->

   <!--    -->
     <!-- WINTER -->

	<link rel="prefetch" href="../img/BG_footer.png">
	<!-- <link rel="manifest" href="/manifest.json"> -->
	<link rel="dns-prefetch" href="https://www.youtube.com/">
	<!--link rel="prerender" href=""-->
	<link rel="shortcut icon" href="/fav.ico" type="image/x-icon">
	<title><?=$sitename?> - Азартная игра с выбором шанса победы. Моментальные выплаты. Уникальная система уровней</title>
	<meta name="description" content="Азартная игра с выводом реальных денег! Выберите шанс победы и выигрывайте рубли бесплатно каждый день. Киньте кости и получите бонус на сайте <?=$sitename?> уже сегодня! С нами уже более 200.000 пользователей">
	<link rel="canonical" href="<?=$url?>/public/">
	<meta property="og:title" content="http://<?=$linksite?> - Азартная игра с выбором шанса победы. Моментальные выплаты. Уникальная система уровней"> 
    <meta property="og:type" content="Website">
    <meta property="og:url" content="<?=$url?>/public/">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:image" content="/img/on.png">
    <meta property="og:description" content="Азартная игра с выводом реальных денег! Выберите шанс победы и выигрывайте рубли бесплатно каждый день. Киньте кости и получите бонус на сайте <?=$sitename?> уже сегодня! С нами уже более 200.000 пользователей">
    <meta name="keywords" content="выиграть реальные деньги без вложений, кости, кидать кости, игра на рубли, выбор шанса победы, выиграть деньги онлайн, рулетка, азартная игра, казино">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#A33EFF">
    <script src="/js/jq.js"></script>

<link rel="stylesheet" href="../public/deferred.css?1578047017007"><link rel="stylesheet" type="text/css" href="chrome-extension://glgemekgfjppocilabhlcbngobillcgf/styles.css"></head> 
<body class="body-min-long"><!-- <style>a.winter-logo:before {transform: translate(-110px,-48px);}</style> -->
<header class="head head_noneAuth">
		<aside class="head_logo">
			<a href="/" class="head_logo_txt "><?=$sitename?></a>
		</aside>

		<nav class="nav">
			<ul class="nav_ul">
				<li><a href="index" class="nav_ul_a">Главная</a></li>
				<li><a href="promo" class="nav_ul_a">Промокоды</a></li>
				<li><a href="withdraws" class="nav_ul_a">Выплаты</a></li>
				<li><a href="deps" class="nav_ul_a">Пополнения</a></li>
				<li><a href="users" class="nav_ul_a">Пользователи</a></li>
				<li><a href="bot" class="nav_ul_a">Боты</a></li>
				<li><a href="stat" class="nav_ul_a">Статистика</a></li>
				<li><a href="sysmsg" class="nav_ul_a">Сис. сообщ.</a></li>
				

				
				 
		
			
			
		
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
		<? }?></header>

<div class="head-mobaile">
	
	<a href="/" class="head_logo_txt"><?=$sitename?></a>


</div>





<style>

body{background: url('../img/Bg2KMini.png');background-repeat: no-repeat;}

@media (min-width: 0px) and (max-width: 670px) {body{background: url(../img/Bg670.png) 0 -65px no-repeat;}}

</style>
	<section class="errors_scr">
			<div class="card-innr">
		<div class="card-head">
                      
			<h4 class="card-title card-title-lg" style='float:left; padding-top:8px;'>Настройки</h4>
                      <button id='saved' class="btn-ccc btn btn-sm btn-outline btn-light input-bordered" style="float:right; width:130px;" onclick="saves()">Сохранить</button><br><br>
                      <hr>
		</div>
                      <!-- НАЧАЛО -->
                      <center>
   <div class="row" id="setting-tbl" style="margin-right:2%;margin-left:2%;width:100%;">
                                                        <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Название сайта</label>
                                                            <input type="text" class="form-control" id="sitename" placeholder="Название сайта" value="<?=$sitename?>"/>
                                                          </div>
                                                        </div>
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Домен сайта</label>
                                                            <input type="text" class="form-control" id="sitedomen" placeholder="Домен сайта" value="<?=$sitedomen?>"/>
                                                          </div>
                                                        </div>
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Ссылка на группу VK</label>
                                                            <input type="text" class="form-control" id="sitegroup" placeholder="Ссылка на группу VK" value="<?=$group?>"/>
                                                          </div>
                                                        </div>
														
														
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Ссылка на сообщения VK</label>
                                                            <input type="text" class="form-control" id="sitesupport" placeholder="Ссылка на сообщения VK" value="<?=$site_support?>"/>
                                                          </div>
                                                        </div>
                       <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Секретный ключ сайта</label>
                                                            <input type="text" class="form-control" id="sitesecret" placeholder="Ключ сайта" value="<?=$sitekey?>"/>
                                                          </div>
                                                        </div>
                       <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Мин. сумма бонуса</label>
                                                            <input type="number" min="1" class="form-control" id="minbonus" placeholder="Мин бонус" value="<?=$min_bonus_s?>"/>
                                                          </div>
                                                        </div>
                       <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Макс. сумма бонуса</label>
                                                            <input type="number" min="1" class="form-control" id="maxbonus" placeholder="Макс бонус" value="<?=$max_bonus_s?>"/>
                                                          </div>
                                                        </div>
                                                        <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Мин. депозит для получения бонуса (0, чтобы выкл.)</label>
                                                            <input type="number" min="0" class="form-control" id="minbonusdep" placeholder="Мин. деп. для бонуса" value="<?=$minbonusdep?>"/>
                                                          </div>
                                                        </div>
                                                        <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Сумма за активацию реф.кода</label>
                                                            <input type="number" min="1" class="form-control" id="ref_size" placeholder="Сумма за активацию реф.кода" value="<?=$ref_size?>"/>
                                                          </div>
                                                        </div>
                                                         <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Реферальный процент</label>
                                                            <input type="number" min="1" class="form-control" id="ref_per" placeholder="Реферальный процент" value="<?=$ref_per?>"/>
                                                          </div>
                                                        </div>
                       <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Мин. сумма вывода</label>
                                                            <input type="number" min="1" class="form-control" id="minwithdraw" placeholder="Мин вывод" value="<?=$min_withdraw_sum?>"/>
                                                          </div>
                                                        </div>
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Депозит для вывода (0 - чтобы выкл.)</label>
                                                            <input type="number" min="0" class="form-control" id="depwithdraw" placeholder="Депозит для вывода" value="<?=$dep_withdraw?>"/>
                                                          </div>
                                                        </div>
                      
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Мин. сумма ставки</label>
                                                            <input type="number" min="1" class="form-control" id="minbet" placeholder="Мин ставка" value="<?=$min_bet?>"/>
                                                          </div>
                                                        </div>
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Макс. сумма ставки</label>
                                                            <input type="number" min="1" class="form-control" id="maxbet" placeholder="Макс ставка" value="<?=$max_bet?>"/>
                                                          </div>
                                                        </div>
                                                      
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Бонус за регистрацию</label>
                                                            <input type="number" min="1" class="form-control" id="bonusreg" placeholder="Бонус за регистрацию" value="<?=$bonus_reg?>"/>
                                                          </div>
                                                        </div>
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Прибавить к онлайну</label>
                                                            <input type="number" min="1" class="form-control" id="fakeonline" placeholder="Фейк онлайн" value="<?=$fake_online?>"/>
                                                          </div>
                                                        </div>
                      <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Частота ставок ботов (1к = 1сек)</label>
                                                            <input type="number" min="1" class="form-control" id="fakeinterval" placeholder="1" value="<?=$fake_interval?>"/>
                                                          </div>
                                                        </div>
                      <div class="form-group">
                      <div class="col-lg-12" style="">
                                                            <label>Мин. сумма пополнения</label>
                                                            <input type="number" min="1" class="form-control" id="mindep" placeholder="1" value="<?=$min_sum_dep?>"/>
                                                          </div>
                                                        </div>
                       <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>ID FK</label>
                                                            <input type="number" min="1" class="form-control" id="fkid" placeholder="ID мерчанта FK" value="<?=$fk_id?>"/>
                                                          </div>
                                                        </div>
                       <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Секрет 1 FK</label>
                                                            <input type="text" class="form-control" id="fksecret1" placeholder="Секрет 1 FK" value="<?=$fk_secret_1?>"/>
                                                          </div>
                                                        </div>
                       <div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Секрет 2 FK</label>
                                                            <input type="text" class="form-control" id="fksecret2" placeholder="Секрет 2 FK" value="<?=$fk_secret_2?>"/>
                                                          </div>
                                                        </div>
														<div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Ссылка на группу VK</label>
                                                            <input type="text" class="form-control" id="sitegroup" placeholder="Ссылка на группу VK" value="<?=$group?>"/>
                                                          </div>
                                                        </div>
														<div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Дата начала работы сайта</label>
                                                            <input type="date" class="form-control" id="workdata" value="<?=$workdata?>"/>
                                                          </div>
                                                        </div>
														<div class="form-group">
                                                          <div class="col-lg-12" style="">
                                                            <label>Шифрация паролей (1-вкл/0-выкл)</label>
															<input type="number" class="form-control" id="encpass" maxlength="1" max="1" min="0" value="<?=$encpass?>"/>
                                                          </div>
                                                        
                                                        </div>
                                                         <div class="form-group">
                                                         <div class="col-lg-12" style="">
                                                            <label>Ссылка на ролик YouTube</label>
                              <input type="text" class="form-control" id="ytvido" value="<?=$youtubevideo?>"/>
                                                          </div>
                                                        </div>
                                                        <div class="form-group">
                                                         <div class="col-lg-12" style="">
                                                            <label>Мин. сумма ставок для ТОП 10 в Рейтинге</label>
                              <input type="number" min="1" class="form-control" id="min_rating" value="<?=$min_rating?>"/>
                                                          </div>
                                                        </div>
                                                        <div class="form-group">
                                                         <div class="col-lg-12" style="">
                                                            <label>Макс. сумма ставок для ТОП 10 в Рейтинге</label>
                              <input type="number" min="1" class="form-control" id="max_rating" value="<?=$max_rating?>"/>
                                                          </div>
                                                        </div>
                                                        <div class="form-group">
                                                         <div class="col-lg-12" style="">
                                                            <label>Мин. сумма ставок для ТОП 3 в Рейтинге</label>
                              <input type="number" min="1" class="form-control" id="min_top_rating" value="<?=$min_top_rating?>"/>
                                                          </div>
                                                        </div>
                                                        <div class="form-group">
                                                         <div class="col-lg-12" style="">
                                                            <label>Макс. сумма ставок для ТОП 3 в Рейтинге</label>
                              <input type="number" min="1" class="form-control" id="max_top_rating" value="<?=$max_top_rating?>"/>
                                                          </div>
                                                        </div>

														
														
                     
                      
                      </div>
                     
                      </center>
                       <!-- КОНЕЦ -->
		</div>
	</div>
</div>
	</section>
	<script src="/js/socketio.js"></script>
<script src="/js/rooms/modal.js?ver=1578047019"></script>



  <div class="modal-overflow modal-overflow-clouse"></div>

  

<div class="modal-room_cont"></div>




<footer>
    <section class="foot">
      <h2 class="foot_title">
        <?=$sitename?>
      </h2>
      <p class="foot_txt">Мы работаем уже <span class="linked"><script>DaysCounter();</script> дня(й)</span></p>
      <a rel="noopener" target="_blank" href="https://advisor.wmtransfer.com/sitedetails.aspx?url=http://<?=$linksite?>&amp;tab=feedback" class="ref_code_button webmoney">Верифицирован</a>
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

    <div class="modal-notification">
    </div>
  </footer>
          <!-- Footer -->



<div class="modal-mobaile-overflow hiddenOverflow">
  <div class="modal-mobaile">
    <button class="modal-mobaile__btn mobaile" aria-label="Закрыть модальное окно"></button>
    <p class="modal-mobaile_title"><?=$sitename?></p>
    <ul class="modal-mobaile-ul">
 <li><a href="index" class="modal-mobaile-link">Главная</a></li>
				<li><a href="promo" class="modal-mobaile-link">Промокоды</a></li>
				<li><a href="withdraws" class="modal-mobaile-link">Выплаты</a></li>
				<li><a href="deps" class="modal-mobaile-link">Пополнения</a></li>
				<li><a href="users" class="modal-mobaile-link">Пользователи</a></li>
				<li><a href="bot" class="modal-mobaile-link">Боты</a></li>
				<li><a href="stat" class="modal-mobaile-link">Статистика</a></li>
      
    </ul>
    <p class="modal-mobaile_dscr">Мы работаем уже <mark><script>DaysCounter();</script> дня(й)</mark></p>
  </div>
</div>






<script async="" src="/js/console.js"></script>
<noscript><link rel="stylesheet" href="/public/deferred.css"></noscript>
<script defer="" src="../js/js-packed.js"></script>
<script>eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('$(\'#2\').d(\'c\',5(){7 1=$(\'#e\').8();7 0=$(\'#0\').8();$.b(\'/g/2.h\',{\'1\':1,\'0\':0},5(3){a(3.4==\'f\'){$(\'#0\').9();$(\'#2\').9();$(\'#6\').i(\'<p r="t-q">Спасибо за подписку!</p>\');s.o("6").n=\'j-k\'}l{m(3.4)}})});',30,30,'email|csrf|subscribe|data|status|function|block_sub|let|val|remove|if|post|click|on|csrf_code|success|app|php|html|long|btn|else|alert|className|getElementById||txt|class|document|foot_frame_vrem'.split('|'),0,{}))
</script>
<script defer="" src="/js/newPopUp.js?1578047019"></script>
<script defer="" src="/js/new/findMode.js?ver=1578047019"></script>
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
 <script>
    function saves() {
 $.ajax({
                                                                                type: 'POST',
                                                                                url: '/admin/admin_func.php',
beforeSend: function() {
			   $('#saved').html('Сохранение..');
										},	
                                                                                data: {
         type: "save_edit",
         sitename: $("#sitename").val(),
         sitedomen: $("#sitedomen").val(),
         sitegroup: $("#sitegroup").val(),
         sitesupport: $("#sitesupport").val(),                                    
         sitesecret: $("#sitesecret").val(),
         minbonus: $("#minbonus").val(),
         maxbonus: $("#maxbonus").val(),      
         minbonusdep: $("#minbonusdep").val(),                                                      
         minwithdraw: $("#minwithdraw").val(),                                         
         bonusreg: $("#bonusreg").val(),  
         ref_size: $("#ref_size").val(),
         ref_per: $("#ref_per").val(),
         fkid: $("#fkid").val(),                                                                                                                        fksecret1: $("#fksecret1").val(),
         fksecret2: $("#fksecret2").val(),
		 workdata: $("#workdata").val(),
		 encpass: $("#encpass").val(),
     ytvido: $('#ytvido').val(),
     min_rating: $('#min_rating').val(),
     max_rating: $('#max_rating').val(),
     min_top_rating: $('#min_top_rating').val(),
     max_top_rating: $('#max_top_rating').val(),

         //new
         depwithdraw: $("#depwithdraw").val(),   
                                                                                  
         minbet: $("#minbet").val(),     
                                                                                  
         maxbet: $("#maxbet").val(), 
                                                                                  
         minper: $("#minper").val(), 
                                                                                  maxper: $("#maxper").val(),
                                                                                  
         fakeonline: $("#fakeonline").val(),
                                                                                  
         fakeinterval: $("#fakeinterval").val(),
                                                                                  
         mindep: $("#mindep").val()  
           
                                                                                                                            },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {

                //$("#succes_edit").show();                               
				$("#saved").html("Сохранить");
				showModal("Сохранено!", "green");
                     //$("#setting-tbl").load("index.php #setting-tbl");
                                            
                                                              
                                            }else{
                //$("#error_edit").show();                               
				//$("#error_edit").html(obj.error);
				showModal(obj.error, "red");
                                            }
                                        }   
   });
}
    </script>
    <!-- END -->
<script src="../script/jquery.bundle.js"></script>
<script src="../script/datatables.min.js"></script>
<script src="../script/script.js?v=2"></script>
<script src="../script/jquery-3.2.1.min.js"></script>
      <div at-magnifier-wrapper=""><div class="at-theme-light"><div class="at-base notranslate" translate="no"><div class="Z1-AJ" style="top: 0px; left: 0px;"></div></div></div></div><div class="mallbery-caa" style="z-index: 2147483647 !important; text-transform: none !important; position: fixed;"></div></body></html>
<?php } else { header('Location: ../error404'); } ?>