<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->get();

        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'description' => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'image'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $filename = null;

        if ($request->hasFile('image')) {

            $filename = $request->file('image')->hashName();

            $request->file('image')->storeAs(
                'images/books',
                $filename,
                'public'
            );
        }
        Book::create([
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'author'      => $request->author,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'image'       => 'images/books/' . $filename,
        ]);

        return redirect()
            ->route('admin.books.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('admin.books.show', compact('book'));
    }
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        $categories = Category::all();

        return view('admin.books.edit', compact('book', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'category_id' => 'required',
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'description' => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($request->hasFile('image')) {
            if ($book->image && Storage::disk('public')->exists($book->image)) {
                Storage::disk('public')->delete($book->image);
            }
            $imagePath = $request->file('image')->store('images/books', 'public');

        } else {
            $imagePath = $book->image;
        }
        $book->update([
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'author'      => $request->author,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'image'       => $imagePath,
        ]);

        return redirect()
            ->route('admin.books.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        if ($book->image && Storage::disk('public')->exists($book->image)) {
            Storage::disk('public')->delete($book->image);
        }
        $book->delete();

        return redirect()
            ->route('admin.books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}
