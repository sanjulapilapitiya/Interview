<?php

function applyDiscount($price, $discountCode) {
    $discounts = [
        'SUMMER10' => 10,
        'WINTER20' => 20
    ];
    return isset($discounts[$discountCode]) ? $price - ($price * $discounts[$discountCode] / 100) : $price;
}

