<?php
if(!isset($_COOKIE['userName'])){
    header('Location: login.php');
}

include 'admin_header.php';
include '../controllers/ProductsControllers.php';

?>
<!--editproduct starts -->
<div class="center">
<table>
	<td>
		<img class="item-image" src="https://m.media-amazon.com/images/I/41n0GIKkW8L._AC_SR160,160_.jpg"></img>
	</td>
	<td>
		<form action="" method="post" enctype="multipart/form-data" class="form-horizontal form-material">
			<div class="form-group">
				<h4 class="text">Name:</h4> 
				<input name="prodName" type="text" class="form-control"> <br> <?php echo $err_prodName; ?>
			</div>
			<div class="form-group">
				<h4 class="text">Category:</h4> 
				<select name="categoryList" class="form-control">
					<option disabled selected>Choose</option>
                    <?php
                        include_once '../models/DataBase.php';
                        $array = new DataBase();
                        $array->dbCon();
                        $result = $array->categoryList();
                        foreach ($result as $data){
                            echo "<option value='.".$data['category_id'].".'>".$data['category_name']."</option>";
                        }
                    ?>
				</select> <br> <?php echo $err_category; ?>
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
				<textarea name="description" type="text" class="form-control"></textarea> <br> <?php echo $err_desc; ?>
			</div>
			<div class="form-group">
				<h4 class="text">Image</h4> 
				<input name="photos" type="file" class="form-control"> <br> <?php echo $err_photo; ?>
			</div>
			<div class="form-group text-center">
				
				<input name="editProduct" type="submit" class="btn btn-success" value="Edit Product" class="form-control">
			</div>
		</form>
	</td>
</table>				
</div>

<!--editproduct ends -->
<?php include 'admin_footer.php';?>