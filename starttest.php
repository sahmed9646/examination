<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$question = $exam->getQuestion();
	$totalQuestion = $exam->getAllQuestion();
?>
<div class="main">
	<div class="starttest">
		<h2>Test Your Knowledge</h2>
		<p>This is multiple choice quiz test</p>
		<ul>
			<li>Number of questions<strong>  <?php echo $totalQuestion; ?></strong></li>
			<li>Question Type <strong>Multiple Choice</strong></li>
			<li><a href="test.php?q=<?php echo $question['questionNo']; ?>">Start Test</a></li>
		</ul>
	</div>
</div>
<?php include 'inc/footer.php'; ?>