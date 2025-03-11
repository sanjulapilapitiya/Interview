<?php

declare(strict_types=1);

namespace Equinox\DeveloperInterview;
/*
 * You have the following function that calculates discounts.
 * Task:
 * * Write a PHPUnit test for this function.
 * * Ensure tests cover:
 * * * A valid discount code.
 * * * An invalid discount code.
 * * * Edge cases (e.g., 0% or 100% discounts).
 */

 class DiscountService {
    function applyDiscount(float $price, string $discountCode): string {
        $discounts = [
            'SUMMER10' => 10,
            'WINTER20' => 20,
            'EDGECASE0' => 0,
            'EDGECASE100' => 100,
            'EDGECASENEGATIVE' => -10, //discount exists to test negative discount is not applied
        ];
        return isset($discounts[$discountCode]) && ($discounts[$discountCode] > 0) ? number_format($price - ($price * $discounts[$discountCode] / 100), 2) : number_format($price,2);
    }
}
