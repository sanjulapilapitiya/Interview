<?php

namespace Equinox\DeveloperInterview\tests;

use Equinox\DeveloperInterview\DiscountService;
use PHPUnit\Framework\TestCase;

// if autoload is not configured uncomment below line to get test working
// require_once __DIR__ . '/../src/DiscountService.php';
// update! this is now fixed turned out there was a mismatch in the versions local and global unittest causing those warnings

class DiscountServiceTest extends TestCase
{
    private $discountService;

    protected function setUp(): void
    {
        $this->discountService = new DiscountService();
    }

    /**
     * @dataProvider discountProvider
     */
    public function testDiscountService($price, $discount, $expectedResults)
    {
        $this->assertEquals($expectedResults, $this->discountService->applyDiscount($price, $discount));
    }

    public static function discountProvider()
    {
        return [
            "user using discount code SUMMER10" => [100, 'SUMMER10', 90.00],
            "user using discount code WINTER20" => [100, 'WINTER20', 80.00],
            "user using discount code WINTER20 with odd price tag" => [67, 'WINTER20', 53.60],
            "user using invalid code" => [100, 'INVALID', 100.00],
            "user using discount code EDGECASE100 code" => [100, 'EDGECASE100', 0.00],
            "user using discount code EDGECASE0 code" => [100, 'EDGECASE0', 100.00],
            "user using discount code EDGECASENEGATIVE code" => [100, 'INVALID', 100.00],
        ];
    }
}