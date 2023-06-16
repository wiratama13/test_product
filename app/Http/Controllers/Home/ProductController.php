<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status','bisa dijual')->latest()->get();
        return view('pages.product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi',
            'harga.numeric' => ':attribute harus diisi angka',
        ];
 
        $validateData = $request->validate([
            'nama_produk'   => 'required|string|max:100',
            'harga'         => 'required|numeric',
            'kategori'      => 'required|string',
            'status'        => 'required|string'
        ], $messages);


        Product::create($validateData);

        return redirect()->route('product');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $nama_produk)
    {
        $product = Product::where('nama_produk', $nama_produk)->firstOrFail();

        return view('pages.product.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_produk)
    {
        $product = Product::where('id_produk', $id_produk)->firstOrFail();

        return view('pages.product.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_produk)
    {
        $messages = [
            'required' => ':attribute harus diisi',
            'harga.numeric' => ':attribute harus diisi angka',
        ];

        $rules = [
            'nama_produk'   => 'required|string|max:100',
            'harga'         => 'required|numeric',
            'kategori'      => 'required|string',
            'status'        => 'required|string'
        ];

        $validateData = $request->validate($rules, $messages);

        $product = Product::where('id_produk',$id_produk);
        $product->update($validateData);
        return redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_produk)
    {
        $product = Product::where('id_produk', $id_produk);
        
        $product->delete();
        return redirect()->route('product');
    }
}
