<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/product ', ['Products' => Products::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produts=Products::all();
        return view('stocks');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductsRequest $request)
    {

        $Products = new Products();
        $Products->id = $request->input('id');
        $Products->designation = $request->input('designation');
        $Products->save();
        return redirect()->route('stocks')->with('success', 'Stock ajouté avec succès');
    }
    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductsRequest $request, Products $products, )
    {
        
        /*$product = Products::find($id);
        if ($type == 'achat') {
            $product->stock += $stockabrar;
        } elseif ($type == 'vente') {
            $product->stock -= $stockabrar;
        }
        $product->save();*/
        $product = Products::find($request->input('id')); 
        $product->stock += ($request->input('type') == 'achat') ? $request->input('stockabrar') : -$request->input('stockabrar'); 
        $product->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        $products->delete();
        return redirect()->route('stocks');    }
}
