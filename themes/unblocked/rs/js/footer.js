window.onload = function () {
    $(window).scroll(function () {
        if ($(this).scrollTop()) {
            $('#back-to-top').fadeIn();
            $('.menu').css({ "background": "#2757a5" });
        } else {
            $('#back-to-top').fadeOut();
            $('.menu').css({ "background": "rgba(39,87,165,.4)" });
        }
    });
    $("#back-to-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 100);
    });
    $("#txt-search").on('click', function () {
        $(".overlay").show();
        $(".list-cate-ajax").hide();
        $("#chevron").css({ 'transform': "rotate(0)" });
        $(this).data('status', 'off');
    })
    $("#txt-search").on('input', function (e) {
        let url = "/query.ajax"
        let q = $(this).val();
        if (q.length == 0) {
            $("#list-suggest").html('');
            return;
        }
        $.ajax({
            type: "POST",
            url: url,
            data: { q: q },
            success: function (data) {
                let parser_data = JSON.parse(data);
                $("#list-suggest").html(parser_data);
            }
        });
    });
    $(".overlay").on('click', function () {
        console.log('here');
        $(this).hide();
        $("#list-suggest").html('');
    });

    $("#show-menu").on('click', function (e) {
        $(".mobile-menu").css({ left: 0 });
        $(".overlay-full").show();
        e.stopPropagation();
    });
    $(".close-mobile").on('click', function () {
        $(".mobile-menu").css({ left: "-300px" });
        $(".overlay-full").hide();
    })
    $(".overlay-full").on('click', function () {
        $(".mobile-menu").css({ left: "-300px" });
        $(this).hide();
    })

}
$("#expand").on('click', function () {
    $("#iframehtml5").addClass("force_full_screen");
    $("#_exit_full_screen").removeClass('hidden');
    $(".header-game").removeClass("header_game_enable_half_full_screen");
    $("#iframehtml5").removeClass("force_half_full_screen");
    requestFullScreen(document.body);
});

$("#_exit_full_screen").on('click', cancelFullScreen);


function requestFullScreen(element) {
    //Supports most browsers and their versions.
    var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;
    if (requestMethod) { // Native full screen.
        requestMethod.call(element);
    } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
}

function cancelFullScreen() {
    $(".header-game").removeClass("force_full_screen header_game_enable_half_full_screen");
    $("#iframehtml5").removeClass("force_half_full_screen");
    var requestMethod = document.cancelFullScreen || document.webkitCancelFullScreen || document.mozCancelFullScreen || document.exitFullScreenBtn;
    if (requestMethod) { // cancel full screen.
        requestMethod.call(document);
    } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
}

if (document.addEventListener) {
    document.addEventListener('webkitfullscreenchange', exitHandler, false);
    document.addEventListener('mozfullscreenchange', exitHandler, false);
    document.addEventListener('fullscreenchange', exitHandler, false);
    document.addEventListener('MSFullscreenChange', exitHandler, false);
}

function exitHandler() {
    if (document.webkitIsFullScreen === false
            || document.mozFullScreen === false
            || document.msFullscreenElement === false) {
        cancelFullScreen();
    }
}