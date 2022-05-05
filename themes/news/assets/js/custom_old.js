//Start Menu JS Function Jikjak Theme
// Superfish Menu Hover Effect
jQuery(function () {
    jQuery('ul.sf-menu').superfish({
        hoverClass: 'sfHover',
        pathClass: 'overideThisToUse',
        pathLevels: 1,
        delay: 200,
        animation: {opacity: 'show', height: 'show'},
        speed: 'normal',
        autoArrows: false,
        dropShadows: true,
        disableHI: false,
        easing: "easeOutQuad",
        onInit: function () {
        },
        onBeforeShow: function () {
        },
        onShow: function () {
        },
        onHide: function () {
        }
    });
});

// Mean Menu
/*jQuery(document).ready(function () {
 jQuery('.navigation nav').meanmenu();
 });*/
//End Menu JS Function Jikjak Theme


//For News Ticker
$(function () {
    $("ul#demo").liScroll({
        travelocity: 0.070 // the speed of scrolling
    });
});

$('.bxslider').bxSlider({
    minSlides: 1,
    maxSlides: 4,
    moveSlides: 1,
    slideWidth: 250,
    infiniteLoop: true,
    slideMargin: 45,
    captions: true,
    touchEnabled: true,
    pager: false,
    auto: true,
});

$('.bxslider-gallary').bxSlider({
    captions: true,
    //controls:false,
    pager: false,
    touchEnabled: true,
});


$('.post-bxslider').bxSlider({
    mode: 'fade',
    slideWidth: 600,
    captions: true,
    touchEnabled: true,
    pager: false,
});

$('.bxslider-featured').bxSlider({
    mode: 'fade',
    slideWidth: 600,
    slideHeight: 400,
    captions: true,
    touchEnabled: true,
    controls:true,
    pager: true,
    auto: true,
    autoHover:true,
});

$('.bxslider-photogallary').bxSlider({
    mode: 'fade',
    slideWidth: 630,
    captions: true,
    touchEnabled: true,
    controls:true,
    pager: false,
    auto: true,
});