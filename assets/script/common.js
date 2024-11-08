$(function(){
    common.calendar();
    common.etcEvt();

});

var TOUCH = "ontouchstart" in window;
var tevent = '';
if (TOUCH){
    tevent = "touchstart";
}else{
    tevent = "click";
}


common = {
    calendar:function(){
        $(".datepicker").datepicker({
            dateFormat: "yy-mm-dd"
        });
    },
    etcEvt:function(){
        $(window).scroll(function(){
            var ck = $(this).scrollTop();
            if(ck > 0){
                $("header").addClass("on");
            }else{
                $("header").removeClass("on");
            }

        });


        $("body").on("mouseenter", "header .gnb-list>li>a", function(ev){
            $("header .gnb-list>li>a").removeClass("on");
            $("header .mymenu-item-wrap>a").removeClass("on");
            $("header .lang-item-wrap>a").removeClass("on");
            $(this).addClass("on");
            $("header").addClass("hover");
        });
        $("body").on("mouseenter", "header .lang-item-wrap>a", function(ev){
            $("header .gnb-list>li>a").removeClass("on");
            $("header .mymenu-item-wrap>a").removeClass("on");
            $(this).addClass("on");
            $("header").addClass("hover");
        });
        $("body").on("mouseenter", "header .mymenu-item-wrap>a", function(ev){
            $("header .gnb-list>li>a").removeClass("on");
            $("header .lang-item-wrap>a").removeClass("on");
            $(this).addClass("on");
            $("header").addClass("hover");
        });
        $("body").on("mouseleave", "header", function(ev){
            $("header .gnb-list>li>a").removeClass("on");
            $("header .mymenu-item-wrap>a").removeClass("on");
            $("header .lang-item-wrap>a").removeClass("on");
            $("header").removeClass("hover");
        });

        $("body").on("click", ".btn-total-nav", function(ev){
            //$(this).addClass("on");
            $(".mob-menu-wrap").addClass("on");
        });

        $("body").on("click", ".radio-type a", function(ev){
            $(this).parents(".radio-type").eq(0).find("a").removeClass("on");
            $(this).addClass("on");
        });
        $("body").on("click", ".chk-type a", function(ev){
            var ck = $(this).hasClass("on");
            if(ck){
                $(this).removeClass("on");
            }else{
                $(this).addClass("on");
            }
        });
        $("body").on("click", ".select-wrap>a", function(ev){
            $(this).addClass("on");
        });
        $("body").on("mouseleave", ".select-wrap", function(ev){
            $(".select-wrap>a").removeClass("on");
        });
        $("body").on("click", ".select-rs-list a", function(ev){
            $(".select-wrap>a span").text($(this).text());
            $(".select-wrap>a").removeClass("on");
        });

        $("body").on("click", ".etc-file-add ul li a", function(ev){
            $(this).parents("li").eq(0).remove();
        });
        $("body").on("click", ".btn-find", function(ev){
            $(this).prev(".hidden").trigger("click");
        });
        $("body").on("change", "input.hidden", function(ev){
            $(".file-form .inp").val($(this).val());
        });
        $("body").on("click", ".btn-file-find", function(ev){
            $(this).prev(".hidden").trigger("click");
        });
        $("body").on("change", "input.hidden", function(ev){
            $(".file-wrap .inp").val($(this).val());
        });
        $("body").on("click", ".side-fixed-wrap .btn-topbtn", function(ev){
            $("html, body").stop().animate({scrollTop:0},500);
        });

        $("body").on("click", ".file-upload button", function(ev){
            $(this).prev(".hidden").trigger("click");
        });
		
		/*	계산을 위해 별도로 뺀다.
        $("body").on("click", ".cnt-wrap .btn-mius", function(){
            var n = parseInt($(this).parents(".cnt-wrap").eq(0).find("input").val());
            if(n > 0){
                $(this).parents(".cnt-wrap").eq(0).find("input").val(n-1);
            }
        });
        $("body").on("click", ".cnt-wrap .btn-plus", function(){
            var n = parseInt($(this).parents(".cnt-wrap").eq(0).find("input").val());
            $(this).parents(".cnt-wrap").eq(0).find("input").val(n+1);
        });
		*/

/*		탑승시간 선택을 위해 뺀다.		
        $("body").on("click", ".select-item-wrap>a", function(){
            var ck = $(this).parents(".select-item-wrap").eq(0).hasClass("on");
            if(ck){
                $(this).parents(".select-item-wrap").eq(0).removeClass("on");
            }else{
                $(this).parents(".select-item-wrap").eq(0).addClass("on");
            }
        });
        $("body").on("mouseleave", ".select-item-wrap", function(){
            $(".select-item-wrap").removeClass("on");
        });

        $("body").on("click", ".select-item-wrap>.select-result-wrap ul li a", function(){
            $(this).parents(".select-item-wrap").eq(0).find("span").text($(this).text());
            $(".select-item-wrap").removeClass("on");
        });
*/
		
        $("body").on("click", ".contact-page-wrap .td-list li .qitem", function(){
            var ck = $(this).hasClass("on");
            if(ck){
                $(this).removeClass("on");
            }else{
                $(this).addClass("on");
            }
        });
		$("body").on("click", ".faq-page-wrap dl dt a", function(){
		    var ck = $(this).hasClass("on");
		    if(ck){
		   $(this).removeClass("on");
		   $(this).parents("dt").eq(0).next("dd").slideUp(300);
		    }else{
		   $(".faq-page-wrap dl dt a").removeClass("on");
		   $(".faq-page-wrap dl dd").slideUp(300);
		   $(this).addClass("on");
		   $(this).parents("dt").eq(0).next("dd").slideDown(300);
		    }
		});
        $("body").on("click", ".review-page-wrap .func-item-wrap .lt-item-wrap ul li a", function(){
            $(".review-page-wrap .func-item-wrap .lt-item-wrap ul li a").removeClass("on");
            $(this).addClass("on");
        });
        /*
        $("body").on("click", ".pop-msg-wrap a, .pop-notice-wrap .pop-header-wrap a, .pop-member-wrap .btn-pop-close", function(){
            common.popClose('.dialog');
        });
        */


    },
    popOpen:function(o){
        $(o).addClass("ing");
        setTimeout(function(){
            $(o).addClass("on");
        },200);
    },
    popClose:function(o){
        $(o).removeClass("on");
        setTimeout(function(){
            $(o).removeClass("ing");
            
            checkAlertMsg();
        },500)
    },
}
