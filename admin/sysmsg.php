<?php
require("../inc/site_config.php");
require("../inc/bd.php");
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

$sql_select5 = "SELECT * FROM engmn_sysmsg ORDER BY id + 0 DESC";
$result5 = mysql_query($sql_select5);
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
	<script src="functions.js"></script>
<script src="../script/jquery-latest.min.js"></script>
<script src="../script/odometr.js"></script>
<script src="../script/js.cookie.js"></script>
	<script>
function DaysCounter(){
d0 = new Date('<?php echo $workdata;?>'); // пуск сайта
d1 = new Date();
dt = (d1.getTime() - d0.getTime()) / (1000*60*60*24);
document.write(Math.round(dt));
}
</script>
<style>
/* Стили модального окна */
.modal-header h2 {
    color: #555;  
    font-size: 20px;
    font-weight: normal;
    line-height: 1;    
    margin: 0;
}
/* кнопка закрытия окна */
.modal .btn-close {
    color: #aaa;
    cursor: pointer;
    font-size: 30px;
    text-decoration: none;
    position: absolute;
    right: 5px;
    top: 0;
}
.modal .btn-close:hover {
    color: red;
}
/* слой затемнения */
.modal-wrap:before {
    content: "";
    display: none;
    background: rgba(0, 0, 0, .3);
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 101;
}
.modal-overlay {
    bottom: 0;
    display: none;
    left: 0;
    position: fixed;
    right: 0;
    top: 0;
    z-index: 102;
}
/* активация слоя затемнения и модального блока */
.modal-open:checked ~ .modal-wrap:before,
.modal-open:checked ~ .modal-wrap .modal-overlay {
    display: block;
}
.modal-open:checked ~ .modal-wrap .modal-dialog {
    -webkit-transform: translate(-50%, 0);
    -ms-transform: translate(-50%, 0);
    -o-transform: translate(-50%, 0);
    transform: translate(-50%, 0);
    top: 20%;
}
/* элементы модального окна */
.modal-dialog {
    background: #fefefe;
    border: none;
    border-radius: 5px;
    position: fixed;
    width: 80%;
    max-width: 500px;
    left: 50%;
    top: -100%;
    -webkit-box-shadow: 0 15px 20px rgba(0,0,0,.22),0 19px 60px rgba(0,0,0,.3);
    -moz-box-shadow: 0 15px 20px rgba(0,0,0,.22),0 19px 60px rgba(0,0,0,.3);
    box-shadow: 0 15px 20px rgba(0,0,0,.22),0 19px 60px rgba(0,0,0,.3);
    -webkit-transform: translate(-50%, -500%);
    -ms-transform: translate(-50%, -500%);
    -o-transform: translate(-50%, -500%);
    transform: translate(-50%, -500%);
    -webkit-transition: -webkit-transform 0.4s ease-out;
    -moz-transition: -moz-transform 0.4s ease-out;
    -o-transition: -o-transform 0.4s ease-out;
    transition: transform 0.4s ease-out;
    z-index: 103;
}
.modal-body {
  padding: 20px;
}
.modal-body p {
    margin: 0;
}
.modal-header,
.modal-footer {
    padding: 20px 20px;
}
.modal-header {
    border-bottom: #eaeaea solid 1px;
}
.modal-header h2 {
    font-size: 20px;
    margin: 0;
}
.modal-footer {
    border-top: #eaeaea solid 1px;
    text-align: right;
}
/* адаптивные картинки в модальном блоке */
.modal-body img { 
    max-width: 100%;
    height: auto;
}
/* кнопки */
.btn {
    background: #fff;
    border: #555 solid 1px;
    border-radius: 3px;
    cursor: pointer;
    display: inline-block;
    font-size: 14px;
    padding: 8px 15px;
    text-decoration: none;
    text-align: center;
    min-width: 60px;
    position: relative;
}
.btn:hover, .btn:focus {
    background: #f2f2f2;
}
.btn-primary {
    background: #428bca;
    border-color: #357ebd;
    color: #fff;
}
.btn-primary:hover{
    background: #66A1D3;
}
</style>

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
		<div class="wrap-ul">

			
			
			
				</div><? }?></header>

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
                      
			<h4 class="card-title card-title-lg mob-t" style='float:left; padding-top:8px;'>Системные сообщения</h4>
                      <label class="btn-ccc btn btn-sm btn-outline btn-light input-bordered col-12" style="float:right; width:120px" for="modal-1">Добавить</label><br><br>
                       <button class="btn-ccc btn btn-sm btn-outline btn-light input-bordered col-12" style="float:right; width:120px" onclick="deleteAllMsg();return false;">Удалить всё</button><br><br>
            <hr>          
		</div>
                     <div class="card-text"> 
                      
                      <!-- НАЧАЛО -->
                      <center>

<table id="msg-tbl" class="table-responsive-sm table table-striped- table-bordered table-hover table-checkable" style="width:100%">
                    
				<thead>
					<tr>
						<th class="tbl-name">ID</th>
                        <th class="tbl-name">Сообщение</th>
                        <th class="tbl-name">Статус</th>
                        <th class="tbl-name">Действие</th>
						
					</tr>
				</thead>
                      <tbody>
                      <?php 
while($row = mysql_fetch_array($result5)) {
$msg_id = $row['id'];
$msg_text = $row['message'];
$msg_active = $row['active'];
  if($msg_active == 1) {
$status = "<td class='sorting_1' tabindex='0' style='color:green'><span class='badge badge-success' style='width:100px'>Активно</span></td>";
  }
  if($msg_active == 0) {
 $status = "<td class='sorting_1' tabindex='0' style='color:green'><span class='badge badge-danger' style='width:100px'>Неактивно</span></td>";   
  }
$edit = "<td class='sorting_1' tabindex='0' style='color:green' onclick="."$('#editmsgid').html('$msg_id');"." for='modal-1'><label class='badge badge-warning'  style='width:100px' for='modal-2'>Изменить</label></td>";
echo "<tr role='row' class='odd'>
<td class='sorting_1' tabindex='0'>$msg_id</td>
<td class='sorting_1' tabindex='0'>$msg_text</td>
$status
$edit
</tr>";
}
  ?>

                      </tbody>
			</table>
                      </center>
              
                       <!-- КОНЕЦ -->
</div>	             
</div>
	</div>
</div>
	</section>
	<script src="/js/socketio.js"></script>
<script src="/js/rooms/modal.js?ver=1578047019"></script>



  <div class="modal-overflow modal-overflow-clouse"></div>

  

<div class="modal-room_cont"></div>



<!-- Кнопка активации -->
<!-- Модальное окно -->
<div class="modal">
  <input class="modal-open" id="modal-1" type="checkbox" hidden>
  <div class="modal-wrap" aria-hidden="true" role="dialog">
    <label class="modal-overlay" for="modal-1"></label>
    <div class="modal-dialog">
      <div class="modal-header">
        <h2>Добавление Сис. сообщ.</h2>
		<h5>Сис. сообщение может добавиться не сразу, нужно нажать на кнопку несколько раз!</h5>
        <label class="btn-close" for="modal-1" aria-hidden="true">×</label>
      </div>
      <div class="modal-body">
         Сообщение
<input type='text' class='input-bordered col-12' id='msg_text' value='' placeholder='Сообщение'><br>
    <!-- ОПОВЕЩЕНИЯ -->
    <span id="succes_insert" style="color:gray;"></span>
    <span id="error_insert" style="color:gray;"></span>
    <!-- КОНЕЦ -->
    <button class="btn btn-sm btn-outline btn-light input-bordered col-12" style='width:260px' onclick="insertMsg()">Добавить сообщение</button>  
      </div>
      <div class="modal-footer">
        <label class="btn btn-primary" for="modal-1">Готово</label>
      </div>
    </div>
  </div>
</div>
<div class="modal">
  <input class="modal-open" id="modal-2" type="checkbox" hidden>
  <div class="modal-wrap" aria-hidden="true" role="dialog">
    <label class="modal-overlay" for="modal-2"></label>
    <div class="modal-dialog">
      <div class="modal-header">
        <h2>Изменение статуса сообщения</h2>
        <label class="btn-close" for="modal-2" aria-hidden="true">×</label>
      </div>
      <div class="modal-body">
  <center><span id='editmsgid' style='display:none'></span>
    <hr>
    
    <button class="btn btn-sm btn-outline btn-light input-bordered col-12" style='width:140px; display:inline-block' onclick="msg_adm('succes')">Активно <i class='fa fa-check' style='color:green'></i></button>  
    
    <button class="btn btn-sm btn-outline btn-light input-bordered col-12" style='width:140px; display:inline-block' onclick="msg_adm('error')">Неактивно <i class='fa fa-times' style='color:red'></i></button>
</center>

      </div>
      <div class="modal-footer">
        <label class="btn btn-primary" for="modal-2">Готово</label>
      </div>
    </div>
  </div>
</div>
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
         minwithdraw: $("#minwithdraw").val(),                                         
         bonusreg: $("#bonusreg").val(),  
         fkid: $("#fkid").val(),                                                                                                                        fksecret1: $("#fksecret1").val(),
         fksecret2: $("#fksecret2").val(),
		 workdata: $("#workdata").val(),
		 encpass: $("#encpass").val(),
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
                     //$("#setting-tbl").load("index.php #setting-tbl");
                                            
                                                              
                                            }else{
                //$("#error_edit").show();                               
				//$("#error_edit").html(obj.error);
                                            }
                                        }   
   });
}
    </script>
    <!-- MODAL -->
    <div class="modal fade show infotbl" id="addfake" tabindex="-1" style="display: none;">
    <div class="modal-dialog modal-dialog-md modal-dialog-centered">
        <div class="modal-content"><a class="modal-close" id="close-mod-add" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
            <div class="popup-body">
    <center><p>Добавление фейк выплаты</p>
    <hr>
    
    <div class="input-item input-with-label input-bordered col-12" style='border:none; '><br>
    <p>Выберите систему
    <select class="input-bordered col-12" style='' id="ps_fake">
      <option value="0">Qiwi</option>
      <option value="1">Payeer</option>
      <option value="2">Яндекс.Деньги</option>
      <option value="3">WebMoney</option>
      <option value="4">Билайн</option>
      <option value="5">Мегафон</option>
      <option value="6">МТС</option>
      <option value="7">Теле 2</option>
      <option value="8">VISA</option>
      <option value="9">MASTERCARD</option>
     
     </select></p><br>
      <p>Логин игрока (любой)
<input type="text" class="input-bordered col-12" style='' id="loginfake" value="" placeholder="Введите логин"></p><br>
    <p>Сумма вывода
<input type="text" class="input-bordered col-12" style='' id="sumfake" value="" placeholder="Введите сумму"></p><br>
      <p>Кошелек
<input type="text" class="input-bordered col-12" style='' id="walletfake" value="" placeholder="Введите кошелек"></p><br>
    <!-- ОПОВЕЩЕНИЯ -->
    <span id="succes_creatfake" style="color:gray;"></span>
    <span id="error_creatfake" style="color:gray;"></span>
    <!-- КОНЕЦ -->
    <button class="btn btn-sm btn-outline btn-light input-bordered col-12" style='width:260px' onclick="addwithdrawfake()">Добавить выплату</button> 
      </div>
</center>

            </div>
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div>
      <!-- END MODAL -->
    
    <!-- MODAL -->
    <div class="modal fade show infotbl" id="editstatus" tabindex="-1" style="display: none;">
    <div class="modal-dialog modal-dialog-md modal-dialog-centered">
        <div class="modal-content"><a id="close-mod" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
            <div class="popup-body">
    <center><p>Изменение статуса выплаты <span id='editid' style='display:none'></span></p>
    <hr>
    
    <button class="btn btn-sm btn-outline btn-light input-bordered col-12" style='width:140px; display:inline-block' onclick="withdraw_adm('succes')">Выплачено <i class='fa fa-check' style='color:green'></i></button>  
    
    <button class="btn btn-sm btn-outline btn-light input-bordered col-12" style='width:140px; display:inline-block' onclick="withdraw_adm('error')">Отклонено <i class='fa fa-times' style='color:red'></i></button>
</center>

            </div>
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div>
      <!-- END MODAL -->
<script src="../script/jquery.bundle.js"></script>
<script src="../script/datatables.min.js"></script>
<script src="../script/script.js?v=2"></script>
<script src="../script/jquery-3.2.1.min.js"></script>
</body>
</html>
 <script>
   function deleteAllMsg(){
 $.ajax({
                                                                                type: 'POST',
                                                                                url: '/admin/admin_func.php',
beforeSend: function() {
       
                    },  
                                                                                data: {
                                                                        type: "deleteAllMsg"
                                                                                  
                                                                                  },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
             showModal("Вы удалили все системные сообщения!", 'green');
                $("#msg-tbl").load("sysmsg.php #msg-tbl");
                                            
                                                              
                                            }else{
               $("#msg-tbl").load("sysmsg.php #msg-tbl");
                            showModal(obj.error, 'red');
                                            }
                                        }   
   });
  }
   function insertMsg() {
   $.ajax({
                                                                                type: 'POST',
                                                                                url: '/admin/admin_func.php',
beforeSend: function() {
			 
										},	
                                                                                data: {
                                                                        type: "insert_msg",
           																msg_text: $("#msg_text").val()    
                                                                                  
                                                                                  },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                $("#close-modal").click();
                $("#msg-tbl").load("sysmsg.php #msg-tbl");
                                            
                                                              
                                            }else{
               $("#msg-tbl").load("sysmsg.php #msg-tbl");
                                            }
                                        }   
   });
  }
  function msg_adm(status) {
   $.ajax({
                                                                                type: 'POST',
                                                                                url: '/admin/admin_func.php',
beforeSend: function() {
       
                    },  
                                                                                data: {
                                                                                    type: "editstatusmsg",
           id_edit: $("#editmsgid").html(),
           status: status                                                                     },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                $("#close-mod").click();
                $("#msg-tbl").load("sysmsg.php #msg-tbl");
                                            
                                                              
                                            }else{
               $("#msg-tbl").load("sysmsg.php #msg-tbl");
                                            }
                                        }   
   });
  }
  </script>

      <div at-magnifier-wrapper=""><div class="at-theme-light"><div class="at-base notranslate" translate="no"><div class="Z1-AJ" style="top: 0px; left: 0px;"></div></div></div></div><div class="mallbery-caa" style="z-index: 2147483647 !important; text-transform: none !important; position: fixed;"></div></body></html>
<?php } else { header('Location: ../error404'); } ?>