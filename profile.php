<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$userId = Session::get("userId");
?>
<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$updateUser = $user->updateUserProfile($userId, $_POST);
	}
?>
<div class="main">
<h1>Your Profile</h1>
<script type="text/javascript">
	$(function(){
		setTimeout(function(){
			$("#msg").fadeOut();
		}, 3000);
	});
</script>
<?php
	if (isset($updateUser)) {
		echo "<span id='msg' style='color:#F8D713;'>".$updateUser."</span>";
	}
?>
<span id="state"></span>
<div class="profile">
	<form action="" method="post">
	
	<?php 
		$getData = $user->getUserInfo($userId);
		if ($getData) {
			while ($result = $getData->fetch_assoc()) {
	?>
		<table class="tbl">    
		 <tr>
		   <td>Full Name</td>
		   <td><input name="fullName" id="fullName" type="text" value="<?php echo $result['fullName'];?>"></td>
		 </tr>
		 <tr>
		   <td>User Name </td>
		   <td><input name="userName" id="userName" type="text" value="<?php echo $result['userName'];?>"></td>
		 </tr>
		 <tr>
		   <td>Email</td>
		   <td><input name="email" id="email" type="text" value="<?php echo $result['email'];?>"></td>
		 </tr>
		  <tr>
		  <td></td>
		   <td><input type="submit" id="" value="Update">
		   </td>
		 </tr>
       </table>
     <?php } } ?>  
	   </form>
	 </div>  
</div>
<?php include 'inc/footer.php'; ?>