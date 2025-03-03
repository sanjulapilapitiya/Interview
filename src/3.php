<?php

/*
 * You have the following function that calculates discounts.
 * Task:
 * * Write a PHPUnit test for this function.
 * * Ensure tests cover:
 * * * A valid discount code.
 * * * An invalid discount code.
 * * * Edge cases (e.g., 0% or 100% discounts).
 */

function applyDiscount($price, $discountCode) {
    $discounts = [
        'SUMMER10' => 10,
        'WINTER20' => 20
    ];
    return isset($discounts[$discountCode]) ? $price - ($price * $discounts[$discountCode] / 100) : $price;
}

