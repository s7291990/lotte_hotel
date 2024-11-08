<?
include "../../inc/config.php";
include $_COMMON_CLASS_."/class_default.php";
include $_LANG_SET_."/".$_GET_LANG_."/system.lang";
?>
function gotoHome()
{
	document.location.href='/index.php';
}

function changeLanguage(l)
{
	if (l=="ko") secDom="www";
		else secDom=l;
		
	url="https://"+secDom+"<?=$_COOKIE_DOMAIN_?>"+window.location.pathname+window.location.search;

	document.location.href=url;
}


/*====================================================================================================
	서비스
*/
function serviceSeoulCityTourBus()
{
	document.location.href='/service/seoulcitytourbus.php';
}

function serviceTourCourse()
{
	document.location.href='/service/tour_course_list.php';
}

function serviceTourCourseView(c)
{
	if (c=="N")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_READY']?>");
		return;
	}
	
	document.location.href='/service/tour_course_view.php?code='+c;
}

function serviceBusInfo()
{
	document.location.href='/service/bus_info.php';
}

function aboutCitytourBus()
{
	document.location.href='/service/about.php';
}

function contactUS()
{
	document.location.href='/service/contact_us.php';
}
/*====================================================================================================
	서비스
*/


/*====================================================================================================
	사이드 아이콘
*/
var hpChat=false;

function chatting()
{
	hpChat=true;
	//alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_READY']?>");
	ht.open();
}

$(document).ready(function() {
	ht.event.on('happytalk:close', function () {
		hpChat=false;
	});
	
	$($('#HappytalkIframe').contents().find('#ChatWindow')).on("hide", function(){
		console.log("menu off");
	});
	
	console.log($('#HappytalkIframe').contents().find('#ChatWindow').attr('id'));
	console.log($('#HappytalkIframe').html());
});



function weather()
{
	window.open("https://weather.com/ko-KR/weather/today/l/KSXX0037:1:KS");
}

function gotoVisitKorea()
{
	window.open("https://korean.visitseoul.net/");
}

function gotoInstagram()
{
	//window.open("https://www.instagram.com/seoulcitytourbus.official/");
	
	window.open("https://www.instagram.com/seoultigerbus_official/");
}

function gotoBlog()
{
	window.open("https://blog.naver.com/seoultigerbus");
}
/*====================================================================================================
	사이드 아이콘
*/


//예약 부분
function reservation(c)
{
	if (c==0)
	{
		document.location.href='/reservation/reservation.php';
	}
	else if (c=="N")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_READY']?>");
		return;
	}
	else
	{
		document.location.href='/reservation/reservation.php?code='+c;
	}
}

function reservationCheck()
{
	document.location.href='/reservation/reservation_check_1.php';
}

function reservationGuide()
{
	document.location.href='/reservation/reservation_guide.php';
}

//제휴할인
function allianceList()
{
	document.location.href='/alliance/alliance_list.php';
}

//제휴할인 이용안내
function allanceUseInfo()
{
	document.location.href='/alliance/alliance_use_info.php';
}

function allianceView(c)
{
	
}

function allianceRegist(c)
{
	document.location.href='/alliance/alliance_regist.php?mode='+c;
}

//고객센터
function customerFAQ()
{
	document.location.href='/customer/faq.php';
}

//문의 작성
function customerQNA(c)
{
<? if (isset($_COOKIE['c_usr'])) { ?>
	document.location.href='/customer/qna.php?code='+c;
<? } else { ?>
	alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_MEM_ONLY']?>");
<? } ?>
}

//문의 내역
function customerQNA_list()
{
<? if (isset($_COOKIE['c_usr'])) { ?>
	document.location.href='/customer/qna_list.php';
<? } else { ?>
	alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_MEM_ONLY']?>");
<? } ?>
}

//공지이벤트
function boardList(t)
{
	document.location.href='/board/board_list.php?t='+t;
}

function boardView(t,c)
{
	document.location.href='/board/board_view.php?t='+t+'&code='+c;
}

//이용약관
function footerUserTerm()
{
	document.location.href='/service/user_term.php';
}

function footerPersonTerm()
{
	document.location.href='/service/person_term.php';
}


/*====================================================================================================
	모달창 관련
*/
//얼럿 메세지가 회원 전용이라는 메세지가 있을 경우 로그인 창 띄우기
function checkAlertMsg()
{
	if ($("#id_alert_msg").html()=="<?=$sysMsgDim['A_MEM_ONLY']?>")
	{
		$("#id_alert_msg").html("");
		memberLogin();
	}
}


function alertLayer(title,msg)
{
	$("#id_alert_title").html(title);
	$("#id_alert_msg").html(msg);
	
	common.popOpen("#id_alert_layer");
}

function confirmLayerResult(c)
{
	form=document.confirmLayerForm;
	g=form.g.value;
	obj=form.obj.value;
	
	if (c=="Y")
	{
		if (g=="CHANNEL_NICKNAME")
		{
			//네이버로 가입 후 닉네임 입력시 창을 닫을 경우 가입이 안되며 메인 페이지로 이동
			document.location.href='/index.php';
		}
		
		if (g=="CHANGE_NEW_PWD")
		{
			document.location.href='/index.php';
		}
		
		if (g=="CANCEL_RESERVED")
		{
			if (cancelPrc)
			{
				cancelReservationStart();
			}
		}
		
		if (g=="MEMBER_OUT")
		{
			outMemberGO();
		}
		
		if (g=="REVIEW_DELETE")
		{
			common.popClose("#id_confirm_layer");
			hidFrm.location.href='/service/toure_coure_review_delete.php?code='+obj
		}
		
		if (g=="QNA_DELETE")
		{
			common.popClose("#id_confirm_layer");
			hidFrm.location.href='/customer/qna_delete.php?code='+obj
		}
	}
	else
	{
		if (g=="CHANNEL_NICKNAME")
		{
			//네이버로 가입 후 닉네임 입력시 창을 닫을 경우 가입을 계속 할 경우
			common.popClose("#id_confirm_layer");
		}
		
		if (g=="CHANGE_NEW_PWD")
		{
			common.popClose("#id_confirm_layer");
		}
		
		if (g=="CANCEL_RESERVED")
		{
			common.popClose("#id_confirm_layer");
			common.popClose(obj);
		}
		
		if (g=="MEMBER_OUT")
		{
			common.popClose("#id_confirm_layer");
		}
		
		if (g=="REVIEW_DELETE")
		{
			common.popClose("#id_confirm_layer");
		}
		
		if (g=="QNA_DELETE")
		{
			common.popClose("#id_confirm_layer");
		}
	}
}


function confirmLayer(obj,g)
{
	var title="";
	var msg="";
	
	//채널 닉네임
	if (g=="CHANNEL_NICKNAME")
	{
		title="<?=$sysMsgDim['T_ALERT']?>";
		msg="<?=$sysMsgDim['C_CHANNEL_CANCEL']?>";
	}
	
	//비밀번호 변경
	if (g=="CHANGE_NEW_PWD")
	{
		title="<?=$sysMsgDim['T_ALERT']?>";
		msg="<?=$sysMsgDim['C_CHANGE_NEW_PWD_CANCEL']?>";
	}

	//비밀번호 변경
	if (g=="CANCEL_RESERVED")
	{
		title="<?=$sysMsgDim['T_ALERT']?>";
		msg="<?=$sysMsgDim['T_CANCEL_CONFIRM']?>";
	}
	
	//멤버 탈퇴
	if (g=="MEMBER_OUT")
	{
		title="<?=$sysMsgDim['T_ALERT']?>";
		msg="<?=$sysMsgDim['C_MEMBER_OUT']?>";
	}
	
	//리뷰 삭제
	if (g=="REVIEW_DELETE")
	{
		title="<?=$sysMsgDim['T_ALERT']?>";
		msg="<?=$sysMsgDim['C_REVIEW_DELETE']?>";
	}
	
	//QNA 삭제
	if (g=="QNA_DELETE")
	{
		title="<?=$sysMsgDim['T_ALERT']?>";
		msg="<?=$sysMsgDim['C_REVIEW_DELETE']?>";
	}
	
	form=document.confirmLayerForm;
	form.g.value=g;
	form.obj.value=obj;
	
	if (title!="" && msg!="")
	{
		$("#id_confirm_title").html(title);
		$("#id_confirm_msg").html(msg);
		
		common.popOpen("#id_confirm_layer");
	}
}

function delayLayerResult(c)
{
	form=document.delayLayerForm;
	g=form.g.value;
	obj=form.obj.value;
	
	if (c=="Y")
	{
		if (g=="CHANGE_MEMBER_INFO")
		{
			//정보 수정 후 리로드
			document.location.reload();
		}
		
		if (g=="ADMIN_SET_PWD")
		{
			//비밀번호 변경 페이지로 이동한다.
			document.location.href='/member/mypage.php';
		}
		
		if (g=="CHANGE_NEW_PWD")
		{
			//암호 변경창 닫고 로그인창 연다.
			//common.popClose(obj);
			//common.popClose("#id_delay_layer");
			//memberLogin();
			document.location.href='/index.php';
		}
		
		if (g=="CANCEL_RESERVED")
		{
			//정보 수정 후 리로드
			//document.location.reload();
			document.location.href='/reservation/reservation_check_1.php';
		}
		
		if (g=="ALLIANCE_REGIST")
		{
			//정보 수정 후 리로드
			document.location.reload();
		}
		
		if (g=="QNA_REGIST")
		{
			//정보 등록후 qna 리스트 페이지로 이동
			customerQNA_list();
		}
		
		if (g=="CONTACT_US_REGIST")
		{
			//정보 등록후 메인 페이지로 이동
			document.location.href='/index.php';
		}
		
		if (g=="MEMBER_OUT")
		{
			parent.location.href='/index.php';
		}
		
		if (g=="REVIEW_REGIST")
		{
			parent.location.href='/service/tour_course_review.php?code='+obj;
		}
	}
}

function delayOkLayer(obj,g)
{
	var title="";
	var msg="";
	
	if (g=="CHANGE_MEMBER_INFO")
	{
		title="<?=$sysMsgDim['T_CONFIRM']?>";
		msg="<?=$sysMsgDim['A_CHANGE_INFO']?>";
	}
	
	if (g=="ADMIN_SET_PWD")
	{
		title="<?=$sysMsgDim['T_CONFIRM']?>";
		msg="<?=$sysMsgDim['T_ADMIN_SET_PWD']?>";
	}
	
	if (g=="CHANGE_NEW_PWD")
	{
		title="<?=$sysMsgDim['T_CONFIRM']?>";
		msg="<?=$sysMsgDim['T_PWD_CHANGE_NEW_RESULT']?>";
	}
	
	if (g=="CANCEL_RESERVED")
	{
		title="<?=$sysMsgDim['T_CONFIRM']?>";
		msg="<?=$sysMsgDim['T_CANCEL_SUCCESS']?>";
	}
	
	if (g=="ALLIANCE_REGIST")
	{
		title="<?=$sysMsgDim['T_CONFIRM']?>";
		msg="<?=$sysMsgDim['A_REGIST']?>";
	}
	
	if (g=="QNA_REGIST")
	{
		title="<?=$sysMsgDim['T_CONFIRM']?>";
		msg="<?=$sysMsgDim['A_REGIST']?>";
	}
	
	if (g=="CONTACT_US_REGIST")
	{
		title="<?=$sysMsgDim['T_CONFIRM']?>";
		msg="<?=$sysMsgDim['A_REGIST']?>";
	}

	if (g=="MEMBER_OUT")
	{
		title="<?=$sysMsgDim['T_CONFIRM']?>";
		msg="<?=$sysMsgDim['T_MEMBER_OUT']?>";
	}
	
	if (g=="REVIEW_REGIST")
	{
		title="<?=$sysMsgDim['T_CONFIRM']?>";
		msg="<?=$sysMsgDim['A_REGIST']?>";
	}
	
	form=document.delayLayerForm;
	form.g.value=g;
	form.obj.value=obj;
	
	if (title!="" && msg!="")
	{
		$("#id_delay_title").html(title);
		$("#id_delay_msg").html(msg);
		
		common.popOpen("#id_delay_layer");
	}
}
/*====================================================================================================
	모달창 관련
*/


/*====================================================================================================
	회원 관련
*/
var s_email="";
var s_nickname="";

//이메일 중복 검사
function duplicateEmail(g)
{
	if (g=="WEB") email=$("#id_reg_email").val();
	if (g=="NAVER") email=$("#id_reg_email_name").val();
	
	if (!email || $.trim(email)=="")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_EMAIL']?>");
		return;
	}
	
	$.ajax({
		url: "/load_json/load_email.php",
		data: { 
			email : email ,
		},
		method: "POST",
		dataType: "json" // 서버에서 보내줄 데이터의 타입
	})
	.done(function(json) {
		duplicateEmail_result(json);
	})
	.fail(function(xhr, status, errorThrown) {
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_ERROR_NET']?>");
	})
}

//이메일 중복 결과
function duplicateEmail_result(json)
{
	if (json.msg=="exist")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_EMAIL_DUPLI']?>");
	}
	
	if (json.msg=="error")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_EMAIL_PATTERN']?>");
	}
	
	if (json.msg=="none")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_EMAIL_SUCC']?>");
		s_email=json.email
	}
}

//닉네임 중복 검사
function duplicateNickname(g)
{
	if (g=="WEB") nickname=$("#id_reg_nick").val();
	if (g=="CHANNEL") nickname=$("#id_reg_nick_channel").val();
	
	if (!nickname || $.trim(nickname)=="")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_NICKNAME']?>");
		return;
	}
	
	$.ajax({
		url: "/load_json/load_nick.php",
		data: { 
			nickname : nickname ,
		},
		method: "POST",
		dataType: "json" // 서버에서 보내줄 데이터의 타입
	})
	.done(function(json) {
		duplicateNickname_result(json);
	})
	.fail(function(xhr, status, errorThrown) {
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_ERROR_NET']?>");
	})
}

//닉네임 중복 결과
function duplicateNickname_result(json)
{
	if (json.msg=="exist")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_NICKNAME_DUPLI']?>");
	}
	
	if (json.msg=="error_length")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_NICKNAME_PATTERN_LENGTH']?>");
	}
	
	if (json.msg=="error_bad")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_NICKNAME_BAD']?>");
	}
	
	if (json.msg=="error")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_NICKNAME_PATTERN']?>");
	}
		
	if (json.msg=="none")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_NICKNAME_SUCC']?>");
		s_nickname=json.nickname;
	}
}


//웹 가입
function registMemberCheck()
{
	form=document.memberRegistForm;
	
	gEmail=form.email.value;
	gNickname=form.nickname.value;
	
	if (!gEmail || $.trim(gEmail)=="")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_EMAIL']?>");
		form.email.focus();
		return;
	}

	if (!gNickname || $.trim(gNickname)=="")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_NICKNAME']?>");
		form.nickname.focus();
		return;
	}
	
	if (!s_email || s_email!=gEmail)
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_EMAIL_CHK']?>");
		return;
	}
	
	if (!s_nickname || gNickname!=s_nickname)
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_NICKNAME_CHK']?>");
		return;
	}
	
	if (!form.pwd.value || $.trim(form.pwd.value)=="")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_PWD']?>");
		form.pwd.focus();
		return;
	}
	
	if (form.pwd.value!=form.pwd_chk.value)
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_PWD_NOT_EQUAL_PWD_CHK']?>");
		form.pwd_chk.focus();
		return;
	}

	if (!$("input[name=ad_agree]").is(":checked"))
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_AD_AGREE_CHECK']?>");
		return;
	}
		
	if (!$('#id_agree').is(':checked'))
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_AGREE_CHECK']?>");
		form.agree.focus();
		return;
	}
	
	form.method='post';
	form.action='/member/member_web_join.php';
	form.target='hidFrm';
	form.submit();
}

//로그인 창 보이기
function memberLogin()
{
	common.popClose("#id_join_check_result_layer");
	
	form=document.memberLoginForm;
	
	form.email.value="";
	form.pwd.value="";
	
	common.popOpen("#id_login_layer");
}

//회원가입 완료후 로그인 진행
function reLogin()
{
	common.popClose("#id_member_regist_complete_layer");
	
	memberLogin();
}

//로그인 진행
function memberLoginProcess()
{
	form=document.memberLoginForm;
	
	if (!form.email.value || $.trim(form.email.value)=="")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_EMAIL']?>");
		return;
	}
	
	if (!form.pwd.value || $.trim(form.pwd.value)=="")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_PWD']?>");
		return;
	}
	
	form.method='post';
	form.target='hidFrm';
	form.action='/member/login.php';
	form.submit();
}

//회원 가입창 보이기
function memberRegist()
{
	//로그인창은 기본적으로 닫는다.
	common.popClose("#id_login_layer");
	
	form=document.memberRegistForm;
	form.email.value="";
	form.nickname.value="";
	form.pwd.value="";
	form.pwd_chk.value="";
	s_email="";
	s_nickname="";
	
	$('input[name="ad_agree"]').each(function() {
		$(this).prop('checked',false);
	});
	
	$("#id_agree").prop("checked",false);
	
	common.popOpen("#id_member_regist_layer");
}

//가입확인창 보이기
function memberConfirm()
{
	//로그인창은 기본적으로 닫는다.
	common.popClose("#id_login_layer");
	
	form=document.joinCheckForm;
	form.email.value="";
	
	common.popOpen("#id_join_check_layer");	
}

//가입확인창 이메일 입력
function memberJoinCheck()
{
	form=document.joinCheckForm;
	
	if (!form.email.value || $.trim(form.email.value)=="")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_EMAIL']?>");
		form.email.focus();
		return;
	}
	
	form.method='post';
	form.target='hidFrm';
	form.action='/member/member_check.php';
	form.submit();
}

//가입확인창 이메일 결과
function memberJoinCheck_result(msg,id_type)
{
	common.popClose("#id_join_check_layer");
	
	$("#id_join_check_result_msg").html(msg);
	
	if (id_type!="WEB")
	{
		$("#id_join_check_result_pwd_btn").hide();
		$("#id_join_check_result_btn").addClass("ac");
	}
	else
	{
		$("#id_join_check_result_btn").removeClass("ac");
	}
	
	common.popOpen("#id_join_check_result_layer");
}

//비밀번호 찾기 창 보이기
function memberSearchPwd()
{
	form=document.searchPwdForm;
	form.email.value="";
	
	common.popClose("#id_join_check_result_layer");
	common.popClose("#id_login_layer");
	
	common.popOpen("#id_search_pwd_layer");
}

function memberSearchPwd_check()
{
	form=document.searchPwdForm;
	
	if (!form.email.value || $.trim(form.email.value)=="")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_EMAIL']?>");
		form.email.focus();
		return;
	}
	
	form.method='post';
	form.target='hidFrm';
	form.action='/member/search_email.php';
	form.submit();
}

function changeNewPwd()
{
	form=document.changePwdForm;
	
	if (!form.pwd.value || $.trim(form.pwd.value)=="")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_PWD']?>");
		form.pwd.focus();
		return;
	}
	
	if (form.pwd.value!=form.pwd_chk.value)
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_PWD_NOT_EQUAL_PWD_CHK']?>");
		form.pwd_chk.focus();
		return;
	}
	
	form.method='post';
	form.target='hidFrm';
	form.action='/member/change_email_post.php';
	form.submit();
}

function memberMyInfo()
{
	document.location.href='/member/mypage.php';
}

//로그아웃
function memberLogout()
{
/*
<? if (isset($_COOKIE['c_usr'])) { $memInfoDim=$funcCls->getCookInfo("USER"); } else { $memInfoDim['id_type']=""; } ?>

<? if ($memInfoDim['id_type']=="KAKAO.COM") { ?>
	logOutKakao();
<? } else if ($memInfoDim['id_type']=="FACEBOOK.COM") { ?>
	logOutFacebook();
<? } else { ?>
	document.location.href='/member/logout.php';
<? } ?>
*/
	document.location.href='/member/logout.php';
}

$(document).ready(function() {
	$("#id_search_email").on("click",function() {
		duplicateEmail("WEB");
	});
	
	$("#id_search_nick").on("click",function() {
		duplicateNickname("WEB");
	});
	
	$("#id_search_nick_channel").on("click",function() {
		duplicateNickname("CHANNEL");
	});
});
/*====================================================================================================
	회원 관련
*/


//심플 가입====================================================================================================
//페이스북======================================================
window.fbAsyncInit = function() {
	FB.init({
		appId      : '683387049951931',
		cookie     : false,
		xfbml      : true,
		version    : 'v15.0',
	});
	
	FB.AppEvents.logPageView();
};

(function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   
function facebook_statusChangeCallback(response)
{
	return response.status;
}

function logOutFacebook()
{
	re=facebook_statusChangeCallback(response);
		
	if (re==="connected")
	{
		FB.logout(function(response) {
		   // Person is now logged out
		});
	}
}

function simpleRegistFacebook()
{
	alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_READY']?>");
	/*
	FB.getLoginStatus(function(response) {
		re=facebook_statusChangeCallback(response);
		
		if (re==="connected")
		{
			//이미 FB로그인 상태
			//로그인 프로세스로 이동
		}
		else
		{
			//FB 로그인 창 오픈
			FB.login(function(response) {
				FB.api('/me', 'get', {fields: 'name,email'}, function(r) {
					console.log(r);
				})
			}, {scope: 'public_profile,email'});
		}
	});
	*/
}
//페이스북======================================================


function simpleRegistApple()
{
	document.location.href='/api/call_apple.php';
}

function simpleRegistGoogle()
{
	//alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_READY']?>");
	document.location.href='/api/call_google.php';
}

/*
function simpleRegistGoogle_TEST()
{
	//alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_READY']?>");
	document.location.href='/api/call_google.php';
}
*/

function simpleRegistKakao()
{
	//alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_READY']?>");
	Kakao.Auth.login({
		success: function (response) {
			Kakao.API.request({
				url: '/v2/user/me',
				success: function (response) {
					console.log(response);
					form=document.kakaoForm;
					form.id.value=response.id;
					form.email.value=response.kakao_account.email;
					form.name.value=response.kakao_account.profile.nickname;
					form.method='post';
					form.action='/api/callback_kakao.php';
					form.submit();
				},
				fail: function (error) {
					console.log(error)
				},
			})
		},
		fail: function (error) {
			console.log(error)
		},
	})
}


//카카오로그아웃  
function logOutKakao()
{
	if (Kakao.Auth.getAccessToken())
	{
		Kakao.API.request({
			url: '/v1/user/unlink',
			success: function (response) {
				console.log(response);
				document.location.href='/member/logout.php';
			},
			fail: function (error) {
				console.log(error)
			},
		})
	
		Kakao.Auth.setAccessToken(undefined)
	}
}
  
function simpleRegistNaver(url)
{
	document.location.href=url;
}

function confirmCheck()
{
	confirmLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['C_CHANNEL_CANCEL']?>");
}

function registMemberCheck_channel(m)
{
	form=document.memberRegistChannelForm;
	
	gEmail=form.email.value;
	gNickname=form.nickname.value;
	form.channel.value=m;
	
	if (!gEmail || $.trim(gEmail)=="")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_EMAIL']?>");
		//document.location.href='/index.php';
		return;
	}

	if (!gNickname || $.trim(gNickname)=="")
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_NICKNAME']?>");
		form.nickname.focus();
		return;
	}
	
	if (!s_nickname || gNickname!=s_nickname)
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_NICKNAME_CHK']?>");
		return;
	}

	if (!$("input[name=ad_agree_channel]").is(":checked"))
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_AD_AGREE_CHECK']?>");
		return;
	}

/*		
	if (!$('#id_agree_channel').is(':checked'))
	{
		alertLayer("<?=$sysMsgDim['T_ALERT']?>","<?=$sysMsgDim['A_AGREE_CHECK']?>");
		form.agree.focus();
		return;
	}
*/
	
	form.method='post';
	form.action='/member/member_channel_join.php';
	form.target='hidFrm';
	form.submit();
}
//심플 가입====================================================================================================

var mobChk=false;

function Mobile()
{
	return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}

if (Mobile())
{// 모바일일 경우
    mobChk=true;
}

function pageBack()
{
	history.go(-1);
}