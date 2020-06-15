<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/classes/User.php');
	$user = new User();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$fullName = $_POST['fullName'];
		$userName = $_POST['userName'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$userReg = $user->userRegistration($fullName, $userName, $email, $password);
	}
?>