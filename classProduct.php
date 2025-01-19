<?php

class Products
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "PhoneShop";
    public $con;
    public $errors = [];

    public function __construct()
    {
        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        } else {
            return $this->con;
        }
    }
    public function add_Products($post)
    {
        $filename = $_FILES["file"]["name"];
        $tempname = $_FILES["file"]["tmp_name"];
        $folder = "./image/" . $filename;
        move_uploaded_file($tempname, $folder);

        $title = $this->con->escape_string($_POST['title']);
        $price = $this->con->escape_string($_POST['price']);
        $display = $this->con->escape_string($_POST['display']);
        $hardware = $this->con->escape_string($_POST['hardware']);
        $camera = $this->con->escape_string($_POST['camera']);
        $battery = $this->con->escape_string($_POST['battery']);
        $qty = $this->con->escape_string($_POST['qty']);
        $query = "INSERT INTO `products` (`title`,`price`,`display`,`hardware`, `camera`, `battery`, `qty`, `images`) VALUES ('$title','$price','$display','$hardware','$camera','$battery','$qty','$filename')";
        $sql = $this->con->query($query);
        if ($sql == true) {
            echo "Product added";
        } else {

        }
    }
    public function displayProduct()
    {
        
        $query = "SELECT * FROM products";
        $result = $this->con->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No found records";
        }
    }

    public function displayUsers()
    {
        $query = "SELECT * FROM users WHERE role = 'user'";
        $result = $this->con->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No found records";
        }
    }


    public function delete($id)
    {
        $query = "DELETE FROM products WHERE id = '$id'";
        $sql = $this->con->query($query);
        if ($sql == true) {
            header("Location:adminProducts.php?msg3=delete");
        } else {
            echo "Record does not delete try again";
        }
    }

}