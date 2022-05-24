$('.rate-navigation_link__left').on('click', function (e) {
	$('.rate-sct-block-cart').remove();
	$('#table_rating').hide('slow');
	var csrf = document.getElementById('rating_post').value;
	$.post('/app/rating_been.php', {
		csrf: csrf
	},
	function (data) {
		if (data.status == 'success') {
			$('#mes').hide('slow');
			$('.rate-sct-block').append(data.rating);
			$('.rate-navigation').html('<a href="/rating/" class="rate-navigation_link rate-navigation_link__right">Вернуться</a><a href="/" class="rate-navigation_link rate-navigation_link__right">Перейти к игре</a>');
			$('#month').text(data.month);
			setTimeout($('#table_rating').remove(), 2000);
			$('#tabls').html('<thead><tr class="table_bbg__grey"><th class="table_head table-rating  table_head_achive">Место</th><th class="table_head table-rating  table_head_achive">Пользователь</th><th class="table_head table-rating  table_head_achive none">Сыграно игр</th><th class="table_head table-rating  table_head_achive">Выведено</th></tr></thead><tbody id="table_rating">' + data.html + '</tbody>')
		} else {
			showModal(data.status, 'red');
		}
	})
});