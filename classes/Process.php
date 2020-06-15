<?php

	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Database.php');
	include_once($filepath.'/../helpers/Format.php');
	include_once($filepath.'/../lib/Session.php');

	class Process{
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function processData($data){

			$selectedAns = $this->fm->validation($data['answer']);
			$number = $this->fm->validation($data['number']);
			$selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
			$number = mysqli_real_escape_string($this->db->link, $number);
			$next = $number+1;

			if (!isset($_SESSION['score'])) {
				$_SESSION['score'] = '0';
			}

			$total = $this->getTotal();
			$right = $this->rightAns($number);
			if ($right == $selectedAns) {
				$_SESSION['score']++;
			}
			if ($number == $total) {
				header("Location:final.php");
				exit();
			}else{
				header("Location:test.php?q=".$next);
			}

			
		}

		private function getTotal(){
			$query = "SELECT * from tbl_question";
			$seletedRow = $this->db->select($query);
			$total_row = $seletedRow->num_rows;
			return $total_row;
		}

		private function rightAns($number){
			$query = "SELECT * from tbl_answer where questionNo = '$number' and rightAns = '1' ";
			$getdata = $this->db->select($query)->fetch_assoc();
			$answerId = $getdata['ansId'];
			return $answerId;
		}

	}
?>