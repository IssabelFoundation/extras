$(document).ready(function (){

    if($('#emailcontent').length>0) {
       $('#emailcontent').jqte();
    }

    var height = $(window).height();
    $('iframe').css('height', height * 0.9 | 0);
    $('iframe').css('width', '100%');


});

