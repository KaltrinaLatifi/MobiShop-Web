<?php
class LoginRegister
{
private $servername = "localhost";
private $username = "root";
private $password = "";
private $database = "mobishop";
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

public function get_errors()
{
    return  $this->errors;
}
public function get_errors_login_all()
{
    return $this->get_errors_login;
}

public function register($post)
{
    $name = $this->con->escape_string($_POST['name']);
    $lname = $this->con->escape_string($_POST['lname']);
    $email = $this->con->escape_string($_POST['email']);
    $password =  $this->con->escape_string($_POST['password']);
    $confirmPassword = $this->con->escape_string($_POST['confirmPassword']);

    if (isset($name) && !empty($name) && isset($lname) && !empty($lname) && isset($email) && !empty($email) &&  isset($password) && !empty($password) && isset($confirmPassword) && !empty($confirmPassword)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $query = "SELECT * FROM users WHERE email ='$email'";
            $result = $this->con->query($query);
            if ($result->num_rows > 0) {
                $this->errors[] = "Email already exist!";
            } else {
                if (strlen($password) >= 8 && strlen($confirmPassword) >= 8) {
                    if ($password === $confirmPassword) {
                        $password = password_hash($password, PASSWORD_BCRYPT);
                        $query = "INSERT INTO `users` (`name`,`lastname`,`email`, `password`) VALUES ('$name','$lname','$email','$password')";
                        $sql = $this->con->query($query);
                        if ($sql == true) {
                            header('location: login.php');
                            exit();
                        } else {
                            $this->errors[] = "Registration faild!";
                        }
                    } else {
                        $this->errors[] = "Password and Confirm password doesn't match!";
                    }
                } else {
                    $this->errors[] = "Password must be more than 8 characters!";
                }
            }
        } else {
            $this->errors[] = "Email is not valid!";
        }
    } else {
        $this->errors[] = "All fields are required!";
    }
}

    public function login($post)
    {
        
        $email = $this->con->escape_string($_POST['email']);
        $password =  $this->con->escape_string($_POST['password']);
        if (isset($email) && !empty($email) && isset($password) && !empty($password)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $sql = "SELECT * FROM `users` WHERE `email`='$email'";

                if ($result = $this->con->query($sql)) {
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        if ($email == $row['email']) {
                            if (password_verify($password, $row['password'])) {
                                $user = $row['role'];
                                $name = $row['name'];
                                $_SESSION['user'] = $user;
                                $_SESSION['name'] = $name;;
                                if ($user == "admin") {
                                    header("Location: adminDashboard.php");
                                } else {
                                    header("Location: userPage.php");
                                }
                                exit();
                            } else {
                                $this->get_errors_login[] = "Password is incorrect!";
                            }
                        }
                    } else {
                        $this->get_errors_login[] = "Email doesn't exist";
                    }
                } 
            } else {
                $this->get_errors_login[] = "Email is not valid!";
            }
        } else {
            $this->get_errors_login[] = "All fields are required!";
        }
    }
}

?>