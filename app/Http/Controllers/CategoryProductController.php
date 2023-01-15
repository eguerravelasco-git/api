<?php

namespace App\Http\Controllers;

use App\Models\Category_Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category_products=Category_Product::where('estado','=',1)
        ->paginate(10);
        return response()->json($category_products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $category_product=new Category_Product;
        $category_product->category_id=$request->category_id;
        $category_product->product_id=$request->product_id;
        $category_product->promotion=$request->promotion;
        $category_product->estado=$request->estado;
        $category_product->save();
        $data=[
            'message'=>'Record created successfully',
            'category_product'=>$category_product
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category_Product  $category_Product
     * @return \Illuminate\Http\Response
     */
    public function show(Category_Product $category_Product)
    {
        //
        return response()->json($category_Product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category_Product  $category_Product
     * @return \Illuminate\Http\Response
     */
    public function edit(Category_Product $category_Product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category_Product  $category_Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category_Product $category_Product)
    {
        //
        $category_product->category_id=$request->category_id;
        $category_product->product_id=$request->product_id;
        $category_product->promotion=$request->promotion;
        $category_product->estado=$request->estado;
        $category_product->save();
        $data=[
            'message'=>'Record updated successfully',
            'category_product'=>$category_product
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category_Product  $category_Product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category_Product $category_Product)
    {
        //
        $category_product->estado=$request->estado;
        $category_product->save();
        $data=[
            'message'=>'Record deleted successfully',
            'category_product'=>$category_product
        ];
        return response()->json($data);
    }
}
