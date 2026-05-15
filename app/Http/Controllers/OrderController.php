<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Ambil pesanan yang statusnya masih aktif (pending/proses)
        $orders = Order::with('items.book')
            ->where('user_id', auth()->id())
            ->whereIn('status', ['pending', 'processing'])
            ->latest()->get();

        return view('user.orders.index', compact('orders'));
    }

    public function history()
    {
        $orders = Order::with('items.book')
            ->where('user_id', auth()->id())
            ->whereIn('status', ['completed', 'cancelled'])
            ->latest()->get();
        return view('user.orders.history', compact('orders'));
    }
}
