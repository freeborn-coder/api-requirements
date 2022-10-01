<?php
namespace App\Services;

use stdClass;

class ProductService {

    /**
     * Go through each product apply the appropriate discounts
     */
    public function applyDiscounts($products)
    {
        foreach ($products as $product) {
            $price = new stdClass;
            $price->original = $product->price;

            if ($product->category == 'insurance') {
                // 30 percent discount
                $price->final = $product->price - (0.3 * $product->price);
                $price->discount_percentage = '30%';
            }
            else if ($product->sku == '000003') {
                // 15 percent discount
                $price->final = $product->price - (0.15 * $product->price);
                $price->discount_percentage = '15%';
            }
            else {
                // no discount
                $price->final = $product->price;
                $price->discount_percentage = null;
            }

            $product->price = $price;
            $price->currency = 'EUR';
        }

        return $products;
    }

}
