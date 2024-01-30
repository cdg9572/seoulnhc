<?php
	include_once '../_init.php';
	
	include_once "../inc/head.php";

	include_once($GP->CLS."class.list.php");
	include_once($GP->CLS."/class.disabled.php");
	include_once($GP->CLS."/class.inspectionrate.php");

	$C_ListClass 	= new ListClass;
	$C_disabled 		= new disabled;
    $C_inspectionrate 		= new inspectionrate;
    
    $arr_year = $C_disabled ->disabled_YEAR();

    $args = array();
    ($_GET["d_year"])?  $d_year = $_GET["d_year"] : $d_year =   $arr_year[0]['d_year'];  
	$args['d_year'] = $d_year;
	$args['d_content'] = $_GET["d_content"];
	$args['d_district'] = $_GET["d_district"];
	$data = "";
	$data = $C_disabled->disabled_Show(array_merge($_GET,$_POST,$args));
	$data_list 		= $data['data'];
	$data_list_cnt 	= count($data);

	

	//장애유형별현황
	for ($i = 0 ; $i < count($data) ; $i++) {
		$d_sum_total = $d_sum_total + $data[$i]['d_sum'] ;
	}
	$data2 = array(
		array('지체', '청각', '시각', '뇌병변', '지적','정신','신장','자폐성','언어','장루, 요루','호흡기','간','뇌전증','심장','안면','계')
	  , $C_disabled->disabled_Show2(array_merge($_GET,$_POST,$args))
       );

    $data2_sum = $data2[1][0]['d_sum'] - $data2[1][0][0]- $data2[1][0][1]- $data2[1][0][2]- $data2[1][0][3]- $data2[1][0][4];

	$data3 = $C_disabled->disabled_Show2(array_merge($_GET,$_POST,$args)) ;

	 for ($i = 0 ; $i < 5 ; $i++) {
	 	${"Percent".$i} = round($data3[0][$i] / $data3[0]['d_sum']*100,2);
	 }
    $Percent_sum = round(($data3[0]['d_sum']-($data3[0][0] + $data3[0][1] + $data3[0][2] + $data3[0][3]+ $data3[0][4]))/ $data3[0]['d_sum']*100,1);

	//생애주기별 현황
	$data_age = $C_disabled->disabled_Show3(array_merge($_GET,$_POST,$args)) ;
	for ($i = 0 ; $i < 4 ; $i++) {
		${"Percent_age".$i} = round($data_age[0][$i] / $data_age[0][4]*100,1);
	}

    //건강검진 수검률 (건강보험대상자)
    ($d_year == '2022')?  $ir_year = '2021' : $ir_year = $d_year ; 

    $args['ir_year'] = $ir_year;
    $args['ir_district'] = $_GET["d_district"];

    $ir_data = $C_inspectionrate->Main_inspectionrate_Show(array_merge($_GET,$_POST,$args));

    for ($i = 16 ; $i < 31 ; $i++){
        $ir_sum_total = $ir_sum_total + $ir_data[0][$i];
    }
    $ir_avg = round($ir_sum_total / 15,2) ;

?>
<style>
	.tableType-01.green td {
		padding:15px 10px;
	}
	.caption {
		font-size: 1.8rem !important;
		padding:0 10px 5px;
		text-align: right;
	}
	.s-pad-box.flex {
		align-items: flex-start;
	}
	[id*="chart"] .chart .title,
	[id*="chart"] .chart .title {
		color:#000 !important;
		/* z-index: -1; */
	}
	canvas {
		width: 100% !important;
		display: block;
		height: 100% !important;
		background-color: rgba(255,255,255,0);
	}
	table tr th,
	table tr td {color:#000 !important;padding:6px 10px !important;}
	.tableType-01.green.small table tr th {padding:10px 0;font-size: 16px !important;}
	.tableType-01.green.small table tr td {padding:10px 0;}
	g g g text{
		fill: black;
	}
	@media screen and (max-width:1023px){
		.s-pad-box.flex {flex-flow: column-reverse;flex-wrap: wrap;}
		.tableType-01 {max-width: 100% !important;}
		.re {flex-flow: column !important;}
		.re #chart2 {width: 100% !important;}
		.re #chart2 .chart {padding-top: 53% !important;}
		table tr th,
		table tr td {font-size: 20px !important;color:#111 !important;padding:15px 15px !important;}
		.tableType-01.green.small table tr th {padding:15px 0 !important;font-size: 13.5px !important;}
		.tableType-01.green.small table tbody tr th,
		.tableType-01.green.small table tr th:first-of-type,
		.tableType-01.green.small table tr td {padding:10px !important;font-size: 14px !important;}
		.caption {
			margin-bottom: 0 !important;
			font-size: 1.4rem !important;
		}
		[id*="chart"] {
			width:100% !important;
		}
		[id*="chart"] .chart {
			padding-top:70% !important;
		}
	}
</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<body class="jui" onLoad=document.replyForm.replyBox.focus()>
	<div id="wrap">
		<?php include_once "../inc/header.php"?>
		<section id="container" class="sub">
			<div id="sub-bnnr">
				<h2 class="text">정보</h2>
				<img data-index="3" data-index2="2" src="/resource/images/sub-bnnr03.png" alt="">
			</div>
			<!-- //end .sub-bnnr -->

			<?php include_once "../inc/location.php"?>

			<div class="cont-tit" id="submit_position">
				<h3>서울특별시북부 장애인 현황</h3>
			</div>
			<div class="s-inner" >
				<h3 class="cont-sub-tit" >장애인 통계자료</h3>
				<div class="cont-box">
					<h4 class="cont-label">서울특별시북부 <br class="mo-hide">장애인 현황</h4>
					<div class="cont">
						<div class="map_search_box">
							<form name="base_form" id="base_form" method="GET">
							<div class="search_txtm">
								<div class="sleft">
									<span>구분</span>
									<select name="d_content" class="selectmap" title="통계자료 선택">
										<option value="" >장애인 현황 전체</option>
										<option value="d_content1" <? if($_GET['d_content'] == "d_content1"){ echo "selected";}?>>지체</option>
										<option value="d_content2" <? if($_GET['d_content'] == "d_content2"){ echo "selected";}?>>청각</option>
										<option value="d_content3" <? if($_GET['d_content'] == "d_content3"){ echo "selected";}?>>시각</option>
										<option value="d_content4" <? if($_GET['d_content'] == "d_content4"){ echo "selected";}?>>뇌병변</option>
										<option value="d_content5" <? if($_GET['d_content'] == "d_content5"){ echo "selected";}?>>지적</option>
										<option value="d_content6" <? if($_GET['d_content'] == "d_content6"){ echo "selected";}?>>정신</option>
										<option value="d_content7" <? if($_GET['d_content'] == "d_content7"){ echo "selected";}?>>신장</option>
										<option value="d_content8" <? if($_GET['d_content'] == "d_content8"){ echo "selected";}?>>자폐성</option>
										<option value="d_content9" <? if($_GET['d_content'] == "d_content9"){ echo "selected";}?>>언어</option>
										<option value="d_content10" <? if($_GET['d_content'] == "d_content10"){ echo "selected";}?>>장루, 요루</option>
										<option value="d_content11" <? if($_GET['d_content'] == "d_content11"){ echo "selected";}?>>호흡기</option>
										<option value="d_content12" <? if($_GET['d_content'] == "d_content12"){ echo "selected";}?>>간</option>
										<option value="d_content13" <? if($_GET['d_content'] == "d_content13"){ echo "selected";}?>>뇌전증</option>
										<option value="d_content14" <? if($_GET['d_content'] == "d_content14"){ echo "selected";}?>>심장</option>
										<option value="d_content15" <? if($_GET['d_content'] == "d_content15"){ echo "selected";}?>>안면</option>
									</select>
								</div>
								<div class="sleft">
									<span>년도</span>
									<select name="d_year" class="selectmap" title="년도 선택">									
									<?
										for($i=0; $i<count($arr_year); $i++) {
											if($arr_year[$i]['d_year'] == $_GET['d_year']) {
												echo "<option value='" . $arr_year[$i]['d_year']. "' selected>" . $arr_year[$i]['d_year'] . "</option>";
											}else{
												echo "<option value='" . $arr_year[$i]['d_year']. "'>" . $arr_year[$i]['d_year'] . "</option>";
											}
										}
									?>
									</select>
								</div>
								<div class="sleft">
									<span>지역</span>
									<select name="d_district" class="selectmap" title="지역 선택">
										<option value="" selected="selected">전체</option>
                                        <option value="강북구" <? if($_GET['d_district'] == "강북구"){ echo "selected";}?>>강북구</option>
                                        <option value="광진구" <? if($_GET['d_district'] == "광진구"){ echo "selected";}?>>광진구</option>
                                        <option value="노원구" <? if($_GET['d_district'] == "노원구"){ echo "selected";}?>>노원구</option>
										<option value="도봉구" <? if($_GET['d_district'] == "도봉구"){ echo "selected";}?>>도봉구</option>
                                        <option value="동대문구" <? if($_GET['d_district'] == "동대문구"){ echo "selected";}?>>동대문구</option>
                                        <option value="마포구" <? if($_GET['d_district'] == "마포구"){ echo "selected";}?>>마포구</option>
                                        <option value="서대문구" <? if($_GET['d_district'] == "서대문구"){ echo "selected";}?>>서대문구</option>
                                        <option value="성동구" <? if($_GET['d_district'] == "성동구"){ echo "selected";}?>>성동구</option>
                                        <option value="성북구" <? if($_GET['d_district'] == "성북구"){ echo "selected";}?>>성북구</option>
                                        <option value="용산구" <? if($_GET['d_district'] == "용산구"){ echo "selected";}?>>용산구</option>
                                        <option value="은평구" <? if($_GET['d_district'] == "은평구"){ echo "selected";}?>>은평구</option>
                                        <option value="종로구" <? if($_GET['d_district'] == "종로구"){ echo "selected";}?>>종로구</option>
                                        <option value="중구" <? if($_GET['d_district'] == "중구"){ echo "selected";}?>>중구</option>
										<option value="중랑구" <? if($_GET['d_district'] == "중랑구"){ echo "selected";}?>>중랑구</option>
									</select>
								</div>
								<a href="#" class="cbtn_point" id="id_submit_btn">검색</a>
							</div>
						</div>
						</form>
						<p class="help-text"><b><?=($_GET['d_year'] == "")? ''  : $_GET['d_year']. "년도" ; ?> 서울특별시 북부지역 장애인 현황 <span class="text-deepblue">(<?=number_format($d_sum_total)?>명)</span></b></p>
						<div id="seoul-map">
							<div class="seoul-map">
								<img src="/resource/images/seoul-map.png" alt="서울특별시북부장애인 관련 현황 지도">
								<ul>
								<li class="point-1" title="도봉구"><?for ($i = 0 ; $i < count($data) ; $i++) {if($data[$i]['d_district'] == "도봉구"){echo number_format($data[$i]['d_sum']) ;}}?></li>
								<li class="point-2" title="노원구"><?for ($i = 0 ; $i < count($data) ; $i++) {if($data[$i]['d_district'] == "노원구"){echo number_format($data[$i]['d_sum']) ;}}?></li>
								<li class="point-3" title="중랑구"><?for ($i = 0 ; $i < count($data) ; $i++) {if($data[$i]['d_district'] == "중랑구"){echo number_format($data[$i]['d_sum']) ;}}?></li>
								<li class="point-4" title="동대문구"><?for ($i = 0 ; $i < count($data) ; $i++) {if($data[$i]['d_district'] == "동대문구"){echo number_format($data[$i]['d_sum']) ;}}?></li>
								<li class="point-5" title="광진구"><?for ($i = 0 ; $i < count($data) ; $i++) {if($data[$i]['d_district'] == "광진구"){echo number_format($data[$i]['d_sum']) ;}}?></li>
								<li class="point-6" title="성동구"><?for ($i = 0 ; $i < count($data) ; $i++) {if($data[$i]['d_district'] == "성동구"){echo number_format($data[$i]['d_sum']) ;}}?></li>
								<li class="point-7" title="중구"><?for ($i = 0 ; $i < count($data) ; $i++) {if($data[$i]['d_district'] == "중구"){echo number_format($data[$i]['d_sum']) ;}}?></li>
								<li class="point-8" title="용산구"><?for ($i = 0 ; $i < count($data) ; $i++) {if($data[$i]['d_district'] == "용산구"){echo number_format($data[$i]['d_sum']) ;}}?></li>
								<li class="point-9" title="마포구"><?for ($i = 0 ; $i < count($data) ; $i++) {if($data[$i]['d_district'] == "마포구"){echo number_format($data[$i]['d_sum']) ;}}?></li>
								<li class="point-10" title="서대문구"><?for ($i = 0 ; $i < count($data) ; $i++) {if($data[$i]['d_district'] == "서대문구"){echo number_format($data[$i]['d_sum']) ;}}?></li>
								<li class="point-11" title="종로구"><?for ($i = 0 ; $i < count($data) ; $i++) {if($data[$i]['d_district'] == "종로구"){echo number_format($data[$i]['d_sum']) ;}}?></li>
								<li class="point-12" title="성북구"><?for ($i = 0 ; $i < count($data) ; $i++) {if($data[$i]['d_district'] == "성북구"){echo number_format($data[$i]['d_sum']) ;}}?></li>
								<li class="point-13" title="은평구"><?for ($i = 0 ; $i < count($data) ; $i++) {if($data[$i]['d_district'] == "은평구"){echo number_format($data[$i]['d_sum']) ;}}?></li>
								<li class="point-14" title="강북구"><?for ($i = 0 ; $i < count($data) ; $i++) {if($data[$i]['d_district'] == "강북구"){echo number_format($data[$i]['d_sum']) ;}}?></li>
								</ul>
							</div>
						</div>
						<br>
					</div>
				</div>

				<!--  장애유형별 현황 -->
				<div class="cont-box">
					<h4 class="cont-label">
						<span class="btn bg-deepblue" style="min-width:142px;"><?=($_GET['d_district'])? $_GET['d_district'] : "전체";?></span>
					</h4>
					<div class="cont">
						<p class="help-text" style="position:relative;z-index:10;font-size:3rem;"><b>1. 장애유형별 현황</b></p>
						<div class="s-pad-box flex" style="margin:20px auto;padding:0;overflow: hidden;">
							<div class="tableType-01 green no-border" style="min-width:300px;max-width: 365px;">
								<table>
									<thead>
										<tr>
											<th>장애유형</th>
											<th style="text-align: right;">명</th>
											<th style="text-align: right;">%</th>
										</tr>
									</thead>
									<tbody>
									<?
									for ($i = 0 ; $i < 16 ; $i++){
										$Percent = $data2[1][0][$i] / $data2[1][0]['d_sum'] * 100;
									?>
										<tr>
											<td><?=$data2[0][$i]?></td>
											<td style="text-align: right;"><?=number_format($data2[1][0][$i])?></td>
											<td style="text-align: right;padding-right: 15px;"><?=sprintf('%0.2f', $Percent)?></td>
										</tr>
									<?}?>
									</tbody>

								</table>
							</div>
							<div id="chart" style="width:700px;margin-top:-25px;">
								<div class="chart" style="padding-top:80%;">
									<!-- <div id="newChart4" class="wrapper2">
										<canvas id="myChart2"></canvas>
									</div> -->
									<div id="newChart" class="wrapper">
										<!-- <canvas id="myChart"></canvas> -->
									</div>
									<div class="title"><b>장애유형별<br>분포 현황(%)</b></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--  //end 장애유형별 현황 -->

				<!-- 생애주기별 현황 -->
				<div class="cont-box">
					<h4 class="cont-label"></h4>
					<div class="cont">
						<p class="help-text" style="position:relative;z-index:10;font-size:3rem;"><b>2. 생애주기별 현황</b></p>
						<div id="chart" style="width:900px;margin-top:0px;">
							<div class="chart" style="padding-top:70%;">
								<!-- <div id="newChart3" class="wrapper2">
									<canvas id="myChart2"></canvas>
								</div> -->
								<div id="newChart2" class="wrapper2">
									<!-- <canvas id="myChart2"></canvas> -->
								</div>
								<div class="title" style="">생애주기별<br>장애인구 현황(%)</div>
							</div>
						</div>
						<div class="tableType-01 green no-border">
							<table>
								<thead>
									<tr>
										<th>구분</th>
                                        <th>노인<br>(65세 이상)</th>
                                        <th>청장년<br>(20~64세)</th>
                                        <th>소아/청소년<br>(6~19세)</th>
										<th>영유아<br>(5세 이하)</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?=$_GET['d_district']?></td>
                                        <td><?=number_format($data_age[0]['d_sum4'])?>명</td>
                                        <td><?=number_format($data_age[0]['d_sum3'])?>명</td>
                                        <td><?=number_format($data_age[0]['d_sum2'])?>명</td>
										<td><?=number_format($data_age[0]['d_sum1'])?>명</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- //end 생애주기별 현황 -->

				<!-- 장애유형별/연령별 장애인구 -->
				<div class="cont-box">
					<h4 class="cont-label"></h4>
					<div class="cont">
						<p class="help-text" style="font-size:3rem;"><b>3. 장애유형별/연령별 장애인구</b></p>
						<p class="caption" style="margin-top: 20px;">(단위: 명)</p>
						<div class="tableType-01 green small">
							<table>
								<colgroup>
									<col style="width: 110px;">
									<col>
									<col>
									<col>
									<col>
									<col>
									<col>
									<col>
									<col>
									<col>
									<col>
								</colgroup>
								<thead>
									<tr>
										<th>장애유형</th>
										<th>0~9세</th>
										<th>10~19세</th>
										<th>20~29세</th>
										<th>30~39세</th>
										<th>40~49세</th>
										<th>50~59세</th>
										<th>60~69세</th>
										<th>70~79세</th>
										<th>80~89세</th>
										<th>90-세</th>
									</tr>
								</thead>
								<tbody>
									<?
                                    //장애유형별/연령별 장애인구
									for ($i = 0 ; $i < 15 ; $i++){
										$j = $i + 1;
										$args['d_content'] = "d_content".$j;
										$data_old = $C_disabled->disabled_Show4(array_merge($_GET,$_POST,$args)) ;
									?>
									<tr style="text-align: center;">
										<th><?=$data2[0][$i]?></th>
										<td style="text-align: right;"><?=number_format($data_old[0][0])?></td>
										<td style="text-align: right;"><?=number_format($data_old[0][1])?></td>
										<td style="text-align: right;"><?=number_format($data_old[0][2])?></td>
										<td style="text-align: right;"><?=number_format($data_old[0][3])?></td>
										<td style="text-align: right;"><?=number_format($data_old[0][4])?></td>
										<td style="text-align: right;"><?=number_format($data_old[0][5])?></td>
										<td style="text-align: right;"><?=number_format($data_old[0][6])?></td>
										<td style="text-align: right;"><?=number_format($data_old[0][7])?></td>
										<td style="text-align: right;"><?=number_format($data_old[0][8])?></td>
										<td style="text-align: right;"><?=number_format($data_old[0][9])?></td>
									</tr>
									<?}?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- //end 장애유형별/연령별 장애인구 -->

				<!-- 건강검진 수검률 (건강보험대상자)-->
				<div class="cont-box">
					<h4 class="cont-label"></h4>
					<div class="cont">
						<p class="help-text"style="font-size:3rem;"><b>4. 건강검진 수검률 (건강보험대상자)</b></p>
						<div class="s-pad-box flex re" style="margin:20px auto;padding:0;overflow: hidden;">
							<div id="chart2" style="width:700px;margin-left: -20px;">
								<div class="chart" style="padding-top:50% !important">
									<!-- <div id="newChart3" class="wrapper">
										<canvas id="myChart3" ></canvas>
									</div> -->
									<div id="newChart4" class="wrapper">
										<canvas id="myChart4"></canvas>
									</div>
								</div>
							</div>
									
							<div>
								<p class="caption" style="margin-top: 20px;">(기준년도 <?=$ir_year?>년)</p>
								<div class="tableType-01 green no-border" style="min-width:300px;max-width: 365px;">
									<table>
										<colgroup>
											<col style="width: 110px;">
											<col>
											<col>
										</colgroup>
										<thead>
											<tr>
												<th>장애유형</th>
												<th style="text-align: right;">수검자(명)</th>
												<th style="text-align: right;">수검률(%)</th>
											</tr>
										</thead>
										<tbody>
										<?
										for ($i = 0 ; $i < 15 ; $i++){
											$j = $i + 1;
											$k = $i + 16;
										?>
											<tr>
												<th><?=$data2[0][$i]?></th>
												<td style="text-align:right;"><?=number_format($ir_data[0][$i])?></td>
												<td style="text-align:right;"><?=sprintf('%0.2f', $ir_data[0][$k])?></td>

											</tr>
										<?}?>
											<tr>
												<th>계</th>
												<td style="text-align:right;"><?=number_format($ir_data[0][15])?></td>
												<td style="text-align:right;"></td>

											</tr>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- //end 건강검진 수검률 (건강보험대상자) -->
			</div>
			<!-- //end .s-inner -->
		</section>
		<!-- //end #container -->

		<?php include_once "../inc/footer.php"?>
	</div>
	<!-- //end #wrap -->
	<script>
		google.charts.load("current", { packages: ["corechart"] });
		google.charts.setOnLoadCallback(myChart);
		google.charts.setOnLoadCallback(myChart2);

		function myChart() {
			var data = google.visualization.arrayToDataTable([
				['Task', 'donation'],
				['지체', <? echo($data2[1][0][0]);?>],
				['청각', <? echo($data2[1][0][1]);?>],
				['시각', <? echo($data2[1][0][2]);?>],
				['뇌병변', <? echo($data2[1][0][3]);?>],
				['지적', <? echo($data2[1][0][4]);?>],
				['기타', <? echo($data2_sum);?>]
			]);

			var options = {
				title: '',
				titleTextStyle: {
					color: '#72c312',
					fontName: 'Noto Sans KR',
					fontSize: 22
				},
				fontSize:16,
				pieHole: 0.65,
				sliceVisibilityThreshold:0,
				 backgroundColor: {
					fill: '#fff',
					fillOpacity: 0
				},
				pieSliceText:'none',
				legend: {
					textStyle:{
						color:'#000',
						fontSize:18,
						bold:true
					},
					position: 'labeled',
					align:'center',
					scrollArrows: 'none',
					maxLines: 3,
				},
				width: '100%',
				height:'100%',
				chartArea: {'width': '85%', 'height': '75%'},
				colors:[
					'#344aa0',
					'#5f72be',
					'#8c9ad1',
					'#bcc4e2',
					'#dbdee7',
					'#c6c8cf'
				],
			};

			var chart = new google.visualization.PieChart(document.getElementById('newChart'));
			chart.draw(data, options);
		}
		function myChart4() {
			var data = google.visualization.arrayToDataTable([
				['Task', 'donation'],
				['지체', <? echo($data2[1][0][0]);?>],
				['청각', <? echo($data2[1][0][1]);?>],
				['시각', <? echo($data2[1][0][2]);?>],
				['뇌병변', <? echo($data2[1][0][3]);?>],
				['지적', <? echo($data2[1][0][4]);?>],
				['기타', <? echo($data2_sum);?>]
			]);

			var options = {
				title: '',
				titleTextStyle: {
					color: '#72c312',
					fontName: 'Noto Sans KR',
					fontSize: 22
				},
				fontSize:16,
				pieHole: 0.65,
				pieSliceText:'none',
				legend: {
					textStyle:{
						color:'#000',
						fontSize:16,
					},
					position: 'bottom',
					align:'center',
					scrollArrows: 'none',
					maxLines: 3,
				},
				width: '100%',
				height:'100%',
				chartArea: {'width': '90%', 'height': '75%'},
				colors:[
					'#344aa0',
					'#5f72be',
					'#8c9ad1',
					'#bcc4e2',
					'#dbdee7',
					'#c6c8cf'
				],
			};

			var chart = new google.visualization.PieChart(document.getElementById('newChart4'));
			chart.draw(data, options);
		}
		function myChart2() {
			var data = google.visualization.arrayToDataTable([
				['Task', 'donation'],
				['노인', <? echo($data_age[0][3]);?>],
				['영유아', <? echo($data_age[0][0]);?>],
				['청장년', <? echo($data_age[0][2]);?>],
				['소아/청소년', <? echo($data_age[0][1]);?>],
			]);
			var options = {
				title: '',
				titleTextStyle:{
					color: '#72c312',
					fontName: 'Noto Sans KR',
					fontSize: 22
				},
				pieHole: 0.65,
				pieSliceText:'none',
				legend: {
					textStyle:{
						color:'#000',
						fontSize:18,
						bold:true
					},
					position: 'labeled',
					align:'center',
					scrollArrows: 'none',
					maxLines: 3,
				},
				width: '100%',
				height: '100%',
				chartArea: {'width': '85%', 'height': '75%'},
				sliceVisibilityThreshold:0,
				 backgroundColor: {
					fill: '#fff',
					fillOpacity: 0
				},
				colors: [
					'#344aa0',
					'#bcc4e2',
					'#5f72be',
					'#8c9ad1',
				]
			};

			var chart2 = new google.visualization.PieChart(document.getElementById('newChart2'));
			chart2.draw(data, options);
		}
		function myChart3() {
			var data = google.visualization.arrayToDataTable([
				['Task', 'donation'],
				['노인', <? echo($data_age[0][3]);?>],
                ['청장년', <? echo($data_age[0][2]);?>],
                ['소아/청소년', <? echo($data_age[0][1]);?>],
				['영유아', <? echo($data_age[0][0]);?>],

			]);

			var options = {
				title: '',
				titleTextStyle:{
					color: '#72c312',
					fontName: 'Noto Sans KR',
					fontSize: 22
				},
				pieHole: 0.65,
				pieSliceText: 'none',
				legend: {
					textStyle:{
						color:'#111',
						fontSize:16
					},
					position: 'bottom',
					align:'center',
					scrollArrows: 'none',
					maxLines: 3,
				},
				width: '100%',
				height: '100%',
				chartArea: {'width': '85%', 'height': '75%'},
				// sliceVisibilityThreshold:0,
				colors: [
					'#344aa0',
					'#bcc4e2',
					'#5f72be',
					'#8c9ad1',
				]
			};

			var chart2 = new google.visualization.PieChart(document.getElementById('newChart3'));
			chart2.draw(data, options);
		}

		$(window).on("resize load",function(){
			myChart();
			myChart2();
			myChart3();
			myChart4();
		});
		new Chart(document.getElementById('myChart4'), {
			type: 'bar',
			data: {
				labels: ['지체', '청각', '시각', '뇌병변', '지적', '정신', '신장', '자폐성', '언어', '장루, 요루', '호흡기', '간', '뇌전증', '심장', '안면'],
				datasets: [
					{
						label: '수검률',
						// the 1st and last value are placeholders and never get displayed on the chart
						data: [<?= sprintf('%0.2f', $ir_data[0][16]) ?>, <?= sprintf('%0.2f', $ir_data[0][17]) ?>,<?= sprintf('%0.2f', $ir_data[0][18]) ?>,<?= sprintf('%0.2f', $ir_data[0][19]) ?>,<?= sprintf('%0.2f', $ir_data[0][20]) ?>,<?= sprintf('%0.2f', $ir_data[0][21]) ?>,<?= sprintf('%0.2f', $ir_data[0][22]) ?>,<?= sprintf('%0.2f', $ir_data[0][23]) ?>,<?= sprintf('%0.2f', $ir_data[0][24]) ?>,<?= sprintf('%0.2f', $ir_data[0][25]) ?>,<?= sprintf('%0.2f', $ir_data[0][26]) ?>,<?= sprintf('%0.2f', $ir_data[0][27]) ?>,<?= sprintf('%0.2f', $ir_data[0][28]) ?>,<?= sprintf('%0.2f', $ir_data[0][29]) ?>,<?= sprintf('%0.2f', $ir_data[0][30]) ?>],
						backgroundColor: [
							'#344aa0',
							'#344aa0',
							'#344aa0',
							'#344aa0',
							'#344aa0',
							'#344aa0',
							'#344aa0',
							'#344aa0',
							'#5f72be',
							'#5f72be',
							'#5f72be',
							'#5f72be',
							'#5f72be',
							'#5f72be',
							'#5f72be',
						],
					}
				]
			},
			options: {
				labels:false,
				plugins: {
					labels: {
						render: 'value',
						fontSize: 14,
						fontColor:'#000'
					}
				},
				hover: {
					animationDuration: 1
				},
				tooltips: {
					displayColors: false,
					enabled: true,
					titleFontColor:'#111',
					bodyFontSize: 15,
					bodyFontColor: '#111',
					bodyFontStyle:'bold',
					backgroundColor: '#fff',
					cornerRadius:0,
					borderColor:'#999',
					borderWidth:'1',
					callbacks: {
						label: function(tooltipItem, data) {
						return data['datasets'][0]['data'][tooltipItem['index']] +'%';
						}
					},
				},
				legend: {
					position: 'bottom',
					// labels: {
					// 	boxWidth: 30,
					// 	padding: 30,
					// 	fontSize: 18
					// }
				},
				// showAllTooltips: true,
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							// labelString: 'x축'
						},
						gridLines: {
							color: "rgba(87, 152, 23, 0)",
							lineWidth: 0
						}
					}],
					yAxes: [{
						display: true,
						ticks: {
							suggestedMin: 0,
							suggestedMax: 100,
							callback: function (value, index, values) {
								return value + '%';
							}
						},
						scaleLabel: {
							display: true,
							// labelString: 'y축'
						},
						gridLines: {
							color: "rgba(87, 152, 23, 0)",
							lineWidth: 0
						}
					}]
				}
			},
		});
		new Chart(document.getElementById('myChart3'), {
				type: 'line',
				data: {
					labels: ['지체', '청각', '시각', '뇌병변', '지적', '정신', '신장', '자폐성', '언어', '장루, 요루', '호흡기', '간', '뇌전증', '심장', '안면'],
					datasets: [
						{
							label: '평균수검률',

							// the 1st and last value are placeholders and never get displayed on the chart
							// to get a straight line, the 1st and last values must match the same value as
							// the next/prev respectively
							data: [<?= $ir_avg ?>,<?= $ir_avg ?>,<?= $ir_avg ?>,<?= $ir_avg ?>,<?= $ir_avg ?>,<?= $ir_avg ?>,<?= $ir_avg ?>,<?= $ir_avg ?>,<?= $ir_avg ?>,<?= $ir_avg ?>,<?= $ir_avg ?>,<?= $ir_avg ?>,<?= $ir_avg ?>,<?= $ir_avg ?>,<?= $ir_avg ?>],

							borderColor: "red",
							borderWidth:1,
							backgroundColor: "rgba(255, 201, 14, 0)",
							fill: true,
							lineTension: 0,
						}
					]
				},
				options: {
					legend: {
						position: 'bottom',
						align: 'end'
						// labels: {
						// 	boxWidth: 30,
						// 	padding: 30,
						// 	fontSize: 18
						// }
					},
					plugins: {
						labels: {
							render: 'value',
							fontSize: 14,
						}
					},
					responsive: true,
					title: {
						display: false,
					},
					tooltips: false,
					scales: {
						xAxes: [{
							display: true,
							ticks: {
								fontColor: 'rgba(0,0,0,0)'
							},
							scaleLabel: {
								display: true,
								// labelString: 'x축'
							},
							gridLines: {
								color: "rgba(87, 152, 23, 1)",
								lineWidth: 0
							}
						}],
						yAxes: [{
							display: true,
							ticks: {
								suggestedMin: 0,
								suggestedMax: 100,
								callback: function (value, index, values) {
									return value + '%';
								},
								fontColor: 'rgba(0,0,0,0)'
							},
							scaleLabel: {
								display: true,
								// labelString: 'y축'
							},
							gridLines: {
								color: "rgba(87, 152, 23, 1)",
								lineWidth: 0
							}
						}]
					},
					elements: {
						point: {
							radius: 0
						}
					}
				}
			});
	</script>
	<script>
		$(document).ready(function () {
			var offset = $('#submit_position').offset(); //선택한 태그의 위치를 반환
			//$('html').animate({scrollTop : offset.top}, 400);
			$('#id_submit_btn').click(function(){
				$('#base_form').submit();
				return false;
			});
			$('#newChart2 svg rect').attr('fill','background-color: rgba(255,255,255,0)');
		});


	</script>
</body>

</html>