<?php
	 include 'inc/header.php'; 
	 Session::checkSession();

	 $totalQuestion = $exam->getAllQuestion();
?>
<div class="main">
<h1>Answer Of All Questions </h1>
	<div class="test">
		<table> 
		<?php 
			$getques = $exam->getAllQuesByQuesNo();
			if ($getques) {
				while ($question = $getques->fetch_assoc()) {
		?>
			<tr>
				<td colspan="2">
				 <h3 class="testh3">Que <?php echo $question['questionNo'].' : '.$question['question']; ?></h3>
				</td>
			</tr>
			<?php 
				$number = $question['questionNo'];
				$answer = $exam->getAllAnswerById($number);
				if ($answer) {
					while ($result = $answer->fetch_assoc()) {
			?>
			<tr>
				<td><label>
				 <input type="radio"/><?php
				 	if ($result['rightAns'] == '1') {
				 		echo "<span style='color:#fff'>".$result['answer']."</span>";
				 	}else{
				  		echo $result['answer']; 
				  	}	
				  		?>
				</td></label>
			</tr>
			<?php } } ?>
		<?php } } ?>	
		</table>
	<a style="color: #000; background: #ddd; text-decoration: none;padding: 5px;" href="starttest.php">Start Again</a>

</div>
 </div>
<?php include 'inc/footer.php'; ?>