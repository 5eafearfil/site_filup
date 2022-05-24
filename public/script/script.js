// Скрипт FAQ accordions
let title = document.querySelectorAll('.faq_child_title'),
  txt = document.querySelectorAll('.faq_child_txt');
title.__proto__.forEach = [].__proto__.forEach;

let active;
title.forEach(function(item, i, panelItem, ) {
  item.addEventListener('click', function(e) {
    //show new thingy;
    this.classList.add('height');
    this.nextElementSibling.classList.add('height');
    //hide old thingy
    if (active) {
      active.classList.remove('height');
      active.nextElementSibling.classList.remove('height');
    }
    //update thingy
    active = (active === this) ? 0 : this;
  });
});

