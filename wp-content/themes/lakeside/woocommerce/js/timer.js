$(document).ready(function() {

if (!$.cookie('offerTimer')){
var now = $.now(); //get first time log page
var timerSet = 30 * 60; //30 minutes
$.cookie('firstTime', now, { expires: 7, path: '/' });
$.cookie('offerTimer', timerSet, { expires: 7, path: '/' });
var runTimer = $.cookie('offerTimer');
} else {  
var currentTime = $.now();
var usedTime = (currentTime - $.cookie('firstTime'))/1000; //calculate and convert into seconds
var runTimer = $.cookie('offerTimer') - usedTime; 
}
$('#defaultCountdown').countdown({until: runTimer, format: 'DHMS'});

});