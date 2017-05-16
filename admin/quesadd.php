<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exm = new Exam();
?>
<style>
	.adminpanel{width:480px;color:#999;margin:30px auto 0;padding:10px;border:1px solid #ddd;}
</style>
<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$addQue = $exm->addQuestion($_POST);
	}
	//Get Total Question 
	$total = $exm->getTotalRows();
	$next = $total+1;
?>
<div class="main">
	<h1>Admin Panel - Add Question</h1>
	<?php
		if (isset($addQue)) {
			echo$addQue;
		}
	?>
	<div class="adminpanel">
		<form action="" method="POST">
			<table>
				<tr>
					<td>Question No </td>
					<td> : </td>
					<td><input type="number" name="quesNo" value="<?php if(isset($next)){echo $next;} ?>"></td>
				</tr>
				<tr>
					<td>Question No </td>
					<td> : </td>
					<td><input type="text" name="ques" placeholder="Enter Question..."></td>
				</tr>
				<tr>
					<td>Choice One</td>
					<td> : </td>
					<td><input type="text" name="ans1" placeholder="Enter Choice One..."></td>
				</tr>
				<tr>
					<td>Choice Two</td>
					<td> : </td>
					<td><input type="text" name="ans2" placeholder="Enter Choice Two..."></td>
				</tr>
				<tr>
					<td>Choice Three</td>
					<td> : </td>
					<td><input type="text" name="ans3" placeholder="Enter Choice Three..."></td>
				</tr>
				<tr>
					<td>Choice Four</td>
					<td> : </td>
					<td><input type="text" name="ans4" placeholder="Enter Choice Four..."></td>
				</tr>
				<tr>
					<td>Correct No</td>
					<td> : </td>
					<td><input type="number" name="rightAns"></td>
				</tr>
				<tr>
					<td colspan="3" align="center" ><input type="submit" name="submit" value="Add A Question"></td>
				</tr>
			</table>
		</form>
	</div>	
</div>
<?php include 'inc/footer.php'; ?>