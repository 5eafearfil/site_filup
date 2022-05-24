var color = "";
$('.navs-toggle').on('click', function(event) {
  var Data = new Date();
  Data.setDate(Data.getDate() + 7);
  document.cookie = "chat=true; path=/; max-age=604800";
});
$('#navs-toggle').on('click', function(event) {
  var Data = new Date();
  Data.setDate(Data.getDate() + 7);
  document.cookie = "chat=true; path=/; max-age=604800";
});
$('.years').on('click', function(event) {
  event.preventDefault();
  $('.modal_info').addClass('modal-overflow-clouse');
  var Data = new Date();
  Data.setDate(Data.getDate() + 7);
  document.cookie = "year=true; path=/; max-age=604800";
});
function select_team(team,hiden) {
  $('#error_battle').hide();
  color = team;
  // #8c66ff
  var per = $("#BetPerBattle").val();
  var selectedclr = $("#colorselected").val();
  if(color == "blue") {
    var chance = (0 + per) / 100;
    var btncolor = "#0e6fee";
    var colorname = '<b><font color="' +btncolor+ '">синий</font></b>';
  }
  if(color == "red") {
    var chance = (100 - per) / 100;
    var btncolor = "#f9307e";
    var colorname = '<b><font color="' +btncolor+ '">красный</font></b>';
  }
  build(chance);
  $("#" +color+ "select").css('border', '3px solid ' +btncolor );
  $("#" +hiden+ "select").css('border', '3px solid #d2dde9');
  if ( selectedclr == 0 ){
  $('#BetPerBattle').attr('disabled', false);
  $('#minus_per').attr('disabled', false);
  $('#plus_per').attr('disabled', false);
  showModal('Вы выбрали ' + colorname + ' цвет! Можете менять процент.', 'green');
   $("#colorselected").val(1);
}else{
  showModal('Вы выбрали ' + colorname + ' цвет!', 'green');
}
}
function profitbattle() {
  $('#ProfitBattle').html(((100 / $('#BetPerBattle').val()) * $('#BetSizeBattle').val()).toFixed(2)); 
}
function battlechance(inp) {
  $('#MinRangeBattle').html(Math.floor(($('#BetPerBattle').val() / 100) * 999));
  $('#MaxRangeBattle').html(999 - Math.floor(($('#BetPerBattle').val() / 100) * 999));
  if(color == "") {
    inp.value = 50;
    $('#MinRangeBattle').html(Math.floor(($('#BetPerBattle').val() / 100) * 999));
   $('#MaxRangeBattle').html(999 - Math.floor(($('#BetPerBattle').val() / 100) * 999));
    var per = $("#BetPerBattle").val();
    var chance = (0 + per) / 100;
    build(chance);  
showModal('Выберите цвет.', 'red');
    
  }
  if(inp.value == 98) {
    $('#MinRangeBattle').html(Math.floor(($('#BetPerBattle').val() / 100) * 999));
   $('#MaxRangeBattle').html(999 - Math.floor(($('#BetPerBattle').val() / 100) * 999));
   var per = $('#BetPerBattle').val();
   if(color == "blue") {
   var chance = (0 + per) / 100;
  }
  if(color == "red") {
    
   var chance = (100 - per) / 100;
  }
  build(chance);
  }
  if(inp.value > 98) {
   inp.value = 98; 
   $('#MinRangeBattle').html(Math.floor(($('#BetPerBattle').val() / 100) * 999));
   $('#MaxRangeBattle').html(999 - Math.floor(($('#BetPerBattle').val() / 100) * 999));
   var per = $('#BetPerBattle').val();
   if(color == "blue") {
   var chance = (0 + per) / 100;
  }
  if(color == "red") {
    
   var chance = (100 - per) / 100;
  }
  build(chance);
  }
  if(inp.value < 2) {
   $('#MinRangeBattle').html(Math.floor(($('#BetPerBattle').val() / 100) * 999));
   $('#MaxRangeBattle').html(999 - Math.floor(($('#BetPerBattle').val() / 100) * 999));
   var per = $('#BetPerBattle').val();
   if(color == "blue") {
   var chance = (0 + per) / 100;
  }
  if(color == "red") {
   var chance = (100 - per) / 100;
  }
  build(chance);
  }
  // если все правильно, то крутим баттл
  var per = $('#BetPerBattle').val();
  if($('#BetPerBattle').val() < 98 && $('#BetPerBattle').val() > 1.99) {
  if(color == "blue") {
    var chance = (0 + per) / 100;
  }
  if(color == "red") {
    var chance = (100 - per) / 100;
  }
  build(chance);
}
}
function battlebet() {
  $('#createBetBattle').prop('disabled', true);
  $('#BetPerBattle').prop('disabled', true);
    $('#BetSizeBattle').prop('disabled', true);
    $('#minus_per').prop('disabled', true);
  $('#plus_per').prop('disabled', true);
    $('#max_dice').prop('disabled', true);
    $('#x2_dice').prop('disabled', true);
    $('#m2_dice').prop('disabled', true);
          
    $('#redselect').prop('disabled', true);
      $('#blueselect').prop('disabled', true);
  $('#createBetBattle').text('Ожидайте...');
  $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {

                    },  
                                                                                data: {
                                                                                    type: "battledice",
                                                                                     per: $('#BetPerBattle').val(),
                                                                                     sum: $('#BetSizeBattle').val(),
                                                                                     team: color
          
                                                                          
                                           
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                          if (obj.success == "fatal") {
  $('#createBetBattle').prop('disabled', false);
  $('#BetPerBattle').prop('disabled', false);
 $('#BetSizeBattle').prop('disabled', false);    
     $('#redselect').prop('disabled', false);
      $('#blueselect').prop('disabled', false); 
       $('#minus_per').prop('disabled', false);
  $('#plus_per').prop('disabled', false);
    $('#max_dice').prop('disabled', false);
    $('#x2_dice').prop('disabled', false);
    $('#m2_dice').prop('disabled', false);
   
  $('#createBetBattle').text('Сделать ставку');                                       
 showModal(obj.error, 'red');
                                          }
                                          if (obj.success != "fatal"){
                                            
             $("#circle").css('transition', 'transform 3.9s cubic-bezier(0.15, 0.15, 0, 1)');
$("#circle").css('transform', 'rotate(' + (3600 + obj.number * 0.36) + 'deg)');
setTimeout(function() {
  $("#circle").css('transition', 'transform 0s');
  
  $("#circle").hide();
  $("#circle").css('transform', 'rotate(0deg)');
  $("#circle").fadeIn(900);
  $('#createBetBattle').prop('disabled', false);
  $('#BetPerBattle').prop('disabled', false);
 $('#BetSizeBattle').prop('disabled', false);   
$('#redselect').prop('disabled', false);
$('#blueselect').prop('disabled', false);
  $('#createBetBattle').prop('disabled', false);
  $('#BetPerBattle').prop('disabled', false);
 $('#BetSizeBattle').prop('disabled', false);    
     $('#redselect').prop('disabled', false);
      $('#blueselect').prop('disabled', false); 
       $('#minus_per').prop('disabled', false);
  $('#plus_per').prop('disabled', false);
    $('#max_dice').prop('disabled', false);
    $('#x2_dice').prop('disabled', false);
    $('#m2_dice').prop('disabled', false);
 $('#createBetBattle').text('Сделать ставку'); 
}, 4900);
 setTimeout(function() {
 $('#userBalance').attr('myBalance', obj.new_balance);
  updateBalance(obj.balance, obj.new_balance);
   
 }, 3900);       
                                            if (obj.success == "success") {
          setTimeout(function() {                                    

 showModal("Выиграли <b>"+obj.win+"</b>", 'green');
            
          }, 3900);                                          
                                            }
                                          if (obj.success == "error") {
                // error
                                            
 
    setTimeout(function() {                                           
  
   showModal(obj.error, 'red');
  }, 3900);                                          
                                            }
                                        } 
  }
           
   });
       
      }

function build(blue_cur) {
  var blue = d3.arc()
      .innerRadius(155)
      .outerRadius(180)
      .startAngle(0)
      .endAngle(2 * Math.PI * blue_cur);
  $("#blue").attr('d', blue());
  var red = d3.arc()
      .innerRadius(155)
      .outerRadius(180)
      .startAngle(2 * Math.PI * blue_cur)
      .endAngle(2 * Math.PI);
  $("#red").attr('d', red());
}
function deposit_default() {
   $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
$('#depositButton').html('<div class="loader" style="height:23px;width:23px"></div>');  
$("#error_deposit").hide();
                    },  
                                                                                data: {
                                                                                    type: "deposit",
           sum: $("#depositSize").val()
                                                                          
                                           
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                 $('#depositButton').html('Далее');                             
                  window.location.href = obj.locations;
                                                                return 
                                            }else{
                 $('#depositButton').html('Далее');                              
                $("#error_deposit").show();                               
                $("#error_deposit").html(obj.error); 
                                            }
                                        }   
   });
}
function deposit_default() {
   $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
$('#depositButton').html('<div class="loader" style="height:23px;width:23px"></div>');  
$("#error_deposit").hide();
                    },  
                                                                                data: {
                                                                                    type: "deposit",
           sum: $("#depositSize").val()
                                                                          
                                           
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                 $('#depositButton').html('Далее');                             
                  window.location.href = obj.locations;
                                                                return 
                                            }else{
                 $('#depositButton').html('Далее');                              
                $("#error_deposit").show();                               
                showModal(obj.error, 'red');//$("#error_deposit").html(obj.error); 
                                            }
                                        }   
   });
   
}
    function betMax() {
                                    var nwin = $('#MaxRange').html();
                                    var win = ((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2);
                                    var sum = $('#BetSize').val();
                                    var coef = win - sum;
$.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
                      
$('#betLoad').css('display', '');
  $('#error_bet').css('display', '');
   $('#succes_bet').css('display', '');
   $('#play').text('КИДАЕМ КОСТИ...');
   $('#play').prop('disabled', true);
   $('#start').text('КИДАЕМ КОСТИ...');
   $('#start').prop('disabled', true);

                    },  
                                                                                data: {
                                                                                    type: "maxbet",
                                                                                    win: coef,
                                                                                    sum: sum,
                                                                                    nwin: nwin,
                                                                                    per: $('#BetPercent').val()
                                                                                  
                                                                                   
                                                                                    
                                                                                },
                                        success: function(data) {
                                          $('#betLoad').css('display', 'none');
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                                              setTimeout( function(){              
              var indstyle = document.getElementById("ind1").style;
              var number = document.getElementById("cislo").innerHTML;
              var type = document.getElementById("type").innerHTML;
              var chance = document.getElementById("chanc").innerHTML;
                            let numberr = $('#r1').width() / 100 * number;                    
             
              $('.index__home__indicator__inner').fadeIn('fast');                         
              document.getElementById("ind1").style = "bottom: -40px;";  
            document.getElementById("ind2").style = "transform: translateX(-45%); left: " + numberr + "px;";
           document.getElementById("ind3").innerHTML = number;
              document.getElementById("ind4").className = "index__home__indicator__inner__number__roll is-" + type;
  
  timerId = setTimeout(function () {
          $('.index__home__indicator__inner').fadeOut('fast')
        },
        10000);}, 350);
                                                $('#play').text('Cделать ставку');
                                                $('#play').prop('disabled', false);
                                               $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance);
                         
                                         
                                                                         
                                                                      

                                                              
                                            }else{
                                              setTimeout( function(){              
              var indstyle = document.getElementById("ind1").style;
                          
              var number = document.getElementById("cislo").innerHTML;
              var type = document.getElementById("type").innerHTML;
              var chance = document.getElementById("chanc").innerHTML;
              
              let numberr = $('#r1').width() / 100 * number;                    
              if ( number == $('#lastbet').val() ){

                  }else{
              $('.index__home__indicator__inner').fadeIn('fast');  
              document.getElementById("ind1").style = "bottom: -40px;";  
              document.getElementById("ind2").style = "transform: translateX(-45%); left: " + numberr + "px;";
              document.getElementById("ind3").innerHTML = number;
              document.getElementById("ind4").className = "index__home__indicator__inner__number__roll is-" + type;
      }
  timerId = setTimeout(function () {
          $('.index__home__indicator__inner').fadeOut('fast')
        },
        10000);}, 350);
                                               $('#play').text('Cделать ставку');
                                               $('#play').prop('disabled', false);
                                                $('#start').text('Cделать ставку');
                                               $('#start').prop('disabled', false);
                                               showModal(obj.error, 'red');
                                               $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance);
$('#succes_bet').css('display', 'none');                  //$('#error_bet').html(obj.error);
                                              $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
$('#hashBet').html(obj.hash);                                                               return $('#error_bet').css('display', '');
                        
                      }
                                        }
                                    });
}                     
function continue_reg() {
  $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
$('#contbutton').html('<div class="loader" style="height:23px;width:23px"></div>');  
 setTimeout(function() {
    $("#error_registerc").fadeOut();
  }, 2500);
                    },  
                                                                                data: {
                                                                                    type: "continue_reg",
           login: $("#updatelog").val(),
           pass: $("#updatepass").val()                                                               
                                           
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                 $('#contbutton').html('Продолжить');                             
                  location.reload(true);
                                                                return 
                                            }else{
                 $('#contbutton').html('Продолжить');                              
                $("#error_registerc").show();                               
                showModal(obj.error, 'red');//$("#error_registerc").html(obj.error); 
                                            }
                                        }   
   });
  
}
function register_default() {
  if(!$('#CheckBox_9').prop('checked')) {
    
                                
                                    $('#error_register').css('display', 'block');
           return showModal('Поставьте галочку', 'red');//$('#error_register').html('Поставьте галочку');
                                }
  $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {

                    },  
                                                                                data: {
                                                                                    type: "registration",
           login: $("#userRegsiter").val(),
           pass: $("#userPassRegister").val(),                                      repeatpass: $("#userPassRegister1").val()                         
                                           
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                  location.reload(true);
                                                                return 
                                            }else{
                $("#error_register").show();                               
                showModal(obj.error, 'red');//$("#error_register").html(obj.error); 
                                            }
                                        }   
   });
}
function login_default() {
   $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {

                    },  
                                                                                data: {
                                                                                    type: "login",
           login: $("#userLogin").val(),
           pass: $("#userPass").val()                                                                       
                                           
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                  location.reload(true);
                                                                return 
                                            }else{
                $("#error_enter").show();                               
                showModal(obj.error, 'red');//$("#error_enter").html(obj.error); 
                                            }
                                        }   
   });
}
function removeWithdrawUser(deletew) {
  $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {

                    },  
                                                                                data: {
                                                                                    type: "deletewithdraw",
           del: deletew
                                           
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                   $("#withdrawT").load("index.php #withdrawT");                           
                                                    $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance);
                                                                return 
                                            }else{
                $("#withdrawT").load("index.php #withdrawT"); 
                                            }
                                        }   
   });
}
function createwithdraw() {
  $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
$('#withB').html('<div class="loader" style="height:23px;width:23px"></div>');
 setTimeout(function() {
    $("#error_withdraw").fadeOut();
    $("#succes_withdraw").fadeOut(); 
  }, 2500);
                    },  
                                                                                data: {
                                                                                    type: "withdrawuser",
           system: $('#hide_search').val(),
           wallet: $('#walletNumber').val(),                                        sum: $('#WithdrawSize').val()                                   
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                   $("#withdrawT").load("index.php #withdrawT");                           
                    $("#withB").html('Вывести');                          
                    $("#succes_withdraw").show();                          
          showModal("Выплата успешно создана", 'green');//$("#succes_withdraw").html("Выплата успешно создана"); 
                                              $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance);
                                                                return 
                                            }else{
                 $("#withB").html('Вывести'); 
                $("#error_withdraw").show();                               
        showModal(obj.error, 'red');//$("#error_withdraw").html(obj.error);
                                            }
                                        }   
   });
}
function createpromo() {

 $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
$('#createbutton').html('<div class="loader" style="height:23px;width:23px"></div>');
$("#succes_promocreate").hide(); 
  $("#error_promocreate").hide(); 
                    },  
                                                                                data: {
                                                                                    type: "createPromoUser",
           createname: $('#createname').val(),
           createsum: $('#createsum').val(),                                        createactive: $('#createactive').val()                                   
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                    $('#createbutton').html('Создать');                         
                    $("#succes_promocreate").show();                          
          $("#succes_promocreate").html("Промокод создан"); 
                                              $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance);
                                                                return 
                                            }else{
                $('#createbutton').html('Создать');                               
                $("#error_promocreate").show();                               
        showModal(obj.error, 'red');//$("#error_promocreate").html(obj.error);
                                            }
                                        }   
   });
}
function activepromo() {
  setTimeout(function() {
    $("#error_promoactive").fadeOut();
    $("#succes_promoactive").fadeOut(); 
  }, 5000);
  if($('#promoactive').val() == '') {
    $("#error_promoactive").show();                               
         return showModal('Введите промокод', 'red');//$("#error_promoactive").html("Введите промокод");
  }
 $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
  $('#activebutton').html('<div class="loader" style="height:23px;width:23px"></div>');
$("#succes_promoactive").hide(); 
  $("#error_promoactive").hide(); 
                    },  
                                                                                data: {
                                                                                    type: "activePromo",
           promoactive: $('#promoactive').val()                                                                       
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                    $('#activebutton').html('Активировать');                           
                    $("#succes_promoactive").show();                          
          showModal('Промокод активирован', 'green');//$("#succes_promoactive").html("Промокод активирован"); 
                                              $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance);
                                                                return 
                                            }else{
                $('#activebutton').html('Активировать');                               
                $("#error_promoactive").show();                               
        showModal(obj.error, 'red');//$("#error_promoactive").html(obj.error);
                                            }
                                        }   
   });
}


function getDaily() {
 $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {

                    },  
                                                                                data: {
                                                                                    type: "bonus"
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                    $("#succes_promo").show();                          
          showModal("Получено в раздаче <b>"+ obj.bonussize + "</b>", 'green');//$("#succes_promo").html("Получено в раздаче <b>"+ obj.bonussize + "</b>"); 
                                              $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance);
                                                                return 
                                            }else{
                $("#error_promo").show();                               
        showModal(obj.error, 'red');//$("#error_promo").html(obj.error);
                                            }
                                        }   
   });
}
function activateRefCode() {
 $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
 $('.update_refcode').text('Загрузка...');
  $('.update_refcode').prop('disabled', true)

                    },  
                                                                                data: {
                                                                                    type: "activateref",
                                                                                    refcode: $('#refcode').val()
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                              let a,b, summ;

  a = getRandomInRange(1,10);
  b = getRandomInRange(5,15);

 summ = a+b;

  let confirm = prompt("Сложите числа "+a+"+"+b+"","");

  if(confirm == summ){
                                            if (obj.success == "success") {
                         
          showModal("Код активирован! Обновление страницы...", 'green');
    $('.ref_input').val('');
    $('.update_refcode').text('Получить');
    $('.update_refcode').prop('disabled', false);
          setTimeout(function() {
                location.reload();
               }, 500);
                                             
                                                                return 
                                            }else{
                              
        showModal(obj.error, 'red');//$("#error_promo").html(obj.error);
            $('.ref_input').val('');
    $('.update_refcode').text('Получить');
    $('.update_refcode').prop('disabled', false);
                                            }
                                        
                                        }

                                        }   
   });
}



function clearChat() {
 $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {

                    },  
                                                                                data: {
                                                                                    type: "chatClear"
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                             
                                            if (obj.success == "success") {
                         
          showModal("Чат очищен!", 'green');
                                              /*setTimeout(function() {
                location.reload();
               }, 500);*/
                                                                return 
                                            }else{
                              
        showModal(obj.error, 'red');
                                            }
                                        
                                        }

                                        });
}
function cbanUser() {
 $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {

                    },  
                                                                                data: {
                                                                                    type: "cbanUser",
                                                                                    cbanUserId: $("#cbanUserId").val()
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                             
                                            if (obj.success == "success") {
                         
          showModal("Пользователь заблокирован!", 'green');
                                              /*setTimeout(function() {
                location.reload();
               }, 500);*/
                                                                return 
                                            }else{
                              
        showModal(obj.error, 'red');
                                            }
                                        
                                        }

                                        });
}

function cunbanUser() {
 $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {

                    },  
                                                                                data: {
                                                                                    type: "cunbanUser",
                                                                                    cunbanUserId: $("#cbanUserId").val()
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                             
                                            if (obj.success == "success") {
                         
          showModal("Пользователь разблокирован!", 'green');
                                              /*setTimeout(function() {
                location.reload();
               }, 500);*/
                                                                return 
                                            }else{
                              
        showModal(obj.error, 'red');
                                            }
                                        
                                        }

                                        });
}

function bUnBn(user_id){

  $('#cbanUserId').val(user_id);

}

function deleteMsg(msg_id) {


 $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {

                    },  
                                                                                data: {
                                                                                    type: "deleteMsg",
                                                                                    msgg_id: msg_id
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                             
                                            if (obj.success == "success") {
                         showModal("Вы успешно удалили сообщение!", 'green');
                         Load();
                                              /*setTimeout(function() {
                location.reload();
               }, 500);*/
                                                                return 
                                            }else{
                              
        showModal(obj.error, 'red');
                                            }
                                        
                                        }

                                        });
}

function getRandomInRange(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

