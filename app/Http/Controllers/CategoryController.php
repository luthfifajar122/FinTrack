<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('transactions')->orderBy('name')->paginate(10);

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('categories.index')->with('sukses', 'Kategori berhasil ditambah.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('categories.index')->with('sukses', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        if ($category->transactions()->exists()) {
            return redirect()->route('categories.index')->with('gagal', 'Kategori tidak bisa dihapus karena masih dipakai transaksi.');
        }
        $category->delete();

        return redirect()->route('categories.index')->with('sukses', 'Kategori berhasil dihapus.');
    }
}
