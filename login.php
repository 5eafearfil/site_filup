<?php
session_start();
header('X-Frame-Options:SAMEORIGIN');
header('X-Content-Type-Options:nosniff');
header('X-Frame-Options: DENY');
header("X-XSS-Protection: 1; mode=block");

require("inc/bd.php");
require("inc/site_config.php");

if ( $_COOKIE['year'] != "true" ){

    setcookie("year", "false", time()+60*60*24*30);

}

if($_SESSION['login'] != '') {
  header('Location: /');
}

$refid = $_SESSION['ref'];
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
$ava = $user['photo_big'];
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
          $datas = date("d.m.Y");      
          $data = $datas;
          $ip = $_SERVER['REMOTE_ADDR'];
          $passgen = rand(100,1000) * rand(1,100) * rand(1,100) * 100;
            $_SESSION['login'] = 1;
            $insert_sql1 = "INSERT INTO `engmn_user` (`id`,`vk_name`, `pass`, `balance`, `img`, `hash`, `social`, `ip`, `ref_id`, `date_reg`) 
    VALUES ('NULL','$name','', '$bonus_reg', '$ava', '$hashq', '$hashq', '$ip', '$refid', '$data');";
mysql_query($insert_sql1);
            
            $_SESSION['hash'] = $hashq;
            $_SESSION['login'] = 1;
            $home_url = 'http://'.$_SERVER['HTTP_HOST'] .'/';
            header('Location: ' . $home_url);
    
        }
        }
       if($logc == 1) {
         if($hashq != '') {
         $selecter = "SELECT * FROM engmn_user WHERE hash = '$hashq'";
         $result3 = mysql_query($selecter);
         $row1 = mysql_fetch_array($result3);
         if($row1)
        {   
        $hashlog = $row1['hash'];
         
        }
         
          $_SESSION['hash'] = $hashlog;
           $_SESSION['login'] = 1;
          $home_url = 'http://'.$_SERVER['HTTP_HOST'] .'/';
            header('Location: ' . $home_url);
       }
       }
?>
<?
$workdata = explode('-', $workdata);
$year = $workdata[0];
$month = $workdata[1];
$day = $workdata[2];


$workdata = $month . ' ' . $day . ', ' . $year;  
?>
<script>function DaysCounter(){d0 = new Date('<?php echo $workdata;?>');d1 = new Date();dt = (d1.getTime() - d0.getTime()) / (1000*60*60*24);document.write(Math.round(dt));}</script>
<?


require("inc/site_config.php"); 
  ?>







<!DOCTYPE html>
<html lang="Ru-ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
      
    <link rel="preconnect" href="/public/header.min.css?1577887206"  crossorigin="anonymous">
    <link rel="preconnect" href="/public/header-short.min.css?1577887206"  crossorigin="anonymous">

       
      
    <link rel="stylesheet" href="/public/header.min.css?1577887206"> 
    <link rel="stylesheet" href="/public/check.css?1577887206"> 

   

    <link rel="stylesheet" href="/public/header-short.min.css?1577887206" media="only screen and (max-width: 670px)">
    <link rel="stylesheet" href="/public/newMenu.css?1577887206"  media="(min-width: 0px) and (max-width: 1024px)">

    <link rel="stylesheet" href="/public/tablets.css?1577887206" media="(min-width: 670px) and (max-width: 1024px)">
    <link rel="stylesheet" href="/public/mini-desktop.css?1577887206" media="(min-width: 1024px) and (max-width: 1366px)">
        
    <link rel="preconnect" href="font/ProximaNova-Semibold.ttf" crossorigin="anonymous">
    <link rel="preconnect" href="ProximaNova-Regular.ttf" crossorigin="anonymous">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">





    <link rel="prefetch" href="/img/BG_footer.png">
    <!-- <link rel="manifest" href="/manifest.json"> -->
    <link rel="dns-prefetch" href="https://www.youtube.com/">
    <!--link rel="prerender" href=""-->
    <link rel="shortcut icon" href="/fav.ico" type="image/x-icon">
    <title><?=$sitename?> | Азартная игра с выбором шанса победы. Моментальные выплаты. Уникальная система уровней</title>
    <meta name="description"  content="Азартная игра с выводом реальных денег! Выберите шанс победы и выигрывайте рубли бесплатно каждый день. Киньте кости и получите бонус на сайте <?=$sitename?> уже сегодня! С нами уже более <?=$countusers?> пользователей" />
    <link rel="canonical" href="https://<?=$hprotocol?>://<?=$linksite?>:80/">
    <meta property="og:title" content="<?=$sitename?> - Азартная игра с выбором шанса победы. Моментальные выплаты. Уникальная система уровней"> 
    <meta property="og:type" content="Website">
    <meta property="og:url" content="https://<?=$hprotocol?>://<?=$linksite?>:80/">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:image" content="/img/on.png">
    <meta property="og:description" content="Азартная игра с выводом реальных денег! Выберите шанс победы и выигрывайте рубли бесплатно каждый день. Киньте кости и получите бонус на сайте <?=$sitename?> уже сегодня! С нами уже более <?=$countusers?> пользователей">
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
   <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  
       
</head>
<body>
  <script defer src="/js/index.js?ver=1577887206"></script>
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
 <script src="../script/jquery-latest.min.js"></script>
    <script src="../script/odometr.js"></script>
    <script src="../script/js.cookie.js"></script>
    <script src="../ajax/functions.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=renderRecaptchas&render=explicit" async defer></script>


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
        
        <style>
        .text {
    user-select: none;
}
</style>
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
                $("#table").prepend(obj.game);
                $('#table').children().slice(12).remove();
                $("#gm_users_online").html(obj.online);
                $("#gm_users_total").html(obj.ucount);
                $("#gm_bets_total").html(obj.gcount);
                $("#gm_bets_amount").html(obj.betsum);
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
<script>
function login() {
                                if ($('#userLogin').val().length < 4) {
                                    $('#error_enter').css('display', 'block');
                                    return showModal('Логин от 4 символов', 'red');//$('#error_enter').html('Логин от 4 символов');
                                }
                                if ($('#userPass').val() == '') {
                                    $('#error_enter').css('display', 'block');
                                    return showModal('Введите пароль', 'red');//$('#error_enter').html('Введите пароль');
                                }

                                if ($('#g-recaptcha-response').val() == '') {
                                    $('#error_enter').css('display', 'block');
                                    return showModal('Поставьте галочку', 'red');//$('#error_enter').html('Поставьте галочку');
                                }
                                $.ajax({
                                    type: 'POST',
                                    url: 'action.php',
                                    beforeSend: function() {
                                        
                                        $('#butEnter').html('<div class="loader" style="height:23px;width:23px"></div>');
                                        $('#butEnter').addClass('disabled');
                                        $('#error_enter').hide();
                                        
                                    },
                                    data: {
                                        type: "login",
                                        login: $('#userLogin').val(),
                                        rc: $('#g-recaptcha-response').val(),
                                        pass: $('#userPass').val()
                                    },
                                    success: function(data) {
                                        $('#butEnter').html('Войти');
                                        $('#butEnter').removeClass('disabled');
                                

                                        var obj = jQuery.parseJSON(data);
                                        if ('success' in obj) {
                                            Cookies.set('sid', obj.success.sid, { expires: 365,path: '/',secure:true });
                                            Cookies.set('login', $('#userLogin').val(), { expires: 365,path: '/',secure:true });
                                            window.location.href = '';
                                            // return false;
                                        }else{
                                            grecaptcha.reset();
                                       
                                        showModal(obj.error, 'red');//$('#error_enter').html(obj.error);
                                        $('#error_enter').css('display', 'block');
                                        }


                                    }
                                });
                            }
                            
                            function register() {
                                if ($('#userRegsiter').val().length < 4) {
                                    $('#error_register').css('display', 'block');
                                    return $('#error_register').html('Логин от 4 символов');
                                }
                                if ($('#userPassRegister').val() == '') {
                                    $('#error_register').css('display', 'block');
                                    return $('#error_register').html('Введите пароль');
                                }
                                if ($('#userPassRegister1').val() !== $('#userPassRegister').val()) {
                                    $('#error_register').css('display', 'block');
                                    return $('#error_register').html('Пароли не совпадают');
                                }
                                
                                if($('#CheckBox_9').prop('checked')) {
    
                                } else {
                                    $('#error_register').css('display', 'block');
                                                                    return $('#error_register').html('Соглашение');
                                }
                                

                                if ($('#g-recaptcha-response-1').val() == '') {
                                    $('#error_register').css('display', 'block');
                                    return showModal('Поставьте галочку', 'red');//$('#error_register').html('Поставьте галочку');
                                }
                                $.ajax({
                                    type: 'POST',
                                    url: 'action.php',
                                    beforeSend: function() {
                                        $('#butRegister').html('<div class="loader" style="height:23px;width:23px"></div>').addClass('disabled');
                                        $('#error_register').hide();
                                    },
                                    data: {
                                        type: "register",
                                        login: $('#userRegsiter').val(),
                                        ref: Cookies.get('ref'),
                                        rc: $('#g-recaptcha-response-1').val(),
                                        pass: $('#userPassRegister').val()
                                    },
                                    success: function(data) {
                                        $('#butRegister').html('Зарегистрироваться').removeClass('disabled');
                                        $('#error_register').hide();
                                        var obj = jQuery.parseJSON(data);
                                        if ('success' in obj) {
                                            Cookies.set('sid', obj.success.sid, { expires: 365,path: '/',secure:true });
                                            Cookies.set('login', $('#userLogin').val(), { expires: 365,path: '/',secure:true });
                                            window.location.href = '';
                                            // return false;
                                        }else{
                                            grecaptcha.reset(1);
                                       
                                        showModal(obj.error, 'red');//$('#error_register').html(obj.error);
                                        $('#error_register').show();
                                        }


                                    }
                                });
                            }
                        
                        
                        </script>
                    
        </header>

<div class="head-mobaile">
    
    <a href="/" class="head_logo_txt"><?=$sitename?></a>

    

</div>





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
<script>
function wait(ms) {
  let current_date = +new Date();
  while (current_date + ms > +new Date()) {}
}
</script>


<main class="main">
    
    <div id="loginBlock" style="z-index: 1;">
    <form method="POST" action="/" class="auth">
            <h2 class="auth_title">
                Вход            </h2>
            <span class="auth_psevdo">
            <input id="userLogin" type="text" required value="" maxlength="20" name="login" class="auth_inp bottom" placeholder="Введите логин" aria-label="Введите логин">
            </span>
            <span class="auth_psevdo_alt">
            <input  id="userPass" required value="" name="password" type="password" class="auth_inp" placeholder="Введите пароль" aria-label="Введите пароль">
            </span>

        
              <script src="//ulogin.ru/js/ulogin.js"></script>
<div id="uLogin" data-ulogin="display=panel;theme=flat;fields=photo_big,first_name,last_name;mobilebuttons=0;providers=vkontakte;hidden=;redirect_uri=http%3A%2F%2F<?=$_SERVER['HTTP_HOST']?>/login.php;"></div>                  
                            
            <a id="butEnter" class="auth_btn" style="box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3); color:white" onclick="login_default()">Войти</a>
                                <a id="loadEnter" class="btn btn-primary btn-block disabled" style="box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3); display:none">
                                    <div class="loader"></div>
                                </a>
                               

    <a id="regOpen" style="color: black;font-size: 20px;text-decoration: underline;" onclick="$('#RegBlock').toggle();$('#loginBlock').toggle();">Регистрация</a>
        </form>

    </div>
     <div id="RegBlock" style="display: none">
    <form method="POST" action="/" class="auth"> 
            <h2 class="auth_title">
                Регистрация         </h2>
            <span class="auth_psevdo">
            <input id="userRegsiter" type="text" required value="" maxlength="20" name="login" class="auth_inp bottom" placeholder="Введите логин" aria-label="Введите логин">
            </span>
            <span class="auth_psevdo_alt">
            <input  id="userPassRegister" required value="" name="password" type="password" class="auth_inp" placeholder="Введите пароль" aria-label="Введите пароль">
            </span>
            <span class="auth_psevdo_alt">
            <input  id="userPassRegister1" required value="" name="password" type="password" class="auth_inp" placeholder="Повторите пароль" aria-label="Повторите пароль">
            </span>
            <div class="input-item"><center><input type="checkbox" id="CheckBox_9"><label style="text-transform: unset;" for="CheckBox_9">Cоглашаюсь с <b><a href="/terms" target="_blank" rel="noopener noreferrer" style="color: #764cfd;">Пользовательским соглашением</a></b></label></center></div>

            <a id="butRegister" class="auth_btn" style="box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3); color:white" onclick="register_default()">Зарегистрироваться</a>
                                <a id="loadEnter" class="btn btn-primary btn-block disabled" style="box-shadow: 0 5px 23px 0 rgba(0, 125, 255, 0.3); display:none">
                                    <div class="loader"></div>
                                </a>
                                

            <a id="regOpen" style="color: black;font-size: 20px;text-decoration: underline;" onclick="$('#RegBlock').toggle();$('#loginBlock').toggle();">Авторизация</a>
        </form>
          
        </div>
    
<?php 
if($_COOKIE["year"] != 'true'){
    ?>
<div class="modal-overflow modal_info">
        <div class="modal-limitation">
            <figure class="modal-limitation-head">
                <article class="modal-limitation-head_art">
                    <p class="modal-limitation-head_title"><?=$sitename?></p>
                    <a href="<?=$group?>" class="modal-limitation-head_link">Мы Вконтакте</a>
                </article>
                <p class="modal-limitation-head_descr"><?=$sitename?> - Это Азартная игра с выбором шанса победы.
        Здесь вы можете попробовать свою удачу в 
        нескольких режимах игры и посоревноваться с 
        другими игроками.</p>
            </figure>
            <figure class="modal-limitation-cont">
                <button class="modal-limitation-cont_btn years" id="year18">Мне есть 18</button>
                <a href="https://google.com/" class="modal-limitation-cont_btn modal-limitation-cont_btn_exit">Покинуть сайт</a>
            </figure>
            <p class="modal-limitation_txt">При заходе на сайт вы принимаете правила <br>
                <a href="/terms" class="modal-limitation_terms">Лицензионного соглашения</a>
            </p>
            <p class="modal-limitation_text">*Услуги сайта относятся к аттракционным и позволяют получить психо-эмоциональное удовлетворение для пользователя без каких-либо рисков.</p>
        </div>
        </div>

          <script src="/js/app_cookie.js"></script>
<? }?>
        <section class="index">
            <h2 class="index_title">Добро пожаловать на <?=$sitename?>!</h2>
            <p class="index_txt">Это азартная игра в которой вы можете
        выиграть реальные деньги. <br>
        Выберите шанс победы и начните игру!</p>
            <div class="index_player">
                <iframe rel="prefetch" title="A video guide of site" class="frame" src="https://www.youtube.com/embed/<?=$youtubevideo?>" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        
            <aside class="index_stat">
                <p class="index_stat_txt">
                    Пользователей                   <span id=gm_users_total class="index_stat_number">
                                    </span>
                </p>
                <p class="index_stat_txt">
                    Всего игр                   <span id=gm_bets_total class="index_stat_number">
                                        </span>
                </p>
                <p class="index_stat_txt">
                    Онлайн                  <span id=gm_users_online class="index_stat_number">
                                        </span>
                </p>
                <p class="index_stat_txt">
                    Сумма ставок                    <span   class="index_stat_number">
                        <span  id=gm_bets_amount></span> D.
                    </span>
                </p>
            </aside>
                <div class="index__wraps">
                   
                   
                </div>
        </section>
    </main>

<script defer src='https://www.google.com/recaptcha/api.js'></script>


        

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

        


            


<div class="wrap_footer">
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
    

  </footer>
          <script defer src="/js/metrica.js"></script>
      <noscript><div><img src="https://mc.yandex.ru/watch/48692534" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- Footer -->
 

 

<script async src="/js/console.js"></script>
<noscript><link rel="stylesheet" href="/public/deferred.css"></noscript>
<script defer src="../js/js-packed.js"></script>
<script defer src='/js/newPopUp.js?1577887206'></script>

<div id="Focus"></div>
</body>
      