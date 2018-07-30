<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Hsn;
use DB;
use App\Purchase;
use App\PurchaseProduct;

class PurchaseController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $purchases = Purchase::all();
        return view('admin/purchase/index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view("admin/purchase/insert",compact("products"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $_POST;
        $purchase = new Purchase();
        $purchase->invoice_number = $request->invoice_number;
        $purchase->invoice_date = $request->invoice_date;
        $purchase->invoice_amount = $request->invoice_amount;
        $purchase->taxable = $request->taxable;
        $purchase->sgst = $request->sgst;
        $purchase->cgst = $request->cgst;
        $purchase->save();
        $id = $purchase->id;
        $product = new Product();
        foreach ($request->quantity as $key1 => $value1) {
            foreach ($request->product as $key2 => $value2) {
            $purchase_product[$key1] = new PurchaseProduct();
            $purchase_product[$key1]->purchase_id = $id;
            $purchase_product[$key1]->product_id = $value2;
            $purchase_product[$key1]->quantity = $value1;
            if($value1 != null && $value2 != null){
            $purchase_product[$key1]->save();
            $product = DB::table('product')
                        ->where('id', '=',  $value2)
                        ->get();
            $stock = $value1 + $product[0]->stock;
            Product::where('id', $value2)->update(array(
            'stock' => $stock,
        ));
        
            }
            break;
        }
    }
            return back()->with("success","Stock Added Sucessfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productpurchase =  Purchase::find($id);
        $purchases =  PurchaseProduct::all();
        return view("admin/purchase/view",compact("purchases","productpurchase"));
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
