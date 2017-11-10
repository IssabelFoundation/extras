
$(document).ready(function (){

    if($('#emailcontent').length>0) {
       $('#emailcontent').jqte();
    }

    if($('#meet').length>0) {
        var height = $(window).height();
        height = height - 140;
        var domain = "meet.jit.si";
        var roomid = $('#meet').data('room');
        var room = roomid;
        var username = $('#meet').data('username');
        var width = '100%';
        var htmlElement = document.querySelector('#meet');
        var configOverride = {
            defaultLanguage: "es"
        };
        var interfaceConfigOverride = {
            DEFAULT_REMOTE_DISPLAY_NAME: "Invitado"
        };
        var api = new JitsiMeetExternalAPI(domain, room, width, height, htmlElement, configOverride, interfaceConfigOverride);
        api.on("readyToClose",function() { window.location.href='index.php?menu=meet'; })
        api.on("videoConferenceJoined",function() {
            api.executeCommand('displayName', username);
        });

    }

});
