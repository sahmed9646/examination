<?php

	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Database.php');
	include_once($filepath.'/../helpers/Format.php');

	class Exam{
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function addQuestion($data){
			$questionNo = mysqli_real_escape_string($this->db->link, $data['questionNo']);
			$question = mysqli_real_escape_string($this->db->link, $data['question']);

			$choice = array();
			$choice['1'] = $data['choiceOne'];
			$choice['2'] = $data['choiceTwo'];
			$choice['3'] = $data['choiceThree'];
			$choice['4'] = $data['choiceFour'];

			$rightAns = mysqli_real_escape_string($this->db->link, $data['rightAns']);

			$query = "INSERT into tbl_question(questionNo, question) values('$questionNo', '$question')";
			$insertedRow = $this->db->insert($query);

			if ($insertedRow) {
				foreach ($choice as $key => $value) {
					if ($value != '') {
						if ($rightAns == $key) {
							$rightquery = "INSERT into tbl_answer(questionNo, rightAns, answer) values('$questionNo', '1', '$value')";
						}else{
							$rightquery = "INSERT into tbl_answer(questionNo, rightAns, answer) values('$questionNo', '0', '$value')";
						}
						$insertRow = $this->db->insert($rightquery);
						if ($insertRow) {
							continue;
						}else{
							die('Error..');
						}
					}
				}
				$msg = "<span class='success'>Question Added Successfully</span>";
				return $msg;
			}
		}

		public function getAllQuesByQuesNo(){
			$query = "SELECT * from tbl_question order by questionNo asc";
			$resutl = $this->db->select($query);
			return $resutl;
		}

		public function deleteQuestion($id){
			$tables = array("tbl_question", "tbl_answer");
			foreach ($tables as $table) {
				$query = "DELETE from $table where questionNo = '$id' ";
				$delQuery = $this->db->delete($query);
			}
			if ($delQuery) {
				$msg = "<span class='success'>Question Deleted Successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Question Not Deleted</span>";
				return $msg;
			}
		}
		public function getAllQuestion(){
			$query = "SELECT * from tbl_question";
			$result = $this->db->select($query);
			$total = $result->num_rows;
			return $total;
		}

		public function getQuestion(){
			$query = "SELECT * from tbl_question";
			$selected = $this->db->select($query);
			$result = $selected->fetch_assoc();
			return $result;
		}

		public function getQuesByNumber($number){
			$query = "SELECT * from tbl_question where questionNo = '$number' ";
			$selected = $this->db->select($query);
			$result = $selected->fetch_assoc();
			return $result;
		}

		public function getAllAnswerById($number){
			$query = "SELECT * from tbl_answer where questionNo = '$number' ";
			$selected = $this->db->select($query);
			return $selected;
		}
	}
?>