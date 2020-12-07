<?php
if(!isset($_COOKIE['userName'])){
    header('Location: login.php');
}

include 'admin_header.php';
include '../controllers/CategoryControllers.php';
?>
<!--edit category starts -->
<div class="center">
	<form action="" method="post" class="form-horizontal form-material">
		<div class="form-group">
			<h4 class="text">Name:</h4> 
			<input name="catName" type="text" class="form-control"> <br> <?php echo $err_name; ?>
		</div>
		
		<div class="form-group text-center">
			
			<input name="editCategory" type="submit" class="btn btn-success" value="Edit Category" class="form-control">
		</div>
	</form>
</div>

<!--edit category ends -->
<?php include 'admin_footer.php';?>