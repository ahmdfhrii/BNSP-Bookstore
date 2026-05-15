<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category; 
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    /**
     * Menampilkan daftar buku di halaman Katalog
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = Book::with('category');
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
            });
        }
        $books = $query->latest()->paginate(12);

        $books->appends($request->all());

        return view('katalog', compact('books', 'categories'));
    }

    /**
     * Menampilkan detail spesifik satu buku (Berdasarkan Slug)
     */
    public function show($slug)
    {
        $book = Book::with('category')->where('slug', $slug)->firstOrFail();
        return view('detail', compact('book'));
    }
}
