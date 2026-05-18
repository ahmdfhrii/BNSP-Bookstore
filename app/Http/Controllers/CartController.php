<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
    // Menampilkan halaman keranjang
    public function index()
    {
        // Ambil data keranjang khusus untuk user yang sedang login beserta data bukunya
        $carts = Cart::with('book')->where('user_id', Auth::id())->latest()->get();
        return view('user.cart.index', compact('carts'));
    }

    // Memasukkan buku ke keranjang
   public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);
        $existingCart = Cart::where('user_id', Auth::id())
                            ->where('book_id', $request->book_id)
                            ->first();

        if ($existingCart) {
            $existingCart->quantity += $request->quantity;
            $existingCart->save();
        } else {
            Cart::create([
                'user_id'  => Auth::id(),
                'book_id'  => $request->book_id,
                'quantity' => $request->quantity
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Buku berhasil ditambahkan ke keranjang!');
    }
    public function update(Request $request, $id)
    {
        $cart = Cart::where('user_id', auth()->id())->findOrFail($id);
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $cart->book->stock
        ]);

        $cart->update([
            'quantity' => $request->quantity
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Jumlah berhasil diperbarui'
        ]);
    }

    public function destroy($id)
    {
        $cart = Cart::where('user_id', auth()->id())->findOrFail($id);
        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Buku berhasil dihapus dari keranjang');
    }
    // Fungsi untuk memproses Checkout ke WhatsApp
  public function checkout(Request $request)
    {
        // 1. Validasi pastikan ada item yang dicentang
        $request->validate([
            'selected_items' => 'required|array',
        ]);

        $carts = \App\Models\Cart::with('book')
                    ->whereIn('id', $request->selected_items)
                    ->where('user_id', auth()->id())
                    ->get();

        if ($carts->isEmpty()) {
            return back()->with('error', 'Tidak ada barang yang dipilih.');
        }

        // 2. Ambil data User & Persiapkan Invoice
        $user = auth()->user();
        $invoice = 'INV-' . strtoupper(str()->random(8));
        $totalPrice = 0;

        // Buat data Order (Pesanan) utama
        $order = \App\Models\Order::create([
            'user_id' => $user->id,
            'invoice_number' => $invoice,
            'total_price' => 0, // Akan di-update di bawah
            'status' => 'pending',
        ]);

        // 3. Rakit Teks Pembuka WhatsApp
        $text = "Halo Admin *FahriBooks*, saya ingin melakukan pemesanan.\n\n";
        $text .= "*No. Invoice:* " . $invoice . "\n";
        $text .= "*Nama Pemesan:* " . $user->name . "\n";
        $text .= "*No. HP:* " . ($user->phone ?? 'Belum diisi') . "\n";
        $text .= "Alamat:* " . ($user->address ?? 'Belum diisi') . "\n\n";
        $text .= "*Detail Pesanan:*\n";

        // 4. Proses Item Buku (Masuk ke Teks & Database order_items)
        foreach ($carts as $cart) {
            $subtotal = $cart->book->price * $cart->quantity;
            $totalPrice += $subtotal;

            // Simpan ke database OrderItem
            \App\Models\OrderItem::create([
                'order_id' => $order->id,
                'book_id' => $cart->book_id,
                'quantity' => $cart->quantity,
                'price' => $cart->book->price,
            ]);
            $text .= "- " . $cart->book->title . "\n";
            $text .= "  " . $cart->quantity . " x Rp " . number_format($cart->book->price, 0, ',', '.') . " = Rp " . number_format($subtotal, 0, ',', '.') . "\n";
        }

        // 5. Update Total Harga di tabel Orders
        $order->update(['total_price' => $totalPrice]);

        // 6. Hapus buku dari keranjang
        \App\Models\Cart::destroy($carts->pluck('id'));

        // 7. Tambahkan Total Keseluruhan ke Teks WhatsApp
        $text .= "\n===========================\n";
        $text .= "*TOTAL PEMBAYARAN: Rp " . number_format($totalPrice, 0, ',', '.') . "*\n";
        $text .= "=============================\n\n";
        $text .= "Mohon informasi rekening untuk pembayarannya. Terima kasih!";

        // 8. Redirect ke WhatsApp
        $adminPhone = "62895412946795";
        $whatsappUrl = "https://api.whatsapp.com/send?phone=" . $adminPhone . "&text=" . urlencode($text);

        return redirect()->away($whatsappUrl);
    }
}
