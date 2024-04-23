<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function show($product)
    {
        $product = Product::findOrFail($product);
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, Response::HTTP_CREATED);
    }

    public function update(Request $request, $product)
    {
        $product = Product::findOrFail($product);
        $product->update($request->all());

        return response()->json($product);
    }

    public function destroy($product)
    {
        $product = Product::findOrFail($product);
        $product->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
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
