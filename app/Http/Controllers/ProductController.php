<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:access products|create products|edit products|delete products', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:create products', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:edit products', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:delete products', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        uploadImage($request, $product, 'image');

        $product->save();
        toastr()->success('Product has been saved!');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        uploadImage($request, $product, 'image');

        $product->update();
        toastr()->success('Product has been updated!');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if (file_exists($product->image)) {
            unlink($product->image);
        };
        $product->delete();
        toastr()->success('Product has been deleted!');
        return redirect()->back();
    }
}
