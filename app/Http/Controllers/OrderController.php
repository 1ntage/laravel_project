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

    public function approve(Order $order)
    {
        if ($order->product->amount >= $order->quantity) {
            $order->update(['status' => 'approved']);
            return redirect()->back()->with('success', 'Заказ был одобрен.');
        }
        return redirect()->back()->with('error', 'Недостаточно товара на складе.');
    }

    public function deliver(Order $order)
    {
        $order->update(['status' => 'delivered']);
        return redirect()->back()->with('success', 'Заказ доставлен.');
    }
}
