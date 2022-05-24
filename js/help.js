const 	questions = document.querySelectorAll('.questions-list-li_link'),
		answer = document.querySelectorAll('.Sure-to-Answer'),
		questBlock = document.querySelector('.Sure-to-Js'),
		BackLink = document.querySelectorAll('.questins_add__before');

	for (let i = 0; i < questions.length; i++) {
		let dataAttr = questions[i].getAttribute('data-answer');
		questions[i].addEventListener("click", function() {
		for (let i = 0; i < answer.length; i++) {
			answer[i].classList.remove('condescension');
		}    
        answer[dataAttr].classList.add('condescension');
        questBlock.classList.add('disabled-block');
		});
		BackLink[dataAttr].addEventListener('click', function() {
			for (let i = 0; i < answer.length; i++) {
				answer[i].classList.remove('condescension');
				questBlock.classList.remove('disabled-block');
				questBlock.classList.remove('disappearance');
			}
		});
	}



const locationUrl = window.location.href,
	  AboutUrl = /#about/.test(locationUrl),
	  PromoUrl = /#promo/.test(locationUrl),
	  ProfileUrl = /#profile/.test(locationUrl),
	  PayOutUrl = /#payOut/.test(locationUrl),
	  PayUrl = /#pay/.test(locationUrl),
	  LvlUrl = /#lvl/.test(locationUrl);
	  

	  if( AboutUrl === true) {
		answer[0].classList.add('condescension');
		questBlock.classList.add('disabled-block');
	  } else if ( PromoUrl === true) {
	  	answer[3].classList.add('condescension');
	  	questBlock.classList.add('disabled-block');
	  } else if ( ProfileUrl === true) {
	  	answer[6].classList.add('condescension');
	  	questBlock.classList.add('disabled-block');
	  } else if ( PayOutUrl === true) {
	  	answer[9].classList.add('condescension');
	  	questBlock.classList.add('disabled-block');
	  } else if ( PayUrl === true) {
	  	answer[12].classList.add('condescension');
	  	questBlock.classList.add('disabled-block');
	  } 

	  else if ( LvlUrl === true) {
	  	answer[14].classList.add('condescension');
	  	questBlock.classList.add('disabled-block');
	  } 