<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // 1. Menampilkan semua daftar pesanan
    public function index()
    {
        // Ambil semua order beserta data usernya, urutkan dari yang paling baru
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    // 2. Menampilkan detail satu pesanan beserta buku-bukunya
    public function show($id)
    {
        $order = Order::with(['user', 'items.book'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // 3. Mengubah status pesanan
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.orders.show', $order->id)
                         ->with('success', 'Status pesanan berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Pesanan berhasil dihapus secara permanen.');
    }
    }
