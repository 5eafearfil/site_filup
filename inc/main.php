<?php
require ("config.php");
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
          $is_chat_ban = $row['chat_ban'];
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

    $sql_selectss = "SELECT * FROM engmn_games WHERE user_id='$id' AND mode='0' ORDER BY id DESC LIMIT 1";
$resultss = mysql_query($sql_selectss);
$rowss = mysql_fetch_array($resultss);
    if ( $rowss ){
        
        $lastbet = $rowss['number'];
        $lastbet = $lastbet / 10000;
        $lastbet = round($lastbet, 2);
        
    }

?>
<?php   
  if(empty($_SESSION['access'])) {
    ?>
      <?php } ?>



<html lang="Ru-ru"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
     
     

    <script src="../script/jquery-latest.min.js"></script>
    <script src="../script/odometr.js"></script>
    <script src="../script/js.cookie.js"></script>
    <script src="../ajax/functions.js"></script>
    <script>function DaysCounter(){d0 = new Date('<?php echo $workdata;?>');d1 = new Date();dt = (d1.getTime() - d0.getTime()) / (1000*60*60*24);document.write(Math.round(dt));}</script>
    
    
    
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



     
<?=$snow?>
    <link rel="prefetch" href="/img/BG_footer.png">
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
    <meta property="og:image" content="/img/on.png">
    <meta property="og:description" content="Азартная игра с выводом реальных денег! Выберите шанс победы и выигрывайте рубли бесплатно каждый день. Киньте кости и получите бонус на сайте <?=$sitename?> уже сегодня! С нами уже более <?=$countusers?> пользователей">
    <meta name="keywords" content="выиграть реальные деньги без вложений, кости, кидать кости, игра на рубли, выбор шанса победы, выиграть деньги онлайн, рулетка, азартная игра, казино">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#A33EFF">
    <script src="/js/jq.js"></script>
     
          <!-- END STACK CSS-->
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
                                  //bets 
                                                        function betMin() {
                                    var nwin = $('#MinRange').html();
                                    var win = ((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2);
                                    var sum = $('#BetSize').val();
                                    var coef = win - sum;
$.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
                    $('#betLoad').css('display', '');
  $('#error_bet').css('display', 'none');
   $('#succes_bet').css('display', 'none');
                                        },  
                                                                                data: {
                                                                                    type: "minbet",
                                                                                  win: coef,
                                                                                  sum: sum,
                                                                                   nwin: nwin,
                                                                                  per: $('#BetPercent').val()
                                                                                   
                                                                                    
                                                                                },
                                        success: function(data) {
                                          $('#betLoad').css('display', 'none');
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                                               
                                               
                    $('#error_bet').css('display', 'none');                            
                $('#succes_bet').show();                                                                        $('#succes_bet').html('<div class="tn-box tn-box-color-1"><p>Выиграли ' +obj.fullwin+ '</p><div class="tn-progress"></div></div>');
                                              $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance);
                                              $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
$('#hashBet').html(obj.hash); 
                                                                return 
                                            }else{
                                              $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance); 
                $('#succes_bet').css('display', 'none');                                showModal(obj.error, 'red'); //$('#error_bet').html(obj.error);
                                              $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
$('#hashBet').html(obj.hash); 
                                                                return $('#error_bet').css('display', '');
                                                
                                            }
                                        }
                                    });
                                                          
}
                                                     

                                                        

                                                    </script>

                                                    <script>
                                                        function updateProfit() {
                                                                        $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
                                                                        $('#BetProfitD').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
                                                                        $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                    }

                                                                    function sss() {
                                                                        $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
                                                                    }
                                                                    $('#BetPercent').keyup(function() {
                                                                        $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
                                                                        $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                    });
                                                                    $('#BetSize').keyup(function() {
                                                                        $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
                                                                    });
                                                        
                                                        function updateBalance(start, end) {

                var el = document.getElementById('userBalance');

                od = new Odometer({
                    el: el,
                    value: start
                });

                od.update(end);
                                                            
                var elMob = document.getElementById('userBalanceMob');

                odelMob = new Odometer({
                    el: elMob,
                    value: start
                });

                odelMob.update(end);
            }
                                                                </script>

                            <!--        <script>
                                                    function  indicator(){
                            var indstyle = document.getElementById("ind1").style;
                            var mojno = document.getElementById("mojno").innerHTML;
                            if ( mojno == 1){
                                document.getElementById("ind1").hidden=false;
                            }else{
                              document.getElementById("ind1").hidden=true;
                            }
                          
                                                    var number = document.getElementById("cislo").innerHTML;
                                                    var type = document.getElementById("type").innerHTML;
                                                    var chance = document.getElementById("chanc").innerHTML;
                          let numberr = $('#r1').width() / 100 * number;                                        
                                                    
                                                  
                                                    
                                                    document.getElementById("ind1").style = "bottom: -40px;";  
                                                    document.getElementById("ind2").style = "transform: translateX(-45%); left: " + numberr + "px;";
                                                    document.getElementById("ind3").innerHTML = number;
                                                    document.getElementById("ind4").className = "index__home__indicator__inner__number__roll is-" + type;
                                                    


         


                                                    }   
                         
                                                    setInterval(indicator, 350);    
                                                     
                          </script>-->
<link rel="stylesheet" href="/public/deferred.css?1577959304737"></head>
<body class="body-min-long"><!-- <style>a.winter-logo:before {transform: translate(-110px,-48px);}</style> -->

  <script defer="" src="/js/index.js?ver=1577959303"></script>
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





 
    


<form id="game_form" action="">
   <section class="game width-type">
        <h2 class="game_title">Чтобы начать игру, выберите ставку</h2>
    <div class="game-content">
        <div class="game-mode-standart game-mode-find" data-game="1">
            <aside class="game_value">



            <label for="stavka" class="game_value_label">
                <span class="game_value_label_span">
                    Введите ставку:             </span>
                <div class="game_value_label_block">
                    <input value="<?=$min_bet?>" name="BetSize" type="text" class="game_value_inp" id="BetSize" placeholder="Ставка от <?=$min_bet?> D." max="<?=$max_bet?>">
                    <span class="game_value_gradient">
                        <a href="javascript:void(0)" id="max_dice" class="game_value_mod game-after">max</a>
                        <a href="javascript:void(0)" id="x2_dice" class="game_value_mod game-after-x">x2</a>
                        <a href="javascript:void(0)" id="m2_dice" class="game_value_mod">1/2</a>
                    </span>
                </div>
            </label>
            <label class="game_value_label label-full">
                <span class="game_value_label_span">
                    Возможный выигрыш               </span>
                <span class="game_value_inp_alt label-full">
                    <span id="win">1.98</span>
                    <span style="font-size: 12px;color: #6b6b6b">D.</span>
                </span>
            </label>


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
    </script>                                          <!-- //////////// -->

                        
                    </div>
                </div>
                <div class="control-element">
                    <label for="stavka" class="game_value_label  label-column">
                        <span class="game_value_label_span Main_game_span">Изменить шанс:</span>
                        <div class="game_value_label_block percent" style="width: 130px;">
                            <input value="50.00" min="2" max="99" onchange="key();" name="BetPercent" type="text" class="game_value_inp inp-purple" id="BetPercent" placeholder="Введите число">
                        </div>
                        <div class="game_value_gradient gradient-short font-arial">
                            <p id="minus" class="game_value_mod before-mod">-</p>
                          
                            <p id="plus" class="game_value_mod before-mod">+</p>
                        </div>
                    </label>
                </div>
            </aside>
            <div class="game_chance">
                <p class="game_chance_txt">
                    Шанс на победу                  <span class="game_chance_value">
                        <span id="one">50.00</span>%
                    </span>
                </p>
                <p class="game_chance_txt">
                    Выплата                 <span class="game_chance_value" style="color: #733EDE;">
                        <span id="winner">1.98</span>x
                    </span>
                </p>
            </div>
                     <input type="hidden" name="id" value="2">
            <div class="wrap_range">
                <div style="bottom: 10px;">
                <div id="ind1" class="index__home__indicator__inner index__home__indicator__inner--line" style="display:none;">
                    <div id="ind2" class="index__home__indicator__inner__number is-rolling is-hidden " style="transform: translateX(-15%); left: 667.506px;">
                        <div id="ind4" class="index__home__indicator__inner__number__roll is-positive ">
                            <img alt="<?=$sitename?>" src="/cub.svg"><span id="ind3"></span>
                        </div>
                    </div>
                </div>
                </div>
                <input type="range" oninput="fun1()" id="r1" name="chance" style="background: -webkit-linear-gradient(left, rgb(241, 2, 96) 0%, rgb(241, 2, 96) 50%, rgb(8, 229, 71) 50%, rgb(8, 229, 71) 100%);" min="2" value="50" max="98" step="0.01" class="range rangeFindOne">  
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
                <input id="lastbet" value="<?=$lastbet?>" hidden />
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
                <p class="mod-regulator-text">Используйте ползунок, чтобы изменить шанс победы.</p>
            </div>
            <div class="clock-mod-game">
                <svg viewBox="0 0 300 275" class="new-game">
                        <defs>
                            <pattern id="image" x="0%" y="0%" height="100%" width="100%" viewBox="0 0 512 512">
                                <image x="0%" y="0%" width="512" height="512" xlink:href="/img/worker.png" transform="rotate(180,256, 256)"></image>
                            </pattern>
                            
                            <pattern id="imagetasker" patternUnits="userSpaceOnUse" height="20" width="20">
                                <image x="0" y="0" width="20" height="20" xlink:href="/img/leftright.jpg"></image>
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
            url: 'action.php',
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
</div>   
           <div class="wrap">           
            <aside class="index_stat alt">
                <p class="index_stat_txt alt">
                    Пользователей                   <span id="gm_users_total" class="index_stat_number alt"><?=$ucount?></span>
                </p>
                <p class="index_stat_txt alt">
                    Всего игр                   <span id="gm_bets_total" class="index_stat_number alt"><?=$gcount?></span>
                </p>
                <p class="index_stat_txt alt">
                    Онлайн                  <span id="gm_users_online" class="index_stat_number alt"><?=$online?></span>
                </p>
                <p class="index_stat_txt alt">
                    Сумма ставок                  <span id="gm_bets_amount" class="index_stat_number alt"><?=$betsum?></span>
                </p>
                <p class="index_stat_txt alt" style="display:none">
                    Выпало                  <span id="cislo" class="index_stat_number alt"><?=$cNumber?></span>
                </p>

                <p class="index_stat_txt alt" style="display:none">
                    Тип                 <span id="type" class="index_stat_number alt"><?=$type?></span>
                </p>
                <p class="index_stat_txt alt" style="display:none">
                    Шанс                    <span id="chanc" class="index_stat_number alt"><?=$chanc?></span>
                </p>
        
            </aside>
            <div class="auto-game-block">   
             
                    <button data-order="2" id="play" class="auth_btn alt min-h game-button" onclick="betMax();document.getElementById('mojno').innerHTML = '1';return false;">Сделать ставку</button>
                
                
            <button  data-order="2" id="start" class="auth_btn alt min-h game-button disabled-block" onclick="betMax();document.getElementById('mojno').innerHTML = '1';return false;">Сделать ставку</button>
            
                     
                                                
                                                      

                                                       
                                                      
            </div>
        </div>

            
            <p class="game_txt">*Посмотреть подробную статистику вы можете в личном кабинете.</p>
    </section>
</form>

<script src="/js/jquery.maskedinput.min.js?1577959303"></script>
<script src="/js/games.js?1577959303"></script>
<script src="/js/cricle.js?1577959303"></script>
<script async="" src="/js/scroll.js?ver=1577959303"></script>
  




<!-- <script defer src="/js/AutoBet.js"></script> -->
<script src="/js/max.js?1577959303"></script>


        

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
      <a target="_self" href="/wheel" class="mode-block__link wheelHost">
        <img src="../img/wheelMode.png" alt="Режим колесо" class="mode-block_img">
        <figurcaption class="mode-block_caption ">Колесо</figurcaption>
      </a>
    </figure>
    <figure class="mode-block_figure findDice mode-block_caption__active">
      <a href="/" class="mode-block__link">
        <img src="../img/dicesRange.png" alt="Режим кости" class="mode-block_img">
        <figurcaption class="mode-block_caption">Кости</figurcaption>
      </a>
    </figure>
</div>
</div>




<script async="" src="/js/console.js"></script>
<noscript><link rel="stylesheet" href="/public/deferred.css"></noscript>
<script defer="" src="../js/js-packed.js"></script>

<!--<script defer="" src="/js/newPopUp.js"></script>-->
 
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