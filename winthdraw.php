<?php
session_start();

header('X-Frame-Options:SAMEORIGIN');
header('X-Content-Type-Options:nosniff');
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
          $social_link = $row['social'];
          $is_admin = $row['admin'];
          $is_ban = $row['ban'];
          $ref_code = $row['ref_code'];
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
			

		
				$sql_select5 = "SELECT * FROM engmn_withdraws WHERE user_id = $id ORDER BY id DESC LIMIT 5";
$result5 = mysql_query($sql_select5);
 
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

	<?=$snow?><link rel="prefetch" href="/img/BG_footer.png">
	<!-- <link rel="manifest" href="/manifest.json"> -->
	<link rel="dns-prefetch" href="https://www.youtube.com/">
	<!--link rel="prerender" href=""-->
	<link rel="shortcut icon" href="/fav.ico" type="image/x-icon">
	<title><?=$sitename?> | Вывод средств</title>
	<meta name="description" content="Вывод средств">
	<link rel="canonical" href="<?=$url?>/profile">
	<meta property="og:title" content="<?=$sitename?> | Вывод средств"> 
    <meta property="og:type" content="Website">
    <meta property="og:url" content="<?=$url?>/profile">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:image" content="/img/on.png">
    <meta property="og:description" content="Вывод средств">
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
    position: relative;
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
<script defer="" src="../js/modals.js?ver=1577994533"></script>

<script src="/js/rooms/modal.js?ver=1577994533"></script>
<script defer="" src="/js/newPopUp.js?1577994533"></script>
				
		<style>.admibs-none{display: none;}</style>
			<div class="flex">
	
		<style>
			.last_cons_head,.last_cons_content{
				text-align: center;
			}
		</style>
		
		<script src="../script/script.js"></script>
<script src="../script/jquery.bundle.js"></script>	 
<style>
   .round {
    border-radius: 100px; /* Радиус скругления */
    border: 3px solid green; /* Параметры рамки */
    box-shadow: 0 0 7px #666; /* Параметры тени */
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
				<script>
                    function withdraw() {
                        if ($('#WithdrawSize').val() == '' || $('#walletNumber').val() == '' || $('#hide_search').val() == '') {
                            $('#error_withdraw').show();
                            return $('#error_withdraw').html('Заполните все поля');
                        }
                        $.ajax({
                            type: 'POST',
                            url: 'action.php',
                            beforeSend: function() {
                                $('#withB').addClass('disabled');
                                $('#withB').html('<div class="loader" style="height:23px;width:23px"></div>');


                            },
                            data: {
                                type: "withdraw",
                                sid: Cookies.get('sid'),
                                system: $('#hide_search').val(),
                                size: $('#WithdrawSize').val(),
                                wallet: $('#walletNumber').val()
                            },
                            success: function(data) {
                                $('#error_withdraw').hide();
                                $('#succes_withdraw').hide();

                                $('#withB').removeClass('disabled');
                                $('#withB').html('Выплата');
                                var obj = jQuery.parseJSON(data);
                                if ('success' in obj) {

                                    $('#succes_withdraw').show();
                                    $('#emptyHistory').hide();
                                    var tt = $('#withdrawT').html();
                                    $('#withdrawT').html(obj.success.add_bd + tt);
                                    updateBalance(obj.success.balance, obj.success.new_balance);
                                }

                                if ('error' in obj) {
                                    $('#error_withdraw').show();
                                    return $('#error_withdraw').html(obj.error.text);
                                }

                            }
                        });
                    }


                    function withdrawSelect() {
                        $('#cardLL').hide();
                        $('#walletNumber').val('');
                        var e = $('#hide_search').val();
                        if (e >= 5 && e <= 8) {
                            $('#nameWithdraw').html('Номер телефона:');
                            $('#walletNumber').attr('placeholder', '');
                        }
                        if (e >= 1 && e <= 4) {
                            if (e == 4) {
                                $('#walletNumber').attr('placeholder', '+79XXXXXXXXX');
                                $('#limitsW').html('От <b>50</b> до <b>75000</b> рублей за одну выплату');
                            }
                            if (e == 2) {
                                $('#walletNumber').attr('placeholder', 'P1000000');
                                $('#limitsW').html('От <b>50</b> до <b>75000</b> рублей за одну выплату');
                            }
                            if (e == 1) {
                                $('#walletNumber').attr('placeholder', '410011499718000');
                                $('#limitsW').html('От <b>50</b> до <b>75000</b> рублей за одну выплату');
                            }
                            if (e == 3) {
                                $('#walletNumber').attr('placeholder', 'R123456789000');
                                $('#limitsW').html('От <b>50</b> до <b>75000</b> рублей за одну выплату');
                            }
                            $('#nameWithdraw').html('Номер кошелька:');
                        }
                        if (e >= 9) {
                            $('#nameWithdraw').html('Номер карты:');
                            $('#cardLL').show();

                            if (e == 10) {
                                $('#walletNumber').attr('placeholder', '512107XXXX785577');
                                $('#limitsW').html('От <b>1200</b> до <b>75000</b> рублей за одну выплату');
                            } else {
                                $('#walletNumber').attr('placeholder', '412107XXXX785577');
                                $('#limitsW').html('От <b>1200</b> до <b>75000</b> рублей за одну выплату');
                            }
                        }
                    }



                    function getLasterMyWithdraws() {
                        /*if ($('#withdrawT').html() !== ""){
                            return;
                        }*/
                        $.ajax({
                            type: 'POST',
                            url: 'action.php',
                            data: {
                                type: "getLasterMyWithdraws",
                                sid: Cookies.get('sid')
                            },
                            beforeSend: function(data) {
                                $('#loadmyd').show();
                            },
                            success: function(data) {
                                $('#loadmyd').hide();
                                var obj = jQuery.parseJSON(data);

                                if ('success' in obj) {
                                    $('#withdrawT').html(obj.success.text);
                                    return $('#gnext').html(obj.success.text1);
                                } else {
                                    $('#loadmyd').html("Ошибка");
                                }


                            }
                        });
                    }


                    function removeWithdraw(id) {
                        $.ajax({
                            type: 'POST',
                            url: 'action.php',
                            data: {
                                type: "removeWithdraw",
                                sid: Cookies.get('sid'),
                                id: id
                            },
                            success: function(data) {
                                var obj = jQuery.parseJSON(data);
                                if ('success' in obj) {
                                    $('#' + id + '_his').fadeOut('slow');
                                    updateBalance(obj.success.balance, obj.success.new_balance);
                                }
                            }
                        });
                    }


                    function showWithdrawHistory(start) {

                        $.ajax({
                            type: 'POST',
                            url: 'action.php',
                            data: {
                                type: "withdrawHistory",
                                sid: Cookies.get('sid'),
                                start: start
                            },
                            success: function(data) {
                                if (data == 'null') {
                                    $("#withdrawHistoryLoad").hide();
                                    return $("#gnext").hide();
                                }
                                var obj = jQuery.parseJSON(data);
                                if ('success' in obj) {
                                    $("#withdrawHistoryLoad").hide();
                                    var tt = $('#withdrawT').html();
                                    $('#withdrawT').html(tt + obj.success.add);
                                    $('#gnext').html(obj.success.next);
                                }
                            }
                        });

                    }

                </script>		
    <script src="../script/jquery-latest.min.js"></script>
    <script src="../script/odometr.js"></script>
    <script src="../script/js.cookie.js"></script>
    <script src="../ajax/functions.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=renderRecaptchas&render=explicit" async defer></script>
	<style>

.big {
  font-size: 1.2em;
}


/* Custom dropdown */
.custom-dropdown {
  position: relative;
  display: inline-block;
  vertical-align: middle;
  margin: 10px; /* demo only */
}

.custom-dropdown select {
  cursor:pointer;
  background-color: #2980b9;
  color: #fff;
  font-size: inherit;
    font-family: ProximaNova-Regular;
  padding: .5em;
  padding-right: 2.5em;	
  border: 0;
  margin: 0;
  border-radius: 3px;
  text-indent: 0.01px;
  text-overflow: '';
  -webkit-appearance: button; /* hide default arrow in chrome OSX */
}

.custom-dropdown::before,
.custom-dropdown::after {
  content: "";
  position: absolute;
  pointer-events: none;
}

.custom-dropdown::after { /*  Custom dropdown arrow */
  content: "\25BC";
  height: 1em;
  font-family: ProximaNova-Regular;
  font-size: .625em;
  line-height: 1;
  right: 1.2em;
  top: 50%;
  margin-top: -.5em;
}

.custom-dropdown::before { /*  Custom dropdown arrow cover */
  width: 2em;
  right: 0;
  top: 0;
  bottom: 0;
  border-radius: 0 3px 3px 0;
}

.custom-dropdown select[disabled] {
  color: rgba(0,0,0,.3);
}

.custom-dropdown select[disabled]::after {
  color: rgba(0,0,0,.1);
}

.custom-dropdown::before {
  background-color: rgba(0,0,0,.15);
}

.custom-dropdown::after {
  color: rgba(0,0,0,.4);
}
</style>
<section class="cons">
			<h2 class="last_off_title">
				Вывод средств			</h2>

			
  
			<form id="wind" method="POST" action="" class="cons_form">
				<aside class="cons_form_ass">
					<label for="cons" class="cons_form_ass_label">

						<span id="success" class="cons_form_ass_label_span green"></span><span class="cons_form_ass_label_span">
							Введите сумму 
						</span>
						<input maxlength="5" oninput="this.value = this.value.replace(/\D/g, '')" type="text" placeholder="Введите от 50 D." name="money" id="WithdrawSize" class="cons_form_ass_label_inp setMoney">
					</label>
					<label for="cons" class="cons_form_ass_label">
						<span class="cons_form_ass_label_span">
							Введите ваш кошелёк
						</span>
						<input type="text" placeholder="Например: 79000000000" name="wallet" id="walletNumber" class="cons_form_ass_label_inp">

					</label>
					<label for="cons" class="cons_form_ass_label">
						<span class="cons_form_ass_label_span">
							Сумма к получению
						</span>
						<p class="cons_form_ass_label_txt">
							<span id="result" >50.00</span>
							<span class="cons_form_ass_label_txt_span">
								D.
							</span>
						</p>
					</label>
				
				</aside>
	
		<section class="cons_system cons_system__width">
					<h3 class="cons_system_title">
						Выберите систему вывода
					</h3>
					<div class="cons_system_form">

				<select autocomplete="off" class="custom-dropdown big" id="hide_search" onchange="withdrawSelect()" tabindex="-1" aria-hidden="true">
                                <optgroup label="Платежные системы">
                                    <option value="4">Qiwi</option>
                                    <option value="2">Payeer</option>
                                    <option value="3">WebMoney</option>
                                    <option value="1">Яндекс.Деньги</option>
                                </optgroup>
                                <optgroup label="Мобильная связь (Россия)">
                                    <option value="5">Билайн</option>
                                    <option value="6">Мегафон</option>
                                    <option value="7">МТС</option>
                                    <option value="8">Теле 2</option>
                                </optgroup>
                                <optgroup label="Банковские карты (Россия)">
                                    <option value="9">VISA</option>
                                    <option value="10">MASTERCARD</option>
                                </optgroup>
                            </select>
					</div>
					<input type="hidden" value="0" id="system" name="sys">
					<input type="hidden" value="b76a2603b3cdddc9119b709ac28a57d1e879a422f9346a2ef88e5d6ef0ea144e" name="csrf" id="csrf">
					
					<input type="hidden" id="auto" value="1">
					<input type="hidden" id="lvl_wind" value="5">
				
					<div class="cons_system_block"><button id="withB" onclick="createwithdraw();return false;" class="cons_system_block_btn" style="width:350px;height: 100px;box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3);margin-left:25%;font-size:25px;">Вывести</button> 
					
					 
					
					<p class="cons_system_block_btn_txt">
					
						*Вывод средств происходит до 24 часов
						
					</p>

  
				</section>
				<div class="cons_system_block" style="margin-left: 32.5%;"> 
			
					</center></div>
					<div class="cons_system_block">
				
					</div>
			</form> 
			<style>
			fsize
			{
font-size: 3px;
}
</style>
			

</section>			
		<section class="last_cons">
			<h2 class="last_off_title">
				Последние выводы:			</h2>
	
			<table class="last_cons_flex">
	
	<thead style="margin-bottom: 20px;">
		<tr class="payouts_head">
			<th class="payouts_head_txt spec" style="width: 100px;">Сумма</th>	
			<th class="payouts_head_txt" style="width: 280px;">Кошелёк</th>
			<th class="payouts_head_txt payouts_summ" style="width: 100px;">Система</th>
			<th class="payouts_head_txt none none-tablet" style="width: 100px;">Статус</th>
		
		</tr>
	</thead>
	<tbody class="payouts_tb">
	
	   <?php 
while($row = mysql_fetch_array($result5)) {
  $user_id = $row['user_id'];
  $ps = $row['ps'];
  $sum = $row['sum'];
  $wallet = $row['wallet'];
  $fake = $row['fake'];
  $statusw = $row['status'];
  if( $statusw == '0' ){
				
				$statusw = 'Ожидание';
				$stcolor = 'orange';
				
				
			}elseif ( $statusw == '1' ){
				
				$statusw = 'Выплачено';
				$stcolor = 'green';
				
				
			}elseif ( $statusw == '2' ){
				
				$statusw = 'Отклонено';
				$stcolor = 'red';
				
				
				
			}
  $wallett = substr($wallet, 0, -5);
 echo "<tr><td style='width: 100px;'><center>$sum</center></td><td style='width: 100px;'><center>$wallett*****</center></td><td style='width: 100px;'><center><img src='img/$ps.png'></center></td><td style='width: 100px;'><center><font color='$stcolor'>$statusw</font></center></td></tr>";

}
?>

	</tbody>
</table>

					

							
		</section>
	</div>



<script async="" src="/js/show-number.js"></script>
<script async="" src="/js/payoutInf.js?ver=1578072741"></script>
<script src="/js/core.js?ver=1578072741"></script> 

