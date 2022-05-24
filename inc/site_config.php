<?php

require("bd.php");
session_start();
if ( $_COOKIE['chat'] != "true" and $_COOKIE['chat'] != 'false' ){

    setcookie("chat", "false", time()+60*60*24*30);
    $checked = "";
}elseif ( $_COOKIE['chat'] == 'true' ){

$checked = "checked";

}
$sid = $_SESSION['hash'];
$selecter1 = "SELECT * FROM engmn_user WHERE hash = '$sid'";
         $result4 = mysql_query($selecter1);
         $row = mysql_fetch_array($result4);
         if($row)
        {   

         $is_admin = $row['admin'];
            $name = $row['vk_name'];
          $loginn = $row['login'];
          $pass = $row['pass'];
          $balance = $row['balance'];
          $balance = round($balance, 2);
          $id = $row['id'];
          $social_link = $row['social'];
          $is_ban = $row['ban'];
          $is_chat_ban = $row['chat_ban'];
          $ava = $row['img'];
          if ( empty($name) ){
            
            $login = $row['login'];
        }else{
            
            $login = $row['vk_name'];
                    $login = explode(' ', $login);
                    $login = $login[0];
            
        }
        }
$sql_select1 = "SELECT * FROM engmn_config";
$result1 = mysql_query($sql_select1);
$row = mysql_fetch_array($result1);
if($row)
{
$sitename = $row['sitename']; ; // название сайта
$sitedomen = $row['sitedomen'];
$online = 4; // онлайн
$group = $row['sitegroup']; // группа сайта
$site_support = $row['sitesupport'];
$linksite = $_SERVER['HTTP_HOST']; // ссылка на сайт
$sitekey = $row['sitekey'];
$fk_secret_key = $row['fksecretkey']; // ключ сайта для каптчи
$mail = $row['sitemail']; // почта сайта
$min_bonus_s = $row['min_bonus_size']; // минимальная сумма бонуса в раздаче (в руб)
$max_bonus_s = $row['max_bonus_size']; // максимальная сумма бонуса в раздаче (в руб)
$min_withdraw_sum = $row['min_withdraw_sum']; // минимальная сумма вывода
$bonus_reg = $row['bonus_reg'];
$fk_id = $row['fk_id'];
$fk_secret_1 = $row['fk_secret_1'];
$fk_secret_2 = $row['fk_secret_2'];
$dep_withdraw = $row['dep_withdraw'];
$min_bet = $row['min_bet'];
$max_bet = $row['max_bet'];
$min_per = 2; //не трогайте, если хотите, чтобы dice работал правильно
$max_per = 98; //не трогайте, если хотите, чтобы dice работал правильно
$fake_online = $row['fake_online'];
$fake_interval = $row['fake_interval'];
$min_sum_dep = $row['min_sum_dep'];
$workdata = $row['workdata'];
$bsum = $row['bsum'];
$encpass = $row['encpass'];
$betsumreload = $row['betsumreload'];
$min_rating = $row['min_rating'];
$max_rating = $row['max_rating'];
$min_top_rating = $row['min_top_rating'];
$max_top_rating = $row['max_top_rating'];
$ref_per = $row['ref_per'];
$ref_size = $row['ref_sum'];
$minbonusdep = $row['minbonusdep'];
$systemMessagesInterval = $row['sysmsgint'];
$youtubevideo = str_replace(
array("https://", "/", "youtube.com", "youtube.ru", "www.", "youtu.be", "watch?v="),
"", $row['ytvideo']

);
}

$snow = date("n");
if ( $snow == 12 or $snow == 1 or $snow == 2 ){
$snow = '<link rel="stylesheet" href="/public/WinterDecor.css?1578822667">'; 
$snowFon = 'snow/fone360SnowW.png';
}else{
$snow = '';
$snowFon = 'Bg670.png';
}
if (isset($_SERVER['HTTPS']))
    $hprotocol = $_SERVER['HTTPS'];
else
    $hprotocol = '';
if (($hprotocol) && ($hprotocol != 'off')) $hprotocol = 'https';
else $hprotocol = 'http';

#
#
#
#
#
#
#
#
#
#
#
#
#ЧАТ
#
#
#
#
#
#
#
#
#
#
#
#
if ( $is_admin == 1 ){

$clearChatBtn = '<div style="white-space:nowrap"><button style="padding:5px;color:#fff;border-radius:20px!important; border: 0px solid;box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px;background:#7440ef!important; " onclick="clearChat();return false;">Очистить чат</button>
<button style="padding:5px;color:#fff;border-radius:20px!important; border: 0px solid;box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px;background:#7440ef!important; " onclick="sysMsge();return false;">Отправить сис. сообщение</button></div><div style="white-space:nowrap">
<h3> </h3>
<div style="white-space:nowrap"><input type="number" id="cbanUserId" min="1" class="r4" value="" placeHolder="Введите ID" autocomplete="off" style="width: 35%;background-color:White;border: solid #818181 1px;padding:5px;">
<button style="padding:5px;color:#fff;border-radius:20px!important; border: 0px solid;box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px;background:#7440ef!important; " onclick="cbanUser();return false;">Замутить</button>
<button style="padding:5px;color:#fff;border-radius:20px!important; border: 0px solid;box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px;background:#7440ef!important; " onclick="cunbanUser();return false;">Размутить</button></div>';

    }elseif ( $is_admin == 2 ){

$clearChatBtn = '<div style="white-space:nowrap"><button style="padding:5px;color:#fff;border-radius:20px!important; border: 0px solid;box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px;background:#7440ef!important; " onclick="clearChat();return false;">Очистить чат</button>
<button style="padding:5px;color:#fff;border-radius:20px!important; border: 0px solid;box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px;background:#7440ef!important; " onclick="sysMsge();return false;">Отправить сис. сообщение</button></div><div style="white-space:nowrap">
<h3> </h3>
<div style="white-space:nowrap"><input type="number" id="cbanUserId" min="1" class="r4" value="" placeHolder="Введите ID" autocomplete="off" style="width: 35%;background-color:White;border: solid #818181 1px;padding:5px;">
<button style="padding:5px;color:#fff;border-radius:20px!important; border: 0px solid;box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px;background:#7440ef!important; " onclick="cbanUser();return false;">Замутить</button>
<button style="padding:5px;color:#fff;border-radius:20px!important; border: 0px solid;box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px;background:#7440ef!important; " onclick="cunbanUser();return false;">Размутить</button></div>';


    }elseif ( $is_admin == 3){

$clearChatBtn = '<div style="white-space:nowrap"><button style="padding:5px;color:#fff;border-radius:20px!important; border: 0px solid;box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px;background:#7440ef!important; " onclick="clearChat();return false;">Очистить чат</button>
<div style="white-space:nowrap">
<h3> </h3>
<div style="white-space:nowrap"><input type="number" id="cbanUserId" min="1" class="r4" value="" placeHolder="Введите ID" autocomplete="off" style="width: 35%;background-color:White;border: solid #818181 1px;padding:5px;">
<button style="padding:5px;color:#fff;border-radius:20px!important; border: 0px solid;box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px;background:#7440ef!important; " onclick="cbanUser();return false;">Замутить</button>
<button style="padding:5px;color:#fff;border-radius:20px!important; border: 0px solid;box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px;background:#7440ef!important; " onclick="cunbanUser();return false;">Размутить</button></div>';



    }
    if ( !empty($sid) ){
if ( $is_admin == 1 or $is_admin == 2 or $is_admin == 3 ){

$ojidanie = "";

}else{

$ojidanie = ' $("#pac_text").attr("placeholder","Ожидайте...");
 $("#pac_text").prop("disabled", true);
                $("#sendBtn").prop("disabled", true);
                setTimeout(function(){
                                   $("#pac_text").attr("placeholder","Введите сообщение...");
                $("#pac_text").prop("disabled", false);
                $("#sendBtn").prop("disabled", false); 
                $("#pac_text").focus();
                    }, 5000);';

}
$chatCode = '<input for="navs-toggle" type="checkbox" id="navs-toggle" ' . $checked . ' hidden>
    <nav class="navs" style="background-color:White!important;">
        <label for="navs-toggle" class="navs-toggle" onclick style="transform: rotate(-90deg); font-weight: 700;">ЧАТ</label>
        <h2 class="logo" style="background-color:White!important;"> 
            ЧАТ
        </h2><hr style="height:auto;">
        
      <!-- У нас всё работает в UTF-8 -->
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">

        <!-- Подключаем jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/cookie.js"></script>
        <!-- Сам код нашего чата -->
        <script type="text/javascript"> ' . "
$('.navs-toggle').on('click', function(event) {
if ( getCookie('chat') == 'true' ){

  setCookie('chat', 'false');
    
}else{

  setCookie('chat', 'true');

}
});  " . '
            $(document).ready(function () {
                $("#pac_form").submit(Send); // вешаем на форму с именем и сообщением событие которое срабатывает когда нажата кнопка "Отправить" или "Enter"
                $("#pac_text").focus(); // по поле ввода сообщения ставим фокус
              
               $("#pac_text").keyup(function(e){
if (e.which == 13) { Send(); } });
                setInterval("Load();", 2000); // создаём таймер который будет вызывать загрузку сообщений каждые 2 секунды (2000 миллисекунд)
               // setInterval("SysMsg();", ' . $systemMessagesInterval . ');
                setInterval(function(){

                        ' . $clearChat  . '

                    }, 2000);
            });
        // Функция для отправки сообщения
            function Send() {
                // Выполняем запрос к серверу с помощью jquery ajax: $.post(адрес, {параметры запроса}, функция которая вызывается по завершению запроса)
                $.post("/inc/chat.php",
                        {
                            act: "send",  // указываем скрипту, что мы отправляем новое сообщение и его нужно записать
                            name:  "' . $login . '", // имя пользователя
                            text: $("#pac_text").val(),
                            uStatus: "' . $is_admin . '",
                            user_id: "' . $id . '",
                            user_ava: "' . $ava . '" //  сам текст сообщения
                        },
                        Load ); // по завершению отправки вызываем функцию загрузки новых сообщений Load()
if ( $("#pac_text").val() == "" ){

    showModal("Введите сообщение!", "red");

}else{

 
 ' . $ojidanie . '
}
                
                $("#pac_text").val(""); // очистим поле ввода сообщения
                $("#pac_text").focus(); // и поставим на него фокус
                
               
                return false; // очень важно из Send() вернуть false. Если этого не сделать то произойдёт отправка нашей формы, те страница перезагрузится
            }
            function sysMsge() {
                // Выполняем запрос к серверу с помощью jquery ajax: $.post(адрес, {параметры запроса}, функция которая вызывается по завершению запроса)
                $.post("/inc/chat.php",
                        {
                            act: "systemmsg",  // указываем скрипту, что мы отправляем новое сообщение и его нужно записать
                            name:  "' . $login . '", // имя пользователя
                            text: $("#pac_text").val(),
                            uStatus: "' . $is_admin . '",
                            user_id: "' . $id . '" //  сам текст сообщения
                        },
                        Load ); // по завершению отправки вызываем функцию загрузки новых сообщений Load()
if ( $("#pac_text").val() == "" ){

    showModal("Введите сообщение!", "red");

}else{
                $("#pac_text").val(""); // очистим поле ввода сообщения
                $("#pac_text").focus(); // и поставим на него фокус
                $("#pac_text").attr("placeholder","Ожидайте...");
                $("#pac_text").prop("disabled", true);
                $("#sendBtn").prop("disabled", true);
                setTimeout(function(){
                                   $("#pac_text").attr("placeholder","Введите сообщение...");
                $("#pac_text").prop("disabled", false);
                $("#sendBtn").prop("disabled", false); 
                $("#pac_text").focus();
                    }, 5000);
      }
                return false; // очень важно из Send() вернуть false. Если этого не сделать то произойдёт отправка нашей формы, те страница перезагрузится
            }
            var last_message_id = 0; // номер последнего сообщения, что получил пользователь
            var load_in_process = false; // можем ли мы выполнять сейчас загрузку сообщений. Сначала стоит false, что значит - да, можем

            // Функция для загрузки сообщений
            function Load() {
                // Проверяем можем ли мы загружать сообщения. Это сделано для того, чтобы мы не начали загрузку заново, если старая загрузка ещё не закончилась.
                if(!load_in_process)
                {
                    load_in_process = true; // загрузка началась
                    // отсылаем запрос серверу, который вернёт нам javascript
                    $.post("/inc/chat.php",
                            {
                                act: "load", // указываем на то что это загрузка сообщений
                                last: last_message_id, // передаём номер последнего сообщения который получил пользователь в прошлую загрузку
                                rand: (new Date()).getTime(),
                                uStatus: "' . $is_admin . '"
                            },
                            function (result) { // в эту функцию в качестве параметра передаётся javascript код, который мы должны выполнить
                                $(".chat").scrollTop($(".chat").get(0).scrollHeight); // прокручиваем сообщения вниз
                                load_in_process = false; // говорим что загрузка закончилась, можем теперь начать новую загрузку
                            });
                }
               
            }
             function SysMsg(){

                         $.post("/inc/chat.php",
                        {
                            act: "amsg",  // указываем скрипту, что мы отправляем новое сообщение и его нужно записать
                            
                        },
                        Load );

                }
        </script>    
        <div style="width:90%;background-color:white!important;">
        <!-- Вот в этих 2-х div-ах будут идти наши сообщения из чата -->
        <div class="chat r4">
     
                 <strong><div style="padding:5px" id="chat_area"><!-- Сюда мы будем добавлять новые сообщения --></div></strong>
        </div></div><div style="width:110%;padding-top:10px;background-color:white!important;">
   <form id="pac_form" action="">
            <table style="width: 100%;">
                <tr>
                    
                    <td>Сообщение:</td>
                    <td></td>
                </tr>
                <tr>
         
                     <td><input type="text" id="pac_text" maxLength="100" class="r4" placeHolder="Введите сообщение..." value="" AUTOCOMPLETE="off" style="width: 95%;background-color:White;border: solid #818181 1px;padding:5px;"></td>

                    
                    <td style="padding-right:20px;"><input id="sendBtn" style="padding:5px;color:#fff;border-radius:20px!important; border: 0px solid;box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px;background:#7440ef!important; " type="submit" value="Отправить"></td>
                </tr>
            </table>
        </form>
        ' . $clearChatBtn . '
    </nav></div>';
}else{

$chatCode = '<input for="navs-toggle" type="checkbox" id="navs-toggle" hidden>
    <nav class="navs" style="background-color:White!important;">
        <label for="navs-toggle" class="navs-toggle" onclick style="transform: rotate(-90deg); font-weight: 700;">ЧАТ</label>
        <h2 class="logo" style="background-color:White!important;"> 
            ЧАТ
        </h2><hr style="height:auto;">
        
      <!-- У нас всё работает в UTF-8 -->
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">

        <!-- Подключаем jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Сам код нашего чата -->
        <script type="text/javascript">

            $(document).ready(function () {
                // вешаем на форму с именем и сообщением событие которое срабатывает когда нажата кнопка "Отправить" или "Enter"
                 // по поле ввода сообщения ставим фокус
               
                setInterval("Load();", 2000); // создаём таймер который будет вызывать загрузку сообщений каждые 2 секунды (2000 миллисекунд)
               // setInterval("SysMsg();", ' . $systemMessagesInterval . ');
                setInterval(function(){

                        ' . $clearChat  . '

                    }, 2000);
            });

            // Функция для отправки сообщения

            var last_message_id = 0; // номер последнего сообщения, что получил пользователь
            var load_in_process = false; // можем ли мы выполнять сейчас загрузку сообщений. Сначала стоит false, что значит - да, можем

            // Функция для загрузки сообщений
            function Load() {
                // Проверяем можем ли мы загружать сообщения. Это сделано для того, чтобы мы не начали загрузку заново, если старая загрузка ещё не закончилась.
                if(!load_in_process)
                {
                    load_in_process = true; // загрузка началась
                    // отсылаем запрос серверу, который вернёт нам javascript
                    $.post("/inc/chat.php",
                            {
                                act: "load", // указываем на то что это загрузка сообщений
                                last: last_message_id, // передаём номер последнего сообщения который получил пользователь в прошлую загрузку
                                rand: (new Date()).getTime(),
                                uStatus: "' . $is_admin . '"
                            },
                            function (result) { // в эту функцию в качестве параметра передаётся javascript код, который мы должны выполнить
                                $(".chat").scrollTop($(".chat").get(0).scrollHeight); // прокручиваем сообщения вниз
                                load_in_process = false; // говорим что загрузка закончилась, можем теперь начать новую загрузку
                            });
                }
               
            }
        </script>    
        <div style="width:90%;background-color:white!important;">
        <!-- Вот в этих 2-х div-ах будут идти наши сообщения из чата -->
        <div class="chat r4">
     
                 <strong><div style="padding:5px" id="chat_area"><!-- Сюда мы будем добавлять новые сообщения --></div></strong>
        </div></div><div style="width:110%;padding-top:10px;background-color:white!important;">
   <form id="pac_form" action="">
            <table style="width: 100%;">
                <tr>
                    
                    <td>Сообщение:</td>
                    <td></td>
                </tr>
                <tr>
         
                     <td><input type="text" id="pac_text" maxLength="100" class="r4" placeHolder="Авторизуйтесь!" value="" AUTOCOMPLETE="off" style="width: 95%;background-color:White;border: solid #818181 1px;padding:5px;" disabled></td>

                    
                    <td style="padding-right:20px;"><a id="sendBtn" style="padding:5px;color:#fff;border-radius:20px!important; border: 0px solid;box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px;background:#7440ef!important;" href="/login">Войти</a></td>
                </tr>
            </table>
        </form>
        
    </nav></div>';


}
#
#
#
#
#
#
#
#Кол-во пользователей с нами
#
#
#
#
#
#
#
#
#
#
#

$countusers = mysql_query("SELECT * FROM engmn_user");
$countusers = mysql_num_rows($countusers);
$countusers = ceil($countusers);
?>