<?
CLASS inspectionrate extends Dbconn
{
	private $DB;
	private $GP;
	function __construct($DB = array()) {
		global $C_DB, $GP;
		$this -> DB = (!empty($DB))? $DB : $C_DB;
		$this -> GP = $GP;
	}
	
	
	// desc	 : 메인 슬라이드 리스트
	// auth  : JH 2012-12-05 2012-11-06
	// param
	function Main_inspectionrate_Show($args='') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;

		if($ir_year != '') {
			$addQry .= " AND ir_year = '$ir_year' ";
		}else{
			$addQry .= " ";
		}

		if($ir_district != '') {
			$addQry .= " AND ir_district = '$ir_district' ";
		}else{
			$addQry .= " ";
		}		
	
        $qry = "
            select sum(ir_content1) as ir_content1, sum(ir_content2) as ir_content2, sum(ir_content3) as ir_content3, sum(ir_content4) as ir_content4, sum(ir_content5) as ir_content5, sum(ir_content6) as ir_content6, sum(ir_content7) as ir_content7, sum(ir_content8) as ir_content8, sum(ir_content9) as ir_content9, sum(ir_content10) as ir_content10, sum(ir_content11) as ir_content11, sum(ir_content12) as ir_content12, sum(ir_content13) as ir_content13,sum(ir_content14) as ir_content14,sum(ir_content15) as ir_content15,            
            sum(ir_content1+ir_content2+ir_content3+ir_content4+ir_content5+ir_content6+ir_content7+ir_content8+ir_content9+ir_content10+ir_content11+ir_content12+ir_content13+ir_content14+ir_content15) as ir_sum,
            avg(ir_content16) as ir_content16, avg(ir_content17) as ir_content17, avg(ir_content18) as ir_content18, avg(ir_content19) as ir_content19, avg(ir_content20) as ir_content20, avg(ir_content21) as ir_content21, avg(ir_content22) as ir_content22, avg(ir_content23) as ir_content23, avg(ir_content24) as ir_content24, avg(ir_content25) as ir_content25, avg(ir_content26) as ir_content26, avg(ir_content27) as ir_content27, avg(ir_content28) as ir_content28, avg(ir_content29) as ir_content29,avg(ir_content30) as ir_content30
            from tblInspectionRate where 1 = 1 $addQry order by ir_regdate asc $limit
        ";
       		
		$rst =  $this -> DB -> execSqlList($qry);
		return $rst;
	}   
			
	// desc	 : 슬라이드 수정
	// auth  : JH 2012-12-05 2012-11-06
	// param
	function inspectionrate_Modi($args = '') {
        if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
        
		$qry = "
			update
				tblInspectionRate
			set
                ir_year = '$ir_year',
				ir_district = '$ir_district',				
				ir_content1 = '$ir_content1',
                ir_content2 = '$ir_content2',
                ir_content3 = '$ir_content3',
                ir_content4 = '$ir_content4',
                ir_content5 = '$ir_content5',
                ir_content6 = '$ir_content6',
                ir_content7 = '$ir_content7',
                ir_content8 = '$ir_content8',
                ir_content9 = '$ir_content9',
                ir_content10 = '$ir_content10',
                ir_content11 = '$ir_content11',
                ir_content12 = '$ir_content12',
                ir_content13 = '$ir_content13',
                ir_content14 = '$ir_content14',
				ir_content15 = '$ir_content15',
				ir_content16 = '$ir_content16',
				ir_content17 = '$ir_content17',
				ir_content18 = '$ir_content18',
				ir_content19 = '$ir_content19',
				ir_content20 = '$ir_content20',
				ir_content21 = '$ir_content21',
				ir_content22 = '$ir_content22',
				ir_content23 = '$ir_content23',
				ir_content24 = '$ir_content24',
				ir_content25 = '$ir_content25',
				ir_content26 = '$ir_content26',
				ir_content27 = '$ir_content27',
				ir_content28 = '$ir_content28',
				ir_content29 = '$ir_content29',
				ir_content30 = '$ir_content30'
			where
				ir_idx = '$ir_idx'			
		";
		$rst =  $this -> DB -> execSqlUpdate($qry);
		return $rst;
	}
	
	// desc	 : 슬라이드 삭제
	// auth  : JH 2012-12-05 2012-11-06
	// param
	function inspectionrate_Del($args = '') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		
		$qry = "
			delete from tblInspectionRate where ir_idx = '$ir_idx'	
		";
		$rst =  $this -> DB -> execSqlUpdate($qry);
		return $rst;
    }
    
    // desc	 : 슬라이드 삭제
	// auth  : JH 2012-12-05 2012-11-06
	// param
	function inspectionrate_year_Del($args = '') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		
		$qry = "
			delete from tblInspectionRate where ir_year = '$ir_year'	
		";
		$rst =  $this -> DB -> execSqlUpdate($qry);
		return $rst;
	}
	
	// desc	 : 슬라이드 정보
	// auth  : JH 2012-12-05 2012-11-06
	// param
	function inspectionrate_ImgUpdate($args = '') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		
		$addQry = "";
		if($type == "W") {
			$addQry = " ir_img = '' ";
		}else {
			$addQry = " ir_img2 = '' ";
		}
		
		$qry = "
			update
				tblInspectionRate
			set				
				$addQry
			where
				ir_idx = '$ir_idx'			
		";
		$rst =  $this -> DB -> execSqlUpdate($qry);
		return $rst;
	}
	
	// desc	 : 슬라이드 정보
	// auth  : JH 2012-12-05 2012-11-06
	// param
	function inspectionrate_Info($args = '') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		
		$qry = "            
            select * from tblInspectionRate where ir_idx = '$ir_idx'
        ";
                
		$rst =  $this -> DB -> execSqlOneRow($qry);
		return $rst;
    }
    
    
	
	// desc	 : 슬라이드 등록
	// auth  : JH 2012-12-05 2012-11-06
	// param
	function inspectionrate_Reg($args = '') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		
		
		$qry = "
			INSERT INTO
				tblInspectionRate
				(
					ir_idx, 
                    ir_year, 
                    ir_city, 
                    ir_district, 
                    ir_content1, 
                    ir_content2, 
                    ir_content3, 
                    ir_content4, 
                    ir_content5, 
                    ir_content6, 
                    ir_content7, 
                    ir_content8, 
                    ir_content9, 
                    ir_content10, 
                    ir_content11,
                    ir_content12, 
                    ir_content13, 
                    ir_content14, 
                    ir_content15, 
                    ir_content16, 
                    ir_content17, 
                    ir_content18, 
                    ir_content19, 
                    ir_content20, 
                    ir_content21, 
                    ir_content22, 
                    ir_content23, 
                    ir_content24, 
                    ir_content25, 
                    ir_content26, 
                    ir_content27, 
                    ir_content28, 
                    ir_content29, 
                    ir_content30, 
                    ir_show, 
                    ir_regdate, 
                    ir_type
				)
				VALUES
				(
					''		
					, '$ir_year'
					, '서울특별시'
					, '$ir_district'
                    , '$ir_content1'					
                    , '$ir_content2'
                    , '$ir_content3'	
                    , '$ir_content4'	
                    , '$ir_content5'	
                    , '$ir_content6'	
                    , '$ir_content7'	
                    , '$ir_content8'	
                    , '$ir_content9'	
                    , '$ir_content10'		
                    , '$ir_content11'	
                    , '$ir_content12'	
                    , '$ir_content13'	
                    , '$ir_content14'	
                    , '$ir_content15'	
                    , '$ir_content16'
                    , '$ir_content17'
                    , '$ir_content18'
                    , '$ir_content19'
                    , '$ir_content20'
                    , '$ir_content21'
                    , '$ir_content22'
                    , '$ir_content23'
                    , '$ir_content24'
                    , '$ir_content25'
                    , '$ir_content26'
                    , '$ir_content27'
                    , '$ir_content28'
                    , '$ir_content29'
                    , '$ir_content30'
					, ''
					,  NOW()
					, ''
				)
			";
			

		$rst =  $this -> DB -> execSqlInsert($qry);
		return $rst;
    }
    
    // desc	 : 스킨 타입
	// auth  : JH 2013-04-26
	// param 
	function inspectionrate_YEAR() {
		$qry = "
			select ir_year from tblInspectionRate group by ir_year
		";
		$rst =  $this -> DB -> execSqlList($qry);
		return $rst;
	}
	
	
	// desc	 : 태그 리스트
	// auth  : JH 2012-12-05 2012-11-06
	// param
	function inspectionrate_List ($args = '') {
		global $C_Func;
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;

		global $C_ListClass;

		$tail = "";
		$addQry = " 1=1 ";
		
		if(!empty($ir_show)) {
			$addQry .= " AND ";
			$addQry .= " ir_show = '$ir_show' ";
		}	
		
		if ($search_key && $search_content) {
			if (!empty($addQry)) {
				$addQry .= " AND ";
				$addQry .= " $search_key LIKE ('%$search_content%')";
			}
		}
				
		$args['show_row'] = $show_row;
		$args['show_page'] = 10;
		$args['q_idx'] = "ir_idx";
		$args['q_col'] = "*";
		$args['q_table'] = "tblInspectionRate";
		$args['q_where'] = $addQry;
		$args['q_order'] = "ir_regdate desc";
		$args['q_group'] = "";
		$args['tail'] = "s_date=" . $s_date . "&e_date=" . $e_date ."&serach_key=" . $search_key . "&search_content=" . $search_cotent . "&tt_cate=" . $tt_cate;
		$args['q_see'] = "";
		return $C_ListClass -> listInfo($args);
    }        

}
?>