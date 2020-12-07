<?php

class DataBase
{
    private $serverName = "localhost: 3345";
    private $user = "root";
    private $dbpassword = "";
    private $dbName = "dummy";

    private $con;
    function dbCon()
    {
        $this->con = mysqli_connect($this->serverName, $this->user, $this->dbpassword, $this->dbName);

        if (!$this->con) {
            die("not connected");
        } else {
            //echo "Connected<br> Now Showing data <br><br/>";
        }
    }

    function searchUsers($username, $pass){
        $sqlQuery = "SELECT * FROM users WHERE username = '$username' AND password = '$pass';";

        $result = mysqli_query($this->con, $sqlQuery);
        $row = mysqli_num_rows($result);

        if($row > 0){
            return 1;
        }
        else{
            //return  "not found";
        }
    }

    function allCategories(){
        $sqlQuery = "select * from categories";
        $result = mysqli_query($this->con, $sqlQuery);
        $row = mysqli_num_rows($result);

        $data = [];

        if($row > 0){
            while ($rowArray = mysqli_fetch_assoc($result)){
                $data[] = $rowArray;
            }
            return $data;
        }
        else{
            return $data;
        }
    }

    function addCategory($name)
    {
        $sqlQuery = "INSERT INTO categories(category_name) VALUES ('$name');";

        $result = mysqli_query($this->con, $sqlQuery);
    }

    function editCategory($name, $cat_id)
    {
        $sqlQuery = "UPDATE categories set category_name = '$name' where category_id = '$cat_id';";

        $result = mysqli_query($this->con, $sqlQuery);
    }

    function categoryName($catId){
        $sqlQuery = "SELECT category_name FROM categories
                    WHERE category_id = '$catId'";

        $result = mysqli_query($this->con, $sqlQuery);
        $row = mysqli_num_rows($result);

        if($row > 0){
            while ($rowArray = mysqli_fetch_assoc($result)){
                $data = $rowArray;
            }
            return $data;
        }
    }

    function categoryList(){
        $sqlQuery = "SELECT * FROM categories";

        $result = mysqli_query($this->con, $sqlQuery);
        $row = mysqli_num_rows($result);

        if($row > 0){
            while ($rowArray = mysqli_fetch_assoc($result)){
                $data[] = $rowArray;
            }
            return $data;
        }
    }

    function deleteCategory($categoryId)
    {
        echo $categoryId;
        $sqlQuery = "DELETE FROM categories
                    WHERE category_id = '$categoryId'";

        $result = mysqli_query($this->con, $sqlQuery);
    }

    function allProducts(){
        $sqlQuery = "select * from products";
        $result = mysqli_query($this->con, $sqlQuery);
        $row = mysqli_num_rows($result);

        $data = []; //empty array

        if($row > 0){
            while ($rowArray = mysqli_fetch_assoc($result)){
                $data[] = $rowArray;
            }
            return $data;
        }
        else {
            return $data;
        }
    }

    function addProduct($prodName, $price, $quantity, $desc, $filepath)
    {
        $sqlQuery = "INSERT INTO products (product_name, price, quantity, description, photo) VALUES ('$prodName', '$price', '$quantity', '$desc', '$filepath');";

        $result = mysqli_query($this->con, $sqlQuery);
    }

    function editProduct($prodId, $prodName, $price, $quantity, $desc)
    {
        $sqlQuery = "UPDATE products 
                    SET product_name = '$prodName', price = '$price', quantity = '$quantity', description = '$desc'
                    WHERE product_id = '$prodId'";

        $result = mysqli_query($this->con, $sqlQuery);
    }

    function deleteProduct($productId)
    {
        $sqlQuery = "delete from products where product_id = '$productId'";
        $result = mysqli_query($this->con, $sqlQuery);
    }

    function numOfProducts($catId){
        $sqlQuery = "SELECT sum(quantity) FROM products 
                    WHERE category_id = '$catId'";

        $result = mysqli_query($this->con, $sqlQuery);
        $row = mysqli_num_rows($result);

        if($row > 0){
            while ($rowArray = mysqli_fetch_assoc($result)){
                $data = $rowArray;
            }
            return $data;
        }
    }
}