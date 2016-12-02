<?php

include  ('../../Controller/Inquiry_Controller.php');
	$IC = new Inquiry_Controller();
	$sevents = array();
	$sevents = $IC -> InquiryVacancyStatusSingle();

	define('START', 0);
	define('END', 182);

//single
$S_titleArray = array();
$S_startDateArray = array();

//print_r($testvar);
date_default_timezone_set("Asia/Rangoon");

for($i = START; $i < END; $i++) {

	$todayDate = date("Y-m-d");
	$sdate = strtotime("+".$i." day", strtotime($todayDate));
	$sincDate = date("Y-m-d", $sdate);

	$S_titleArray[$i]["title"] = "Single";
	$S_startDateArray[$i]["start_date"]="$sincDate";

	if($sevents[$i]>=10) {
		$S_colorArray[$i]["color"] = "#4BEC00"; //green
		$event_array[] = array(
        'title' => $S_titleArray[$i]['title'],
		'start' => $S_startDateArray[$i]['start_date'],
		'color' => $S_colorArray[$i]['color'],
	);

		//echo $S_colorArray[$i]["color"];
	}
	elseif($sevents[$i]==0) {
		$S_colorArray[$i]["color"] = "#E10000"; //red
		$event_array[] = array(
        'title' => $S_titleArray[$i]['title'],
		'start' => $S_startDateArray[$i]['start_date'],
		'color' => $S_colorArray[$i]['color'],
	);
		//echo $S_colorArray[$i]["color"];
	}
	elseif($sevents[$i]>0 && $sevents[$i]<10) {
		$S_colorArray[$i]["color"] = "#F3E400"; //yellow
		$event_array[] = array(
        'title' => $S_titleArray[$i]['title'],
		'start' => $S_startDateArray[$i]['start_date'],
		'color' => $S_colorArray[$i]['color'],
	);
		//echo $S_colorArray[$i]["color"];
	}

}
echo json_encode($event_array);
exit;

?>
