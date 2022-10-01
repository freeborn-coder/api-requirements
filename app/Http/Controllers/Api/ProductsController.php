<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * List Products
     */
    public function index(Request $request, ProductService $productService)
    {
        $dataset = file_get_contents(resource_path('json/dataset.json'));

        $products = json_decode($dataset)->products;

        // filter by category
        if ($request->category) {
            $products = array_filter($products, fn ($product) => preg_match("/{$request->category}/", $product->category));
        }

        // filter by price
        if ($request->price) {
            $products = array_filter($products, fn ($product) => $request->price == $product->price);
        }

        $discountedProducts = $productService->applyDiscounts($products);

        return response()->json(['products' => $discountedProducts]);
    }

}
