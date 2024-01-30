<?
CLASS Multi extends Dbconn
{
	private $DB;
	private $GP;
	function __construct($DB = array()) {
		global $C_DB, $GP;
		$this -> DB = (!empty($DB))? $DB : $C_DB;
		$this -> GP = $GP;
    }
    
    function TO_AUTO_CHAGE($args) {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;		

		$arr_tmp = explode(',',$tmp_id);
		
		for($i=0; $i<count($arr_tmp); $i++) {
			$idx = $arr_tmp[$i];			
			$qry = " update tblMulti set tm_desc = '$max_desc' where tm_idx = '$idx'	";			
			$rst =  $this -> DB -> execSqlUpdate($qry);
			$max_desc--; 
		}
	}	
	
	// desc	 : 메인 멀티테이블 리스트
	// auth  : DG 2020-11
	// param
	function Main_Multi_Show($args='') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		
		if($tm_lang != '') {
			$addQry .= " AND tm_lang = '$tm_lang' ";
		}else{
			$addQry .= " AND tm_lang = 'kor' ";
		}
		
		if($tm_type != '') {
			$addQry .= " AND tm_type = '$tm_type' ";
		}else{
			$addQry .= " AND tm_type = 'main' ";
		}
		$qry = "
			select * from tblMulti where tm_show ='Y' $addQry order by tm_regdate asc $limit
		";
		if ($_SERVER["REMOTE_ADDR"] == '210.90.202.198') {
			// echo $qry;
		}
        $rst =  $this -> DB -> execSqlList($qry);
        //echo "text" . $qry . "<br>" ;
		return $rst;
	}
	
		
	// desc	 : 멀티테이블 수정
	// auth  : DG 2020-11
	// param
	function Multi_Modi($args = '') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		
		$qry = "
			update
				tblMulti
			set				
				tm_title = '$tm_title',				
                tm_content1 = '$tm_content1',
                tm_content2 = '$tm_content2',
                tm_content3 = '$tm_content3',
                tm_content4 = '$tm_content4',
                tm_content5 = '$tm_content5',
                tm_content6 = '$tm_content6',
                tm_content7 = '$tm_content7',
                tm_content8 = '$tm_content8',
                tm_content9 = '$tm_content9',
                tm_content10 = '$tm_content10',
                tm_content11 = '$tm_content11',
                tm_content12 = '$tm_content12',                
				tm_img = '$tm_img',
				tm_m_img = '$tm_m_img',					
                tm_show = '$tm_show',
                tm_link = '$tm_link',
				tm_lang = '$tm_lang',
				tm_type = '$tm_type'
			where
				tm_idx = '$tm_idx'			
        ";
        
		$rst =  $this -> DB -> execSqlUpdate($qry);
		return $rst;
	}
	
	// desc	 : 멀티테이블 삭제
	// auth  : DG 2020-11
	// param
	function Multi_Del($args = '') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		
		$qry = "
			delete from tblMulti where tm_idx = '$tm_idx'	
		";
		$rst =  $this -> DB -> execSqlUpdate($qry);
		return $rst;
	}
	
	// desc	 : 멀티테이블 정보
	// auth  : DG 2020-11
	// param
	function Multi_ImgUpdate($args = '') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		
		$addQry = "";
		if($type == "W") {
			$addQry = " tm_img = '' ";
		}else {
			$addQry = " tm_m_img = '' ";
		}
		
		$qry = "
			update
				tblMulti
			set				
				$addQry
			where
				tm_idx = '$tm_idx'			
		";
		$rst =  $this -> DB -> execSqlUpdate($qry);
		return $rst;
	}
	
	
	// desc	 : 멀티테이블 정보
	// auth  : DG 2020-11
	// param
	function Multi_Info($args = '') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		
		$qry = "
			select * from tblMulti where tm_idx = '$tm_idx'
		";
		$rst =  $this -> DB -> execSqlOneRow($qry);
		return $rst;
    }
    
    // desc	 : 멀티테이블 정보
	// auth  : DG 2020-11
	// param
	function Multi_count_Info($args = '') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		
		$qry = "
			select count(tm_content1) as tm_count , tm_content1 FROM  tblMulti where tm_menu = '$tm_menu' and tm_content1 = '$tm_content1'
		";
		$rst =  $this -> DB -> execSqlOneRow($qry);
		return $rst;
	}
	
	// desc	 : 멀티테이블 등록
	// auth  : DG 2020-11
	// param
	function Multi_Reg($args = '') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		
		
		$qry = "
			INSERT INTO
				tblMulti
				(
					tm_idx,
                    tm_menu,
                    tm_type,
					tm_title,					
                    tm_content1,
                    tm_content2,
                    tm_content3,
                    tm_content4,
                    tm_content5,
                    tm_content6,
                    tm_content7,
                    tm_content8,
                    tm_content9,
                    tm_content10,
                    tm_content11,
                    tm_content12,
                    tm_show,
					tm_img,
					tm_m_img,			                   
                    tm_link,
					tm_lang,
					tm_regdate
					
				)
				VALUES
				(
					''		
                    , '$tm_menu'
                    , '$tm_type'
                    , '$tm_title'									
                    , '$tm_content1'
                    , '$tm_content2'
                    , '$tm_content3'
                    , '$tm_content4'
                    , '$tm_content5'
                    , '$tm_content6'
                    , '$tm_content7'
                    , '$tm_content8'
                    , '$tm_content9'
                    , '$tm_content10'
                    , '$tm_content11'
                    , '$tm_content12'
                    , '$tm_show'
					, '$tm_img'
					, '$tm_m_img'						                   
                    , '$tm_link'
					, '$tm_lang'
					,  NOW()				
				)
			";
			

		$rst =  $this -> DB -> execSqlInsert($qry);
		return $rst;
	}
	
	
	// desc	 : 태그 리스트
	// auth  : DG 2020-11
	// param
	function Multi_List ($args = '') {
		global $C_Func;
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;

		global $C_ListClass;

		$tail = "";
		$addQry = " 1=1 ";
		
		if(!empty($tm_show)) {
			$addQry .= " AND ";
			$addQry .= " tm_show = '$tm_show' ";
        }	

        if(!empty($tm_menu)) {
			$addQry .= " AND ";
			$addQry .= " tm_menu = '$tm_menu' ";
        }	
        
        if(!empty($tm_type)) {
			$addQry .= " AND ";
			$addQry .= " tm_type = '$tm_type' ";
		}	
		
		if ($search_key && $search_content) {
			if (!empty($addQry)) {
				$addQry .= " AND ";
				$addQry .= " $search_key LIKE ('%$search_content%')";
			}
		}
		
		if($tm_lang != '') {
			$addQry .= " AND tm_lang = '$tm_lang' ";
        }	       
		
		$args['show_row'] = $show_row;
		$args['show_page'] = 10;
		$args['q_idx'] = "tm_idx";
		$args['q_col'] = "*";
		$args['q_table'] = "tblMulti";
        $args['q_where'] = $addQry;
        if(!$args['q_order']){
            $args['q_order'] = "tm_desc desc, tm_regdate desc";
        }
      
		$args['q_group'] = "";
		$args['tail'] = "s_date=" . $s_date . "&e_date=" . $e_date ."&serach_key=" . $search_key . "&search_content=" . $search_cotent . "&tt_cate=" . $tt_cate;
		$args['q_see'] = "";
		return $C_ListClass -> listInfo($args);
    }
    
    // desc	 : 태그 리스트
	// auth  : DG 2020-11
	// param
	function MedicalWelfare_List ($args = '') {
		global $C_Func;
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;

		global $C_ListClass;

		$tail = "";
        $addQry = " 1=1 ";        
		
		if($mw_age == "공통") {
			$addQry .= " AND ";
			$addQry .= " (mw_age = '공통' or mw_age = '소아' or mw_age = '성인' )";
        }	
        else if($mw_age == "소아" or $mw_age == "성인") {
			$addQry .= " AND ";
			$addQry .= " (mw_age = '공통' or mw_age = '$mw_age' )";
        }	

        // if($mw_resource == "전체"){
        // }
        // else if(!empty($mw_resource)) {
		// 	$addQry .= " AND ";
		// 	$addQry .= " mw_resource = '$mw_resource' ";
        // }	

        if(!empty($mw_resource)) {
            $addQry .= " AND ( mw_resource = '전체' or ";            
            for($i=0; $i<count($mw_resource)-1; $i++) {
                $addQry .= " mw_resource = '".$mw_resource[$i] ."' or ";                
                $mw_resource_tail .= "&mw_resource%5B%5D=".$mw_resource[$i] ;                  
            }
            $addQry .= " mw_resource = '". $mw_resource[$i] ."'  ";                
            $addQry .= " )";
            $mw_resource_tail .= "&mw_resource%5B%5D=".$mw_resource[$i] ;   
			
        }	

        if(!empty($mw_name)) {
            $addQry .= " AND ( ";            
            for($i=0; $i<count($mw_name); $i++) {               
                $addQry .= " mw_name = '". $mw_name[$i] ."'";    
                if($i != count($mw_name)-1 ){
                    $addQry .= " or ";
                }            
                $mw_name_tail .= "&mw_name%5B%5D=".$mw_name[$i] ;                  
            }
            $addQry .= " )";
            $mw_name_tail .= "&mw_name%5B%5D=".$mw_name[$i] ;   
			
        }	
        
        if(!empty($mw_area)) {
            $addQry .= " AND ( mw_area = '전지역' or ";            
            $orderby .= " FIELD(mw_area, ";                  
            for($i=0; $i<count($mw_area)-1; $i++) {
                $addQry .= " mw_area = '". $mw_area[$i] ."' or ";                
                $mw_area_tail .= "&mw_area%5B%5D=".$mw_area[$i] ;                
                $orderby .= "'". $mw_area[$i] ."', ";                  
            }
            $addQry .= " mw_area = '". $mw_area[$i] ."'  ";                
            $addQry .= " )";
            $orderby .= "'". $mw_area[$i] ."' ) asc ";                  
            $mw_area_tail .= "&mw_area%5B%5D=".$mw_area[$i] ;   
			
        }	
       
        if(!empty($mw_disorderall)) {
            $addQry .= " AND ( mw_disorderall like '%모든 장애 유형%' or ";
            for($i=0; $i<count($mw_disorderall)-1; $i++) {
                $addQry .= " mw_disorderall like '%". $mw_disorderall[$i] ."%' or ";      
                $disorder_tail .= "&mw_disorderall%5B%5D=".$mw_disorderall[$i] ;               
            }
            $addQry .= "  mw_disorderall like '%". $mw_disorderall[$i] ."%'  ";                
            $addQry .= " )";
            $disorder_tail .= "&mw_disorderall%5B%5D=".$mw_disorderall[$i] ;         
			
        }	
      
		if ($search_key && $search_content) {
			if (!empty($addQry)) {
				$addQry .= " AND ";
				$addQry .= " $search_key LIKE ('%$search_content%')";
			}
        }       
        
        //echo "addQry:" . $addQry . "<br>" ;
		
		$args['show_row'] = 10;
		$args['show_page'] = 10;
		$args['q_idx'] = "mw_idx";
		$args['q_col'] = "*";
		$args['q_table'] = "tblMedicalWelfare";
        $args['q_where'] = $addQry;
        if($mw_area){
            $args['q_order'] = "mw_name2 asc,  $orderby";
        }
        else{
            $args['q_order'] = "mw_name2 asc, mw_area asc";
        }
        
      
		$args['q_group'] = "";
		$args['tail'] = "mw_age=" . $mw_age. $mw_resource_tail . $mw_name_tail. $mw_area_tail. $disorder_tail;
		$args['q_see'] = "";
		return $C_ListClass -> listInfo($args);
    }
    
    // desc	 : 정보 전부
	// auth  : JH 2013-09-13
	// param 
	function MedicalWelfare_name_List($args) {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		
		
		$qry = "
			select * from tblMedicalWelfare where mw_resource ='$mw_resource' GROUP BY mw_name order by mw_name asc  $limit
        ";
        
		
        $rst =  $this -> DB -> execSqlList($qry);
        //echo "text" . $qry . "<br>" ;
		return $rst;
	}
	
}
?>