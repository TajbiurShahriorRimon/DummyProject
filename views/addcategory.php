<?php
if(!isset($_COOKIE['userName'])){
    header('Location: login.php');
}
include 'admin_header.php';
include '../controllers/CategoryControllers.php'
?>
<!--addproduct starts -->
	<div class="center">
		<form action="" method="post" class="form-horizontal form-material">
			<div class="form-group">
				<h4 class="text">Name:</h4> 
				<input type="text" name="catName" class="form-control"> <br>
                <?php echo $err_name; ?>
			</div>
			
			<div class="form-group text-center">
				
				<input type="submit" name="addCategory" class="btn btn-success" value="Add Category" class="form-control">
			</div>
		</form>
	</div>

<!--addproduct ends -->
<?php include 'admin_footer.php';?>