<?php
include_once '../_init.php';

$page_title = "상담";

include_once "../inc/head.php";

$index_page = "notice.php";
$query_page = "query.php";

$jb_code = $_GET["jb_code"];
if($jb_code == "10" or $jb_code == "20"){
	$index = "4";
	$index2 = "1";
	$page_title = "소식·자료";
	$page_img ="/resource/images/sub-bnnr04.png";
}
elseif($jb_code == "30"){
	$index = "4";
	$index2 = "2";
	$page_title = "소식·자료";
	$page_img ="/resource/images/sub-bnnr04.png";
}
elseif($jb_code == "40" or $jb_code == "50" or $jb_code == "60"){
	$index = "4";
	$index2 = "3";
	$page_title = "소식·자료";
	$page_img ="/resource/images/sub-bnnr04.png";
}
elseif($jb_code == "70"){
	$index = "5";
	$index2 = "1";
	$page_title = "상담";
	$page_img ="/resource/images/sub-bnnr05.png";
	$jb_mode = "twrite";
}
elseif($jb_code == "80"){
	$index = "5";
	$index2 = "2";
	$page_title = "상담";
	$page_img ="/resource/images/sub-bnnr05.png";
}
?>
<style>
	.small-padding td {
		padding:10px 15px !important;
	}
</style>
<body>
	<div id="wrap">
		<?php include_once "../inc/header.php"?>
		<section id="container" class="sub">
			<div id="sub-bnnr">
				<h2 class="text"><?=$page_title?></h2>
				<img data-index="<?=$index?>" data-index2="<?=$index2?>" src="<?=$page_img?>" alt="">
			</div>
			<!-- //end .sub-bnnr -->

			<?php include_once "../inc/location.php"?>
            <?php include $GP -> INC_PATH ."/board_inc.php"; ?>

		<?php include_once "../inc/footer.php"?>
	</div>
	<!-- //end #wrap -->
</body>

</html>