var domainSite = document.domain; 


$('.years').on('click', function(event) {
	event.preventDefault();
	$('.modal_info').addClass('modal-overflow-clouse');
	var Data = new Date();
	Data.setDate(Data.getDate() + 7);
	document.cookie = "year=true; expires="+Data+"; path=/;domain="+domainSite+";secure=TRUE;";
});


$("#stavka").keyup(function () {
	var summ = $("#stavka").val();
	var win = $('#winner').html();
	var summa = summ * win;
	$("#win").text(summa.toFixed(2))
});
$('body').on('click', "#x2", function (e) {
	var that = $(this);
	var order = that.data('order');
	var b = $(this),
	c = b.attr("data-order");
	var summ = $("#stavka").val();
	if (c == '1') {
		if (summ == 0) {
			summ = 0.5
		}
		var log = summ * 2;
		var wineruser = $('#winner').text();
		var wins = log * wineruser;
		$("#stavka").val(Math.round(log));
		$("#win").text(wins.toFixed(2))
	} else {
		var log = summ / 2;
		var wineruser = $('#winner').text();
		var wins = log * wineruser;
		$("#stavka").val(Math.round(log));
		$("#win").text(wins.toFixed(2))
	}
});



function rageFunction() {
	val = $('.range').val();
	$('.range').css({
		'background': '-webkit-linear-gradient(left ,#F10260 0%,#F10260 ' + val + '%,#08E547 ' + val + '%, #08E547 100%)'
	});
	var chance = (100 - $('#r1').val()).toFixed(2);
	var viplata = 99 / chance;
	$('#one').html(chance);
	$('#winner').html(viplata.toFixed(2));
	var summ = $("#stavka").val();
	var win1 = $('#winner').html();
	var summa = summ * win1;
	$("#win").text(summa.toFixed(2))
}


var timerId;
var timerId1;

$('#game_form').submit(function (e) {


	 var result = document.cookie.match ( '(^|;) ?user_games=([^;]*)(;|$)' );

     if (result) {
     	$('.modal-wrap').addClass('show');
     	return false;
     }


    let game = (parseFloat($('#demo_game').val()) + 1);
    $('#demo_game').val(game);

    if (game > 3) { // end game
    	var Data = new Date();
	    Data.setDate(Data.getDate() + 1);
	    document.cookie = "user_games=true; expires="+Data+"; path=/;secure=TRUE;";

	    $('.modal-wrap').addClass('show');
    }


	e.preventDefault();
	clearTimeout(timerId);
	$('#play').html('КИДАЕМ КОСТИ..');
	$('#play').prop('disabled', true);
	$.ajax({
		data: $(this).serialize(),
		url: "../app/demo.php",
		type: 'post',
		dataType: 'json',
		success: function (data) {
			timerId1 = setTimeout(function () {
				if (data.status == 'success') {
					$('.index__home__indicator__inner').show();
					$('.index__home__indicator__inner__number').animate({
						'left': $('#r1').width() / 100 * data.chislo + 'px'
					},
					100);
					$('.index__home__indicator__inner__number__roll>span').html(data.chislo);
					if (data.win == 1 || data.win == 3) {
						$('.index__home__indicator__inner__number__roll').removeClass('is-negative');
						$('.index__home__indicator__inner__number__roll').addClass('is-positive')
					} else {
						$('.index__home__indicator__inner__number__roll').addClass('is-negative');
						$('.index__home__indicator__inner__number__roll').removeClass('is-positive')
					}
					timerId = setTimeout(function () {
						$('.index__home__indicator__inner').fadeOut('fast')
					},
					10000)
				} else {
					
					showModal(data.status, 'red');
				}
				$('#play').html('ИГРАТЬ');
				$('#play').prop('disabled', false)
			},
			200)
		}
	})
});



