<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

	class User{

		private $db;
		private $fm;

		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}
		//Ajax User Registation here . Use output into register.php
		public function userRegistration($name,$username,$password,$email){
			$name     = $this->fm->validation($name);
			$username = $this->fm->validation($username);
			$password = $this->fm->validation($password);
			$email    = $this->fm->validation($email);

			$name     = mysqli_real_escape_string($this->db->link, $name);
			$username = mysqli_real_escape_string($this->db->link, $username);
			$email    = mysqli_real_escape_string($this->db->link, $email);
			if ($name == "" || $username == "" || $password == "" || $email == "") {
				echo "<span class='error'>Field Must Not be Empty !<span>";
				exit();
			}else if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
				echo "<span class='error'>Invalid Email Address !<span>";
				exit();
			}else{
				$chkquery = "SELECT * FROM tbl_user WHERE email='$email'";
				$chkresult =$this->db->select($chkquery);
				if($chkresult != false){
					echo "<span class='error'>Email Address Exist !<span>";
					exit();
				}else{
					$password = mysqli_real_escape_string($this->db->link, md5($password));
					$query = "INSERT INTO tbl_user(name,username,password,email,status) VALUES ('$name','$username','$password','$email','')";
					$insert_row = $this->db->insert($query);
					if ($insert_row) {
						echo "<span class='success'>Registration Susscessfull !<span>";
						exit();
					}else{
						echo "<span class='error'>Error... Not Registered !<span>";
						exit();
					}
				}
			}
			
		}

		//Return all user data . use login.php page.
		public function userLogin($email,$password){
			$email    = $this->fm->validation($email);
			$password = $this->fm->validation($password);
			$email    = mysqli_real_escape_string($this->db->link, $email);	
			if ($email == "" || $password == "") {
				echo "empty";
				exit();
			}else{		
			$password = mysqli_real_escape_string($this->db->link,md5( $password));
				$query  = "SELECT * FROM tbl_user WHERE email='$email' AND password='$password'";
				$result =$this->db->select($query);			
				if ($result != false) {
					$value = $result->fetch_assoc();
					if($value['status'] == '1'){
						echo "disable";
						exit();
					}else{
						Session::init();
						Session::set("login",true);
						Session::set("userid",$value['userId']);
						Session::set("username",$value['username']);
						Session::set("name",$value['name']);
					}
				}else{
					echo "error";
					exit();
				}
			}

			
		}

		//Return all user data . use Users.php page.
		public function getAllUser(){
			$query  = "SELECT * FROM tbl_user ORDER BY userId DESC";
			$result =$this->db->select($query);			
			return $result;
		}
		//User User Disable which is used by user id . use Users.php page.
		public function desableUser($userid){
			$query  = "UPDATE tbl_user SET status='1' WHERE userId='$userid'";
			$updated_row =$this->db->update($query);
			if ($updated_row) {
				$msg = "<span class='success'> User Disable !</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>User Not Disable !</span>";
				return $msg;
			}
		}
		//User User Enable which is used by user id . use Users.php page.
		public function enableUser($userid){
			$query  = "UPDATE tbl_user SET status='0' WHERE userId='$userid'";
			$updated_row =$this->db->update($query);
			if ($updated_row) {
				$msg = "<span class='success'> User Enaable !</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>User Not Enaable !</span>";
				return $msg;
			}
		}
		//User User Delete which is used by user id . use Users.php page.
		public function deleteUser($userid){
			$query  = "DELETE FROM tbl_user WHERE userId='$userid'";
			$deleted_row =$this->db->delete($query);
			if ($deleted_row) {
				$msg = "<span class='success'> User Deleted !</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>User Not Deleted !</span>";
				return $msg;
			}
		}
		//Get user data by id and Use profile.php .
		public function getUserData($userid){
			$query  = "SELECT * FROM tbl_user WHERE userid ='$userid'";
			$result =$this->db->select($query);			
			return $result;
		}
		//Update user data by id and Use profile.php .
		public function updateUserData($userid,$data){
			$name     = $this->fm->validation($data['name']);
			$username = $this->fm->validation($data['username']);
			$email    = $this->fm->validation($data['email']);

			$name     = mysqli_real_escape_string($this->db->link, $name);
			$password = mysqli_real_escape_string($this->db->link, $username);
			$email    = mysqli_real_escape_string($this->db->link, $email);

			$query  = "UPDATE tbl_user SET name='$name', username='$username', email='$email' WHERE userid ='$userid'";
			$updated_row =$this->db->update($query);			
			if ($updated_row) {
				$msg = "<span class='success'>User Data Updated !</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>User Data Not Updated !</span>";
				return $msg;
			}
		}
	}
?>