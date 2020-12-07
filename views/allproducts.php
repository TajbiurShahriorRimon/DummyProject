<?php
if(!isset($_COOKIE['userName'])){
    header('Location: login.php');
}
include 'admin_header.php';
?>
<!--All Products starts -->

<div class="center">
	<h3 class="text">All Products</h3>
	<table class="table table-striped">
		<thead>
			<th>Sl#</th>
			<th> Name</th>
			<th>Category </th>
			<th> Price</th>
			<th> Quantity</th>
			<th></th>
			<th></th>
			
		</thead>
		<tbody>
			<td>1</td>
			<td>Groserry</td>
			<td>100</td>
			<td>10</td>
			<td>10.2.2020</td>
			<td><a href="editproduct.php" class="btn btn-success">Edit</a></td>
			<td><a class="btn btn-danger">Delete</td>
		</tbody>

        <?php
        include '../models/DataBase.php';
        $i = 1;
        $array = new DataBase();
        $array->dbCon();
        $result = $array->allProducts();
        if(!empty($result)) {
            echo 'not empty';
            foreach ($result as $data) {
                $foreign = $data['category_id'];
                $db = new DataBase();
                $db->dbCon();
                $category = $db->categoryName($foreign);
                echo "<tbody>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $data['product_name'] . "</td>";
                echo "<td>" . $category['category_name'] . "</td>";
                echo "<td>" . $data['price'] . "</td>";
                echo "<td>" . $data['quantity'] . "</td>";
                echo "<td>" . "<a href='editcategory.php' class='btn btn-success'>Edit</a>" . "</td>";
                echo "<td><a href='deleteProduct.php?product_id=" . $data['product_id'] . "' class='btn btn-danger' name='." . $data['product_id'] . ".'>Delete</td>";
                echo "</tbody>";
                $i++;
            }
        }
        ?>
	</table>
</div>
<!--Products ends -->
<?php include 'admin_footer.php';?>