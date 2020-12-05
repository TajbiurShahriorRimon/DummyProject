<?php
if(!isset($_COOKIE['userName'])){
    header('Location: login.php');
}
include 'admin_header.php';
include '../controllers/ProductsControllers.php'
?>
<!--addproduct starts -->
<div class="center">
	<form name="" method="post" class="form-horizontal form-material">
		<div class="form-group">
			<h4 class="text">Name:</h4> 
			<input name="prodName" type="text" class="form-control"> <br> <?php echo $err_prodName; ?>
		</div>
		<div class="form-group">
			<h4 class="text">Category:</h4> 
			<select class="form-control">
				<option>Choose</option>
			</select>
		</div>
		<div class="form-group">
			<h4 class="text">Price:</h4> 
			<input name="price" type="text" class="form-control"> <br> <?php echo $err_price; ?>
		</div>
		<div class="form-group">
			<h4 class="text">Quantity:</h4> 
			<input name="quantity" type="text" class="form-control"> <br> <?php echo $err_quantity; ?>
		</div>
		<div class="form-group">
			<h4 class="text">Description:</h4> 
			<textarea name="description" type="text" class="form-control"></textarea><br> <?php echo $err_desc; ?>
		</div>
		<div class="form-group">
			<h4 class="text">Image</h4> 
			<input name="image" type="file" class="form-control">
		</div>
		<div class="form-group text-center">
			
			<input name="addProduct" type="submit" class="btn btn-success" value="Add Product" class="form-control">
		</div>
	</form>
</div>
<?php include 'admin_footer.php';?>
