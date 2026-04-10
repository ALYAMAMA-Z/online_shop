
(function ($) {
"use strict";
$(document).ready(function($){
    $("body").addClass("loaded");
    $(".homepage-slider").owlCarousel({items:1, loop:true, autoplay:true, autoplayHoverPause:true});
    $(".testimonial-sliders, .logo-carousel-inner").owlCarousel({loop:true, autoplay:true, autoplayHoverPause:true});
    const backToTop = $("#back-to-top");
    $(window).scroll(function(){ if($(this).scrollTop()>200) backToTop.fadeIn(); else backToTop.fadeOut(); });
    backToTop.click(function(){ $("html, body").animate({scrollTop:0},800); return false; });
    $('a[href*="#"]').on('click',function(e){ e.preventDefault(); $("html, body").animate({scrollTop:$($(this).attr('href')).offset().top},800); });
    const observer = new IntersectionObserver(entries=>{ entries.forEach(entry=>{ if(entry.isIntersecting) entry.target.classList.add("visible"); }); }, { threshold:0.2 });
    document.querySelectorAll(".fade-up").forEach(el=>observer.observe(el));
    $(window).scroll(function(){ var scroll=$(window).scrollTop(); $(".parallax").css("background-position","center "+(scroll*0.5)+"px"); });
    $(".product-filters li").on('click', function () { $(".product-filters li").removeClass("active"); $(this).addClass("active"); $(".product-lists").isotope({ filter: $(this).attr('data-filter') }); });
});
$(window).on("load",function(){ $(".loader").fadeOut(1000); });
}(jQuery));
