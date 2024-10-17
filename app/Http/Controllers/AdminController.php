<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::with('product', 'user')->get();
        return view('admin.orders', compact('orders'));
    }
}
