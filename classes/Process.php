<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	//Session::init();
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

	class Process{

		private $db;
		private $fm;

		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}
		//Circle all data by useing this function . Use this function into test.php.
		public function processData($data){
			$selectedAns     = $this->fm->validation($data['ans']);
			$number          = $this->fm->validation($data['number']);
			$selectedAns     = mysqli_real_escape_string($this->db->link, $selectedAns);
			$number          = mysqli_real_escape_string($this->db->link, $number);

			$next = $data['number'] + 1;

			if (!isset($_SESSION['score'])) {
				$_SESSION['score'] = '0';
			}
			$total = $this->getTotal();
			$right = $this->rightAnswer($number);
			if ($right == $selectedAns) {
				$_SESSION['score']++;
			}
			if ($number == $total) {
				header("Location: final.php");
				exit();
			}else{
				header("Location: test.php?q=".$next);
			}
		}
		//included with processData($data) function.
		private function getTotal(){
			$query     = "SELECT * FROM tbl_ques";
			$getResult = $this->db->select($query);			
			$total     = $getResult->num_rows;
			return $total;
		}
		//included with processData($data) function.
		private function rightAnswer($number){
			$query      = "SELECT * FROM tbl_ans WHERE quesNo='$number' AND rightAns='1'";
			$getdata    = $this->db->select($query)->fetch_assoc();			
			$result     = $getdata['id'];
			return $result;
		}

	}
?>