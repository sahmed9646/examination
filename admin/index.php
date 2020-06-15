<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<?php
  // Session::checkLogin();
?>

<div class="main">
	<div class="adminContent">
		<h2>Welcome to Control Admin Panel</h2>
		<p>You Can Manage Your User and System From Here</p>
	</div>	
</div>
<?php include 'inc/footer.php'; ?>