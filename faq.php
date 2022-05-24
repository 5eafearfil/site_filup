<?php
require("inc/site_config.php");
require("inc/bd.php");
session_start();

header('X-Frame-Options:SAMEORIGIN');
header('X-Content-Type-Options:nosniff');
header('X-Frame-Options: DENY');
header("X-XSS-Protection: 1; mode=block");

$sid = $_SESSION['hash'];
$selecter1 = "SELECT * FROM engmn_user WHERE hash = '$sid'";
         $result4 = mysql_query($selecter1);
         $row = mysql_fetch_array($result4);
		 if($row)
		{	
          $vk_name = $row['vk_name'];
          $login = $row['login'];
          $pass = $row['pass'];
        }
		$workdata = explode('-', $workdata);
$year = $workdata[0];
$month = $workdata[1];
$day = $workdata[2];


$workdata = $month . ' ' . $day . ', ' . $year;  

		

  ?>



<!DOCTYPE html>
<html lang="Ru-ru"><head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">   
     
	<link rel="preconnect" href="/public/header.min.css?1578047019" crossorigin="anonymous">
	<link rel="preconnect" href="/public/header-short.min.css?1578047019" crossorigin="anonymous">

       
      
	<link rel="stylesheet" href="/public/header.min.css?1578047019"> 
	<link rel="stylesheet" href="/public/check.css?1578047019"> 

   

	<link rel="stylesheet" href="/public/header-short.min.css?1578047019" media="only screen and (max-width: 670px)">
	<link rel="stylesheet" href="/public/newMenu.css?1578047019" media="(min-width: 0px) and (max-width: 1024px)">

	<link rel="stylesheet" href="/public/tablets.css?1578047019" media="(min-width: 670px) and (max-width: 1024px)">
	<link rel="stylesheet" href="/public/mini-desktop.css?1578047019" media="(min-width: 1024px) and (max-width: 1366px)">
		
	<link rel="preconnect" href="font/ProximaNova-Semibold.ttf" crossorigin="anonymous">
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
 

     <!-- WINTER -->

   <!--    -->
     <!-- WINTER -->

<?=$snow?>	<link rel="prefetch" href="/img/BG_footer.png">
	<!-- <link rel="manifest" href="/manifest.json"> -->
	<link rel="dns-prefetch" href="https://www.youtube.com/">
	<!--link rel="prerender" href=""-->
	<link rel="shortcut icon" href="/fav.ico" type="image/x-icon">
	<title><?=$sitename?> | Раздел Вопрос - Ответ Популярные вопросы</title>
	<meta name="description" content="Азартная игра с выводом реальных денег! Выберите шанс победы и выигрывайте рубли бесплатно каждый день. Киньте кости и получите бонус на сайте <?=$sitename?> уже сегодня! С нами уже более <?=$countusers?> пользователей">
	<link rel="canonical" href="<?=$url?>/public/">
	<meta property="og:title" content="<?=$sitename?> - Азартная игра с выбором шанса победы. Моментальные выплаты. Уникальная система уровней"> 
    <meta property="og:type" content="Website">
    <meta property="og:url" content="<?=$url?>/public/">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:image" content="/img/on.png">
    <meta property="og:description" content="Азартная игра с выводом реальных денег! Выберите шанс победы и выигрывайте рубли бесплатно каждый день. Киньте кости и получите бонус на сайте <?=$sitename?> уже сегодня! С нами уже более <?=$countusers?> пользователей">
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
	<script src="/ajax/functions.js"></script>
<script defer="" src="/js/help.js"></script>
<link rel="stylesheet" href="/public/deferred.css?1578047017007"><link rel="stylesheet" type="text/css" href="chrome-extension://glgemekgfjppocilabhlcbngobillcgf/styles.css"></head>
<body class="body-min-long"><!-- <style>a.winter-logo:before {transform: translate(-110px,-48px);}</style> -->
<header class="head head_noneAuth">
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

		


			    </header>

<div class="head-mobaile">
	
	<a href="/" class="head_logo_txt"><?=$sitename?></a>

</div>





<style>

body{background: url('/img/Bg2KMini.png');background-repeat: no-repeat;}
@media (min-width: 2500px) and (max-width: 5000px) {body{background: url(../img/fone2K.png) 0 0 no-repeat;}}
/*winter*/
@media (min-width: 0px) and (max-width: 670px) {body{background: url('/img/<?=$snowFon?>.png') 0 -115px no-repeat !important;}

</style>
	<main class="faq">
			<h2 class="table_title">Чем вам помочь?</h2>
			<style>.adms{visibility: hidden;height: 0;}</style>
				<div class="questions">
					<article class="questions-text-group">
						<h3 class="questions_title">Список категорий</h3>
						<p class="questions_text">Выберите вопрос из любой категории и получите развернутый ответ</p>
				
					</article>

					<!-- Ответ  1 -->
					<div class="Sure-to-Answer" data-answer="0">
						<div class="questions-flex_alt">
							<div class="questions-container">
								<figure class="questions-img-container">
									<img src="/img/logo-help_min.png" alt="Site logo" class="questions_img">
								</figure>
								<article class="questions-nav">
									<h4 class="questions-title_nav">Общие</h4>
									<ul class="questions-list">
										<li class="questions-list-li"><a href="#about" class="questions-list-li_link" data-answer="0">Что такое <?=$sitename?> ?</a></li>
										<li class="questions-list-li"><a href="#about" class="questions-list-li_link" data-answer="1">Как генерируется число?</a></li>
										<li class="questions-list-li"><a href="#about" class="questions-list-li_link" data-answer="2">Рейтинг и награды</a></li>
									</ul>
								</article>
							</div>
							<article class="question-answer">
								<h4 class="questions-answer_title">Что такое <?=$sitename?> ?</h4>
								<p class="question-answer_text"><b><?=$sitename?></b> - Это Азартная игра с выбором шанса победы. Здесь вы можете попробовать свою удачу в нескольких режимах игры и посоревноваться с другими игроками.<br><br>
		<b>Почему я должен вам доверять ?</b><br>

		У нас имеется открытая статистика, вы можете посмотреть сколько всего пользователей на сайте, игр, ставок и какое количество выплат.<br><br> Мы не используем ботов, вы можете перейти к любому игроку и посмотреть его профиль ( Спросить, действительно ли он играет у нас ). <br><br>В нашем паблике Вконтакте вы можете предложить любую идею, которую мы обязательно выслушаем.<br>  Прочитать отзывы вы можете <a href="<?=$group?>" target="_blank" class="questins_add ">здесь</a>  ( Посты от реальных людей )</p>
							</article>
						</div>


						<figure class="questions-text-group questions-text-group__alt">
							<a href="#" class="questins_add questins_add__before" data-answer="0">Вернуться</a>
								<span class="questions-text-group_alt">
									<a href="<?=$site_support?>" class="questins_add">Техническая поддержка</a>
									<a href="<?=$group?>" target="_blank" class="questins_add questins_add__mleft">Группа Вконтакте</a>
								</span>
						</figure>
					</div>




					<!-- Ответ  2 -->
					
					<div class="Sure-to-Answer" data-answer="1">
						<div class="questions-flex_alt">
							<div class="questions-container">
								<figure class="questions-img-container">
									<img src="/img/logo-help_min.png" alt="Site logo" class="questions_img">
								</figure>
								<article class="questions-nav">
									<h4 class="questions-title_nav">Общие</h4>
									<ul class="questions-list">
										<li class="questions-list-li"><a href="#about" class="questions-list-li_link" data-answer="0">Что такое <?=$sitename?> ?</a></li>
										<li class="questions-list-li"><a href="#about" class="questions-list-li_link" data-answer="1">Как генерируется число?</a></li>
										<li class="questions-list-li"><a href="#about" class="questions-list-li_link" data-answer="2">Рейтинг и награды</a></li>
									</ul>
								</article>
							</div>
							<article class="question-answer">
								<h4 class="questions-answer_title">Как генерируется число?</h4>
								<p class="question-answer_text">Программа для вычисления победителя основана на генерации случайного числа. Мы представляем небольшую вырезку из кода, чтобы показать как все происходит.<br><br>

		$rand = rand(0, 10000); // рандомное число, например 9254<br>
        $generate = $rand / 100; // делим это число на 100, чтобы получить такое 92.54</p>
							</article>
						</div>
						<figure class="questions-text-group questions-text-group__alt">
							<a href="#" class="questins_add questins_add__before" data-answer="1">Вернуться</a>
								<span class="questions-text-group_alt">
									<a href="<?=$site_support?>" class="questins_add">Техническая поддержка</a>
									<a href="<?=$group?>" target="_blank" class="questins_add questins_add__mleft">Группа Вконтакте</a>
								</span>
						</figure>
					</div>




					<!-- Ответ 3 -->
					<div class="Sure-to-Answer" data-answer="2">
						<div class="questions-flex_alt">
							<div class="questions-container">
								<figure class="questions-img-container">
									<img src="/img/logo-help_min.png" alt="Site logo" class="questions_img">
								</figure>
								<article class="questions-nav">
									<h4 class="questions-title_nav">Общие</h4>
									<ul class="questions-list">
										<li class="questions-list-li"><a href="#about" class="questions-list-li_link" data-answer="0">Что такое <?=$sitename?> ?</a></li>
										<li class="questions-list-li"><a href="#about" class="questions-list-li_link" data-answer="1">Как генерируется число?</a></li>
										<li class="questions-list-li"><a href="#about" class="questions-list-li_link" data-answer="2">Рейтинг и награды</a></li>
									</ul>
								</article>
							</div>
							<article class="question-answer">
								<h4 class="questions-answer_title">Рейтинг и награды</h4>
								<p class="question-answer_text">Во вкладке "рейтинг" вы можете найти пользователей, которые вывели всех больше с сайта и сыграли много игр.<br> <br>Подсчет выводов ведется каждый месяц , начиная с 1-ого числа, поэтому не составит труда туда попасть любому участнику. Награды выдаются каждый месяц. Если вы оказались в числе лидеров ( топ 10 ), то вы получите приз. Он зависит от вашего места и начинается от 2 D.<br><br>

		Награду вы сможете забрать в личном кабинете на главной странице.</p>
							</article>
						</div>
						<figure class="questions-text-group questions-text-group__alt">
							<a href="#" class="questins_add questins_add__before" data-answer="2">Вернуться</a>
								<span class="questions-text-group_alt">
									<a href="<?=$site_support?>" class="questins_add">Техническая поддержка</a>
									<a href="<?=$group?>" target="_blank" class="questins_add questins_add__mleft">Группа Вконтакте</a>
								</span>
						</figure>
					</div>





					<!-- Ответ  4 -->
					<div class="Sure-to-Answer" data-answer="3">
						<div class="questions-flex_alt">
							<div class="questions-container">
								<figure class="questions-img-container">
									<img src="/img/gift-help_min.png" alt="Site logo" class="questions_img">
								</figure>
								<article class="questions-nav">
									<h4 class="questions-title_nav">Промокоды</h4>
									<ul class="questions-list">
										<li class="questions-list-li"><a href="#promo" class="questions-list-li_link" data-answer="3">Что такое промо-код?</a></li>
										<li class="questions-list-li"><a href="#promo" class="questions-list-li_link" data-answer="4">Как получить промо-код?</a></li>
										<li class="questions-list-li"><a href="#promo" class="questions-list-li_link" data-answer="5">Куда вводить промо-код?</a></li>
									</ul>
								</article>
							</div>
							<article class="question-answer">
								<h4 class="questions-answer_title">Что такое промо-код?</h4>
								<p class="question-answer_text">Промо-код - это бонус от проекта, который вы можете активировать в любой момент. Обычно он составляет до 10 D.</p>
							</article>
						</div>
						<figure class="questions-text-group questions-text-group__alt">
							<a href="#" class="questins_add questins_add__before" data-answer="3">Вернуться</a>
								<span class="questions-text-group_alt">
									<a href="<?=$site_support?>" class="questins_add">Техническая поддержка</a>
									<a href="<?=$group?>" target="_blank" class="questins_add questins_add__mleft">Группа Вконтакте</a>
								</span>
						</figure>
					</div>
					<!-- Ответ  5 -->
					<div class="Sure-to-Answer" data-answer="5">
						<div class="questions-flex_alt">
							<div class="questions-container">
								<figure class="questions-img-container">
									<img src="/img/gift-help_min.png" alt="Site logo" class="questions_img">
								</figure>
								<article class="questions-nav">
									<h4 class="questions-title_nav">Промокоды</h4>
									<ul class="questions-list">
										<li class="questions-list-li"><a href="#promo" class="questions-list-li_link" data-answer="3">Что такое промо-код?</a></li>
										<li class="questions-list-li"><a href="#promo" class="questions-list-li_link" data-answer="4">Как получить промо-код?</a></li>
										<li class="questions-list-li"><a href="#promo" class="questions-list-li_link" data-answer="5">Куда вводить промо-код?</a></li>
									</ul>
								</article>
							</div>
							<article class="question-answer">
								<h4 class="questions-answer_title">Как получить промо-код?</h4>
								<p class="question-answer_text">Получить промокод можно несколькими способами: 	<br><br>

				 1. Подписаться на рассылку и вам в личные сообщения будет периодически присылать коды. ( <a style="color:black;text-decoration: underline;" target="_blank" href="<?=$group?>?w=app5748831_-172831333">Подписаться</a> )<br>
				2. Следить за постами в <a target="_blank" style="color:black;text-decoration: underline;" href="<?=$group?>">группе</a>. <br>
				3. Смотреть прямые трансляции блогеров по азартной тематике.  <br><br>

				Также, наши промо-коды публикуют некоторые группы Вконтакте, которые посвящены заработку.</p>
							</article>
						</div>
						<figure class="questions-text-group questions-text-group__alt">
							<a href="#" class="questins_add questins_add__before" data-answer="5">Вернуться</a>
								<span class="questions-text-group_alt">
									<a href="<?=$site_support?>" class="questins_add">Техническая поддержка</a>
									<a href="<?=$group?>" target="_blank" class="questins_add questins_add__mleft">Группа Вконтакте</a>
								</span>
						</figure>
					</div>
					<!-- Ответ  6 -->
					<div class="Sure-to-Answer" data-answer="6">
						<div class="questions-flex_alt">
							<div class="questions-container">
								<figure class="questions-img-container">
									<img src="/img/gift-help_min.png" alt="Site logo" class="questions_img">
								</figure>
								<article class="questions-nav">
									<h4 class="questions-title_nav">Промокоды</h4>
									<ul class="questions-list">
										<li class="questions-list-li"><a href="#promo" class="questions-list-li_link" data-answer="3">Что такое промо-код?</a></li>
										<li class="questions-list-li"><a href="#promo" class="questions-list-li_link" data-answer="4">Как получить промо-код?</a></li>
										<li class="questions-list-li"><a href="#promo" class="questions-list-li_link" data-answer="5">Куда вводить промо-код?</a></li>
									</ul>
								</article>
							</div>
							<article class="question-answer">
								<h4 class="questions-answer_title">Куда вводить промо-код?</h4>
								<p class="question-answer_text">Чтобы активировать промо-код вам нужно пройти регистрацию и перейти в <br> <a target="_blank" style="color:black;text-decoration: underline;" href="/profile">личный кабинет</a>.<br><br>  Введите код в поле для активации,которое расположено ниже статистики, пройдите каптчу и получите награду. </p>
							</article>
						</div>
						<figure class="questions-text-group questions-text-group__alt">
							<a href="#" class="questins_add questins_add__before" data-answer="6">Вернуться</a>
								<span class="questions-text-group_alt">
									<a href="<?=$site_support?>" class="questins_add">Техническая поддержка</a>
									<a href="<?=$group?>" target="_blank" class="questins_add questins_add__mleft">Группа Вконтакте</a>
								</span>
						</figure>
					</div>


					<!-- Ответ  7 -->
					<div class="Sure-to-Answer" data-answer="6">
						<div class="questions-flex_alt">
							<div class="questions-container">
								<figure class="questions-img-container">
									<img src="/img/User-help_min.png" alt="Site logo" class="questions_img">
								</figure>
								<article class="questions-nav">
									<h4 class="questions-title_nav">Профиль</h4>
									<ul class="questions-list">
										<li class="questions-list-li"><a href="#profile" class="questions-list-li_link" data-answer="6">Описание кабинета</a></li>
								
										<li class="questions-list-li"><a href="#profile" class="questions-list-li_link" data-answer="8">Реферальная программа</a></li>
									</ul>
								</article>
							</div>
							<article class="question-answer">
								<h4 class="questions-answer_title">Описание кабинета</h4>
								<p class="question-answer_text">В личном кабинете вы можете выполнять одни из основных функций сайта. Здесь представлена ваша статистика в полном объёме: 
		сколько выиграно, проиграно, сыграно всего игр. Мы предоставляем каждому человеку бонусы каждый день в <a style="color:black;text-decoration: underline;" href="/bonus">этом</a> разделе. <br><br>

		<b>Остальные функции: </b><br>
		- Пополнение баланса<br>
		- Вывод средств<br>
		- Просмотр уровня<br>
		- Реферальная программа<br></p>
							</article>
						</div>
						<figure class="questions-text-group questions-text-group__alt">
							<a href="#" class="questins_add questins_add__before" data-answer="6">Вернуться</a>
								<span class="questions-text-group_alt">
									<a href="<?=$site_support?>" class="questins_add">Техническая поддержка</a>
									<a href="<?=$group?>" target="_blank" class="questins_add questins_add__mleft">Группа Вконтакте</a>
								</span>
						</figure>
					</div>
					<!-- Ответ  8 -->
					<div class="Sure-to-Answer" data-answer="7">
						<div class="questions-flex_alt">
							<div class="questions-container">
								<figure class="questions-img-container">
									<img src="/img/User-help_min.png" alt="Site logo" class="questions_img">
								</figure>
								<article class="questions-nav">
									<h4 class="questions-title_nav">Профиль</h4>
									<ul class="questions-list">
										<li class="questions-list-li"><a href="#profile" class="questions-list-li_link" data-answer="6">Описание кабинета</a></li>
							
										<li class="questions-list-li"><a href="#profile" class="questions-list-li_link" data-answer="8">Реферальная программа</a></li>
									</ul>
								</article>
							</div>
							<article class="question-answer">
								<h4 class="questions-answer_title">Реферальная программа</h4>
								<p class="question-answer_text">На нашем сайте присутствует реферальная система. Основана она на промо-кодах, которые вы можете распространять. Чтобы начать зарабатывать придерживайтесь данной инструкции:

		<br><br>

					
		1) Перейдите в раздел <a target="_blank" style="color:black;text-decoration: underline;" href="/profile">рефералы</a>.<br>
		2) Скопируйте свой реферальный код . Ваш код: x4763x

								

		<br>
		3) Передайте код человеку, которого вы хотите пригласить.<br>
		4) Его задача ввести ваш реферальный код в <a target="_blank" style="color:black;text-decoration: underline;" href="/ref">этот</a> раздел (Форма справа)<br><br>
		Вы будете получать пассивный доход - 10% от всех его пополнений на сайте.</p>
							</article>
						</div>
						<figure class="questions-text-group questions-text-group__alt">
							<a href="#" class="questins_add questins_add__before" data-answer="7">Вернуться</a>
								<span class="questions-text-group_alt">
									<a href="<?=$site_support?>" class="questins_add">Техническая поддержка</a>
									<a href="<?=$group?>" target="_blank" class="questins_add questins_add__mleft">Группа Вконтакте</a>
								</span>
						</figure>
					</div>
					<!-- Ответ  9 -->
					<div class="Sure-to-Answer" data-answer="8">
						<div class="questions-flex_alt">
							<div class="questions-container">
								<figure class="questions-img-container">
									<img src="/img/User-help_min.png" alt="Site logo" class="questions_img">
								</figure>
								<article class="questions-nav">
									<h4 class="questions-title_nav">Профиль</h4>
									<ul class="questions-list">
										<li class="questions-list-li"><a href="#profile" class="questions-list-li_link" data-answer="6">Описание кабинета</a></li>
								
										<li class="questions-list-li"><a href="#profile" class="questions-list-li_link" data-answer="8">Реферальная программа</a></li>
									</ul>
								</article>
							</div>
							<article class="question-answer">
								<h4 class="questions-answer_title">Реферальная программа</h4>
								<p class="question-answer_text">На нашем сайте присутствует реферальная система. Основана она на промо-кодах, которые вы можете распространять. Чтобы начать зарабатывать придерживайтесь данной инструкции:

		<br><br>

					
		1) Перейдите в раздел <a target="_blank" style="color:black;text-decoration: underline;" href="/profile">рефералы</a>.<br>
		2) Скопируйте свой реферальный код . Ваш код: x4763x

								

		<br>
		3) Передайте код человеку, которого вы хотите пригласить.<br>
		4) Его задача ввести ваш реферальный код в <a target="_blank" style="color:black;text-decoration: underline;" href="/ref">этот</a> раздел (Форма справа)<br><br>
		Вы будете получать пассивный доход - 10% от всех его пополнений на сайте.</p>
							</article>
						</div>
						<figure class="questions-text-group questions-text-group__alt">
							<a href="#" class="questins_add questins_add__before" data-answer="8">Вернуться</a>
								<span class="questions-text-group_alt">
									<a href="<?=$site_support?>" class="questins_add">Техническая поддержка</a>
									<a href="<?=$group?>" target="_blank" class="questins_add questins_add__mleft">Группа Вконтакте</a>
								</span>
						</figure>
					</div>
					<!-- Ответ  10 -->
					<div class="Sure-to-Answer" data-answer="9">
						<div class="questions-flex_alt">
							<div class="questions-container">
								<figure class="questions-img-container">
									<img src="/img/money_twenty-help_min.png" alt="Site logo" class="questions_img">
								</figure>
								<article class="questions-nav">
									<h4 class="questions-title_nav">Вывод</h4>
									<ul class="questions-list">
										<li class="questions-list-li"><a href="#payOut" class="questions-list-li_link" data-answer="9">Как заказать вывод?</a></li>
										<li class="questions-list-li"><a href="#payOut" class="questions-list-li_link" data-answer="10">Сколько длится вывод ?</a></li>
										<li class="questions-list-li"><a href="#payOut" class="questions-list-li_link" data-answer="11">Что такое автовывод ?</a></li>
									</ul>
								</article>
							</div>
							<article class="question-answer">
								<h4 class="questions-answer_title">Как заказать вывод?</h4>
								<p class="question-answer_text">Чтобы заказать вывод на вашем балансе должно быть <b>более 30 D.</b> <br><br>Перейдите в личный кабинет на <a target="_blank" style="color:black;text-decoration: underline;" href="/winthdraw">эту</a> страницу. Введите сумму для вывода и кошелёк. Будьте внимательны !  <br><br>
		Также, вы можете отменить выплату, если ошиблись данными. Чтобы это сделать кликните на кнопку "отмена" в таблице ваших выводов. <br>*В таком случае комиссия не компенсируется. </p>
							</article>
						</div>
						<figure class="questions-text-group questions-text-group__alt">
							<a href="#" class="questins_add questins_add__before" data-answer="9">Вернуться</a>
								<span class="questions-text-group_alt">
									<a href="<?=$site_support?>" class="questins_add">Техническая поддержка</a>
									<a href="<?=$group?>" target="_blank" class="questins_add questins_add__mleft">Группа Вконтакте</a>
								</span>
						</figure>
					</div>
					<!-- Ответ  11 -->
					<div class="Sure-to-Answer" data-answer="10">
						<div class="questions-flex_alt">
							<div class="questions-container"> 
								<figure class="questions-img-container">
									<img src="/img/money_twenty-help_min.png" alt="Site logo" class="questions_img">
								</figure>
								<article class="questions-nav">
									<h4 class="questions-title_nav">Вывод</h4>
									<ul class="questions-list">
										<li class="questions-list-li"><a href="#payOut" class="questions-list-li_link" data-answer="9">Как заказать вывод?</a></li>
										<li class="questions-list-li"><a href="#payOut" class="questions-list-li_link" data-answer="10">Сколько длится вывод ?</a></li>
										<li class="questions-list-li"><a href="#payOut" class="questions-list-li_link" data-answer="11">Что такое автовывод ?</a></li>
									</ul>
								</article>
							</div>
							<article class="question-answer">
								<h4 class="questions-answer_title">Сколько длится вывод ?</h4>
								<p class="question-answer_text">Вывод производится в течение 24-х часов. ( В выходные и праздники возможны задержки  ) Если у вас возникли какие-либо проблемы, то обратитесь в нашу техническую поддержку. ( <a style="text-decoration: underline;color: black" target="_blank" href="https://vk.com/im?media=&amp;sel=-172831333">Сообщения</a> ) </p>
							</article>
						</div>
						<figure class="questions-text-group questions-text-group__alt">
							<a href="#" class="questins_add questins_add__before" data-answer="10">Вернуться</a>
								<span class="questions-text-group_alt">
									<a href="<?=$site_support?>" class="questins_add">Техническая поддержка</a>
									<a href="<?=$group?>" target="_blank" class="questins_add questins_add__mleft">Группа Вконтакте</a>
								</span>
						</figure>
					</div>
					<!-- Ответ  12 -->
					<div class="Sure-to-Answer" data-answer="11">
						<div class="questions-flex_alt">
							<div class="questions-container">
								<figure class="questions-img-container">
									<img src="/img/money_twenty-help_min.png" alt="Site logo" class="questions_img">
								</figure>
								<article class="questions-nav">
									<h4 class="questions-title_nav">Вывод</h4>
									<ul class="questions-list">
										<li class="questions-list-li"><a href="#payOut" class="questions-list-li_link" data-answer="9">Как заказать вывод?</a></li>
										<li class="questions-list-li"><a href="#payOut" class="questions-list-li_link" data-answer="10">Сколько длится вывод ?</a></li>
									</ul>
								</article>
							</div>
						
						</div>
						<figure class="questions-text-group questions-text-group__alt">
							<a href="#" class="questins_add questins_add__before" data-answer="11">Вернуться</a>
								<span class="questions-text-group_alt">
									<a href="<?=$site_support?>" class="questins_add">Техническая поддержка</a>
									<a href="<?=$group?>" target="_blank" class="questins_add questins_add__mleft">Группа Вконтакте</a>
								</span>
						</figure>
					</div>
					<!-- Ответ  13 -->
					<div class="Sure-to-Answer" data-answer="12">
						<div class="questions-flex_alt">
							<div class="questions-container">
								<figure class="questions-img-container">
									<img src="/img/cash-help_min.png" alt="Site logo" class="questions_img">
								</figure>
								<article class="questions-nav">
									<h4 class="questions-title_nav">Пополнение</h4>
									<ul class="questions-list">
										<li class="questions-list-li"><a href="#pay" class="questions-list-li_link" data-answer="12">Как пополнить баланс?</a></li>
										<li class="questions-list-li"><a href="#pay" class="questions-list-li_link" data-answer="13">Не пришли деньги</a></li>
									</ul>
								</article>
							</div>
							<article class="question-answer">
								<h4 class="questions-answer_title">Как пополнить баланс?</h4>
								<p class="question-answer_text">Баланс на нашем сайте вы можете пополнить абсолютно разными способами: Яндекс.Деньги, Приват24, ЕвроСеть и т.п Чтобы пополнить баланс, перейдите в свой <a target="_blank" style="color:black;text-decoration: underline;" href="/profile">личный кабинет</a> и нажмите "<a target="_blank" style="color:black;text-decoration: underline;" href="/pay">Пополнить баланс</a>"</p>
							</article>
						</div>
						<figure class="questions-text-group questions-text-group__alt">
							<a href="#" class="questins_add questins_add__before" data-answer="12">Вернуться</a>
								<span class="questions-text-group_alt">
									<a href="<?=$site_support?>" class="questins_add">Техническая поддержка</a>
									<a href="<?=$group?>" target="_blank" class="questins_add questins_add__mleft">Группа Вконтакте</a>
								</span>
						</figure>
					</div>
					<!-- Ответ  14 -->
					<div class="Sure-to-Answer" data-answer="13">
						<div class="questions-flex_alt">
							<div class="questions-container">
								<figure class="questions-img-container">
									<img src="/img/cash-help_min.png" alt="Site logo" class="questions_img">
								</figure>
								<article class="questions-nav">
									<h4 class="questions-title_nav">Пополнение</h4>
									<ul class="questions-list">
										<li class="questions-list-li"><a href="#pay" class="questions-list-li_link" data-answer="12">Как пополнить баланс?</a></li>
										<li class="questions-list-li"><a href="#pay" class="questions-list-li_link" data-answer="13">Не пришли деньги</a></li>
									</ul>
								</article>
							</div>
							<article class="question-answer">
								
								<h4 class="questions-answer_title">Не пришли деньги</h4>
								<p class="question-answer_text">
					
					Если вы пополнили баланс и в течение 10 минут он у вас не обновился, то 
					в срочном порядке сообщите в нашу техническую поддержку ( <a target="_blank" style="color:black;text-decoration: underline;" href="https://vk.com/im?media=&amp;sel=-172831333">сообщения</a> ) Наши специалисты помогут вам .</p>
							</article>
						</div>
						<figure class="questions-text-group questions-text-group__alt">
							<a href="#" class="questins_add questins_add__before" data-answer="13">Вернуться</a>
								<span class="questions-text-group_alt">
									<a href="<?=$site_support?>" class="questins_add">Техническая поддержка</a>
									<a href="<?=$group?>" target="_blank" class="questins_add questins_add__mleft">Группа Вконтакте</a>
								</span>
						</figure>
					</div>
					<!-- Ответ  15 -->

					<!-- Ответ  16 -->
					<!-- Ответ  17 -->





					<!-- вопрос -->
					<div class="Sure-to-Js">
					<div class="questions-flex">
							<div class="questions-container">
							<figure class="questions-img-container">
								<img src="/img/logo-help_min.png" alt="Site logo" class="questions_img">
							</figure>
							<article class="questions-nav">
								<h4 class="questions-title_nav">Общие</h4>
								<ul class="questions-list">
									<li class="questions-list-li"><a href="#about" class="questions-list-li_link" data-answer="0">Что такое <?=$sitename?> ?</a></li>
									<li class="questions-list-li"><a href="#about" class="questions-list-li_link" data-answer="1">Как генерируется число?</a></li>
									<li class="questions-list-li"><a href="#about" class="questions-list-li_link" data-answer="2">Рейтинг и награды</a></li>
								</ul>
							</article>
						</div>
						<div class="questions-container">
							<figure class="questions-img-container">
								<img src="/img/gift-help_min.png" alt="Gift image" class="questions_img">
							</figure>
							<article class="questions-nav">
								<h4 class="questions-title_nav">Промокоды</h4>
								<ul class="questions-list">
									<li class="questions-list-li"><a href="#promo" class="questions-list-li_link" data-answer="3">Что такое промо-код?</a></li>
									<li class="questions-list-li"><a href="#promo" class="questions-list-li_link" data-answer="4">Как получить промо-код?</a></li>
									<li class="questions-list-li"><a href="#promo" class="questions-list-li_link" data-answer="5">Куда вводить промо-код?</a></li>
								</ul>
							</article>
						</div>
						<div class="questions-container">
							<figure class="questions-img-container">
								<img src="/img/User-help_min.png" alt="Profile" class="questions_img"> 
							</figure>
							<article class="questions-nav">
								<h4 class="questions-title_nav">Профиль</h4>
								<ul class="questions-list">
									<li class="questions-list-li"><a href="#profile" class="questions-list-li_link" data-answer="6">Описание кабинета</a></li>

									<li class="questions-list-li"><a href="#profile" class="questions-list-li_link" data-answer="8">Реферальная программа</a></li>
								</ul>
							</article>
						</div>
						<div class="questions-container">
							<figure class="questions-img-container">
								<img src="/img/money_twenty-help_min.png" alt="Money and cash" class="questions_img">
							</figure>
							<article class="questions-nav">
								<h4 class="questions-title_nav">Вывод</h4>
								<ul class="questions-list">
									<li class="questions-list-li"><a href="#payOut" class="questions-list-li_link" data-answer="9">Как заказать вывод?</a></li>
									<li class="questions-list-li"><a href="#payOut" class="questions-list-li_link" data-answer="10">Сколько длится вывод ?</a></li>
									<li class="questions-list-li"><a href="#payOut" class="questions-list-li_link" data-answer="11">Что такое автовывод ?</a></li>
								</ul>
							</article>
						</div>
						<div class="questions-container">
							<figure class="questions-img-container">
								<img src="/img/cash-help_min.png" alt="Cash" class="questions_img">
							</figure>
							<article class="questions-nav">
								<h4 class="questions-title_nav">Пополнение</h4>
								<ul class="questions-list">
			<li class="questions-list-li"><a href="#pay" class="questions-list-li_link" data-answer="12">Как пополнить баланс?</a></li>
										<li class="questions-list-li"><a href="#pay" class="questions-list-li_link" data-answer="13">Не пришли деньги</a></li>
								</ul>
							</article>
						</div>
						<div class="questions-container">
							<figure class="questions-img-container">
								<img src="/img/prize-help_min.png" alt="Level" class="questions_img">
							</figure>

						


						</div>
					</div>
			<a href="<?=$site_support?>" class="questins_add questins_add__center">Отправить запрос в техническую поддержку</a>
					</div>
				</div>
		</main>
	
<script src="/js/rooms/modal.js?ver=1578047019"></script><div class="wrap_footer footer-bg">
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
    

    <div class="modal-notification">
    </div>
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






<script async="" src="/js/console.js"></script>
<noscript><link rel="stylesheet" href="/public/deferred.css"></noscript>
<script defer="" src="../js/js-packed.js"></script>

<script defer="" src="/js/newPopUp.js?1578047019"></script>


      <div at-magnifier-wrapper=""><div class="at-theme-light"><div class="at-base notranslate" translate="no"><div class="Z1-AJ" style="top: 0px; left: 0px;"></div></div></div></div><div class="mallbery-caa" style="z-index: 2147483647 !important; text-transform: none !important; position: fixed;"></div></body></html>