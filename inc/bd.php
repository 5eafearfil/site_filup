<?php
$bd_server = "localhost";

$bd_login = 'bd_login';//логин базы данных

$bd_pass = 'bd_pass';//пароль базы данных

$bd_name = 'bd_name';//имя базы данных
 
mysql_connect($bd_server, $bd_login, $bd_pass)//параметры в скобках ("хост", "имя пользователя", "пароль")
or die("<p>Ошибка подключения к базе данных!</p>");
mysql_select_db($bd_name)//параметр в скобках ("имя базы, с которой соединяемся")
 or die("<p>Ошибка выбора базы данных!</p>");
mysql_query("SET NAMES utf8");
?>