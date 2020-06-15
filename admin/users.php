<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/User.php');
	$user = new User();
?>
<?php
  // Session::checkLogin();
?>

<?php 
	if (isset($_GET['dsblid'])) {
		$dsblid = $_GET['dsblid'];
		$dsblUser = $user->disableUser($dsblid);
	}
?>
<?php 
	if (isset($_GET['enblid'])) {
		$enblid = $_GET['enblid'];
		$enblUser = $user->enableUser($enblid);
	}
?>
<?php 
	if (isset($_GET['delid'])) {
		$delid = $_GET['delid'];
		$delUser = $user->deleteUser($delid);
	}
?>

<div class="main">
	<h1>Admin Panel - Manage User</h1>
	<div class="manageUser">
	<?php 
		if (isset($dsblUser)) {
			echo $dsblUser;
		}
		if (isset($enblUser)) {
			echo $enblUser;
		}
		if (isset($delUser)) {
			echo $delUser;
		}
	?>
		<table class="tblone">
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
			<?php 
				$userData = $user->getAllUser();
				if ($userData) {
					$i = 0;
					while ($result = $userData->fetch_assoc()) {
						$i++;
			?>
			<tr>
				<td><?php 
					if ($result['status'] == '1') {
						echo "<span class='error'>.$i.</span>";
					}else{
						echo $i;
					}
				 ?></td>
				<td><?php echo $result['fullName']; ?></td>
				<td><?php 
					if ($result['status'] == '1') {
						echo "<span class='error'>".$result['userName']."</span>";
					}else{
						echo $result['userName'];
					}
				 ?></td>
				<td><?php echo $result['email']; ?></td>
				<td>
				<?php if ($result['status'] == '0') { ?>
					<a href="?dsblid=<?php echo $result['userId']; ?>">Disable</a>
				<?php }else{ ?>
					<a href="?enblid=<?php echo $result['userId']; ?>">Enable</a>
				<?php } ?>	
				|| <a onclick="return confirm('Are You Sure TO Remove');" href="?delid=<?php echo $result['userId']; ?>">Remove</a>
				</td>
			</tr>
			<?php } } ?>
		</table>
	</div>	
</div>
<?php include 'inc/footer.php'; ?>