$(window).on('resize load', function() {
    //Extra Small
    if($(window).width() < 576) {
        $(".google-translate-container-widget").appendTo($("#google-translate-mobile-header-container"));
        $(".google-translate-container-widget").removeClass("google-translate-desktop").addClass("google-translate-mobile");
    }
    //Small
    if(($(window).width() >= 576) && ($(window).width() < 768)) {
        $(".google-translate-container-widget").appendTo($("#google-translate-mobile-header-container"));
        $(".google-translate-container-widget").removeClass("google-translate-desktop").addClass("google-translate-mobile");
    }
    //Medium
    if(($(window).width() >= 768) && ($(window).width() < 992)) {
        $(".google-translate-container-widget").appendTo($("#google-translate-mobile-header-container"));
        $(".google-translate-container-widget").removeClass("google-translate-desktop").addClass("google-translate-mobile");
    }
    //Large
    if(($(window).width() >= 992) && ($(window).width() < 1200)) {
        $(".google-translate-container-widget").appendTo($("#google-translate-regular-header-container"));
        $(".google-translate-container-widget").removeClass("google-translate-mobile").addClass("google-translate-desktop");
    }
    //Extra Large
    if($(window).width() >= 1200){
        $(".google-translate-container-widget").appendTo($("#google-translate-regular-header-container"));
        $(".google-translate-container-widget").removeClass("google-translate-mobile").addClass("google-translate-desktop");
    }
})