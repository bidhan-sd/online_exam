<?php include 'inc/header.php'; ?>
<?php
	Session::checkLogin();
?>
<div class="main">
	<h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
		<form action="" method="POST">
			<table class="tbl">    
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" id="email"></td>
				</tr>
				<tr>
					<td>Password </td>
					<td><input type="password" name="password" id="password"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" id="loginsubmit" value="Login"/></td>
				</tr>
	       </table>
		</form>
	   <p>New User ? <a href="register.php">Signup</a> Free</p>
	   <span class="empty" style="display: none;">Field Must Not be Empty !</span>
	   <span class="error" style="display: none;">Email or Password Not Match !</span>
	   <span class="disable" style="display: none;">User Id Disable !</span>
	</div>	
</div>
<?php include 'inc/footer.php'; ?>