<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $validated = $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->amount,
        ]);

        $totalCost = $product->cost * $validated['quantity'];

        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login')->withErrors('Вам нужно войти, чтобы сделать заказ.');
        }

        Order::create([
            'product_id' => $product->id,
            'quantity' => $validated['quantity'],
            'total_cost' => $totalCost,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Ваш заказ был успешно отправлен!');
    }

    public function myOrders()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('orders.index', ['orders' => $orders]);
    }
}
