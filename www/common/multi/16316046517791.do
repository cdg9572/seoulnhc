





 
<!DOCTYPE html>
<html lang="ko">
    
<head>
    <meta charset="euc-kr" />
    <title>고려대학교의료원</title>   
    
    
    
    

 
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2" />
    <meta name="keywords" content="3차병원,고대의료원,고려대학교의료원,국제진료센터,의료관광,의료원,대학병원,암,암센터,암치료,암환자,고위험임신,교수진료,교통사고,구로병원,병원,병원예약,병원조회,병원진찰,병원찾기,안산병원,안암병원,암전문,연구병원,연구중심병원,응급병원,응급센터,응급의료센터,전국대학병원,종합병원,의과대학,전국병원,종합건강진단센터,건강건진센터,종합건강검진,종합건강진단센터,안암지역병원,안암병원추천,안암대학병원,안암3차병원,성북구병원,성북구대학병원,성북구병원추천,안암동병원,안암동대학병원,안암동대학병원추천,안암고대병원,성북고대병원,성북고대대학병원,안암고대의료원,구로지역병원,구로병원추천,구로대학병원,구로3차병원,구로구병원,구로구3차병원,구로구3차병원추천,구로구대학병원,구로고대병원,구로고대의료원,구로고대대학병원,안산지역병원,안산병원추천,안산대학병원,안산3차병원,경기도병원,경기도대학병원,안산시병원,안산시병원추천,안산시대학병원,경기도3차병원,안산고대병원,안산고대의료원,안산고대대학병원,경기도종합병원,임상시험,임상시험센터,건강,건강검사,건강상담,고대,의료,의학" />
    <meta name="description" content="고려대학교의료원,고대안암병원,고대구로병원,고대안산병원,의료원소개,의료원장인사말,연혁,현황,찾아오는길,소식,나눔과봉사,미션비전" />
 
    <!-- SHORTCUT ICON -->
    <link rel="shortcut icon" href="/img/FAV_icon.png" />
    <link rel="apple-touch-icon" href="/img/FAV_icon.png" />
 
    <!-- JS -->
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/KM_js.js"></script> 
  
    <!-- CSS -->
    <link href="/css/KM_reset.css" rel="stylesheet" type="text/css" /> 
    <link href="/css/KM_style.css" rel="stylesheet" type="text/css" />  
    
    <!--[if lt IE 10]>
    <script src="../js/html5shiv.js"></script>
    <script src="../js/css3-mediaqueries.js"></script>
    <![endif]-->    

    <script>
        
        // 모바일 판단
        var currentOS;
        var mobile = (/iphone|ipad|ipod|android/i.test(navigator.userAgent.toLowerCase()));

        if (mobile) {
        var userAgent = navigator.userAgent.toLowerCase();
            if (userAgent.search("android") > -1)
                 currentOS = "android"; 
            else if ((userAgent.search("iphone") > -1) || (userAgent.search("ipod") > -1)
            || (userAgent.search("ipad") > -1))
            currentOS = "ios"; 
        else 
            // Mobile의 경우
            currentOS = "else"; 
            //self.location.href='http://m.kumc.or.kr/';            
           // var refurl = document.referrer;
        	//if(refurl.indexOf("kumc.or.kr")==-1){
        	//	self.location.href = "http://m.kumc.or.kr/";
        	//}
        } else {
            // PC의 경우
            currentOS = "nomobile"; 
        }
        
        
        /* TOTAL SEARCH */			 
        function checkTotSearch(sf){
            if(!sf.pQuery.value){
                alert("검색어를 입력하십시오.");
                return false;
            }
            sf.pQuery_tmp.value = sf.pQuery.value;
            return true;
        }   


        /* LIST SEARCH */
        function search(){
            var sf = document.searchForm;
            sf.submit();
        } 
    </script>    
 
    <script src="../js/KM_main_js.js"></script> 
    <link href="../css/KM_main.css" rel="stylesheet" type="text/css" /> 
</head>
    
<body  
       
       id="KM00">
<div id="KM_wrap">  
    
    <!-- HEADER -->
    

 
    <div title="스킵메뉴" id="skipMenu" tabindex="0">
        <a href="#KM_header"> 주 메뉴 바로가기 </a>
        <a href="#KM_main"> 본문 내용 바로가기 </a>
    </div><!-- }#skipMenu -->   
    
    <header id="KM_header" tabindex="0"><!-- class="active hover scroll" -->
        <div class="KM_inner">
            <h1 id="KM_logo"><a href="/main/index.do" title="첫페이지로 이동">고려대학교의료원</a></h1>
            <a href="#KM_hidden_close" class="foucs_btn">메뉴 건너띄기</a>
            <button id="KM_GTN_open" title="메뉴 보기 및 닫기"><b> <span></span><span></span><span></span> </b></button> <!-- class="open" -->
            <div id="KM_GTN">    
                <nav id="KM_nav">
                    <ul id="KM_nav_list">
                        <li>
                            <a href="/introduction/greeting.do" class="KM_nav00 KM_nav10">의료원 소개</a>
                            <ul class="KM_nav_sub">
                                <li><a href="/introduction/greeting.do" class="KM_nav11">소개</a></li>
                                <li><a href="/introduction/status01.do" class="KM_nav12">현황</a></li>
                                <li><a href="/introduction/organizationChart.do" class="KM_nav13">조직도</a></li>
                                <li><a href="/introduction/history2010.do" class="KM_nav14">연혁</a></li>
                                <li><a href="/introduction/directorHistory.do" class="KM_nav15">역대 의료원장</a></li>
                                <li><a href="/introduction/brochure.do?BOARD_ID=B053" class="KM_nav100">홍보브로슈어</a></li>
                                <li><a href="/introduction/promotionVodList01.do?BOARD_ID=B025" class="KM_nav16">홍보동영상</a></li>
                                <li><a href="/introduction/hi.do" class="KM_nav17">HI</a></li>
                                <li><a href="/introduction/trafficCarAnam.do" class="KM_nav18">오시는 길</a></li>
                                <li><a href="/introduction/giftshop.do" class="KM_nav19">기념품샵</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/news/noticeList.do?BOARD_ID=B021" class="KM_nav00 KM_nav20">공지&middot;소식</a>
                            <ul class="KM_nav_sub">
                                <li><a href="/news/noticeList.do?BOARD_ID=B021" class="KM_nav21">공지사항</a></li>
                                <li><a href="/news/newsList.do?BOARD_ID=B022" class="KM_nav22">뉴스</a></li>
                                <li><a href="/news/pressList.do" class="KM_nav23">언론보도</a></li>
                                <li><a href="/news/recruit.do" class="KM_nav24">채용정보</a></li>
                                <li><a href="/news/biddingList.do" class="KM_nav25">입찰공고</a></li>
                                <li><a href="/news/seasonPress.do?BOARD_ID=B047" class="KM_nav26">간행물</a></li>
                                <li><a href="/news/emailHealthList.do?BOARD_ID=B043" class="KM_nav27">이메일 건강정보</a></li>
                                <li><a href="/news/kumctvVodList01.do?BOARD_ID=B038" class="KM_nav28">KU Medicine TV</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/research/education.do" class="KM_nav00 KM_nav30">교육</a>
                            <ul class="KM_nav_sub">
                                <li><a href="http://medicine.korea.ac.kr/" class="KM_nav31" target="_blank" title="클릭 새 창">의과대학</a></li>
                                <li><a href="http://pbhealth.korea.ac.kr/" class="KM_nav32" target="_blank" title="클릭 새 창">보건대학원</a></li>
                                <li><a href="http://dent.korea.ac.kr/" class="KM_nav33" target="_blank" title="클릭 새 창">임상치의학<span>대학원</span></a></li> 
                            </ul>
                        </li>
                        <li>
                            <a href="/research/research.do" class="KM_nav00 KM_nav40">연구</a>
                            <ul class="KM_nav_sub">
                                <li><a href="http://research.kumc.or.kr/" class="KM_nav43" target="_blank" title="클릭 새 창">의료원산학<span>협력단</span></a></li>
                                <li><a href="http://hrpc.kumc.or.kr/" class="KM_nav43" target="_blank" title="클릭 새 창">연구대상자<span>보호센터</span></a></li>
                                <li><a href="http://medsh.kumc.or.kr/" class="KM_nav43" target="_blank" title="클릭 새 창">임상연구<span>지원본부</span></a></li>
                                <li><a href="https://kumagic.korea.ac.kr/kumagic/index.do" class="KM_nav43" target="_blank" title="클릭 새 창">KU-MAGIC</a></li>
                                <li><a href="http://kumcbk21.korea.ac.kr/" class="KM_nav42" target="_blank" title="클릭 새 창">의과학사업단</a></li>
                                <li><a href="http://ctc.kumc.or.kr/" class="KM_nav44" target="_blank" title="클릭 새 창">안암병원<span>임상시험센터</span></a></li>
                                <li><a href="http://www.kughctc.or.kr/" class="KM_nav45" target="_blank" title="클릭 새 창">구로병원<span>임상시험센터</span></a></li>
                                <li><a href="http://kisc.kumc.or.kr/index.php" class="KM_nav44" target="_blank" title="클릭 새 창">구로병원<span>의료기기중개</span><span>임상시험지원센터</span></a></li>
                                <li><a href="http://asctc.kumc.or.kr/" class="KM_nav41" target="_blank" title="클릭 새 창">안산병원<span>임상시험센터</span></a></li>
								<li><a href="https://scholarworks.korea.ac.kr/kumedicine/" class="KM_nav44" target="_blank" title="클릭 새 창">ScholarWorks</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="http://anam.kumc.or.kr/main/index.do" class="KM_nav00 KM_nav50" target="_blank" title="클릭 새 창">진료</a>
                            <ul class="KM_nav_sub">
                                <li><a href="http://anam.kumc.or.kr/main/index.do" class="KM_nav51" target="_blank" title="클릭 새 창">고려대 안암병원</a></li>
                                <li><a href="http://guro.kumc.or.kr/main/index.do" class="KM_nav52" target="_blank" title="클릭 새 창">고려대 구로병원</a></li>
                                <li><a href="http://ansan.kumc.or.kr/main/index.do" class="KM_nav53" target="_blank" title="클릭 새 창">고려대 안산병원</a></li>
                            </ul>
                        </li>
                        <li> 
                            <a href="/service/exchanges.do" class="KM_nav00 KM_nav60">나눔과 봉사</a>
                            <ul class="KM_nav_sub">
                            	<li><a href="http://donation.kumc.or.kr/" class="KM_nav61" target="_blank">발전기금</a></li>
                                <li><a href="/service/exchanges.do" class="KM_nav62">교류협력</a></li>
                                <li><a href="/service/contribution01.do" class="KM_nav63">사회공헌활동</a></li>
                                <li><a href="/service/galleryList01.do" class="KM_nav64">Life&#x207A; 갤러리</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav><!-- }#KM_nav_list -->

                <div id="KM_header_search"> 
 
                    <form name="searchForm" method="post" action="/totSearch/index.do" onsubmit="return checkTotSearch(this);">
                        <fieldset>
                            <a href="#pQuery" id="KM_HS_open">검색하기 사용</a>
                            <input type="hidden" name="pDbNo" value="" />
							<input type="hidden" name="pQuery_tmp" value="" />
                            
                            <label for="pQuery" class="sound">검색</label>							
                            <input type="text" id="pQuery" name="pQuery" value="" placeholder="검색어" />
                            <button type="submit" id="KM_HS_btn" >검색하기</button> 
                        </fieldset>
                    </form>
     
                </div><!-- }#KM_header_search -->
 
                <div id="KM_header_lang"> 
                    <a href="http://www.kumc.or.kr/language/ENG/main/index.do" target="_blank" title="클릭 새 창">ENGLISH</a>
                </div><!-- }#KM_header_lang -->  

                <div id="KM_header_top">
                    <div id="KM_header_top_inner">
                        <ul id="KM_GTN_list">
                            <li><a href="http://medicine.korea.ac.kr" title="클릭 새 창">고려대 의과대학</a></li>
                            <li><a href="http://anam.kumc.or.kr" title="클릭 새 창">고려대 안암병원</a></li>
                            <li><a href="http://guro.kumc.or.kr" title="클릭 새 창">고려대 구로병원</a></li>
                            <li><a href="http://ansan.kumc.or.kr" title="클릭 새 창">고려대 안산병원</a></li>    
                            <li><a href="http://www.kumc.or.kr/introduction/koyoung.do" title="클릭 새 창"> 고영캠퍼스</a></li>                 
                        </ul>
                        <ul id="KM_GTN_intra">
                            <li><a href="/news/seasonPress.do?BOARD_ID=B047" title="클릭 새 창">WEBZINE</a></li>
                            <li><a href="http://portal.kumc.or.kr/" target="_blank" title="클릭 새 창">INTRANET</a></li>                 
                        </ul>
                    </div>    
                </div><!-- }#KM_header_lang -->
                
                <button id="KM_GTN_close" title="메뉴 닫기"><span></span><span></span></button> 
            </div><!-- }#KM_GTN -->
        </div>
        <button id="KM_hidden_close"><span>메뉴닫기</span></button>
    </header><!-- }#KM_header --> 


    <div id="KM_main_visual"> 
        <aside id="KM_main_aside">
            <ul>
                <li><a href="http://anam.kumc.or.kr/main/index.do" target="_blank" title="클릭 새 창">안암병원</a></li>
                <li><a href="http://guro.kumc.or.kr/main/index.do" target="_blank" title="클릭 새 창">구로병원</a></li>
                <li><a href="http://ansan.kumc.or.kr/main/index.do" target="_blank" title="클릭 새 창">안산병원</a></li>
                <li><a href="http://medicine.korea.ac.kr/" target="_blank" title="클릭 새 창">의과대학</a></li> 
				<li><a href="http://donation.kumc.or.kr/" target="_blank" title="클릭 새 창">발전기금</a></li> 
            </ul>
        </aside>
        
        <a href="#KM_main" id="KM_main_visual_btn">다음 내용 보기</a>
        <video poster="/img/KM_main_visual.jpg" loop="" autoplay="" muted="muted"> 
            <source src="/video/KUMC_video_intro2.mp4" type="video/mp4" /> 
        </video>        
        <button id="KM_MV_PP">동영상 정지</button>
    </div><!-- }#KM_main_visual -->
    
    <main id="KM_main">
       
 
        <div id="KUM_hp">
            <ul>
                <li><a href="http://anam.kumc.or.kr" target="_blank" title="클릭 새 창"><span>고려대 안암병원</span></a></li>
                <li><a href="http://guro.kumc.or.kr" target="_blank" title="클릭 새 창"><span>고려대 구로병원</span></a></li>
                <li><a href="http://ansan.kumc.or.kr" target="_blank" title="클릭 새 창"><span>고려대 안산병원</span></a></li>  
            </ul>
            <span class="point_bar"></span>
        </div><!-- }#KUM_hp --> 
        
        <div id="KUM_intro">
            <span class="point_bar"></span>
            <h2 class="KUM_title_h2">초일류 KU Medicine을 향한 꿈</h2>
            <ul>
                <li>
                    <div class="KUM_intro_box">
                        <h3>인사말</h3>
                        <p>최고의 신뢰를 받는 의료기관으로 <br> 입지를 굳히겠습니다.</p>
                        <a href="/introduction/greeting.do">자세히 보기</a>
                    </div>
                </li> 
                <li>
                    <div class="KUM_intro_box">
                        <h3>미션&middot;비전</h3>
                        <p>생명존중의 첨단의학으로 <br> 인류를 건강하고 행복하게 한다</p>
                        <a href="/introduction/greeting.do">자세히 보기</a>
                    </div>
                </li>
                <li>
                    <div class="KUM_intro_box">
                        <h3>연혁</h3>
                        <p>고려대의료원의 역사를 <br> 알아봅니다 </p>
                        <a href="/introduction/history2000.do">자세히 보기</a>
                    </div>
                </li>
                <li>
                    <div class="KUM_intro_box">
                        <h3>발전기금</h3>
                        <p>초일류를 향한 <br> 희망물결에 함게 해 주십시오</p>
                        <a href="http://donation.kumc.or.kr/" target="_blank">자세히 보기</a> 
                        <!-- <h3>오시는 길</h3>
                        <p>고려대학교병원으로 <br> 오시는 길을 안내해 드립니다</p>
                        <a href="/introduction/trafficCarAnam.do">자세히 보기</a> -->
                    </div>
                </li>
            </ul>
            <span class="point_bar"></span>
        </div><!-- }#KUM_intro --> 
        
        <div id="KUM_news">
            <span class="point_bar"></span>
            <h2 class="KUM_title_h2">KU Medicine News</h2>
            
            <ul id="KUM_news_list">
                
                <!-- LOOP{ -->
                
                <li>
                    <div class="KUM_news_box">
                        <figure class="KUM_news_img">
                         
							<img src="/upload/board/B022/1631521542263_0.JPG" alt="" />
                         
                         	
                        </figure>
                        <p class="KUM_news_title">
                            <b>
                                의료원
                                
                                
                                
                            </b> 
                            <span>
                                
                                    [의대] 2021학년도 1학기 성적우수자 상패 수여식 개최 
                                
                            </span> 
                            <!--  2021.09.13  -->
                        </p>  
                        <a href="/news/newsView.do?BNO=4424&cPage=1&BOARD_ID=B022" class="KUM_news_more"><span>자세히 보기</span></a>
                    </div>
                </li>
                
                <li>
                    <div class="KUM_news_box">
                        <figure class="KUM_news_img">
                         
							<img src="/upload/board/B022/1631493982898_22-side.jpg" alt="" />
                         
                         	
                        </figure>
                        <p class="KUM_news_title">
                            <b>
                                의료원
                                
                                
                                
                            </b> 
                            <span>
                                
                                    [의대] 의대 교수진, 제31회 과학기술 우수논문상 선정 
                                
                            </span> 
                            <!--  2021.09.13  -->
                        </p>  
                        <a href="/news/newsView.do?BNO=4423&cPage=1&BOARD_ID=B022" class="KUM_news_more"><span>자세히 보기</span></a>
                    </div>
                </li>
                
                <li>
                    <div class="KUM_news_box">
                        <figure class="KUM_news_img">
                         
							<img src="/upload/board/B022/1631492132919_s.jpg" alt="" />
                         
                         	
                        </figure>
                        <p class="KUM_news_title">
                            <b>
                                
                                
                                구로
                                
                            </b> 
                            <span>
                                
                                    [구로] 韓의료진 개발 新 관절주위골절 수술법, 세계적으로 인정받아 
                 &#x2026;
                            </span> 
                            <!--  2021.09.13  -->
                        </p>  
                        <a href="/news/newsView.do?BNO=4422&cPage=1&BOARD_ID=B022" class="KUM_news_more"><span>자세히 보기</span></a>
                    </div>
                </li>
                
                <!-- }LOOP --> 

            </ul>             
        </div><!-- }#KUM_news --> 
 

        <div id="KUM_tv"> 
            <h2 class="KUM_title_h2">KU Medicine TV</h2>
            <div id="KUM_tv_box">
                <ul id="KUM_tv_list">
                    <!-- LOOP{ -->
                    
                    <li class="KUM_tv_li">
                        <div class="KM_inner">
                            <figure class="KUM_tv_img">  
                                
                                    <img src="/upload/board/B046/1631578530124_maxresdefault (16).jpg" alt="" />
                                
                                  
                            </figure> 
                            <p class="KUM_tv_txt"> [이게맞는건강?] 임신부 코로나백신 맞아도 괜찮을까? </p>
                            <a class="KUM_tv_link video_btn" href="#" data-video="https%3A%2F%2Fyoutu.be%2Fzp3YM8xbF7g"><span>영상보기</span></a> 
                        </div>    
                    </li> 
                    
                    <li class="KUM_tv_li">
                        <div class="KM_inner">
                            <figure class="KUM_tv_img">  
                                
                                    <img src="/upload/board/B046/1631578421956_maxresdefault (15).jpg" alt="" />
                                
                                  
                            </figure> 
                            <p class="KUM_tv_txt"> [이게맞는건강?] 이어폰 사용 귀 건강에 괜찮을까요? </p>
                            <a class="KUM_tv_link video_btn" href="#" data-video="https%3A%2F%2Fyoutu.be%2FW5t3q9t1ZQ8"><span>영상보기</span></a> 
                        </div>    
                    </li> 
                    
                    <li class="KUM_tv_li">
                        <div class="KM_inner">
                            <figure class="KUM_tv_img">  
                                
                                    <img src="/upload/board/B046/1631232581661_maxresdefault (14).jpg" alt="" />
                                
                                  
                            </figure> 
                            <p class="KUM_tv_txt"> [왓츠인마이백]산부인과 의사의 가방엔 무엇이 들었을까? </p>
                            <a class="KUM_tv_link video_btn" href="#" data-video="https%3A%2F%2Fyoutu.be%2F1wyndJ3tykY"><span>영상보기</span></a> 
                        </div>    
                    </li> 
                        
                    <!-- }LOOP --> 
                    
                </ul> 
            </div><!-- }#KUM_tv_box --> 
            <div id="KUM_tv_PN">
                <button id="KUM_tv_prev">이전</button> 
                <button id="KUM_tv_next">다음</button> 
            </div>
            <ul id="KUM_tv_page"> </ul>
        </div><!-- }#KUM_KUM_tvnews --> 
      

        <div id="KUM_SNS" tabindex="0"> 
            <h2 class="KUM_title_h2">SNS&middot;Media</h2>
            <ul id="KUM_SNS_list">
                <li><a href="https://www.facebook.com/KUMCfriend" target="_blank" title="클릭 새 창"><span></span><b>Facebook</b></a></li>
                <li><a href="https://www.youtube.com/channel/UCloHi95j0b64KB7B0foV5qA?view_as=subscriber" target="_blank" title="클릭 새 창"><span></span><b>YouTube</b></a></li>
                <li><a href="https://tv.naver.com/kumctv" target="_blank" title="클릭 새 창"><span></span><b>NaverTV</b></a></li>
                <li><a href="https://post.naver.com/series.nhn?memberNo=29931747" target="_blank" title="클릭 새 창"><span></span><b>안암병원 네이버포스트</b></a></li>
                <li><a href="https://post.naver.com/guro_kumc" target="_blank" title="클릭 새 창"><span></span><b>구로병원 네이버포스트</b></a></li>
                <li><a href="https://post.naver.com/my.nhn?memberNo=35141666&navigationType=push" target="_blank" title="클릭 새 창"><span></span><b>안산병원 네이버포스트</b></a></li>
            </ul>
        </div><!-- }#KUM_SNS -->
        
        <div id="KUM_culture"> 
            <h2 class="KUM_title_h2">공헌 및 활동</h2>
            <ul id="KUM_culture_list">
                <li>
                    <div class="KUM_CL_box">
                        <span class="KUM_CL_img"></span>
                        <b class="KUM_CL_title">교류협력</b>
                        <p class="KUM_CL_txt">교육, 연구 및 진료 분야에서 <br> 다양한 교류 프로그램들을 수행하고 있습니다</p>
                        <a class="KUM_CL_more" href="/service/exchanges.do">자세히 보기</a>
                    </div>    
                </li>
                <li>
                    <div class="KUM_CL_box">
                        <span class="KUM_CL_img"></span>
                        <b class="KUM_CL_title">사회공헌 활동</b>
                        <p class="KUM_CL_txt">'인간중심의 참 병원'이라는 가치를 <br> 전 세계속에서 구현해 나가겠습니다</p>
                        <a class="KUM_CL_more" href="/service/contribution01.do">자세히 보기</a>
                    </div>    
                </li>
                <li>
                    <div class="KUM_CL_box">
                        <span class="KUM_CL_img"></span>
                        <b class="KUM_CL_title">Life&#x207A; 갤러리</b>
                        <p class="KUM_CL_txt">나눔과 봉사의 이야기, <br> 갤러리로 제공합니다</p>
                        <a class="KUM_CL_more" href="/service/galleryList01.do">자세히 보기</a>
                    </div>    
                </li>
            </ul>
        </div><!-- }#KUM_culture -->
     
    

    </main><!-- }#KM_main -->
    
    <!-- FOOTER -->
    

 
    <aside id="KU_aside">
        <ul>
            <li><a href="http://anam.kumc.or.kr" target="_blank" title="클릭 새 창"><span></span><span>안암병원</span></a></li>
            <li><a href="http://guro.kumc.or.kr" target="_blank" title="클릭 새 창"><span></span><span>구로병원</span></a></li>
            <li><a href="http://ansan.kumc.or.kr" target="_blank" title="클릭 새 창"><span></span><span>안산병원</span></a></li> 
            <li><a href="#KM_header" title="클릭 새 창" id="goTop"><b>위로</b></a></li> 
        </ul>
    </aside><!-- }#KU_aside -->
        
    <footer id="KU_footer">
        <div id="KU_footer_nav">
            <div class="KU_inner">
                <ul id="KU_footer_nav_list">
                    <li><a href="/util/rullInternet.do">인터넷이용약관</a></li>
                    <li><a href="/util/privacy.do">개인정보처리방침</a></li>
                    <li><a href="/util/rull.do">환자권리장전</a></li>
                    <li><a href="/util/noemail.do">이메일주소수집거부</a></li> 
                </ul>
                
                <div class="KU_footer_select" id="KU_FS_family">
                    <button class="KU_FS_btn">패밀리 사이트 <span>열기 및 닫기</span></button>
                    <ul class="KU_FS_list">
                        <li><a href="http://anam.kumc.or.kr" target="_blank" title="클릭 새 창">고려대학교 안암병원</a></li>
						<li><a href="http://guro.kumc.or.kr" target="_blank" title="클릭 새 창">고려대학교 구로병원</a></li>
						<li><a href="http://ansan.kumc.or.kr" target="_blank" title="클릭 새 창">고려대학교 안산병원</a></li>
						<li><a href="http://medicine.korea.ac.kr" target="_blank" title="클릭 새 창">의과대학</a></li>
						<li><a href="http://chs.korea.ac.kr" target="_blank" title="클릭 새 창">보건과학대학</a></li>
						<li><a href="http://pbhealth.korea.ac.kr" target="_blank" title="클릭 새 창">보건대학원</a></li>
						<li><a href="http://medlib.korea.ac.kr" target="_blank" title="클릭 새 창">의학도서관</a></li>
						<li><a href="http://www.korea.ac.kr" target="_blank" title="클릭 새 창">고려대학교</a></li>
						<li><a href="http://donation.kumc.or.kr/" target="_blank" title="클릭 새 창">기금사업본부</a></li>
						<li><a href="http://www.kumc.or.kr/donation/" target="_blank" title="클릭 새 창">의학발전기금위원회</a></li>
						<li><a href="http://research.kumc.or.kr" target="_blank" title="클릭 새 창">의료원산학협력단</a></li>
						<li><a href="http://www.kuma.or.kr" target="_blank" title="클릭 새 창">의과대학교우회</a></li>
						<li><a href="http://anam.kumcrnd.or.kr" target="_blank" title="클릭 새 창">안암 연구중심병원</a></li>
						<li><a href="http://guro.kumcrnd.or.kr" target="_blank" title="클릭 새 창">구로 연구중심병원</a></li>
						<li><a href="http://ansan.kumcrnd.or.kr" target="_blank" title="클릭 새 창">안산 연구중심병원</a></li>
						<li><a href="http://www.kmaster.org" target="_blank" title="클릭 새 창">K-Master 사업단</a></li>
                    </ul>   
                    <button class="KU_FS_close">닫기</button>
                </div><!-- }#KU_FS_family -->
                
                <div class="KU_footer_select" id="KU_FS_apply">
                    <button class="KU_FS_btn">진료지원부서 <span>열기 및 닫기</span></button>
                    <ul class="KU_FS_list">
                        <li><a href="http://www.kumc.or.kr/depthome/etetd/">교육수련팀</a></li>
						<li><a href="http://www.kumc.or.kr/depthome/etmsw/">의료사회사업팀</a></li>
                    </ul> 
                    <button class="KU_FS_close">닫기</button>
                </div><!-- }#KU_FS_apply -->
            </div>
        </div><!-- }#KU_footer_nav -->
        
        <div id="KU_footer_aword"> 
            <ul>
                <li>국제의료기관평가위원회 JCI 인증획득</li>
				<li>AAHRPP 인증 획득</li>
				<li>FERCAP 인증획득</li>
				<li>국가품질경영대회 대통령상</li>
				<li>대한민국 경영혁신 대상</li>
				<li>대한민국 보건산업 대상</li>
				<li>심혈관센터 메디컬코리아 대상</li>
				<li>소화기센터 글로벌의료마케팅 대상</li>
            </ul> 
        </div><!-- }#KU_footer_aword -->
        
        <div id="KU_footer_copy"> 
            <p>서울시 성북구 고려대로 73(안암동5가) 고대의료원   /   문의전화: 02-920-5114, 6114</p>
            <p>&copy; 2020 Korea University Medicine. All Rights Reserved.</p>
        </div><!-- }#KU_footer_aword -->
        
    </footer><!-- }#KU_footer -->
	<!-- Google Tag Manager 2015.05.8 insert
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MHM45L"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MHM45L');</script>
 End Google Tag Manager -->
    
    
</div><!-- }#KM_wrap -->         
<div id="video_popup">
    <div class="video_popup_box">
        <iframe src="" frameborder="0" allowfullscreen></iframe>
        <button class="video_popup_close"><span>???</span><span></span></button>
    </div>    
</div><!-- }.video_popup -->     
</body>
</html>