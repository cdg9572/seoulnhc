var returnAjaxData = function(string, url, errorDis, rstId){
	var string = string;	//ex &mode=1234
	var url = url; //ex ./proc/setup_proc.php
	var rst = "";
	$.ajax({
		url: url,
		type: 'POST',
		data: string,
		timeout: 1000 * 10000 , //1초동안 응답이 없으면 error처리
		contentTypeString : "text/xml; charset=utf-8",		
		error: function(){
				alert('데이터 전송중 에러가 발생하였습니다.');
		},
		success: function(rstData){
			if(rstId){
				$("#"+rstId).html(rstData);
			}else{
				alert(rstData);
			}
		}
	});
	return;
}

function layerPop (target, src, width, height) {
	 $.modal('<iframe id="layerPop" name="layerPop" src="' + src + '" height="' + height + '" width="' + width + '" frameborder="0" scrolling="no" style="border:0"></iframe>', {
	 	overlayClose:true
	 });
	// $("#" + target).modal();
}


function layerPop_new (target, src, width, height) {
	$('#' + target).remove();
	$("head").append("<link href='/css/_adm/basic.css' rel='stylesheet' type='text/css'>");
	$("head").append("<script type='text/javascript' src='/admin/js/jquery.simplemodal.js'></script>");
	$("body").append("<div id='" + target + "'></div>");

	 $.modal('<iframe id="layerPop" name="layerPop" src="' + src + '" height="' + height + '" width="' + width + '" style="border:0"></iframe>', {
	 	overlayClose:true
	 });
	 $("#" + target).modal();
}


function fnWinPopup(w_url, w_name, w_width, w_height) {
	var w_left = (screen.width-w_width)/2;
	var w_top = (screen.height-w_height)/2;
	var ChkWindow  =  window.open(w_url,w_name,'left='+w_left+', top='+w_top+', width='+w_width+', height='+w_height+', scrollbars=yes, statusbars=no');
	ChkWindow.focus();
}


function modalclose()
{
	$.modal.close();
}


var imgExtCheck = function(obj) {
	//	e_thumb_img
	//alert('선택한 파일은 '+ event.srcElement.value + '입니다');
  if( !event.srcElement.value.match(/(.jpg|.jpeg|.gif|.png)/)) {
		alert('이미지 파일만 업로드 가능합니다.');
		return;
  }
}

// 라디오 버튼값 확인하기
var checkRadioValue = function(obj) {
	for (i=0; i<obj.length; i++)
	{
		if (obj[i].checked)
		{
			return obj[i].value;
		}
	}
	return false;
}

// 이메일 유효성 체크
var checkEmail = function(str){
	var reg = /^((\w|[\-\.])+)@((\w|[\-\.])+)\.([A-Za-z]+)$/;
	if (str.search(reg) != -1) {
		return true;
	}
	return false;
}


var noSpecialStr = function (obj) {
	var onvalue = obj.value;

  count=0
  for (i=0;i<onvalue.length;i++) {
    ls_one_char = onvalue.charAt(i);

    if(ls_one_char.search(/[0-9|a-z|A-Z|ㄱ-ㅎ|ㅏ-ㅣ|가-힝]/) == -1) {
   count++
    }
  }
  if(count!=0) {
  	result = false;
  } else {
  	result = true;
  }
	return result;

}


function CheckEmail(str)
{
	 var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
	 if (filter.test(str)) { return true; }
	 else { return false; }
}


$(document).ready(function(){
	/* left menu icon */
	$('.boxLeftMenuIcon').click(function(){
		if ($('.boxLeft').hasClass('on') != 1) {
			$('.boxLeft').animate({"left":"0"},300);
			$('.dim').css('display','block');
			$('.boxLeft').addClass('on');
		} else {
			$('.boxLeft').animate({"left":"-100%"},300);
			$('.dim').css('display','none');
			$('.boxLeft').removeClass('on');
		}
	});
	$('.dim').click(function(){
		$('.boxLeft').animate({"left":"-=100%"},300);
		$('.dim').css('display','none');
	});
});

/* 파일 업로드 디자인 */
function fileUpload(obj) {
	var $this = $(obj);
	var thisFile = $this[0].files;
	var thisVal = $this.val();
	var txtVal = $this.parent().prev('.inputTxt');
	
	(thisVal.length > 0 || thisFile.length > 0) ? txtVal.removeClass('error').addClass('active').val(thisVal) : txtVal.removeClass('active').val(thisVal);
}

$(document).on("click", "#excelAdd", function(){
    if(confirm('엑셀 업로드를 하시겠습니까?') == false){return false;}
    if(!$('input[name=excel-file]').val()) {
    alert('엑셀 파일을 선택해주세요.');
    return false;
    }   
    var from_data = {
        mode    : "addTempExcel"
    };
    
	$("#cForm").ajaxForm({
		url : "/admin/disabled/proc/disabled_ajax.php",
		enctype : "multipart/form-data",
		dataType : "json",
		error:function(request, error) {
				  
		alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
	},
		success : function(result){
			alert("success") ;
		}
	});
    $('#cForm').submit();
    	
    
});
