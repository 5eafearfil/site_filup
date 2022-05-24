function valid(form) {
	var v = grecaptcha.getResponse();
	if (v.length == 0) {
		//$('#red').html('Подтвердите каптчу');

		showModal('Подтвердите каптчу' , 'red');
		return false
	} else {
		var data = $('#sup').serialize();
		$.post('/support.php', data, function (data) {
			if (data.status == 'success') {
				$('#red').remove();
				//$('#green').text('Отправлено!');

				showModal('Отправлено' , 'green');

				document.getElementById('sup').reset();

			
				grecaptcha.reset()
			} else {
				//$('#red').html(data.status)

				showModal(data.status , 'red');
			}
		})
	}
}