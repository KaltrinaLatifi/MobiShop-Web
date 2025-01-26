<?php 
session_start(); 
include "classProduct.php"; 

// Krijo lidhjen me bazën e të dhënave
$db = new mysqli('localhost', 'root', '', 'mobileshop');

// Kontrollo lidhjen
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Kontrollo nëse përdoruesi është autentifikuar dhe ka rolin "user"
if (!isset($_SESSION['user']) || $_SESSION['user'] != "user") { 
    header("Location: login.php"); 
    exit(); 
}

$successMessage = "";

// Kontrollo nëse metoda e kërkesës është POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Merr dhe pastro të dhënat e inputit
    $name = htmlspecialchars(trim($_POST['name']));
    $surname = htmlspecialchars(trim($_POST['surname']));
    $card_number = htmlspecialchars(trim($_POST['creditCard']));
    $address = htmlspecialchars(trim($_POST['address']));

    // Kontrollo nëse ndonjë fushë është bosh
    if (empty($name) || empty($surname) || empty($card_number) || empty($address)) {
        die("All fields are required.");
    }

    // Përgatit query-n
    $query = "INSERT INTO orders (user_id, product_id, name, surname, card_number, address) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    if (!$stmt) {
        die("Prepare failed: " . $db->error);
    }

    // Vendos vlera testuese (ndrysho sipas rastit)
    $user_id = 1; // ID e përdoruesit (p.sh., nga sesioni)
    $product_id = 1; // ID e produktit (p.sh., nga inputi)

    // Lidhi parametrat
    $stmt->bind_param("iissss", $user_id, $product_id, $name, $surname, $card_number, $address);

    // Ekzekuto query-n
    if ($stmt->execute()) {
        $successMessage = "Successfully purchased!";
    } else {
        die("Execute failed: " . $stmt->error); // Debugging për gabime gjatë ekzekutimit
    }

    // Mbyll deklaratën
    $stmt->close();
}

// Mbyll lidhjen
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
                <button type="submit">Confirm Purchase</button>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>
