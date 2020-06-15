<?php
	 include 'inc/header.php'; 
	 Session::checkSession();
	 if (isset($_GET['q'])) {
	 	$number = (int) $_GET['q'];
	 }else{
	 	header("Location:exam.php");
	 }

	 $totalQuestion = $exam->getAllQuestion();
	 $question = $exam->getQuesByNumber($number);

	 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	 	$process = $process->processData($_POST);
	 }
?>
<div class="main">
<h1>Question <?php echo $question['questionNo'].' of '.$totalQuestion; ?></h1>
	<div class="test">
		<form method="post" action="">
		<table> 
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $question['questionNo'].' : '.$question['question']; ?></h3>
				</td>
			</tr>
<?php 
	$answer = $exam->getAllAnswerById($number);
	if ($answer) {
		while ($result = $answer->fetch_assoc()) {
?>
			<tr>
				<td><label>
				 <input type="radio" name="answer" value="<?php echo $result['ansId']; ?>" /><?php echo $result['answer']; ?>
				</td></label>
			</tr>
<?php } } ?>
			<tr>
			  <td>
				<input type="submit" name="submit" value="Next Question"/>
				<input type="hidden" name="number" value="<?php echo $number;?>" />
			</td>
			</tr>
			
		</table>
</div>
 </div>
<?php include 'inc/footer.php'; ?>