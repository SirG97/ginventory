<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::with('category')->get();

        return Inertia::render('Products', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        $warehouses = Warehouse::all();
        return Inertia::render('NewProduct',['categories' => $categories, 'warehouses' => $warehouses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'warehouse_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'name' => 'required|max:100',
            'barcode' => 'required|numeric',
            'cost_price' => 'required|numeric',
            'sales_price' => 'required|numeric',
            'tax' => 'required|numeric',
            'description' => 'nullable',
            'weight' => 'nullable|numeric',
            'photo' => 'nullable'
        ]);

        Product::create([
            'warehouse_id' => $request->warehouse_id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'barcode' => $request->barcode,
            'cost_price' => $request->cost_price,
            'sales_price' => $request->sales_price,
            'tax' => $request->tax,
            'description' => $request->description,
            'weight' => $request->weight,
            'photo' => $request->photo ? $request->photo->store('users', 'public') : null,
        ]);

        return redirect()->route('products')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
