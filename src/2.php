<?php

function getUsers() {
    $db = new PDO("mysql:host=localhost;dbname=shop", "root", "");
    $users = [];
    $result = $db->query("SELECT * FROM users");
    foreach ($result as $row) {
        $users[] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'orders' => getUserOrders($row['id'])
        ];
    }
    return $users;
}

function getUserOrders($userId) {
    $db = new PDO("mysql:host=localhost;dbname=shop", "root", "");
    $result = $db->query("SELECT * FROM orders WHERE user_id = " . $userId);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

print_r(getUsers());

