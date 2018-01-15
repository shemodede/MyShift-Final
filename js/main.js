var whmcs = false;/* For preview only */
$('body').append('<style>#theme-switcher{display: inline-block; position: fixed; top: 80px; left: 10px;z-index: 9999;} #btn-theme{padding:7px 10px;background-color:rgba(255,255,255,0.2);border-radius:7px;margin-bottom:5px;cursor:pointer;box-shadow: 0 0 10px rgba(0,0,0,0.3);}#btn-theme .fa{color:#ffffff;text-shadow: 0 0 5px rgba(0,0,0,0.7);}#btn-theme:hover{background-color:rgba(255,255,255,0.4)}.switches-holder{transform-origin:center top;transform:scaleY(0);opacity:0;padding: 7px 7px;background-color: rgba(255,255,255,0.9);border-radius: 7px;width: 34px;font-size: 0;transition: all 0.3s cubic-bezier(0.34, 1.61, 0.7, 1);box-shadow: 0 0 10px rgba(0,0,0,0.3);}.switches-holder.active{transform:scaleY(1);opacity:1;}.switches-holder .switch{display:inline-block;width:20px;height:20px;margin-bottom:5px;border-radius:4px;cursor:pointer;}.switches-holder .switch.active{box-shadow:inset 0 0 2px 2px rgba(0,0,0,0.3)}.switches-holder .switch1{background-color: #756de7;}.switches-holder .switch2{background-color: #5987f7;}.switches-holder .switch3{background-color: #142745;margin-bottom:0;}</style><div id="theme-switcher"><div id="btn-theme"><i class="fa fa-paint-brush" aria-hidden="true"></i></div><div class="switches-holder"><div class="switch switch1"></div><div class="switch switch2"></div><div class="switch switch3"></div></div></div>');

if(whmcs){
    $('head').append('<link id="custom-css2" rel="stylesheet" type="text/css" href="">');
}
$('head').append('<link id="custom-css1" rel="stylesheet" type="text/css" href="">');

var btnTheme=$('#btn-theme','#theme-switcher');
var btnSwitch1=$('.switches-holder .switch1','#theme-switcher');
var btnSwitch2=$('.switches-holder .switch2','#theme-switcher');
var btnSwitch3=$('.switches-holder .switch3','#theme-switcher');

var switchesHolder=$('.switches-holder','#theme-switcher');

var themeSelected = getCookie("hostifytheme");

if(themeSelected=="org"){
    if(whmcs){ 
        $('head #custom-css1').attr('href',"");
        $('head #custom-css2').attr('href',"");
    }else{
        $('head #custom-css1').attr('href',"");
    }
    $('.switch',switchesHolder).removeClass('active');
    $(btnSwitch1).addClass('active');
}else if(themeSelected=="blue"){
    if(whmcs){ 
        $('head #custom-css1').attr('href',"templates/hostify/css/style-blue.css");
        $('head #custom-css2').attr('href',"templates/hostify/css/styles-modified-blue.css");
    }else{
        $('head #custom-css1').attr('href',"css/style-blue.css");
    }
    $('.switch',switchesHolder).removeClass('active');
    $(btnSwitch2).addClass('active');
}else if(themeSelected=="darkblue"){
    if(whmcs){ 
        $('head #custom-css1').attr('href',"templates/hostify/css/style-darkblue.css");
        $('head #custom-css2').attr('href',"templates/hostify/css/styles-modified-darkblue.css");
    }else{
        $('head #custom-css1').attr('href',"css/style-darkblue.css");
    }
    $('.switch',switchesHolder).removeClass('active');
    $(btnSwitch3).addClass('active');
}

btnTheme.on('click',function(){
    switchesHolder.toggleClass('active');
});
$(".switch",switchesHolder).on('click',function(){
    $('.switch',switchesHolder).removeClass('active');
    $(this).addClass('active');
});
btnSwitch1.on('click',function(){
    if(whmcs){ 
        $('head #custom-css1').attr('href',"");
        $('head #custom-css2').attr('href',"");
    }else{
        $('head #custom-css1').attr('href',"");
    }
    document.cookie = "hostifytheme=org";
    setCookie("hostifytheme", "org", 1);
});
btnSwitch2.on('click',function(){
    if(whmcs){ 
        $('head #custom-css1').attr('href',"templates/hostify/css/style-blue.css");
        $('head #custom-css2').attr('href',"templates/hostify/css/styles-modified-blue.css");
    }else{
        $('head #custom-css1').attr('href',"css/style-blue.css");
    }
    document.cookie = "hostifytheme=blue";
    setCookie("hostifytheme", "blue", 1);
});
btnSwitch3.on('click',function(){
    if(whmcs){ 
        $('head #custom-css1').attr('href',"templates/hostify/css/style-darkblue.css");
        $('head #custom-css2').attr('href',"templates/hostify/css/styles-modified-darkblue.css");
    }else{
        $('head #custom-css1').attr('href',"css/style-darkblue.css");
    }
    document.cookie = "hostifytheme=darkblue";
    setCookie("hostifytheme", "darkblue", 1);
});

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
/* for preview end */
"use strict";

// Add Slider functionality to the #testimonials section in the home page.
var testimonialsSlider = $("#testimonials-slider","#testimonials");
testimonialsSlider.slick({
    dots: false,
    arrows: true,
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1
});
// Add Slider functionality to the testimonials in the "Sign in" and "Sign out" pages.
var miniTestimonialsSlider = $(".mini-testimonials-slider","#form-section");
miniTestimonialsSlider.slick({
    dots: true,
    arrows: false,
    infinite: false,
    autoplay: true,
    speed: 200
});
// Add Slider functionality to the info-slider in the about page.
var infoSlider = $(".info-slider","#page-head");
infoSlider.slick({
    dots: true,
    arrows: false,
    infinite: false,
    autoplay: true,
    speed: 200
});
$(window).on("load", function() {
    // Counter slider functions in "CUSTOM HOSTING PLAN" section on the homepage
    var cPlan = $('#c-plan');
    cPlan.slider({
        tooltip: 'always'
    });
    cPlan.on("slide", function(e) {
        $('.slider .tooltip-up','#custom-plan').text(e.value/20);
    });
    cPlan.value = cPlan.data("slider-value");
    $('.slider .tooltip','#custom-plan').append('<div class="tooltip-up"></div>');
    $('.slider .tooltip-up','#custom-plan').text(cPlan.value/20);
    $('.slider .tooltip-inner','#custom-plan').attr("data-unit",cPlan.data("unit"));
    $('.slider .tooltip-up','#custom-plan').attr("data-currency",cPlan.data("currency"));
    
    // Features Section click function
    var featureIconHolder = $(".feature-icon-holder", "#features-links-holder");
    
    featureIconHolder.on("click",function(){
        featureIconHolder.removeClass("opened");
        $(this).addClass("opened");
        $(".show-details","#features-holder").removeClass("show-details");
        $(".feature-d"+$(this).data("id"), "#features-holder").addClass("show-details");
    });
    
    // Fix #features-holder height in features section
    var featuresHolder = $("#features-holder");
    var featuresLinksHolder = $("#features-links-holder");
    var featureBox = $(".show-details","#features-holder");
    
    featuresHolder.css("height",featureBox.height()+120);
    featuresLinksHolder.css("height",featureBox.height()+120);

    // Fix #features-holder height in features section
    $(window).on("resize",function() {
        featuresHolder.css("height",featureBox.height()+120);
        featuresLinksHolder.css("height",featureBox.height()+120);
        return false;
    });
    
    // Apps Section hover function
    var appHolder = $(".app-icon-holder", "#apps");
    
    appHolder.on("mouseover",function(){
        appHolder.removeClass("opened");
        $(this).addClass("opened");
        $(".show-details", "#apps").removeClass("show-details");
        $(".app-details"+$(this).data("id"), "#apps").addClass("show-details");
    });
    
    // More Info Section hover function
    var infoLink = $(".info-link", "#more-info");
    
    infoLink.on("mouseover",function(){
        infoLink.removeClass("opened");
        $(this).addClass("opened");
        $(".show-details", "#more-info").removeClass("show-details");
        $(".info-d"+$(this).data("id"), "#more-info").addClass("show-details");
    });
});