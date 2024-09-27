<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $validated = $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->amount,
        ]);

        $totalCost = $product->cost * $validated['quantity'];

        Order::create([
            'product_id' => $product->id,
            'quantity' => $validated['quantity'],
            'total_cost' => $totalCost,
        ]);

        return redirect()->back()->with('success', 'Ваш заказ был успешно отправлен!');
    }
}
