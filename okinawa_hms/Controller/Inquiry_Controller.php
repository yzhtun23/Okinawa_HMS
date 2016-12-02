<?php
	class Inquiry_Controller {
		public function InquiryVacancyStatusSingle () {
		include  ('../../Model/dao/RoomDAO.php');
			//$todayDate = date("Y-m-d");

			$RDAO = new RoomDAO();

			$scount_ic = array();
			$scount_ic = $VacancyStatus = $RDAO->VacancyStatusSingle();
			return $scount_ic;
			
		}
		public function InquiryVacancyStatusDouble () {
		include  ('../../Model/dao/RoomDAO.php');
			//$todayDate = date("Y-m-d");

			$RDAO = new RoomDAO();

			$dcount_ic = array();
			$dcount_ic = $VacancyStatus = $RDAO->VacancyStatusDouble();
			return $dcount_ic;
			
		}
	}
?>
