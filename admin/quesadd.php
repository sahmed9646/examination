<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exam = new Exam();
?>
<?php
  // Session::checkLogin();
?>
<style type="text/css">
	.question{
		width: 600px;
		margin: 20px auto 0;
		padding: 10px;
		color: #000;
		border: 1px solid #ddd;
	}
	input[type="text"]{
		border: 1px solid #ddd;
		margin-top: 10px;
	    margin-bottom: 10px;
	    padding: 10px;
	    width: 92%;
	    font-size: 15px;
	}
	 input[type="number"] {
	 	border: 1px solid #ddd;
		margin-top: 10px;
	    margin-bottom: 10px;
	    padding: 10px;
	    width: 50%;
	    font-size: 15px;
	}
	input[type="submit"] {
	  cursor: pointer;
	  font-size: 15px;
	  padding: 10px;
	  background: green;
	  color: #fff;
	}
</style>
<?php 
	//To get all question in questionNo column
	$getQues = $exam->getAllQuestion();
	$next = $getQues+1;

	//To add question
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$addQue = $exam->addQuestion($_POST);
	}
?>
<div class="main">
	<div class="questionPanel">
		<h2>Add Question</h2>
		<?php 
			if (isset($addQue)) {
				echo $addQue;
			}
		?>
		<div class="question">
			<form method="post" action="" width="100%">
				<table width="90%">
					<tr>
						<td>Question No</td>
						<td>:</td>
						<td><input type="number" value="<?php 
								if (isset($next)) {
									echo $next;
								}
							?>" name="questionNo"></td>
					</tr>

					<tr>
						<td>Question</td>
						<td>:</td>
						<td><input type="text" name="question" placeholder="Enter The Question.."></td>
					</tr>

					<tr>
						<td>Choice One</td>
						<td>:</td>
						<td><input type="text" name="choiceOne" placeholder="Enter First Choice.."></td>
					</tr>

					<tr>
						<td>Choice Two</td>
						<td>:</td>
						<td><input type="text" name="choiceTwo" placeholder="Enter Second Choice.."></td>
					</tr>

					<tr>
						<td>Choice Three</td>
						<td>:</td>
						<td><input type="text" name="choiceThree" placeholder="Enter Third Choice.."></td>
					</tr>

					<tr>
						<td>Choice Four</td>
						<td>:</td>
						<td><input type="text" name="choiceFour" placeholder="Enter Fourth Choice.."></td>
					</tr>

					<tr>
						<td>Correct Ans</td>
						<td>:</td>
						<td><input type="number" name="rightAns" value=""></td>
					</tr>

					<tr>
						<td colspan="3" align="right"><input type="submit" value="Add Question"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>	
</div>
<?php include 'inc/footer.php'; ?>