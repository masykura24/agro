<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect()->route('welcome');
        // return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = [
            'title' => 'Tambah Produk',
            'button' => 'Tambah',
            'method' => 'POST',
            'action' => route('product.store')
        ];
        return view('product.form', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Mengunggah gambar ke folder public/images/product
        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('images/product'), $imageName);

        Product::create([
            'nama' => $request->nama,
            'gambar' => 'images/product/' . $imageName,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
