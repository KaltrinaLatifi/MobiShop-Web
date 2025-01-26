<?php
$conn = new mysqli('localhost', 'root', '', 'Mobileshop');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$new_password = password_hash('Kosovajone123', PASSWORD_BCRYPT); 
$sql = "UPDATE users SET password='$new_password' WHERE name='tinaadmin'";

if ($conn->query($sql) === TRUE) {
    echo "Fjalëkalimi u ndryshua me sukses!";
} else {
    echo "Gabim: " . $conn->error;
}

$conn->close();
?>