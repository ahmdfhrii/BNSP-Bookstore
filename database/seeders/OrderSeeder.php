<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order1 = Order::create([
            'user_id'        => 2,
            'invoice_number' => 'INV-20260513-001',
            'total_price'    => 215000, // Total dari 120k + 95k
            'status'         => 'pending',
        ]);

        // Memasukkan detail buku untuk pesanan 1 ke tabel order_items
        OrderItem::create([
            'order_id' => $order1->id,
            'book_id'  => 1,
            'quantity' => 1,
            'price'    => 120000,
        ]);

        OrderItem::create([
            'order_id' => $order1->id,
            'book_id'  => 2,
            'quantity' => 1,
            'price'    => 95000,
        ]);

        $order2 = Order::create([
            'user_id'        => 2,
            'invoice_number' => 'INV-20260513-002',
            'total_price'    => 105000,
            'status'         => 'success',
        ]);

        OrderItem::create([
            'order_id' => $order2->id,
            'book_id'  => 3,
            'quantity' => 1,
            'price'    => 105000,
        ]);
    }
}
