<?php
    include 'main_header.php';
    include '../controllers/UsersControllers.php';
?>

<!--login starts -->
<div class="center-login">
	<h1 class="text text-center">Login</h1>
	<form action="" method="post" class="form-horizontal form-material">
		<div class="form-group">
			<h4 class="text">Username</h4> 
			<input type="text" name="username" class="form-control"> <br>
            <?php echo $err_username; ?>
		</div>
		<div class="form-group">
			<h4 class="text">Password</h4> 
			<input type="password" name="password" class="form-control"> <br>
            <?php echo $err_pass; ?>
		</div>
		<div class="form-group text-center">
			
			<input type="submit" name="login" class="btn btn-danger" value="Login" class="form-control"> <br>
            <?php echo $notFound; ?>
		</div>
		<div class="form-group text-center">
			
			<a href="signup.php" >Not registered yet? Sign Up</a>
		</div>
</div>

<!--login ends -->
<?php include 'main_footer.php';?>