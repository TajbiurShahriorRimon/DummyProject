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
            echo "Connected<br> Now Showing data <br><br/>";
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

    function addCategory($name)
    {
        $sqlQuery = "INSERT INTO categories(category_name) VALUES ('$name');";

        $result = mysqli_query($this->con, $sqlQuery);
        //$row = mysqli_num_rows($result);
    }
}