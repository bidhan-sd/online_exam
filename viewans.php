<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$total    = $exm->getTotalRows();
?>
<div class="main">
	<h1>All Questions & Answer  <?php echo $total; ?></h1>
	<div class="viewans">
			<?php
				$getQues = $exm->getQueOrder();
				if($getQues){
					while ($question = $getQues->fetch_assoc()){
			?>
			<tr>
				<td colspan="2"></td>
				<h3>Qus <?php echo $question['quesNo']; ?>: <?php echo $question['ques']; ?></h3>
			</tr><br/>

			<?php
				$number = $question['quesNo'];
				$answer = $exm->getAnswer($number);
				if ($answer){
					while ($result = $answer->fetch_assoc()){
			?>
				<tr><td><input type="radio" <?php if($result['rightAns'] == '1') echo "checked";?>/>
						<?php 
							if($result['rightAns'] == '1'){
								echo "<span style='color:blue'>".$result['ans']."</span>";

							}else{
								echo $result['ans'];
							}						
						?>
				</td></tr></br>
				<?php } } ?>

			<?php } } ?>
			<a href="test.php">Start Test</a>
	</div>
</div>
<?php include 'inc/footer.php'; ?>