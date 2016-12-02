<?php

include  ('../../Controller/Inquiry_Controller.php');
	$IC = new Inquiry_Controller();
	$devents = array();
	$devents = $IC -> InquiryVacancyStatusDouble();

	define('START', 0);
	define('END', 182);

//double
$D_titleArray = array();
$D_startDateArray = array();

//print_r($testvar);
date_default_timezone_set("Asia/Rangoon");

for($i = START; $i < END; $i++) {
	$todayDate = date("Y-m-d");
	$ddate = strtotime("+".$i." day", strtotime($todayDate));
	$dincDate = date("Y-m-d", $ddate);

	$D_titleArray[$i]["title"] = "Double";
	$D_startDateArray[$i]["start_date"]="$dincDate";

	if($devents[$i]>=10) {
		$D_colorArray[$i]["color"] = "#4BEC00"; //green
		$event_array[] = array(
        'title' => $D_titleArray[$i]['title'],
		'start' => $D_startDateArray[$i]['start_date'],
		'color' => $D_colorArray[$i]['color'],
	);
		//echo $S_colorArray[$i]["color"];
	}
	elseif($devents[$i]==0) {
		$D_colorArray[$i]["color"] = "#E10000"; //red
		$event_array[] = array(
        'title' => $D_titleArray[$i]['title'],
		'start' => $D_startDateArray[$i]['start_date'],
		'color' => $D_colorArray[$i]['color'],
	);
		//echo $S_colorArray[$i]["color"];
	}
	elseif($devents[$i]>0 && $devents[$i]<10) {
		$D_colorArray[$i]["color"] = "#F3E400"; //yellow
		$event_array[] = array(
        'title' => $D_titleArray[$i]['title'],
		'start' => $D_startDateArray[$i]['start_date'],
		'color' => $D_colorArray[$i]['color'],
	);
		//echo $S_colorArray[$i]["color"];
	}

}
echo json_encode($event_array);
exit;

?>
