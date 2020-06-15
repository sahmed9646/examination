<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exam = new Exam();
?>

<?php 
	if (isset($_GET['delid'])) {
		$id = (int)$_GET['delid'];
		$delQues = $exam->deleteQuestion($id);
	}
?>
<div class="main">
	<h1>All Question List</h1>
	<?php 
		if (isset($delQues)) {
			echo $delQues;
		}
	?>
	<div class="manageQuestion">
		<table class="tblone">
			<tr>
				<th width="10%">No</th>
				<th width="70%">Questions</th>
				<th width="20%">Action</th>
			</tr>
			<?php 
				$quesData = $exam->getAllQuesByQuesNo();
				if ($quesData) {
					$i = 0;
					while ($result = $quesData->fetch_assoc()) {
						$i++;
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $result['question']; ?></td>
				<td>
				 <a onclick="return confirm('Are You Sure TO Remove');" href="?delid=<?php echo $result['questionNo']; ?>">Remove</a>
				</td>
			</tr>
			<?php } } ?>
		</table>
	</div>	
</div>
<?php include 'inc/footer.php'; ?>