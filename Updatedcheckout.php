<?php 
session_start(); 
include "classProduct.php"; 


$db = new mysqli('localhost', 'root', '', 'mobileshop');


if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}


if (!isset($_SESSION['user']) || $_SESSION['user'] != "user") { 
    header("Location: login.php"); 
    exit(); 
}

$successMessage = "";
$errors = [];  


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $name = htmlspecialchars(trim($_POST['name']));
    $surname = htmlspecialchars(trim($_POST['surname']));
    $card_number = htmlspecialchars(trim($_POST['creditCard']));
    $address = htmlspecialchars(trim($_POST['address']));

    
    if (empty($name) || empty($surname) || empty($card_number) || empty($address)) {
        $errors[] = "All fields are required.";
    }

    
    if (!preg_match("/^[a-zA-Z]+$/", $name)) {
        $errors[] = "First Name should contain only letters.";
    }

    if (!preg_match("/^[a-zA-Z]+$/", $surname)) {
        $errors[] = "Last Name should contain only letters.";
    }

    
    if (strlen($card_number) != 16 || !ctype_digit($card_number)) {
        $errors[] = "Credit Card number should be 16 digits.";
    }

    
    if (empty($errors)) {
        $query = "INSERT INTO orders (user_id, product_id, name, surname, card_number, address) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        if (!$stmt) {
            $errors[] = "Prepare failed: " . $db->error;
        } else {
           
            $user_id = 1; 
            $product_id = 1; 

          
            $stmt->bind_param("iissss", $user_id, $product_id, $name, $surname, $card_number, $address);

            
            if ($stmt->execute()) {
                $successMessage = "Successfully purchased!";
            } else {
                $errors[] = "Execute failed: " . $stmt->error; 
            }

            
            $stmt->close();
        }
    }
}


$db->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./styles/updatedcheckout.css" />
</head>

<body>
    <div class="checkout">
        <h2>Checkout</h2>

        <?php if ($successMessage): ?>
            <p class="success-message"><?php echo $successMessage; ?></p>
        <?php else: ?>
            <form method="POST" action="updatedcheckout.php">
                <div class="form-group">
                    <label for="name">First Name</label>
                    <input type="text" id="name" name="name" required />
                </div>
                <div class="form-group">
                    <label for="surname">Last Name</label>
                    <input type="text" id="surname" name="surname" required />
                </div>
                <div class="form-group">
                    <label for="creditCard">Credit Card Number</label>
                    <input type="text" id="creditCard" name="creditCard" required />
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required />
                </div>

                
                <?php if (!empty($errors)): ?>
                    <div class="error-messages">
                        <?php foreach ($errors as $error): ?>
                            <div class="error"><?php echo $error; ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <button type="submit">Confirm Purchase</button>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>
