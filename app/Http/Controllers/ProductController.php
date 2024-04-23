<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function store(Request $request)
    {
        return Product::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return $product;
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return 204;
    }

    public function statistic()
    {
        $totalStock = Product::sum('count_in_stock');
        $uniqueProducts = Product::count();
        $totalCost = Product::sum('cost');

        return [
            'total_stock' => $totalStock,
            'unique_products' => $uniqueProducts,
            'total_cost' => $totalCost,
        ];
    }
}
