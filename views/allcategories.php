<?php
if(!isset($_COOKIE['userName'])){
    header('Location: login.php');
}

include 'admin_header.php';
?>
<!--All Categories starts -->

<div class="center">
	<h3 class="text">All Categories</h3>
	<table class="table table-striped">
		<thead>
			<th>Sl#</th>
			<th> Name</th>
			<th>Product Count </th>
			<th></th>
			<th></th>
			
		</thead>

		<tbody>

			<td>1</td>
			<td>Groserry</td>
			<td>100</td>
			<td><a href="editcategory.php" class="btn btn-success">Edit</a></td>
			<td><a class="btn btn-danger">Delete</td>

		</tbody>

        <?php
            include '../models/DataBase.php';
            $i = 1;
            $array = new DataBase();
            $array->dbCon();
            $result = $array->allCategories();
            if(!empty($result)) {
                foreach ($result as $data) {
                    $foreign = $data['category_id'];
                    $db = new DataBase();
                    $db->dbCon();
                    $numOfProducts = $db->numOfProducts($foreign);
                    echo "<tbody>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $data['category_name'] . "</td>";
                    echo "<td>" . $numOfProducts['sum(quantity)'] . "</td>";
                    echo "<td>" . "<a href='editcategory.php' class='btn btn-success'>Edit</a>" . "</td>";
                    echo "<td><a href='deleteCategory.php?category_id=" . $data['category_id'] . "' class='btn btn-danger' name='." . $data['category_id'] . ".'>Delete</td>";
                    echo "</tbody>";
                    $i++;
                }
            }
        ?>
	</table>
</div>
<!--All Categories ends -->
<?php include 'admin_footer.php';?>