var work = [
    /*메인*/
	{ "cate":"m01", "dep01":"기타", "dep02":"메인", "url":"html/main/index.html", "date":"-" },
  { "cate":"m01", "dep01":"기타", "dep02":"로그인", "url":"html/main/login.html", "date":"-" },
  { "cate":"m01", "dep01":"기타", "dep02":"팝업-비번변경", "url":"html/main/pop-pwd-find.html", "date":"-" },
 

	{ "cate":"m02", "dep01":"마이페이지", "dep02":"업체정보", "url":"html/mypage/myinfo.html", "date":"-" },
  { "cate":"m02", "dep01":"마이페이지", "dep02":"판매현황-월별", "url":"html/mypage/status-list01.html", "date":"-" },
  { "cate":"m02", "dep01":"마이페이지", "dep02":"판매현황-정산", "url":"html/mypage/status-list02.html", "date":"-" },

  { "cate":"m03", "dep01":"예약", "dep02":"목록", "url":"html/reservation/list.html", "date":"2022-11-13" },
  { "cate":"m03", "dep01":"예약", "dep02":"등록", "url":"html/reservation/register.html", "date":"2022-11-13" },
  { "cate":"m03", "dep01":"예약", "dep02":"완료", "url":"html/reservation/complete.html", "date":"2022-11-13" },

  { "cate":"m04", "dep01":"서비스", "dep02":"코스정보", "url":"html/service/course-info.html", "date":"2022-11-13" },
 
];

 
$(function(){   
	listTable(".siteNavi li", ".siteNavi li .num");
}); 
 
function listTable(cls, num){   
	var tr;
	for(i=0; i<work.length; i++){
		tr += "<tr class="+work[i].cate+">";
		tr += "<td>"+work[i].dep01+"</td>";
		tr += "<td>"+work[i].dep02+"</td>";
		tr += "<td><a href='./"+work[i].url+"' target='_blank'>"+work[i].url+"</a></td>";
		tr += "<td class='ac'>"+work[i].date+"</td>";
		tr += "</tr>"; 
	}  
	$("table tbody").append(tr);  
	
	$(num).each(function(z){
		if(z===0){
			$(num).eq(z).text("("+work.length+"p)");
		}else{
			$(num).eq(z).text("("+$('.m0'+z).length+"p)");
		} 
	}); 
	$("body").on("click",cls, function(){
		$(cls).removeClass("on"); 
		$(this).addClass("on");
		$("table tbody tr").hide();
		if($(this).index() === 0){
			$("table tbody tr").show();
		}else{
			$(".m0"+$(this).index()).show();
		} 
	});  
}  
