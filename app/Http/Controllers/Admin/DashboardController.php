<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index(Request $request)
    {
        // 1. Ambil Total Data (Card Atas)
        $totalUser = \App\Models\User::count();
        $totalBook = \App\Models\Book::count();
        $totalCategory = \App\Models\Category::count();
        $totalOrder = \App\Models\Order::count();

        // 2. Ambil Data untuk Grafik (Chart)
        $year = $request->input('year', date('Y'));
        $orders = \App\Models\Order::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $monthlyOrders = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyOrders[] = $orders[$i] ?? 0;
        }

        // 3. AMBIL 5 PESANAN TERBARU UNTUK KOLOM KANAN
        $recentOrders = \App\Models\Order::with('user')->latest()->take(5)->get();

        // Kirim semua variabel ke view (pastikan menambahkan $recentOrders)
        return view('admin.dashboard.index', compact(
            'totalUser',
            'totalBook',
            'totalCategory',
            'totalOrder',
            'monthlyOrders',
            'year',
            'recentOrders'
        ));
    }
}
