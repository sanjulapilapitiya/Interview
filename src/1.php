<?php

/*
 * Below is a piece of legacy PHP code that processes an order.
 * It has several issues, including poor readability, lack of error handling, and mixed concerns.
 * Use comments to explain your thinking or as pseudo-code if you're short on time.
 * Task:
 *  * Refactor the code to improve readability and maintainability.
 *  * Apply the Single Responsibility Principle (SRP).
 *  * Add proper error handling.
 *  * Ensure the refactored code is unit tested.
 * Hints:
 * * Could this function be a set of classes instead perhaps?
 * * Is there a better way to handle errors than die()?
 * * How could it be refactored to improve security?
 */
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

