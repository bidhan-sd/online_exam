<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

	class Exam{

		private $db;
		private $fm;

		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}
		//Return all Question from database . use queslist.php page.
		//Return all Question from database . use Viewans.php page.
		public function getQueOrder(){
			$query  = "SELECT * FROM tbl_ques ORDER BY quesNo ASC ";
			$result = $this->db->select($query);			
			return $result;
		}
		//Return Delete Question from database by Id from tbl_ques and tbl_ans. use queslist.php page.
		public function delQuestion($quesNo){
			$tables = array("tbl_ques","tbl_ans");
			foreach ($tables as $table) {
				$delquery = "DELETE FROM $table WHERE quesNo='$quesNo'";
				$deldata = $this->db->delete($delquery);	
			}
			if ($deldata) {
				$msg = "<span class='success'>Data Deleted Successfully.. !</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Data Not Deleted !</span>";
				return $msg;
			}
		}
		//How much row into tbl_ques table just show this result . Use quesadd.php.
		//Return total question number from here . Use this code into Starttest.php
		public function getTotalRows(){
			$query     = "SELECT * FROM tbl_ques";
			$getResult = $this->db->select($query);			
			$total     = $getResult->num_rows;
			return $total;
		}
		//How much row into tbl_ques table just show this result . Use quesadd.php.
		public function addQuestion($data){
			$quesNo = mysqli_real_escape_string($this->db->link, $data['quesNo']);
			$ques = mysqli_real_escape_string($this->db->link, $data['ques']);
			$ans = array();
			$ans[1] = $data['ans1'];
			$ans[2] = $data['ans2'];
			$ans[3] = $data['ans3'];
			$ans[4] = $data['ans4'];
			$rightAns = $data['rightAns'];
			$query = "INSERT INTO tbl_ques(quesNo,ques) VALUES ('$quesNo','$ques')";
			$insert_row = $this->db->insert($query);
			if ($insert_row) {
				foreach ($ans as $key => $ansName) {
					if ($ansName != '') {
						if ($rightAns == $key) {
							$rquery = "INSERT INTO tbl_ans(quesNo,rightAns,ans) VALUES('$quesNo','1','$ansName')";
						}else{
							$rquery = "INSERT INTO tbl_ans(quesNo,rightAns,ans) VALUES ('$quesNo','0','$ansName')";
						}
						$insertrow = $this->db->insert($rquery);
						if ($insertrow) {
							continue;
						}else{
							die('Error...');
						}
					}
				}
				$msg = "<span class='success'>Question Add Successfully .</span>";
				return $msg;
			}
		}
		//Return total question number from here . Use this code into Starttest.php
		public function getQuestion(){
			$query      = "SELECT * FROM tbl_ques";
			$getData    = $this->db->select($query);			
			$result     = $getData->fetch_assoc();
			return $result;
		}
		//Return One question all data by question id from database . Use this code into test.php
		public function getQuestionByNumber($number){
			$query      = "SELECT * FROM tbl_ques WHERE quesNo='$number'";
			$getData    = $this->db->select($query);			
			$result     = $getData->fetch_assoc();
			return $result;
		}
		//Return One question all data by question id from database . Use this code into test.php
		public function getAnswer($number){
			$query      = "SELECT * FROM tbl_ans WHERE quesNo='$number'";
			$getData    = $this->db->select($query);	
			return $getData;
		}

	}
?>