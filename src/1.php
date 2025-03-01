<?php

function processOrder($orderData) {
    $db = new mysqli("localhost", "root", "", "shop");
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    
    $query = "SELECT price FROM products WHERE id = " . $orderData['product_id'];
    $result = $db->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total = $row['price'] * $orderData['quantity'];
        $insertQuery = "INSERT INTO orders (user_id, product_id, quantity, total) 
                        VALUES (" . $orderData['user_id'] . ", " . $orderData['product_id'] . ", " . $orderData['quantity'] . ", " . $total . ")";
        if ($db->query($insertQuery) === TRUE) {
            echo "Order placed!";
        } else {
            echo "Error: " . $db->error;
        }
    } else {
        echo "Product not found!";
    }
    $db->close();
}

