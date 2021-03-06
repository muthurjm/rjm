<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Hsn;
use DB;

class ProductStockController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $products = Product::all();
        foreach ($products as $product) {
            $hsn_id = $product->hsn_id;
            $hsn = Hsn::find($hsn_id);
            $hsn_code = $hsn->hsn_code;
            $product['hsn_code'] = $hsn_code;
            $tax = $hsn->tax;
            $product['tax'] = $tax;
        }
        return view('admin/product_stock/index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view("admin/product_stock/insert",compact("products"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // // return $_POST;
        // $product = DB::table('product')
        // ->where('id', '=',  $request->product_id)
        // ->get();
        // $stock = $request->quantity + $product[0]->stock;
        // Product::where('id', $request->product_id)->update(array(
        //     // 'hand' => $stock,
        //     'stock' => $request->quantity,
        // ));
        //     return back()->with("success","Stock Added Sucessfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
