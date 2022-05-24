<?php
require("bd.php");
require("site_config.php");

mysql_query("SET NAMES 'utf8'"); // говорим MySQl'у то что мы будем работать с UTF-8

Header("Cache-Control: no-cache, must-revalidate"); // говорим браузеру что-бы он не кешировал эту страницу
Header("Pragma: no-cache");

Header("Content-Type: text/javascript; charset=utf-8"); // говорим браузеру что это javascript в кодировке UTF-8

// проверяем есть ли переменная act (send или load), которая указываем нам что делать
if (isset($_POST['act'])) {
    // $_POST['act'] - существует
    switch ($_POST['act']) {
        case "send" : // если она равняется send, вызываем функцию Send()
            Send();
            break;
        case "load" : // если она равняется load, вызываем функцию Load()
            Load();
            break;
        case "systemmsg":
        SysMsg();
        break;
        default : // если ни тому и не другому  - выходим
            exit();
    }
}

// Функция выполняем сохранение сообщения в базе данных
function Send()
{
    // тут мы получили две переменные переданные нашим java-скриптом при помощи ajax

    // это:  $_POST['name'] - имя пользователя
    // и $_POST['text'] - сообщение

    $name = substr($_POST['name'], 0, 50); // обрезаем до 200 символов
    $name = htmlspecialchars($name); // заменяем опасные теги (<h1>,<br>, и прочие) на безопасные
    $name = mysql_real_escape_string($name); // функция экранирует все спец-символы в unescaped_string , вследствие чего, её можно безопасно использовать в mysql_query()

    $text = substr($_POST['text'], 0, 100); // обрезаем до 200 символов
    $text = htmlspecialchars($text); // заменяем опасные теги (<h1>,<br>, и прочие) на безопасные
    $text = mysql_real_escape_string($text); // функция экранирует все спец-символы в unescaped_string , вследствие чего, её можно безопасно использовать в mysql_query()
$texttest = strlen(utf8_decode($text));


$is_admin = $_POST['uStatus'];
$user_id = $_POST['user_id'];
    // добавляем новую запись в таблицу messages

$pref = "Игрок";
if($is_admin == 1){
$pref = '<b><font color="red">Владелец</font></b>';
$text= preg_replace("/(^|[\n ])([\w]*?)((ht|f)tp(s)?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a href=\"$3\" style=\"color:dodgerblue;text-decoration: underline;\">$3</a>", $text);

    $text= preg_replace("/(^|[\n ])([\w]*?)((www|ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a href=\"http://$3\" style=\"color:dodgerblue;text-decoration: underline;\">$3</a>", $text);

    $text= preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a href=\"mailto:$2@$3\" style=\"color:dodgerblue;text-decoration: underline;\">$2@$3</a>", $text);

}elseif($is_admin == 2){
$pref = '<b><font color="orange">Админ</font></b>';
$text= preg_replace("/(^|[\n ])([\w]*?)((ht|f)tp(s)?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a href=\"$3\" style=\"color:dodgerblue;text-decoration: underline;\">$3</a>", $text);

    $text= preg_replace("/(^|[\n ])([\w]*?)((www|ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a href=\"http://$3\" style=\"color:dodgerblue;text-decoration: underline;\">$3</a>", $text);

    $text= preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a href=\"mailto:$2@$3\" style=\"color:dodgerblue;text-decoration: underline;\">$2@$3</a>", $text);
}elseif($is_admin == 3){
$pref = '<b><font color="green">Модератор</font></b>';
$text= preg_replace("/(^|[\n ])([\w]*?)((ht|f)tp(s)?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a href=\"$3\" style=\"color:dodgerblue;text-decoration: underline;\">$3</a>", $text);

    $text= preg_replace("/(^|[\n ])([\w]*?)((www|ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a href=\"http://$3\" style=\"color:dodgerblue;text-decoration: underline;\">$3</a>", $text);

    $text= preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a href=\"mailto:$2@$3\" style=\"color:dodgerblue;text-decoration: underline;\">$2@$3</a>", $text);
}else{

    $text= preg_replace("/(^|[\n ])([\w]*?)((ht|f)tp(s)?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "[ссылка удалена]", $text);

    $text= preg_replace("/(^|[\n ])([\w]*?)((www|ftp)\.[^ \,\"\t\n\r<]*)/is", "[ссылка удалена]", $text);

    $text= preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "[ссылка удалена]", $text);


}

$text = str_replace(
array("6ля", "6лядь", "6лять", "b3ъeб", "cock", "cunt", "e6aль", "ebal", "eblan", "eбaл", "eбaть", "eбyч", "eбать", "eбёт", "eблантий", "fuck", "fucker", "fucking", "xyёв", "xyй", "xyя", "xуе","xуй", "xую", "zaeb", "zaebal", "zaebali", "zaebat", "архипиздрит", "ахуел", "ахуеть", "бздение", "бздеть", "бздех", "бздецы", "бздит", "бздицы", "бздло", "бзднуть", "бздун", "бздунья", "бздюха", "бздюшка", "бздюшко", "бля", "блябу", "блябуду", "бляд", "бляди", "блядина", "блядище", "блядки", "блядовать", "блядство", "блядун", "блядуны", "блядунья", "блядь", "блядюга", "блять", "вафел", "вафлёр", "взъебка", "взьебка", "взьебывать", "въеб", "въебался", "въебенн", "въебусь", "въебывать", "выблядок", "выблядыш", "выеб", "выебать", "выебен", "выебнулся", "выебон", "выебываться", "выпердеть", "высраться", "выссаться", "вьебен", "гавно", "гавнюк", "гавнючка", "гамно", "гандон", "гнид", "гнида", "гниды", "говенка", "говенный", "говешка", "говназия", "говнецо", "говнище", "говно", "говноед", "говнолинк", "говночист", "говнюк", "говнюха", "говнядина", "говняк", "говняный", "говнять", "гондон", "доебываться", "долбоеб", "долбоёб", "долбоящер", "дрисня", "дрист", "дристануть", "дристать", "дристун", "дристуха", "дрочелло", "дрочена", "дрочила", "дрочилка", "дрочистый", "дрочить", "дрочка", "дрочун", "е6ал", "е6ут", "еб твою мать", "ёб твою мать", "ёбaн", "ебaть", "ебyч", "ебал", "ебало", "ебальник", "ебан", "ебанамать", "ебанат", "ебаная", "ёбаная", "ебанический", "ебанный", "ебанныйврот", "ебаное", "ебануть", "ебануться", "ёбаную", "ебаный", "ебанько", "ебарь", "ебат", "ёбат", "ебатория", "ебать", "ебать-копать", "ебаться", "ебашить", "ебёна", "ебет", "ебёт", "ебец", "ебик", "ебин", "ебись", "ебическая", "ебки", "ебла", "еблан", "ебливый", "еблище", "ебло", "еблыст", "ебля", "ёбн", "ебнуть", "ебнуться", "ебня", "ебошить", "ебская", "ебский", "ебтвоюмать", "ебун", "ебут", "ебуч", "ебуче", "ебучее", "ебучий", "ебучим", "ебущ", "ебырь", "елда", "елдак", "елдачить", "жопа", "жопу", "заговнять", "задрачивать", "задристать", "задрота", "зае6", "заё6", "заеб", "заёб", "заеба", "заебал", "заебанец", "заебастая", "заебастый", "заебать", "заебаться", "заебашить", "заебистое", "заёбистое", "заебистые", "заёбистые", "заебистый", "заёбистый", "заебись", "заебошить", "заебываться", "залуп", "залупа", "залупаться", "залупить", "залупиться", "замудохаться", "запиздячить", "засерать", "засерун", "засеря", "засирать", "засрун", "захуячить", "заябестая", "злоеб", "злоебучая", "злоебучее", "злоебучий", "ибанамат", "ибонех", "изговнять", "изговняться", "изъебнуться", "ипать", "ипаться", "ипаццо", "Какдвапальцаобоссать", "конча", "курва", "курвятник", "лох", "лошарa", "лошара", "лошары", "лошок", "лярва", "малафья", "манда", "мандавошек", "мандавошка", "мандавошки", "мандей", "мандень", "мандеть", "мандища", "мандой", "манду", "мандюк", "минет", "минетчик", "минетчица", "млять", "мокрощелка", "мокрощёлка", "мразь", "мудak", "мудaк", "мудаг", "мудак", "муде", "мудель", "мудеть", "муди", "мудил", "мудила", "мудистый", "мудня", "мудоеб", "мудозвон", "мудоклюй", "на хер", "на хуй", "набздел", "набздеть", "наговнять", "надристать", "надрочить", "наебать", "наебет", "наебнуть", "наебнуться", "наебывать", "напиздел", "напиздели", "напиздело", "напиздили", "насрать", "настопиздить", "нахер", "нахрен", "нахуй", "нахуйник", "не ебет", "не ебёт", "невротебучий", "невъебенно", "нехира", "нехрен", "Нехуй", "нехуйственно", "ниибацо", "ниипацца", "ниипаццо", "ниипет", "никуя", "нихера", "нихуя", "обдристаться", "обосранец", "обосрать", "обосцать", "обосцаться", "обсирать", "объебос", "обьебать обьебос", "однохуйственно", "опездал", "опизде", "опизденивающе", "остоебенить", "остопиздеть", "отмудохать", "отпиздить", "отпиздячить", "отпороть", "отъебись", "охуевательский", "охуевать", "охуевающий", "охуел", "охуенно", "охуеньчик", "охуеть", "охуительно", "охуительный", "охуяньчик", "охуячивать", "охуячить", "очкун", "падла", "падонки", "падонок", "паскуда", "педерас", "педик", "педрик", "педрила", "педрилло", "педрило", "педрилы", "пездень", "пездит", "пездишь", "пездо", "пездят", "пердануть", "пердеж", "пердение", "пердеть", "пердильник", "перднуть", "пёрднуть", "пердун", "пердунец", "пердунина", "пердунья", "пердуха", "пердь", "переёбок", "пернуть", "пёрнуть", "пи3д", "пи3де", "пи3ду", "пиzдец", "пидар", "пидарaс", "пидарас", "пидарасы", "пидары", "пидор", "пидорасы", "пидорка", "пидорок", "пидоры", "пидрас", "пизда", "пиздануть", "пиздануться", "пиздарваньчик", "пиздато", "пиздатое", "пиздатый", "пизденка", "пизденыш", "пиздёныш", "пиздеть", "пиздец", "пиздит", "пиздить", "пиздиться", "пиздишь", "пиздища", "пиздище", "пиздобол", "пиздоболы", "пиздобратия", "пиздоватая", "пиздоватый", "пиздолиз", "пиздонутые", "пиздорванец", "пиздорванка", "пиздострадатель", "пизду", "пиздуй", "пиздун", "пиздунья", "пизды", "пиздюга", "пиздюк", "пиздюлина", "пиздюля", "пиздят", "пиздячить", "писбшки", "писька", "писькострадатель", "писюн", "писюшка", "по хуй", "по хую", "подговнять", "подонки", "подонок", "подъебнуть", "подъебнуться", "поебать", "поебень", "поёбываает", "поскуда", "посрать", "потаскуха", "потаскушка", "похер", "похерил", "похерила", "похерили", "похеру", "похрен", "похрену", "похуй", "похуист", "похуистка", "похую", "придурок", "приебаться", "припиздень", "припизднутый", "припиздюлина", "пробзделся", "проблядь", "проеб", "проебанка", "проебать", "промандеть", "промудеть", "пропизделся", "пропиздеть", "пропиздячить", "раздолбай", "разхуячить", "разъеб", "разъеба", "разъебай", "разъебать", "распиздай", "распиздеться", "распиздяй", "распиздяйство", "распроеть", "сволота", "сволочь", "сговнять", "секель", "серун", "серька", "сестроеб", "сикель", "сила", "сирать", "сирывать", "соси", "спиздел", "спиздеть", "спиздил", "спиздила", "спиздили", "спиздит", "спиздить", "срака", "сраку", "сраный", "сранье", "срать", "срун", "ссака", "ссышь", "стерва", "страхопиздище", "сука", "суки", "суходрочка", "сучара", "сучий", "сучка", "сучко", "сучонок", "сучье", "сцание", "сцать", "сцука", "сцуки", "сцуконах", "сцуль", "сцыха", "сцышь", "съебаться", "сыкун", "трахае6", "трахаеб", "трахаёб", "трахатель", "ублюдок", "уебать", "уёбища", "уебище", "уёбище", "уебищное", "уёбищное", "уебк", "уебки", "уёбки", "уебок", "уёбок", "урюк", "усраться", "ушлепок", "х_у_я_р_а", "хyё", "хyй", "хyйня", "хамло", "хер", "херня", "херовато", "херовина", "херовый", "хитровыебанный", "хитрожопый", "хуeм", "хуе", "хуё", "хуевато", "хуёвенький", "хуевина", "хуево", "хуевый", "хуёвый", "хуек", "хуёк", "хуел", "хуем", "хуенч", "хуеныш", "хуенький", "хуеплет", "хуеплёт", "хуепромышленник", "хуерик", "хуерыло", "хуесос", "хуесоска", "хуета", "хуетень", "хуею", "хуи", "хуй", "хуйком", "хуйло", "хуйня", "хуйрик", "хуище", "хуля", "хую", "хуюл", "хуя", "хуяк", "хуякать", "хуякнуть", "хуяра", "хуясе", "хуячить", "целка", "чмо", "чмошник", "чмырь", "шалава", "шалавой", "шараёбиться", "шлюха", "шлюхой", "шлюшка", "ябывает"), "", $text

);
$text = ltrim($text);
$text = rtrim($text);
if ( !empty($text) ){
if (preg_match('#^([ёЁ\sA-zА-я0-9!,./:?]*)$#ui', $text))
{
    
        $findBan = "SELECT * FROM engmn_user WHERE id='" . $user_id . "'";
        $findBan = mysql_query($findBan);
        $findBan = mysql_fetch_array($findBan);
    if ( $findBan ){

            $findBan = $findBan['chat_ban'];

    }
    if ( $findBan != 1 ){
if($texttest >= 1){
    mysql_query("INSERT INTO engmn_messages (user_id,name,text,prefix) VALUES ('" . $user_id . "','" . $_POST['name'] . "', '" . $text . "', '" . $pref . "')");
}
}else{

        echo 'showModal("Вы заблокированы!", "red");';


    }

}else{

    echo 'showModal("Разрешено вводить только русские и английские буквы!", "red");';

}
}
}


/*function SysMsg()
{
       # if ( $systemMessages == 1 ){
   
/*  $maxId = "SELECT * FROM `engmn_sysmsg` WHERE active='1' ORDER BY `id` DESC LIMIT 1";
   $maxId = mysql_query($maxId);
   $maxId = mysql_fetch_array($maxId);
   if ( $maxId ){
        $maxIdActive = $maxId['active'];
        $maxId = $maxId['id'];
        if ( $maxIdActive == 1){
        $yeMax = 1;
    }
}
   $minId = "SELECT * FROM `engmn_sysmsg` WHERE active='1' ORDER BY `id` ASC LIMIT 1";
   $minId = mysql_query($minId);
   $minId = mysql_fetch_array($minId);
   if ( $minId ){
        $minIdActive = $minId['active'];
        $minId = $minId['id'];
        if ( $minIdActive == 1){
        $minId = rand($minId, $maxId);
        $yeMin = 1;
    }
   }
   if ( $yeMax == 1 and $yeMin == 1 ){
   $randomMessage = "SELECT * FROM engmn_sysmsg WHERE id='" . $maxId . "' AND active='1'";
   $randomMessage = mysql_query($randomMessage);
   $randomMessage = mysql_fetch_array($randomMessage);
   if ( $randomMessage ){

        $randomMessage = $randomMessage['message'];

   } 

   


    
    $text = substr($_POST['text'], 0, 100); // обрезаем до 200 символов
    $text = htmlspecialchars($text); // заменяем опасные теги (<h1>,<br>, и прочие) на безопасные
    $text = mysql_real_escape_string($text); // функция экранирует все спец-символы в unescaped_string , вследствие чего, её можно безопасно использовать в mysql_query()
$texttest = strlen(utf8_decode($text));

$is_admin = $_POST['uStatus'];
$user_id = $_POST['user_id'];
if ( $is_admin == 1 ){
 mysql_query("INSERT INTO engmn_messages (user_id,name,text,prefix,admin_hide) VALUES ('','sys', '" . $text . "', 'sys', '1')");
 }else{

echo 'showModal("Вы не являетесь администратором.", "red");';

 } //  }
}
        #}
*/
function SysMsg()
{
    // тут мы получили две переменные переданные нашим java-скриптом при помощи ajax

    // это:  $_POST['name'] - имя пользователя
    // и $_POST['text'] - сообщение

    $name = substr($_POST['name'], 0, 50); // обрезаем до 200 символов
    $name = htmlspecialchars($name); // заменяем опасные теги (<h1>,<br>, и прочие) на безопасные
    $name = mysql_real_escape_string($name); // функция экранирует все спец-символы в unescaped_string , вследствие чего, её можно безопасно использовать в mysql_query()

    $text = substr($_POST['text'], 0, 100); // обрезаем до 200 символов
    $text = htmlspecialchars($text); // заменяем опасные теги (<h1>,<br>, и прочие) на безопасные
    $text = mysql_real_escape_string($text); // функция экранирует все спец-символы в unescaped_string , вследствие чего, её можно безопасно использовать в mysql_query()
$texttest = strlen(utf8_decode($text));

$is_admin = $_POST['uStatus'];
$user_id = $_POST['user_id'];
    // добавляем новую запись в таблицу messages



if ( !empty($text) ){
if (preg_match('#^([ёЁ\sA-zА-я0-9!,.-]*)$#ui', $text))
{
    $text = ltrim($text);
    $text = rtrim($text);
$text= preg_replace("/(^|[\n ])([\w]*?)((ht|f)tp(s)?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a href=\"$3\" style=\"color:dodgerblue;text-decoration: underline;\">$3</a>", $text);

    $text= preg_replace("/(^|[\n ])([\w]*?)((www|ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a href=\"http://$3\" style=\"color:dodgerblue;text-decoration: underline;\">$3</a>", $text);

    $text= preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a href=\"mailto:$2@$3\" style=\"color:dodgerblue;text-decoration: underline;\">$2@$3</a>", $text);
        $findBan = "SELECT * FROM engmn_user WHERE id='" . $user_id . "'";
        $findBan = mysql_query($findBan);
        $findBan = mysql_fetch_array($findBan);
    if ( $findBan ){

            $findBan = $findBan['chat_ban'];

    }
    if ( $findBan != 1 ){
if($texttest >= 1){
    mysql_query("INSERT INTO engmn_messages (user_id,name,text,prefix,admin_hide) VALUES ('','sys', '" . $text . "', 'sys', '1')");
}
}else{

        echo 'showModal("Вы заблокированы!", "red");';


    }

}else{

    echo 'showModal("Разрешено вводить только русские и английские буквы!", "red");';

}
}
}
    // функция выполняем загрузку сообщений из базы данных и отправку их пользователю через ajax виде java-скрипта
    function Load()
    {
    // тут мы получили переменную переданную нашим java-скриптом при помощи ajax
    // это:  $_POST['last'] - номер последнего сообщения которое загрузилось у пользователя
    $msgcount = mysql_num_rows(mysql_query('SELECT * FROM engmn_messages LIMIT 1'));
if ( $msgcount < 1 ){

        echo '$("#chat_area").text("Чат очищен.");';
}else{
    $last_message_id = intval($_POST['last']); // возвращает целое значение переменной
        $isadmin = $_POST['uStatus'];
    // выполняем запрос к базе данных для получения 10 сообщений последних сообщений с номером большим чем $last_message_id
    $query = mysql_query("SELECT * FROM engmn_messages WHERE ( id > $last_message_id ) ORDER BY id DESC LIMIT 10");

    // проверяем есть ли какие-нибудь новые сообщения
    if (mysql_num_rows($query) > 0) {
    // начинаем формировать javascript который мы передадим клиенту
    $js = 'var chat = $("#chat_area");'; // получаем "указатель" на div, в который мы добавим новые сообщения

    // следующий конструкцией мы получаем массив сообщений из нашего запроса
    $messages = array();
    while ($row = mysql_fetch_array($query)) {
    $messages[] = $row;
    }

    // записываем номер последнего сообщения
    // [0] - это вернёт нам первый элемент в массиве $messages, но так как мы выполнили запрос с параметром "DESC" (в обратном порядке),
    // то это получается номер последнего сообщения в базе данных
    $last_message_id = $messages[0]['id'];

    // переворачиваем массив (теперь он в правильном порядке)
    $messages = array_reverse($messages);

    // идём по всем элементам массива $messages


    foreach ($messages as $value) {
         
        $us_id = $value['user_id'];
        $us_ava = "SELECT * FROM engmn_user WHERE id='" . $us_id . "'";
        $us_ava = mysql_query($us_ava);
        $us_ava = mysql_fetch_array($us_ava);
        if ( $us_ava ){

            $us_ava = $us_ava['img'];
             }
        if ( empty($us_ava) ){

            $us_ava = '<p> </p>&nbsp;<img src="/img/User.png" style="position: absolute;width: 27px;height: 27px;border-radius: 50%;margin-bottom: -50px;" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';    
        }else{

$us_ava = '&nbsp;<img src="' . $us_ava . '" style="position: absolute;width: 27px;height: 27px;border-radius: 50%;margin-bottom: -50px;" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        

        }
    if ( $isadmin == 1 or $isadmin == 2 or $isadmin == 3 ){

   $user_id = '<b><u><a onclick="bUnBn(' . $value['user_id'] . ')" style="color: dodgerblue;font-color: dodgerblue;text-decoration: underline;"></u></b>';
   $deleteMsg = '<b><u><button onclick="deleteMsg(' . $value['id'] . ')" style="padding:5px;color:#fff;border-radius:20px!important; border: 0px solid;box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px;background:#7440ef!important; ">-</button></u></b>';
    }else{
    $user_id = '<b><u><a href="/user/id/' . $value['user_id'] . '" style="color: dodgerblue;font-color: dodgerblue;text-decoration: underline;"></u></b>';
    }
    $usid = $value['user_id'];
    // продолжаем формировать скрипт для отправки пользователю
     if ( $value['admin_hide'] != 0 ){
        $system = '<font style="color: deeppink;font-size: 20px;">';
        $text = $value['text'];
        $text= preg_replace("/(^|[\n ])([\w]*?)((ht|f)tp(s)?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a href=\"$3\" style=\"color:dodgerblue;text-decoration: underline;\">$3</a>", $text);

    $text= preg_replace("/(^|[\n ])([\w]*?)((www|ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a href=\"http://$3\" style=\"color:dodgerblue;text-decoration: underline;\">$3</a>", $text);

    $text= preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a href=\"mailto:$2@$3\" style=\"color:dodgerblue;text-decoration: underline;\">$2@$3</a>", $text);
     $js .= "chat.append('<p>&nbsp</p> <span>" . $system . "СИСТЕМА &raquo; " . $text . "</font></span>');";
}
    if ( !empty($value['id']) ){
    if ( $value['admin_hide'] == 0 ){
    $js .= "chat.append('<p>&nbsp</p> <span>" . $us_ava . "(".$value['prefix']. ")" . $user_id . ' ' . $value['name'] . "</a> &raquo; " . $value['text'] . " " . $deleteMsg . "</span>');"; // добавить сообщние (<span>Имя &raquo; текст сообщения</span>) 
    }
}

$name = $value['name'];
$msg_id = $value['id'];
$text = $value['text'];
}
if ( empty($text) ){

$last_message_id = str_replace($msg_id, "", $last_message_id);

}

    $js .= "last_message_id = $last_message_id;"; // запишем номер последнего полученного сообщения, что бы в следующий раз начать загрузку с этого сообщения

    // отправляем полученный код пользователю, где он будет выполнен при помощи функции eval()
    
    echo $js;

    }
}
}
?>