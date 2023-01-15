<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products=DB::table('category__products as cp')
            ->join('products as p','cp.product_id','=','p.id')
            ->join('categories as d','cp.category_id','=','d.id')
            ->select('p.id','p.name','p.photo','p.observation','p.size','d.name','d.observation')
            ->where('p.estado','=',1)
            ->paginate(10);
        return response()->json($products);
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
        $product=new Product;
        $product->name=$request->name;
        $product->price=$request->price;
        $product->photo=$request->photo;
        $product->observation=$request->observation;
        $product->size=$request->size;
        $product->estado=$request->estado;
        $product->save();
        $data=[
            'message'=>'Product create successfully',
            'product'=>$product
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json($product);
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
        $product->name=$request->name;
        $product->price=$request->price;
        $product->photo=$request->photo;
        $product->observation=$request->observation;
        $product->size=$request->size;
        $product->estado=$request->estado;
        $product->save();
        $data=[
            'message'=>'Product update successfully',
            'product'=>$product
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        //
       
        $product->estado=$request->estado;
        $product->save();
        $data=[
            'message'=>'Product delete successfully',
            'product'=>$product
        ];
        return response()->json($data);
    }

    

}
