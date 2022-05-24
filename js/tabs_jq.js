$(function () {
    var tab = $('.tab-nav_elem');
    tab.on('click', function (event) {
        $('.table').removeClass('achive-none');
        $('.table[data-tab=' + $(this).attr('data-tab') + ']').toggleClass('achive-none');
    })
});

