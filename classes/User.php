<?php

	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Session.php');
	include_once($filepath.'/../lib/Database.php');
	include_once($filepath.'/../helpers/Format.php');

	class User{
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function userRegistration($fullName, $userName, $email, $password){
			$fullName = $this->fm->validation($fullName);
			$userName = $this->fm->validation($userName);
			$email 	  = $this->fm->validation($email);
			$password = $this->fm->validation($password);

			$fullName = mysqli_real_escape_string($this->db->link, $fullName);
			$userName = mysqli_real_escape_string($this->db->link, $userName);
			$email 	  = mysqli_real_escape_string($this->db->link, $email);
			$password = mysqli_real_escape_string($this->db->link, md5($password));

			if ($fullName == "" || $userName == "" || $email == "" || $password == "") {
				echo "<span class='error'>Field Must Not Be Empty !</span>";
				exit();
			}elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				echo "<span class='error'>Invalid Email Address !</span>";
				exit();
			}else{
				$chkQuery = "SELECT * from tbl_user where email = '$email' ";
				$chkResult = $this->db->select($chkQuery);
				if ($chkResult != false) {
					echo "<span class='error'>Email Already Exists !</span>";
				exit();
				}else{
					$query = "INSERT into tbl_user(fullName, userName, email, password) values('$fullName', '$userName', '$email', '$password')";
					$insertedRow = $this->db->insert($query);
					if ($insertedRow) {
						echo "<span class='success'>Registration Successfully !</span>";
						exit();
					}else{
						echo "<span class='error'>Error .. Not Registered !</span>";
						exit();
					}
				}
			}

		}

		public function userLogin($email, $password){
			$email = $this->fm->validation($email);
			$password = $this->fm->validation($password);
			$email = mysqli_real_escape_string($this->db->link, $email);
			$password = mysqli_real_escape_string($this->db->link, $password);

			if ($email == "" || $password == "") {
				echo "empty";
				exit();
			}else{
				$query = "SELECT * FROM tbl_user where email = '$email' and password = '$password' ";
				$result = $this->db->select($query);
				if ($result != false) {
					$value = $result->fetch_assoc();
					if ($value['status'] == '1') {
						echo "disable";
						exit();
					}else{
						Session::init();
						Session::set("login", true);
						Session::set("userId", $value['userId']);
						Session::set("userName", $value['userName']);
						Session::set("email", $value['email']);
					}
				}else{
					echo "error";
					exit();
				}
			}
		}

		public function getAllUser(){
			$query = "SELECT * FROM tbl_user order by userId desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function getAdminData($data){
			$adminUser = $this->fm->validation($data['adminUser']);
			$adminPass = $this->fm->validation($data['adminPass']);

			$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
			$adminPass = mysqli_real_escape_string($this->db->link, md5($adminPass));
		}

		public function disableUser($userId){
			$query = "UPDATE tbl_user set status = '1' where userId = '$userId' ";
			$result = $this->db->update($query);
			if ($result) {
				$msg = "<span class='sucess'>User Disabled</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>User Not Disabled</span>";
				return $msg;
			}
		}

		public function enableUser($userId){
			$query = "UPDATE tbl_user set status = '0' where userId = '$userId' ";
			$result = $this->db->update($query);
			if ($result) {
				$msg = "<span class='sucess'>User Enabled</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>User Not Enabled</span>";
				return $msg;
			}
		}

		public function deleteUser($userId){
			$query = "DELETE FROM tbl_user where userId = '$userId' ";
			$result = $this->db->delete($query);
			if ($result) {
				$msg = "<span class='sucess'>User Deleted</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>User Not Deleted</span>";
				return $msg;
			}
		}

		public function getUserInfo($userId){
			$query = "SELECT * FROM tbl_user where userId = '$userId' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function updateUserProfile($userId, $data){
			$fullName = $this->fm->validation($data['fullName']);
			$userName = $this->fm->validation($data['userName']);
			$email 	  = $this->fm->validation($data['email']);

			$fullName = mysqli_real_escape_string($this->db->link, $fullName);
			$userName = mysqli_real_escape_string($this->db->link, $userName);
			$email 	  = mysqli_real_escape_string($this->db->link, $email);

			$query = "UPDATE tbl_user set fullName = '$fullName', userName = '$userName', email = '$email' where userId = '$userId' ";
			$result = $this->db->update($query);
			if ($result) {
				$msg = "<span class='sucess'>User info updated</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>User Not updated</span>";
				return $msg;
			}
		}
	}
?>