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
          $ref_code = $row['ref_code'];
          $myrefid = $row['ref_id'];
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
		
		if ( empty($social_link) ){
			if ( empty($name) ){
			
			$name = "Не привязан";
			$social_link = "";
			
			}
		}
			
			if ( empty($ava)  )
				{

$ava = "http://" . $_SERVER['HTTP_HOST'] . "/img/User.png";
				} else {
					
					$ava = $row['img'];
				}

				
$select_deps = "SELECT * FROM engmn_payments WHERE user_id = '$id' ORDER BY id DESC";
$result_deps = mysql_query($select_deps);
$select_refs = "SELECT * FROM engmn_user WHERE ref_id = '$ref_code'";
$result_ref = mysql_query($select_refs);
$myref = "SELECT * FROM engmn_user WHERE ref_code = '$myrefid'";
$myrefs = mysql_query($myref);
$myrefss = mysql_fetch_array($myrefs);
$sql_select222 = "SELECT * FROM engmn_withdraws WHERE user_id = '$id' ORDER BY id DESC";
$result2 = mysql_query($sql_select222);

$refcount = "SELECT COUNT(*) FROM  engmn_user WHERE ref_id = '$ref_code'";
$res = mysql_query($refcount);
$count = mysql_fetch_array($res);
$count = $count[0];
$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
$url = explode('?', $url);
$url = $url[0];
    
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
	    <script src="../script/jquery-latest.min.js"></script>
    <script src="../script/odometr.js"></script>
    <script src="../script/js.cookie.js"></script>
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
	<title><?=$sitename?> | Реферальная программа</title>
	<meta name="description" content="Реферальная программа">
	<link rel="canonical" href="<?=$url?>/profile">
	<meta property="og:title" content="<?=$sitename?> | Реферальная программа"> 
    <meta property="og:type" content="Website">
    <meta property="og:url" content="<?=$url?>/profile">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:image" content="/img/on.png">
    <meta property="og:description" content="Реферальная программа">
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
            url: 'bots.php',
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
            url: 'core.php',
            timeout: 10000,
            success: function(data) {
				var obj = jQuery.parseJSON(data);
                $("#table").prepend(obj.gamito);
				$('#table').children().slice(1).remove();
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
            url: 'offline.php',
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
			<img src="<?=$ava?>" alt="user" class="left_img">
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
						</span> Выход					</a>
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
<script defer="" src="../js/modals.js?ver=1578148046"></script>

<script src="/js/rooms/modal.js?ver=1578148046"></script>
<script defer="" src="/js/newPopUp.js?1578148046"></script>
<style>
	.last_off_title {
		margin-bottom: 40px;
	}
	time.last_cons_content_txt {
		justify-content: center;
	}
	@media screen and (max-width: 670px) {
		p.last_cons_content_txt{-webkit-transform: translateX(-35px);transform: translateX(-35px);}
		p.last_cons_content_txt.name_ref{width: 200px;}
	}
</style>
<div class="flex" style="justify-content: center;">


			<section class="ref-prog">
				<h2 class="last_off_title length bottom">Реферальная программа</h2>
					<article class="ref-prog-art">
						<h3 class="ref-prog-art_title">Рекламные материалы</h3>
						<p class="ref-prog-art_txt">Скопируйте вашу реферальную ссылку, <br>
						Приглашайте друзей и зарабатывайте!</p>

			
						<p class="ref-prog-art_txt ref-prog-art_txt__top width">Получайте по <b><?=$ref_per?>%</b><!--a href="#" class="ref-prog-art_link">( Увеличить )</a--> от пополнений баланса рефералов ( У вас: <b><?=$count?> чел.</b> )</p>
						<div class="ref-prog_wrap">
							<label for="link" class="ref-prog-label">
								
								<span class="ref-prog-art_title">Ваша ссылка</span>
								<input placeholder="<?=$hprotocol?>://<?=$linksite?>?i=<?=$ref_code?>" value="<?=$hprotocol?>://<?=$linksite?>?bonus=<?=$ref_code?>" type="text" name="link" id="" class="ref-prog-label_inp">
							</label>
							
						</div>
					</article>
			</section>

			<section class="ref-prog ">
				<h2 class="last_off_title bottom grey">Реферер</h2>

				
				<article class="ref-prog-art moneyUser">
						<h3 class="ref-prog-art_title blue">Активация реферального бонуса</h3>
						<?php 
							if ( empty($myrefid) ){
?>							
						<p class="ref-prog-art_txt widthActive">Введите реферальный код и получите <span class="ref-prog-art__bold">+3 D.</span> на счет аккаунта.</p>
							<input required autocomplete="off" maxlength="10" minlength="5" value="" type="text" class="cons_form_ass_label_inp ref_input" id="refcode" placeholder="Введите реф. код">
							<div class="ref-prog-art__cont">
								<button class="cons_system_block_btn update_refcode" onclick="activateRefCode();return false;">Получить</button > 
								<p class="ref-prog-art_descr">*Свой реф код вводить запрещено</p>
							</div>
<?						}else{
		if ( !empty($myrefss['vk_name'] )){

				$refslogin = $myrefss['vk_name'];

		}else{

			$refslogin = $myrefss['login'];
		}
						?>		
							<p class="ref-prog-art_txt">Активировать реферальный код можно только <br><span class="ref-prog-art__bold">один</span> раз.</p>
							<figure class="ref-prog-fig">
							
						 
<?
	if ( empty($myrefss['img']) ){
									?>
								<img src="../img/User.png" alt="Avatar" class="ref-prog-fig_img">
								<? } else { ?>
								
								<img src="<?=$myrefss['img']?>" alt="Avatar" class="ref-prog-fig_img">
								
								<? }?>
								<figurcaption style="text-decoration:none" class="ref-prog-fig_caption"><span><a style="text-decoration:underline" target="_blank" href="user/id/<?=$myrefss['id']?>"><?=$refslogin?></a></span></figurcaption>
	<? } ?>
							</figure>
							<p class="ref-prog-art_txt top width">Если вы заметили баг/ошибку, то обратитесь 
								 в <a href="<?=$site_support?>">тех. поддержку</a></p>
				
				</article>

					
					
			</section>

	

 		
	<section class="ref_pr_table">
			<h2 class="last_off_title" style="margin-bottom: 30px;">Ваши рефералы</h2>
			<table id="example1" class="last_cons_head new_head" style="width:100%;    display: inline-table;">
                                <thead>
                                    <tr class="ref_pr_table_head">

                                        <th style="width:20%" class="ref_pr_table_head">ID</th>
                                        <th style="width:20%" class="ref_pr_table_head">Дата</th>
                                        <th style="width:40%" class="ref_pr_table_head">Логин</th>


                                    </tr>
                                </thead>
                                <tbody class="">
                                      <?php 
while($row = mysql_fetch_array($result_ref)) {
 
$id_ref = $row['id'];
$date = $row['date_reg'];
$log_ref = $row['login']; 
echo "<tr class='text-center odd' role='row'><td class='sorting_1'><center>$id_ref</center></td><td><center>$date</center></td><td style='text-transform: capitalize!important;'><center><a style='text-decoration:underline' href='user/id/$id_ref'>$log_ref</a></center></td></tr>";

  }
  
                                      ?>
      
                                      </tbody> 
                            </table>


		</section> 
	</div>


<script async="" src="/js/body.js?version=1578148047"></script>
<script async="" src="/js/copy.js"></script>
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
<div at-magnifier-wrapper=""><div class="at-theme-light"><div class="at-base notranslate" translate="no"><div class="Z1-AJ" style="top: 0px; left: 0px;"></div></div></div></div><div class="mallbery-caa" style="z-index: 2147483647 !important; text-transform: none !important; position: fixed;"></div></body></html>