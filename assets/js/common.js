
function isMobileDeviceUsed(){var e=!1;return(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4)))&&(e=!0),e}
function sliderInit(){$(".home-slider .slider").slick({dots:!0,arrows:!1,speed:1e3}),$(".featured-slider .slider").slick({prevArrow:".featured-slider .prev-slider",nextArrow:".featured-slider .next-slider",slidesToShow:3,slidesToScroll:3,responsive:[{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:769,settings:{slidesToShow:1,slidesToScroll:1}}]}),$(".best-seller-slider .slider").slick({prevArrow:".best-seller-slider .prev-slider",nextArrow:".best-seller-slider .next-slider",slidesToShow:3,slidesToScroll:3,responsive:[{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:769,settings:{slidesToShow:1,slidesToScroll:1}}]}),$(".related-slider .slider").slick({prevArrow:".related-slider .prev-slider",nextArrow:".related-slider .next-slider",slidesToShow:3,slidesToScroll:3,responsive:[{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:769,settings:{slidesToShow:1,slidesToScroll:1}}]}),$(".latest-post-slider .slider").slick({prevArrow:".latest-post-slider .prev-slider",nextArrow:".latest-post-slider .next-slider",slidesToShow:3,responsive:[{breakpoint:992,settings:{slidesToShow:2}},{breakpoint:769,settings:{slidesToShow:1}}]}),$(".brand-slider .slider").slick({prevArrow:".brand-slider .prev-slider",nextArrow:".brand-slider .next-slider",slidesToShow:5,responsive:[{breakpoint:992,settings:{slidesToShow:3}},{breakpoint:769,settings:{slidesToShow:1}}]}),$(".sidebar-latest .slider").slick({prevArrow:".sidebar-latest .prev-slider",nextArrow:".sidebar-latest .next-slider",slidesToShow:1}),$(".product-slider .big-slider").slick({arrows:!1,asNavFor:".product-slider .small-slider",infinite:!1,draggable:!1,swipe:!1,speed:1e3,fade:!0}),$(".product-slider .small-slider").slick({slidesToShow:3,arrows:!1,asNavFor:".product-slider .big-slider",focusOnSelect:!0,centerPadding:"0px",infinite:!1}),$(".certificate-slider .slider").slick({prevArrow:".certificate-slider .prev-slider",nextArrow:".certificate-slider .next-slider",slidesToShow:2,slidesToScroll:2,responsive:[{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:769,settings:{slidesToShow:1,slidesToScroll:1}}]})}
function headerDropDown(){$(".check").on("click",
	function(){windowWidth<992&&$(this).toggleClass("active").next("ul").toggleClass("drop_down")}),$(document).on("mouseup",
function(e){var o=$(".drop_down");o.is(e.target)||0!==o.has(e.target).length||($(".check").removeClass("active").next("ul").removeClass("drop_down"),$(this).toggleClass("active").next("ul").toggleClass("drop_down"))})}
function searchDropDown(){$(".drop-down").on("click",
	function(){$(this).find("ul").is(":visible")?($(this).find("ul").slideUp("slow"),$(this).find(".selected").removeClass("active-secected"),$(".drop-down").find(".selected").removeClass("active-secected")):($(".drop-down ul").slideUp("slow"),$(".drop-down").find(".selected").removeClass("active-secected"),$(this).find("ul").slideToggle("slow"),$(this).find(".selected").toggleClass("active-secected"))}),$(".select-item").on("click",
function(){var e=$(this).html(),o=$(this).closest("ul").attr("data-select"),i=$(o);$(this).closest(".drop-down").find(i).html(e)})}
function mobileMenu(){$(".humburger, .close_menu").on("click",
	function(){windowWidth<992&&($(".menu").toggleClass("show_menu"),$(".humburger").toggleClass("active_humburger"),$(".to-menu").next("ul").removeClass("show_iner_menu"),$(".main-header-menu").toggleClass("overlay"))}),$(".to-menu").on("click",
function(){windowWidth<992&&($(this).next("ul").toggleClass("show_iner_menu"),$(".menu").toggleClass("overflow"))}),$(".back").on("click",
function(){windowWidth<992&&$(this).parent().removeClass("show_iner_menu")}),$(document).on("mouseup",
function(e){var o=$(".menu");o.is(e.target)||0!==o.has(e.target).length||($(".menu").removeClass("show_menu"),$(".humburger").removeClass("active_humburger"),$(".to-menu").next("ul").removeClass("show_iner_menu"),$(".main-header-menu").removeClass("overlay"))})}
function stiky(){var e=$(".user-header").outerHeight(!0),o=$(".logo").outerHeight(!0);$(".to_fix");$(window).on("resize",
	function(){$(".user-header").outerHeight(!0),$(".logo").outerHeight(!0),$(".to_fix")}()),$('<div class="clone-nav"></div>').insertBefore(".logo").css("height",o).hide(),$(window).on("scroll",
function(){winPos=$(window).scrollTop(),windowWidth<992&&(winPos>=e?($(".logo").addClass("fixed"),$(".clone-nav").show()):($(".logo").removeClass("fixed"),$(".clone-nav").hide()))})}
function accordeon(e,o,i){$(e).on("click",
	function(){$(this).next(o).is(":visible")?($(this).next(o).slideUp(500),$(e).removeClass(i)):($(o).slideUp(500),$(this).next(o).slideToggle(500),$(e).removeClass(i),$(this).addClass(i))})}
function increase(){$(".decrement").on("click",
	function(){var e=$(this).closest(".counter").find(".count"),o=e.val();o>1?e.val(o=+o-1):e.val(o=1)}),$(".increment").on("click",
function(){var e=$(this).closest(".counter").find(".count"),o=e.val();e.val(o=+o+1)})}
function tabs(){$(".tab_content").hide(),$(".tab_content:first").show(),$("ul.tabs li").on("click",
	function(){$(".tab_content").hide();var e=$(this).attr("rel");$("#"+e).fadeIn(),$("ul.tabs li").removeClass("active"),$(this).addClass("active"),$(".tab_accordion").removeClass("tab_active"),$(".tab_accordion[rel^='"+e+"']").addClass("tab_active")}),$(".tab_accordion").on("click",
function(){$(this).next("div").is(":visible")?($(this).next("div").slideUp("slow"),$(".tab_accordion").removeClass("tab_active")):($(".tab_content").slideUp("slow"),$(this).next("div").slideToggle("slow"),$(".tab_accordion").removeClass("tab_active"),$(this).addClass("tab_active"))})}
function selectStyle(){$("select").select2(),$('b[role="presentation"]').hide(),$(".select2-selection__arrow").append('<i class="fa fa-angle-down" aria-hidden="true"></i>')}
function startVideo(e){var o;$(e).on("click",
	function(){o=$(this).attr("data-video"),$(".video-popup").fadeIn(1e3),$(".video-popup .inner-popup").append('<iframe src="https://www.youtube.com/embed/'+o+'?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'),$(".close_popup-video, .video-popup .bg-popup").click(
	function(){$(".video-popup").fadeOut(500),$(".video-popup iframe").remove()})})}
function myRange(){var e=$("#slider-range").attr("data-to");$("#slider-range").slider({range:!0,min:0,max:e,values:[14,192],slide:
	function(e,o){$(".price-filter #from").html(o.values[0]),$(".price-filter #to").html(o.values[1])}}),$(".price-filter #from").html($("#slider-range").slider("values",0)),$(".price-filter #to").html($("#slider-range").slider("values",1))}
function printPage(){$(".print").on("click",
	function(){window.print()})}
function signUp(){$(".to-signin-thumb").on("click",
	function(){$("#wrap-sign-form").removeClass("to-signup"),$("#wrap-sign-form").addClass("to-signin")}),$(".to-signup-thumb").on("click",
function(){$("#wrap-sign-form").removeClass("to-signin"),$("#wrap-sign-form").addClass("to-signup")}),$(".close-popup-form").on("click",
function(){$(".popup-register-form").fadeOut(),$("html").css({overflow:"visible"})}),$(".header-login").on("click",
function(e){e.preventDefault(),$(".popup-register-form").fadeIn(),$("#wrap-sign-form").removeClass("to-signin"),$("#wrap-sign-form").addClass("to-signup"),$("html").css({overflow:"hidden"})}),$(".header-sign").on("click",
function(e){e.preventDefault(),$(".popup-register-form").fadeIn(),$("#wrap-sign-form").removeClass("to-signup"),$("#wrap-sign-form").addClass("to-signin"),$("html").css({overflow:"hidden"})}),$("#forgot").on("click",
function(){$(".popup-register-form").fadeOut(),$(".forgot-popup-wrap").fadeIn()}),$(".to-login").on("click",
function(){$(".popup-register-form").fadeIn(),$(".forgot-popup-wrap").fadeOut()}),$(".close-forgot").on("click",
function(){$(".forgot-popup-wrap").fadeOut()})}
function timePopup(){setTimeout(
	function(){$(".main-popup").fadeIn()},5e3),$(".close-main-popup").on("click",
function(){$(".main-popup").fadeOut()})}
function backTop(){var e=$("#toTop");e.outerHeight(!0),$(window).height();$(window).on("scroll",
	function(){$(window).scrollTop()>=400?e.addClass("show_btn"):e.removeClass("show_btn")}),e.on("click",
function(){$("html, body").animate({scrollTop:0},600)})}
function compare(){
	function e(){$("#compare-length").html("("+o+")")}var o=$(".sidebar-compare ul li").length;e(),$(".delete-compare").on("click",
	function(){$(this).closest("li").remove(),o=$(".sidebar-compare ul li").length,e(),o<1&&$(".sidebar-compare").hide()}),$(".compare-table .delete").on("click",
function(){var e=$(this).closest("td").attr("class");$(this).closest("table").find("td."+e).remove()})}
function eqvalHeight(){var e=$(".row_eq >div"),o=e.eq(0).height();e.each(
	function(){o=$(this).height()>o?$(this).height():o}),e.height(o)}
function cartDelete(){$(".delete-product2").on("click",
	function(){$(this).closest(".cart-card").remove()})}
function likeProduct(){$(".follow").on("click",
	function(e){e.preventDefault(),$(this).toggleClass("active-follow")})}


function checkAdress(){$("#checkAdress").on("click",
	function(){1!=$("#checkAdress").prop("checked")
	?($(".reinit-form").hide(),$(".check-true").show())
	:($(".reinit-form").show(),$(".check-true").hide())
})}

function checkAccount(){$("#checkAccount").on("click",
	function(){1!=$("#checkAccount").prop("checked")
	?($(".reinit1-form").hide(),$(".check-true").show())
	:($(".reinit1-form").show(),$(".check-true").hide())
})}

function initEvents(){"use strict";$(
	function(){searchDropDown(),headerDropDown(),mobileMenu(),stiky(),accordeon(".accordeon-head",".accordeon-body","active_accordeon"),accordeon(".accordeon-head-2",".accordeon-body-2","active_accordeon-2"),accordeon(".accordeon-head-3",".accordeon-body-3","active_accordeon"),accordeon(".shipping-head",".shipping-accordeon","active_accordeon"),accordeon(".cupon-head",".cupon-accordeon","active_accordeon"),accordeon(".summury-accordeon",".summury-accordeon-body","active_accordeon"),sliderInit(),increase(),tabs(),myRange(),printPage(),signUp(),backTop(),compare(),eqvalHeight(),cartDelete(),likeProduct(),checkAdress(),checkAccount()}),$(window).on("load",
function(){startVideo(".play"),selectStyle(),$(".preloader").fadeOut(1e3),$(window).on("resize",
	function(){return windowWidth=window.innerWidth})})}var windowWidth=$(window).width();initEvents();