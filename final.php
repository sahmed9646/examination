<?php include 'inc/header.php'; ?>

<div class="main">
<h1>Quiz Test Result</h1>
	<div class="starttest">
		
		<?php if(isset($_SESSION['score']) && $_SESSION['score'] <='2'){ ?>
			<h2>Ooops!! Your are fail. Please try again...</h2>
		<?php }elseif(isset($_SESSION['score']) && $_SESSION['score'] >'2'){?>
			<h2>Congrats!! You Have Done It..</h2>
		<?php } else{?>
			<h2>Error!! Please Start The Test Again..</h2>
		<?php } ?>
		<p>Your Score Is : 
			<?php 
				if(isset($_SESSION['score'])){ 
				echo $_SESSION['score']; 
				unset($_SESSION['score']);
				}
			?>	
		</p>
		<a href="starttest.php">Start Again</a>
		<a href="view_answer.php">View Answer</a>
	</div>
</div>
<?php include 'inc/footer.php'; ?>