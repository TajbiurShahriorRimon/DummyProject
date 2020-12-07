<?php
include 'main_header.php';
include_once '../controllers/UsersControllers.php';
?>


<!--sign up starts -->
<div class="center-login">
	<h1 class="text text-center">Sign Up</h1>
	<form action="" method="post" class="form-horizontal form-material">
		<div class="form-group">
			<h4 class="text">Name</h4> 
			<input name="name" type="text" class="form-control"> <br> <?php echo $err_name; ?>
		</div>
		<div class="form-group">
			<h4 class="text">Username</h4> 
			<input name="username" type="text" class="form-control"> <br> <?php echo $err_username; ?>
		</div>
		<div class="form-group">
			<h4 class="text">Email</h4> 
			<input name="email" type="text" class="form-control"> <br> <?php echo $err_email; ?>
		</div>
		<div class="form-group">
			<h4 class="text">Password</h4> 
			<input name="pass" type="password" class="form-control"> <br> <?php echo $err_pass; ?>
		</div>
		<div class="form-group text-center">
			
			<input name="signUp" type="submit" class="btn btn-success" value="Sign Up" class="form-control">
		</div>
</div>

<!--sign up ends -->
<?php include 'main_footer.php';?>