<?php
//==============================================================================================
# 검색 조건 설정,
# 총게시물수,
# 페이징,
# 게시물의 나열번호 관련 프로그램은
# /board/action/default.inc.php 참조
//==============================================================================================

$dummy = 1;
if($data_list_cnt > 0) {
	for ($i=0; $i<$data_list_cnt; $i++ ) {		
			$jb_reg_date 				= date("Y.m.d", strtotime($data_list[$i]['jb_reg_date']));							//등록일
			$jb_mod_date 				= date("Y.m.d", strtotime($data_list[$i]['jb_mod_date']));							//수정일		
			$jb_see 					= $C_Func->num_f($data_list[$i]['jb_see']);									//조회수 (3자리 단위 ',' 처리)
			$jb_comment_count 			= $C_Func->num_f($data_list[$i]['jb_comment_count']);  			//코멘트 수 (3자리 단위 ',' 처리)		
			$jb_name 					= $data_list[$i]['jb_name'];
			
			
			//echo strlen($jb_name);
			if(strlen($jb_name) > 6) {
				$jb_name 				=  $C_Func->blindInfo($jb_name, 3);
			}else{
				$jb_name 				=  $C_Func->blindInfo($jb_name, 6);	
			}
			
			$jb_file_code				= $data_list[$i]['jb_file_code'];
			$jb_mb_id					= $data_list[$i]['jb_mb_id'];
			$jb_type					= $data_list[$i]['jb_type'];
			$jb_show					= $data_list[$i]['jb_show'];	
            $jb_etc1					= $data_list[$i]['jb_etc1'];		
            $jb_etc2					= $data_list[$i]['jb_etc2'];		
            $jb_etc3					= $data_list[$i]['jb_etc3'];		
            $jb_etc4					= $data_list[$i]['jb_etc4'];		
            $jb_etc5					= $data_list[$i]['jb_etc5'];		
			$jb_mb_level				= $data_list[$i]['jb_mb_level'];
			$jb_secret_check			= $data_list[$i]['jb_secret_check'];
			$jb_email					= $data_list[$i]['jb_email'];
			$jb_group					= $data_list[$i]['jb_group'];
			$jb_code					= $data_list[$i]['jb_code'];
			$jb_homepage				= $data_list[$i]['jb_homepage'];		
			$jb_order					= $data_list[$i]['jb_order'];
			$jb_idx						= $data_list[$i]['jb_idx'];
			$jb_step					= $data_list[$i]['jb_step'];
			$jb_title 					= $C_Func->strcut_utf8($data_list[$i]['jb_title'], 100, true, "...");	//제목 (길이, HTML TAG제한여부 처리)
			$jb_content					= $C_Func->dec_contents_view($data_list[$i]['jb_content']);
			$jb_content					= trim(strip_tags($jb_content));
			$jb_content 				= $C_Func->strcut_utf8($jb_content, 100, true, "...");	//제목 (길이, HTML TAG제한여부 처리)
			
			if($jb_email != "") { $jb_email = $C_Func->auto_link($jb_email); } 						//이메일 (이메일 자동 링크 처리, 폼메일 또는 아웃룩)
			if($jb_homepage != "") { $jb_homepage = $C_Func->auto_link($jb_homepage); }		//홈페이지 (URL 자동 링크 처리)
	
			//답글처리
			if($jb_step > 0)
				$depth_icon = $C_Func->reply_depth($jb_step, "");
			else
				$depth_icon = ""; //매 글마다 초기화를 해 주어야 한다.
				
			//타이틀이미지
			$new_image = '<span class="new"></span>';
			//$new_icon = $C_Func->new_icon(1, $data_list[$i]['jb_reg_date'], $new_image);
			//파일 이미지
			$new_file = "<i class='fa fa-paperclip' aria-hidden='true'></i>";
		
			//비밀글이미지
			//$secret_icon = " <img src=\"" . $GP -> IMG_PATH . "/". $skin_dir . "/image/ticon_key.gif\" border='0' align='middle'> ";	
			
			
			
			//비밀글 일 경우 읽기권한 처리 루틴 - 관리자가 아닐 경우만 체크
			//echo $check_level."<".$db_config_data['jba_reply_level']."&&".$data_list[$i]['jb_secret_check'];
			if($check_level < $db_config_data['jba_reply_level']  && $data_list[$i]['jb_secret_check'] == "Y")
			{
				
				//비회원이 작성한 비밀글일 경우
				if($jb_mb_id == "") {
					//비밀번호 입력페이지로 이동
					$get_par = "${index_page}?jb_code=${jb_code}&jb_mode=tdetail&jb_idx=${jb_idx}";
					$get_par.= "&search_key=" . $_GET['search_key'] . "&search_keyword=${search_keyword}&page=${page}&dep1=${dep1}&dep2=${dep2}";
					$get_par.= "&jb_mode=tsecret";				
				} else { //회원이 작성한 비밀글일 경우
				
					//작성자 아이디와 로그인 아이디 비교
					if($check_id != $jb_mb_id) {
						
						//비밀글의 경우 회원도 자신이 쓴 글에대한 답변만 볼 수 있다.
						$args = "";
						$args['jb_code'] = $jb_code;
						$args['jb_group'] = $jb_group;
						$rst = $C_JHBoard -> MEM_SECRET_CHECK($args);		
				
						if (trim($check_id) == "") {
							$get_par = "${index_page}?jb_code=${jb_code}&jb_mode=tdetail&jb_idx=${jb_idx}";
							$get_par.="&search_key=" . $_GET['search_key'] . "&search_keyword=${search_keyword}&page=${page}";
							$get_par.= "&jb_mode=tsecret";
						}else if (trim($check_id) == trim($rst['jb_mb_id'])) {
							$get_par = "${index_page}?jb_code=${jb_code}&jb_mode=tdetail&jb_idx=${jb_idx}";
							$get_par.="&search_key=" . $_GET['search_key'] . "&search_keyword=${search_keyword}&page=${page}&dep1=${dep1}&dep2=${dep2}";
						} else {						
							$get_par ="javascript:alert('작성회원만 읽을 수 있습니다.');";
						}					
					} else {
						$get_par = "${index_page}?jb_code=${jb_code}&jb_mode=tdetail&jb_idx=${jb_idx}";
						$get_par.="&search_key=" . $_GET['search_key'] . "&search_keyword=${search_keyword}&page=${page}&dep1=${dep1}&dep2=${dep2}";
					}				
				}						
			}
			else{		
				$get_par = "${index_page}?jb_code=${jb_code}&jb_mode=tmodify&jb_idx=${jb_idx}";
				$get_par.="&search_key=" . $_GET['search_key'] . "&search_keyword=${search_keyword}&page=${page}&dep1=${dep1}&dep2=${dep2}";
			}
			
			//상세보기 링크생성
			//$jb_title = "<a href=\"".$get_par."\">" . $jb_title . "</a>";
			
			//비밀글 이미지
			if($jb_secret_check == "Y") {
				$jb_title = $jb_title . $secret_icon;		//비밀글이미지...
			}
			
			if($jb_file_code != ''){
				
				$jb_title = $jb_title . $new_file;
				}
		
			
			$jb_title = $depth_icon . $jb_title . $comment_count . $new_icon; //이미지타이틀 처리

            //공지글여부	                
			if($jb_order < 100) {
                $jb_no ="<img class='notice-icon' src='/resource/images/notice_icon.png' alt='공지'>";
                $jb_tr ="class='notice'";               
			}else{
                $jb_no ="";
                $jb_tr ="";               
				}
			
			if($jb_show =="A"){
			$jb_no ="<td align='center' class='no'>숨김</td>";
            }

            if($check_level >= 9 || $check_id == $jb_mb_id){    
             $get_delete= "${index_page}?jb_code=${jb_code}&jb_mode=tdelete&jb_idx=${jb_idx}";        
             $modify = "<a class='btn-sm bg-blue ft-c01 mt60' href=\"${get_par}\"  title=\"수정\">수정</a>";
             $delete = "<a class='btn-sm bg-pink ft-c01 mt60' href=\"${get_delete}\"  title=\"삭제\">삭제</a>";
            }

			
		/*	
		*/	
						
				echo ("
                       
                        <li>
							<div>
								<p>
                                     ${jb_name}<br>
									산모님 ${modify}${delete}
								</p>
								<img src='/resource/images/celebration-bg.png' alt=''>
							</div>
							<ol>
								<li>
									<span class='cate'>나이</span>
									<span class='text'>${jb_etc1}</span>
								</li>
								<li>
									<span class='cate'>시술명</span>
									<span class='text'>${jb_etc2}</span>
								</li>
								<li>
									<span class='cate'>시도</span>
									<span class='text'>${jb_etc3}</span>
								</li>
								<li>
									<span class='cate'>원인</span>
									<span class='text'>${jb_etc4}</span>
								</li>
								<li>
									<span class='cate'>날짜</span>
									<span class='text'>${jb_etc5}</span>
								</li>
                            </ol>
                            
						</li>
				");
				
			$dummy++;
	}
}else{
	echo ("	
			<tr>
				<td colspan='2'>
					등록된 데이터가 없습니다.
				</td>
			</tr>		
		");
}
?>



